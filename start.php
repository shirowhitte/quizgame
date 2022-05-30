
<?php
session_start(); //session start
if(isset($_SESSION['quiz'])) //count the number of attempt
{
    $_SESSION['quiz'] -= 1;
}
else
{
    $_SESSION['quiz']=5; //first attempt
}

//logout button, destroy all record of current session
if(isset($_POST['logout'])) 
{
    unset($_SESSION['quiz']);
    session_destroy();
    header('location:index.php');
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
        <!--load .css-->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="material.css" rel="stylesheet">
        <style>
            input 
            {
                width: 300px;
                height: 100px;
            }
            label
            {
                height: 20px;
                width: 100px;
                margin-left: 200px;

            }
            .font
            {
                font-family: sans-serif;
                color: gray;
            }

        </style>
        
    </head>
    <body style=" background-image: url('image/b11.jpeg');">   
        <!--top navigation-->
        <div class="topnav" style="background-color: #ecebe2">
        
            <form action="" method="post">
                <input type="hidden" name="logout" value="true" />
                <button style=" background-color:#ecebe2 ;border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 19px;color: gray;">Logout</button>
            </form>

            <!--logo-->
            <div class="logo-image1">
                <img src="image/score.png" class="img-fluid" height="45px" style="float:right;padding-top: 15px;" >
            </div>
        </div>

        <div class="container" style="background-color:#e3e4e0;   width: 800px;height: 500px;margin-top: 150px;margin-left: auto;margin-right: auto;"><br>
             <div class="container3" style="height: 300px;margin-top:45px;">
              <h3 style="margin-top: -6px;text-align: center;color:#414042;font-family: Times New Roman, Times, serif;">Attempt <?php echo $_SESSION['quiz'] ?></h3>


               <?php

               $x = array("a"=> array("b"=>"c", "d"=>"e"),"f"=>array("g"=>"h", "i"=>"j"));

                $y = array_rand($x,2);

                print_r($y);

                
               ?>

        <div class="font"> 
        <?php
            //get user name
            echo "Hi " .  $_SESSION['pname'] . " !". "<br>";
            $select = $_SESSION['select'];
            if($select =='lit')
            {
                //if user choose literature, display:
                echo "You have chosen English Literature !". "<br>";
                echo "Are you ready for the test ?". "<br>";
            }
            else
            {
                //if user choose math, display:
                echo "You have chosen Mathematics !". "<br>";
                echo "Are you ready for the test ?". "<br>";
            }
        ?>
        </div>
        <br><br>
        <!-- start quiz button -->
        <button style=" border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 15px;color: gray; background-color: #c6d4db;" onclick="location.href = 'submit.php';" id="myButton"  >Yes, Start</button>

        <br><br>


                <form action="" method="post">
                    <input type="hidden" name="logout" value="true" />
                    <!-- exit quiz button-->
                    <button style=" border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 15px;color: gray; background-color: lavender;">No, Exit</button>
                </form>

            </div>

       </div>

    </div>
   
   
</body>
</html>