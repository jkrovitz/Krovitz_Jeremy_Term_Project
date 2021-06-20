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
			let usernameValidRegisterPage = validateUsername(USERNAME_REGISTER_PAGE.value, document.getElementsByTagName('p')[2]);
			let emailValidRegisterPage = validateEmail(EMAIL_REGISTER_PAGE.value, document.getElementsByTagName('p')[3]);
			let passwordValidRegisterPage = validatePassword(PASSWORD_REGISTER_PAGE.value, document.getElementsByTagName('p')[4]);
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


// (function () {
// 	'use strict';
// 	const SUBMIT_REGISTER_PAGE = document.getElementById('submit-register-page');
// 	SUBMIT_REGISTER_PAGE.disabled = true;

// 	SUBMIT_REGISTER_PAGE.addEventListener("click", function () {
// 		// if (e.key === 13) {
// 		// 	e.preventDefault();
// 		// 	SUBMIT_REGISTER_PAGE.click();

// 		let xmlhttp = new XMLHttpRequest();
// 		let url = "register.json";

// 		xmlhttp.onreadystatechange = function () {
// 			if (this.readyState == 4 && this.status == 200) {
// 				let myArr = JSON.parse(this.responseText);
// 				console.log(myArr);
// 				addRegisterMessages(myArr);
// 			}
// 		};
		
// 		xmlhttp.open("GET", url, true);
// 		xmlhttp.send();
// 	});
	

// 		function addRegisterMessages(arr) {
// 			// for (let i = 0; i < arr.length; i++) {

// 			// 	let tr = document.createElement('tr');
// 			// 	let td = document.createElement('td');
// 			// 	let atag = document.createElement('a');
// 			// 	atag.setAttribute('href', arr[i]["url"]);
// 			// 	atag.textContent = arr[i]["post_title"];

// 			// 	td.appendChild(atag);
// 			// 	tr.appendChild(td);
// 			// 	let table = document.getElementsByTagName('table')[0];
// 			// 	table.appendChild(tr);
// 			// }
// 			let objKey = Object.keys(arr);
// 			if (objKey === 'success') {
// 				window.addEventListener("load", createMessage, false);
// 			}
// 		}

				
		

		

		
	
// 			function createMessage() {
// 			const registrationDiv = document.getElementsByClassName('registration')[0];
// 					const successMessage = document.createElement('p');
// 					const successMessageTextContent = document.createTextNode('The user has been successfully created.');
// 					successMessage.appendChild(successMessageTextContent);
// 					registrationDiv.appendChild(successMessage);
// 		}

		
// }());