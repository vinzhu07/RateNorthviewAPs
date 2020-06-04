<?php
// Set logged in user id: This is just a simulation of user login. We haven't implemented user log in
// But we will assume that when a user logs in, 
// they are assigned an id in the session variable to identify them across pages

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








$numcomment = 0;
//$APid = 1;
if (isset($_COOKIE['name'])) {
	$user_id = $_COOKIE['name'];
} else {
	$user_id = null;
}
//$user_id = 1;
if (isset($_COOKIE['sort'])) {

	$sort = $_COOKIE['sort'];
} else {
	$sort = 'created_at';
}


$username = null;
$host = getenv('DB_HOST');
if (!isset($host)) {
	$host = 'localhost';
}
$username = getenv('DB_USERNAME');
if ($username == null) {
	$username = 'root';
}
$password = getenv('DB_PASSWORD');
if ($password == null) {
	$password = '';
}
$database = getenv('DB_DATABASE');
if ($database == null) {
	$database = 'comment-reply-system';
}


// connect to database
//$db = mysqli_connect('us-cdbr-east-05.cleardb.net', 'bd6a0fdfffe95b', 'c59a7820');

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$db = new mysqli($server, $username, $password, $db);


//debug_to_console($db);
//$db = mysqli_connect($host, $username, "", "comment-reply-system");
$class_name = "";
$class = "";

