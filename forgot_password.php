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
    
</head>

<body class="h-100">
    
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
								<?php
								if(isset($_GET['flag']))
								{
									require_once"../config/db_connect.php";
									$obj=new db_connect;
									$user=$obj->decrypt($_GET['flag']);
									$check_username=$obj->select_any_one("tbl_login_info","username='".$user."' and password=''");
									if($check_username['username']!='')
									{
									?>
									  <form class="mt-5 mb-5 login-input"  action="../user/Action/Actionuser_management.php" >
                                    <div class="form-group">
                                        <div class="form-group">
                                        <input required type="password" name="new_password_rest" class="form-control" placeholder="Enter new password">
                                    </div>
										<input type="hidden" name="my_id" value="<?=$check_username['login_info_id'];?>">
										
                                    </div>
                                   
                                    <button type="submit"  class="btn login-form__btn submit w-100">Change My Password</button>
									
									
									<br>
									<br>
									<a href="index.php"  class="btn btn-danger w-100">Go to home page</a>
									<br>
                                </form>
									<?php
									}
									else
									{
										echo"Invalid Link";
									}
								}
								else
								{
								?>
                                <form class="mt-5 mb-5 login-input"  action="../user/Action/Actionuser_management.php" >
                                    <div class="form-group">
                                        <input required type="email" class="form-control" name="forgot_email" title="please enter a valid email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}"  placeholder="Enter Your Email here">
                                    </div>
                                   
                                    <button type="submit"  class="btn login-form__btn submit w-100">Get Reset Password Link</button>
									
									
									<br>
									<br>
									<a href="index.php"  class="btn btn-danger w-100">Go to home page</a>
									<br>
                                </form>
                                <?php
								}
								?>
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





