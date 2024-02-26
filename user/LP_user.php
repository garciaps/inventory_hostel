<?php 
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
?>

  <div class="container">

  <html lang="en">
<head>
  <title>Hostel Tropicana</title>
  <link rel="stylesheet" href="../assets/istayl.css">
  <link rel="icon" type="image/x-icon" href="img/favicon.ICO">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
          body{
          overflow-y:hidden;
              padding: 0;
              margin: 0;
              box-sizing: border-box
      }   
          .container{
              width: 100%;
              height: 100%;
              background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.2)), url('../img/LP.jpg');
              background-size: cover;
              font-family:'Helvetica';
              overflow:hidden;
          }
          .h-text{
              margin-top: 25%;
              max-width: 650px;
              transform: translate(-50%,-50%);
              text-align: center;
              color: #fff;
              position: relative;
              left:-50%;
              animation: anim3 2s forwards 0s;

          }
          @keyframes anim3{
            from{
                left: -50%;
            }
            to{
                left:50%;
            }
          }
          .h-text h1{
              font-size: 3.5em;
              margin-top: -7%;
          }
          .h-text h3{
              font-size: 1em;
              margin-top: -7%;
          }
          .h-text img{
              margin-bottom: 5%;
              width: 80%;
          }
          .h-text button {
                background: linear-gradient(-20deg, #C1FF72 0%, #8ABD49 100%);
    border: none;
    margin-top: 10px;
    margin-bottom: 20px;
    
    text-transform: uppercase;
    color: white;
    border-radius: 10px;
    position: relative;
    z-index: 2;
    font-weight: bold;
    font-size: 20px;
    padding: 20px 50px;

            }

            .h-text button:hover {
                background: -webkit-gradient(linear, left bottom, left top, from(#C1FF72), to(#FFBD59));
  background: -webkit-linear-gradient(bottom, #FFBD59  0%, #FFBD59 100%);
  background: -o-linear-gradient(bottom, #FFBD59  0%, #FFBD59 100%);
  background: linear-gradient(to top, #FFBD59  0%, #FFBD59 100%);
            }

          
          
  </style>
</head>
<body>
    <header>

<section class="h-text">
    
    <!--<h3>Hi! <?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?></h3>-->
    <img src="../img/forlp2.png">
    <h1>Inventory System</h1>
    <br>
    <a href="user_supplies.php"><button>Continue</button></a>
</section>

    </header>
</body>
</html>
  


  </div>
  </div>
<!-- load all modals here -->

<!-- /load all modals here -->
  

</div>




</body>
</html> 

