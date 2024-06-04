<?php
session_start();
if ($_SESSION['role'] !== 'pelamar') {
    $_SESSION['error'] = 'You must be logged in as "applicant" to access this page.';
    header('Location: /internsight/view/login.php');
    exit();
}

?>
<?php
include '../../config/db.php';

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan id_informasi dari URL
$id_informasi = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data berita berdasarkan id_informasi
$sql = "SELECT b.id_informasi, b.video, b.judul_informasi, b.deskripsi_informasi
        FROM informasi b
        WHERE b.id_informasi = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_informasi);
$stmt->execute();
$result = $stmt->get_result();

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
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


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

    .container {}

    .container section {
        display: flex;
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
        margin-top: 20px;
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
        flex-direction: column;
        align-items: center;
        margin-top: 150px;
        margin-left: 50px;
        width: 400px;
        height: 600px;
        background-color: white;
        border-radius: 30px 30px 0 0;
        position: fixed;
        z-index: 999;
        top: 0px;
    }

    .backbox {
        display: flex;
        justify-content: center;
        margin-top: 180px;
        width: 800px;
        height: 550px;
        border-radius: 30px 30px 0 0;
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

    .firstbox-component {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 90%;
        height: 80px;
        background-color: #E5E9F2;
        margin-top: 30px;
        border-radius: 20px;
        transition: background-color 0.5s ease-in-out;
    }
    /* .firstbox-component:hover{
        background-color: #34364A;
        color: white;
        transition: background-color 0.5s ease-in-out;
    } */
    .firstbox-component h2 {
        margin-left: 30px;
        font-family: 'poppins', sans-serif;
        font-size: 18px;
        font-weight: 600;
        color: #34364A;
    }

    .firstbox-component p {
        margin-left: 30px;
        font-family: 'poppins', sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: #34364A;
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
        gap: 100px;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 700px;
    }

    .iframe-container {
        width: 900px;
        height: 1000px;
    }
    .iframe-container h2 {
        margin-top: 10px;
        font-family: 'poppins', sans-serif;
        font-size: 24px;
        font-weight: 600;
    }
    .iframe-container p {
        margin-top: 10px;
        font-family: 'poppins', sans-serif;
        font-size: 16px;
        font-weight: 400;
    }

    iframe {
        margin-top: 50px;
        margin-right: 80px;
        border-radius: 20px;
    }

    .thirdbox {
        /* height: 2000px; */
    }
</style>

<body id="video">
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <div>
                        <img src="/internsight/assets/logo.png" class="logoimg">
                    </div>
                    <a href="/internsight/view/pelamar/tipsandtrick.php">
                        <div style="display: flex; color:#ffffff; align-items:center;">
                            <i class='bx bx-md bx-left-arrow-alt'></i>
                            <p1>Back</p1>
                            <!-- <p2>INFORMATION</p2> -->
                        </div>
                    </a>
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
                <div class="firstbox-component">
                    <a href="#video">
                        <h2>Video</h2>
                        <p>Start Your Video</p>
                    </a>
                </div>
                <div class="firstbox-component">
                    <a href="#description">
                        <h2>Description</h2>
                        <p>Read the The Description</p>
                    </a>
                </div>
            </div>
            <div class="backbox">
            </div>
            <?php if ($result->num_rows > 0) {
                // Output data dari baris
                $row = $result->fetch_assoc(); ?>
                <div class="secondbox">
                    <div class="iframe-container">
                        <iframe class="iframe" width="95%" height="73%" src="<?php echo $row["video"]; ?>&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                        <h2 id="description"><?php echo $row["judul_informasi"]; ?></h2>
                        <p id="description"><?php echo $row["deskripsi_informasi"]; ?></p>
                    </div>
                </div>
            <?php } else {
                echo "No details found for this information.";
            } ?>
            <div class="thirdbox">
            </div>
        </section>
    </div>

</html>