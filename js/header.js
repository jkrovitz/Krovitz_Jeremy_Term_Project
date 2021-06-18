Vue.component('headercomponent',{
   template : `<header>
        	<h1>Minneapolis&ndash;St. Paul: The Twin Cities</h1>
            <nav class="main-nav">
				<a href="index.html">Home</a> 
				<a href="history.html">History</a> 
				<a href="population.html">Population</a> 
				<a href="tourism.html">Tourism</a>
				<a href="review.php">Review</a>
				<a href="login.php">Login</a>
				<button class="hamburger-menu-icon">&#9776;</button>
		</nav>
        </header>`
});
var vm = new Vue({
   el: '#header-container'
});

var navEl = document.getElementsByTagName("NAV")[0];
console.log(navEl);

navEl.addEventListener("click", function () {
	showAndHideNav();
}, false);

function showAndHideNav() {
	if (navEl.className === "main-nav") {
		navEl.className +=  " mobile-nav";
	} else {
		navEl.className = "main-nav";
	}
}

Vue.component('footercomponent',{
   template : `<footer>
            <p class="copyright-class">Jeremy Krovitz &copy; 2021</p>
        </footer>`
});
var vm = new Vue({
   el: '#footer-container'
});

