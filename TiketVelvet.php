class TiketVelvet extends Tiket {

    protected string $bantalSelimutPack;
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
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas(): string {
        return "Bantal Selimut Pack: {$this->bantalSelimutPack}<br>"
             . "Layanan Butler: {$this->layananButler}<br>";
    }
}