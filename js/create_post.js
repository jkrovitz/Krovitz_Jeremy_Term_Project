(function() {
	'use strict';
	document.createReviewForm.noValidate = true;
	const MIN_LENGTH_TITLE = 5;
	const MIN_LNEGTH_DESCRIPTION = 15;
	const MAX_LENGTH_TITLE = 30;
	const MAX_LENGTH_DESCRIPTION = 1000;
	const REVIEW_TITLE = document.getElementById('review-title');
	const REVIEW_DESCRIPTION = document.getElementById('review-description');
	const SUBMIT = document.getElementById('submit-btn-id');
	SUBMIT.disabled = true;
	[REVIEW_TITLE, REVIEW_DESCRIPTION].forEach(item => {
		item.addEventListener('input', function() {
			let reviewTitleValid = validateTitle(REVIEW_TITLE.value, document.getElementsByTagName('p')[0]);
			let reviewDescriptionValid = validateDescription(REVIEW_DESCRIPTION.value, document.getElementsByTagName('p')[1]);
			if ((reviewTitleValid === true) && (reviewDescriptionValid === true)) {
				SUBMIT.disabled = false;
				SUBMIT.removeAttribute('class', 'disabled-submit');
				SUBMIT.setAttribute('class', 'enabled-submit');
			} else {
				SUBMIT.disabled = true;
				SUBMIT.setAttribute('class', 'disabled-submit');
				SUBMIT.removeAttribute('class', 'enabled-submit');
			}
		}, false);
	});

	function validateTitle(textValue, textFeedback) {
		let textValid;
		if ((textValue.length < MIN_LENGTH_TITLE) || (textValue.length > MAX_LENGTH_TITLE)) {
			textFeedback.classList.remove('hidden');
			textValid = false;
		} else {
			textFeedback.setAttribute('class', 'hidden');
			textValid = true;
		}
		return textValid;
	}

	function validateDescription(textValue, textFeedback) {
		let textValid;
		if ((textValue.length < MIN_LNEGTH_DESCRIPTION) || (textValue.length > MAX_LENGTH_DESCRIPTION)) {
			textFeedback.classList.remove('hidden');
			textValid = false;
		} else {
			textFeedback.setAttribute('class', 'hidden');
			textValid = true;
		}
		return textValid;
	}
}());