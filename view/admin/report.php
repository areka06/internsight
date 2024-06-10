<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../public/index.php");
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

    <!-- chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        margin-top: 0px;
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

    .firstbox-title {
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
        line-height: 20px;
        color: black;
        height: 120px;
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
        flex-direction: column;
        flex-wrap: wrap;
        gap: 10px;
        width: 90%;
        height: auto;
    }

    .graph {
        text-align: center;
        display: flex;
        flex-direction: column;
        height: 500px;
        width: 100%;
        margin-bottom: 100px;
    }

    .graph h2 {
        font-family: poppins;
    }
</style>
<style>
    .Btn {
        position: relative;
        bottom: 40px;
        left: 550px;
        width: 50px;
        height: 50px;
        border: none;
        border-radius: 50%;
        background-color: rgb(27, 27, 27);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        transition-duration: .3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.11);
    }

    .svgIcon {
        fill: rgb(214, 178, 255);
    }

    .icon2 {
        width: 18px;
        height: 5px;
        border-bottom: 2px solid rgb(182, 143, 255);
        border-left: 2px solid rgb(182, 143, 255);
        border-right: 2px solid rgb(182, 143, 255);
    }

    .tooltip {
        position: absolute;
        right: -105px;
        opacity: 0;
        background-color: rgb(12, 12, 12);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition-duration: .2s;
        pointer-events: none;
        letter-spacing: 0.5px;
    }

    .tooltip::before {
        position: absolute;
        content: "";
        width: 10px;
        height: 10px;
        background-color: rgb(12, 12, 12);
        background-size: 1000%;
        background-position: center;
        transform: rotate(45deg);
        left: -5%;
        transition-duration: .3s;
    }

    .Btn:hover .tooltip {
        opacity: 1;
        transition-duration: .3s;
    }

    .Btn:hover {
        background-color: rgb(150, 94, 255);
        transition-duration: .3s;
    }

    .Btn:hover .icon2 {
        border-bottom: 2px solid rgb(235, 235, 235);
        border-left: 2px solid rgb(235, 235, 235);
        border-right: 2px solid rgb(235, 235, 235);
    }

    .Btn:hover .svgIcon {
        fill: rgb(255, 255, 255);
        animation: slide-in-top 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    @keyframes slide-in-top {
        0% {
            transform: translateY(-10px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
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
                    <a href="/internsight/view/admin/dashboard.php"><button>Home</button></a>
                    <a href="/internsight/view/admin/internship.php"><button>Daftar Internship</button></a>
                    <a href="/internsight/view/admin/daftartipsandtrick.php"><button>Daftar Tips and Trick</button></a>
                    <a href="/internsight/view/admin/daftarpelamar.php"><button>Daftar Pelamar</button></a>
                    <a href="/internsight/view/admin/daftarperusahaan.php"><button>Daftar Perusahaan</button></a>
                    <a href="/internsight/view/admin/report.php"><button>Report</button></a>
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
                <div class="wrapper">
                    <div class="left-col">
                        <div class="graph">
                            <div>
                                <h2>
                                    Statistik Jumlah Lowongan Internship Berdasarkan Kategori
                                </h2>
                            </div>
                            <canvas id="kategoriChart" width="200" height="200"></canvas>
                            <script>
                                fetch('../../controllers/kategorireport.php')
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok ' + response.statusText);
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log('Data fetched:', data); // Debugging output
                                        if (data.error) {
                                            console.error('Data error:', data.error);
                                            return;
                                        }

                                        const labels = data.map(row => 'Kategori ' + row.kategori);
                                        const countData = data.map(row => row.count);

                                        const ctx = document.getElementById('kategoriChart').getContext('2d');
                                        const kategoriChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Jumlah Berita',
                                                    data: countData,
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                maintainAspectRatio: false
                                            }
                                        });
                                    })
                                    .catch(error => console.error('Error fetching data:', error));
                            </script>
                        </div>
                        <!-- <div class="graph">
                            <div>
                                <h2>
                                    Jumlah Segmentasi Kategori Berita
                                </h2>
                            </div>
                            <canvas id="pelamarChart" width="200" height="200"></canvas>
                            <script>
                                fetch('../../controllers/pelamarreport.php')
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok ' + response.statusText);
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log('Data fetched:', data); // Debugging output
                                        if (data.error) {
                                            console.error('Data error:', data.error);
                                            return;
                                        }

                                        const labels = data.map(row => 'Pelamar ' + row.id_pelamar);
                                        const countData = data.map(row => row.count);

                                        const ctx = document.getElementById('pelamarChart').getContext('2d');
                                        const pelamarChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Jumlah Akun Pelamar',
                                                    data: countData,
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true, // Mengaktifkan responsif
                                                maintainAspectRatio: false // Menonaktifkan pemeliharaan rasio aspek
                                            }
                                        });
                                    })
                                    .catch(error => console.error('Error fetching data:', error));
                            </script>
                        </div> -->
                        <div class="graph">
                            <div>
                                <h2>
                                    Statistik Jumlah Lowongan Internship Yang Dibuat Oleh Setiap Perusahaan
                                </h2>
                            </div>
                            <canvas id="companyNewsChart" width="200" height="200"></canvas>
                            <script>
                                fetch('../../controllers/perusahaanreport.php')
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok ' + response.statusText);
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log('Data fetched:', data); // Debugging output
                                        if (data.error) {
                                            console.error('Data error:', data.error);
                                            return;
                                        }

                                        const labels = data.map(row => row.nama_perusahaan);
                                        const countData = data.map(row => row.jumlah_berita);

                                        const ctx = document.getElementById('companyNewsChart').getContext('2d');
                                        const companyNewsChart = new Chart(ctx, {
                                            type: 'bar', // Menggunakan bar chart untuk menampilkan data
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Jumlah Berita',
                                                    data: countData,
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true, // Mengaktifkan responsif
                                                maintainAspectRatio: false, // Menonaktifkan pemeliharaan rasio aspek
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    })
                                    .catch(error => console.error('Error fetching data:', error));
                            </script>
                        </div>
                    </div>
                </div>
                <!-- <span>
                </span> -->
            </div>
            <button class="Btn" onclick="window.location.href='/internsight/view/admin/printreport.php'">
                <svg class="svgIcon" viewBox="0 0 384 512" height="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path>
                </svg>
                <span class="icon2"></span>
                <span class="tooltip">Download</span>
            </button>

        </section>
    </div>
</body>

</html>