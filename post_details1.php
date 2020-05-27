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

<body onload="document.frm1.submit()">
	<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
	<form action="functions.php" name="frm1" method="post" target="dummyframe">
			<input type="hidden" name="class" value="CSA" />
		</form>
		<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
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

		<div class="container">

			<div class="row">
				<div class=" post">

					<h2 id="Titles"><?php echo $_POST["class"] ?></h2>

					<div class="row">
						<p class="col-md-6" id="description">AP Computer Science A introduces students to computer science through programming.
							Fundamental topics in this course include the design of solutions to problems, the use of data
							structures to organize large sets of data, the development and implementation of algorithms
							to process data and discover new information, the analysis of potential solutions, and the
							ethical and social implications of computing systems. The course emphasizes object-oriented
							programming and design using the Java programming language. </p>
						<p class="col-md-6"><img src="img/APCSA.jpg" alt="Title" class="img-responsive center-block" style="width:90%;"></p>

					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md comments-section" id="AverageR" style="padding-top: 10px;">
					<h3 style="font-size:30px; font-style:normal !important;" id="Titles">Average Ratings</h3>
					<div id="description">
						<TABLE>
							<TR>
								<TD style="width:20%;color: white!important;">Workload: <span id="average_work"><?php echo $average_workload ?></span> / 5 </TD>
								<TD style="width:20%;color: white!important;">Teacher: <span id="average_teacher"><?php echo $average_teacher ?></span> / 5</TD>
								<TD style="width:20%;color: white!important;">Difficulty: <span id="average_test"><?php echo $average_difficulty ?></span> / 5</TD>
								<TD style="width:20%;color: white!important;">Fun: <span id="average_fun"><?php echo $average_fun ?></span> / 5</TD>
							</TR>
							<TR>
								<TD style="width:20%;color: white!important;"><span id="average_workstars" style="vertical-align:center;"></span></TD>
								<TD style="width:20%;color: white!important;"><span id="average_teachstars" style="vertical-align:center;"></span></TD>
								<TD style="width:20%;color: white!important;"><span id="average_teststars" style="vertical-align:center;"></span></TD>
								<TD style="width:20%;color: white!important;"><span id="average_funstars" style="vertical-align:center;"></span></TD>
							</TR>

						</TABLE>
						<!--</br></p>
					<p style="font-size:17px;">  </br></p>
					<p style="font-size:17px;">  </br></p>
					<p style="font-size:17px;">  </br></p>
					</br> -->
					</div>

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
						<form class="clearfix" action="post_details.php" method="post" id="comment_form">
							Please rate this AP on the following aspects out of 5 stars. Be sure to fill out all the boxes!
							<br>
							Workload (1 being lots, 5 being none):&emsp;&thinsp;&thinsp;&emsp;&thinsp;

							<div class="inline-div" style="display:inline-block; vertical-align:middle;">
								<textarea name="comment_workload" id="comment_workload" class="form-control" cols="10" rows="1"></textarea>
							</div>
							<br>
							Teachers (1 is worst, 5 is the best): &emsp;&emsp;&emsp; &thinsp; &thinsp;
							<div class="inline-div" style="display:inline-block; vertical-align:middle;">
								<textarea name="comment_teacher" id="comment_teacher" class="form-control" cols="10" rows="1"></textarea>
							</div>
							<br>
							Difficulty (1 being impossible, 5 being easy):&thinsp;
							<div class="inline-div" style="display:inline-block; vertical-align:middle;">
								<textarea name="comment_test" id="comment_test" class="form-control" cols="10" rows="1"></textarea>
							</div>
							<br>
							Fun (5 being the most fun): &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;
							<div class="inline-div" style="display:inline-block; vertical-align:middle;">
								<textarea name="comment_fun" id="comment_fun" class="form-control" cols="10" rows="1"></textarea>
							</div>
							<br>
							General Comments:
							<div class="inline-div" style="vertical-align:middle;">
								<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
							</div>
							</br>
							<button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment </button>
						</form>
					<?php else : ?>
						<div class="well" style="margin-top: 20px;">
							<h4 class="text-center">Sign in (Click login at the top right) to post a comment</h4>
						</div>
					<?php endif ?>
					<!-- Display total number of comments on this post  -->
					<h2 id="rating_title"><span id="comments_count"><?php echo count($comments) ?></span> Ratings(s)</h2>
					<a href="#" id="new" onclick="sortNew()"> Sort by New </a>
					|
					<a href="#" id="Top" onclick="sortTop()"> Sort by Popular </a>

					</br>
					</br>
					<!-- comments wrapper -->
					<div id="comments-wrapper">
						<?php if (isset($comments)) : ?>
							<!-- Display comments -->
							<?php foreach ($comments as $comment) : ?>
								<!-- comment -->
								<div class="comment clearfix">

									<table style="table-layout: fixed; width: 100% " onload="bkg();" id="unocomment<?php echo $comment['id']; ?>">
										<script>
											var x = bg();
											if (x % 2 == 1) {
												var val = <?php echo $comment['id'] ?>;
												var elem = "unocomment" + val;
												document.getElementById(elem).style.backgroundColor = '#85C2EF';
											} else {
												var val = <?php echo $comment['id'] ?>;
												var elem = "unocomment" + val;
												document.getElementById(elem).style.backgroundColor = '#97D892';
											}
										</script>
										<colgroup>

											<col span="1" style="width: 10%;">
											<col span="1" style="width: 90%;">
										</colgroup>
										<tbody>
											<tr>
												<td style="text-align:center;">
													<!--<span class="comment-name"> < ?php echo getUsernameById($comment['user_id']) ?></span>-->
													<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
													</br><u>Workload</u></br> <?php echo $comment['ap_workload']; ?> </br>
													<u>Teacher </u></br><?php echo $comment['teacher']; ?> </br>
													<u>Difficulty </u></br><?php echo $comment['test']; ?> </br>
													<u>Fun </u></br><?php echo $comment['fun']; ?></br>
													<a class="likes" href="#" id=<?php echo $comment['id']; ?> data-id="<?php echo $comment['id']; ?>"> <img src="thumbs.png" height="12" width="12"> <?php echo $comment['likes']; ?></a>
												</td>
												<td style="vertical-align:middle; overflow-wrap:anywhere;">
													<p><?php echo $comment['body']; ?></p>
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