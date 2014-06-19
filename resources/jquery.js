$(document).ready(function(){ 
	
    // Log-in Pop-up
	    $("#background-blur").hide();
		$("#login").click(function () {
			$("#background-blur").fadeIn();
			$("#account-popup").fadeIn();
			$("#login").hide();
			$("#login-clicked").show();
		});
		$(".close, #login-clicked").click(function () {
			$("#background-blur").fadeOut();
			$("#login-clicked").hide();
			$("#login").show();
			$("#account-popup").fadeOut();
		});
	// Review Pop-up
		$("#reviews").hide();
		$("#review-trigger").click(function() {		
			$("#reviews").slideToggle();
			$("#stats").hide();
			$("#reservations").hide();
			$("#messages").hide();
			$("#details").hide();
		});	
		$("#new-review").hide();
		$("#new-review-trigger").click(function() {		
			$("#new-review").slideToggle();
		});
	// Reservation Pop-up
		$("#reservation-form").hide();
		$("#reservation-trigger").click(function() {		
			$("#reservation-form").slideToggle();
		});
	// Restaurant Account Pop-up 
		$("#stats-trigger").click(function() {		
			$("#stats").slideToggle();
			$("#reviews").hide();
			$("#reservations").hide();
		});
		$("#reservations").hide();
		$("#reservation-trigger").click(function() {		
			$("#reservations").slideToggle();
			$("#reviews").hide();
			$("#stats").hide();
		});	
		$("#manage-links").hide();
		$("#manage").click(function() {		
			$("#manage-links").slideToggle();
		});
	// Admin Account Pop-up
		$("#edit").hide();
		$("#remove").hide();
		
		$("#edit-trigger").click(function() {		
			$("#edit").show();
			$("#create").hide();
			$("#remove").hide();
		});
		$("#remove-trigger").click(function() {		
			$("#remove").show();
			$("#create").hide();
			$("#edit").hide();
		});
		$("#create-trigger").click(function() {		
			$("#create").show();
			$("#remove").hide();
			$("#edit").hide();
		});
		
	// Admin Account Mgt Pop-up
		$("#admin-edit").hide();
		$("#admin-remove").hide();
		
		$("#admin-edit-trigger").click(function() {		
			$("#admin-edit").show();
			$("#admin-create").hide();
			$("#admin-remove").hide();
		});
		$("#admin-remove-trigger").click(function() {		
			$("#admin-remove").show();
			$("#admin-create").hide();
			$("#admin-edit").hide();
		});
		$("admin-#create-trigger").click(function() {		
			$("#admin-create").show();
			$("#admin-remove").hide();
			$("#admin-edit").hide();
		});
		
	// Restaurant Account Pop-up
		$("#resto_profile").hide();
		$("#resto_reservation").hide();
		$("#resto_reviews").hide();
	
		$("#resto_home-trigger").click(function() {		
			$("#resto_home").show();
			$("#resto_profile").hide();
			$("#resto_reservation").hide();
			$("#resto_reviews").hide();
		});
		
		$("#resto_profile-trigger").click(function() {		
			$("#resto_profile").show();
			$("#resto_home").hide();
			$("#resto_reservation").hide();
			$("#resto_reviews").hide();
		});
		
		$("#resto_reservation-trigger").click(function() {		
			$("#resto_reservation").show();
			$("#resto_home").hide();
			$("#resto_profile").hide();
			$("#resto_reviews").hide();
		});
		
		$("#resto_reviews-trigger").click(function() {		
			$("#resto_reviews").show();
			$("#resto_home").hide();
			$("#resto_profile").hide();
			$("#resto_reservation").hide();
		});
		
		// Customer Account Pop-up
		$("#customer_review").hide();
		
		$("#customer_reservation-trigger").click(function() {		
			$("#customer_reservation").show();
			$("#customer_review").hide();
		});
		
		$("#customer_review-trigger").click(function() {		
			$("#customer_review").show();
			$("#customer_reservation").hide();
		});
		
		//Resto Account
		$(".pending_reserve").slideToggle();
		$(".approved_reserve").slideToggle();
		
		$(".pending_reserve_but").click(function() {		
			$(".pending_reserve").slideToggle();
		});
		
		$(".approved_reserve_but").click(function() {		
			$(".approved_reserve").slideToggle();
		});
		
		$(".edit_profile").hide();
		$(".add_gallery_photo").hide();
		$(".change_logo").hide();
		$(".change_menu").hide();
		
		$(".edit_profile_but").click(function() {		
			$(".edit_profile").slideToggle();
			$(".add_gallery_photo").hide();
			$(".change_logo").hide();
			$(".change_menu").hide();
		});
		
		$(".add_gallery_photo_but").click(function() {		
			$(".add_gallery_photo").slideToggle();
			$(".edit_profile").hide();
			$(".change_logo").hide();
			$(".change_menu").hide();
		});
		
		$(".change_logo_but").click(function() {		
			$(".change_logo").slideToggle();
			$(".add_gallery_photo").hide();
			$(".edit_profile").hide();
			$(".change_menu").hide();
		});
		
		$(".change_menu_but").click(function() {		
			$(".change_menu").slideToggle();
			$(".add_gallery_photo").hide();
			$(".change_logo").hide();
			$(".edit_profile").hide();
		});
		
	// Rating Stars
		if($(".rate:contains('5.0')").length) {
		   $(".rate:contains('5.0')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/></div>');
		}
		if($(".rate:contains('4.5')").length) {
		   $(".rate:contains('4.5')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/half-star.svg"/></div>');
		}
		if($(".rate:contains('4.0')").length) {
		   $(".rate:contains('4.0')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/no-star.svg"/></div>');
		   $(".meaning").text("Very Good!");		   		   
		}
		if($(".rate:contains('3.5')").length) {
		   $(".rate:contains('3.5')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/half-star.svg"/><img src="resources/images/no-star.svg"/></div>');
		   $(".meaning").text("Good!");		   		   
		}
		if($(".rate:contains('3.0')").length) {
		   $(".rate:contains('3.0')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/></div>');
		   $(".meaning").text("Okay");		   		   
		}
		if($(".rate:contains('2.5')").length) {
		   $(".rate:contains('2.5')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/half-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/></div>');
		   $(".meaning").text("So-so");		   		   
		}
		if($(".rate:contains('2.0')").length) {
		   $(".rate:contains('2.0')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/full-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/></div>');
		   $(".meaning").text("Average");		   		   
		}
		if($(".rate:contains('1.5')").length) {
		   $(".rate:contains('1.5')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/half-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/></div>');
		   $(".meaning").text("Terrible");		   		   
		}
		if($(".rate:contains('1.0')").length) {
		   $(".rate:contains('1.0')").html('<div class="rating-stars"><img src="resources/images/full-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/></div>');
		   $(".meaning").text("Horrible");		   		   
		}
		if($(".rate:contains('0.0')").length) {
		   $(".meaning").html('<div class="rating-stars"><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/><img src="resources/images/no-star.svg"/></div>');   
		}
		
		$(".hidden").hide();
});