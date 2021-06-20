(function () {
	let xmlhttp = new XMLHttpRequest();
	let url = "data.json";

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var myArr = JSON.parse(this.responseText);
			listReviews(myArr);
		}
	};

	function listReviews(arr) {
		for (let i = 0; i < arr.length; i++) {

			let tr = document.createElement('tr');
			let td = document.createElement('td');
			let atag = document.createElement('a');
			atag.setAttribute('href', arr[i]["url"]);
			atag.textContent = arr[i]["post_title"];

			td.appendChild(atag);
			tr.appendChild(td);
			let table = document.getElementsByTagName('table')[0];
			table.appendChild(tr);
		}

	}

	xmlhttp.open("GET", url, true);
	xmlhttp.send();

}());
