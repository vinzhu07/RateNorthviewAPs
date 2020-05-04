$(document).ready(function(){
	// When user clicks on submit comment to add comment under post
	$(document).on('click', '#submit_comment', function(e) {
		e.preventDefault();

		var comment_workload = $('#comment_workload').val();
		var comment_teacher = $('#comment_teacher').val();
		var comment_test = $('#comment_test').val();
		var comment_fun = $('#comment_fun').val();
		var comment_text = $('#comment_text').val();
		var url = $('#comment_form').attr('action');
		// Stop executing if not value is entered
		if (comment_text === "" ) return;
		$.ajax({
			url: url,
			type: "POST",
			data: {
				comment_workload: comment_workload,
				comment_teacher: comment_teacher,
				comment_test: comment_test,
				comment_fun: comment_fun,
				comment_text: comment_text,
				comment_posted: 1
			},
			//dataType: 'text',
			success: function(data){
				console.log(document.cookie);
				console.log();
				console.log((data));
				var response = JSON.parse(data);
				if (data === "error") {
					alert('There was an error adding comment. Please try again');}
					else {
					
						$('#comments-wrapper').prepend(response.comment)
						$('#comments_count').text(response.comments_count); 
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
	$(document).on('click', '.reply-btn', function(e){
		e.preventDefault();
		// Get the comment id from the reply button's data-id attribute
		var comment_id = $(this).data('id');
		// show/hide the appropriate reply form (from the reply-btn (this), go to the parent element (comment-details)
		// and then its siblings which is a form element with id comment_reply_form_ + comment_id)
		$(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
		$(document).on('click', '.submit-reply', function(e){
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
				success: function(data){
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

	$(document).on('click', '.likes', function(e){
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
				success: function(data){
					if (data == "error") {
						alert('You thought.');
					} else {
					
						var ret = document.getElementById(comment_id).innerHTML;
						var number = ret.replace('<img src="thumbs.jpg" height="12" width="12">','');
						
						number = parseInt(number) + 1;
						
						document.getElementById(comment_id).innerHTML= '<img src = "thumbs.jpg" height="12" width="12"> ' + number;

					}
				}
			});
		});
	




  });

  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

  function onSignIn(googleUser) {
	if (getCookie("name")==null){
	var profile = googleUser.getBasicProfile();
	console.log('Name: ' + profile.getName());
    document.cookie = 'name='+profile.getName();
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
	  $.ajax({
		url: url,
		type: "POST",
		data: {
			name:null
		},
		//dataType: 'text',
		success: function(data){
			
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
		   var response = JSON.parse(data);
		   if (data === "error") {
			   alert('There was an error adding comment. Please try again');
	   }
   } });
      location.reload();
	}
	)}