<?php
session_start();
if ($_SESSION['role'] != 'pelamar') {
    header("Location: ../public/index.php");
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
$id_berita = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data berita berdasarkan id_informasi
$sql = "SELECT b.id_berita, b.judul_berita, b.gambar_berita, b.tanggal_awal, b.tanggal_akhir, b.nama_internship, b.deskripsi_berita, b.id_kategori, b.id_perusahaan, k.kategori, p.nama_perusahaan 
        FROM berita b 
        JOIN kategori k ON b.id_kategori = k.id_kategori
        JOIN akun_perusahaan p ON b.id_perusahaan = p.id_perusahaan
        WHERE b.id_berita = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_berita);
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
        background-color: #f6f8fD;
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
        justify-content: center;
        width: auto;
        height: auto;
        border-radius: 30px 30px 0 0;
        padding-top: 50px;
        background-repeat: no-repeat;
        background-size: cover;
        object-fit: cover;
        margin-top: 60px;
        background-color: white;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
    }

    .content-berita {
        width: 800px;
        margin-right: 80px;
        height: 800px;
    }

    .nama-internship {
        margin-bottom: 20px;
        font-size: 20px;
        font-family: poppins;
    }

    .firstbox h1 {
        text-align: start;
        color: #000;
        font-family: 'poppins', sans-serif;
        font-size: 34px;
        font-weight: 700;
    }

    .firstbox p {
        text-align: justify;
        font-family: 'poppins', sans-serif;
        font-size: 16px;
        font-weight: 400;
    }

    .firstbox img {
        width: 500px;
        height: 300px;
        border-radius: 30px;
        margin-top: 15px;
    }

    /* second box */
    .secondbox {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 2200px;
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
<style>
    .action-button {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        /* margin-bottom: 20px; */
    }

    .edit button {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        background-color: #2A83FD;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 17px;
        padding: 16px;
        width: 120px;
        height: 40px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }

    .delete button {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        background-color: #FD2A6D;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 17px;
        padding: 16px;
        width: 120px;
        height: 40px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }

    button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    button span:after {
        content: '»';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -15px;
        transition: 0.5s;
    }

    button:hover span {
        padding-right: 15px;
    }

    button:hover span:after {
        opacity: 1;
        right: 0;
    }
</style>
<style>
    /* CSS untuk latar belakang gelap */
    .modal-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Opacity 50% */
        z-index: 9999;
        /* Pastikan lebih tinggi dari konten lain */
        display: none;
        justify-content: center;
        align-items: center;
    }

    /* CSS untuk modal */
    .modal {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    .modal h2 {
        font-weight: 500;
        margin-bottom: 40px;
        font-family: 'poppins', sans-serif;
    }

    .modal button {
        padding: 10px 20px;
        background-color: #2A83FD;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 0 10px;
    }

    .modal button.cancel {
        background-color: #FD2A6D;
    }
</style>
<style>
    button {
        margin-top: 20px;
  font-family: poppins;
  font-size: 20px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
  cursor: pointer;
}

button span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

button svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

button:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

button:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

button:hover span {
  transform: translateX(7em);
}

button:active {
  transform: scale(0.95);
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
  }
}

</style>

<body>
    <?php if ($result->num_rows > 0) {
        // Output data dari baris
        $row = $result->fetch_assoc(); ?>
        <div class="container">
            <nav>
                <div class="navbar">
                    <div class="logo">
                        <div>
                            <img src="../../../internsight/assets/logo.png" class="logoimg">
                        </div>
                        <a href="/internsight/view/pelamar/internship.php">
                            <div>
                                <p1>InternSight</p1>
                                <!-- <p2>INFORMATION</p2> -->
                            </div>
                        </a>
                    </div>
                    <a href="../public/logout.php">
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

                    <div class="content-berita">
                        <h1 style="color:#000"><?php echo $row["judul_berita"]; ?></h1>
                        <div class="nama-internship">(<?php echo $row["nama_internship"]; ?>)</div>
                        <p style="color:#000"><?php echo $row["deskripsi_berita"]; ?></p>
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <img src="../../assets/storage/<?php echo $row["gambar_berita"]; ?>" alt="">
                        <button onclick="sendEmail()">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                    </svg>
                                </div>
                            </div>
                            <span>Send Email</span>
                        </button>
                    </div>
                </div>

            </section>
        <?php } else {
        echo "No details found for this information.";
    } ?>

</body>
<script>
                            function sendEmail() {
                                window.location.href = "mailto:internsight@gmail.com?subject=Subjek%20Email&body=Isi%20pesan%20anda%20disini";
                            }
                        </script>
</html>