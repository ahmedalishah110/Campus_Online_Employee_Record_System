<?php
	include("../inc/header.php");
										    
	if($usertype != "Admin"){
        header("Location: ../dashboard");
    }

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


	<section class="side-menu fixed left">
		<div class="top-sec">
			<div class="dash_logo">
			</div>	
			<div class="dash img"> 
		
		</div>
			<p>Employee Record System</p>
		</div>
		<ul class="nav">
			<li class="nav-item"><a href="../dashboard"><span class="nav-icon"><i class="fa fa-users"></i></span>All Employees</a></li>
			<li class="nav-item"><a href="../dashboard/current_employees.php"><span class="nav-icon"><i class="fa fa-check"></i></span>Current Employees</a></li>
			<li class="nav-item"><a href="../dashboard/past_employees.php"><span class="nav-icon"><i class="fa fa-times"></i></span>Former Employees</a></li>
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item current"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add Employee</a></li>
				<li class="nav-item"><a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user"></i></span>Add User</a></li>
			<?php		} ?>
			<li class="nav-item"><a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span>Settings</a></li>
			<li class="nav-item"><a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span>Sign out</a></li>
		</ul>
	</section>
	<section class="contentSection right clearfix">
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

		<div class="displaySuccess"></div>
		<div class="container">
			<div class="wrapper add_employee clearfix">
				<div class="section_title">Add Employees Information</div>
				<form id="addemployee" class="clearfix" method="" action="">
					<div class="section_subtitle">Employees Personal Data</div>
					<div class="input-box input-small left">
						<label for="employee_id">Employee ID</label><br>
						<input type="text" class="inputField emp_id" placeholder="Optional" name="employee_id">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">First Name</label><br>
						<input type="text" class="inputField firstname" name="firstname">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="middlename">Middle Name</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename">
						<div class="error middlenameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="lastname">Last Name</label><br>
						<input type="text" class="inputField lastname" name="lastname">
						<div class="error lastnameerror"></div>
					</div>

					<div class="input-box input-small left">
						<label for="gender">Gender</label><br>
						<select class="inputField gender" name="gender">
							<option value="">-- Select Gender --</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						<div class="error in defining gender"></div>
					</div>

					<div class="input-box input-small right">
						<label for="phone">Phone Number</label><br>
						<input type="text" class="inputField phone" name="phone">
						<div class="error phoneerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="jobtype">Job Type</label><br>
						<select class="inputField jobtype" name="jobtype">
							<option value="">-- Select Job Role --</option>
							<option value="Lecturer">Lecturer</option>
							<option value="Assistant Professor">Assistant Professor</option>
							<option value="Associate Professor">Associate Professor</option>
							<option value="Professor">Professor</option>
							<option value="IT Administrator">IT Administrator</option>
							<option value="Accountant">Accountant</option>
							<option value="Administrator">Administrator</option>
							<option value="Examination Controller">Examination Controller</option>
							<option value="Program Officer">Program Officer</option>
							<option value="Librarian">Librarian</option>
						</select>
						<div class="error jobtypeerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="dateemployed">Date Employed</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed">
						<div class="error dateemployederror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="empstatus">Employment Status</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="">-- Select Status --</option>
							<option value="current">Current Employee</option>
							<option value="former">Former Employee</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField resaddress" name="resaddress">
						<div class="error resaddresserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="reslocation">Location of Residence</label><br>
						<input type="text" class="inputField reslocation" name="reslocation">
						<div class="error reslocationerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="gpsreslocation">GPS Location of Residence</label><br>
						<input type="text" class="inputField gpsreslocation" name="gpsreslocation">
						<div class="error gpsreslocationerror"></div>
					</div>
					<div class="input-box input-textarea right clearfix">
						<label for="resdirection">Direction to Residence</label><br>
						<textarea class="inputField resdirection" name="resdirection"></textarea>
						<div class="error resdirectionerror"></div>
					</div>
					<div class="section_subtitle left">Upload Employee Photo</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="passport_photo" class="uploadField passport_photo">
								<div class="uploadfile passportPhoto_file">Upload Employee Photo</div>
								<div class="filebtn passport-btn">Upload</div>
								<div class="filebtn passport-disbtn">Upload</div>
							</div>
						</div>
						<div class="error photoerror"></div>
						<div class="passport_file"></div>
					</div>
					<div class="section_subtitle left">Upload Employee ID</div>
					<div class="input-box input-small left">
						<label for="idnumber">National ID Number</label><br>
						<input type="text" class="inputField idnumber" name="idnumber">
						<div class="error IDnumbererror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="idtype">National ID Type</label><br>
						<select class="inputField idtype" name="idtype">
							<option value="">-- Select ID Type --</option>
							<option value="CNIC">CNIC</option>
							<option value="Passport">Passport</option>
							<option value="BForm">B-Form</option>
							<option value="Driving License">Driving License Number</option>
						</select>
						<div class="error idtypeerror"></div>
					</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="nationalID" class="uploadField nationalID">
								<div class="uploadfile nationalID_file">Upload Selected ID type</div>
								<div class="filebtn nationID-btn">Upload</div>
								<div class="filebtn nationID-disbtn">Upload</div>
							</div>
						</div>
						<div class="error nationalIDerror"></div>
						<div class="selected_nationalID_file"></div>
					</div>
					<div class="section_subtitle left">Next of Kin Data (In case of Emergency)</div>
					<div class="input-box input-small left">
						<label for="fullname">Full Name</label><br>
						<input type="text" class="inputField fullname" name="fullname">
						<div class="error fullnameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="relationship">Relationship to Employee</label><br>
						<input type="text" class="inputField relationship" name="relationship">
						<div class="error relationshiperror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="kinphone">Phone Number</label><br>
						<input type="text" class="inputField kinphone" name="kinphone">
						<div class="error kinphoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="kinresaddress">Residential Address</label><br>
						<input type="text" class="inputField kinresaddress" name="kinresaddress">
						<div class="error kinresaddresserror"></div>
					</div>
					<div class="input-box input-textarea left clearfix">
						<label for="kinresdirection">Direction to Residence</label><br>
						<textarea class="inputField kinresdirection" name="kinresdirection"></textarea>
						<div class="error kinresdirectionerror"></div>
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">Add record</button>
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