<?php 
//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 0);

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
		<title>COVID-19 Tracker</title>
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
            <li><a class="active" href="#">Covid-19 Tracker</a></li>
            <li><a href="info.php">Information</a></li>
            <li><?php echo $output ?></li>
         </ul>
      </nav>
		<!--end of header-->
		<div class="containerTracker">
		<div class="ph"><p>COVID-19 <span id="country">Philippines</span></p></div><br>
		<div class="tracker">
			<div class="confirmed">
				<p><span id="cases"></span><br>
					<span>Confirmed Cases</span><br>
					<span id="todayCases"></span><span> new cases</span>
				</p></div>
			<div class="recover">
				<p><span id="recovered"></span><br>
					<span>Recoveries</span><br>
					<span id="todayRecovered"></span>
					<span> new recoveries</span>
				</p></div>
			<div class="death">
				<p><span id="deaths"></span><br>
					<span>Deaths</span><br>
					<span id="todayDeaths"></span>
					<span> new deaths</span>
				</p></div>
		</div>
		<div class="caseRate">
			<div class="recRate">
				<p><span>Recovery rate</span><br>
					<span id="recoverRate"></span>%<br>
					<span>of total cases</span>
				</p>
			</div>
			<div class="dedRate">
				<p><span>Death rate</span><br>
					<span id="deathRate"></span>%<br>
					<span>of total cases</span>
				</p>
			</div>
		</div>
		<div class="caseThird">
			<div class="critRate">
				<p><span>Critical Cases treated in ICU</span><br>
					<span id="critical"></span><br>
					<span id="critPercentage"></span><span> of total cases</span>
				</p></div>
			<div class="actRate">
				<p><span>Daily Cases Receiving Treatment</span><br>
					<span id="active"></span><br>
					<span id="activePercentage"></span><span> of total cases</span>
				</p></div>
			<div class="casePerMil">
				<p><span>Daily Confirmed Cases</span><br>
					<span id="casesPerOneMillion"></span><br>
					<span>Per Million Population</span>
				</p></div>
		</div>
			
			
		</div>
		
		
		<footer> 
			 Sources: <a href="https://doh.gov.ph" target="_blank">DOH</a> | <a href="https://who.int" target="_blank">WHO</a> | <a href="https://cdc.gov" target="_blank">CDC</a> | API <a href="https://disease.sh" target="_blank">disease.sh</a>
		</footer>
	</body>
</html>
<script type="text/javascript">

fetch('https://disease.sh/v3/covid-19/countries/Philippines')
.then((response) => {
  return response.json();
})
.then((data) => {
	console.log(data);
	document.getElementById("country").innerHTML = data.country;

	document.getElementById("cases").innerHTML = data.cases.toLocaleString();
	document.getElementById("todayCases").innerHTML = '&#43;' +  data.todayCases.toLocaleString();

	document.getElementById("recovered").innerHTML = data.recovered.toLocaleString();
	document.getElementById("todayRecovered").innerHTML = '&#43;' + data.todayRecovered.toLocaleString();

	document.getElementById("deaths").innerHTML = data.deaths.toLocaleString();
	document.getElementById("todayDeaths").innerHTML = '&#43;' +  data.todayDeaths.toLocaleString();
	
	document.getElementById("critical").innerHTML = data.critical.toLocaleString();
	document.getElementById("active").innerHTML = data.active.toLocaleString();
	document.getElementById("casesPerOneMillion").innerHTML = data.casesPerOneMillion.toLocaleString();
	
	var r = (data.recovered / data.cases) * 100;
	var ro = r.toFixed(1);
	document.getElementById("recoverRate").innerHTML = ro;
	
	var d = (data.deaths / data.cases) * 100;
	var dr = d.toFixed(1);
	document.getElementById("deathRate").innerHTML = dr;
	
	var c = (data.critical / data.cases) * 100;
	var cr = c.toFixed(1);
	document.getElementById("critPercentage").innerHTML = cr + '&#37;';

	var a = (data.active / data.cases) * 100;
	var ar = a.toFixed(1);
	document.getElementById("activePercentage").innerHTML = ar + '&#37;';
});
</script>

