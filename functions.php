<?php
	// Set logged in user id: This is just a simulation of user login. We haven't implemented user log in
	// But we will assume that when a user logs in, 
	// they are assigned an id in the session variable to identify them across pages
	$numcomment=0;
	$APid = 1;
    if (isset($_COOKIE['name'])){
		$user_id=$_COOKIE['name'];
	}
	else {
		$user_id=null;
	}
	//$user_id = 1;
	if (isset($_COOKIE['sort'])){
   
		$sort=$_COOKIE['sort'];
	}
	else{
		$sort = 'created_at';
	}

	$username = null;
	$host = getenv('DB_HOST');
	if (!isset($host)){
		$host = 'localhost';
	}
	$username = getenv('DB_USERNAME');
	if ($username==null){
		$username = 'root';
	}
	$password = getenv('DB_PASSWORD');
	if ($password==null){
		$password = '';
	}
	$database = getenv('DB_DATABASE');
	if ($database==null){
		$database = 'comment-reply-system';
	}
	
    
	// connect to database
	$db = mysqli_connect($host, $username, $password, $database);
	
	//$db = mysqli_connect($host, $username, "", "comment-reply-system");
	
	
	// get post with id 1 from database
	$post_query_result = mysqli_query($db, "SELECT * FROM posts WHERE id=$APid");
	$post = mysqli_fetch_assoc($post_query_result);

	// Get all comments from database
	//debug_to_console("SELECT * FROM comments WHERE post_id=" . $post['id'] . " ORDER BY " .$sort. " DESC");
	$comments_query_result = mysqli_query($db, "SELECT * FROM comments WHERE post_id=" . $post['id'] . " ORDER BY " .$sort. " DESC");
	$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);
	
	
	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}


	$average_work = mysqli_query($db, "SELECT AVG(ap_workload) 'Workload' FROM comments WHERE post_id = $APid");
	$average_load = mysqli_fetch_assoc($average_work);
	$average_workload = $average_load['Workload'];
	$average_workload = round($average_workload,1);
	//debug_to_console($average_workload);
	$average_teach = mysqli_query($db, "SELECT AVG(teacher) 'Teacher' FROM comments WHERE post_id = $APid");
	$average_er = mysqli_fetch_assoc($average_teach);
	$average_teacher = $average_er['Teacher'];
	$average_teacher = round($average_teacher,1);

	$average_diffi = mysqli_query($db, "SELECT AVG(test) 'Test' FROM comments WHERE post_id = $APid");
	$average_culty = mysqli_fetch_assoc($average_diffi);
	$average_difficulty = $average_culty['Test'];
	$average_difficulty = round($average_difficulty,1);

	$average_f = mysqli_query($db, "SELECT AVG(fun) 'Fun' FROM comments WHERE post_id = $APid");
	$average_un = mysqli_fetch_assoc($average_f);
	$average_fun = $average_un['Fun'];
	$average_fun = round($average_fun,1);




	//$average_workload = $average_load[0];
	//$average_workload = mysqli_fetch_row($average_work);
	
	//$finfo = $average_work->fetch_field(); 

   //$average_workload = $finfo;
        
    
    
	
	//$average_workload=$average_load[0];
	// Receives a user id and returns the username
	function getUsernameById($id)
	{
		global $db;
		$result = mysqli_query($db, "SELECT username FROM users WHERE id=" . $id . " LIMIT 1");
		// return the username
		return mysqli_fetch_assoc($result)['username'];
	}
	// Receives a comment id and returns the username
	function getRepliesByCommentId($id)
	{
		global $db;
		$result = mysqli_query($db, "SELECT * FROM replies WHERE comment_id=$id");
		$replies = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $replies;
	}
	// Receives a post id and returns the total number of comments on that post
	function getCommentsCountByPostId($post_id)
	{
		global $db;
		$result = mysqli_query($db, "SELECT COUNT(*) AS total FROM comments");
		$data = mysqli_fetch_assoc($result);
		return $data['total'];
	}
	
	function getLikesByComment($id)
	{
		global $db;
		$result = mysqli_query($db, "SELECT comment FROM comments WHERE id=" . $id . " LIMIT 1");
		// return the username
		return mysqli_fetch_assoc($result)['likes'];
	}

	function getTotalComments()
	{
		global $db;
		$result = mysqli_query($db, "SELECT COUNT(*) AS total FROM comments");
		$data = mysqli_fetch_assoc($result);
		return $data['total'];

	}
	

	
    //...
