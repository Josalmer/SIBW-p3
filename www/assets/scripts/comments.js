const EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/

document.addEventListener("DOMContentLoaded", () => setListeners());

function setListeners() {
    document.getElementById("display-comments").addEventListener("click", () => showComments());
    document.getElementById("hide-comments").addEventListener("click", () => hideComments());
    document.getElementById("send-comment").addEventListener("click", () => sendComment());
    document.getElementsByName("comment")[0].addEventListener("input", () => adultsFilter());
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
    var name = document.getElementsByName("name")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var comment = document.getElementsByName("comment")[0].value;
    if (name !== '' && validEmail(email) && comment !== '') {
        addComment(name, email, comment);
        clearForm();
    } else {
        document.getElementById("warning-modal").style.display = "block";
    }
}

function addComment(name, email, comment) {
    var now = new Date().toLocaleString().slice(0, 17);
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

function clearForm() {
    document.getElementsByName("name")[0].value = '';
    document.getElementsByName("email")[0].value = '';
    document.getElementsByName("comment")[0].value = '';
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