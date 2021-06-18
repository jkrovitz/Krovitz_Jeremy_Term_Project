var xmlhttp = new XMLHttpRequest();
var url = "show_content.json";

xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    var myArr = JSON.parse(this.responseText);
    myFunction(myArr);
    }
};

function myFunction(arr) {
  var out = "";
	var i;
	console.log(arr);
	// for (const i of arr) {
		
	// 	console.log(i);
	// }

	document.getElementById("post-title").textContent = arr["post_title"];
        document.getElementById("poster").textContent = arr["poster"];
	document.getElementById("post-desc").textContent = arr["post_desc"];

}



xmlhttp.open("GET", url, true);
xmlhttp.send();
