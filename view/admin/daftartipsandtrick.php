<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../public/index.php");
    exit();
}
?>
<?php
include '../../controllers/tipsandtrick.php';
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
        background-repeat: no-repeat;
        background-size: cover;
        object-fit: cover;
    }

    .firstbox span {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 45px;
        width: 1500px;
        height: 100px;
    }

    /* .firstbox span p {
        color: #fff;
        font-family: "Space Grotesk", sans-serif;
        font-size: 50px;
        font-weight: 600;
    } */

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
    }

    /* second box */
    .secondbox {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        height: auto;
    }

    .secondbox span p {
        text-align: center;
        color: #000;
        font-family: "Space Grotesk", sans-serif;
        font-size: 40px;
        font-weight: 600;
        line-height: 90px;
        letter-spacing: -4px;
        margin-bottom: 35px;
    }

    iframe {
        pointer-events: none;
        border-radius: 10px;
    }

    .cardtips {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: 'poppins', sans-serif;
        background-color: #fff;
        padding: 10px;
        width: 380px;
        height: 450px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
        margin-bottom: 50px;
        margin-right: 90px;
        margin-left: 90px;

    }

    .cards {
        display: flex;
        flex-direction: row;
        font-family: 'poppins', sans-serif;
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        gap: 100px;
    }

    .cards-content {
        width: 330px;
    }

    .cards-content h2 {
        color: #000;
        font-weight: 600;
        font-size: 20px;
    }

    .cards-content p {
        font-size: 14px;
        text-align: justify;
        color: #000;
        display: -webkit-box;
        -webkit-line-clamp: 7;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cards-container {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
    }

    /* section{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    } */
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
            <div class="title-internship">
                <h2>Daftar Tips & Trick</h2>
            </div>
            <div class="firstbox">
                <span>
                    <div class="cards-container">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="cardtips">
                                    <a href="/internsight/view/admin/pagetipsandtrick.php?id=<?php echo $row["id_informasi"]; ?>">
                                        <iframe width="330" height="200px" src="<?php echo $row["video"]; ?>" frameborder="0" allowfullscreen></iframe>
                                        <div class="cards-content">
                                            <h2>
                                                <?php echo $row["judul_informasi"]; ?>
                                            </h2>
                                            <p>
                                                <?php echo $row["deskripsi_informasi"]; ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<p>Tidak ada berita tersedia.</p>";
                        }
                        ?>
                    </div>
                </span>
            </div>

        </section>
    </div>
</body>

</html>