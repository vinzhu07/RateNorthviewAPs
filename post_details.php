<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="google-signin-client_id" content="236678873035-kqio5dc3tcch8vage3i9mon8slntcej5.apps.googleusercontent.com">
	<title>Comment and reply system in PHP</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 post">
			<h2><?php echo $post['title'] ?></h2>
			<p><?php echo $post['body']; ?></p>
		</div>
		<div class="col-md-6 col-md-offset-3 comments-section">
			<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->


			<div class="g-signin2" data-onsuccess="onSignIn"></div>
			<button onclick="signOut()">Sign out</button>
			<a href="#" onclick="signOut();">Sign out</a>
			
			
			<!--connectedc8ozitvw7owe -->
			
			<?php if (isset($user_id)): ?>
				<form class="clearfix" action="post_details.php" method="post" id="comment_form">
					Please rate this AP on the following aspects out of 5 stars. Be sure to fill out all the boxes!
					<br>
					Workload (1 being lots, 5 being none):&emsp;&thinsp;&thinsp;&emsp;&thinsp;

					<div class="inline-div"  style = "display:inline-block; vertical-align:middle;">
					<textarea name="comment_workload" id="comment_workload" class="form-control" cols="10" rows="1" ></textarea>
					</div>
					<br>
					Teachers: &emsp;&emsp;   &emsp;&emsp;&emsp;&emsp;&emsp;   &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&thinsp; &thinsp;&thinsp;&thinsp;
					<div class="inline-div"  style = "display:inline-block; vertical-align:middle;" >
					<textarea name="comment_teacher" id="comment_teacher" class="form-control" cols="10" rows="1" ></textarea>
					</div>
					<br>
					Difficulty (1 being impossible, 5 being easy):&thinsp;
					<div class="inline-div"  style = "display:inline-block; vertical-align:middle;">
					<textarea name="comment_test" id="comment_test" class="form-control" cols="10" rows="1" ></textarea>
					</div>
					<br>
					Fun (5 being the most fun): &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;
					<div class="inline-div"  style = "display:inline-block; vertical-align:middle;">
					<textarea name="comment_fun" id="comment_fun" class="form-control" cols="10" rows="1" ></textarea>
					</div>
					<br>
					General Comments:
					<div class="inline-div"style = "vertical-align:middle;" >
					<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
					</div>
					</br>
					<button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment </button>
				</form>
			<?php else: ?>
				<div class="well" style="margin-top: 20px;">
					<h4 class="text-center"><a href="#">Sign in</a> to post a comment</h4>
				</div>
			<?php endif ?>
			<!-- Display total number of comments on this post  -->
			<h2><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h2>
			<hr>
			<!-- comments wrapper -->
			<div id="comments-wrapper">
			<?php if (isset($comments)): ?>
				<!-- Display comments -->
				<?php foreach ($comments as $comment): ?>
				<!-- comment -->
				<div class="comment clearfix">
					
					<div class="comment-details">
						<!--<span class="comment-name"> < ?php echo getUsernameById($comment['user_id']) ?></span>-->
						<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
						<p>Workload: <?php echo $comment['ap_workload']; ?> / 5</p>
						<p>Teacher: <?php echo $comment['teacher']; ?> / 5</p>
						<p>Difficulty: <?php echo $comment['test']; ?> / 5</p>
						<p>Fun: <?php echo $comment['fun']; ?> / 5</p>
						<p><?php echo $comment['body']; ?></p>
						<a class="likes" href="#"  id =<?php echo $comment['id']; ?> data-id="<?php echo $comment['id']; ?>"> <img src = "thumbs.jpg" height="12" width="12"> <?php echo $comment['likes']; ?></a>
					</div>
					<!-- reply form -->
					<form action="post_details.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['id'] ?>" data-id="<?php echo $comment['id']; ?>">
						<textarea class="form-cntrol" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
						<button class="btn btn-primary btn-xs pull-right submit-reply">Submit reply</button>
					</form>

					<!-- GET ALL REPLIES -->
					<?php $replies = getRepliesByCommentId($comment['id']) ?>
					<div class="replies_wrapper_<?php echo $comment['id']; ?>">
						<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
								<!-- reply -->
								<div class="comment reply clearfix">
									<div class="comment-details">
										<span class="comment-name"><?php echo getUsernameById($reply['user_id']) ?></span>
										<span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
										<p><?php echo $reply['body']; ?></p>
										<a class="reply-btn" href="#">reply</a>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
					<!-- // comment -->
				<?php endforeach ?>
			<?php else: ?>
				<h2>Be the first to comment on this post</h2>
			<?php endif ?>
			</div><!-- comments wrapper -->
		</div><!-- // all comments -->
	</div>
</div>
<!-- Javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
</script>
<script src="https://apis.google.com/js/client:platform.js?onload=start" async defer>
</script>

<script src="scripts.js"></script>
</body>
</html>