if (isset($_GET['class'])) {

	$class = $_GET["class"];
	if ($class == "CSA") {
		$class_name = "AP Computer Science A";
		$class_description = "AP Computer Science A introduces students to computer science through programming.
		Fundamental topics in this course include the design of solutions to problems, the use of data
		structures to organize large sets of data, the development and implementation of algorithms
		to process data and discover new information, the analysis of potential solutions, and the
		ethical and social implications of computing systems. The course emphasizes object-oriented
		programming and design using the Java programming language.";
		$class_pic = "CSA.jpg";
	}
	if ($class == "2DArt") {
		$class_name = "AP 2-D Art and Design";
		$class_description = "The AP Art and Design program consists of three different courses and AP Portfolio
		Exams—AP 2-D Art and Design, AP 3-D Art and Design, and AP Drawing—corresponding to
		college and university foundations courses. Students may choose to submit any or all of the
		AP Portfolio Exams.
		Students create a portfolio of work to demonstrate inquiry through art and design and
		development of materials, processes, and ideas over the course of a year. Portfolios include
		works of art and design, process documentation, and written information about the work
		presented. In May, students submit portfolios for evaluation based on specific criteria, which
		include skillful synthesis of materials, processes, and ideas and sustained investigation
		through practice, experimentation, and revision, guided by questions. Students may choose to
		submit any or all of the AP Portfolio Exams.";
		$class_pic = "2DArt.jpg";
	}
	if ($class == "3DArt") {
		$class_name = "AP 3-D Art and Design";
		$class_description = "The AP Art and Design program consists of three different courses and AP Portfolio
		Exams—AP 2-D Art and Design, AP 3-D Art and Design, and AP Drawing—corresponding to
		college and university foundations courses. Students may choose to submit any or all of the
		AP Portfolio Exams.
		Students create a portfolio of work to demonstrate inquiry through art and design and
		development of materials, processes, and ideas over the course of a year. Portfolios include
		works of art and design, process documentation, and written information about the work
		presented. In May, students submit portfolios for evaluation based on specific criteria, which
		include skillful synthesis of materials, processes, and ideas and sustained investigation
		through practice, experimentation, and revision, guided by questions. Students may choose to
		submit any or all of the AP Portfolio Exams.";
		$class_pic = "3dart.jpg";
	}
	if ($class == "ArtHistory") {
		$class_name = "AP Art History";
		$class_description = "The AP Art History course welcomes students into the global art world to engage with its
		forms and content as they research, discuss, read, and write about art, artists, art making, and
		responses to and interpretations of art. By investigating specific course content of 250 works
		of art characterized by diverse artistic traditions from prehistory to the present, the students
		develop in-depth, holistic understanding of the history of art from a global perspective.
		Students learn and apply skills of visual, contextual, and comparative analysis to engage with
		a variety of art forms, developing understanding of individual works and interconnections
		across history";
		$class_pic = "arthistory.jpg";
	}
	if ($class == "Drawing") {
		$class_name = "AP Drawing";
		$class_description = "The AP Art and Design program consists of three different courses and AP Portfolio
		Exams—AP 2-D Art and Design, AP 3-D Art and Design, and AP Drawing—corresponding to
		college and university foundations courses. Students may choose to submit any or all of the
		AP Portfolio Exams.
		Students create a portfolio of work to demonstrate inquiry through art and design and
		development of materials, processes, and ideas over the course of a year. Portfolios include
		works of art and design, process documentation, and written information about the work
		presented. In May, students submit portfolios for evaluation based on specific criteria, which
		include skillful synthesis of materials, processes, and ideas and sustained investigation
		through practice, experimentation, and revision, guided by questions. Students may choose to
		submit any or all of the AP Portfolio Exams.";
		$class_pic = "drawing.jpg";
	}
	if ($class == "Music"){
		$class_name = "AP Music Theory";
		$class_description = "The AP Music Theory course corresponds to one-to-two semesters of typical, introductory
		college music theory coursework that covers topics such as musicianship, theory, and musical
		materials and procedures. Musicianship skills, including dictation and listening skills, sightsinging, and harmony, are an important part of the course. Through the course, students develop
		the ability to recognize, understand, and describe basic materials and processes of tonal music
		that are heard or presented in a score. Development of aural (listening) skills is a primary objective.
		Performance is also part of the curriculum through the practice of sight-singing. Students learn
		basic concepts and terminology by listening to and performing a wide variety of music. Notational
		skills, speed, and fluency with basic materials are emphasized.";
		$class_pic = "musictheory.jpg";
	}
	if ($class == "Lang") {
		$class_name = "AP English Language and Composition";
		$class_description = "The AP English Language and Composition course focuses on the development and revision
		of evidence-based analytic and argumentative writing, the rhetorical analysis of nonfiction
		texts, and the decisions writers make as they compose and revise. Students evaluate,
		synthesize, and cite research to support their arguments. Additionally, they read and analyze
		rhetorical elements and their effects in nonfiction texts—including images as forms of text—
		from a range of disciplines and historical periods.";
		$class_pic="lang.jpg";
	}
	if ($class == "Lit"){
		$class_name = "AP English Literature and Composition";
		$class_description = "The AP English Literature and Composition course focuses on reading, analyzing, and writing
		about imaginative literature (fiction, poetry, drama) from various periods. Students engage
		in close reading and critical analysis of imaginative literature to deepen their understanding
		of the ways writers use language to provide both meaning and pleasure. As they read,
		students consider a work’s structure, style, and themes, as well as its use of figurative
		language, imagery, and symbolism. Writing assignments include expository, analytical, and
		argumentative essays that require students to analyze and interpret literary works.";
		$class_pic = "lit.jpg";
	}
	/*if ($class == "Gov"){
		$class_name = "AP Comparative Government and Politics";
		$class_description="AP Comparative Government and Politics introduces students to the rich diversity of political
		life outside the United States. The course uses a comparative approach to examine the
		political structures; policies; and political, economic, and social challenges of six selected
		countries: China, Iran, Mexico, Nigeria, Russia, and the United Kingdom. Students compare
		the effectiveness of approaches to many global issues by examining how different
		governments solve similar problems. They will also engage in disciplinary practices that
		require them to read and interpret data, make comparisons and applications, and develop
		evidence-based arguments.";
		$class_pic="gov.jpg";
	}*/
	if ($class == "Euro"){
		$class_name = "AP European History";
		$class_description="In AP European History, students investigate significant events, individuals, developments,
		and processes from approximately 1450 to the present. Students develop and use the same
		skills, practices, and methods employed by historians: analyzing primary and secondary
		sources; developing historical arguments; making historical connections; and utilizing
		reasoning about comparison, causation, and continuity and change over time. The course
		also provides seven themes that students explore throughout the course in order to make
		connections among historical developments in different times and places: interaction of
		Europe and the world, economic and commercial development, cultural and intellectual
		development, states and other institutions of power, social organization and development,
		national and European identity, and technological and scientific innovations";
		$class_pic= "euro.jpg";
	}
	if ($class == "HumanGeo"){
		$class_name = "AP Human Geography";
		$class_description = "This course introduces students to the systematic study of patterns and processes that
		have shaped human understanding, use, and alteration of Earth’s surface. Students employ
		spatial concepts and landscape analysis to examine socioeconomic organization and its
		environmental consequences. They also learn about the methods and tools geographers use
		in their research and applications. The curriculum reflects the goals of the National Geography
		Standards (2012).";
		$class_pic = "humangeo.jpg";
	}
	if ($class == "Macro"){
		$class_name = "AP Macroeconomics";
		$class_description="AP Macroeconomics is a college-level course that introduces students to the principles
		that apply to an economic system as a whole. The course places particular emphasis on the
		study of national income and price-level determination. It also develops students’ familiarity
		with economic performance measures, the financial sector, stabilization policies, economic
		growth, and international economics. Students learn to use graphs, charts, and data to
		analyze, describe, and explain economic concepts";
		$class_pic = "macro.jpg";
	}
	if ($class == "Micro"){
		$class_name = "AP Microeconomics";
		$class_description ="AP Microeconomics is a college-level course that introduces students to the principles
		of economics that apply to the functions of individual economic decision-makers. The
		course also develops students’ familiarity with the operation of product and factor markets,
		distributions of income, market failure, and the role of government in promoting greater
		efficiency and equity in the economy. Students learn to use graphs, charts, and data to
		analyze, describe, and explain economic concepts.";
		$class_pic = "micro.jpg";
	}
	if ($class == "Psych"){
		$class_name = "AP Psychology";
		$class_description="The AP Psychology course introduces students to the systematic and scientific study of
		human behavior and mental processes. While considering the psychologists and studies
		that have shaped the field, students explore and apply psychological theories, key concepts,
		and phenomena associated with such topics as the biological bases of behavior, sensation
		and perception, learning and cognition, motivation, developmental psychology, testing
		and individual differences, treatments of psychological disorders, and social psychology.
		Throughout the course, students employ psychological research methods, including
		ethical considerations, as they use the scientific method, evaluate claims and evidence, and
		effectively communicate ideas.";
		$class_pic = "psych.jpg";
	}
	if ($class == "Gov"){
		$class_name = "AP United States Government and Politics";
		$class_description = "AP U.S. Government and Politics provides a college-level, nonpartisan introduction to
		key political concepts, ideas, institutions, policies, interactions, roles, and behaviors that
		characterize the constitutional system and political culture of the United States. Students will
		study U.S. foundational documents, Supreme Court decisions, and other texts and visuals
		to gain an understanding of the relationships and interactions among political institutions,
		processes, and behaviors. They will also engage in disciplinary practices that require them to
		read and interpret data, make comparisons and applications, and develop evidence-based
		arguments. In addition, they will complete a political science research or applied civics project.";
		$class_pic = "gov.jpg";
	}
	if ($class == "USH"){
		$class_name = "AP United States History";
		$class_description = "In AP U.S. History, students investigate significant events, individuals, developments, and
		processes in nine historical periods from approximately 1491 to the present. Students
		develop and use the same skills and methods employed by historians: analyzing primary
		and secondary sources; developing historical arguments; making historical connections;
		and utilizing reasoning about comparison, causation, and continuity and change. The course
		also provides eight themes that students explore throughout the course in order to make
		connections among historical developments in different times and places: American and
		national identity; work, exchange, and technology; geography and the environment; migration
		and settlement; politics and power; America in the world; American and regional culture; and
		social structures.";
		$class_pic = "ush.jpg";
	}
	if ($class == "World"){
		$class_name = "AP World History: Modern";
		$class_description = "In AP World History: Modern, students investigate significant events, individuals,
		developments, and processes from 1200 to the present. Students develop and use
		the same skills, practices, and methods employed by historians: analyzing primary and
		secondary sources; developing historical arguments; making historical connections; and
		utilizing reasoning about comparison, causation, and continuity and change over time. The
		course provides six themes that students explore throughout the course in order to make
		connections among historical developments in different times and places: humans and the
		environment, cultural developments and interactions, governance, economic systems, social
		interactions and organization, and technology and innovation.";
		$class_pic = "world.jpg";
	}
	if ($class == "CalcAB"){
		$class_name = "AP Calculus AB";
		$class_description = "AP Calculus AB and AP Calculus BC focus on students’ understanding of calculus concepts
		and provide experience with methods and applications. Through the use of big ideas of
		calculus (e.g., modeling change, approximation and limits, and analysis of functions), each
		course becomes a cohesive whole, rather than a collection of unrelated topics. Both courses
		require students to use definitions and theorems to build arguments and justify conclusions.
		The courses feature a multirepresentational approach to calculus, with concepts, results, and
		problems expressed graphically, numerically, analytically, and verbally. Exploring connections
		among these representations builds understanding of how calculus applies limits to develop
		important ideas, definitions, formulas, and theorems. A sustained emphasis on clear
		communication of methods, reasoning, justifications, and conclusions is essential. Teachers
		and students should regularly use technology to reinforce relationships among functions, to
		confirm written work, to implement experimentation, and to assist in interpreting results.";
		$class_pic = "calcab.jpg";
	}
	if ($class == "CalcBC"){
		$class_name = "AP Calculus BC";
		$class_description = "AP Calculus AB and AP Calculus BC focus on students’ understanding of calculus concepts
		and provide experience with methods and applications. Through the use of big ideas of
		calculus (e.g., modeling change, approximation and limits, and analysis of functions), each
		course becomes a cohesive whole, rather than a collection of unrelated topics. Both courses
		require students to use definitions and theorems to build arguments and justify conclusions.
		The courses feature a multirepresentational approach to calculus, with concepts, results, and
		problems expressed graphically, numerically, analytically, and verbally. Exploring connections
		among these representations builds understanding of how calculus applies limits to develop
		important ideas, definitions, formulas, and theorems. A sustained emphasis on clear
		communication of methods, reasoning, justifications, and conclusions is essential. Teachers
		and students should regularly use technology to reinforce relationships among functions, to
		confirm written work, to implement experimentation, and to assist in interpreting results.";
		$class_pic = "calcbc.jpg";
	}
	if ($class == "CSP"){
		$class_name = "AP Computer Science Principles";
		$class_description = "The AP Computer Science Principles course is designed to be
		equivalent to a first- semester introductory college computing
		course. In this course, students will develop computational
		thinking skills vital for success across all disciplines, such as using
		computational tools to analyze and study data and working with
		large data sets to analyze, visualize, and draw conclusions from
		trends. The course engages students in the creative aspects of the
		field by allowing them to develop computational artifacts based on
		their interests. Students will also develop effective communication
		and collaboration skills by working individually and collaboratively
		to solve problems, and will discuss and write about the impacts these
		solutions could have on their community, society, and the world.";
		$class_pic = "csp.jpg";
		}
	if ($class == "Stat"){
		$class_name = "AP Statistics";
		$class_description = "The AP Statistics course introduces students to the major concepts and tools for collecting,
		analyzing, and drawing conclusions from data. There are four themes evident in the
		content, skills, and assessment in the AP Statistics course: exploring data, sampling and
		experimentation, probability and simulation, and statistical inference. Students use technology,
		investigations, problem solving, and writing as they build conceptual understanding.";
		$class_pic = "stat.jpg";
	}
	if ($class == "Bio"){
		$class_name = "AP Biology";
		$class_description = "AP Biology is an introductory college-level biology course. Students cultivate their
		understanding of biology through inquiry-based investigations as they explore the following
		topics: evolution, cellular processes, energy and communication, genetics, information
		transfer, ecology, and interactions.";
		$class_pic = "bio.jpg";
	}
	if ($class == "Chem"){
		$class_name = "AP Chemistry";
		$class_description = "The AP Chemistry course provides students with a college-level foundation to support
		future advanced coursework in chemistry. Students cultivate their understanding of
		chemistry through inquiry-based investigations, as they explore content such as: atomic
		structure, intermolecular forces and bonding, chemical reactions, kinetics, thermodynamics,
		and equilibrium";
		$class_pic = "chem.jpg";
	}
	if ($class == "APES"){
		$class_name = "AP Environmental Science";
		$class_description = "The AP Environmental Science course is designed to engage students with the scientific
		principles, concepts, and methodologies required to understand the interrelationships
		within the natural world. The course requires that students identify and analyze natural and
		human-made environmental problems, evaluate the relative risks associated with these
		problems, and examine alternative solutions for resolving or preventing them. Environmental
		science is interdisciplinary, embracing topics from geology, biology, environmental studies,
		environmental science, chemistry, and geography.";
		$class_pic = "apes.jpg";
	}
	if ($class == "Physics1"){
		$class_name = "AP Physics 1: Algebra-Based";
		$class_description = "AP Physics 1 is an algebra-based, introductory college-level physics course. Students
		cultivate their understanding of physics through inquiry-based investigations as they explore
		these topics: kinematics, dynamics, circular motion and gravitation, energy, momentum,
		simple harmonic motion, torque and rotational motion, electric charge and electric force, DC
		circuits, and mechanical waves and sound.";
		$class_pic = "physics1.jpg";
	}
	if ($class == "PhysicsCEMag"){
		$class_name = "AP Physics C: Electricity and Magnetism";
		$class_description = "AP Physics C: Electricity and Magnetism is a calculus-based, college-level physics course,
		especially appropriate for students planning to specialize or major in physical science or
		engineering. The course explores topics such as electrostatics; conductors, capacitors, and
		dielectrics; electric circuits; magnetic fields; and electromagnetism. Introductory differential
		and integral calculus is used throughout the course.";
		$class_pic = "physicscemag.jpg";
	}
	if ($class == "PhysicsCMech"){
		$class_name = "AP Physics C: Mechanics";
		$class_description = "AP Physics C: Mechanics is a calculus-based, college-level physics course. It covers
		kinematics; Newton’s laws of motion; work, energy, and power; systems of particles and linear
		momentum; circular motion and rotation; oscillations; and gravitation. ";
		$class_pic = "physicscmech.jpg";
	}
	if ($class == "Chinese"){
		$class_name = "AP Chinese Language and Culture";
		$class_description = "The AP Chinese Language and Culture course in
		Mandarin Chinese emphasizes communication
		(understanding and being understood by others) by
		applying interpersonal, interpretive, and presentational
		skills in real-life situations. This includes vocabulary
		usage, language control, communication strategies,
		and cultural awareness. The AP Chinese Language
		and Culture course strives not to overemphasize
		grammatical accuracy at the expense of communication.
		To best facilitate the study of language and culture, the
		course is taught almost exclusively in Chinese. ";
		$class_pic = "chinese.jpg";
	}
	if ($class == "French"){
		$class_name = "AP French Language and Culture";
		$class_description = "The AP French Language and Culture course
		emphasizes communication (understanding and being
		understood by others) by applying interpersonal,
		interpretive, and presentational skills in real-life
		situations. This includes vocabulary usage, language
		control, communication strategies, and cultural
		awareness. The AP French Language and Culture
		course strives not to overemphasize grammatical
		accuracy at the expense of communication. To best
		facilitate the study of language and culture, the course
		is taught almost exclusively in French.";
		$class_pic = "french.jpg";
	}
	if ($class == "German"){
		$class_name = "AP German Language and Culture";
		$class_description = "The AP German Language and Culture course
		emphasizes communication (understanding and being
		understood by others) by applying interpersonal,
		interpretive, and presentational skills in real-life
		situations. This includes vocabulary usage, language
		control, communication strategies, and cultural
		awareness. The AP German Language and Culture
		course strives not to overemphasize grammatical
		accuracy at the expense of communication. To best
		facilitate the study of language and culture, the course
		is taught almost exclusively in German.";
		$class_pic = "german.jpg";
	}
	if ($class == "Latin"){
		$class_name = "AP Latin";
		$class_description = "The AP Latin course focuses on the in-depth study of selections from two of the greatest
		works in Latin literature: Vergil’s Aeneid and Caesar’s Gallic War. The course requires students
		to prepare and translate the readings and place these texts in a meaningful context, which
		helps develop critical, historical, and literary sensitivities. Throughout the course, students
		consider themes in the context of ancient literature and bring these works to life through
		classroom discussions, debates, and presentations. Additional English readings from both of
		these works help place the Latin readings in a significant context.";
		$class_pic = "latin.jpg";
	}
	if ($class == "Spanish"){
		$class_name = "AP Spanish Language and Culture";
		$class_description = "The AP Spanish Language and Culture course
		emphasizes communication (understanding and being
		understood by others) by applying interpersonal,
		interpretive, and presentational skills in real-life
		situations. This includes vocabulary usage, language
		control, communication strategies, and cultural
		awareness. The AP Spanish Language and Culture
		course strives not to overemphasize grammatical
		accuracy at the expense of communication. To best
		facilitate the study of language and culture, the course
		is taught almost exclusively in Spanish.";
		$class_pic = "spanish.jpg";
	}

}






