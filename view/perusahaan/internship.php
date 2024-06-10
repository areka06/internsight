<?php
session_start();
if ($_SESSION['role'] != 'perusahaan') {
    header("Location: ../public/index.php");
    exit();
}
?>

<?php
include '../../controllers/beritaperusahaan.php';
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

    <!-- icon -->
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        overflow: hidden;
    }

    a {
        text-decoration: none;
    }

    .container {
        margin-top: 0px;
        padding: 20px;
        display: flex;
        height: 730px;
    }

    /* navbar */
    nav {}

    .navbar {
        display: flex;
        align-items: center;
        flex-direction: column;
        background-color: black;
        border-radius: 30px;
        width: 300px;
        height: 99%;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
        justify-content: space-around;
        transition: border-radius 0.3s ease-in-out;
    }

    .logo {
        margin-top: -80px;
        margin-left: 30px;
        display: flex;
        align-items: center;
        height: 20px;
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
        margin-top: -150px;
        width: 300px;
        height: 30px;
        display: flex;
        flex-direction: column;
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
        margin: 10px;
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
    .container-firstbox {
        display: block;
        width: 2000px;
        height: 100%;
        overflow-x: hidden;
        margin-left: 30px;
    }

    .firstbox {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 1150px;
        height: auto;
        border-radius: 30px;
    }
    .firstbox-title{
        text-align: center;
        color: #000;
        font-family: "Space Grotesk", sans-serif;
        font-size: 40px;
        font-weight: 600;
        line-height: 90px;
        letter-spacing: -4px;
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
        margin-top: -20px;
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
</style>
<style>
    /* newspost */
    .post {
        width: 32%;
        height: 530px;
        background: #fff;
        border: 1px solid #dfdfdf;
        border-radius: 10px;
        margin-top: 40px;
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
    }

    .title {
        margin-top: 10px;
        font-weight: 600;
        font-size: 20px;
        height: 80px;
        color: black;
    }

    .post-content {
        width: 100%;
        padding: 20px;
        padding-top: 0px;
    }



    .description {
        font-size: 14px;
        text-align: justify;
        color: #000;
        display: -webkit-box;
        -webkit-line-clamp: 7;
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
</style>

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <div>
                        <img src="../../../internsight/assets/logo.png" class="logoimg">
                    </div>
                    <div>
                        <p1>InternSight</p1>
                        <!-- <p2>INFORMATION</p2> -->
                    </div>
                </div>
                <div class="navbutton">
                    <a href="/internsight/view/perusahaan/dashboard.php"><button>Home</button></a>
                    <a href="/internsight/view/perusahaan/internship.php"><button>Daftar Internship</button></a>
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
        <section class="container-firstbox">
            <div class="firstbox">
                <p class="firstbox-title">Siapkan Lowongan Kerja Untuk Insighters</p>
                <div class="wrapper">
                    <div class="left-col">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>      
                                <!-- // status wrappers -->
                                <div class="post">
                                <a href="/internsight/view/perusahaan/pageinternship.php?id=<?php echo $row["id_berita"]; ?>">
                                    <div class="news-image">
                                        <img src='../../assets/storage/<?php echo $row["gambar_berita"]; ?>' class="post-image" alt="">
                                    </div>
                                    <div class="post-content">
                                        <p class="title"><?php echo $row["judul_berita"]; ?></p>
                                        <p class="description"><?php echo $row["deskripsi_berita"]; ?></p>
                                        <div class="info">
                                            <div class="user">
                                                <div class="profile-pic"><img height="42px" src="https://medibase-software.nl/wp-content/uploads/2020/06/MedibaseSoftware_Team-Egee.png" alt=""></div>
                                                <p class="username"><?php echo $row["nama_perusahaan"]; ?></p>
                                            </div>
                                            <img src="img/option.PNG" class="options" alt="">
                                        </div>
                                        <p class="post-time"><?php echo $row["tanggal_awal"] . " hingga " . $row["tanggal_akhir"]; ?></p>
                                    </div>
                                    </a>
                                </div>
                                <!-- // +5 more post elements -->
                        <?php
                            }
                        } else {
                            echo "<p>Tidak ada berita tersedia.</p>";
                        }
                        ?>
                    </div>
                </div>
                <!-- <span>
                </span> -->
            </div>

        </section>
    </div>
</body>

</html>