const EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/

document.addEventListener("DOMContentLoaded", () => setCommentsListeners());

function setCommentsListeners() {
    document.getElementById("display-comments").addEventListener("click", () => showComments());
    document.getElementById("hide-comments").addEventListener("click", () => hideComments());
    let newCommentForm = document.getElementById("send-comment");
    if (newCommentForm) {
        newCommentForm.addEventListener("click", () => sendComment());
        document.getElementsByName("comment")[0].addEventListener("input", () => adultsFilter());
    }
    document.getElementsByClassName("close")[0].addEventListener("click", () => closeWarningModal());
    window.addEventListener("click", event => closeWarningModal(event.target));
}

function showComments() {
    var comments = document.getElementById("comments-wrapper");
    var displayCommentsButton = document.getElementById("display-comments");
    comments.style.display = "flex";
    displayCommentsButton.style.display = "none";
}

function hideComments() {
    var comments = document.getElementById("comments-wrapper");
    var displayCommentsButton = document.getElementById("display-comments");
    comments.style.display = "none";
    displayCommentsButton.style.display = "block";
}

function sendComment() {
    var commentForm = document.getElementsByName("comment")[0];
    var name = commentForm.getAttribute('username');
    var role = commentForm.getAttribute('role');
    var event = commentForm.getAttribute('event');
    var comment = commentForm.value;
    if (role !== 'anonimo' && comment !== '') {
        saveComment(event, name, comment);
        clearForm(commentForm);
    } else {
        document.getElementById("warning-modal").style.display = "block";
    }
}

function saveComment(event, name, comment) {
    xhttp.open("POST", "comments.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            if (response == "correct") {
                addComment(name, comment);
            } else {
                alert(response);
            }
        }
    };
    let data = {
        event_id: event,
        author: name,
        body: comment
    };
    let jsonData = JSON.stringify(data);
    xhttp.send(jsonData);
}

function addComment(name, comment) {
    var now = new Date().toLocaleString().slice(0, 10);
    var commentDetails = document.createElement("div");
    commentDetails.innerHTML = `<span>${name}</span><span>${now}</span>`;
    commentDetails.className = "comment-details";
    var commentBody = document.createElement("p");
    commentBody.innerHTML = comment;

    var newComment = document.createElement("element");
    newComment.appendChild(commentDetails);
    newComment.appendChild(commentBody);

    var commentsList = document.getElementById("comments-list");
    commentsList.appendChild(newComment);
}

function clearForm(commentForm) {
    commentForm.value = '';
}

function closeWarningModal(target) {
    var warningModal = document.getElementById("warning-modal");
    if (!target || (target && target == warningModal)) {
        warningModal.style.display = "none";
    }
}

function adultsFilter() {
    var commentField = document.getElementsByName("comment")[0];
    var comment = commentField.value;
    BANNED_WORDS.map(w => w.word).forEach(word => {
        var wordRegex = new RegExp(word, "i");
        if (wordRegex.test(comment)) {
            var ban = '';
            for (var i = 0; i < word.length; i++) { ban += '*'; }
            comment = comment.replace(new RegExp(word, "i"), ban);
            commentField.value = comment;
        }
    })
}

function validEmail(email) {
    return email ? email.match(EMAIL_REGEX) : false;
}
