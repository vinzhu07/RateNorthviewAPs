<?php include('functions.php');
error_reporting(E_ERROR);

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="google-signin-client_id" content="236678873035-kqio5dc3tcch8vage3i9mon8slntcej5.apps.googleusercontent.com">
	<title>Comment and reply system in PHP</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="main.css">
	<meta name="google-signin-client_id" content="236678873035-kqio5dc3tcch8vage3i9mon8slntcej5.apps.googleusercontent.com.apps.googleusercontent.com">

	<head>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> <!-- Bootstrap Javascript -->
		<script src="https://apis.google.com/js/api.js"></script>
		<script src="scripts.js"></script>
	</head>

<body>

	<!--// 

/*                                     ._
                                   ,(  `-.
                                 ,': `.   `.
                               ,` *   `-.   \
                             ,'  ` :+  = `.  `.
                           ,~  (o):  .,   `.  `.
                         ,'  ; :   ,(__) x;`.  ;
                       ,'  :'  itz  ;  ; ; _,-'
                     .'O ; = _' C ; ;'_,_ ;
                   ,;  _;   ` : ;'_,-'   i'
                 ,` `;(_)  0 ; ','       :
               .';6     ; ' ,-'~
             ,' Q  ,& ;',-.'
           ,( :` ; _,-'~  ;
         ,~.`c _','
       .';^_,-' ~
     ,'_;-''
    ,,~
    i'
	Pizza! 
	Pizza = Pizazzz
*/
		
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="#">Features</a>
				<a class="nav-item nav-link" href="#">Pricing</a>
				<a class="nav-item nav-link disabled" href="#">Disabled</a>
			</div>
		</div>
	</nav>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Rate Northview APs</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
		<li><a href="#">Home</a></li>  
		<li><a href="#">APs</a></li>
		<li><a href="#">Books</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#" onload = "status()" id = "loginstatus"> </a></li>
		

    </ul>
  </div>
