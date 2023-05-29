<?php 

session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_user_no_redirect($connect);
	if (empty($user_data['first_name'])) { 
		$output = "<a href='login.php'>Sign in</a>";  
	} 
	else { 
		$output = "<a href='profile.php'>" . $user_data['first_name'] . "</a>";
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>WowVACS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
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
            <li><a class="active" href="#">Information</a></li>
            <li><?php echo $output ?></li>
         </ul>
      </nav><!--end of header-->
		<div class="info">
			<div class="titleCov">
				<div class="tCovid">COVID-19<br><span class="tVacc">VACCINE</span></div>
				<div class="t101">101</div></div>
			<h3>
			COVID-19 vaccines are safe and will help protect you against developing severe COVID-19 disease.
			It teaches your immune system to recognize and fight the COVID-19 virus. Being vaccinated and following minimum public health protocols will help prevent the spread of COVID-19 and its variants.</h3>
		</div>
		<div class="infotable">
		<table>
			<tr>
				<td colspan = "2">
					<h1> WHAT TO EXPECT AFTER VACCINATION </h1>
					<p> After vaccination you may experience symptoms which are normal, 
					this means that your body is responding to the vaccine and your body is temporarily building protection.
					These side effects usually disappear on their own in a few days. Experiencing no side effects does not mean that the vaccine is ineffective.
					It means everbody responds differently. 
					</p>
				</td>
			</tr>
			<tr class="trsecond">
				<td class="td1" >
					<h1>COMMON SIDE EFFECTS </h1>
					<h2> On the arm / area where you got the shot: </h2>
					<ul> 
						<li> Pain </li>
						<li> Redness </li>
						<li> Swelling </li>
					</ul>
					<br>
					<h2> Throughout the rest of your body: </h2>
					<ul> 
						<li> Generally feeling of being unwell </li>
						<li> Tiredness </li>
						<li> Headache </li>
						<li> Muscle Pain </li>
						<li> Chills </li>
						<li> Fever </li>
						<li> Nausea </li>
						<li> Diarrhea </li>
					</ul>
				</td><br>
				<td class="td2" >
					<h1> VACCINATION TIPS </h1>
					<h2> To reduce pain and discomfort on the injection area </h2>
					<ul> 
						<li> Apply a clean, cool, wet washcloth over the area </li>
						<li> Use or exercise your arm </li>
					</ul>
					<br>
					<h2> To reduce discomfort from fever </h2>
					<ul> 
						<li> Take paracetamol if Temp is 37.8 C </li>
						<li> Drink plenty of fluids </li>
						<li> Dress lightly </li>
					</ul>
					<br>
					<h2> If you experience any of these signs, call your healthcare provider right away. </h2>
					<ul> 
						<li> Swelling of face or throat or allergies </li>
						<li> Fast heartbeat </li>
						<li> Convulsion </li>
						<li> Bleeding </li>
						<li> Difficulty of breathing </li>
						<li> Nausea and vomiting </li>
					</ul>	
				</td>
			</tr>
			</table></div>
		<br>
		<div class="infotable">
			<p>Consult your doctor about taking over-the-counter medicines for any pain or discomfort you may experience after vaccination.</p><br></div>

		<footer> 
			 Sources: <a href="https://doh.gov.ph" target="_blank">DOH</a> | <a href="https://who.int" target="_blank">WHO</a> | <a href="https://cdc.gov" target="_blank">CDC</a> | API <a href="https://disease.sh" target="_blank">disease.sh</a>
		</footer>
	</body>
</html>