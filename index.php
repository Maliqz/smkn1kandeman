<?php

include "config/koneksi.php";
include "includes/header.php";
include "includes/navbar.php";


// ==========================================
// MENGAMBIL 3 BERITA TERBARU
// ==========================================

$query_berita = mysqli_query(
    $koneksi,
    "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3"
);


// ==========================================
// MENGAMBIL 3 PENGUMUMAN TERBARU
// ==========================================

$query_pengumuman = mysqli_query(
    $koneksi,
    "SELECT * FROM pengumuman ORDER BY tanggal DESC LIMIT 3"
);


// ==========================================
// MENGAMBIL 3 AGENDA TERDEKAT
// ==========================================

$query_agenda = mysqli_query(
    $koneksi,
    "SELECT * FROM agenda ORDER BY tanggal ASC LIMIT 3"
);

?>

<main>

    <!-- =====================================
         HERO
    ====================================== -->

    <section class="hero">
        <div class="container">

            <span class="hero-label">
                SMK NEGERI 1 KANDEMAN
            </span>

            <h1>
                Membangun Generasi
                <br>
                Kompeten & Berkarakter
            </h1>

            <p>
                Mewujudkan pendidikan kejuruan yang
                kompeten, berkarakter, dan siap menghadapi
                dunia kerja.
            </p>

            <a href="pages/profil.php" class="btn-primary">
                Kenali Sekolah →
            </a>

        </div>
    </section>


    <!-- =====================================
         SAMBUTAN
    ====================================== -->

    <section class="sambutan">
        <div class="container">

            <div class="section-heading">
                <span>TENTANG SEKOLAH</span>
                <h2>Selamat Datang di SMK Negeri 1 Kandeman</h2>
            </div>

            <div class="sambutan-content">

                <div>
                    <p>
                        SMK Negeri 1 Kandeman merupakan sekolah
                        menengah kejuruan yang berkomitmen dalam
                        mengembangkan kompetensi dan karakter peserta didik.
                    </p>

                    <p>
                        Website ini menjadi media informasi mengenai
                        kegiatan, berita, akademik, kesiswaan, dan
                        berbagai informasi sekolah.
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- =====================================
         STATISTIK
    ====================================== -->

    <section class="statistik">
        <div class="container">

            <div class="statistik-grid">

                <div class="statistik-item">
                    <strong>
                        <?php
                        $jumlah_siswa = mysqli_query(
                            $koneksi,
                            "SELECT COUNT(*) AS total FROM siswa"
                        );

                        $data_siswa = mysqli_fetch_assoc($jumlah_siswa);

                        echo $data_siswa['total'];
                        ?>
                    </strong>

                    <span>Data Siswa</span>
                </div>


                <div class="statistik-item">
                    <strong>
                        <?php
                        $jumlah_guru = mysqli_query(
                            $koneksi,
                            "SELECT COUNT(*) AS total FROM guru"
                        );

                        $data_guru = mysqli_fetch_assoc($jumlah_guru);

                        echo $data_guru['total'];
                        ?>
                    </strong>

                    <span>Data Guru</span>
                </div>


                <div class="statistik-item">
                    <strong>
                        <?php
                        $jumlah_ekskul = mysqli_query(
                            $koneksi,
                            "SELECT COUNT(*) AS total FROM ekstrakurikuler"
                        );

                        $data_ekskul = mysqli_fetch_assoc($jumlah_ekskul);

                        echo $data_ekskul['total'];
                        ?>
                    </strong>

                    <span>Ekstrakurikuler</span>
                </div>


                <div class="statistik-item">
                    <strong>
                        <?php
                        $jumlah_prestasi = mysqli_query(
                            $koneksi,
                            "SELECT COUNT(*) AS total FROM prestasi"
                        );

                        $data_prestasi = mysqli_fetch_assoc($jumlah_prestasi);

                        echo $data_prestasi['total'];
                        ?>
                    </strong>

                    <span>Prestasi</span>
                </div>

            </div>

        </div>
    </section>


    <!-- =====================================
         BERITA TERBARU
    ====================================== -->

    <section class="berita-section">
        <div class="container">

            <div class="section-heading">
                <span>INFORMASI</span>
                <h2>Berita Terbaru</h2>
            </div>


            <div class="berita-grid">

                <?php while ($berita = mysqli_fetch_assoc($query_berita)) : ?>

                    <article class="berita-card">

                        <div class="berita-image">
                            <img
                                src="uploads/berita/<?php echo htmlspecialchars($berita['gambar']); ?>"
                                alt="<?php echo htmlspecialchars($berita['judul']); ?>"
                            >
                        </div>

                        <div class="berita-content">

                            <span class="berita-kategori">
                                <?php echo htmlspecialchars($berita['kategori']); ?>
                            </span>

                            <h3>
                                <?php echo htmlspecialchars($berita['judul']); ?>
                            </h3>

                            <p>
                                <?php
                                echo htmlspecialchars(
                                    substr(strip_tags($berita['isi']), 0, 120)
                                );
                                ?>...
                            </p>

                            <span class="berita-tanggal">
                                <?php echo htmlspecialchars($berita['tanggal']); ?>
                            </span>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>

        </div>
    </section>


    <!-- =====================================
         PENGUMUMAN
    ====================================== -->

    <section class="pengumuman-section">
        <div class="container">

            <div class="section-heading">
                <span>INFORMASI SEKOLAH</span>
                <h2>Pengumuman</h2>
            </div>


            <div class="pengumuman-list">

                <?php while ($pengumuman = mysqli_fetch_assoc($query_pengumuman)) : ?>

                    <article class="pengumuman-item">

                        <div class="pengumuman-date">
                            <?php echo date(
                                'd',
                                strtotime($pengumuman['tanggal'])
                            ); ?>
                        </div>

                        <div class="pengumuman-content">

                            <span>
                                <?php echo htmlspecialchars($pengumuman['tanggal']); ?>
                            </span>

                            <h3>
                                <?php echo htmlspecialchars($pengumuman['judul']); ?>
                            </h3>

                            <p>
                                <?php
                                echo htmlspecialchars(
                                    substr(strip_tags($pengumuman['isi']), 0, 150)
                                );
                                ?>...
                            </p>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>

        </div>
    </section>


    <!-- =====================================
         AGENDA
    ====================================== -->

    <section class="agenda-section">
        <div class="container">

            <div class="section-heading">
                <span>KEGIATAN</span>
                <h2>Agenda Sekolah</h2>
            </div>


            <div class="agenda-grid">

                <?php while ($agenda = mysqli_fetch_assoc($query_agenda)) : ?>

                    <article class="agenda-card">

                        <div class="agenda-date">

                            <strong>
                                <?php
                                echo date(
                                    'd',
                                    strtotime($agenda['tanggal'])
                                );
                                ?>
                            </strong>

                            <span>
                                <?php
                                echo date(
                                    'M',
                                    strtotime($agenda['tanggal'])
                                );
                                ?>
                            </span>

                        </div>


                        <div class="agenda-content">

                            <h3>
                                <?php echo htmlspecialchars($agenda['nama_kegiatan']); ?>
                            </h3>

                            <p>
                                <?php echo htmlspecialchars($agenda['lokasi']); ?>
                            </p>

                            <small>
                                <?php echo htmlspecialchars($agenda['waktu']); ?>
                            </small>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>

        </div>
    </section>

</main>


<?php

include "includes/footer.php";

?>