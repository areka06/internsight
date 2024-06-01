<?php
session_start();
if ($_SESSION['role'] != 'admin') {
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
    <!-- bootstrap -->
   

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
        flex-direction: row;
        gap: 100px;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 800px;
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

    .cardtips {
        font-family: 'poppins', sans-serif;
        background-color: #fff;
        padding: 20px;
        height: 450px;
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
    }

    .cards {
        display: flex;
        flex-direction: row;
        font-family: 'poppins', sans-serif;
        background-color: #fff;
        padding: 20px;
        height: 450px;
        border-radius: 20px;
        gap: 100px;
    }

    .cards .red {
        background-color: #007e9e;
    }

    .cards .blue {
        background-color: #0062ff;
    }

    .cards .green {
        background-color: #18cd5e;
    }

    .cards .card {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        height: 450px;
        width: 300px;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        transition: 400ms;
    }

    .cards .card p.tip {
        font-size: 1em;
        font-weight: 700;
    }

    .cards .card p.second-text {
        font-size: .7em;
    }

    .cards .card:hover {
        transform: scale(1.2, 1.2);
    }

    .card .red:hover>.card:not(:hover) {
        filter: blur(10px);
        transform: scale(0.9, 0.9);
    }

    .card .blue:hover>.card:not(:hover) {
        filter: blur(10px);
        transform: scale(0.9, 0.9);
    }

    .card .green:hover>.card:not(:hover) {
        filter: blur(10px);
        transform: scale(0.9, 0.9);
    }
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
                    <a href="/internsight/view/admin/dashboard.php"><button>Home</button></a>
                    <a href="/internsight/view/admin/carikerja.php"><button>Cari Kerja</button></a>
                    <a href="/internsight/view/admin/tipsandtrick.php"><button>Tips & Tricks</button></a>
                    <a href="/internsight/view/admin/tentangkami.php"><button>Tentang Kami</button></a>
                    <a href="/internsight/view/admin/admin.php"><button>Admin</button></a>
                </div>
                <a href="admin.php">
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
                    <p>Ayo Kita Cari Tau,</p>
                    <div class="head2">
                        <img src="Asset/sparkle.png" class="sparkle">
                        <p> Apa Itu Insight? </p>
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
        <a href="" data-toggle="modal" data-target="#exampleModalCenter">
            <div class="cardtips">
                <iframe width="260" height="auto" src="https://www.youtube.com/embed/5UFhwdpbhGk?si=c1zfxHkytf8vWLFB" frameborder="0" allowfullscreen></iframe>
                <div>
                    <p style="font-size: 24px; font-weight: 500;">
                        Description
                    </p>
                    lorem ipsum dolor sit amet
                </div>
            </div>
        </a>
    </div>
    <!-- <div style="display:flex; flex-direction: column; justify-content: center; align-items: center;">
        <div class="cards">
            <div class="card red">
                <p class="tip">Hover Me</p>
                <p class="second-text">Lorem Ipsum</p>
            </div>
            <div class="card blue">
                <p class="tip">Hover Me</p>
                <p class="second-text">Lorem Ipsum</p>
            </div>
            <div class="card green">
                <p class="tip">Hover Me</p>
                <p class="second-text">Lorem Ipsum</p>
            </div>
        </div>
    </div> -->

</body>

</html>