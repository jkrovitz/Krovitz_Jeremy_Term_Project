var postTitle = document.getElementById("post-title");

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("post-title").innerHTML =
    this.responseText;
  }
  xhttp.open("POST", "show_content.php");
  xhttp.send();
