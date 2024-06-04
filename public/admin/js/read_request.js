document.querySelectorAll(".readRequest").forEach(function (element) {
    element.addEventListener("click", function () {
        var id = this.dataset.id;
        var token = this.dataset.token;
        var parent = this.parentElement.parentElement;
        var xhr = new XMLHttpRequest();
        xhr.open("PATCH", "http://127.0.0.1:8000/api/call-requests/read/" + id);
        xhr.setRequestHeader("Authorization", "Bearer " + token);
        xhr.onload = function () {
            if (xhr.status === 200) {
            var requestStatus = parent.querySelector(
                "td.requestStatus span"
            );
            requestStatus.innerHTML = "Read";
            requestStatus.classList.remove("badge-danger");
            requestStatus.classList.add("badge-success");
            }
        };
        xhr.send();
    });
});
