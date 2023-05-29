<?php 

session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($connect);

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
            <li><a class="active" href="#">Home</a></li>
            <!--li><a href="sites.html">Vaccination Site</a></li-->
            <li><a href="tracker.php">Covid-19 Tracker</a></li>
            <li><a href="info.php">Information</a></li>
            <li><a href="profile.php"><?php echo $user_data['first_name']; ?></a></li>
         </ul>
      </nav><!--end of header-->
		<!--start of home content-->
		<div class="home_main"> 
					<h2>Welcome, <?php echo $user_data['first_name']; ?>!<br>
			        <p>Click "Check Profile" to review your information <br>and see latest updates for your schedule!</p><br>
						<!--a href="registration.html">Register Now</a-->
						<a href="profile.php">Check Profile</a>
						<a href="logout.php">Sign out</a>
					</h2>
		</div>
		<div class="navFaq">
			<a href="#nav"><h2>Are COVID-19 vaccines safe?</h2></a>
			<div class="navExpandable" id="nav">
				<p>Yes, in fact millions of people have received COVID-19 vaccines here in the Philippines. We recommend you to get the vaccine as soon as it is available to you.</p>
			</div>
			<a href="#nav2"><h2>Why do we need to register here?</h2></a>
			<div class="navExpandable" id="nav2">
				<p>WowVacs aims to centralize every vaccination program in the Philippines. With this, we make your application easier and faster as we forward it to your respective LGU's. This is also beneficial to LGU's that doesn't have any online presence for vaccination program.</p>
			</div>
			<a href="#nav3"><h2>Can I just walk-in to vaccination sites?</h2></a>
			<div class="navExpandable" id="nav3">
				<p>As of now, walk-in for vaccination are unavailable. We'll notify you once the government allow walk-in vaccination nationwide.</p>
			</div>
		</div>
		<footer> 
			 Sources: <a href="https://doh.gov.ph" target="_blank">DOH</a> | <a href="https://who.int" target="_blank">WHO</a> | <a href="https://cdc.gov" target="_blank">CDC</a> | API <a href="https://disease.sh" target="_blank">disease.sh</a>
		</footer>
	</body>
</html>
<!--script type="text/javascript">

fetch('https://corona.lmao.ninja/v2/countries/Philippines')
.then((response) => {
  return response.json();
})
.then((data) => {
  console.log(data);
  document.getElementById("hcases").innerHTML = data.cases.toLocaleString();
});
</script-->

<!--script type="text/javascript">

fetch('https://disease.sh/v3/covid-19/vaccine/coverage/countries/Philippines?lastdays=1&fullData=false')
.then((response) => {
  return response.json();
})
.then((data) =>{
	console.log(data);
  document.getElementById("cases").innerHTML = data.timeline.object;
});
</script-->