// If the user clicked submit on comment form...
if (isset($_POST['comment_posted'])) {
	global $db;
	// grab the comment that was submitted through Ajax call
	$comment_workload = (int)$_POST['comment_workload'];
	$comment_teacher = (int)$_POST['comment_teacher'];
	$comment_test = (int)$_POST['comment_test'];
	$comment_fun = (int)$_POST['comment_fun'];
	$comment_text = $_POST['comment_text'];
	
	// insert comment into database
	

	$id = getTotalComments()+1;
	//
	$sql = "INSERT INTO `comments` (`id`, `user_id`, `post_id`, `ap_workload`, `teacher`, `test`, `fun`, `body`, `created_at`, `likes`) VALUES ($id, '$user_id' ,1, '$comment_workload', '$comment_teacher', '$comment_test', '$comment_fun', '$comment_text', now(), 1)";

	

	$result = mysqli_query($db, $sql);
	// Query same comment from database to send back to be displayed
	$inserted_id = $db->insert_id;
	$res = mysqli_query($db, "SELECT * FROM comments WHERE id=$id");
	$inserted_comment = mysqli_fetch_assoc($res);
	// if insert was successful, get that same comment from the database and return it
	//<a class='likes' href='#' onclick='like()' data-id='" . $inserted_comment['id'] . "'> <img src = 'thumbs.jpg' height='12' width='12'>reply $inserted_comment['likes']</a>				
	/*<!-- reply form -->
	<form action='post_details.php' class='reply_form clearfix' id='comment_reply_form_" . $inserted_comment['id'] . "' data-id='" . $inserted_comment['id'] . "'>
		<textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
		<button class='btn btn-primary btn-xs pull-right submit-reply'>Submit reply</button>
	</form>*/
	$colors = (int)$_POST['colors'];
	$bg = "";
	if ($colors%2==1){
		$bg = "#85C2EF";
	}
	else{
		$bg = "#97D892";
	}
	if ($result) {
		$comment = "<div class='comment clearfix' >

								<table style='table-layout: fixed; width: 100% ;background-color:".trim($bg,'"')."' onload='bkg();' id = 'unocomment". $inserted_comment['id'] ."'>
								
									<colgroup>

										<col span='1' style='width: 10%;'>
										<col span='1' style='width: 90%;'>
									</colgroup>
									<tbody>
										<tr>
											<td style='text-align:center;'>
											<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_comment['created_at'])) . "</span>
											</br><u>Workload</u></br> ". $inserted_comment['ap_workload'] . " </br>
												<u>Teacher </u></br>" . $inserted_comment['teacher'] . " </br>
												<u>Difficulty </u></br>" . $inserted_comment['test'] . " </br>
												<u>Fun </u></br>" . $inserted_comment['fun'] . "</br>
												<a class='likes' href='#' id=" . $inserted_comment['id'] . " data-id=". $inserted_comment['id'] ."> <img src='thumbs.png' height='12' width='12'>" . $inserted_comment['likes'] ."</a>
											</td>
											<td style='vertical-align:middle; overflow-wrap:anywhere;'>
												<p>" . $inserted_comment['body'] . "</p>
											</td>
										</tr>
									</tbody>
							</div>


							</TABLE>";
		/*$comment = "<div class='comment clearfix'>
					<div class='comment-details'>
						<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_comment['created_at'])) . "</span>
						<p> Workload: ". $inserted_comment['ap_workload'] . " / 5 </p>
						<p> Teacher: " . $inserted_comment['teacher'] . " / 5 </p>
						<p> Difficulty: " . $inserted_comment['test'] . " / 5 </p>
						<p> Fun: " . $inserted_comment['fun'] . " / 5 </p>
						<p> General Comments: " . $inserted_comment['body'] . "</p>
						<a class='likes' onclick='like()' href='#' data-id='" . $inserted_comment['id'] . "'> <img src = 'thumbs.jpg' height='12' width='12'>". $inserted_comment['likes'] . "</a>

					</div>
					
				</div>"; */
		$comment_info = array(
			'comment' => $comment,
			'comments_count' => getCommentsCountByPostId(1)
		);
		echo json_encode($comment_info);
		exit();
	} else {
		echo "error";
		exit();
	}
}
// If the user clicked submit on reply form...
if (isset($_POST['reply_posted'])) {
	global $db;
	// grab the reply that was submitted through Ajax call
	$reply_text = $_POST['reply_text']; 
	$comment_id = $_POST['comment_id']; 
	// insert reply into database
	$sql = "INSERT INTO replies (user_id, comment_id, body, created_at, updated_at) VALUES (" . $user_id . ", $comment_id, '$reply_text', now(), null)";
	$result = mysqli_query($db, $sql);
	$inserted_id = $db->insert_id;
	$res = mysqli_query($db, "SELECT * FROM replies WHERE id=$inserted_id");
	$inserted_reply = mysqli_fetch_assoc($res);
	// if insert was successful, get that same reply from the database and return it
	if ($result) {
		$reply = "<div class='comment reply clearfix'>
					<img src='profile.png' alt='' class='profile_pic'>
					<div class='comment-details'>
						<span class='comment-name'>" . getUsernameById($inserted_reply['user_id']) . "</span>
						<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_reply['created_at'])) . "</span>
						<p>" . $inserted_reply['body'] . "</p>
						<a class='reply-btn' href='#'>reply</a>
					</div>
				</div>";
		echo $reply;
		exit();
	} else {
		echo "error";
		exit();
	}
}

if (isset($_POST['like_attempt'])) {
	global $db;
	$comment_id = $_POST['comment_id']; 
	$name = $_POST['name'];
	
	$sql = "SELECT `comment_id`, `user_id` FROM `likes` WHERE `comment_id` LIKE $comment_id AND `user_id` LIKE '$user_id'";
	//debug_to_console($sql);
	$result = mysqli_query($db, $sql);
	//debug_to_console(mysqli_num_rows($result));
	if (mysqli_num_rows($result)>0){
		echo"error";
		exit();
	}
	else{
		$sql = "INSERT INTO `likes`(`comment_id`, `user_id`) VALUES ($comment_id,'$user_id')";
		$result = mysqli_query($db, $sql);
		$res = mysqli_query($db, "SELECT * FROM comments WHERE id=$comment_id");
		$comment = mysqli_fetch_assoc($res);
		$comment_likes=$comment['likes'] + 1;
		$sql= "UPDATE `comments` SET `likes`= $comment_likes WHERE id = $comment_id	";
		$result = mysqli_query($db, $sql);
		
		echo"Dank";
		exit();
	}
	exit();
}
