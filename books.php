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
					<a class="navbar-brand" href="index.html">Rate Northview APs</a>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="course-index-page.php" >APs</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="about.html">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="books.php"style="color:black;">Books</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" onload="status()" id="loginstatus"></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<div class="container">

		<div class="row">
			<div class=" post">

				<h2 id="Titles" name="Title">Sell Your Old Books!</h2>

				<div class="row">
					<p class="col-md-6" id="description"> Looking to sell your old AP textbooks, 5 Steps to 5 books, or other review material? Simply fill out the form below and wait for a student to contact you!</p>
					<p class="col-md-6"><img src="img/book.png" alt="Title" id="picture" class="img-responsive center-block" style="width:40%;max-width:1000px;"></p>

				</div>


			</div>
		</div>
		<div class="row">
			<div class="col-md comments-section" id="AverageR" style="padding-top: 10px;">
				<h3 style="font-size:30px; font-style:normal !important;" id="Titles">Sell your old AP materials today!</h3>


			</div>
		</div>
		<!--<div class="col-md-2 comments-section" style = "visibility: hidden; width: 100px; padding:0px;">
				
			</div>
			<div class="col-md-5 col-md-offset-4 ml-auto comments-section height: 600px;">-->
		<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->

		<!--
				<div class="g-signin2" data-onsuccess="onSignIn"></div>
				<button onclick="signOut()">Sign out</button>
				<a href="#" onclick="signOut();">Sign out</a>
