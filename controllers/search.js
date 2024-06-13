$(document).ready(function() {
    function loadOriginalPosts() {
        $.ajax({
            url: '../controllers/berita.php', // Corrected path
            type: 'GET',
            data: { search: '' },
            success: function(data) {
                displayPosts(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function displayPosts(data) {
        let posts = JSON.parse(data);
        let postContainer = $(".left-col");

        postContainer.empty();

        if (posts.length > 0) {
            posts.forEach(function(post) {
                let postHTML = `
                    <div class="post">
                        <a href="/internsight/view/pelamar/pageinternship.php?id=${post.id_berita}">
                            <div class="news-image">
                                <img src='../../assets/storage/${post.gambar_berita}' class="post-image" alt="">
                            </div>
                            <div class="post-content">
                                <p class="title">${post.judul_berita}</p>
                                <p class="description">${post.deskripsi_berita}</p>
                                <div class="info">
                                    <div class="user">
                                        <div class="profile-pic"><img height="42px" src="https://medibase-software.nl/wp-content/uploads/2020/06/MedibaseSoftware_Team-Egee.png" alt=""></div>
                                        <p class="username">${post.nama_perusahaan}</p>
                                    </div>
                                </div>
                                <p class="post-time">${post.tanggal_awal} hingga ${post.tanggal_akhir}</p>
                            </div>
                        </a>
                    </div>
                `;
                postContainer.append(postHTML);
            });
        } else {
            postContainer.append("<p>No posts available.</p>");
        }
    }

    $("#search").on("input", function() {
        let query = $(this).val();

        if (query.length > 2) {
            $.ajax({
                url: '../controllers/berita.php', // Corrected path
                type: 'GET',
                data: { search: query },
                success: function(data) {
                    displayPosts(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            loadOriginalPosts();
        }
    });

    loadOriginalPosts();
});
