document.addEventListener("DOMContentLoaded", () => setSearchListener());

var comments = null;
var events = null;

function setSearchListener() {
    document.getElementById('filter-button').addEventListener('click', () => applySearch());
    var commentsTable = document.getElementsByClassName("comments-table")[0];
    if (commentsTable) {
        setCommentsSearch();
    }
    var eventsTable = document.getElementsByClassName("events-table")[0];
    if (eventsTable) {
        setEventsSearch();
    }
}

function applySearch() {
    var search = document.getElementById('filter-input').value.toLowerCase();
    if (comments) { applyFilter(search, comments); }
    if (events) { applyFilter(search, events); }
}

function setCommentsSearch() {
    comments = document.getElementsByClassName("searchable-item");
}

function setEventsSearch() {
    events = document.getElementsByClassName("searchable-item");
}

function applyFilter(search, collection) {
    Array.prototype.forEach.call(collection, (obj) => {
        let author = obj.getElementsByClassName('author-tag')[0].textContent.toLowerCase();
        let body = obj.getElementsByClassName('body-tag')[0].textContent.toLowerCase();
        if (author.includes(search) || body.includes(search)) {
            obj.style.display = '';
        } else {
            obj.style.display = 'none';
        }
    });
}
