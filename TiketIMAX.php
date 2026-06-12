class TiketIMAX extends Tiket {

    protected string $kacamata3dId;
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
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas(): string {
        return "Kacamata 3D ID: {$this->kacamata3dId}<br>"
             . "Efek Gerak Fitur: {$this->efekGerakFitur}<br>";
    }
}