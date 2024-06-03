$(document).ready(function () {
    $("#commentForm").on("submit", function (event) {
        event.preventDefault();
        let formData = {
            _token: $("input[name=_token]").val(),
            body: $("#comment").val(),
            id: $("input[name=id]").val(),
            user_token: $("input[name=user_token]").val(),
        };
        $.ajax({
            url: "http://127.0.0.1:8000/api/comment/add/" + formData.id,
            method: "POST",
            headers: {
                Authorization: "Bearer " + formData.user_token,
            },
            data: formData,
            success: function (response) {
                if (response.success) {
                    $("#commentForm")[0].reset();
                    $("#errorMessages").html("");
                    dayjs.extend(window.dayjs_plugin_relativeTime);
                    let formattedDate = dayjs(
                        response.comment.created_at
                    ).fromNow();
                    let newComment = `
                                        <div class="media mb-3">
                                            <img src="${response.user.image}" class="mr-3 rounded-circle" alt="${response.user.name}" width="50">
                                            <div class="media-body">
                                                <h5 class="mt-0">${response.user.name}</h5>
                                                <p>${response.comment.body}</p>
                                                <small class="text-muted">${formattedDate}</small>
                                            </div>
                                        </div>
                                    `;
                    $(".card-body-comments").prepend(newComment);
                } else {
                    let errors = "";
                    $.each(response.errors, function (key, value) {
                        errors += `<p>${value}</p>`;
                    });
                    $("#errorMessages").html(errors);
                }
            },
            error: function (response) {
                let errors = "";
                $.each(response.responseJSON.errors, function (key, value) {
                    errors += `<p>${value}</p>`;
                });
                $("#errorMessages").html(errors);
            },
        });
    });
});
