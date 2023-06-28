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
        $gejalacf = $this->input->post('kondisi');
        $nilai_min = null;
        $bobot_user = array();
        $cfEe = array();
        $cfHe = array();

        foreach ($gejalacf as $kodeGejala => $nilaiKondisi) {
            if (!empty($nilaiKondisi)) {
                // CF Gejala
                $bobot_user[] = $nilaiKondisi;
                $bobot_pakar = $this->model_admin->get_bobot_pakar($kodeGejala);
                $hipotesisGejala = $this->model_admin->get_hipotesis_gejala($kodeGejala);
                $cfBobot = floatval($nilaiKondisi) * floatval($bobot_pakar);
                $cfEe[$kodeGejala]['kode_gejalacf'] = $kodeGejala;
                $cfEe[$kodeGejala]['gejalacf'] = $hipotesisGejala;
                $cfEe[$kodeGejala]['bobot_user'] = $nilaiKondisi;
                $cfEe[$kodeGejala]['bobot_pakar'] = $bobot_pakar;
                $cfEe[$kodeGejala]['cfbobot'] = $cfBobot;
                // CF Kombinasi Evidence Antecedent
                if ($nilai_min === null || $cfBobot < $nilai_min) {
                    $nilai_min = $cfBobot;
                }
                $cfAturan = $this->model_admin->get_cfaturan($kodeGejala);
                $cfHipotesis = floatval($nilai_min) * floatval($cfAturan);
                $cfHipotesis = $cfHipotesis * 100;
                $cfHe[$kodeGejala]['gejalacf'] = $kodeGejala;
                $cfHe[$kodeGejala]['nilai_min'] = $nilai_min;
                $cfHe[$kodeGejala]['cfaturan'] = $cfAturan;
                $cfHe[$kodeGejala]['cfhipotesis'] = $cfHipotesis;
                //Hipotesis Penyakit
                $hipotesisPenyakit = $this->model_admin->get_hipotesis_penyakit($kodeGejala);
                $kodePenyakit = $this->model_admin->get_penyakitcfaturan($kodeGejala);
                if (!isset($Hipotesis[$kodePenyakit])) {
                    $Hipotesis[$kodePenyakit]['kode_penyakitcf'] = $kodePenyakit;
                    $Hipotesis[$kodePenyakit]['penyakitcf'] = $hipotesisPenyakit;
                    $Hipotesis[$kodePenyakit]['cf_persen'] = $cfHipotesis;
                }
            }
        }
        $data['cfEe'] = $cfEe;
        $data['cfHe'] = $cfHe;
        $data['Hipotesis'] = $Hipotesis;

        $this->load->view('premium/header_member');
        $this->load->view('premium/diagnosacf', $data);
        $this->load->view('premium/footer_member');

        // if ($x >= 0 && $y >= 0) {
        //     // Gunakan rumus pertama: x + y - x * y
        //     $hasil_cf = $x + $y - ($x * $y);
        // } elseif ($x < 0 && $y < 0) {
        //     // Gunakan rumus kedua: x + y + x * y
        //     $hasil_cf = $x + $y + ($x * $y);
        // } else {
        //     // Gunakan rumus ketiga: x + y / (1 - nilai min dari |x|, |y|)
        //     $min_abs = min(abs($x), abs($y));
        //     $hasil_cf = $x + $y / (1 - $min_abs);
        // }
    }

    public function detail_penyakitcf()
    {

        $kode_penyakitcf = $this->uri->segment('3');
        $data['gejalacf'] = $this->model_admin->get_gejalacf_penyakitcf($kode_penyakitcf)->result_array();
        $penyakitcf = $this->model_admin->get_penyakitcf($kode_penyakitcf)->row();
        $data['$kode_penyakitcf'] = $kode_penyakitcf;
        $data['penyakitcf'] = $penyakitcf->penyakitcf;
        $data['keterangancf'] = $penyakitcf->keterangancf;
        $data['solusicf'] = $penyakitcf->solusicf;
        $data['gambarcf'] = $penyakitcf->gambarcf;

        $this->load->view('premium/header_member');
        $this->load->view('premium/detail_penyakitcf', $data);
        $this->load->view('premium/footer_member');
    }
}
