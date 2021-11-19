$(document).ready(function(){
    $('#signin').click(function(){
        user = $('#username').val()
        pass = $('#password').val()
        if (user && pass == "admin"){
            window.location ="dashboard.php";
        }
        else{
            console.log('error');
        }
        console.log(user, pass);    
    })
  })