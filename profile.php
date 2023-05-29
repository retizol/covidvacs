<?php 

session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($connect);
?>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<nav>
         <div class="logo">WowVacs</div>
         <input type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="fas fa-bars"></i>
         </label>
         <ul>
            <li><a href="index_connected.php">Home</a></li>
            <!--li><a href="sites.html">Vaccination Site</a></li-->
            <li><a href="tracker.php">Covid-19 Tracker</a></li>
            <li><a href="info.php">Information</a></li>
            <li><a href="logout.php">Sign out</a></li>
         </ul>
      </nav><!--end of header-->
      <div class="vaccContainer">
		  <div class="schedBanner">
		  <h2>COVID-19 Vaccine Information</h2>
		  <h3>Schedule: <span><?php echo $user_data['vacc_sched']; ?></span><span style="font-weight: 100; font-size: 0.8rem;"> (yyyy-mm-dd)</span></h3><!--vacc_date -->
		  <h3>Vaccination Site: <span><?php echo $user_data['vacc_site']; ?></span></h3> <!--vacc_site --> <br>
			<p>Category: <?php echo $user_data['vacc_cat']; ?></p>
		  <!--label>Full Name</label><br>
      	<p id="phplastnamee"></p>
      	<p id="phpfirstnamee"></p>
      	<p id="phpmiddlee"></p><br>
		  <label id="lastnamee">Last Name</label>
		  <label id="firstnamee">First Name</label>
		  <label id="middleinite">Middle Initial</label>
		  <p id="bdayc">Birthday</p>
      	<p id="bdaya"></p-->
		  <p>First Dose: <?php echo $user_data['first_dose']; ?><span style="font-weight: 100; font-size: 0.8rem;"> (yyyy-mm-dd)</span></p><!--vacc_first -->
		  <p>Second Dose: <?php echo $user_data['second_dose']; ?><span style="font-weight: 100; font-size: 0.8rem;"> (yyyy-mm-dd)</span></p><!--vacc_second -->
		  
	</div>
	</div>

      <div class="profileMain">
		  <div class="profileContainer">

		<h1>Profile Information</h1><br>
		  <label>Username</label>
      	<p><?php echo $user_data['user_name']; ?></p>
		  <label>Email</label>
      	<p><?php echo $user_data['email']; ?></p>
		  <label>Full Name</label><br>
		  <div class="lProfile">
		  	<p id="phplastname"><?php echo $user_data['last_name']; ?></p>
      	<p id="phpfirstname"><?php echo $user_data['first_name']; ?></p>
      	<p id="phpmiddle"><?php echo $user_data['middle_initial']; ?></p><br>
			  
		  <label id="lastname">Last Name</label>
		  <label id="firstname">First Name</label>
		  <label id="middleinit">M.I.</label><br><br>
		  </div>

		  <div class="sProfile">
		  	
		  	<label id="slastname">Last Name</label>
		  	<p id="sphplastname"><?php echo $user_data['last_name']; ?></p>
      	
      	<label id="sfirstname">First Name</label>
      	<p id="sphpfirstname"><?php echo $user_data['first_name']; ?></p>
      	
			<label id="smiddleinit">M.I.</label>
			<p id="sphpmiddle"><?php echo $user_data['middle_initial']; ?></p><br><br>
		  </div>
		  
		  <div class="lowerInfo">
		  	<label>Facebook Account</label>
      	<p><?php echo $user_data['facebook']; ?></p>
		  <label>Contact Number</label>
      	<p><?php echo $user_data['phone']; ?></p>
		  <label>Address</label>
      	<p><?php echo $user_data['address']; ?></p>
		  <label>Age</label>
      	<p><?php echo $user_data['age']; ?></p>
		  <label>Gender</label>
      	<p><?php echo $user_data['gender']; ?></p>
		  <label>Birthday</label>
      	<p><?php echo $user_data['birthday']; ?></p>
		  <label>Philhealth ID Number</label>
      	<p><?php echo $user_data['philhealth']; ?></p>
		  <label>Valid ID</label>
      	<p><?php echo $user_data['validID']; ?></p>
		<h1>Medical Information</h1><br>
		  <label>Medical History</label>
      	<p id="jsmed"><?php echo $user_data['med_history']; ?></p>
		  <label>Do you have allergies?</label>
      	<p><?php echo $user_data['allergy']; ?></p>
		  <label>Recipient of immunoglobulins (tetanus and rabies immunoglobulin)?</label>
      	<p><?php echo $user_data['immunoglobulins']; ?></p>
		  <label>Recipient of any medication intended to prevent COVID?</label>
      	<p><?php echo $user_data['medication']; ?></p>
		  <label>Received any vaccine aside from COVID 19 vaccine?</label>
      	<p><?php echo $user_data['vaccine']; ?></p>
		  <label>Diagnosed with COVID-19?</label>
      	<p><?php echo $user_data['diagnosed']; ?></p>
		<label>History of COVID-19 Infection (+ RT-PRC Test)</label>
      	<p><?php echo $user_data['covid_infection']; ?></p>
		  <label>Did you experience anaphylaxis or a severe hypersensitivity reaction during previous immunization aside from COVID-19 Vaccination?</label>
      	<p><?php echo $user_data['hypers']; ?></p>
		  <label>On Maintenance Drugs?</label>
      	<p><?php echo $user_data['maintenance']; ?></p>
		  <label>Preffered COVID-19 Vaccine</label>
      	<p id="jsvac"><?php echo $user_data['vaccine_pref']; ?></p>
      </div>

	</div>
</div>
	<footer> 
			 Sources: <a href="https://doh.gov.ph" target="_blank">DOH</a> | <a href="https://who.int" target="_blank">WHO</a> | <a href="https://cdc.gov" target="_blank">CDC</a> | API <a href="https://disease.sh" target="_blank">disease.sh</a>
		</footer>
</body>
</html>
<script>
	let med = document.getElementById("jsmed").innerHTML; 
	document.getElementById("jsmed").innerHTML = med.replace(/,/g, "<br>");
	
	let vac = document.getElementById("jsvac").innerHTML; 
	document.getElementById("jsvac").innerHTML = vac.replace(/,/g, "<br>");
</script>