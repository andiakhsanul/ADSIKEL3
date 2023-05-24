<?php
include_once("as.php");
include_once("p.php");
class Barang
{
    private  $nama;
    private  $spec;

     public function __construct($nama,$spec) {
        $this->nama = $nama;
        $this->spec=$spec;
    }
    public function getNama()
    {
        return $this->nama;
    }
    public function getSpec()
    {
        return $this->spec;
    }
    public function setSpec(String $a)
    {
        $this->spec= $a;
    }
 



}







?>