$APid = $class_name;
//	debug_to_console($APid);
//debug_to_console($APid);
//debug_to_console($class_name);
// get post with id 1 from database
//$post_query_result = mysqli_query($db, "SELECT * FROM posts WHERE id=$APid");
//$post = mysqli_fetch_assoc($post_query_result);

// Get all comments from database
//debug_to_console("SELECT * FROM comments WHERE post_id=" . $post['id'] . " ORDER BY " .$sort. " DESC");
$comments_query_result = mysqli_query($db, "SELECT * FROM comments WHERE post_id= " . "'$APid'" . " ORDER BY " . $sort . " DESC");
//debug_to_console($APid);
//debug_to_console("SELECT * FROM comments WHERE post_id=" . $APid . " ORDER BY " .$sort. " DESC");
//debug_to_console('SELECT * FROM comments WHERE post_id= "' . $APid . '" ORDER BY ' .$sort. ' DESC');
$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);
//debug_to_console($APid);

function debug_to_console($data)
{
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);

	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

//debug_to_console($APid);
$average_work = mysqli_query($db, "SELECT AVG(ap_workload) 'Workload' FROM comments WHERE post_id = '$APid'");
$average_load = mysqli_fetch_assoc($average_work);
$average_workload = $average_load['Workload'];
$average_workload = round($average_workload, 1);
//debug_to_console($average_workload);
$average_teach = mysqli_query($db, "SELECT AVG(teacher) 'Teacher' FROM comments WHERE post_id = '$APid'");
$average_er = mysqli_fetch_assoc($average_teach);
$average_teacher = $average_er['Teacher'];
$average_teacher = round($average_teacher, 1);

