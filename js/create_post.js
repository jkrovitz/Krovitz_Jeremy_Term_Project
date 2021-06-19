(function () {
	'use strict';
	document.createReviewForm.noValidate = true;
	const REVIEW_TITLE = document.getElementById('review-title');
	const REVIEW_DESCRIPTION = document.getElementById('review-description');
	const SUBMIT = document.getElementById('submit-btn-id');
	SUBMIT.disabled = true;

	[REVIEW_TITLE, REVIEW_DESCRIPTION].forEach(item => {
		item.addEventListener('input', function () {
			let reviewTitleValid = validateText(REVIEW_TITLE.value, document.getElementsByTagName('p')[0]);
			let reviewDescriptionValid = validateText(REVIEW_DESCRIPTION.value, document.getElementsByTagName('p')[1]);
			 if ((reviewTitleValid === true) && (reviewDescriptionValid === true)) {
                SUBMIT.disabled = false;
                SUBMIT.removeAttribute('class', 'disabledSubmit');
                SUBMIT.setAttribute('class', 'enabledSubmit');
            } else {
                SUBMIT.disabled = true;
                SUBMIT.setAttribute('class', 'disabledSubmit');
                SUBMIT.removeAttribute('class', 'enabledSubmit');
            }
		}, false);
	});

	function validateText(textValue, textFeedback) {
        let textValid;
        if (!((textValue.length >= 5))) {
            textFeedback.classList.remove('hidden');
            textValid = false;
        } else {
            textFeedback.setAttribute('class', 'hidden');
            textValid = true;
        }
        return textValid;
	}

	
}());