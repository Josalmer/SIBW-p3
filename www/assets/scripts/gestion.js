document.addEventListener("DOMContentLoaded", () => setGestionListeners());

function setGestionListeners() {
    setEditEventButton();
    var eventBody = document.getElementById("event-form-body");
    if (eventBody) {
        eventBody.value = eventBody.getAttribute('body');
    }
}

function setEditEventButton() {
    var editButtons = document.getElementsByClassName("event-edit");
    Array.prototype.forEach.call(editButtons, (button) => {
        button.addEventListener("click", (event) => editEvent(event.target.getAttribute('eventid')));
    });
}

function editEvent(eventid) {
    window.location.replace('/event-form/' + eventid);
}
