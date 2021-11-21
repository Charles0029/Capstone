<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>Sales</title>
</head>


<body id="body-pd" class="bg-light">
    <?php
      session_start();
      if(!isset($_SESSION['username'])){
        header('location:login.php');
        }
    ?>
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="dashboard.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">CV-GFOXX</span> </a>
        <div class="nav_list">
          <a href="dashboard.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
          <a href="sales.php" class="nav_link active"> <i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
          <a href="products.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
          <a href="suppliers.php" class="nav_link"> <i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
          <a href="customers.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers</span> </a>
          <a href="salesReport.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Sales Report</span> </a>
        </div>
      </div>
      <a href="login.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
  </div>
  <!--Container Main start-->
  <div class="height-100">
    <div class="row">
      <div class="col-md">
        <h1><b>CV-GFOXX Sales <i class='bx bx-bar-chart-alt-2'></i></b></h1>
        <?php $date = new DateTime("now", new DateTimeZone('Asia/Manila')); ?>
        <p>Today is <?php echo $date->format('l jS \of F Y'); ?></p>
      </div>
      <div class="col-md clock">
        <span id="LiveTime" class="badge bg-warning text-dark" style="font-size: 20px;"></span>
      </div>
    </div>

    <!-- table sales -->
    <div class="mt-5">
      <div class="row">
        <div class="col-lg-7">
          <h4 class="mt-1 mb-1">Sales Products</h4>
        </div>
        <form class="col-lg-5" style="display: inline-flex;" action="result_sales.php" method="GET">
          <input type="text" name="product" class="form-control" id="" placeholder="Search product...">
          <button class="btn btn-primary " style="margin-left: 7px;" name="search">Search</button>
        </form>
      </div>
      <div class="tableData overflow-auto">
        <table class="table mt-4 table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Category</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Qty. left</th>
              <th scope="col">Supplier</th>
              <th scope="col">Pick Order</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require('config.php');
              $query="SELECT * FROM products";
              $result=mysqli_query($db_link, $query);
              while ($row=mysqli_fetch_array($result)){
            ?>

            <tr>
              <td><img src="images/apple.jpg" alt=""></td>
              <td> <?php echo $row['category']; ?></td>
              <td> <?php echo $row['name']; ?></td>
              <td> <?php echo $row['retail']; ?></td>
              <td> <?php echo $row['quantity']; ?></td>
              <td> <?php echo $row['supplier']; ?></td>
              <td><button type="button"   class="btn btn-sm btn-danger" >Pick Order</button></td>
            </tr>
              
            <?php
            }?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  
