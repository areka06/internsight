<?php
session_start();
if ($_SESSION['role'] !== 'pelamar') {
    $_SESSION['error'] = 'You must be logged in as "applicant" to access this page.';
    header('Location: /internsight/view/login.php');
    exit();
}

?>
<?php
include '../../controllers/berita.php';
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
        background-image: url("../../../internsight/assets/gauze.jpeg");
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
        justify-content: flex-start;
        align-items: center;
        width: 100%;
        height: 1700px;
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

    /* newspost */
    .post {
        width: 32%;
        height: auto;
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
        margin-bottom: 20px;
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
        height: 35vh;
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
        font-size: 30px;
    }

    .post-content {
        width: 100%;
        padding: 20px;
        padding-top: 0px;
    }



    .description {
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 80px;
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
        justify-content: center;
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
                    <a href="/internsight/view/pelamar/dashboard.php"><button>Home</button></a>
                    <a href="/internsight/view/pelamar/internship.php"><button>Cari Kerja</button></a>
                    <a href="/internsight/view/pelamar/tipsandtrick.php"><button>Tips & Tricks</button></a>
                    <a href="/internsight/view/pelamar/tentangkami.php"><button>Tentang Kami</button></a>
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
                <span>
                    <p>Selamat Mencari Kerja,</p>
                    <div class="head2">
                        <img src="../../../internsight/assets/sparkle.png" class="sparkle">
                        <p> Insighters!</p>
                        <img src="../../../internsight/assets/sparkle.png" class="sparkle">
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
        <span>
            <p>Lowongan Kerja Untuk Insighters</p>
        </span>
        <section class="main">
            <div class="wrapper">
                <div class="left-col">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <!-- // status wrappers -->
                            <div class="post">

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
        </section>
    </div>
    </section>
    </div>
</body>

</html>