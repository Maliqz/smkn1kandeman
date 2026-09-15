<?php

include "../config/koneksi.php";
include "../includes/header.php";
include "../includes/navbar.php";


// Mengambil data guru dari database
$query_guru = mysqli_query(
    $koneksi,
    "SELECT * FROM guru ORDER BY id ASC"
);

?>

<main>

    <section class="page-header">

        <div class="container">

            <span>AKADEMIK</span>

            <h1>Akademik</h1>

            <p>
                Informasi akademik dan tenaga pendidik
                SMK Negeri 1 Kandeman.
            </p>

        </div>

    </section>


    <!-- PROGRAM KEAHLIAN -->

    <section class="akademik-section">

        <div class="container">

            <div class="section-heading">

                <span>PROGRAM KEAHLIAN</span>

                <h2>Kompetensi Keahlian</h2>

            </div>


            <div class="program-grid">

                <div class="program-card">

                    <span>01</span>

                    <h3>
                        Rekayasa Perangkat Lunak
                    </h3>

                    <p>
                        Mempelajari pengembangan perangkat lunak,
                        website, aplikasi, database, dan teknologi
                        digital.
                    </p>

                </div>


                <div class="program-card">

                    <span>02</span>

                    <h3>
                        Program Keahlian Lainnya
                    </h3>

                    <p>
                        Informasi program keahlian dapat disesuaikan
                        dengan kompetensi keahlian yang tersedia
                        di sekolah.
                    </p>

                </div>


                <div class="program-card">

                    <span>03</span>

                    <h3>
                        Pembelajaran Berbasis Industri
                    </h3>

                    <p>
                        Pembelajaran diarahkan agar peserta didik
                        memiliki kompetensi yang sesuai dengan
                        kebutuhan dunia kerja.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- GURU -->

    <section class="guru-section">

        <div class="container">

            <div class="section-heading">

                <span>TENAGA PENDIDIK</span>

                <h2>Guru</h2>

            </div>


            <div class="guru-grid">

                <?php while ($guru = mysqli_fetch_assoc($query_guru)) : ?>

                    <div class="guru-card">

                        <div class="guru-avatar">
                            <?php
                            echo strtoupper(
                                substr($guru['nama'], 0, 1)
                            );
                            ?>
                        </div>

                        <div>

                            <h3>
                                <?php
                                echo htmlspecialchars(
                                    $guru['nama']
                                );
                                ?>
                            </h3>

                            <p>
                                <?php
                                echo htmlspecialchars(
                                    $guru['jabatan']
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