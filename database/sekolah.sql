CREATE DATABASE IF NOT EXISTS smk_kandeman;

USE smk_kandeman;


-- ==========================================
-- TABEL ADMIN
-- ==========================================

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


-- ==========================================
-- TABEL GURU
-- ==========================================

CREATE TABLE guru (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nip VARCHAR(30),
    jabatan VARCHAR(100),
    foto VARCHAR(255)
);


-- ==========================================
-- TABEL SISWA
-- ==========================================

CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(30),
    jurusan VARCHAR(100)
);


-- ==========================================
-- TABEL BERITA
-- ==========================================

CREATE TABLE berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200) NOT NULL,
    isi TEXT NOT NULL,
    gambar VARCHAR(255),
    tanggal DATE NOT NULL,
    kategori VARCHAR(100) NOT NULL
);


-- ==========================================
-- TABEL PENGUMUMAN
-- ==========================================

CREATE TABLE pengumuman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200) NOT NULL,
    isi TEXT NOT NULL,
    tanggal DATE NOT NULL
);


-- ==========================================
-- TABEL AGENDA
-- ==========================================

CREATE TABLE agenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kegiatan VARCHAR(200) NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME,
    lokasi VARCHAR(150),
    keterangan TEXT
);


-- ==========================================
-- TABEL GALERI
-- ==========================================

CREATE TABLE galeri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200) NOT NULL,
    gambar VARCHAR(255) NOT NULL,
    keterangan TEXT,
    tanggal DATE NOT NULL
);


-- ==========================================
-- TABEL EKSTRAKURIKULER
-- ==========================================

CREATE TABLE ekstrakurikuler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    jadwal VARCHAR(100),
    pembina VARCHAR(100),
    gambar VARCHAR(255)
);


-- ==========================================
-- TABEL PRESTASI
-- ==========================================

CREATE TABLE prestasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_prestasi VARCHAR(200) NOT NULL,
    tingkat VARCHAR(100),
    tahun YEAR,
    keterangan TEXT,
    gambar VARCHAR(255)
);


-- ==========================================
-- TABEL FASILITAS
-- ==========================================

CREATE TABLE fasilitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255)
);


-- ==========================================
-- DATA DUMMY ADMIN
-- ==========================================

INSERT INTO admin (nama, username, password) VALUES
(
    'Administrator',
    'admin',
    'admin123'
);


-- ==========================================
-- DATA DUMMY GURU
-- ==========================================

INSERT INTO guru (nama, nip, jabatan, foto) VALUES
(
    'Budi Santoso',
    'DUMMY001',
    'Guru',
    'guru-1.jpg'
),
(
    'Siti Aminah',
    'DUMMY002',
    'Guru',
    'guru-2.jpg'
),
(
    'Andi Pratama',
    'DUMMY003',
    'Guru',
    'guru-3.jpg'
);


-- ==========================================
-- DATA DUMMY SISWA
-- ==========================================

INSERT INTO siswa (nama, kelas, jurusan) VALUES
(
    'Ahmad Fauzan',
    'XII',
    'Rekayasa Perangkat Lunak'
),
(
    'Dinda Putri',
    'XI',
    'Rekayasa Perangkat Lunak'
),
(
    'Rizky Maulana',
    'X',
    'Rekayasa Perangkat Lunak'
);


-- ==========================================
-- DATA DUMMY BERITA
-- ==========================================

INSERT INTO berita (judul, isi, gambar, tanggal, kategori) VALUES
(
    'Kegiatan Sekolah',
    'Kegiatan sekolah sebagai bagian dari aktivitas pembelajaran dan pengembangan siswa.',
    'berita-1.jpg',
    '2026-09-01',
    'Kegiatan'
),
(
    'Prestasi Siswa',
    'Siswa berhasil mengikuti kegiatan perlombaan dan membawa nama baik sekolah.',
    'berita-2.jpg',
    '2026-09-05',
    'Prestasi'
),
(
    'Kegiatan Pembelajaran',
    'Kegiatan pembelajaran berlangsung dengan berbagai aktivitas di lingkungan sekolah.',
    'berita-3.jpg',
    '2026-09-10',
    'Akademik'
);


