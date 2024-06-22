<?php
class Data {
    public 
    $member,
    $jenis,
    $waktu,
    $diskon;

    protected $pajak;
    private 
    $scooter,
    $sport,
    $SportTouring,
    $Cross,
    $listMember = ['haikal', 'alya', 'aralie', 'poyang'];

    function __construct() {
        $this->pajak = 10000;
    }

    public function getMember() {
        if (in_array(strtolower($this->member),$this->listMember)) {
            return "Member";
        } else {
            return "Non Member";
        }
    }

    public function setHarga($jenis1, $jenis2, $jenis3, $jenis4) {
        $this->scooter = $jenis1;
        $this->sport = $jenis2;
        $this->SportTouring = $jenis3;
        $this->Cross = $jenis4;
    }

    public function getHarga(){
        $data['scooter'] = $this->scooter;
        $data['sport'] = $this->sport;
        $data['SportTouring'] = $this->SportTouring;
        $data['Cross'] = $this->Cross;
        return $data;
    }
}

class rental extends Data {
    public function hargaRental() {
        $dataHarga = $this->getHarga()[$this->jenis];
        $diskon = $this->getMember() == "Member" ? 5 : 0;
        if ($this->waktu === 1) {
            $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
        } else {
            $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100 )) + $this->pajak;
        }
        return [$bayar,$diskon];
    }

    public function pembayaran () {
        echo '<center>';
        echo $this->member . ' berstatus sebagai ' . $this->getMember() . ' mendapatkan diskon sebesar ' . $this->hargaRental()[1] . '%';
        echo '<br>';
        echo 'Jenis motor yang dirental adalah ' .$this->jenis. ' selama ' .$this->waktu. ' hari' ;
        echo '<br>';
        echo 'Harga rental per harinya : Rp. ' . number_format($this->getHarga()[$this->jenis],0, ',', '.');
        echo '<br>';
        echo '<br>';
        echo 'besar yang harus dibayarkan adalah Rp. ' .number_format($this->hargaRental()[0],0,',','.'). '<br>';
        echo '<button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Lihat Struk</button>';
        echo '</center>';
    }
}
?>