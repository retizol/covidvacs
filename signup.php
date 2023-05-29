<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$middle_initial = $_POST['middle_initial'];
		$facebook = $_POST['facebook'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];
		$philhealth = $_POST['philhealth'];
		$validID = $_POST['validID'];
		$med_history = implode(',', $_POST['med_history']);
		$allergy = $_POST['allergy'];
		$immunoglobulins = $_POST['immunoglobulins'];
		$medication = $_POST['medication'];
		$vaccine = $_POST['vaccine'];
		$diagnosed = $_POST['diagnosed'];
		$covid_infection = $_POST['covid_infection'];
		$hypers = $_POST['hypers'];
		$maintenance = $_POST['maintenance'];
		$vaccine_pref = implode(',', $_POST['vaccine_pref']);
		$avail_vaccine = $_POST['avail_vaccine'];
		$user_suggestions = $_POST['user_suggestions'];
		$agreebox = $_POST['agreebox'];


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($email) && !empty($last_name) && !empty($first_name) && !empty($middle_initial) && !empty($facebook) && !empty($phone) && !empty($address) && !empty($age) && !empty($gender) && !empty($birthday) && !empty($philhealth) && !empty($validID) && !empty($med_history) && !empty($allergy) && !empty($immunoglobulins) && !empty($medication) && !empty($vaccine) && !empty($diagnosed) && !empty($covid_infection) && !empty($hypers) && !empty($maintenance) && !empty($vaccine_pref) && !empty($avail_vaccine) && !empty($user_suggestions) && !empty($agreebox)) 
		{
			

			//save to database
			$user_id = random_num(20);
			$query = "INSERT INTO users (user_id,user_name,password,email,last_name,first_name,middle_initial,facebook,phone,address,age,gender,birthday,philhealth,validID,med_history,allergy,immunoglobulins,medication,vaccine,diagnosed,covid_infection,hypers,maintenance,vaccine_pref,avail_vaccine,user_suggestions,agreebox) VALUES ('$user_id','$user_name','$password','$email','$last_name','$first_name','$middle_initial','$facebook','$phone','$address','$age','$gender','$birthday','$philhealth','$validID','$med_history','$allergy','$immunoglobulins','$medication','$vaccine','$diagnosed','$covid_infection','$hypers','$maintenance','$vaccine_pref','$avail_vaccine','$user_suggestions','$agreebox')";

			mysqli_query($connect, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please provide every information needed.";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	   <link rel="stylesheet" type="text/css" href="css/style.css" />
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	   <title> WowVACS - Registration </title>
</head>
<body>
		<nav>
         <div class="logo">WowVacs</div>
         <input class="navbox" type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="fas fa-bars"></i>
         </label>
         <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <!--li><a href="sites.html">Vaccination Site</a></li-->
            <li><a href="tracker.php">Covid-19 Tracker</a></li>
            <li><a href="info.php">Information</a></li>
            <li><a href="login.php">Sign In</a></li>
         </ul>
      </nav><!--end of header-->

	   <div class="regContainer">
		   <div class="regHeader">
			   <h1 id="title">COVID-19 VACCINATION PRE-REGISTRATION</h1>
			   <p id="description">
				   
			   </p>
		   </div>

		   <form method="POST">
			   <div class="form-input">
			   	<label>Username</label>
			   	<input type="text" name="user_name" placeholder="Username" class="form-input-size" required value="<?php echo isset($_POST["user_name"]) ? htmlentities($_POST["user_name"]) : ''; ?>">
			   	<label>Password</label>
			   	<input type="password" name="password" placeholder="Password" value="<?php echo isset($_POST["password"]) ? htmlentities($_POST["password"]) : ''; ?>" class="form-input-size"  required>

				   <label>Email</label>
				   <input type="email" id="email" name="email" placeholder="abc@abc.com" value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>" class="form-input-size" required>

				   <label>Last Name</label>
				   <input type="text" id="lastname" name="last_name" placeholder="Last Name" value="<?php echo isset($_POST["last_name"]) ? htmlentities($_POST["last_name"]) : ''; ?>" class="form-input-size" required>
			   
				   <label>First Name</label>
				   <input type="text" id="firstname" name="first_name" placeholder="First Name" value="<?php echo isset($_POST["first_name"]) ? htmlentities($_POST["first_name"]) : ''; ?>" class="form-input-size" required>

				   <label>Middle Initial</label>
				   <input type="text" id="middleinitial" name="middle_initial" placeholder="eg. 'V.'" value="<?php echo isset($_POST["middle_initial"]) ? htmlentities($_POST["middle_initial"]) : ''; ?>" class="form-input-size" required>
			  
				   <label>Facebook Account</label>
			     <input type="text" id="facebook" name="facebook" placeholder="https://www.facebook.com/username/" value="<?php echo isset($_POST["facebook"]) ? htmlentities($_POST["facebook"]) : ''; ?>" class="form-input-size" required>
			  
				   <label>Contact Number</label>
			     <input type="tel" id="phone" name="phone" placeholder="09XXXXXXXXX" maxlength="11" value="<?php echo isset($_POST["phone"]) ? htmlentities($_POST["phone"]) : ''; ?>" class="form-input-size" required>
			   
				   <label>Address</label>
			     <input type="text" name="address" placeholder="House No., Street, Subdivision, Barangay, City, Area, Zip Code" value="<?php echo isset($_POST["address"]) ? htmlentities($_POST["address"]) : ''; ?>" class="form-input-size" required>
			  
				   <label>Age</label>
				   <input type="number" id="age" name="age" placeholder="Enter your age" min="0" max="100"  value="<?php echo isset($_POST["age"]) ? htmlentities($_POST["age"]) : ''; ?>" class="form-input-size" required>
			   
					<label>Gender</label>
				 <input type="radio" name="gender" value="M" <?php if (isset($gender) && $gender=="m") echo "checked";?>> Male 
			     <input type="radio" name="gender" value="F" <?php if (isset($gender) && $gender=="f") echo "checked";?>> Female <br>
			   
					<label>Birthday</label>
					<input name="birthday" type="date" class="date" id="birthday" value="<?php echo isset($_POST["birthday"]) ? htmlentities($_POST["birthday"]) : ''; ?>" required>
			   
			     <label>PhilHealth ID Number</label>
				   <input type="number" name="philhealth" placeholder="XXXXXXXXXXXX" maxlength="12" value="<?php echo isset($_POST["philhealth"]) ? htmlentities($_POST["philhealth"]) : ''; ?>" class="form-input-size" required>
			   
					<label>Valid ID</label>
					<select name="validID" class="form-input-size" required>
						<option disabled selected value> Select </option>
						<option value="Philippine Passport"> Philippine Passport </option>
						<option value="Driver's License"> Driver's License </option>
						<option value="PhilHealth ID"> PhilHealth ID </option>
						<option value="SSS UMID ID"> SSS UMID ID </option>
						<option value="School ID"> School ID </option>
						<option value="Postal ID"> Postal ID </option>
						<option value="TIN ID"> TIN ID </option>
						<option value="Voter's ID"> Voter's ID </option>
						<option value="Senior Citizen ID"> Senior Citizen ID </option>
						<option value="OFW ID"> OFW ID </option>
					</select>
					<!--<input type="file" id="myFile" name="photoID">-->
			   <br> 
			   <br>   
				   <h2>MEDICAL INFORMATION</h2>
				   <hr>
				   <p>Medical History<span>(Check all that applies)</span></p>
				   <label><input type="checkbox" name="med_history[0]" value="High Blood" > High Blood </label>
				   <label><input type="checkbox" name="med_history[1]" value="Heart Disease" > Heart Disease </label>
				   <label><input type="checkbox" name="med_history[2]" value="Kidney Disease" > Kidney Disease </label>
				   <label><input type="checkbox" name="med_history[3]" value="Diabetes" > Diabetes </label>
				   <label><input type="checkbox" name="med_history[4]" value="Asthma" > Asthma </label>
				   <label><input type="checkbox" name="med_history[5]" value="Cancer" > Cancer </label>
				   <label><input type="checkbox" name="med_history[6]" value="Others" > Cancer </label>
				   <label><input type="checkbox" name="med_history[7]" value="N/A" > N/A </label>
				   <!--label>  Other: <input type="text" name="med_history"></label--><br>
			   
			   
					<p> Do you have allergies?</p>
				 <input type="radio" name="allergy" value="Yes" <?php if (isset($allergy) && $allergy=="Yes") echo "checked";?>> Yes 
				 <input type="radio" name="allergy" value="No" <?php if (isset($allergy) && $allergy=="No") echo "checked";?>> No <br>
				 <!--<input style="display:none;" type="text" name="allergyField" id="otherAnswer"/>--> <br>
			   
					<p>Recipient of immunoglobulins (tetanus and rabies immunoglobulin)?</p>
				 <input type="radio" name="immunoglobulins" value="Yes" <?php if (isset($immunoglobulins) && $immunoglobulins=="Yes") echo "checked";?>> Yes 
				 <input type="radio" name="immunoglobulins" value="No" <?php if (isset($immunoglobulins) && $immunoglobulins=="No") echo "checked";?>> No <br>

					<p> Recipient of any medication intended to prevent COVID? </p>
				 <input type="radio" name="medication" value="Yes" <?php if (isset($medication) && $medication=="Yes") echo "checked";?>> Yes 
				 <input type="radio" name="medication" value="No" <?php if (isset($medication) && $medication=="No") echo "checked";?>> No <br>
			   
					<p> Received any vaccine aside from COVID 19 vaccine? </p>
					<input type="radio" name="vaccine" value="Yes" <?php if (isset($vaccine) && $vaccine=="Yes") echo "checked";?>> Yes 
					<input type="radio" name="vaccine" value="No" <?php if (isset($vaccine) && $vaccine=="No") echo "checked";?>> No <br>
			   
					<p> Diagnosed with COVID-19? </p>
					<input type="radio" name="diagnosed" value="Yes" <?php if (isset($diagnosed) && $diagnosed=="Yes") echo "checked";?>> Yes 
					<input type="radio" name="diagnosed" value="No" <?php if (isset($diagnosed) && $diagnosed=="No") echo "checked";?>> No <br>
					<br>
					<!--<label for="when"> If Yes, When? </label>
					<input name="diagnosed_date" type="date" class="date">-->
			    
					<p>History of COVID-19 Infection (+ RT-PRC Test)</p>
					<select id="covid_infection" name="covid_infection" class="form-input-size" required>
						<option disabled selected value>Select</option>
						<option value="Asymptomatic" >Asymptomatic</option>
						<option value="Mild" >Mild</option>
						<option value="Severe" > Severe </option>
						<option value="N/A" >N/A</option>
					</select>
					<br>
						<!--<label for="when">When?</label>
						<input name="covid_date" type="date" class="date">-->
			   
				   <p>Did you experience anaphylaxis or a severe hypersensitivity reaction during previous immunization aside from COVID-19 Vaccination?</p>
						<input type="radio" name="hypers" value="Yes" <?php if (isset($hypers) && $hypers=="Yes") echo "checked";?>> Yes 
						<input type="radio" name="hypers" value="No" <?php if (isset($hypers) && $hypers=="No") echo "checked";?>> No <br>	
			   
				   <p>On Maintenance Drugs?</p>
						<input type="radio" name="maintenance" value="Yes" <?php if (isset($maintenance) && $maintenance=="Yes") echo "checked";?>> Yes 
						<input type="radio" name="maintenance" value="No" <?php if (isset($maintenance) && $maintenance=="No") echo "checked";?>> No <br><br>
			   
				   <p>Preferred Vaccine <span>(Check all that applies)</span>
				   </p>
				   <label><input type="checkbox" name="vaccine_pref[0]" value="Pfizer" > Pfizer</label>
				   <label><input type="checkbox" name="vaccine_pref[1]" value="Sinovac" > Sinovac</label>
				   <label><input type="checkbox" name="vaccine_pref[2]" value="AstraZeneca" > AstraZeneca</label>
				   <label><input type="checkbox" name="vaccine_pref[3]" value="Moderna" > Moderna</label>
				   <label><input type="checkbox" name="vaccine_pref[4]" value="Sputnik" > Sputnik V</label>
			   
				   <p>Willing to be vaccinated depending on the availability of the vaccine?</p>
				   <input type="radio" name="avail_vaccine" value="Yes" <?php if (isset($avail_vaccine) && $avail_vaccine=="Yes") echo "checked";?>> Yes 
				   <input type="radio" name="avail_vaccine" value="No" <?php if (isset($avail_vaccine) && $avail_vaccine=="No") echo "checked";?>> No <br><br>

				   <p>Any requests or suggestions upon vaccination?</p>
				   <textarea type="text" name="user_suggestions" placeholder="Type here.." maxlength="255"></textarea><br><br>
			   
				<p id="consent">By submitting this form, I am giving my consent to the collection, processing, and disclosure of 
					my personal information for the purposes of this Covid-19 Vaccination Registration in accordance 
					with R.A. 10173 (Data Privacy Act of 2012).</p>
				
				<input type="checkbox" name="agreebox" value="I Agree"> I Agree <br><br>
			  
				   <button type="submit" name="submit">Submit</button>
				   </div>
		   </form>
	   </div>
	   <footer> 
			 Sources: <a href="https://doh.gov.ph" target="_blank">DOH</a> | <a href="https://who.int" target="_blank">WHO</a> | <a href="https://cdc.gov" target="_blank">CDC</a> | API <a href="https://disease.sh" target="_blank">disease.sh</a>
		</footer>
</body>
</html>
<!--script type="text/javascript">
	$("input[name='allergy']").change(function(){
		if($(this).val()=="Yes")
		{
			$("#otherAnswer").show();
		}
		else
		{
			$("#otherAnswer").hide(); 
		}
	});

</script-->