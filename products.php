<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/styles.css">
 <title>Products</title>
</head>

<body id="body-pd" class="bg-light">
 <header class="header" id="header">
  <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
 </header>
 <div class="l-navbar" id="nav-bar">
  <nav class="nav">
   <div>
    <a href="dashboard.php" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">CV-GFOXX</span> </a>
    <div class="nav_list">
     <a href="dashboard.php" class="nav_link "><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
     <a href="sales.php" class="nav_link"><i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
     <a href="products.php" class="nav_link active"><i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
     <a href="suppliers.php" class="nav_link"><i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
     <a href="customers.php" class="nav_link"><i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers</span> </a>
     <a href="salesReport.php" class="nav_link"><i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Sales Report</span> </a>
    </div>
   </div>
   <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
  </nav>
 </div>

 <!--Container Main start-->
 <div class="height-100">
  <div class="row">
   <div class="col-md">
    <h1><b>CV-GFOXX Products <i class='bx bx-box'></i></b></h1>
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
    <div class="col-lg-5" style="display: inline-flex;">
     <input type="text" class="form-control" id="" placeholder="Search product...">
     <button class="btn btn-primary " style="margin-left: 7px;">Search</button>
    </div>
   </div>

   <div class="tableData overflow-auto">
    <table class="table mt-4 table-hover">
     <thead class="table-dark">
      <tr>
       <th scope="col">Image</th>
       <th scope="col">Category</th>
       <th scope="col">Name</th>
       <th scope="col">Qty. left</th>
       <th scope="col">Purchase</th>
       <th scope="col">Retail</th>
       <th scope="col">Supplier</th>
       <th scope="col">Status</th>
       <th scope="col">Action</th>
      </tr>
     </thead>
     <tbody>
      <tr>
       <td><img src="images/apple.jpg" alt=""></td>
       <td>Finger Food</td>
       <td>Beta max</td>
       <td>100 pcs.</td>
       <td>Php 3</td>
       <td>Php 4</td>
       <td>Mangboks betamax</td>
       <td>FAST MOVING</td>
       <td>
        <button type="button" class="btn btn-sm btn-warning">Edit</button>
        <button type="button" class="btn btn-sm btn-danger">Delete</button>
       </td>
      </tr>
     </tbody>
    </table>
   </div>
   <button type="button" class="btn btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product <i class='bx bx-plus nav_icon' style="transform: translateY(3px);"></i></button>
  </div>
 </div>
 </div>


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add Product Form</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <form action="">
      <div class="row">
       <div class="col-md-12">
        <label for="productCategory" class="form-label">Category</label>
        <select name="productCategory" class="form-select">
         <option selected>Health and Wellness</option>
         <option>Beauty and Cosmetics</option>
         <option>Weight Management</option>
        </select>
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