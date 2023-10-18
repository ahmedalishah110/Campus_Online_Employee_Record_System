<?php
    ob_start();
	include("../inc/header.php");

	
	if(isset($_POST['changeusername'])){

		$newusername = mysqli_real_escape_string($db_connect, $_POST['username']);
		$password = mysqli_real_escape_string($db_connect, $_POST['password']);
		
		$newpassword = md5(md5($password).md5($newusername));

		$checkpass = mysqli_query($db_connect, "SELECT password FROM users WHERE username = '$username' ");
		$checkpasscount = mysqli_num_rows($checkpass);

		$checkuser = mysqli_query($db_connect, "SELECT user_id FROM users WHERE username = '$newusername' ");
		$checkusercount = mysqli_num_rows($checkuser);
		
			
		ob_end_clean();

		if($checkusercount < 1 ){

			if($checkpasscount){
				if($fetchpass = mysqli_fetch_assoc($checkpass)){
					$oldpassword = $fetchpass['password'];
				}

				$oldpassword1 = md5(md5($password).md5($username));
			}

			if($oldpassword1 == $oldpassword){

				$sql = mysqli_query($db_connect, "UPDATE `users` SET `username` = '$newusername', `password` = '$newpassword' WHERE `user_id` = '$id'");
				
				if($sql){
					echo json_encode(array("status"=>"success"));
					$_SESSION["username"] = $newusername;
					exit();
				} else {
					echo json_encode(array("status"=>"failed"));
					exit();
				}

			} else {
					echo json_encode(array("status"=>"passfailed"));
					exit();
			}
		} else {
			echo json_encode(array("status"=>"userfailed"));
			exit();
		}

	}


	if(isset($_POST['changepassword'])){

		$newpassword = mysqli_real_escape_string($db_connect, $_POST['newpass']);
		$Oldpassword = mysqli_real_escape_string($db_connect, $_POST['oldpass']);
		
		$Oldpassword = md5(md5($Oldpassword).md5($username));

		$checkpass = mysqli_query($db_connect, "SELECT password FROM users WHERE password = '$Oldpassword' ");
		$checkpasscount = mysqli_num_rows($checkpass);
		
			
		ob_end_clean();

		if($checkpasscount){

			$newpassword = md5(md5($newpassword).md5($username));

			$sql = mysqli_query($db_connect, "UPDATE `users` SET `password` = '$newpassword' WHERE `user_id` = '$id'");
			
			if($sql){
				echo json_encode(array("status"=>"success"));
				exit();
			} else {
				echo json_encode(array("status"=>"failed"));
				exit();
			}
		} else {
			echo json_encode(array("status"=>"incorrect"));
			exit();
		}

	}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<section class="side-menu fixed left">
		<div class="top-sec">
			<div class="dash_logo">
			</div>			
			<p>Employee Record System</p>
		</div>
		<ul class="nav">
			<li class="nav-item"><a href="../dashboard"><span class="nav-icon"><i class="fa fa-users"></i></span>All Employees</a></li>
			<li class="nav-item"><a href="../dashboard/current_employees.php"><span class="nav-icon"><i class="fa fa-check"></i></span>Current Employees</a></li>
			<li class="nav-item"><a href="../dashboard/past_employees.php"><span class="nav-icon"><i class="fa fa-times"></i></span>Former Employees</a></li>
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add Employee</a></li>
				<li class="nav-item"><a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user"></i></span>Add User</a></li>
			<?php		} ?>
			<li class="nav-item current"><a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span>Settings</a></li>
			<li class="nav-item"><a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span>Sign out</a></li>
		</ul>
	</section>
	<section class="contentSection right clearfix">
		<div class="displaySuccess"></div>
		<div class="header">
			<div class="h-img">
			<img src="ibakklogo.png" width="230px" height="70px"/>
					</div>
			
			<h1 class="H1">Vision: “To become a world class university in the fields of Management Sciences, Information Technology, Engineering, Education and Mathematics”<h1>
			<div class="social-icons">
      <a href="https://www.facebook.com/SukkurIBA.University/" target="_blank" class="fb-icon"><i class="fab fa-facebook"></i></a>
      <a href="https://twitter.com/sukkur_iba?lang=en" target="_blank" class="tw-icon"><i class="fab fa-twitter"></i></a>
	  <a href="https://www.linkedin.com/company/sukkur-iba-university/?originalSubdomain=pk" target="_blank" class="linkedin-icon"><i class="fab fa-linkedin"></i></a> <!-- Replace YOUR_LINKEDIN_PROFILE_URL_HERE with your LinkedIn profile URL -->

    </div>
			
		</div>
			</div>
		<div class="container">
			<div class="wrapper add_employee settings clearfix">
				<div class="section_title">Settings</div>
				<form id="changeusernameForm" class="clearfix" method="" action="">
					<div class="section_subtitle">Change username</div>
					<div class="input-box input-small left">
						<label for="username">Username</label><br>
						<input type="text" class="inputField username" name="username">
						<div class="error usernameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="password">Password (if changing username)</label><br>
						<input type="password" class="inputField password" name="password">
						<div class="error passworderror"></div>
					</div>
					
					<div class="input-box">
						<button type="submit" class="submitField">Save</button>
					</div>
				</form>
			</div>
			<div class="wrapper add_employee settings clearfix">
				<form id="changepasswordForm" class="clearfix" method="" action="">
					<div class="section_subtitle">Change password</div>
					<div class="input-box input-small left">
						<label for="password">Current Password</label><br>
						<input type="password" class="inputField oldpass" name="password">
						<div class="error oldpasserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="confirmpassword">New Password</label><br>
						<input type="password" class="inputField newpass" name="confirmpassword">
						<div class="error newpasserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="confirmpassword">Confirm Password</label><br>
						<input type="password" class="inputField cpassword" name="confirmpassword">
						<div class="error cpasserror"></div>
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">Save</button>
					</div>
				</form>
			</div>
		</div>
		<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="https://www.iba-suk.edu.pk/">iba-suk.edu.pk.com</a>
  </div>
  <!-- Copyright -->
</footer>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>