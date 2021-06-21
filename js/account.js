function validateUsername(usernameValue, usernameFeedback) {
	let usernameValid;
	const USERNAME_REGEX = /^[A-Za-z0-9_-]{5,20}$/;
	if (!(USERNAME_REGEX.test(usernameValue))) {
		usernameFeedback.classList.remove('hidden');
		usernameValid = false;
	} else {
		usernameFeedback.setAttribute('class', 'hidden');
		usernameValid = true;
	}
	return usernameValid;
}

function validateEmail(emailValue, emailFeedback) {
	let emailValid;
	const EMAIL_REGEX = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (!(EMAIL_REGEX.test(emailValue))) {
		emailFeedback.classList.remove('hidden');
		emailValid = false;
	} else {
		emailFeedback.setAttribute('class', 'hidden');
		emailValid = true;
	}
	return emailValid;
}

function validatePassword(passwordValue, passwordFeedback) {
	let passwordValid;
	let minMaxLength = /^[\s\S]{8,32}$/,
		upper = /[A-Z]/,
		lower = /[a-z]/,
		number = /[0-9]/,
		special = /[ !"#$%&'()*+,\-./:;<=>?@[\\\]^_`{|}~]/;
	if (minMaxLength.test(passwordValue) &&
		upper.test(passwordValue) &&
		lower.test(passwordValue) &&
		number.test(passwordValue) &&
		special.test(passwordValue)
	) {
		passwordFeedback.setAttribute('class', 'hidden');
		passwordValid = true;
	} else {
		passwordFeedback.classList.remove('hidden');
		passwordValid = false;

	}
	return passwordValid;
}