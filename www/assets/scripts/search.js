var query = '';
var eventsResult = document.getElementById('search-result');

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
                    if (response) {
                        showEvents(response, query);
                    } else {
                        noEvents();
                    }
                }
            };
            xhttp.send(null);
        } else {
            hideEvents();
        }
    }
}

function showEvents(events, query) {
    eventsResult.innerHTML = '';
    events.forEach(event => {
        console.log(event);
        let eventI = document.createElement("div");
        let a = document.createElement("a");
        let title = event.title;
        let reg = new RegExp(query, 'i');
        title = title.replace(reg, `<span class="remarked">${query}</span>`);
        a.innerHTML = title;
        a.href = `/event/${event.id}`;
        eventI.appendChild(a);
        eventI.className = "events-result";
        eventsResult.appendChild(eventI);
        eventsResult.style.display = 'block';
    });
}

function noEvents() {
    eventsResult.innerHTML = '';
    var noEvents = document.createElement("div");
    noEvents.innerHTML = `<span>No hay eventos para la búsqueda introducida</span>`;
    noEvents.className = "events-result";
    eventsResult.appendChild(noEvents);
    eventsResult.style.display = 'block';
}

function hideEvents() {
    eventsResult.style.display = 'none';
}