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

    .contain {
        display: flex;
        justify-content: center;
        text-align: justify;
    }

    .texts {
        font-family: poppins;
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
        background-image: url("../../assets/gauze.jpeg");
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

    .container {}

    /* second box */
    .secondbox {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 80%;
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

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <div>
                        <img src="/internsight/assets/logo.png" class="logoimg">
                    </div>
                    <div>
                        <p1>InternSight</p1>
                        <!-- <p2>INFORMATION</p2> -->
                    </div>
                </div>
                <div class="navbutton">
                    <a href="/internsight/view/pelamar/dashboard.php"><button>Home</button></a>
                    <a href="/internsight/view/pelamar/internship.php"><button>Cari Internship</button></a>
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
                    <p>Cari tau,</p>
                    <div class="head2">
                        <img src="/internsight/assets/sparkle.png" class="sparkle">
                        <p> Apa itu InternSight </p>
                        <img src="/internsight/assets/sparkle.png" class="sparkle">
                    </div>
                    <div class="teamcontainer">
                        <!-- <div class="card1">
                            <button>Cari Kerja</button>
                        </div> -->
                        <img src="https://asaprentals.com.au/wp-content/uploads/2020/10/team.png" alt="" class="team">
                        <!-- <div class="card2">
                            <button>Cari Kerja</button> -->
                    </div>
                </span>
            </div>
            <div class="contain">
                <div class="secondbox">
                    <span>
                        <p>Apa Itu InternSight?</p>
                    </span>
                    <div class="texts">Internsight adalah sistem informasi penyedia berita recruitment dan internship/magang yang berbasis di Jember. Kami berdedikasi untuk membantu pencari kerja, terutama mahasiswa dan fresh graduate, untuk menemukan peluang magang dan pekerjaan yang sesuai dengan keahlian dan minat mereka. Dengan menyediakan informasi terkini tentang lowongan pekerjaan dan magang, serta tips dan trik bermanfaat, kami berusaha menjadi sumber informasi terpercaya di bidang ini.</div>
                    <span>
                        <p>Visi Kami</p>
                    </span>
                    <div class="texts">Menjadi platform terdepan di Jember yang menyediakan informasi terlengkap dan terbaru tentang lowongan pekerjaan dan magang, serta menjadi mitra yang dapat diandalkan oleh pencari kerja dan perusahaan.</div>
                    <span>
                        <p>Misi Kami</p>
                    </span>
                    <div class="texts">
                        1. Menyediakan berita terbaru dan akurat tentang lowongan pekerjaan dan magang di Jember.
                        2. Membantu pencari kerja dengan tips dan trik yang berguna selama proses pendaftaran hingga mendapatkan tawaran.
                        3. Membangun hubungan yang kuat dengan perusahaan untuk menyediakan peluang terbaik bagi pencari kerja.
                        4. Meningkatkan kesadaran akan pentingnya magang sebagai langkah awal karier.
                    </div>
                    <span>
                        <p>Apa yang Kami Tawarkan?</p>
                    </span>
                    <div class="texts">
                        Kami menawarkan berbagai layanan untuk membantu pencari kerja, termasuk:

                        Berita Recruitment Terbaru: Informasi terkini tentang lowongan pekerjaan dari berbagai perusahaan di Jember.
                        Kesempatan Internship/Magang: Daftar peluang magang untuk mahasiswa dan fresh graduate.
                        Tips & Trik: Artikel dan panduan yang memberikan saran praktis tentang cara membuat CV yang menarik, tips wawancara, strategi networking, dan lainnya.
                    </div>
                    <span>
                        <p>Mengapa Memilih Kami?</p>
                    </span>
                    <div class="texts">
                        Keandalan: Kami menyediakan informasi yang akurat dan terpercaya.
                        Ketersediaan Informasi Terbaru: Kami selalu memperbarui data kami dengan berita dan lowongan terbaru.
                        Tips & Trik Berharga: Kami menyediakan berbagai tips praktis untuk membantu pencari kerja sukses dalam proses pendaftaran hingga mendapatkan tawaran kerja.
                        Dukungan Lokal: Fokus kami adalah membantu komunitas lokal di Jember, dengan memahami kebutuhan dan tantangan yang spesifik di daerah ini.
                    </div>
                    <span>
                        <p>Tim Kami</p>
                    </span>
                    <div class="texts">
                        Tim kami terdiri dari profesional yang berdedikasi dalam bidang HR, penulis konten, dan pengembang teknologi. Bersama-sama, kami bekerja untuk memastikan bahwa setiap pencari kerja mendapatkan informasi yang mereka butuhkan untuk meraih kesuksesan karier. Berikut adalah beberapa anggota inti tim kami:
                    </div>
                    <div style="height: 1000px;">
                    </div>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="back">
                            <div class="back-content">
                                <svg stroke="#ffffff" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50px" width="50px" fill="#ffffff">

                                    <g stroke-width="0" id="SVGRepo_bgCarrier"></g>

                                    <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>

                                    <g id="SVGRepo_iconCarrier">

                                        <path d="M20.84375 0.03125C20.191406 0.0703125 19.652344 0.425781 19.21875 1.53125C18.988281 2.117188 18.5 3.558594 18.03125 4.9375C17.792969 5.636719 17.570313 6.273438 17.40625 6.75C17.390625 6.796875 17.414063 6.855469 17.40625 6.90625C17.398438 6.925781 17.351563 6.949219 17.34375 6.96875L17.25 7.25C18.566406 7.65625 19.539063 8.058594 19.625 8.09375C22.597656 9.21875 28.351563 11.847656 33.28125 16.78125C38.5 22 41.183594 28.265625 42.09375 30.71875C42.113281 30.761719 42.375 31.535156 42.75 32.84375C42.757813 32.839844 42.777344 32.847656 42.78125 32.84375C43.34375 32.664063 44.953125 32.09375 46.3125 31.625C47.109375 31.351563 47.808594 31.117188 48.15625 31C49.003906 30.714844 49.542969 30.292969 49.8125 29.6875C50.074219 29.109375 50.066406 28.429688 49.75 27.6875C49.605469 27.347656 49.441406 26.917969 49.25 26.4375C47.878906 23.007813 45.007813 15.882813 39.59375 10.46875C33.613281 4.484375 25.792969 1.210938 22.125 0.21875C21.648438 0.0898438 21.234375 0.0078125 20.84375 0.03125 Z M 16.46875 9.09375L0.0625 48.625C-0.09375 48.996094 -0.00390625 49.433594 0.28125 49.71875C0.472656 49.910156 0.738281 50 1 50C1.128906 50 1.253906 49.988281 1.375 49.9375L40.90625 33.59375C40.523438 32.242188 40.222656 31.449219 40.21875 31.4375C39.351563 29.089844 36.816406 23.128906 31.875 18.1875C27.035156 13.34375 21.167969 10.804688 18.875 9.9375C18.84375 9.925781 17.8125 9.5 16.46875 9.09375 Z M 17 16C19.761719 16 22 18.238281 22 21C22 23.761719 19.761719 26 17 26C15.140625 26 13.550781 24.972656 12.6875 23.46875L15.6875 16.1875C16.101563 16.074219 16.550781 16 17 16 Z M 31 22C32.65625 22 34 23.34375 34 25C34 25.917969 33.585938 26.730469 32.9375 27.28125L32.90625 27.28125C33.570313 27.996094 34 28.949219 34 30C34 32.210938 32.210938 34 30 34C27.789063 34 26 32.210938 26 30C26 28.359375 26.996094 26.960938 28.40625 26.34375L28.3125 26.3125C28.117188 25.917969 28 25.472656 28 25C28 23.34375 29.34375 22 31 22 Z M 21 32C23.210938 32 25 33.789063 25 36C25 36.855469 24.710938 37.660156 24.25 38.3125L20.3125 39.9375C18.429688 39.609375 17 37.976563 17 36C17 33.789063 18.789063 32 21 32 Z M 9 34C10.65625 34 12 35.34375 12 37C12 38.65625 10.65625 40 9 40C7.902344 40 6.960938 39.414063 6.4375 38.53125L8.25 34.09375C8.488281 34.03125 8.742188 34 9 34Z"></path>

                                    </g>

                                </svg>
                                <strong>Hover Me</strong>
                            </div>
                        </div>
                        <div class="front">

                            <div class="img">
                                <div class="circle">
                                </div>
                                <div class="circle" id="right">
                                </div>
                                <div class="circle" id="bottom">
                                </div>
                            </div>

                            <div class="front-content">
                                <small class="badge">Pasta</small>
                                <div class="description">
                                    <div class="title">
                                        <p class="title">
                                            <strong>Spaguetti Bolognese</strong>
                                        </p>
                                        <svg fill-rule="nonzero" height="15px" width="15px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                            <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997">
                                                <g transform="scale(8,8)">
                                                    <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="card-footer">
                                        30 Mins &nbsp; | &nbsp; 1 Serving
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>

</body>

</html>