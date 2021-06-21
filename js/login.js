(function () {
	'use strict';
	document.loginForm.noValidate = true;
	const USERNAME_LOGIN_PAGE = document.getElementById('username-login-page');
	const PASSWORD_LOGIN_PAGE = document.getElementById('password-login-page');
	const SUBMIT_LOGIN_PAGE = document.getElementById('submit-login-page');
	SUBMIT_LOGIN_PAGE.disabled = true;

	[USERNAME_LOGIN_PAGE, PASSWORD_LOGIN_PAGE].forEach(item => {
		item.addEventListener('input', function () {
			let usernameValidLoginPage = validateUsername(USERNAME_LOGIN_PAGE.value, document.getElementsByTagName('p')[2]);
			let passwordValidLoginPage = validatePassword(PASSWORD_LOGIN_PAGE.value, document.getElementsByTagName('p')[3]);
			 if ((usernameValidLoginPage === true) && (passwordValidLoginPage === true)) {
                SUBMIT_LOGIN_PAGE.disabled = false;
                SUBMIT_LOGIN_PAGE.removeAttribute('class', 'disabled-submit');
                SUBMIT_LOGIN_PAGE.setAttribute('class', 'enabled-submit');
            } else {
                SUBMIT_LOGIN_PAGE.disabled = true;
				 SUBMIT_LOGIN_PAGE.setAttribute('class', 'disabled-submit');
                SUBMIT_LOGIN_PAGE.removeAttribute('class', 'enabled-submit');
            }
		}, false);
	});
}());