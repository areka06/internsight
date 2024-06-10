<?php
session_start();
if ($_SESSION['role'] !== 'pelamar') {
    $_SESSION['error'] = 'You must be logged in as "applicant" to access this page.';
    header('Location: /internsight/view/login.php');
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

    <!-- icon -->
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
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 700px;
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

    /* third box */
    .thirdbox {
        display: flex;
        flex-direction: column;
        background-color: #000000;
        /* background-color: #1d62ae; */
        border-radius: 30px;
        width: 100%;
        height: 390px;
    }

    .benefit {
        margin-bottom: 40px;
    }

    .benefit span p {
        color: #fff;
        font-family: "Space Grotesk", sans-serif;
        font-size: 32px;
        font-weight: 500;
        margin-top: 90px;
        margin-left: 180px;
    }

    .benefit-list {
        display: flex;
        flex-direction: row;
        color: #fff;
        font-family: "Space Grotesk", sans-serif;
        font-size: 20px;
        font-weight: 400;
        margin-left: 180px;
    }

    .benefit-list p {
        margin-bottom: 20px;
    }

    .container-list {
        margin-right: 100px;
    }

    .sparkle2 {
        height: 30px;
        margin-bottom: 25px;
    }

    .list1 {
        display: flex;
        align-items: center;
    }

    /* fourthbox */
    .fourthbox {
        margin-top: 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        height: 700px;
    }

    .fourthbox span p {
        text-align: center;
        width: 1500px;
        color: #000;
        font-family: "Space Grotesk", sans-serif;
        font-size: 60px;
        font-weight: 700;
        line-height: 90px;
        margin-bottom: 60px;
    }

    .flex-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .card-container {
        margin-left: 100px;
        display: flex;
        border-radius: 30px;
        flex-direction: column;
        align-items: baseline;
        justify-content: center;
        width: 1300px;
    }

    /* card1 */
    .card {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 500px;
        border-radius: 24px;
        line-height: 1.6;
        background-color: #2a83fd;
        color: #fff;
        transition: all 0.64s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }

    .content {
        font-family: "Space Grotesk", sans-serif;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 24px;
        padding: 36px;
        border-radius: 24px;
        background: transparent;
        color: #ffffff;
        z-index: 1;
        transition: all 0.64s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        background-color: #2a43fd;
        border-radius: inherit;
        height: 100%;
        width: 100%;
        opacity: 0;
        transform: skew(-24deg);
        clip-path: circle(0% at 50% 50%);
        transition: all 0.64s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .content .heading {
        font-weight: 700;
        font-size: 36px;
        line-height: 1.3;
        z-index: 1;
    }

    .content .para {
        z-index: 1;
        opacity: 0.8;
        font-size: 18px;
    }

    .content .para-sm {
        font-size: 16px;
    }

    .card:hover::before {
        opacity: 1;
        transform: skew(0deg);
        clip-path: circle(140.9% at 0 0);
    }

    .card:hover .content {
        color: #ffffff;
    }

    .cardlist p {
        font-family: "Space Grotesk", sans-serif;
        font-size: 18px;
        font-weight: 400;
        margin-top: 40px;
    }

    /* card2 */
    .card-2 {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 500px;
        border-radius: 24px;
        line-height: 1.6;
        background-color: #d62afd;
        color: #fff;
        transition: all 0.64s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }

    .content {
        font-family: "Space Grotesk", sans-serif;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 24px;
        padding: 36px;
        border-radius: 24px;
        background: transparent;
        color: #ffffff;
        z-index: 1;
        transition: all 0.64s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .card-2::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        background-color: #892afd;
        border-radius: inherit;
        height: 100%;
        width: 100%;
        opacity: 0;
        transform: skew(-24deg);
        clip-path: circle(0% at 50% 50%);
        transition: all 0.64s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .content .heading {
        font-weight: 700;
        font-size: 36px;
        line-height: 1.3;
        z-index: 1;
    }

    .content .para {
        z-index: 1;
        opacity: 0.8;
        font-size: 18px;
    }

    .content .para-sm {
        font-size: 16px;
    }

    .card-2:hover::before {
        opacity: 1;
        transform: skew(0deg);
        clip-path: circle(140.9% at 0 0);
    }

    .card-2:hover .content {
        color: #ffffff;
    }

    .cardlist p {
        font-family: "Space Grotesk", sans-serif;
        font-size: 18px;
        font-weight: 400;
        margin-top: 40px;
    }

    /* fifthbox */
    .fifthbox {
        /* background-color: #000; */
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .fifthbox p {
        text-align: center;
        width: 1500px;
        color: #8f9ab0;
        font-family: "Space Grotesk", sans-serif;
        font-size: 24px;
        font-weight: 400;
        line-height: 90px;
        letter-spacing: -2px;
    }

    .logo-perusahaan {
        margin-top: -50px;
        width: 100%;
        display: flex;
        align-items: center;
    }
</style>

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <div>
                        <img src="../../assets/logo.png" class="logoimg">
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
                    <p>Saatnya Cari Info Internship</p>
                    <div class="head2">
                        <img src="../../assets/sparkle.png" class="sparkle">
                        <p> Dengan Mudah, Disini! </p>
                        <img src="../../assets/sparkle.png" class="sparkle">
                    </div>
                    <div class="teamcontainer">
                        <!-- <div class="card1">
                            <button>Cari Kerja</button>
                        </div> -->
                        <img src="https://asaprentals.com.au/wp-content/uploads/2020/10/team.png" alt="" class="team">
                        <!-- <div class="card2">
                            <button>Cari Kerja</button>
                        </div> -->
                    </div>
                </span>

            </div>
            <div class="fourthbox">
                <span>
                    <p>Cara MUDAH untuk dapat internship, GRATIS</p>
                </span>
                <div class="flex-container">
                    <div class="card-container">
                        <a href="internship.php">
                            <div class="card">
                                <div class="content">
                                    <p class="heading">Saya Mencari Pekerjaan</p>
                                    <p class="para">
                                        Cari Loker Aman Yang Sesuai Untukmu!
                                    </p>
                                </div>
                            </div>
                        </a>
                        <div class="cardlist">
                            <p>Cari Internship yang SESUAI passionmu</p>
                            <p>Cari tanda AMAN untuk lamar internship yang terverifikasi</p>
                            <p>Buat CV PINTAR untuk tampil profesional</p>
                            <p>Pantau STATUS lamaranmu</p>
                            <p>Lowongan Pekerjaan Yang Kredibel</p>
                        </div>
                    </div>
                    <div class="card-container">
                        <a href="tipsandtrick.php">
                            <div class="card-2">
                                <div class="content">
                                    <p class="heading">Saya Butuh Tips & Trick</p>
                                    <p class="para">
                                        Cari Tips & Trick dan Upgrade CV-mu!
                                    </p>
                                </div>
                            </div>
                        </a>
                        <div class="cardlist">
                            <p>Cari Internship yang SESUAI passionmu</p>
                            <p>Cari tanda AMAN untuk lamar internship yang terverifikasi</p>
                            <p>Buat CV PINTAR untuk tampil profesional</p>
                            <p>Pantau STATUS lamaranmu</p>
                            <p>Lowongan Pekerjaan Yang Kredibel</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="secondbox">
                <span>
                    <p>Platform Yang Tepat Untuk Mencari Lowongan Pekerjaan</p>
                </span>
            </div>
            <div class="thirdbox">
                <div class="benefit">
                    <span>
                        <p>Benefit</p>
                    </span>
                </div>
                <div class="benefit-list">
                    <div class="container-list">
                        <div class="list1">
                            <img src="../../../internsight/assets/sparkle2.png" alt="" class="sparkle2">
                            <p>Akses Mudah</p>
                        </div>
                        <div class="list1">
                            <img src="../../../internsight/assets/sparkle2.png" alt="" class="sparkle2">
                            <p>Informasi Terkini</p>
                        </div>
                        <div class="list1">
                            <img src="../../../internsight/assets/sparkle2.png" alt="" class="sparkle2">
                            <p>Pilihan yang Beragam</p>
                        </div>
                    </div>
                    <div class="container-list">
                        <div class="list1">
                            <img src="../../../internsight/assets/sparkle2.png" alt="" class="sparkle2">
                            <p>Penghematan Waktu dan Biaya</p>
                        </div>
                        <div class="list1">
                            <img src="../../../internsight/assets/sparkle2.png" alt="" class="sparkle2">
                            <p>Kredibilitas Pekerjaan</p>
                        </div>
                        <div class="list1">
                            <img src="../../../internsight/assets/sparkle2.png" alt="" class="sparkle2">
                            <p>Informasi yang Lebih Lengkap</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fifthbox">
                <p>Beberapa bisnis/perusahaan yang menyediakan lowongan dengan kami</p>
                <div class="logo-perusahaan">
                    <img src="../../../internsight/assets/Matahari.png" alt="logo" style="width: auto; height: 150px;">
                    <img src="https://download.logo.wine/logo/Pertamina/Pertamina-Logo.wine.png" alt="logo" style="width: 250px; margin-right: 50px;">
                    <img src="https://maxsi.id/web/wp-content/uploads/2021/07/logo-telkomsel-baru.png" alt="logo" style="width: auto; height: 110px; margin-right: 70px">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Logo_PT_Kereta_Api_Indonesia_%28Persero%29.png/1280px-Logo_PT_Kereta_Api_Indonesia_%28Persero%29.png" alt="logo" style="width: auto; height: 80px; margin-right: 70px">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/2560px-BNI_logo.svg.png" alt="logo" style="width: auto; height: 35px; margin-right: 70px">
                    <img src="https://buatlogoonline.com/wp-content/uploads/2022/10/Logo-Bank-BRI.png" alt="logo" style="width: auto; height: 55px; ">
                </div>
        </section>
    </div>
</body>

</html>