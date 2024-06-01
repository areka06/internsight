<?php
session_start();
if ($_SESSION['role'] != 'perusahaan') {
    header("Location: ../public/index.php");
    exit();
}
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
    }
    a{
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
        background-color: #141414cb;
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
        justify-content: center;
        margin-top: -80px;
        width: auto;
        height: 750px;
        border-radius: 30px;
        background-color: black;
        background-image: url("Asset/gauze.jpeg");
        background-repeat: no-repeat;
        background-size: cover;
        object-fit: cover;
    }

    .firstbox span {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 120px;
        width: 1500px;
        height: 100px;
    }

    .firstbox span p {
        color: #fff;
        font-family: "Space Grotesk", sans-serif;
        font-size: 60px;
        font-weight: 600;
    }

    .team {
        margin-top: 40px;
        width: 400px;
    }

    .img1 {
        width: 300px;
        height: auto;
    }

    .sparkle {
        width: 70px;
        height: auto;
    }

    .head2 {
        display: flex;
    }

    .teamcontainer {
        display: flex;
        align-items: center;
    }

    .card1 {

        margin-right: 100px;
        background-color: #fff;
        border-radius: 20px;
        width: 200px;
        height: 100px;
    }

    .card2 {
        margin-left: 100px;
        background-color: #fff;
        border-radius: 20px;
        width: 200px;
        height: 100px;
    }

    /* second box */
    .secondbox {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 1500px;
    }

    .secondbox span p {
        text-align: center;
        width: 800px;
        color: #000;
        font-family: "Space Grotesk", sans-serif;
        font-size: 70px;
        font-weight: 600;
        line-height: 90px;
        letter-spacing: -4px;
    }

    .form {
        /* file */
        background-color: #fff;
        /* box-shadow: 0 10px 60px rgb(218, 229, 255); */
        border: 1px solid #DDD;
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
    }/* file */

    
    .button {/* form */
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
        border: 1px solid rgba(8, 8, 8, 0.288);
        box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.15);
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
        border-color: #007dab;
        box-shadow: 0 0 0 1px #007dab, 0 0 0 4px rgba(0, 125, 171, 0.25);
    }

    .input__field--textarea {
        min-height: 100px;
        max-width: 100%;
    }

    .input__description {
        font-size: 0.875rem;
        margin-top: 0.5rem;
        color: #8d8d8d;
    }/* form */

/* Main*/
.content main{
    width: 100%;
    padding: 36px 24px;
    font-family: 'poppins', sans-serif;
}
.content main .head-title{
    margin-top: -35px;
}
.content main .head-title .left h1{
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 10px;
}
.content main .head-title .left .breadcumb{
    display: flex;
    align-items: center;
    grid-gap: 16px;
}
.content main .head-title .left .breadcumb li a{
    color: #AAAAAA;
}

/* Board*/
.board{
    width: 94%;
    margin: 30px 0 30px 30px;
    overflow: auto;
    /* background: #fff0f0; */
    border-radius: 8px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
}
table{
    font-family: 'poppins', sans-serif;
    border-collapse: collapse;
}

thead td{
    font-size: 18px;font-weight: 600;
    text-align: start;
    text-transform: uppercase;
    padding: 20px;
    background-color: #084cdf;
    color: #fff;
}

thead tr td{
    padding: 20px 20px;
    text-align: center;
}

tbody tr{
    box-shadow: #000000;
}
tbody tr td{
    padding: 20px 20px;
    text-align: center;
}

.view{
    font-weight: 500;
}

