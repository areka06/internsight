<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <!-- tailwind -->
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        a {
            text-decoration: none;
        }

        body {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            background-color: bonewhite;
        }

        main {
            position: relative;
            z-index: 10;
            margin-top: 70px;
            padding: 15px;
            background-color: white;
            width: 75%;
            height: 80vh;
            border-radius: 20px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            display: flex;
        }

        .image {
            height: 100%;
            width: 50%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .image .main-profil {
            left: 10%;
            top: 230px;
            position: absolute;
            width: 30%;
            height: 60%;
            border-radius: 20px;
        }

        .image .main-bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
        }

        .login {
            font-family: 'poppins', sans-serif;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0px;
        }

        .login h1 {
            margin-top: -30px;
            font-size: 30px;
        }

        video {
            position: absolute;
            width: 100%;
            height: 50em;
            object-fit: cover;
            filter: blur(10px);
            opacity: 70%;
        }
    </style>
    <style>
        .card1 {
            width: 300px;
            height: 400px;
            border-radius: 20px;
            background: white;
            position: relative;
            padding: 1.8rem;
            border: 2px solid #c3c6ce;
            transition: 0.5s ease-out;
            overflow: visible;
            margin-right: 50px;
        }

        .card2 {
            width: 300px;
            height: 400px;
            border-radius: 20px;
            background: white;
            position: relative;
            padding: 1.8rem;
            border: 2px solid #c3c6ce;
            transition: 0.5s ease-out;
            overflow: visible;
        }

        .card-details {
            color: black;
            height: 100%;
            gap: .5em;
            display: grid;
            place-content: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-button {
            transform: translate(-50%, 125%);
            width: 60%;
            border-radius: 1rem;
            border: none;
            background-color: #008bf8;
            color: #fff;
            font-size: 1rem;
            padding: .5rem 1rem;
            position: absolute;
            left: 50%;
            bottom: 0;
            opacity: 0;
            transition: 0.3s ease-out;
        }

        .text-body {
            color: rgb(134, 134, 134);
        }

        /*Text*/
        .text-title {
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
        }

        /*Hover*/
        .card1:hover {
            border-color: #008bf8;
            box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
        }

        .card1:hover .card-button {
            transform: translate(-50%, 50%);
            opacity: 1;
        }

        /*Hover*/
        .card2:hover {
            border-color: #008bf8;
            box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
        }

        .card2:hover .card-button {
            transform: translate(-50%, 50%);
            opacity: 1;
        }
    </style>
</head>

<body>
    <header></header>
    <!-- <video id="myVideo" src="https://static.videezy.com/system/resources/previews/000/052/424/original/4K-33.mp4" autoplay loop muted></video> -->
    <main>
        <section class="login">
            <h1>Register as</h1>
            <div class="flex-row"></div>
            <div style="display: flex; justify-content:center; align-items:center;">
                <a href="../view/pelamar/register.php">
                    <div class="card1">
                        <div class="card-details">
                            <i class='bx bxs-briefcase bx-lg'></i>
                            <p class="text-title">Interns</p>
                            <p class="text-body">Register as a interns</p>
                        </div>
                        <button class="card-button">Register</button>
                    </div>
                </a>
                <a href="../view/perusahaan/register.php">
                    <div class="card2">
                        <div class="card-details">
                            <i class='bx bxs-buildings bx-lg'></i>
                            <p class="text-title">Company</p>
                            <p class="text-body">Register your company</p>
                        </div>
                        <button class="card-button">Register</button>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <footer></footer>
</body>

</html>