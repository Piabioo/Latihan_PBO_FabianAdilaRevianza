class TiketReguler extends Tiket {

    protected string $tipeAudio;
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
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas(): string {
        return "Tipe Audio: {$this->tipeAudio}<br>"
             . "Lokasi Baris: {$this->lokalBaris}<br>";
    }
}