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
        $aturan = $this->model_admin->get_AturanSesuai();
        $jumlah_dipilih = count($gejalacf);
        $jumlah_aturan = count($aturan);
        $cfBobot = 1; // Menyimpan hasil perkalian bobot pengguna dengan bobot pakar
        $cfH = 1; // Menyimpan hasil perkalian dari hasil minimal cfBobot dengan cfaturan yang sesuai

        //Mencari Nilai CF Gejala dari perkalian CF Kondisi User dan CF Pakar
        for ($x = 0; $x < $jumlah_dipilih; $x++) {
            $kondisi_user = $this->input->post('kode_gejalacf[' . $gejalacf[$x] . ']');

            // Dapatkan bobot pengguna berdasarkan kondisi dari database
            $bobot_user = $this->model_admin->get_kondisi_user($kondisi_user);

            // Dapatkan bobot pakar dari model_admin
            $bobot_pakar = $this->model_admin->get_bobot_pakar($gejalacf[$x]);

            // Lakukan perkalian bobot pengguna dengan bobot pakar
            $cfBobot *= ($bobot_user * $bobot_pakar);
        }

        //Mencari Kombinasi Evidence Antecendent yang bernilai paling kecil/minimum dan mengalikannya dengan CF Aturan yang sesuai
        $nilai_min = INF; // Inisialisasi dengan nilai tak terhingga
        for ($x = 0; $x < $jumlah_aturan; $x++) {
            $cfaturan = $this->model_admin->get_cfaturan($aturan[$x]['id']);
            $nilai_min = min($cfBobot, $nilai_min);
            $cfH *= $nilai_min * $cfaturan;
        }

        // Tentukan rumus perhitungan berdasarkan nilai CF dan rule
        $x = $cfH; // Gunakan hasil perhitungan sebelumnya sebagai nilai x
        $y = $cfH; // Gunakan hasil perhitungan sebelumnya sebagai nilai y

        if ($x >= 0 && $y >= 0) {
            // Gunakan rumus pertama: x + y - x * y
            $hasil_cf = $x + $y - ($x * $y);
        } elseif ($x < 0 && $y < 0) {
            // Gunakan rumus ketiga: x + y + x * y
            $hasil_cf = $x + $y + ($x * $y);
        } else {
            // Gunakan rumus kedua: x + y / (1 - nilai min dari |x|, |y|)
            $min_abs = min(abs($x), abs($y));
            $hasil_cf = $x + $y / (1 - $min_abs);
        }

        // Konversi nilai CF ke persen
        $data['hasil_cf_persen'] = $hasil_cf * 100;

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
