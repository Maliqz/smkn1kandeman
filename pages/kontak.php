<?php

include "../config/koneksi.php";
include "../includes/header.php";
include "../includes/navbar.php";

?>

<main>

    <section class="page-header">

        <div class="container">

            <span>HUBUNGI KAMI</span>

            <h1>Kontak Sekolah</h1>

            <p>
                Informasi kontak dan lokasi
                SMK Negeri 1 Kandeman.
            </p>

        </div>

    </section>


    <section class="kontak-section">

        <div class="container">

            <div class="kontak-grid">


                <!-- INFORMASI -->

                <div class="kontak-info">

                    <div class="section-heading">

                        <span>INFORMASI</span>

                        <h2>
                            Hubungi SMK Negeri 1 Kandeman
                        </h2>

                    </div>


                    <div class="kontak-item">

                        <strong>Alamat</strong>

                        <p>
                            Kandeman, Kabupaten Batang,
                            Jawa Tengah
                        </p>

                    </div>


                    <div class="kontak-item">

                        <strong>Email</strong>

                        <p>
                            info@smkn1kandeman.sch.id
                        </p>

                    </div>


                    <div class="kontak-item">

                        <strong>Telepon</strong>

                        <p>
                            (0285) XXXXXXX
                        </p>

                    </div>

                </div>


                <!-- FORM -->

                <div class="kontak-form">

                    <h2>
                        Kirim Pesan
                    </h2>

                    <form action="" method="POST">

                        <div class="form-group">

                            <label for="nama">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                placeholder="Masukkan nama"
                            >

                        </div>


                        <div class="form-group">

                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Masukkan email"
                            >

                        </div>


                        <div class="form-group">

                            <label for="pesan">
                                Pesan
                            </label>

                            <textarea
                                id="pesan"
                                name="pesan"
                                rows="6"
                                placeholder="Tulis pesan..."
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="btn-primary"
                        >
                            Kirim Pesan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</main>


<?php

include "../includes/footer.php";

?>