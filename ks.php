<?php 
class Kartu_stok
{
    private int $masuk;
    private int $keluar;
    private int $stok_akhir;
    public function __construct($masuk,$keluar,$stok_akhir) {
        $this->masuk = $masuk;
        $this->keluar = $keluar;
        $this->stok_akhir = $stok_akhir;
    }

    public function getstok()
    {
        return $this->stok_akhir;
    }
}





?>