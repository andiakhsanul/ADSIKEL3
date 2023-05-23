<?php
include_once("db.php");
include_once("br.php");
include_once("as.php");
include_once("p.php");
include_once("R.php");

// Membuat objek ruangan
$ruang100 = new Ruang("Ruang 100", 1);
$ruang101 = new Ruang("Ruang 101", 1);
$ruang200 = new Ruang("Ruang 200", 2);
$ruang201 = new Ruang("Ruang 201", 3);

// Membuat objek barang aset
$laptop1 = new Aset("0001", $ruang200, "Laptop", "Intel Core i7, RAM 8 GB");
$laptop2 = new Aset("0002", $ruang200, "Laptop", "Intel Core i7, RAM 8 GB");
$lemari = new Aset("003", $ruang200, "Lemari", "2 Pintu");
$meja = new Aset("004", $ruang201, "Meja Kerja", "-");

// Membuat objek barang persediaan
$kertas = new Persediaan("Kertas", "A4", $ruang100, 100, 0, 100);
$ballpoint = new Persediaan("Ballpoint", "Hitam", $ruang100, 100, 0, 100);
$map = new Persediaan("Map", "Kertas", $ruang101, 50, 0, 50);

// Membuat objek data barang
$dt_barang = new Data_barang();


// Menyimpan barang aset dan persediaan ke dalam objek data barang
$dt_barang->set_barang($laptop1);
$dt_barang->set_barang($laptop2);
$dt_barang->set_barang($lemari);
$dt_barang->set_barang($meja);
$dt_barang->set_barang($kertas);
$dt_barang->set_barang($ballpoint);
$dt_barang->set_barang($map);

// Menggunakan fungsi cari_barang dari objek data barang

// a. Mencari lemari dan memindahkan ke ruang 201
$lemari_cari = $dt_barang->cari_barang("Lemari");
if ($lemari_cari instanceof Aset) {
    $lemari_cari->ubah_lokasi($ruang201);
}

/// b. Mencari laptop dengan nomor seri 0002 dan memindahkan ke ruang 201
$laptop_cari = $dt_barang->cari_barang("Laptop");
foreach ($laptop_cari as $laptop) {
    if ($laptop instanceof Aset && $laptop->getNomorSeri() == "0002") {
        $laptop->ubah_lokasi($ruang201);
        break;
    }
}

// c. Mencari Kertas A4 dan mengurangi stok sebanyak 10
$kertas_cari = $dt_barang->cari_barang("Kertas");
if ($kertas_cari instanceof Persediaan) {
    $kertas_cari->kurangi_stok(10);
}

// d. Mencari Ballpoint hitam dan menambah stok sebanyak 50
$ballpoint_cari = $dt_barang->cari_barang("Ballpoint");
if ($ballpoint_cari instanceof Persediaan) {
    $ballpoint_cari->tambah_stok(50);
}

// Menampilkan seluruh aset beserta lokasi terakhirnya
echo "Seluruh Aset:\n";
foreach ($dt_barang->getBarang() as $barang) {
    if ($barang instanceof Aset) {
        echo "Nama: " . $barang->getNama() . "\n";
        echo "Spesifikasi: " . $barang->getSpec() . "\n";
        echo "Nomor Seri: " . $barang->getNomorSeri() . "\n";
        echo "Lokasi Terakhir: " . $barang->getLokasiTerakhir()->getNama() . "\n";
        echo "====================================\n";
    }
}

// Menampilkan seluruh persediaan beserta stok akhirnya
echo "Seluruh Persediaan:\n";
foreach ($dt_barang->getBarang() as $barang) {
    if ($barang instanceof Persediaan) {
        echo "Nama: " . $barang->getNama() . "\n";
        echo "Spesifikasi: " . $barang->getSpec() . "\n";
        echo "Lokasi: " . $barang->getLokasi()->getNama() . "\n";
        echo "Stok Akhir: " . $barang->getStokAkhir() . "\n";
        echo "====================================\n";
    }
}
?>
