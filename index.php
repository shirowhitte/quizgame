<?php
session_start();//start the session
$pname = $select = $pnameErr = ""; //declare empty variable
if (($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit']))//if form submitted
{
    if(empty($_POST["pname"]))
    {
        $pnameErr = "Name is required";//check if empty
    }
    else
    {
        $pname = test_input($_POST["pname"]);//save the value
        $pnameErr = "";
        $select = test_input($_POST["select"]);//save the value
        $_SESSION['pname'] = $_POST['pname'];//pass value to another .php
        $_SESSION['select'] = $_POST['select'];//pass value to another .php
        header('location:start.php');//redirect to start.php

    }
    
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Score it!</title>
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!--load .css-->
        <link href="material.css" rel="stylesheet">
        
    </head>
    <body>   
        <!--top navigation-->
        <div class="topnav" style="background-color: #ecebe2">
        
            <!--logo-->
            <div class="logo-image1">
                <img src="image/score.png" class="img-fluid" height="45px" style="float:right;padding-top: 8px;" >
            </div>
        </div>
        <!--container-->
        <div class="container" style="background-color:#ede9e4;width: 800px;height: 500px;margin-top: 150px;margin-left: auto;margin-right: auto;"><br>
            <!--form-->
            <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                <h2 style="padding-top: 35px; padding-bottom: -200px;text-align: center;color:#414042;font-family: Times New Roman, Times, serif;">PLAYER NAME</h2> 
                <h3 style="padding-top: 20px; padding-bottom: 20px;text-align: center;color:white;font-family: Times New Roman, Times, serif;">
                    <span class="error"> <?php echo $pnameErr; ?> <br> </span>
                    <input style="border-radius: 10px; width:240px;height:30px; border: none; padding: 5px;padding-left: 10px;"type="text" name="pname" value="" placeholder="Insert Name">
                </h3>

                <section>
                <!--radio button for user to choose either one-->
                <div>
                  <input type="radio" id="math" name="select" value="math" checked>
                  <label for="math">
                    <br>
                    <h2> <i class="fas fa-calculator" aria-hidden="true"></i></h2>
                    <h2>Mathematics</h2>
                  </label>
                </div>
                <div>
                  <input type="radio" id="lit" name="select" value="lit">
                  <label for="lit">
                    <br>
                    <h2><i class="fa fa-language" aria-hidden="true"></i></h2>
                    <h2>English Literature</h2>
                  </label>
                </div>
                </section>
                <!--post to self upon submission-->
                <input style="border:none;color:gray;background-color: #f6f6eb;"type="submit" name="submit" value="Next >>">
            </form>
        </div>
 
</body>
</html>