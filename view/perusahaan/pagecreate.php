<?php
session_start();
if ($_SESSION['role'] != 'perusahaan') {
    header("Location: ../public/index.php");
    exit();
}
?>
<?php
include '../../controllers/createinternship.php';
$categories = getCategories($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternSight</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <!-- tailwind -->

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        margin-left: 20px;
        margin-right: 20px;
        background-color: #F6F8FD;
    }

    a {
        text-decoration: none;
    }

    .container {
        margin-top: 20px
    }

    /* navbar */
    nav {
        display: flex;
        justify-content: center;
        position: sticky;
        z-index: 999;
        top: 0px;
    }

    .navbar {
        display: flex;
        align-items: center;
        background-color: black;
        border-radius: 30px;
        width: 100%;
        height: 80px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
        justify-content: space-between;
        transition: border-radius 0.3s ease-in-out;
    }

    .logo {
        margin-left: 30px;
        display: flex;
        align-items: center;
        height: 100%;
    }

    .logoimg {
        width: 50px;
        height: auto;
        margin-right: 20px;
    }

    .logo p1 {
        color: #fff;
        font-family: 'poppins', sans-serif;
        font-size: 24px;
        font-weight: 600;
    }

    .logo p2 {
        color: #ffffff;
        font-family: 'poppins', sans-serif;
        font-size: 15px;
        font-weight: 300;
        display: flex;
        margin-top: -10px;
    }

    .navbox {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 80px;
        background-color: #2a83fd;
        width: 140px;
        height: 45px;
        border-radius: 8px;
    }

    .navbox:hover {
        transition: background-color 0.3s ease-in-out;
        background-color: #fd2a6d;
    }

    .navbox span p {
        color: #fff;
        font-family: 'poppins', sans-serif;
        font-size: 16px;
        font-weight: 500;
    }

    .navbutton {
        width: 1000px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navbutton button {
        width: auto;
        height: 45px;
        border-radius: 4px;
        color: #fff;
        font-family: 'poppins', sans-serif;
        font-size: 14px;
        font-weight: 400;
        margin: 30px;
        padding-left: 20px;
        padding-right: 20px;
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .navbar button:hover {
        transition: background-color 0.3s ease-in-out;
        background-color: #2a83fd;
    }

    /* main */
    /* first box */
    .firstbox {
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: auto;
        height: 2000px;
        border-radius: 30px 30px 0 0;
        padding-top: 30px;
        background-repeat: no-repeat;
        background-size: cover;
        object-fit: cover;
        margin-top: 60px;
        background-color: white;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
    }

    .content-berita {
        width: 2000px;
        margin-left: 50px;
        height: 800px;
    }

    .firstbox h1 {
        text-align: start;
        color: #000;
        font-family: 'poppins', sans-serif;
        font-size: 34px;
        font-weight: 700;
    }

    /* second box */
    .secondbox {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
    }

    .secondbox span p {
        text-align: center;
        width: 800px;
        color: #000;
        font-family: "Space Grotesk", sans-serif;
        font-size: 40px;
        font-weight: 600;
        line-height: 90px;
        letter-spacing: -4px;
    }
</style>
<style>
    .card-container {
        display: flex;
        justify-content: center;
    }

    /* newspost */
    .post {
        width: 70%;
        height: 530px;
        background: #fff;
        border: 1px solid #dfdfdf;
        border-radius: 10px;
        margin-top: 20px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        font-family: 'poppins', sans-serif;
    }

    .info {
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .info .username {
        width: auto;
        font-weight: bold;
        color: #000;
        font-size: 14px;
        margin-left: 10px;
    }

    .info .options {
        height: 10px;
        cursor: pointer;
    }

    .info .user {
        display: flex;
        align-items: center;
    }

    .info .profile-pic {
        height: 40px;
        width: 40px;
        padding: 0;
        background: none;
    }

    .info .profile-pic img {
        border: none;
    }

    .news-image {
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        height: 30vh;
    }

    .news-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .post-image {
        height: auto;
        object-fit: cover;
        margin-bottom: 30px;
    }

    .title {
        font-weight: 600;
        font-size: 20px;
        height: 60px;
        color: black;
    }

    .post-content {
        margin-top: 40px;
        width: 100%;
        padding: 20px;
        padding-top: 0px;
    }



    .description {
        font-size: 14px;
        text-align: justify;
        color: #000;
        display: -webkit-box;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .post-time {
        color: rgba(0, 0, 0, 0.5);
        font-size: 15px;
    }

    .comment-wrapper {
        width: 100%;
        height: 50px;
        border-radius: 1px solid #dfdfdf;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .comment-wrapper .icon {
        height: 30px;
    }

    .comment-box {
        width: 80%;
        height: 100%;
        border: none;
        outline: none;
        font-size: 14px;
    }

    .comment-btn,
    .action-btn {
        width: 70px;
        height: 100%;
        background: none;
        border: none;
        outline: none;
        text-transform: capitalize;
        font-size: 16px;
        color: rgb(0, 162, 255);
        opacity: 0.5;
    }

    .wrapper {
        display: flex;
        justify-content: space-around;
    }

    .left-col {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: space-between;
        width: 90%;
    }

    .form-berita {
        display: flex;
        justify-content: center;
    }

    .preview img {
        border-radius: 12px;
    }
</style>
<style>
    .button {
        /* form */
        appearance: none;
        font: inherit;
        border: none;
        background: none;
        cursor: pointer;
    }

    .modal {
        display: flex;
        flex-direction: column;
        width: 800px;
        background-color: #fff;
        /* box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.15); */
        border-radius: 10px;
        font-family: 'poppins', sans-serif;
    }

    .modal__header {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .modal__body {
        padding: 1rem 1rem;
    }

    .modal__footer {
        padding: 0 1.5rem 1.5rem;
    }

    .modal__title {
        font-weight: 700;
        font-size: 1.25rem;
    }

    .button {
        background-color: #007dab;
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.15s ease;
    }

    .button--icon {
        width: 2.5rem;
        height: 2.5rem;
        background-color: transparent;
        border-radius: 20px;
    }

    .button--icon:focus,
    .button--icon:hover {
        background-color: #ededed;
    }

    .button--primary {
        background-color: #084cdf;
        color: #FFF;
        padding: 0.75rem 10rem;
        border-radius: 10px;
        font-weight: 500;
        font-size: 0.875rem;
    }

    .button--primary:hover {
        background-color: #0d45a5;
    }

    .input {
        display: flex;
        flex-direction: column;
    }

    .input+.input {
        margin-top: 1.75rem;
    }

    .input__label {
        font-weight: 700;
        font-size: 0.875rem;
    }

    .input__field {
        display: block;
        margin-top: 0.5rem;
        border: 1px solid #DDD;
        border-radius: 10px;
        padding: 0.75rem 0.75rem;
        transition: 0.15s ease;
    }

    .input__field:focus {
        outline: none;
        border-color: #2a83fd;
        box-shadow: 0 0 0 1px #2a83fd, 0 0 0 4px rgba(0, 125, 171, 0.25);
    }

    .input__field--textarea {
        min-height: 100px;
        max-width: 100%;
    }

    .input__description {
        font-size: 0.875rem;
        margin-top: 0.5rem;
        color: #8d8d8d;
    }

    /* form */
</style>
<style>
    .form {
        /* file */
        background-color: #fff;
        /* box-shadow: 0 10px 60px rgb(218, 229, 255); */

        border-radius: 20px;
        padding: 2rem .7rem .7rem .7rem;
        text-align: center;
        font-size: 1.125rem;
        max-width: 100%;
        margin-top: 0.5rem;
    }

    .form-title {
        color: #000000;
        font-size: 1.8rem;
        font-weight: 500;
    }

    .form-paragraph {
        margin-top: 10px;
        font-size: 0.9375rem;
        color: rgb(105, 105, 105);
    }

    .drop-container {
        background-color: #fff;
        position: relative;
        display: flex;
        gap: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
        margin-top: 2.1875rem;
        border-radius: 10px;
        border: 2px dashed rgb(171, 202, 255);
        color: #444;
        cursor: pointer;
        transition: background .2s ease-in-out, border .2s ease-in-out;
    }

    .drop-container:hover {
        background: rgba(0, 140, 255, 0.164);
        border-color: rgba(17, 17, 17, 0.616);
    }

    .drop-container:hover .drop-title {
        color: #222;
    }

    .drop-title {
        color: #444;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        transition: color .2s ease-in-out;
    }

    #file-input {
        width: 350px;
        max-width: 100%;
        color: #444;
        padding: 2px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid rgba(8, 8, 8, 0.288);
    }

    #file-input::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #084cdf;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background .2s ease-in-out;
    }

    #file-input::file-selector-button:hover {
        background: #0d45a5;
    }

    /* file */
</style>

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <div>
                        <img src="../../assets/logo.png" class="logoimg">
                    </div>
                    <a href="/internsight/view/perusahaan/internship.php">
                        <div>
                            <p1>InternSight</p1>
                        </div>
                    </a>
                </div>
                <a href="/internsight/public/logout.php">
                    <div class="navbox">
                        <span>
                            <p>Logout</p>
                        </span>
                    </div>
                </a>
            </div>
        </nav>
        <section>
            <div class="firstbox">
                <div class="content-berita">
                    <div class="form-berita">
                        <form class="form" action="../../controllers/postcreateinternship.php" method="POST" enctype="multipart/form-data">
                            <div class="container">
                                <div class="modal">
                                    <input type="hidden" name="id_perusahaan" value="<?php echo isset($_SESSION['id_perusahaan']) ? $_SESSION['id_perusahaan'] : ''; ?>">
                                    <div class="modal__header">
                                        <span class="modal__title">Create New Internship</span>
                                    </div>
                                    <div class="modal__body">
                                        <div class="input">
                                            <label class="input__label">Judul Internship</label>
                                            <input class="input__field" type="text" name="judul_berita" required>
                                            <p class="input__description">The title must contain a maximum of 32 characters</p>
                                        </div>
                                        <div class="input">
                                            <label class="input__label">Nama Internship</label>
                                            <input class="input__field" type="text" name="nama_internship" required>
                                            <p class="input__description">The title must contain a maximum of 32 characters</p>
                                        </div>
                                        <div class="input">
                                            <label class="input__label">Deskripsi Lowongan</label>
                                            <textarea class="input__field input__field--textarea" name="deskripsi_berita" required></textarea>
                                            <p class="input__description">Give your vacancy a good description so everyone knows what's it for</p>
                                        </div>
                                        <div class="input">
                                            <label class="input__label">Tanggal Awal</label>
                                            <input class="input_field input__field input__field--textarea" type='date' name="tanggal_awal" required>
                                        </div>
                                        <div class="input">
                                            <label class="input__label">Tanggal Akhir</label>
                                            <input class="input_field input__field input__field--textarea" type='date' name="tanggal_akhir" required>
                                        </div>
                                        <div class="input">
                                            <label class="input__label">Kategori</label>
                                            <select class="input__field" name="id_kategori">
                                                <?php
                                                foreach ($categories as $category) {
                                                    echo "<option value='{$category['id_kategori']}'>{$category['kategori']}</option>";
                                                }
                                                ?>
                                            </select>
                                            <p class="input__description">Select a category for the news</p>
                                        </div>
                                        <div class="input">
                                            <label class="input__label">Gambar Internship</label>
                                            <label for="file-input" class="drop-container">
                                                <span class="drop-title">Drop files here</span>
                                                or
                                                <input type="file" accept="image/*" id="file-input" name="gambar_berita" required>
                                                <div class="preview" id="preview">
                                                </div>
                                            </label>
                                            <p class="input__description">Drop a Job Image that matches the description</p>
                                        </div>
                                    </div>
                                    <div class="modal__footer">
                                        <button class="button button--primary">Create Internship</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script>
    document.getElementById('file-input').addEventListener('change', function(event) {
        const fileInput = event.target;
        const previewContainer = document.getElementById('preview');
        const files = fileInput.files;

        // Clear the preview container
        previewContainer.innerHTML = '';

        if (files && files[0]) {
            const file = files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%'; // Adjust as needed
                img.style.maxHeight = '100%'; // Adjust as needed
                previewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    });
</script>

</html>