document.addEventListener("DOMContentLoaded", () => setSearchListener());

var comments = null;
var events = null;

function setSearchListener() {
    document.getElementById('search-button').addEventListener('click', () => applySearch());
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
    var search = document.getElementById('search-input').value.toLowerCase();
    if (comments) { filterComments(search); }
    if (events) { filterEvents(search); }
}

function setCommentsSearch() {
    comments = document.getElementsByClassName("searchable-item");
}

function setEventsSearch() {
    events = document.getElementsByClassName("searchable-item");
}

function filterComments(search) {
    Array.prototype.forEach.call(comments, (comment) => {
        let author = comment.getElementsByClassName('author-tag')[0].textContent.toLowerCase();
        let body = comment.getElementsByClassName('body-tag')[0].textContent.toLowerCase();
        if (author.includes(search) || body.includes(search)) {
            comment.style.display = '';
        } else {
            comment.style.display = 'none';
        }
    });
}

function filterEvents(search) {

}