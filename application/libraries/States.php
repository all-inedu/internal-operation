<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class States
{
    function show(){
        $data = [
            "Aceh","Bali","Banten","Bengkulu","D.I Yogyakarta","DKI Jakarta","Gorontalo","Jambi","Jawa Barat","Jawa Tengah","Jawa Timur","Kalimantan Barat","Kalimantan Selatan","Kalimantan Tengah","Kalimantan Timur","Kalimantan Utara","Kapulauan Bangka Belitung","Kapulauan Riau","Lampung","Maluku","Maluku Utara","Nusa Tenggara Barat","Nusa Tenggara Timur","Papua","Papua Barat","Riau","Sulawesi Barat","Sulawesi Selatan","Sulawesi Tengah","Sulawesi Tenggara","Sulawesi Utara","Sumatera Barat","Sumatera Selatan","Sumatera Utara"
        ];
        return $data;
    }

    function showCities() {
        $data = [
            "Banda Aceh","Langsa","Lhokseumawe","Meulaboh","Sabang","Subulussalam","Denpasar","Pangkalpinang","Cilegon","Serang","Tangerang Selatan","Tangerang","Bengkulu","Gorontalo","Jakarta Barat","Jakarta Pusat","Jakarta Selatan","Jakarta Timur","Jakarta Utara","Sungai Penuh","Jambi","Bandung","Bekasi","Bogor","Cimahi","Cirebon","Depok","Sukabumi","Tasikmalaya","Banjar","Magelang","Pekalongan","Purwokerto","Salatiga","Semarang","Surakarta","Tegal","Batu","Blitar","Kediri","Madiun","Malang","Mojokerto","Pasuruan","Probolinggo","Surabaya","Pontianak","Singkawang","Banjarbaru","Banjarmasin","Palangkaraya","Balikpapan","Bontang","Samarinda","Tarakan","Batam","Tanjungpinang","Bandar Lampung","Metro","Ternate","Tidore Kepulauan","Ambon","Tual","Bima","Mataram","Kupang","Sorong","Jayapura","Dumai","Pekanbaru","Makassar","Palopo","Parepare","Palu","Bau-Bau","Kendari","Bitung","Kotamobagu","Manado","Tomohon","Bukittinggi","Padang","Padangpanjang","Pariaman","Payakumbuh","Sawahlunto","Solok","Lubuklinggau","Pagaralam","Palembang","Prabumulih","Binjai","Medan","Padang Sidempuan","Pematangsiantar","Sibolga","Tanjungbalai","Tebingtinggi","Yogyakarta"
        ];

        return $data;
    }
}
?>