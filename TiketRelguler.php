<?php
declare(strict_types=1);

require_once __DIR__ . '/Tiket.php';

class TiketReguler extends Tiket {

    /** @var string Tipe audio, dari kolom tipe_audio */
    protected string $tipeAudio;

    /** @var string Lokasi baris kursi, dari kolom lokasi_baris */
    protected string $lokalBaris;

    public function __construct(
        int $id_tiket,
        string $nama_film,
        string $jadwal_tayang,
        int $jumlah_kursi,
        float $hargaDasarTiket,
        string $tipeAudio,
        string $lokalBaris
    ) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokalBaris = $lokalBaris;
    }

    public function hitungTotalHarga(): float {
        // Contoh: Regular tidak ada tambahan, total = hargaDasarTiket
        return $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas(): string {
        return "Tipe Audio : {$this->tipeAudio}\n"
             . "Lokasi Baris : {$this->lokalBaris}\n";
    }
}