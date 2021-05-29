document.addEventListener("DOMContentLoaded", () => setModerationListeners());

function setModerationListeners() {
    setEditButtonFunctionalities();
    setDeleteButtonFunctionalities();
    var bodyComment = document.getElementById('comment-body');
    if (bodyComment) {
        setEditView(bodyComment);
    }
}

function setEditButtonFunctionalities() {
    var editButtons = document.getElementsByClassName("edit");
    Array.prototype.forEach.call(editButtons, (button) => {
        button.addEventListener("click", (event) => editComment(event.target.getAttribute('commentid')));
    });
}

function setDeleteButtonFunctionalities() {
    var deleteButtons = document.getElementsByClassName("delete");
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

function setEditView(bodyComment) {
    bodyComment.value = bodyComment.getAttribute('body');
    document.getElementById('update-comment').addEventListener("click", () => updateCommentBody());
}

function updateCommentBody() {
    var comment = document.getElementById('comment-body');
    var body = comment.value;
    var id = comment.getAttribute('commentid');
    xhttp.open("PATCH", "comment.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var response = this.responseText;
            if (response != "correct") {
                alert(response);
            }
        }
    };
    let data = {
        body: body,
        id: id
    };
    let jsonData = JSON.stringify(data);
    xhttp.send(jsonData);
}