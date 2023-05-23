<?php 

class Ruang
{
    private $nama;
    private $jenis;
    
    public function __construct($nama,$jenis) {
        $this->nama = $nama;
        $this->jenis=  $jenis;
    }

    public function get_nama()
    {
        return $this->nama;
    }

    public function get_jenis()
    {
        return $this->jenis;
    }
    
}


















?>