function displayPosts(posts) {
    const searchResults = document.querySelector(".searchResults");
    searchResults.innerHTML = ""; // Clear previous results

    posts.forEach((post) => {
        const li = document.createElement("li");
        li.classList.add("media", "my-3", "rounded");

        const img = document.createElement("img");
        img.src = post.image;
        img.classList.add("mr-3", "rounded");
        img.alt = post.title;
        img.style.width = "100px"; // Adjust image size if needed

        const mediaBody = document.createElement("div");
        mediaBody.classList.add("media-body");

        const h5 = document.createElement("h5");
        h5.classList.add("mt-0", "mb-1");
        h5.textContent = post.title;

        const link = document.createElement("a");
        link.href = "/post/" + post.id;
        link.textContent = "Read more";

        mediaBody.appendChild(h5);
        mediaBody.appendChild(link);

        li.appendChild(img);
        li.appendChild(mediaBody);

        searchResults.appendChild(li);
    });
}
$(".searchInput").keyup(function () {
    var search = $(this).val();
    if (search != "") {
        $.ajax({
            url: "http://127.0.0.1:8000/api/search/",
            type: "GET",
            data: { search: search },
            success: function (response) {
                if (response.success) {
                    if (response.posts.length > 0) {
                        displayPosts(response.posts);
                    } else {
                        $(".searchResults").html(
                            `<li class='media my-3 mr-3 rounded'><div class='media-body'>No results found</div></li>
                                <li class='media my-3 mr-3 rounded'><div class='media-body'><a class="nav-link " href="/blog">Click here to browse all posts!!</a></div></li>`
                        );
                    }

                }
            },
        });
    } else {
        $(".searchResults").html("");
    }
});
