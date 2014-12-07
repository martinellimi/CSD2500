/**
 * All the scripts for this project must be stored here.
 */

$(document).ready(function() {

	$("input:text").addClass("ui-corner-all");

	//Submenu - Start
	var subMenu = (function() {
		//Open the small menu when click on the userInfo class
		$(".userInfo").click(function() {
			var X = $(this).attr('id');
			//Check if the submenu is opened or not
			if (X == "open") {
				$(".options").hide();
				$(this).attr('id', 'close');
			} else {
				$(".options").show();
				$(this).attr('id', 'open');
			}

		});

		//Mouse click on sub menu
		$(".options").mouseup(function() {
			return false
		});

		//Mouse click on userInfo link
		$(".userInfo").mouseup(function() {
			return false
		});

		//Close the submenu when click on the rest of the html
		$(document).mouseup(function() {
			$(".options").hide();
			$(".userInfo").attr('id', '');
		});
	})();
	//END

});

//Script for the slide show - START

function slideSwitch() {
	var $active = $('#slideshow IMG.active');

	if ($active.length == 0)
		$active = $('#slideshow IMG:last');

	var $next = $active.next().length ? $active.next()
			: $('#slideshow IMG:first');

	$active.addClass('last-active');

	$next.css({
		opacity : 0.0
	}).addClass('active').animate({
		opacity : 1.0
	}, 1000, function() {
		$active.removeClass('active last-active');
	});
}

$(function() {
	setInterval("slideSwitch()", 5000);
});

function validateSignUpForm() {

	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var email = $('#emailInput').val();
	var password = $('#passwordInput').val();
	var firstName = $('#firstNameInput').val();
	var surname = $('#surnameInput').val();

	$('.alert.alert-danger.validation').hide();

	if (firstName == "") {
		$('#firstLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your first name </div>');
		return false;
	}

	if (surname == "") {
		$('#firstLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your surname </div>');
		return false;
	}
	if (email == "") {
		$('#firstLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your email </div>');
		return false;
	} else if (!emailReg.test(email)) {
		$('#firstLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter a valid email address </div>');
		return false;
	}

	if (password == "") {
		$('#firstLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your password </div>');
		return false;
	}

	//window.location.href = "files.html";
	
	return true;

};

function validatesSignInForm() {

	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var email = $('#emailInput').val();
	var password = $('#passwordInput').val();

	$('.alert.alert-danger.validation').hide();
	if (email == "") {
		$('#emailLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your email </div>');
		return false;
	} else if (!emailReg.test(email)) {
		$('#emailLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter a valid email address </div>');
		return false;
	}

	if (password == "") {
		$('#emailLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your password </div>');
		return false;
	}

	return true;
	
	window.location.href = "files.html";

};

function validatesPasswordForm() {

	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var email = $('#emailInput').val();

	$('.alert.alert-danger.validation').hide();
	if (email == "") {
		$('#emailLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your email </div>');
		return false;
	} else if (!emailReg.test(email)) {
		$('#emailLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter a valid email address </div>');
		return false;
	}

	$("#success").css("display", "block");

	window.setTimeout(function() {
		window.location.href = "signIn.html";
	}, 3500);

};

function validateNameForm() {

	var firstName = $('#firstNameInput').val();
	var lastName = $('#lastNameInput').val();

	$('.alert.alert-danger.validation').hide();

	if (firstName == "") {
		$('#firstNameLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your first name </div>');
		return false;
	}

	if (lastName == "") {
		$('#firstNameLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your surname </div>');
		return false;
	}

	$('#change-name-modal').modal('hide');

	$("#nameLabelValue").text(firstName + " " + lastName);
};

function validateEmailForm() {

	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var email = $('#emailInput').val();

	$('.alert.alert-danger.validation').hide();
	if (email == "") {
		$('#emailLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your email </div>');
		return false;
	} else if (!emailReg.test(email)) {
		$('#emailLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter a valid email address </div>');
		return false;
	}

	$('#change-email-modal').modal('hide');

	$("#emailLabelValue").text(email);
};

function validatePasswordForm() {

	$("#oldPasswordInput").empty();
	$("#newPasswordInput").text('');

	var oldPassword = $('#oldPasswordInput').val();
	var newPassword = $('#newPasswordInput').val();

	$('.alert.alert-danger.validation').hide();
	if (oldPassword == "") {
		$('#oldPasswordLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your old password </div>');
		return false;
	}

	if (newPassword == "") {
		$('#oldPasswordLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter your new password </div>');
		return false;
	}

	$('#change-password-modal').modal('hide');
};

function validateShareForm() {

	var rename = $('#emailInput').val();

	$('.alert.alert-danger.validation').hide();

	if (rename == "") {
		$('#shareLabel')
				.before(
						'<div class="alert alert-danger validation"> * Please enter the email address to share the file </div>');
		return false;
	}

	$('#share-modal').modal('hide');

};
// END