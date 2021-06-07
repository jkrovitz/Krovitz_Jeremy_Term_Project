var navEl = document.getElementsByTagName("nav")[0];

navEl.addEventListener("click", showAndHideNav, false);

function showAndHideNav() {
	if (navEl.className === "main-nav") {
		navEl.className +=  " mobile-nav";
	} else {
		navEl.className = "main-nav";
	}
}

const EDUCATION_PAGE = document.getElementById("education-page");
console.log(EDUCATION_PAGE);

const CREATE_EDUCATION_PAGE_TITLE = () => {
	const EDUCATION_PAGE_TITLE = document.createElement("h2");
	const EDUCATION_PAGE_TITLE_TEXT = document.createTextNode("Education");
	EDUCATION_PAGE_TITLE.appendChild(EDUCATION_PAGE_TITLE_TEXT);
	EDUCATION_PAGE.appendChild(EDUCATION_PAGE_TITLE);
	CREATE_EDUCATION_DESCRIPTION();
}

const CREATE_EDUCATION_DESCRIPTION = () => {
	const EDUCATION_DESCRIPTION = document.createElement("p");
	const EDUCATION_DESCRIPTION_TEXT = document.createTextNode("There are many colleges and unviersities in the Twin Cities. Here is a listing of some of them:");
	EDUCATION_DESCRIPTION.appendChild(EDUCATION_DESCRIPTION_TEXT);
	EDUCATION_PAGE.appendChild(EDUCATION_DESCRIPTION);
}

EDUCATION_PAGE.addEventListener('load', CREATE_EDUCATION_PAGE_TITLE(), false);