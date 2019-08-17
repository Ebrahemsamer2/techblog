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

});