<!-- Modal -->
<div class="modal" id="salesModal" tabindex="-1" >

  <?php
    include 'config.php';

    $id = $_GET['id'];
    $view = "SELECT * from products where md5(id) = '$id'";
    $result = $db_link->query($view);
    $row = $result->fetch_assoc();

    if(isset($_POST['update'])){

      $ID = $_GET['id'];

      $view1 = "SELECT quantity from products where md5(id) = '$id'";
      $result1 = $db_link->query($view);
      $row2 = $result->fetch_assoc();

      $quantity=$_POST['quantity'];
      $quant = $_POST['quant'];
      $dates=$_POST['dates'];


      $customers=$_POST['customers'];
      $category=$_POST['category'];
      $name=$_POST['name'];
      $amount=$_POST['amount'];
      $quant=$_POST['quant'];
      $total=$_POST['total'];
      $tendered=$_POST['tendered'];
      $changed=$_POST['changed'];
      $prof = $_POST['profit'];
      $tracking = $_POST['tracking'];

      $insert1 = "UPDATE products set quantity = quantity - '$quant' where md5(id) = '$ID'";
      $insert = "INSERT INTO sales(dates,customers,category,name,amnt,quantity,total,profit,tendered,changed,tracking) VALUES('$dates','$customers','$category','$name','$amount','$quant','$total','$prof','$tendered','$changed',$tracking)" or die("error".mysqli_errno($db_link));
      $result=mysqli_query($db_link,$insert);
        if($db_link->query($insert1)== TRUE){
            header('location:sales.php');			
        }

      $db_link->close();
      }
     
  ?>

  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Transaction Form</h5>
      <a href="sales.php" type="button" class="btn-close"  aria-label="Close"></a>
    </div>
    <div class="modal-body">
    <?php
  
        if(isset($_POST['sub']))
            {
            
            $total = $_POST['total'];
            $tendered = $_POST['tendered'];
            $quant = $_POST['quant'];
            $profit = $_POST['profit'];
            $customers = $_POST['customers'];

            $profit = $profit;
            $quant = $quant;
            $ten = $tendered;
            $change = (int)$tendered - (int)$total  ;

            }

        ?>

    <?php

        if(isset($_POST['calculate']))
            {
            $amnt = $_POST['amount'];
            $quant = $_POST['quant'];
            $profit = $_POST['profit'];
            $purchase = $_POST['purchase'];
            $customers = $_POST['customers'];

            $quant = $quant;
            $total = $amnt * $quant;
            $profit = $total - $quant * $purchase;
            }
        ?>

  <form action="" method="POST">
    
     <div class="row">
      <div class="col-md-12">
       <label for="dateToday" class="form-label">Date Today </label>
       <input type="text" name="dates" class="form-control" value="<?php echo $date->format("Y/m/d"); ?>" readonly >
      </div>

      <div class="col-md-12 mt-2">
       <label for="customer" class="form-label">Customers</label>
       <select name="customers" class="form-select" readonly>

       <?php
        require('config.php');
        $query="SELECT * FROM customers";
        $result=mysqli_query($db_link, $query);
        while ($row1=mysqli_fetch_array($result)){?>
          
        <option><?php echo $row1['name']; ?></option>
                    
        <?php
        }?>

       </select>
         
      </div>
      <div class="col-md-12 mt-2">
       <label for="category" class="form-label">Category</label>
       <input type="text" class="form-control" name="category" value="<?php echo @$row['category'];?>" readonly>
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Product Name</label>
       <input type="text" class="form-control" name="name" value="<?php echo @$row['name'];?>" readonly>
      </div>
      <div class="col-md-12 mt-2">
       <input type="text" id="txtbox" name="purchase" value="<?php echo @$row['purchase'];?>" hidden>
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Retail</label>
       <input type="text" class="form-control" name="amount" value="<?php echo @$row['retail'];?>" readonly >
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Quantity</label>
         <input type="number" class="form-control" name="quant" value="<?php echo @$quant ?>" placeholder="Enter Quantity" required>
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Total Payable Amount <input type="submit" class="btn btn-secondary" name="calculate" value="Compute"></label>
         <input type="text" class="form-control" name="total" value="<?php echo @$total ?>" readonly>
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Profit</label>
         <input type="text" class="form-control" name="profit" value="<?php echo @$profit ?>" readonly>
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Cash Given <button class="btn btn-secondary" name="sub" id="btncalc">Compute</button></label>
         <input type="number" class="form-control" name="tendered" value="<?php echo @$ten ?>" placeholder="Tendered" >
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Return Change</label>
         <input type="text" class="form-control" name="changed" value="<?php echo @$change ?>" readonly>
      </div>
      <div class="col-md-12 mt-2">
       <label class="form-label">Tracking Number</label>
         <input type="text" class="form-control" name="tracking" value="<?php echo @$tracking ?>" placeholder="Tracking Number">
      </div>
      <div class="col-md-12 mt-4 mb-2" style="text-align: right;">
        <button type="Submit" class="btn btn-primary" name="update" >Add</button>
        <a href="sales.php" class="btn btn-danger">Cancel</a>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/modalvalidation.js"></script>

</body>

</html>