document.addEventListener("DOMContentLoaded", () => setAdminListeners());

function setAdminListeners() {
    setAdminCheckboxes();
    setManagerCheckboxes();
    setModeratorCheckboxes();
}

function setAdminCheckboxes() {
    adminCheckboxes = document.getElementsByClassName("admin-checkbox");
    Array.prototype.forEach.call(adminCheckboxes, (checkbox) => {
        checkbox.checked = checkbox.value === "1";
    });
    Array.prototype.forEach.call(adminCheckboxes, (checkbox) => {
        checkbox.addEventListener("change", (event) => togglePrivilegies(event.target, 'admin'));
    });
}

function setManagerCheckboxes() {
    managerCheckboxes = document.getElementsByClassName("manager-checkbox");
    Array.prototype.forEach.call(managerCheckboxes, (checkbox) => {
        checkbox.checked = checkbox.value === "1";
    });
    Array.prototype.forEach.call(managerCheckboxes, (checkbox) => {
        checkbox.addEventListener("change", (event) => togglePrivilegies(event.target, 'manager'));
    });
}

function setModeratorCheckboxes() {
    moderatorCheckboxes = document.getElementsByClassName("moderator-checkbox");
    Array.prototype.forEach.call(moderatorCheckboxes, (checkbox) => {
        checkbox.checked = checkbox.value === "1";
    });
    Array.prototype.forEach.call(moderatorCheckboxes, (checkbox) => {
        checkbox.addEventListener("change", (event) => togglePrivilegies(event.target, 'moderator'));
    });
}

function togglePrivilegies(target, permission) {
    xhttp.open("POST", "admin.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            if (response == "correct") {
                console.log(response);
            } else if (response == "notAdminAnymore") {
                location.reload();
            } else {
                target.checked = true;
                alert(response);
            }
        }
    };
    let checked = target.checked ? 1 : 0;
    let data;
    if (permission == 'admin') {
        data = {username:target.name, super: checked};
    } else if (permission == 'manager') {
        data = {username:target.name, manager: checked};
    } else if (permission == 'moderator') {
        data = {username:target.name, moderator: checked};
    }
    let jsonData = JSON.stringify(data);
    xhttp.send(jsonData);
}