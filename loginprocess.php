<?php
    session_start();
    require('config.php');
    
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $login="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result_login=mysqli_query($db_link, $login); 
    
        if ($username == "admin" && $password == "admin"){
            header('location:dashboard.php');
        }elseif($username == "salesperson" && $password == "salesperson"){
            header('location:dashboardsales.php');
        }
        else{?>
        <script type="text/javascript">
            alert("USERNAME/ PASSWORD IS INVALID");
            window.location.href = "login.php";
        </script>
        <?php
        }
        mysqli_close($db_link);

?>