</nav>-->

	<div id="header" class="container" style=" margin:0px!important;">
		<nav class="navbar navbar-expand-md navbar-light bg-light" style="background-color: #D0E7F5 !important;">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mr-auto">
					<a class="navbar-brand" href="#">Rate Northview APs</a>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="" style="color:black;">APs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="">Books</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" onload="status()" id="loginstatus"></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<div class="container" style="margin:0px!important; width: 100%; max-width:100vw;padding:0px;">

		<div class="row" style="margin:0px!important;">
			<div class=" post" style="margin:0px!important; width: 100vw; max-width:100vw;padding-left:16px;padding-right:16px;" id="AverageR">
				<h2 id="Titles" name="Title" style="text-align:center; ">AP Courses and Exams</h>
			</div>
		</div>

		<div class="row no gutters" style="margin:0px!important;margin-top:10px!important;">
			<div class="col-sm" style="padding:0px;"></div>
			<div class="col-sm" style="padding:0px;">
				<h3 id="Titles" name="Title" style="font-size:35px;">Arts</h2>
					<table id="table" style="border-collapse:collapse;border:1px solid black; width: 80%;">
						<tr>
							<td style="border: 1px solid black;"> <a href="post_details.php?class=2DArt">AP 2-D Art and Design </a></td>
						</tr>
						<tr>
							<td style="border: 1px solid black;"> <a href="post_details.php?class=3DArt">AP 3-D Art and Design</a> </td>
						</tr>
						<tr>
							<td style="border: 1px solid black;"> <a href="post_details.php?class=ArtHistory">AP Art History </a></td>
						</tr>
						<tr>
							<td style="border: 1px solid black;"> <a href="post_details.php?class=Drawing">AP Drawing </a></td>
						</tr>
						<tr>
							<td style="border: 1px solid black;"> <a href="post_details.php?class=Music">AP Music Theory</a> </td>
						</tr>

					</table>
					</br>
					<h3 id="Titles" name="Title" style="font-size:35px;">English</h2>
						<table id="table" style="border-collapse:collapse;border:1px solid black; width: 80%;">
							<tr>
								<td style="border: 1px solid black;"> <a href="post_details.php?class=Lang">AP English Language and Composition </a></td>
							</tr>
							<tr>
								<td style="border: 1px solid black;"> <a href="post_details.php?class=Lit">AP English Literature and Composition</a> </td>
							</tr>
						</table>
						</br>
						<h3 id="Titles" name="Title" style="font-size:35px;">History and Social Sciences</h2>
							<table id="table" style="border-collapse:collapse;border:1px solid black; width: 80%;">
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=Euro">AP European History</a> </td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=HumanGeo">AP Human Geography</a></td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=Macro">AP Macroeconomics </a></td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=Micro">AP Microeconomics</a> </td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=Psych">AP Psychology</a> </td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=Gov">AP US Government and Politics</a></td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=USH">AP United States History </a></td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"> <a href="post_details.php?class=World">AP World History: Modern</a> </td>
								</tr>
							</table>
							</br>

							<h3 id="Titles" name="Title" style="font-size:35px;">Math and Computer Science</h2>
								<table id="table" style="border-collapse:collapse;border:1px solid black; width: 80%;">
									<tr>
										<td style="border: 1px solid black;"> <a href="post_details.php?class=CalcAB">AP Calculus AB</a> </td>
									</tr>
									<tr>
										<td style="border: 1px solid black;"> <a href="post_details.php?class=CalcBC">AP Calculus BC</a></td>
									</tr>
									<tr>
										<td style="border: 1px solid black;"> <a href="post_details.php?class=CSA">AP Computer Science A </a></td>
									</tr>
									<tr>
										<td style="border: 1px solid black;"> <a href="post_details.php?class=CSP">AP Computer Science Principles</a> </td>
									</tr>
									<tr>
										<td style="border: 1px solid black;"> <a href="post_details.php?class=Stat">AP Statistics</a> </td>
									</tr>
								</table>
								</br>
								<h3 id="Titles" name="Title" style="font-size:35px;">Sciences</h2>
									<table id="table" style="border-collapse:collapse;border:1px solid black; width: 80%;">
										<tr>
											<td style="border: 1px solid black;"> <a href="post_details.php?class=Bio">AP Biology</a> </td>
										</tr>
										<tr>
											<td style="border: 1px solid black;"> <a href="post_details.php?class=Chem">AP Chemistry</a></td>
										</tr>
										<tr>
											<td style="border: 1px solid black;"> <a href="post_details.php?class=APES">AP Environmental Science </a></td>
										</tr>
										<tr>
											<td style="border: 1px solid black;"> <a href="post_details.php?class=Physics1">AP Physics 1: Algebra-Based</a> </td>
										</tr>
										<tr>
											<td style="border: 1px solid black;"> <a href="post_details.php?class=PhysicsCEMag">AP Physics C: Electricity and Magnetism</a> </td>
										</tr>
										<tr>
											<td style="border: 1px solid black;"> <a href="post_details.php?class=PhysicsCMech">AP Physics C: Mechanics</a></td>
										</tr>
									</table>
									</br>

									<h3 id="Titles" name="Title" style="font-size:35px;">AP World Languages and Cultures</h2>
										<table id="table" style="border-collapse:collapse;border:1px solid black; width: 80%;">
											<tr>
												<td style="border: 1px solid black;"> <a href="post_details.php?class=Chinese">AP Chinese Language and Culture</a> </td>
											</tr>
											<tr>
												<td style="border: 1px solid black;"> <a href="post_details.php?class=French">AP French Language and Culture</a></td>
											</tr>
											<tr>
												<td style="border: 1px solid black;"> <a href="post_details.php?class=German">AP German Language and Culture </a></td>
											</tr>
											<tr>
												<td style="border: 1px solid black;"> <a href="post_details.php?class=Latin">AP Latin</a> </td>
											</tr>
											<tr>
												<td style="border: 1px solid black;"> <a href="post_details.php?class=Spanish">AP Spanish Language and Culture</a> </td>
											</tr>

										</table>
										</br>

			</div>
			<div class="col-sm" style="padding:0px;"></div>
		</div>




	</div>



	<!-- Site footer -->
	<footer class="site-footer">


		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p class="copyright-text">Copyright &copy; Rate Northview AP's 2020.
					</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12">

				</div>
			</div>
		</div>
	</footer>

	<!-- Javascripts 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">-->
	</script>
	<script src="https://apis.google.com/js/client:platform.js?onload=start" async defer>
	</script>
	<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>