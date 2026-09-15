<?php

include "../config/koneksi.php";


// ==========================================
// CEK ID BERITA
// ==========================================

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    header("Location: berita.php");
    exit;

}


$id = (int) $_GET['id'];


// ==========================================
// MENGAMBIL DATA BERITA
// ==========================================

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM berita WHERE id = $id"
);


// ==========================================
// CEK APAKAH BERITA ADA
// ==========================================

if (mysqli_num_rows($query) == 0) {

    echo "Berita tidak ditemukan.";
    exit;

}


$berita = mysqli_fetch_assoc($query);


// ==========================================
// HEADER & NAVBAR
// ==========================================

include "../includes/header.php";
include "../includes/navbar.php";

?>

<main>

    <section class="detail-berita">

        <div class="container">

            <a
                href="berita.php"
                class="back-link"
            >
                ← Kembali ke Berita
            </a>


            <div class="detail-header">

                <span class="berita-kategori">

                    <?php
                    echo htmlspecialchars(
                        $berita['kategori']
                    );
                    ?>

                </span>


                <h1>

                    <?php
                    echo htmlspecialchars(
                        $berita['judul']
                    );
                    ?>

                </h1>


                <div class="detail-date">

                    Dipublikasikan pada
                    <?php
                    echo htmlspecialchars(
                        $berita['tanggal']
                    );
                    ?>

                </div>

            </div>


            <?php if (!empty($berita['gambar'])) : ?>

                <div class="detail-image">

                    <img
                        src="<?php echo $base_url; ?>uploads/berita/<?php echo htmlspecialchars($berita['gambar']); ?>"
                        alt="<?php echo htmlspecialchars($berita['judul']); ?>"
                    >

                </div>

            <?php endif; ?>


            <article class="detail-content">

                <?php
                echo nl2br(
                    htmlspecialchars(
                        $berita['isi']
                    )
                );
                ?>

            </article>

        </div>

    </section>

</main>


<?php

include "../includes/footer.php";

?>