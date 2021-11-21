<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/styles.css">
 <title>Customers</title>
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
     <a href="sales.php" class="nav_link"> <i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
     <a href="products.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
     <a href="suppliers.php" class="nav_link"> <i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
     <a href="customers.php" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers</span> </a>
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
    <h1><b>CV-GFOXX Customers <i class='bx bx-user'></i></b></h1>
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
     <h4 class="mt-1 mb-1">Customer Information Table</h4>
    </div>
    <div class="col-lg-5" style="display: inline-flex;">
     <input type="text" class="form-control" id="" placeholder="Search product...">
     <button class="btn btn-primary " style="margin-left: 7px;">Search</button>
    </div>
   </div>

   <div class="tableData overflow-auto">
    <table class="table mt-4 table-hover">
     <thead class="table-dark">
      <tr>
       <th scope="col">Name</th>
       <th scope="col">Contact</th>
       <th scope="col">Address</th>
       <th scope="col">Note</th>
       <th scope="col">Action</th>
      </tr>
     </thead>
     <tbody>
     <?php
        require('config.php');
        $query="SELECT * FROM customers";
        $result=mysqli_query($db_link, $query);
        while ($row=mysqli_fetch_array($result)){?>
        <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['contact']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['note']; ?></td>
        <td><a href="delete_customer.php?id=<?php echo md5($row['id']);?>" type="button" class="btn btn-sm btn-danger">Delete</a></td>
        </tr>

    <?php
    }
    ?>
     </tbody>
    </table>
   </div>
   <button type="button" class="btn btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Customer <i class='bx bx-user nav_icon' style="transform: translateY(3px);"></i></button>
  </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add Customer Form</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <form action="add_customer.php" method="POST">
      <div class="row">
       <div class="col-md-12 mt-2">
        <label for="customerName" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
       </div>
       <div class="col-md-12 mt-2">
        <label for="customerContact" class="form-label">Contact</label>
        <input type="text" class="form-control" name="contact" placeholder="Enter Contact">
       </div>
       <div class="col-md-12 mt-2">
        <label for="customerAddress" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Enter Address">
       </div>
       <div class="col-md-12 mt-2">
        <label for="customerNote" class="form-label">Note</label>
        <textarea class="form-control" name="note" placeholder="Leave a Note here" name="customerNote" style="height: 100px"></textarea>
       </div>
       <div class="col-md-12 mt-4 mb-2" style="text-align: right;">
        <button class="btn btn-primary">Add Product</button>
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