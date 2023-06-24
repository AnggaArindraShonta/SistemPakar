<?php
defined('BASEPATH') or exit('No direct script access allowed');

class member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('model_admin');
        $this->load->model('model_user');
    }
    public function index()
    {
        $this->load->view('premium/header_member');
        $this->load->view('premium/home_member');
        $this->load->view('premium/footer_member');
    }
    public function login()
    {
        $this->load->view('user/login');
    }
    public function register()
    {
        $this->load->view('user/register');
    }
    public function data_penyakitcf()
    {

        $data['penyakitcf'] = $this->model_admin->get_all_penyakitcf()->result_array();

        $this->load->view('premium/header_member');
        $this->load->view('premium/data_penyakitcf', $data);
        $this->load->view('premium/footer_member');
    }

    public function konsultasicf()
    {
        $data['gejalacf'] = $this->model_admin->get_all_gejalacf()->result_array();

        $this->load->view('premium/header_member');
        $this->load->view('premium/konsultasicf', $data);
        $this->load->view('premium/footer_member');
    }

    public function diagnosa()
    {
        $gejalacf = $this->input->post('kode_gejalacf');
        $jumlah_dipilih = count($gejalacf);

        // Inisialisasi variabel untuk menyimpan hasil perhitungan CF
        $x = 1; // Diinisialisasi dengan 1 untuk mendapatkan nilai minimum pada perulangan pertama
        $y = 1;

        // Mencari Nilai CF Gejala dari perkalian CF Kondisi User dan CF Pakar
        for ($i = 0; $i < $jumlah_dipilih; $i++) {
            $kondisi_user = $this->input->post('kode_gejalacf[' . $gejalacf[$i] . ']');

            // Dapatkan bobot pengguna berdasarkan kondisi dari database
            $bobot_user = $this->model_admin->get_kondisi_user($kondisi_user);

            // Dapatkan bobot pakar dari model_admin
            $bobot_pakar = $this->model_admin->get_bobot_pakar($gejalacf[$i]);

            // Lakukan perkalian bobot pengguna dengan bobot pakar
            $cfBobot = $bobot_user * $bobot_pakar;

            // Cari nilai minimum dari cfBobot
            $nilai_min = min($nilai_min, $cfBobot);
        }

        // Perulangan untuk melakukan perkalian nilai minimum dengan CF aturan yang sesuai
        $aturan_cf = array(); // Array untuk menyimpan nilai CF aturan
        for ($i = 0; $i < $jumlah_dipilih; $i++) {
            $id = $gejalacf[$i];
            $cfAturan = $this->model_admin->get_cfaturan($id); // Ganti $id_aturan dengan nilai id aturan yang sesuai

            // Kalikan nilai minimum dengan CF aturan
            $nilai_min_cfAturan = $nilai_min * $cfAturan;

            // Simpan nilai CF aturan dalam array
            $aturan_cf[] = $nilai_min_cfAturan;
        }

        if ($i == 0) {
            $x = $aturan_cf[$i];
        } else {
            $y = $aturan_cf[$i];
        }

        // Mencari kombinasi Evidence Antecedent yang bernilai paling kecil/minimum dan mengalikannya dengan CF Aturan yang sesuai

        if ($x >= 0 && $y >= 0) {
            // Gunakan rumus pertama: x + y - x * y
            $hasil_cf = $x + $y - ($x * $y);
        } elseif ($x < 0 && $y < 0) {
            // Gunakan rumus kedua: x + y + x * y
            $hasil_cf = $x + $y + ($x * $y);
        } else {
            // Gunakan rumus ketiga: x + y / (1 - nilai min dari |x|, |y|)
            $min_abs = min(abs($x), abs($y));
            $hasil_cf = $x + $y / (1 - $min_abs);
        }

        // Konversi nilai CF ke persen
        $hasil_cf_persen = $hasil_cf * 100;

        $data['hasil_cf_persen'] = $hasil_cf_persen;

        $this->load->view('premium/header_member');
        $this->load->view('premium/diagnosacf', $data);
        $this->load->view('premium/footer_member');
    }

    public function detail_penyakitcf()
    {

        $kode_penyakitcf = $this->uri->segment('3');
        $data['$kode_penyakitcf'] = $kode_penyakitcf;

        $penyakitcf = $this->model_admin->get_penyakitcf($kode_penyakitcf)->row();
        $data['penyakitcf'] = $penyakitcf->penyakitcf;
        $data['solusicf'] = $penyakitcf->solusicf;

        $data['gejalacf'] = $this->model_admin->get_gejalacf_penyakitcf($kode_penyakitcf)->result_array();

        $this->load->view('premium/header_member');
        $this->load->view('premium/detail_penyakitcf', $data);
        $this->load->view('premium/footer_member');
    }
}
