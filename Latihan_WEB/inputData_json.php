<?php
// Definisikan nama file JSON
define('FILE_JSON', 'peserta.json');

// Cek apakah file JSON ada, jika tidak buat file kosong
function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

// Fungsi membaca data dari file JSON
function bacaDataJson() {
    return json_decode(file_get_contents(FILE_JSON), true);
}

// Proses saat form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Panggil prosedur
    cekFileJson();

    // Ambil data dari form
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $hp      = $_POST['hp'];
    $alamat  = $_POST['alamat'];

    // Ambil data lama
    $data_peserta = bacaDataJson();

    // Cek apakah kode peserta sudah ada
    foreach ($data_peserta as $peserta) {
        if ($data_peserta['nama'] === $nama) {
            echo "<script>alert('peserta dengan Kode: $kode sudah ada!');</script>";
            echo "<script>window.location.href = 'formbarang.html';</script>";
            exit;
        }
    }

    // Tambah data baru ke array
    $data_peserta[] = [
        'nama'    => $nama,
        'email'   => $email,
        'hp'      => $hp,
        'alamat'  => $alamat
    ];

    // Simpan kembali ke file JSON
    file_put_contents(FILE_JSON, json_encode($data_peserta, JSON_PRETTY_PRINT));

    // Tampilkan pesan berhasil
    echo "<script>alert('Data berhasil ditambahkan!');</script>";
    echo "<script>window.location.href = 'formbarang.html';</script>";
}
?>