$average_diffi = mysqli_query($db, "SELECT AVG(test) 'Test' FROM comments WHERE post_id = '$APid'");
$average_culty = mysqli_fetch_assoc($average_diffi);
$average_difficulty = $average_culty['Test'];
$average_difficulty = round($average_difficulty, 1);

$average_f = mysqli_query($db, "SELECT AVG(fun) 'Fun' FROM comments WHERE post_id = '$APid'");
$average_un = mysqli_fetch_assoc($average_f);
$average_fun = $average_un['Fun'];
$average_fun = round($average_fun, 1);

//debug_to_console($APid);


//$average_workload = $average_load[0];
//$average_workload = mysqli_fetch_row($average_work);

//$finfo = $average_work->fetch_field(); 

//$average_workload = $finfo;




//$average_workload=$average_load[0];
// Receives a user id and returns the username
/*function getUsernameById($id)
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
	*/
function getCommentsCountByPostId($post_id)
{
	global $db;
	$result = mysqli_query($db, "SELECT COUNT(*) AS total FROM comments");
	$data = mysqli_fetch_assoc($result);
	return $data['total'];
}
//debug_to_console($APid);
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


//debug_to_console($APid);
//...
// If the user clicked submit on comment form...
if (isset($_POST['comment_posted'])) {
	global $db;
	// grab the comment that was submitted through Ajax call
	$comment_workload = (int) $_POST['comment_workload'];
	$comment_teacher = (int) $_POST['comment_teacher'];
	$comment_test = (int) $_POST['comment_test'];
	$comment_fun = (int) $_POST['comment_fun'];
	$comment_text = $_POST['comment_text'];
	$comment_class = $_POST['comment_class'];
	// insert comment into database
	//debug_to_console($comment_text);
	//debug_to_console($comment_class);

	$id = getTotalComments() + 1;
	//
	$sql = "INSERT INTO `comments` (`id`, `user_id`, `post_id`, `ap_workload`, `teacher`, `test`, `fun`, `body`, `created_at`, `likes`) VALUES ($id, '$user_id' , '$comment_class', '$comment_workload', '$comment_teacher', '$comment_test', '$comment_fun', '$comment_text', now(), 1)";
	//debug_to_console($sql);
	//debug_to_console($APid);


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
	$colors = (int) $_POST['colors'];
	$bg = "";
	if ($colors % 2 == 1) {
		$bg = "#85C2EF";
	} else {
		$bg = "#97D892";
	}
	if ($result) {
		$comment = "<div class='comment clearfix' >

								<table style='table-layout: fixed; width: 100% ;background-color:" . trim($bg, '"') . "' onload='bkg();' id = 'unocomment" . $inserted_comment['id'] . "'>
								
									<colgroup>

										<col span='1' style='width: 10%;'>
										<col span='1' style='width: 90%;'>
									</colgroup>
									<tbody>
										<tr>
											<td style='text-align:center;'>
											<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_comment['created_at'])) . "</span>
											</br><u>Workload</u></br> " . $inserted_comment['ap_workload'] . " </br>
												<u>Teacher </u></br>" . $inserted_comment['teacher'] . " </br>
												<u>Difficulty </u></br>" . $inserted_comment['test'] . " </br>
												<u>Fun </u></br>" . $inserted_comment['fun'] . "</br>
												<a class='likes' href='#' id=" . $inserted_comment['id'] . " data-id=" . $inserted_comment['id'] . "> <img src='thumbs.png' height='12' width='12'>" . $inserted_comment['likes'] . "</a>
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
			'comments_count' => getCommentsCountByPostId('$inserted_comment["post_id"]')
		);
		echo json_encode($comment_info);
		exit();
	} else {
		echo "error";
		exit();
	}
}
// If the user clicked submit on reply form...
/*if (isset($_POST['reply_posted'])) {
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
*/
if (isset($_POST['like_attempt'])) {
	global $db;
	$comment_id = $_POST['comment_id'];
	$name = $_POST['name'];

	$sql = "SELECT `comment_id`, `user_id` FROM `likes` WHERE `comment_id` LIKE $comment_id AND `user_id` LIKE '$user_id'";
	//debug_to_console($sql);
	$result = mysqli_query($db, $sql);
	//debug_to_console(mysqli_num_rows($result));
	if (mysqli_num_rows($result) > 0) {
		echo "error";
		exit();
	} else {
		$sql = "INSERT INTO `likes`(`comment_id`, `user_id`) VALUES ($comment_id,'$user_id')";
		$result = mysqli_query($db, $sql);
		$res = mysqli_query($db, "SELECT * FROM comments WHERE id=$comment_id");
		$comment = mysqli_fetch_assoc($res);
		$comment_likes = $comment['likes'] + 1;
		$sql = "UPDATE `comments` SET `likes`= $comment_likes WHERE id = $comment_id	";
		$result = mysqli_query($db, $sql);

		echo "Dank";
		exit();
	}
	exit();
}
