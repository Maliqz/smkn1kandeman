<?php

include "../config/koneksi.php";
include "../includes/header.php";
include "../includes/navbar.php";


// Mengambil seluruh berita
$query_berita = mysqli_query(
    $koneksi,
    "SELECT * FROM berita ORDER BY tanggal DESC"
);

?>

<main>

    <!-- HEADER HALAMAN -->

    <section class="page-header">

        <div class="container">

            <span>INFORMASI SEKOLAH</span>

            <h1>Berita Sekolah</h1>

            <p>
                Informasi dan berita terbaru
                SMK Negeri 1 Kandeman.
            </p>

        </div>

    </section>


    <!-- DAFTAR BERITA -->

    <section class="berita-page">

        <div class="container">

            <div class="berita-grid">

                <?php while ($berita = mysqli_fetch_assoc($query_berita)) : ?>

                    <article class="berita-card">

                        <div class="berita-image">

                            <?php if (!empty($berita['gambar'])) : ?>

                                <img
                                    src="<?php echo $base_url; ?>uploads/berita/<?php echo htmlspecialchars($berita['gambar']); ?>"
                                    alt="<?php echo htmlspecialchars($berita['judul']); ?>"
                                >

                            <?php else : ?>

                                <div class="no-image">
                                    Tidak ada gambar
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="berita-content">

                            <span class="berita-kategori">

                                <?php
                                echo htmlspecialchars(
                                    $berita['kategori']
                                );
                                ?>

                            </span>


                            <h3>

                                <?php
                                echo htmlspecialchars(
                                    $berita['judul']
                                );
                                ?>

                            </h3>


                            <p>

                                <?php

                                echo htmlspecialchars(
                                    substr(
                                        strip_tags($berita['isi']),
                                        0,
                                        150
                                    )
                                );

                                ?>...

                            </p>


                            <span class="berita-tanggal">

                                <?php
                                echo htmlspecialchars(
                                    $berita['tanggal']
                                );
                                ?>

                            </span>


                            <br><br>


                            <a
                                href="detail-berita.php?id=<?php echo $berita['id']; ?>"
                                class="btn-detail"
                            >
                                Baca Selengkapnya →
                            </a>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>

        </div>

    </section>

</main>


<?php

include "../includes/footer.php";

?>