-- ==========================================
-- DATA DUMMY PENGUMUMAN
-- ==========================================

INSERT INTO pengumuman (judul, isi, tanggal) VALUES
(
    'Pengumuman Kegiatan Sekolah',
    'Akan dilaksanakan kegiatan sekolah sesuai jadwal yang telah ditentukan.',
    '2026-09-03'
),
(
    'Pengumuman Akademik',
    'Siswa diharapkan memperhatikan informasi akademik yang disampaikan sekolah.',
    '2026-09-08'
);


-- ==========================================
-- DATA DUMMY AGENDA
-- ==========================================

INSERT INTO agenda (nama_kegiatan, tanggal, waktu, lokasi, keterangan) VALUES
(
    'Upacara Bendera',
    '2026-09-15',
    '07:00:00',
    'Lapangan Sekolah',
    'Kegiatan rutin sekolah.'
),
(
    'Rapat Organisasi Siswa',
    '2026-09-18',
    '13:00:00',
    'Ruang Organisasi',
    'Rapat kegiatan siswa.'
);


-- ==========================================
-- DATA DUMMY GALERI
-- ==========================================

INSERT INTO galeri (judul, gambar, keterangan, tanggal) VALUES
(
    'Kegiatan Sekolah',
    'galeri-1.jpg',
    'Dokumentasi kegiatan sekolah.',
    '2026-09-01'
),
(
    'Kegiatan Siswa',
    'galeri-2.jpg',
    'Dokumentasi kegiatan siswa.',
    '2026-09-06'
),
(
    'Kegiatan Pembelajaran',
    'galeri-3.jpg',
    'Dokumentasi kegiatan pembelajaran.',
    '2026-09-09'
);


-- ==========================================
-- DATA DUMMY EKSTRAKURIKULER
-- ==========================================

INSERT INTO ekstrakurikuler
(nama, deskripsi, jadwal, pembina, gambar) VALUES
(
    'Pramuka',
    'Kegiatan untuk mengembangkan kedisiplinan, kemandirian, dan kerja sama siswa.',
    'Jumat',
    'Pembina Pramuka',
    'pramuka.jpg'
),
(
    'Paskibra',
    'Kegiatan yang berfokus pada kedisiplinan dan keterampilan baris-berbaris.',
    'Sabtu',
    'Pembina Paskibra',
    'paskibra.jpg'
),
(
    'Olahraga',
    'Kegiatan olahraga untuk meningkatkan kebugaran dan sportivitas siswa.',
    'Rabu',
    'Pembina Olahraga',
    'olahraga.jpg'
);


-- ==========================================
-- DATA DUMMY PRESTASI
-- ==========================================

INSERT INTO prestasi
(nama_prestasi, tingkat, tahun, keterangan, gambar) VALUES
(
    'Juara Lomba Siswa',
    'Kabupaten',
    2026,
    'Data dummy untuk kebutuhan demonstrasi website.',
    'prestasi-1.jpg'
),
(
    'Juara Kompetisi Sekolah',
    'Kabupaten',
    2026,
    'Data dummy untuk kebutuhan demonstrasi website.',
    'prestasi-2.jpg'
);


-- ==========================================
-- DATA DUMMY FASILITAS
-- ==========================================

INSERT INTO fasilitas (nama, deskripsi, gambar) VALUES
(
    'Laboratorium Komputer',
    'Ruangan yang digunakan untuk kegiatan praktik komputer.',
    'lab-komputer.jpg'
),
(
    'Perpustakaan',
    'Fasilitas untuk membaca dan mencari sumber belajar.',
    'perpustakaan.jpg'
),
(
    'Lapangan Sekolah',
    'Digunakan untuk kegiatan olahraga dan kegiatan sekolah.',
    'lapangan.jpg'
);