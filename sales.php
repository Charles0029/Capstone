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
      <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
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
              <th scope="col">Price</th>
              <th scope="col">Qty. left</th>
              <th scope="col">Supplier</th>
              <th scope="col">Pick Order</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="images/apple.jpg" alt=""></td>
              <td>Finger Food</td>
              <td>Beta max</td>
              <td>Php 4</td>
              <td>100 pcs.</td>
              <td>Mangboks betamax</td>
              <td><button type="button" class="btn btn-sm btn-danger">Pick Order</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>