-->

		<!--connectedc8ozitvw7owe -->
		<div>
			<div style="width:100%;overflow:auto;padding:5px; height: 600px;" id="description">


				<?php if (isset($user_id)) : ?>
					<form class="clearfix"  method="post" action="books.php" id="comment_form">
						Please provide the following information about the materials. Be sure to fill out all the boxes! We prefer you fill it out once for each AP class if you have multiple course materials you are looking to sell.
						<br>
						<label for="course">Course:</label> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&emsp;&thinsp;&thinsp;&thinsp;
						<select name="course" id="course">
							<option value="AP 2-D Art and Design">AP 2-D Art and Design</option>
							<option value="AP 3-D Art and Design">AP 3-D Art and Design</option>
							<option value="AP Art History">AP Art History</option>
							<option value="AP Drawing">AP Drawing</option>
							<option value="AP Music Theory">AP Music Theory</option>
							<option value="AP English Language and Composition">AP English Language and Composition</option>
							<option value="AP English Literature and Composition">AP English Literature and Composition</option>
							<option value="AP European History">AP European History</option>
							<option value="AP Human Geography">AP Human Geography</option>
							<option value="AP Macroeconomics">AP Macroeconomics</option>
							<option value="AP Microeconomics">AP Microeconomics</option>
							<option value="AP Psychology">AP Psychology</option>
							<option value="AP US Government and Politics">AP US Government and Politics</option>
							<option value="AP United States History">AP United States History</option>
							<option value="AP World History: Modern">AP World History: Modern</option>
							<option value="AP Calculus AB">AP Calculus AB</option>
							<option value="AP Calculus BC">AP Calculus BC</option>
							<option value="AP Computer Science A">AP Computer Science A</option>
							<option value="AP Computer Science Principles">AP Computer Science Principles</option>
							<option value="AP Statistics">AP Statistics</option>
							<option value="AP Biology">AP Biology</option>
							<option value="AP Chemistry">AP Chemistry</option>
							<option value="AP Environmental Science">AP Environmental Science</option>
							<option value="AP Physics 1: Algebra-Based">AP Physics 1: Algebra-Based</option>
							<option value="AP Physics C: Electricity and Magnetism">AP Physics C: Electricity and Magnetism</option>
							<option value="AP Physics C: Mechanics">AP Physics C: Mechanics</option>
							<option value="AP Chinese Language and Culture">AP Chinese Language and Culture</option>
							<option value="AP French Language and Culture">AP French Language and Culture</option>
							<option value="AP German Language and Culture">AP German Language and Culture</option>
							<option value="AP Latin">AP Latin</option>
							<option value="AP Spanish Language and Culture">AP Spanish Language and Culture</option>

						</select>

						<br>
						Book Name: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &thinsp; &thinsp;
						<div class="inline-div" style="display:inline-block; vertical-align:middle;">
							<textarea name="comment_book" id="comment_book" class="form-control" cols="10" rows="1"></textarea>
						</div>
						<br>
						<label for="state"> Condition (New, Good, Used, Poor):&thinsp;&thinsp;
						</label>
						<select id="state" name="state">
							<option value="New">New</option>
							<option value="Good">Good</option>
							<option value="Used">Used</option>
							<option value="Poor">Poor</option>
						</select>
						
						<br>
						Price (Just the number): &thinsp;&thinsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<div class="inline-div" style="display:inline-block; vertical-align:middle;">
							<textarea name="comment_price" id="comment_price" class="form-control" cols="10" rows="1"></textarea>
						</div>
						<br>
						Contact info:&emsp;
						<div class="inline-div" style="vertical-align:middle;">
							<textarea name="comment_contact" id="comment_contact" class="form-control" cols="30" rows="1"></textarea>
						</div>
						<br>
						Other:&emsp;&emsp;&emsp;&emsp;
						<div class="inline-div" style="vertical-align:middle;">
							<textarea name="comment_etc" id="comment_etc" class="form-control" cols="30" rows="1"></textarea>
						</div>
						</br>
						<button class="btn btn-primary btn-sm pull-right" id="submit_book">Submit </button>
					</form>
				<?php else : ?>
					<div class="well" style="margin-top: 20px;">
						<h4 class="text-center">Sign in (Click login at the top right) to post a book</h4>
					</div>
				<?php endif ?>
				<!-- Display total number of comments on this post  -->
				<h2 id="rating_title"><span id="books_count"><?php echo count($books) ?></span> Book(s)</h2>
				<a href="#" id="new" onclick="sortNew()"> Sort by New </a>
				|
				<a href="#" id="Top" onclick="sortTop()"> Sort by Popular </a>

				</br>
				</br>
				<!-- comments wrapper -->
				<div id="comments-wrapper">
					<?php if (isset($books)) : ?>
						<!-- Display comments -->
						<?php foreach ($books as $book) : ?>
							<!-- comment -->
							<div class="comment clearfix">

								<table style="table-layout: fixed; width: 100% " onload="bkg();" id="unocomment<?php echo $book['id']; ?>">
									<script>
										var x = bg();
										if (x % 2 == 1) {
											var val = <?php echo $book['id'] ?>;
											var elem = "unocomment" + val;
											document.getElementById(elem).style.backgroundColor = '#85C2EF';
										} else {
											var val = <?php echo $book['id'] ?>;
											var elem = "unocomment" + val;
											document.getElementById(elem).style.backgroundColor = '#97D892';
										}
									</script>
					
									<tbody>
										<tr>
											<td style="text-align:center;">
												<!--<span class="comment-name"> < ?php echo getUsernameById($comment['user_id']) ?></span>-->
												<span class="comment-date"><?php echo date("F j, Y ", strtotime($book["created_at"])); ?></span>
												</br>Course: <?php echo $book['course']; ?> &emsp;&emsp;
												Name: <?php echo $book['name']; ?> &emsp;&emsp;
												Condition: <?php echo $book['state']; ?> &emsp;&emsp;
												Price: $<?php echo $book['price']; ?>&emsp;&emsp;
												Contact: <?php echo $book['contact']; ?>&emsp;&emsp;
												Other: <?php echo $book['etc']; ?>
												
											</td>
											
										</tr>
									</tbody>
							</div>


							</TABLE>

				</div>
				<!-- // comment -->
			<?php endforeach ?>
		<?php else : ?>
			<h2>Be the first to comment on this post</h2>
		<?php endif ?>
			</div><!-- comments wrapper -->
		</div><!-- // all comments -->
	</div>
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