.add{
    background-color: #ffffff;
    border-radius: 14px;
    width: 100px;
    height: 30px;
    border-color: transparent;

}.edit{
    font-weight: 500;
}
.delete{
    font-weight: 500;
}
/* Board*/
/* Main*/
</style>

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <div>
                        <img src="Asset/logo.png" class="logoimg">
                    </div>
                    <div>
                        <p1>InternSight</p1>
                        <!-- <p2>INFORMATION</p2> -->
                    </div>
                </div>
                <div class="navbutton">
                    <a href="pelamar.php"><button>Home</button></a>
                    <a href="carikerja.php"><button>Cari Kerja</button></a> 
                    <a href="tentangkami.php"><button>Tentang Kami</button></a>
                    <a href="tipsandtrick.php"><button>Tips & Tricks</button></a>
                    <a href="admin.php"><button>Admin</button></a>
                </div>
                <a href="admin.php">
                    <div class="navbox">
                        <span>
                            <p>Login</p>
                        </span>
                    </div>
                </a>

            </div>
        </nav>
        <section>
            <div class="firstbox">
                <span>
                    <p>Selamat Datang,</p>
                    <div class="head2">
                        <img src="Asset/sparkle.png" class="sparkle">
                        <p> Minsight!</p>
                        <img src="Asset/sparkle.png" class="sparkle">
                    </div>
                    <div class="teamcontainer">
                        <!-- <div class="card1">
                            <button>Cari Kerja</button>
                        </div> -->
                        <img src="https://asaprentals.com.au/wp-content/uploads/2020/10/team.png" alt="" class="team">
                        <!-- <div class="card2">
                            <button>Cari Kerja</button> -->
                    </div>
            </div>
            </span>
    </div>
    <div class="secondbox">
        <div>
            <div class="container">

                <div class="modal">
                    <div class="modal__header">
                        <span class="modal__title">Membuat Lowongan</span><button class="button button--icon"><svg width="24"
                                viewBox="0 0 24 24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0V0z"></path>
                                <path
                                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z">
                                </path>
                            </svg></button>
                    </div>
                    <div class="modal__body">
                        <div class="input">
                            <label class="input__label">Judul Lowongan</label>
                            <input class="input__field" type="text">
                            <p class="input__description">The title must contain a maximum of 32 characters</p>
                        </div>
                        <div class="input">
                            <label class="input__label">Deskripsi Lowongan</label>
                            <textarea class="input__field input__field--textarea"></textarea>
                            <p class="input__description">Give your vacancy a good description so everyone know what's it for</p>
                        </div>
                        <div class="input">
                            <label class="input__label">Tanggal Awal</label>
                            <input type='datetime-local'>
                        </div>
                        <div class="input">
                            <label class="input__label">Tanggal Akhir</label>
                            <input type='datetime-local'>
                        </div>
                        <div class="input">
                            <label class="input__label">Foto Lowongan</label>
                            <form class="form">
                                <span class="form-title">Upload your file</span>
                                <p class="form-paragraph">
                                    File should be an image
                                </p>
                                <label for="file-input" class="drop-container">
                                    <span class="drop-title">Drop files here</span>
                                    or
                                    <input type="file" accept="image/*" required="" id="file-input">
                                </label>
                            </form>
                            <p class="input__description">Drop a Job Image that matches the description</p>
                        </div>
                    </div>
                    <div class="modal__footer">
                        <button class="button button--primary">Create project</button>
                    </div>
                </div>
            </div>
        </div>
        <main>
            <!-- Board -->
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Judul</td>
                            <td>Deskripsi</td>
                            <td>Tanggal Awal</td>
                            <td>Tanggal Akhir</td>
                            <td>Foto Lowongan</td>
                            <td>Actions</td>
                            <td >
                                <button class="add">
                                    <a href="#">Add+</a>
                                </button>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Lowongan Kerja Bank Indonesia</td>
                            <td>lorem ipsum</td>
                            <td>12 januari 2024</td>
                            <td>30 januari 2024</td>
                            <td>bank indonesia.jpg</td>

                            <td class="edit">
                                <a href="#">Edit</a>
                            </td>
                            <td class="delete">
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Lowongan Kerja Pertamina</td>
                            <td>lorem ipsum</td>
                            <td>20 maret 2024</td>
                            <td>30 maret 2024</td> 
                            <td>pertamina.jpg</td>
                            <td class="edit">
                                <a href="#">Edit</a>
                            </td>
                            <td class="delete">
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Lowongan Kerja Matahari</td>
                            <td>lorem ipsum</td>
                            <td>1 oktober 2024</td>
                            <td>6 oktober 2024</td>
                            <td>matahari.jpg</td>

                            <td class="edit">
                                <a href="#">Edit</a>
                            </td>
                            <td class="delete">
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    </section>
    </div>
</body>

</html>