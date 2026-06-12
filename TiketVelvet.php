<?php
declare(strict_types=1);

require_once __DIR__ . '/Tiket.php';

class TiketVelvet extends Tiket {

    /** @var string Paket bantal & selimut */
    protected string $bantalSelimutPack;

    /** @var string Layanan butler */
    protected string $layananButler;

    public function __construct(
        int $id_tiket,
        string $nama_film,
        string $jadwal_tayang,
        int $jumlah_kursi,
        float $hargaDasarTiket,
        string $bantalSelimutPack,
        string $layananButler
    ) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga(): float {
        // Contoh: Velvet ada tambahan 50% dari harga dasar
        return $this->hargaDasarTiket * 1.5;
    }

    public function tampilkanInfoFasilitas(): string {
        return "Bantal & Selimut Pack : {$this->bantalSelimutPack}\n"
             . "Layanan Butler : {$this->layananButler}\n";
    }
}