<?php
include_once("R.php");
include_once("ks.php");
class persediaan extends Barang
{
    private $lokasi_ruang;
    private $stok = array();
    public function __construct($nama,$spec,$lokasi,$masuk,$keluar,$stok_akhir) {
        parent :: __construct($nama,$spec);
        $this->lokasi_ruang=$lokasi;
        $kt = new Kartu_stok($masuk,$keluar,$stok_akhir);
        $index= count($this->stok);
        $this->stok[$index]=$kt;


    }

    public function tambah_stok(int $jumlah)
    {
        $index = count($this->stok) - 1;
        $sa= $this->stok[$index]->getstok();
        $sa=$sa+$jumlah;
        $kt= new Kartu_stok($jumlah,0,$sa);
        $index = count($this->stok);
        $this->stok[$index]=$kt;


    }
    
    public function kurangi_stok(int $jumlah)
    {
        $index = count($this->stok) - 1;
        $sa= $this->stok[$index]->getstok();
        $sa=$sa-$jumlah;
        $kt= new Kartu_stok($jumlah,0,$sa);
        $index = count($this->stok);
        $this->stok[$index]=$kt;

    }
    public function getStokAkhir()
{
    $index = count($this->stok) - 1;
    return $this->stok[$index]->getstok();
}public function getLokasi()
{
    return $this->lokasi_ruang;
}



}




?>