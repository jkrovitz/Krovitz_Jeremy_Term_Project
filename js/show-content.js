(function () {
const xmlhttp = new XMLHttpRequest();
const url = "show_content.json";

xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    const contentObj = JSON.parse(this.responseText);
   createReviewDetailsTable(contentObj);
    }
};

function createReviewDetailsTable(obj) {
	const reviewDetailsTable = document.getElementById('review-details-table');
	const reviewDetailsCaption = document.createElement('caption');
	const reviewDetailsCaptionText = document.createTextNode('Review Details');
	const captionIdAttribute = document.createAttribute('id');
	captionIdAttribute.value = 'review-details-caption';
	reviewDetailsCaption.setAttributeNode(captionIdAttribute);
	reviewDetailsCaption.appendChild(reviewDetailsCaptionText);
	reviewDetailsTable.appendChild(reviewDetailsCaption);

	for (const [key, value] of Object.entries(obj)) {
		const tr = document.createElement('tr');
		const th = document.createElement('th');
		const att = document.createAttribute('scope');
		att.value = 'row';
		th.setAttributeNode(att);
		const td = document.createElement('td');
		const thTextContent = document.createTextNode(key);
		const tdTextContent = document.createTextNode(value);
		th.appendChild(thTextContent);
		td.appendChild(tdTextContent);
		tr.appendChild(th);
		tr.appendChild(td);
		reviewDetailsTable.appendChild(tr);
	}
}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();

}());
