<?php
abstract class Tiket {
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    public function __construct($data) {
        $this->id_tiket = $data['id_tiket'];
        $this->nama_film = $data['nama_film'];
        $this->jadwal_tayang = $data['jadwal_tayang'];
        $this->jumlah_kursi = $data['jumlah_kursi'];
        $this->hargaDasarTiket = $data['harga_dasar_tiket'];
    }

    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoStudio();
}
?>
