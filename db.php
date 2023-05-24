<?php 
include_once("R.php");
include_once("br.php");

class Data_barang
{
    private $barang = array();

    public function cari_barang($nm_brng)
    {
        foreach ($this->barang as $brg) {
            if ($brg->getNama() == $nm_brng) {
                return $brg;
            }
        }
        return null; // Jika tidak ditemukan, mengembalikan nilai null
    }

    public function set_barang($brg)
    {
        $this->barang[] = $brg;
    }

    public function getBarang()
    {
        return $this->barang;
    }
}














?>