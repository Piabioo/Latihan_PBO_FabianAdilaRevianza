<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    protected $bantalSelimut;
    protected $layananButler;

    public function getDaftarVelvet($db) {
        $stmt = $db->prepare("SELECT * FROM tabel_tiket WHERE jenis_studio='velvet'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hitungTotalHarga() {
        return $this->hargaDasarTiket - 20000; // diskon velvet Rp20.000
    }

    public function tampilkanInfoStudio() {
        return "Studio Velvet - Diskon Rp20.000.";
    }
}
?>
