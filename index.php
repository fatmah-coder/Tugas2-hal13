<?php

// kelas pegawai 
abstract class Pegawai
{
    private $nama;
    private $gajiDasar;

    public function __construct($nama, $gajiDasar)
    {
        $this->nama = $nama;
        $this->gajiDasar = $gajiDasar;
    }

    // Getter untuk mengambil data private
    public function getNama()
    {
        return $this->nama;
    }

    public function getGajiDasar()
    {
        return $this->gajiDasar;
    }

    abstract public function hitungGaji();
}
class PegawaiTetap extends Pegawai
{
    private $tunjangan;

    public function __construct($nama, $gajiDasar, $tunjangan)
    {
        parent::__construct($nama, $gajiDasar);
        $this->tunjangan = $tunjangan;
    }

    // Meng-override method hitungGaji dengan rumus khusus Pegawai Tetap
    public function hitungGaji()
    {
        return $this->getGajiDasar() + $this->tunjangan;
    }
}

class PegawaiKontrak extends Pegawai
{
    private $jamKerja;
    private $tarifPerJam;

    public function __construct($nama, $jamKerja, $tarifPerJam)
    {
        parent::__construct($nama, 0);
        $this->jamKerja = $jamKerja;
        $this->tarifPerJam = $tarifPerJam;
    }

    // Meng-override method hitungGaji dengan rumus khusus Pegawai Kontrak
    public function hitungGaji()
    {
        return $this->jamKerja * $this->tarifPerJam;
    }
}

// Method untuk menampilkan info

$joko = new PegawaiTetap("Joko", 5000000, 1000000);
$budi = new PegawaiKontrak("Budi", 100, 50000);

echo "Nama: " . $joko->getNama() . " | Gaji: Rp" . number_format($joko->hitungGaji(), 0, ',', '.') . "<br>";
echo "Nama: " . $budi->getNama() . " | Gaji: Rp" . number_format($budi->hitungGaji(), 0, ',', '.') . "<br>";
