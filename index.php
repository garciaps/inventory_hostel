<!DOCTYPE html>
<html>
<head>
	<title>Hostel Tropicana</title>
	<link rel="stylesheet" href="assets/istayl.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.ICO">
</head>
    
<body>

				<div class="parent clearfix">
    <div class="bg-illustration">

      <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
    
    <div class="login">
      <div class="container">
        <h1>Log in</h1>
        <div class="login-form">
		<form  role="form" id="form-login">
								<label for="un"><b>Username:</b></label>
									<input type="text" id="un" placeholder="Enter your username">
									<br>
								<label for="pwd"><b>Password:</b></label>
								<input type="password" id="pwd" placeholder="Enter your password">
    							<span class="show-password-icon" onclick="togglePasswordVisibility('pwd')">&#128065;</span>


								<br></center>			
							<button type="submit">Login</button>
						</form>
        </div>

      </div>
      </div>
  </div>

   <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
   <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/js/login.js"></script>


</body>
<style>
	body{
		font-size: 16px;
	}
	.bg-illustration {
	position: relative;
	height: 100vh;
	width: 1194px;
	background: url("img/background.jpg") no-repeat center center scroll;
	background-size: cover;
	float: left;
	-webkit-animation: bgslide 1.0s forwards;
			animation: bgslide 1.0s forwards;
  }
  
.show-password-icon {
    position: absolute;
    top: 56%;
    right: 20px; 
    transform: translateY(-50%);
    cursor: pointer;
	font-size: 25px;
}

</style>
<script> 
function togglePasswordVisibility(inputID) {
        var input = document.getElementById(inputID);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
	</script>

</html>	

<!-- COLOR:#C1FAA9 #FFBD59 -->