<?php

session_start();

include "../config/koneksi.php";


// ==========================================
// CEK LOGIN
// ==========================================

if (!isset($_SESSION['admin_id'])) {

    header("Location: login.php");

    exit;

}


// ==========================================
// DATA DASHBOARD
// ==========================================

function jumlahData($koneksi, $table)
{
    $result = mysqli_query(
        $koneksi,
        "SELECT COUNT(*) AS total FROM $table"
    );

    $data = mysqli_fetch_assoc($result);

    return $data['total'];
}


$total_berita = jumlahData($koneksi, "berita");
$total_guru = jumlahData($koneksi, "guru");
$total_siswa = jumlahData($koneksi, "siswa");
$total_galeri = jumlahData($koneksi, "galeri");

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Admin - SMKN 1 Kandeman</title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #f5f7f8;
            font-family: Arial, sans-serif;
            color: #222;
        }

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }


        /* SIDEBAR */

        .sidebar {
            width: 240px;
            padding: 25px 18px;
            background: #ffffff;
            border-right: 1px solid #e5e5e5;
        }

        .brand {
            padding: 10px;
            margin-bottom: 35px;
        }

        .brand span {
            display: block;
            margin-bottom: 5px;
            color: #1769aa;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .brand h2 {
            font-size: 18px;
        }

        .menu-title {
            padding: 0 10px;
            margin-bottom: 10px;
            color: #999;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 5px;
        }

        .menu a {
            display: block;
            padding: 12px 10px;
            border-radius: 7px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        .menu a:hover {
            background: #eef7f8;
            color: #1769aa;
        }

        .logout {
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }


        /* CONTENT */

        .content {
            flex: 1;
            padding: 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .topbar h1 {
            font-size: 30px;
        }

        .topbar p {
            margin-top: 6px;
            color: #777;
        }

        .admin-name {
            padding: 10px 15px;
            background: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 7px;
            font-size: 14px;
        }


        /* STATISTIK */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .stat-card {
            padding: 25px;
            background: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
        }

        .stat-card span {
            color: #777;
            font-size: 14px;
        }

        .stat-card h2 {
            margin-top: 10px;
            font-size: 32px;
        }


        /* WELCOME */

        .welcome {
            margin-top: 30px;
            padding: 30px;
            background: #eef7f8;
            border-radius: 10px;
        }

        .welcome h2 {
            margin-bottom: 10px;
        }

        .welcome p {
            color: #555;
            line-height: 1.7;
        }


        @media (max-width: 900px) {

            .sidebar {
                width: 200px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 600px) {

            .admin-layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e5e5e5;
            }

            .content {
                padding: 25px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                display: block;
            }

            .admin-name {
                display: inline-block;
                margin-top: 15px;
            }

        }

    </style>

</head>


<body>

<div class="admin-layout">


    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <span>ADMIN PANEL</span>

            <h2>
                SMKN 1 Kandeman
            </h2>

        </div>


        <div class="menu-title">
            MENU
        </div>


        <ul class="menu">

            <li>
                <a href="index.php">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="berita.php">
                    Berita
                </a>
            </li>

            <li>
                <a href="galeri.php">
                    Galeri
                </a>
            </li>

            <li>
                <a
                    href="../index.php"
                    target="_blank"
                >
                    Lihat Website
                </a>
            </li>

        </ul>


        <div class="logout">

            <ul class="menu">

                <li>
                    <a href="logout.php">
                        Logout
                    </a>
                </li>

            </ul>

        </div>

    </aside>


    <!-- CONTENT -->

    <main class="content">


        <div class="topbar">

            <div>

                <h1>
                    Dashboard
                </h1>

                <p>
                    Selamat datang di panel admin
                    SMKN 1 Kandeman.
                </p>

            </div>


            <div class="admin-name">

                👤

                <?php
                echo htmlspecialchars(
                    $_SESSION['admin_username']
                );
                ?>

            </div>

        </div>


        <!-- STATISTIK -->

        <div class="stats">


            <div class="stat-card">

                <span>
                    Total Berita
                </span>

                <h2>
                    <?php echo $total_berita; ?>
                </h2>

            </div>


            <div class="stat-card">

                <span>
                    Total Guru
                </span>

                <h2>
                    <?php echo $total_guru; ?>
                </h2>

            </div>


            <div class="stat-card">

                <span>
                    Total Siswa
                </span>

                <h2>
                    <?php echo $total_siswa; ?>
                </h2>

            </div>


            <div class="stat-card">

                <span>
                    Total Galeri
                </span>

                <h2>
                    <?php echo $total_galeri; ?>
                </h2>

            </div>


        </div>


        <div class="welcome">

            <h2>
                Selamat Datang 👋
            </h2>

            <p>
                Gunakan panel admin ini untuk
                mengelola informasi yang ditampilkan
                pada website SMK Negeri 1 Kandeman.
            </p>

        </div>


    </main>

</div>

</body>

</html>