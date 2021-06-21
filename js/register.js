(function () {
	'use strict';

	document.registrationForm.noValidate = true;
	const USERNAME_REGISTER_PAGE = document.getElementById('username-register-page');
	const PASSWORD_REGISTER_PAGE = document.getElementById('password-register-page');
	const EMAIL_REGISTER_PAGE = document.getElementById('email-register-page');
	const SUBMIT_REGISTER_PAGE = document.getElementById('submit-register-page');
	SUBMIT_REGISTER_PAGE.disabled = true;

	[USERNAME_REGISTER_PAGE, PASSWORD_REGISTER_PAGE, EMAIL_REGISTER_PAGE].forEach(item => {
		item.addEventListener('input', function () {
			let usernameValidRegisterPage = validateUsername(USERNAME_REGISTER_PAGE.value, document.getElementsByTagName('p')[1]);
			let emailValidRegisterPage = validateEmail(EMAIL_REGISTER_PAGE.value, document.getElementsByTagName('p')[2]);
			let passwordValidRegisterPage = validatePassword(PASSWORD_REGISTER_PAGE.value, document.getElementsByTagName('p')[3]);
			 if ((usernameValidRegisterPage === true) && (emailValidRegisterPage === true) && (passwordValidRegisterPage === true)) {
                SUBMIT_REGISTER_PAGE.disabled = false;
                SUBMIT_REGISTER_PAGE.removeAttribute('class', 'disabled-submit');
                SUBMIT_REGISTER_PAGE.setAttribute('class', 'enabled-submit');
            } else {
                SUBMIT_REGISTER_PAGE.disabled = true;
                SUBMIT_REGISTER_PAGE.setAttribute('class', 'disabled-submit');
                SUBMIT_REGISTER_PAGE.removeAttribute('class', 'enabled-submit');
            }
		}, false);




	});
}());
