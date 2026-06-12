<?php
declare(strict_types=1);

require_once __DIR__ . '/Tiket.php';

class TiketIMAX extends Tiket {

    /** @var string ID kacamata 3D */
    protected string $kacamata3dId;

    /** @var string Efek gerak fitur */
    protected string $efekGerakFitur;

    public function __construct(
        int $id_tiket,
        string $nama_film,
        string $jadwal_tayang,
        int $jumlah_kursi,
        float $hargaDasarTiket,
        string $kacamata3dId,
        string $efekGerakFitur
    ) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga(): float {
        // Contoh: IMAX ada tambahan 20% dari harga dasar
        return $this->hargaDasarTiket * 1.2;
    }

    public function tampilkanInfoFasilitas(): string {
        return "Kacamata 3D ID : {$this->kacamata3dId}\n"
             . "Efek Gerak Fitur : {$this->efekGerakFitur}\n";
    }
}