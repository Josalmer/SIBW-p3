document.addEventListener("DOMContentLoaded", () => setGestionListeners());

function setGestionListeners() {
    setEditEventButton();
    setDeleteEventButton();

    var eventBody = document.getElementById("event-form-body");
    if (eventBody) { eventBody.value = eventBody.getAttribute('body'); }

    var newEventButton = document.getElementById("new-event-button");
    if (newEventButton) { newEventButton.addEventListener("click", () => editEvent(null)); }
}

function setEditEventButton() {
    var editButtons = document.getElementsByClassName("event-edit");
    Array.prototype.forEach.call(editButtons, (button) => {
        button.addEventListener("click", (event) => editEvent(event.target.getAttribute('eventid')));
    });
}

function editEvent(eventId) {
    window.location.replace('/event-form/' + eventId);
}

function setDeleteEventButton() {
    var deleteButtons = document.getElementsByClassName("event-delete");
    Array.prototype.forEach.call(deleteButtons, (button) => {
        button.addEventListener("click", (event) => deleteEvent(event.target.getAttribute('eventid')));
    });
}

function deleteEvent(eventId) {
    xhttp.open("DELETE", "/event-form.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var response = this.responseText;
            if (response == "correct") {
                if (document.getElementById("events-gestion")) {
                    document.getElementById(eventId).remove();
                } else {
                    window.location.replace('/');
                }
            } else {
                alert(response);
            }
        }
    };
    let data = {
        id: eventId
    };
    let jsonData = JSON.stringify(data);
    xhttp.send(jsonData);
}