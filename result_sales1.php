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
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="dashboardsales.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">CV-GFOXX</span> </a>
        <div class="nav_list">
          <a href="dashboardsales.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
          <a href="sales1.php" class="nav_link active"> <i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
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
        <form class="col-lg-5" style="display: inline-flex;" action="result_sales1.php" method="GET">
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
            session_start();
            require('config.php');
            if(isset($_GET['search'])){   
                $query = $_GET['product'];
                $sql="select * from products where category like '%$query%' or name like '%$query%'";
                $result = $db_link->query($sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_array()){
            ?>

            <tr>
              <td><img src="images/apple.jpg" alt=""></td>
              <td> <?php echo $row['category']; ?></td>
              <td> <?php echo $row['name']; ?></td>
              <td> <?php echo $row['retail']; ?></td>
              <td> <?php echo $row['quantity']; ?></td>
              <td> <?php echo $row['supplier']; ?></td>
              <td><button type="button" data-bs-toggle="modal" data-bs-target="#salesModal" class="btn btn-sm btn-danger">Pick Order</button></td>
            </tr>
              
            <?php
                    }
                }
            }?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  
   <!-- Modal -->
 <div class="modal fade" id="salesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Transaction Form</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <form action="">
      <div class="row">
       <div class="col-md-12">
        <label for="productCategory" class="form-label">Date Today</label>
        <?php $date = new DateTime("now", new DateTimeZone('Asia/Manila')); ?>
        <p>Today is <?php echo $date->format('l jS \of F Y'); ?></p>
       </div>
       <div class="col-md-12 mt-2">
        <label for="productName" class="form-label">Name</label>
        <input type="text" class="form-control" name="productName" placeholder="...">
       </div>
       <div class="col-md-12 mt-2">
        <label for="productQty" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="productQty" placeholder="...">
       </div>
       <div class="col-md-12 mt-2">
        <label for="productPurchaseAmount" class="form-label">Purchase Amount</label>
        <input type="number" class="form-control" name="productPurchaseAmount" placeholder="...">
       </div>
       <div class="col-md-12 mt-2">
        <label for="productRetail" class="form-label">Retail</label>
        <input type="number" class="form-control" name="productRetail" placeholder="...">
       </div>
       <div class="col-md-12 mt-2">
        <label for="productSupplier" class="form-label">Supplier</label>
        <select name="productSupplier" class="form-select">
         <option selected>Mangboks Betamax</option>
         <option>Siomai tbp.</option>
         <option>Stick Fish ball</option>
         <option>Kakanin atb.</option>
         <option>Street Quek Quek</option>
        </select>
       </div>
       <div class="col-md-12 mt-4 mb-2" style="text-align: right;">
        <button class="btn btn-primary">Add</button>
        <button class="btn btn-danger">Cancel</button>
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
</body>

</html>