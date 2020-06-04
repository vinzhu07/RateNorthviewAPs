var status = 0;
$(document).ready(function () {

	//console.log(getCookie("name"));
	//console.log(!(getCookie("name")==null));
	if (!(getCookie("name") == null)) {
		document.getElementById("loginstatus").innerHTML = "<span class='glyphicon glyphicon-log-out'></span> Logout";
		status = 2;
	}
	else {
		document.getElementById("loginstatus").innerHTML = "<span class='glyphicon glyphicon-log-in'></span> Login";
		status = 1;
	}

	if (document.getElementById('classname')){
	var categories = ["average_work","average_teacher","average_test","average_fun"];
	var ids = ["average_workstars","average_teachstars","average_teststars","average_funstars"];
	for (a = 0; a<4;a++){

	var average_workload = (document.getElementById(categories[a])).innerHTML;
	var average_workload = parseFloat(average_workload);
	for (i = 0.5; i <5.5; i++) {
		//console.log(average_workload);
		//console.log(i);
		//console.log(average_workload>i);
		if (average_workload>i){
			document.getElementById(ids[a]).innerHTML = document.getElementById(ids[a]).innerHTML+"<img style = 'max-width: 20%;' src='https://img.icons8.com/fluent/48/000000/star.png'/>";
		}
		else{
			document.getElementById(ids[a]).innerHTML = document.getElementById(ids[a]).innerHTML+"<img style = 'max-width: 20%;' src='https://img.icons8.com/ios-filled/48/000000/star.png'/>";
		}
	  }
	}
}
	// When user clicks on submit comment to add comment under post
	$(document).on('click', '#submit_comment', function (e) {
		e.preventDefault();

		var comment_workload = $('#comment_workload').val();
		var comment_teacher = $('#comment_teacher').val();
		var comment_test = $('#comment_test').val();
		var comment_fun = $('#comment_fun').val();
		var comment_text = $('#comment_text').val();
		var comment_class = document.getElementById("classname").textContent;
		//console.log(comment_class)
		var url = $('#comment_form').attr('action');
		// Stop executing if not value is entered
		if (comment_text === "") return;
		$.ajax({
			url: url,
			type: "POST",
			data: {
				comment_workload: comment_workload,
				comment_teacher: comment_teacher,
				comment_test: comment_test,
				comment_fun: comment_fun,
				comment_text: comment_text,
				comment_class: comment_class,
				comment_posted: 1,
				colors : bg()
			},
			//dataType: 'text',
			success: function (data) {
				//console.log(document.cookie);
				//console.log();
				//console.log((data));
				//alert(data);
				var response = JSON.parse(data);
				if (data === "error") {
					alert('There was an error adding comment. Please try again');
				}
				else {
					//location.reload();
					$('#comments-wrapper').prepend(response.comment);
					document.getElementById("comments_count").innerText=Number(document.getElementById("comments_count").innerText)+1;
					$('#comment_text').val('');
					$('#comment_workload').val('');
					$('#comment_teacher').val('');
					$('#comment_test').val('');
					$('#comment_fun').val('');

				}
                /*var x = data.replace(/\\n/g, "\\n")  
               .replace(/\\'/g, "\\'")
               .replace(/\\"/g, '\\"')
               .replace(/\\&/g, "\\&")
               .replace(/\\r/g, "\\r")
               .replace(/\\t/g, "\\t")
               .replace(/\\b/g, "\\b")
               .replace(/\\f/g, "\\f");
                 // remove non-printable and other non-valid JSON chars
                 x = x.replace(/[\u0000-\u0019]+/g,""); 
                */
				/*var response = JSON.parse(data);
				if (data === "error") {
					alert('There was an error adding comment. Please try again');
				} else {
					
					$('#comments-wrapper').prepend(response.comment)
					$('#comments_count').text(response.comments_count); 
					$('#comment_text').val('');
					$('#comment_workload').val('');
					$('#comment_teacher').val('');
					$('#comment_test').val('');
					$('#comment_fun').val('');
					*/
					
			}
		}
		);
	});
	// When user clicks on submit reply to add reply under comment
	$(document).on('click', '.reply-btn', function (e) {
		e.preventDefault();
		// Get the comment id from the reply button's data-id attribute
		var comment_id = $(this).data('id');
		// show/hide the appropriate reply form (from the reply-btn (this), go to the parent element (comment-details)
		// and then its siblings which is a form element with id comment_reply_form_ + comment_id)
		$(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
		$(document).on('click', '.submit-reply', function (e) {
			e.preventDefault();
			// elements
			var reply_textarea = $(this).siblings('textarea'); // reply textarea element
			var reply_text = $(this).siblings('textarea').val();
			var url = $(this).parent().attr('action');
			$.ajax({
				url: url,
				type: "POST",
				data: {
					comment_id: comment_id,
					reply_text: reply_text,
					reply_posted: 1
				},
				success: function (data) {
					if (data === "error") {
						alert('There was an error adding reply. Please try again');
					} else {
						$('.replies_wrapper_' + comment_id).append(data);
						reply_textarea.val('');
					}
				}
			});
		});
	});

	$(document).on('click', '.likes', function (e) {
		e.preventDefault();

		var comment_id = $(this).data('id');
		var name = getCookie("name");

		var url = $(this).parent().attr('action');
		$.ajax({
			url: url,
			type: "POST",
			data: {
				comment_id: comment_id,
				name: name,
				like_attempt: 1
			},
			success: function (data) {
				if (data == "error") {
					alert('You thought.');
				} else {
					console.log(data);
					var ret = document.getElementById(comment_id).innerHTML;
					var number = ret.replace('<img src="thumbs.jpg" height="12" width="12">', '');

					number = parseInt(number) + 1;

					document.getElementById(comment_id).innerHTML = '<img src = "thumbs.jpg" height="12" width="12"> ' + number;

				}
			}
		});
	});





});

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

function onSignIn(googleUser) {
	if (getCookie("name") == null) {
		var profile = googleUser.getBasicProfile();
		console.log('Name: ' + profile.getName());
		document.cookie = 'name=' + profile.getName();
		location.reload();
	}


	//console.log('Image URL: ' + profile.getImageUrl()); location.reload();
	//console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	var url = $('#comment_form').attr('action');
	auth2.signOut().then(function () {
		console.log('User signed out.');
		//$user_id=null;
		document.cookie = "name= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
		/*$.ajax({
		  url: url,
		  type: "POST",
		  data: {
			  name:null
		  },
		  //dataType: 'text',
		  success: function(data){
		  	
			  var x = data.replace(/\\n/g, "\\n")  
			 .replace(/\\'/g, "\\'")
			 .replace(/\\"/g, '\\"')
			 .replace(/\\&/g, "\\&")
			 .replace(/\\r/g, "\\r")
			 .replace(/\\t/g, "\\t")
			 .replace(/\\b/g, "\\b")
			 .replace(/\\f/g, "\\f");
			   // remove non-printable and other non-valid JSON chars
			   x = x.replace(/[\u0000-\u0019]+/g,""); 
		  	
			 var response = JSON.parse(data);
			 if (data === "error") {
				 alert('There was an error adding comment. Please try again');
		 }
	 } }); */

		location.reload();
	}
	)
}

function status() {

}

function sign() {
	if (document.getElementById("loginstatus").innerHTML == "Logout") {
		signOut();
	}
	else {
		onSignIn();
	}
}

/*gapi.load('auth2', function() {
	gapi.auth2.init({
		client_id: "236678873035-kqio5dc3tcch8vage3i9mon8slntcej5.apps.googleusercontent.com",
		scope: "profile email" // this isn't required
	}).then(function(auth2) {
		console.log( "signed in: " + auth2.isSignedIn.get() );  
		auth2.isSignedIn.listen(onSignIn);
		var button = document.querySelector('#loginstatus');
		button.addEventListener('click', function() {
		  auth2.signIn();
		  
		});
	});
});*/

gapi.load('auth2', function () {
	auth2 = gapi.auth2.init({
		client_id: '236678873035-kqio5dc3tcch8vage3i9mon8slntcej5.apps.googleusercontent.com',
		fetch_basic_profile: false,
		scope: 'profile'
	}).then(function (auth2) {
		var button = document.querySelector('#loginstatus');
		button.addEventListener('click', function () {

			// Sign the user in, and then retrieve their ID.
			if (status == 1) {
				auth2.signIn().then(function () {
					var profile = auth2.currentUser.get().getBasicProfile();
					console.log('Email: ' + profile.getEmail());
					var email = profile.getEmail();
					
					//console.log(auth2.currentUser.get().getName());
					document.cookie = 'name=' + email;
					location.reload();

				});
	}
			else if (status == 2) {
		signOut();
	}
	
});
	});
});


function sortNew(){
	document.cookie = "sort = created_at;";
	location.reload();
}

function sortTop(){
	document.cookie = "sort=  likes;";
	location.reload();
}
var z = 0;
function bkg()
{
	console.log(z)
	if (z%2==1){
		this.style.backgroundColor='#85C2EF';
	}
	else{
		this.style.backgroundColor='#97D892';
	}
	z=z+1;
}


function bg(){
	z=z+1;
	return z;
}