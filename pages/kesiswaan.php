<?php

include "../config/koneksi.php";
include "../includes/header.php";
include "../includes/navbar.php";


// Ekstrakurikuler
$query_ekskul = mysqli_query(
    $koneksi,
    "SELECT * FROM ekstrakurikuler ORDER BY id ASC"
);


// Prestasi
$query_prestasi = mysqli_query(
    $koneksi,
    "SELECT * FROM prestasi ORDER BY id DESC"
);

?>

<main>

    <section class="page-header">

        <div class="container">

            <span>KESISWAAN</span>

            <h1>Kesiswaan</h1>

            <p>
                Informasi kegiatan, ekstrakurikuler,
                dan prestasi siswa.
            </p>

        </div>

    </section>


    <!-- EKSTRAKURIKULER -->

    <section class="kesiswaan-section">

        <div class="container">

            <div class="section-heading">

                <span>KEGIATAN SISWA</span>

                <h2>Ekstrakurikuler</h2>

            </div>


            <div class="ekskul-grid">

                <?php while ($ekskul = mysqli_fetch_assoc($query_ekskul)) : ?>

                    <div class="ekskul-card">

                        <div class="number">
                            <?php
                            echo str_pad(
                                $ekskul['id'],
                                2,
                                '0',
                                STR_PAD_LEFT
                            );
                            ?>
                        </div>


                        <h3>
                            <?php
                            echo htmlspecialchars(
                                $ekskul['nama']
                            );
                            ?>
                        </h3>


                        <p>
                            <?php
                            echo htmlspecialchars(
                                $ekskul['deskripsi']
                            );
                            ?>
                        </p>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </section>


    <!-- PRESTASI -->

    <section class="prestasi-section">

        <div class="container">

            <div class="section-heading">

                <span>PENCAPAIAN</span>

                <h2>Prestasi Siswa</h2>

            </div>


            <div class="prestasi-list">

                <?php while ($prestasi = mysqli_fetch_assoc($query_prestasi)) : ?>

                    <div class="prestasi-item">

                        <div class="prestasi-year">

                            <?php
                            echo htmlspecialchars(
                                $prestasi['tahun']
                            );
                            ?>

                        </div>


                        <div>

                            <h3>
                                <?php
                                echo htmlspecialchars(
                                    $prestasi['nama_prestasi']
                                );
                                ?>
                            </h3>

                            <p>
                                <?php
                                echo htmlspecialchars(
                                    $prestasi['tingkat']
                                );
                                ?>
                            </p>

                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </section>

</main>


<?php

include "../includes/footer.php";

?>