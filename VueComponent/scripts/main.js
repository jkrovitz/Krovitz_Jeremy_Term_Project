const app = Vue.createApp({
	el: '#app',
	data: {
		message: 'Hello Vue!'
	}

});

app.component('main-nav', {
	props: {
		activeTab: {
			type: String,
			default: 'home'
		}
	},
	template: `
		<nav>
			<a href="." :class="{activeTab: activeTab === 'home'}">Home</a>
	<a href="history.html" :class="{activeTab: activeTab === 'history'}">History</a>
	</nav>`
});
