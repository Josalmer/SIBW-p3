document.addEventListener("DOMContentLoaded", () => setModerationListeners());

function setModerationListeners() {
    setEditButtonFunctionalities();
    setDeleteButtonFunctionalities();
}

function setEditButtonFunctionalities() {
    editButtons = document.getElementsByClassName("edit");
    Array.prototype.forEach.call(editButtons, (button) => {
        button.addEventListener("click", (event) => editComment(event.target.getAttribute('commentid')));
    });
}

function setDeleteButtonFunctionalities() {
    deleteButtons = document.getElementsByClassName("delete");
    Array.prototype.forEach.call(deleteButtons, (button) => {
        button.addEventListener("click", (event) => deleteComment(event.target.getAttribute('commentid')));
    });
}

function editComment(commentId) {
    window.location.replace('/comment/' + commentId);
}

function deleteComment(commentId) {
    xhttp.open("DELETE", "comments.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var response = this.responseText;
            if (response == "correct") {
                document.getElementById(commentId).remove();
            } else {
                alert(response);
            }
        }
    };
    let data = {
        id: commentId
    };
    let jsonData = JSON.stringify(data);
    xhttp.send(jsonData);
}