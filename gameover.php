<?php

session_start();

if(isset($_POST['logout'])) 
{
    unset($_SESSION['quiz']);
    session_destroy();
    header('location:index.php');
}
if(isset($_POST['tryagain']))
{
	$_SESSION["ccorrect"]=0;
	$_SESSION["cwrong"]=0;
	shuffle($_SESSION['eng'] );
	unset($_SESSION['eng']);
	unset($_SESSION['questions']);
	header('location:tryagain.php');
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
       
        <style type="text/css">
        .container3
        {
        	margin-top: 70px;
        	height: 400px;
        }
		</style>
        
    </head>
    <body style=" background-image: url('image/b11.jpeg');">   
        <!--top navigation-->
        <div class="topnav" style="background-color: #ecebe2">
        
            <!--hyperlink of home-->
            
            <form action="" method="post">
	            <input type="hidden" name="logout" value="true" />
	            <button style=" background-color:#ecebe2 ;border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 19px;color: gray; ">Logout</button>
        	</form>

       
            <!--logo-->
            <div class="logo-image1">
                <img src="image/score.png" class="img-fluid" height="45px" style="float:right;padding-top: 8px;" >
            </div>
        </div>

        <div class="container" style="background-color:#e3e4e0;width: 800px;height: 700px;margin-top: 100px;margin-left: auto;margin-right: auto;margin-bottom: 100px;"><br>
			<div class="container3">
        	<?php
			
			
			echo "<h4>Game Over</h4>";

			echo "Correct = ". $_SESSION["ccorrect"];
			echo "<br></br>";
			echo "Incorrect = ". $_SESSION["cwrong"];
			echo "<br></br>";
			$ccorrectatotal =  $_SESSION["ccorrect"] * 5;
			$cwrongatotal =  $_SESSION["cwrong"] * 3;
			$cattempt =  $ccorrectatotal + $cwrongatotal;
			
			
		
			//getting overall score
			if(!isset($_SESSION["overall"]))
				{
					$_SESSION["overall"] = 0;
			 	
				}
				
				
			$_SESSION["overall"] = $_SESSION["overall"]+$cattempt;
			
			echo "Current attempt total score = " .$cattempt. "<br> <br>";
			echo "Your overall score =  ".$_SESSION["overall"]. "<br><br><br> ";
			
			 
            
        	?>
			<!tryagain button>
            <form action="" method="post">
	            <input type="hidden" name="tryagain" value="true" />
	            
				<button style=" border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 15px;color: gray; background-color: #c6d4db;" id="tryagain"  >TRY AGAIN</button>  <br><br> 
	            
        	</form>
			
			
         
	            <form action="" method="post">
		            <input type="hidden" name="logout" value="true" />
					
		            <button style=" border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 15px;color: gray; background-color: lavender;">EXIT</button>
	        	</form>
			<br><br>
     <button style=" border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 15px;color: gray; background-color: lightblue;" onclick="location.href = 'overall.php';" id="OverallButton"  >VIEW OVERALL SCORE SUMMARY</button>  <br><br>  
        	
          
        </div>
 
</body>
</html>
