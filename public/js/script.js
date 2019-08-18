$(document).ready(function(){

	$("#dropdownMenu2").hover(function() {

		$('.dropdown-toggle2').dropdown('toggle');

	});

	$("#like").click(function() {
		$('#like i').css({'transform':'scale(1.2,1.2)','color':'red'});
	});
	$("#add-comment").click(function() {
		$('.add-comment-form').slideToggle(500);
	});

	/* navbar click */
	$("li.dropdown").on('click', function(event) {
		$("#user-drop-menu").fadeToggle(100);
		event.stopPropagation();
	});
	$(document).on('click', function() {
		$("#user-drop-menu").css('display', 'none');
	});

	// Reply on the Comment 
	$('.post-comments .comment-info span.reply-btn').on('click', function() {
		$(this).next('form').fadeIn(300);
	});

	// Category on the navbar

	$(".list > a").on('click', function(e) {		
		e.preventDefault();
	});

	$(".nav-item.list").hover(function(e) {
		e.stopPropagation();
		$(".nav-categories").fadeIn(300);
	},function() {
		$(".nav-categories").fadeOut(300);
	});


	// Reply Validation

	$(".comment-info form").submit(function() {
		let reply = $(".comment-info form textarea[name='the_reply']").val();

		if(reply.length <= 5) {
			$(".comment-info form textarea[name='the_reply'] + p").text("Reply must be more than 5 Character.");
			return false;
		}else {
			$(".comment-info form textarea[name='the_reply'] + p").text("");
		}

		if(reply.length > 300) {
			$(".comment-info form textarea[name='the_reply'] + p").text("Reply must be less than 300 Character.");
			return false;
		}else {
			$(".comment-info form textarea[name='the_reply'] + p").text("");
		}

		return true;
	});

	// Comment Validation

	$(".add-comment form").submit(function() {
		let comment = $(".add-comment form textarea[name='the_comment']").val();

		if(comment.length <= 5) {
			$(".add-comment form textarea[name='the_comment'] + p").text("Comment must be more than 5 Character.");
			return false;
		}else {
			$(".add-comment form textarea[name='the_comment'] + p").text("");
		}

		if(comment.length > 300) {
			$(".add-comment form textarea[name='the_comment'] + p").text("Comment must be less than 300 Character.");
			return false;
		}else {
			$(".add-comment form textarea[name='the_comment'] + p").text("");
		}

		return true;
	});

	// Updating User Profile Validation

	$(".user-info-form form").submit(function() {
		let name = $(".user-info-form form input[type='text']").val();
		let email = $(".user-info-form form input[type='email']").val();
		let password = $(".user-info-form form input[type='password']:nth-child(1)").val();
		let confirm_password = $(".user-info-form form input[name='confirm_password']").val();

		if(name.length <= 5) {
			$(".user-info-form form input[type='text'] + p").text("Username must be more than 5 Character.");
			return false;
		}else {
			$(".user-info-form form input[type='text'] + p").text("");
		}

		if(name.length > 20) {
			$(".user-info-form form input[type='text'] + p").text("Username must be less than 21 Character.");
			return false;
		}else {
			$(".user-info-form form input[type='text'] + p").text("");
		}


		if(email.length <= 15) {
			$(".user-info-form form input[type='email'] + p").text("Email must be more than 15 Character.");
			return false;
		}else {
			$(".user-info-form form input[type='email'] + p").text("");
		}

		if(email.length > 50) {
			$(".user-info-form form input[type='email'] + p").text("Email must be less than 50 Character.");
			return false;
		}else {
			$(".user-info-form form input[type='email'] + p").text("");
		}

		if(password.length != 0) {
			if(password.length <= 5) {
				$(".user-info-form form input[type='password'] + p").text("Password must be more than 5 Character.");
				return false;
			}else {
				$(".user-info-form form input[type='password'] + p").text("");
			}

			if(password.length >= 20) {
				$(".user-info-form form input[type='password'] + p").text("Password must be less than 20 Character.");
				return false;
			}else {
				$(".user-info-form form input[type='password'] + p").text("");
			}

			if(confirm_password.length <= 5) {
				$(".user-info-form form input[name='confirm_password'] + p").text("Password Confirmation must be more than 5 Character.");
				return false;
			}else {
				$(".user-info-form form input[name='confirm_password'] + p").text("");
			}

			if(confirm_password.length >= 20) {
				$(".user-info-form form input[name='confirm_password'] + p").text("Password Confirmation must be less than 20 Character.");
				return false;
			}else {
				$(".user-info-form form input[name='confirm_password'] + p").text("");
			}

			if($password !== $confirm_password) {
				$(".user-info-form form input[name='confirm_password'] + p").text("Password Confirmation must be Equal the password.");
				return false;
			}else {
				$(".user-info-form form input[name='confirm_password'] + p").text("");
			}
		}

		return true;
	});

});