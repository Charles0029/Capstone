<?php
session_start();
include "config.php";

// SALES PAGE
// transaction form
if (isset($_POST['submitSaleForm'])) {
 $id = $_POST['id'];
 $curQty = $_POST['curQty'];
 $curDate = $_POST['curDate'];
 $customers = $_POST['customers'];
 $category = $_POST['category'];
 $pName = $_POST['pName'];
 $retail = $_POST['retail'];
 $qty = $_POST['qty'];
 $ta = $_POST['ta'];
 $profit = $_POST['profit'];
 $tendered = $_POST['tendered'];
 $change = $_POST['change'];
 // newQty deduction for pick order
 $newQty = $curQty - $qty;
 $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$curDate', '$customers', '$category', '$pName', '$retail', '$qty', '$ta', '$profit', '$tendered', '$change')") or die($db_link->error);

 #update products table
 $db_link->query("UPDATE products SET quantity='$newQty' WHERE id=$id") or die($db_link->error);
 header("Location: sales.php");
}

// SALESPERSON PAGE
// transaction form
if (isset($_POST['submitSalespersonForm'])) {
    $id = $_POST['id'];
    $curQty = $_POST['curQty'];
    $curDate = $_POST['curDate'];
    $customers = $_POST['customers'];
    $category = $_POST['category'];
    $pName = $_POST['pName'];
    $retail = $_POST['retail'];
    $qty = $_POST['qty'];
    $ta = $_POST['ta'];
    $profit = $_POST['profit'];
    $tendered = $_POST['tendered'];
    $change = $_POST['change'];
    // newQty deduction for pick order
    $newQty = $curQty - $qty;
    $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$curDate', '$customers', '$category', '$pName', '$retail', '$qty', '$ta', '$profit', '$tendered', '$change')") or die($db_link->error);
   
    #update products table
    $db_link->query("UPDATE products SET quantity='$newQty' WHERE id=$id") or die($db_link->error);
    header("Location: sales1.php");
   }


// PRODUCT PAGE
// add form
if (isset($_POST['addProduct']) && isset($_FILES['my_image'])) {
 $productCategory = $_POST['productCategory'];
 $productName = $_POST['productName'];
 $productQty = $_POST['productQty'];
 $productPurchaseAmount = $_POST['productPurchaseAmount'];
 $productRetail = $_POST['productRetail'];
 $productSupplier = $_POST['productSupplier'];
 $my_image = $_POST['my_image'];

 // img validation
 $img_name = $_FILES['my_image']['name'];
 $img_size = $_FILES['my_image']['size'];
 $tmp_name = $_FILES['my_image']['tmp_name'];
 $error = $_FILES['my_image']['error'];

 $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
 $img_ex_lc = strtolower($img_ex);
 $allowed_exs = array("jpg", "jpeg", "png");

 if (in_array($img_ex_lc, $allowed_exs)) {
  $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
  $img_upload_path = 'uploads/' . $new_img_name;
  move_uploaded_file($tmp_name, $img_upload_path);
  $db_link->query("INSERT INTO products (category, name, quantity, purchase, retail, supplier, img_url) VALUES('$productCategory', '$productName', '$productQty', '$productPurchaseAmount', '$productRetail', '$productSupplier', '$new_img_name')") or die($db_link->error);
  header('location: products.php');
 }
}

// edit form
if (isset($_POST['updateFormProducts'])) {
 $id = $_POST['id'];
 $category = $_POST['category'];
 $name = $_POST['name'];
 $qty = $_POST['qty'];
 $pa = $_POST['pa'];
 $retail = $_POST['retail'];
 $suppliers = $_POST['suppliers'];
 $db_link->query("UPDATE products SET category='$category', name='$name', quantity='$qty', purchase='$pa', retail='$retail', supplier='$suppliers' WHERE id=$id") or die($db_link->error);
 header("Location: products.php");
}

// delete
if (isset($_GET['delete'])) {
 $id = $_GET['delete'];
 $db_link->query("DELETE FROM products WHERE id=$id") or die($db_link->error);
 header("Location: products.php");
}


// SUPPLIERS PAGE
// add supplier
if (isset($_POST['addSupplier'])) {
 $supplierName = $_POST['supplierName'];
 $supplierContactPerson = $_POST['supplierContactPerson'];
 $supplierAddress = $_POST['supplierAddress'];
 $supplierContactNo = $_POST['supplierContactNo'];
 $supplierNote = $_POST['supplierNote'];
 $db_link->query("INSERT INTO supplier (suppliername, contactperson, address, contactno, note) VALUES('$supplierName', '$supplierContactPerson', '$supplierAddress', '$supplierContactNo', '$supplierNote')") or die($db_link->error);
 header("Location: suppliers.php");
}

// edit
if (isset($_POST['updateFormSupplier'])) {
 $id = $_POST['id'];
 $supplierName = $_POST['supplierName'];
 $contactperson = $_POST['contactperson'];
 $address = $_POST['address'];
 $contactno = $_POST['contactno'];
 $note = $_POST['note'];
 $db_link->query("UPDATE supplier SET suppliername='$supplierName', contactperson='$contactperson', address='$address', contactno='$contactno', note='$note' WHERE id=$id") or die($db_link->error);
 header("Location: suppliers.php");
}

// delete
if (isset($_GET['deleteSupplier'])) {
 $id = $_GET['deleteSupplier'];
 $db_link->query("DELETE FROM supplier WHERE id=$id") or die($db_link->error);
 header("Location: suppliers.php");
}


// CUSTOMERS PAGE
// add customer
if (isset($_POST['addCustomer'])) {
 $customerName = $_POST['customerName'];
 $customerContact = $_POST['customerContact'];
 $customerAddress = $_POST['customerAddress'];
 $customerNote = $_POST['customerNote'];
 $db_link->query("INSERT INTO customers (name, contact, address, note) VALUES('$customerName', '$customerContact', '$customerAddress', '$customerNote')") or die($db_link->error);
 header("Location: customers.php");
}

// delete
if (isset($_GET['deleteCustomer'])) {
 $id = $_GET['deleteCustomer'];
 $db_link->query("DELETE FROM customers WHERE id=$id") or die($db_link->error);
 header("Location: customers.php");
}
