<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
   <title>FMS</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png"  href="https://computerpark.online/public/img/favicon/apple-icon-57x57.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="h-100">
    <?php
	if(isset($_GET['reset_flag']))
	{
		?>
		<script>
		swal("Password rest link has been send to given email id!");
		</script>
		<?php
	}
	if(isset($_GET['reset_flag_failed']))
	{
		?>
		<script>
		swal("Invalid Email Id.No user assosiated with given email id!");
		</script>
		<?php
	}
	if(isset($_GET['reset_failed']))
	{
		?>
		<script>
		swal("Can not change !Plase try again");
		</script>
		<?php
	}
	if(isset($_GET['reset_sucess']))
	{
		?>
		<script>
		swal("Successfully changed password please login to countinue!");
		</script>
		<?php
	}
	?>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <center><img src="images/login.png" style="max-width:70%;max-height:70px" ></img>
								</center>
                                <form class="mt-5 mb-5 login-input" id="LoginForm" action="../login/checklogin.php" onsubmit="CheckLogin(event)">
                                    <div class="form-group">
                                        <input required type="email" class="form-control" name="username" title="please enter a valid email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}"  placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input required type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" id="loginSubmit" class="btn login-form__btn submit w-100">Sign In</button>
									
									<br>
									<br>
									<a href="forgot_password.php"  >Forgot Password</a>
									<br>
									<br>
									<a href="index.php"  class="btn btn-danger w-100">Go to home page</a>
									<br>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
	<script src="js/login.js"></script>
</body>
</html>





