var query = '';

function searchEvents() {
    var search = document.getElementById('search-input').value;
    if (search != query) {
        query = search;
        if (search.length >= 3) {
            xhttp.open("GET", "/search.php?search=" + query, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    console.log(response);
                }
            };
            xhttp.send(null);
        }
    }
}