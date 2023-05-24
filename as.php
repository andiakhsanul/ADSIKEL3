<?php 
include_once("R.php");

class Aset extends Barang
{
    private String $nomor_seri;
    private $lokasi= array();

    public function __construct($noseri,$lokasi,$nama,$spec) {
        parent :: __construct($nama,$spec);
        $this->nomor_seri=$noseri;
        $index= count($this->lokasi);
        $this->lokasi[$index]=$lokasi;
    }
    public function ubah_lokasi($lokasi)
    {
        $index = count($this->lokasi);
        $this->lokasi[$index] = $lokasi;
    }
    
    public function cetak_nomor_seri()
    {
        echo $this->nomor_seri;
    }
    public function getNomorSeri()
{
    return $this->nomor_seri;
}
public function getLokasiTerakhir()
{
    $index = count($this->lokasi) - 1;
    return $this->lokasi[$index];
}




?>