
<?php
session_start(); //session start
function redirect() //if counter > 4, end the quiz 
{
     header('location:gameover.php');
     exit;
 }

//logout button, destroy all record of current session
if(isset($_POST['logout'])) 
{
    unset($_SESSION['quiz']);
    session_destroy();
    header('location:index.php');
}

if(isset($_SESSION["eng"])) 
{
    shuffle($_SESSION['eng'] );
                          
}
                        
if(isset($_SESSION["questions"])) 
{
shuffle($_SESSION['questions'] );
                          
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
        input[type=submit] 
        {
            width: 130px;
            height: 30px;
            margin-left: 20px;
        }
        label
         {
              height: 20px;
              width: 100px;
              margin-left: 200px;

        }
        .container4
        {
            position: fixed;
            left: 31.5%;
            top: 30%;
            margin-left: -350px;
            width: 550px;
            height: 300px;
            margin-top: -30px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
            padding-top: 50px;
            background-color: ghostwhite;
            color: #222222;
            text-align: center;
            font-family: serif;
            font-size: 18px;

        }
               
        </style>
        
    </head>
    <body>   
        <!--top navigation-->
        <div class="topnav" style="background-color: #ecebe2">


            <form action="" method="post">
              <input type="hidden" name="logout" value="true" />
              <!--logout button-->
              <button style=" background-color:#ecebe2 ;border: none;padding-bottom: 15px;font-size: 16px;width:120px;padding-top: 19px;color: gray;">Logout</button>
            </form>

            <!--logo-->
            <div class="logo-image1">
                <img src="image/score.png" class="img-fluid" height="45px" style="float:right;padding-top: 15px;" >
            </div>
        </div>
        <!--1st container-->
        <div class="container" style="background-color:#e3e4e0;   width: 800px;height: 500px;margin-top: 150px;margin-left: auto;margin-right: auto;"><br>
      
              <?php

              $select = $_SESSION['select'];//retrive the selected radio button's value
              if($select=='lit')//if user choose literature
              {
                //store 10 questions & answer in $eng[]
                $eng[] =
                [
                    "left" => "Helped by his slave Morgiana, who foiled the 40 thieves?" ,
                    "correctAnswer" => "Ali Baba",
                    "firstIncorrectAnswer" => "Peter Piper",
                    "secondIncorrectAnswer" => "Bucket"
                ];
                $eng[] =
                [
                    "left" => "What is the name of Eoin Colfer’s teenage criminal mastermind?",
                    "correctAnswer" => "Artemis Fowl",
                    "firstIncorrectAnswer" => "Aladdin",
                    "secondIncorrectAnswer" => "Collage"
                ];
                $eng[] =
                [
                    "left" => "Who has a dog called Snowy and is friends with Captain Haddock?",
                    "correctAnswer" => "Tintin",
                    "firstIncorrectAnswer" => "The Snow Queen",
                    "secondIncorrectAnswer" => "Artemis Fowl"
                ];
                $eng[] =
                [
                "left" => "Who created Tracy Beaker?",
                "correctAnswer" => "Jacqueline Wilson",
                "firstIncorrectAnswer" => "Goldilocks",
                "secondIncorrectAnswer" => "Eeyore"
                ];
                $eng[] =
                [
                "left" => "What was the name of Harry Potter’s pet owl?",
                "correctAnswer" => "Hedwig",
                "firstIncorrectAnswer" => "Pinocchio",
                "secondIncorrectAnswer" => "Baloo"
                ];
                $eng[] =
                [
                "left" => "In a nursery rhyme, how much are the bells of St Martin’s owed?",
                "correctAnswer" => "Five farthings ",
                "firstIncorrectAnswer" => "A Troll",
                "secondIncorrectAnswer" => "Leonardo da Vinci"
                ];
                $eng[] =
                [
                "left" => "In Charlie and the Chocolate Factory, what is Charlie’s surname?",
                "correctAnswer" => "Bucket",
                "firstIncorrectAnswer" => "Robin Hood",
                "secondIncorrectAnswer" => "The Grinch"
                ];
                $eng[] =
                [
                "left" => "What is the name of the recreated theatre from Shakespeare’s time in London?",
                "correctAnswer" => "The Globe",
                "firstIncorrectAnswer" => "Humpty Dumpty",
                "secondIncorrectAnswer" => "Getafix"
                ];
                $eng[] =
                [
                "left" => "What is the name of the wizard at the court of King Arthur?",
                "correctAnswer" => "Merlin",
                "firstIncorrectAnswer" => "Lions",
                "secondIncorrectAnswer" => "Aslan"
                ];
                $eng[] =
                [
                "left" => "Who is the bear in The Jungle Book",
                "correctAnswer" => "Baloo",
                "firstIncorrectAnswer" => "Merlin",
                "secondIncorrectAnswer" => "Neil Gaiman"
                ];
                     
                        //get user's chosen answers
                        $answer = trim(filter_input(INPUT_POST, "answer", FILTER_SANITIZE_STRING));


                        //set number of correct and incorrect answers
                        if(!isset($_SESSION["ccorrect"]))
                        {
                          $_SESSION["ccorrect"] = 0;
                        }
                        if(!isset($_SESSION["cwrong"]))
                        {
                          $_SESSION["cwrong"] = 0;
                        }

                        //shuffle questions and hold them in $_SESSION Variable
                        if(!isset($_SESSION["eng"])) 
                        {

                          shuffle($eng);
                          $_SESSION['eng'] = $eng;
                        }



                        //keep track of what question the quiz is on
                        if ((!isset($_SESSION["counter"]) || $_SESSION["counter"] > 4))
                        {
                          $_SESSION["counter"] = 1;
                        } 
                        else if($_SERVER["REQUEST_METHOD"] == "POST") 
                        {
                          $_SESSION["counter"]++;
                        }

                          
                          $index = $_SESSION["counter"] - 1;

                          if(!empty($answer))
                          {
                         
                              if($_SESSION["eng"][$index - 1]["correctAnswer"] == $answer)
                              {
                                $_SESSION["ccorrect"] += 1;//if correct +1
                              }
                              else 
                              {
                                $_SESSION["cwrong"] -= 1; //if incorrect -1
                              }
                              echo "<br></br>";
                              echo "<br></br>";
                          }
                   
                          if ($_SESSION["counter"] > 4) 
                          {
                            //if counter>4, call redirect() function
                            redirect();
                          }

                            //store mcq option in array
                            $choices = [
                              $_SESSION['eng'][$index]["correctAnswer"],
                              $_SESSION['eng'][$index]["firstIncorrectAnswer"],
                              $_SESSION['eng'][$index]["secondIncorrectAnswer"],
                            ];
                            shuffle($choices); //shuffle the array

// var_dump( $_SESSION['questions'][$index]['correctAnswer']);
?> 
          <div class="container4">
          
          
            <br><!--display question-->
            <p> <?php echo "Question "  . $_SESSION["counter"]; ?></p>
                  <p><?php echo $_SESSION['eng'][$index]["left"];?></p>
                  <form action="submit.php" method="post">
                      <!--display option-->
                      <input type="submit" class="btn" name="answer" value="<?php echo $choices[0];?>" />
                      <input type="submit" class="btn" name="answer" value="<?php echo $choices[1];?>" />
                      <input type="submit" class="btn" name="answer" value="<?php echo $choices[2];?>" />
                  </form>
          </div>
<?php
}

            else//if user select math
            {
                //store 10 ans and ques in array
                $questions[] =
                [
                    "left" => "3 +" ,
                    "right" => 4,
                    "correctAnswer" => 7,
                    "firstIncorrectAnswer" => 8,
                    "secondIncorrectAnswer" => 10
                ];
                $questions[] =
                [
                    "left" => "15 - ",
                    "right" => 3,
                    "correctAnswer" => 12,
                    "firstIncorrectAnswer" => 7,
                    "secondIncorrectAnswer" => 10
                ];
                $questions[] =
                [
                    "left" => "5 x ",
                    "right" => 3,
                    "correctAnswer" => 15,
                    "firstIncorrectAnswer" => 9,
                    "secondIncorrectAnswer" => 6
                ];
                $questions[] =
                [
                "left" => "50 &divide; ",
                "right" => 10,
                "correctAnswer" => 5,
                "firstIncorrectAnswer" => 6,
                "secondIncorrectAnswer" => 7
                ];
                $questions[] =
                [
                "left" => "9 + ",
                "right" => 2,
                "correctAnswer" => 11,
                "firstIncorrectAnswer" => 12,
                "secondIncorrectAnswer" => 15
                ];
                $questions[] =
                [
                "left" => "23 - ",
                "right" => 4,
                "correctAnswer" => 19,
                "firstIncorrectAnswer" => 20,
                "secondIncorrectAnswer" => 21
                ];
                $questions[] =
                [
                "left" => "5 x ",
                "right" => 8,
                "correctAnswer" => 40,
                "firstIncorrectAnswer" => 46,
                "secondIncorrectAnswer" => 42
                ];
                $questions[] =
                [
                "left" => "20 &divide; ",
                "right" => 5,
                "correctAnswer" => 4,
                "firstIncorrectAnswer" => 6,
                "secondIncorrectAnswer" => 7
                ];
                $questions[] =
                [
                "left" => "2 + ",
                "right" => 19,
                "correctAnswer" => 21,
                "firstIncorrectAnswer" => 22,
                "secondIncorrectAnswer" => 25
                ];
                $questions[] =
                [
                "left" => "26 - ",
                "right" => 3,
                "correctAnswer" => 23,
                "firstIncorrectAnswer" => 29,
                "secondIncorrectAnswer" => 30
                ];

                          //retreive the chosen answer
                         $answer = trim(filter_input(INPUT_POST, "answer", FILTER_SANITIZE_STRING));


                        //set number of correct and incorrect answer
                        if(!isset($_SESSION["ccorrect"]))
                        {
                          $_SESSION["ccorrect"] = 0;
                        }
                        if(!isset($_SESSION["cwrong"]))
                        {
                          $_SESSION["cwrong"] = 0;
                        }
						
                        //shuffle questions and hold them in $_SESSION Variable
                        if(!isset($_SESSION["questions"])) 
                        {
                          shuffle($questions);
                          $_SESSION['questions'] = $questions;
                        }
                   


                        //keep track of what question the quiz is on
                        if ((!isset($_SESSION["counter"]) || $_SESSION["counter"] > 4))
                        {

                          $_SESSION["counter"] = 1;

                        } else if($_SERVER["REQUEST_METHOD"] == "POST") 
                        {
                            $_SESSION["counter"]++;
                        }

                        //else {
                            //$_SESSION["counter"] += 1;
                        //}

                        //set the counter to 0
                        $index = $_SESSION["counter"] - 1;

                        if(!empty($answer))
                        {
                       
                              if($_SESSION["questions"][$index - 1]["correctAnswer"] == $answer)
                              {
                                $_SESSION["ccorrect"] += 1; //if correct
                                
                              }
                              else 
                              {
                                $_SESSION["cwrong"] -= 1;//if incorrect
                                
                              }
                              echo "<br></br>";
                              echo "<br></br>";
                        }
                  
                        if ($_SESSION["counter"] > 4) 
                        {
                          redirect();

                        }


                        $choices = [
                          $_SESSION['questions'][$index]["correctAnswer"],
                          $_SESSION['questions'][$index]["firstIncorrectAnswer"],
                          $_SESSION['questions'][$index]["secondIncorrectAnswer"],
                        ];
                        shuffle($choices);

// var_dump( $_SESSION['questions'][$index]['correctAnswer']);
?> <div class="container4">
    
    
        <br>
      <p> <?php echo "Question "  . $_SESSION["counter"] ; ?></p>
            <p><?php echo "What is " . $_SESSION['questions'][$index]["left"] . "  " . $_SESSION['questions'][$index]["right"];?></p>
            <br>
            <form action="submit.php" method="post">
                <input type="submit" class="btn" name="answer" value="<?php echo $choices[0];?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $choices[1];?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $choices[2];?>" />
            </form>
     
    
</div>
<?php

}
    ?>


           </div>

            

        </div>



    
   
</body>
</html>