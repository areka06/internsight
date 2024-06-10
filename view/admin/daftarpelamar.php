<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: /internsight/view/login.php");
    exit();
}
?>
<?php
include '../../controllers/pelamar.php';
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
        justify-content: center;
        width: 1150px;
        height: 99%;
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
        margin-top: 25px;
        width: 1500px;
        height: 500px;
    }

    .firstbox span p {
        color: #fff;
        font-family: "Space Grotesk", sans-serif;
        font-size: 50px;
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
        width: 50px;
        height: 50px;
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

    .title-internship h2 {
        font-size: 40px;
        text-align: center;
        font-family: poppins;
        margin-top: 30px;
        color: white;
    }
</style>
<style>
    /* Board*/
    .board {
        width: 94%;
        margin: 30px 0 30px 0;
        overflow: auto;
        /* background: #fff0f0; */
        border-radius: 8px;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
    }

    table {
        font-family: 'poppins', sans-serif;
        border-collapse: collapse;
    }

    thead td {
        font-size: 18px;
        font-weight: 600;
        text-align: start;
        padding: 20px;
        background-color: #084cdf;
        color: #fff;
    }

    thead tr td {
        background-color: #2A83FD;
        padding: 20px 20px;
        text-align: center;
    }

    tbody tr {
        box-shadow: #000000;
    }

    tbody tr td {
        background-color: #fff;

        padding: 20px 20px;
        text-align: center;
    }

    .view {
        font-weight: 500;
    }

    .add {
        background-color: #ffffff;
        border-radius: 14px;
        width: 100px;
        height: 30px;
        border-color: transparent;

    }

    .edit {
        font-weight: 500;
    }

    .delete {
        font-weight: 500;
    }

    /* Board*/
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
                <span>
                    <div class="title-internship">
                        <h2>Daftar Internship</h2>
                    </div>
                    <div class="board">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>ID Pelamar</td>
                                    <td>Nama Pelamar</td>
                                    <td>Email Pelamar</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $row["id_pelamar"]; ?></td>
                                            <td><?php echo $row["nama_pelamar"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p>Tidak ada berita tersedia.</p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </span>
            </div>

        </section>
    </div>
</body>

</html>