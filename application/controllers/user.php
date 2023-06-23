<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
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
		$this->load->view('user/header_user');
		$this->load->view('user/home_user');
		$this->load->view('user/footer_user');
	}

	public function data_penyakit()
	{

		$data['penyakit'] = $this->model_admin->get_all_penyakit()->result_array();

		$this->load->view('user/header_user');
		$this->load->view('user/data_penyakit', $data);
		$this->load->view('user/footer_user');
	}

	public function konsultasi()
	{

		$data['gejala'] = $this->model_admin->get_all_gejala()->result_array();

		$this->load->view('user/header_user');
		$this->load->view('user/konsultasi', $data);
		$this->load->view('user/footer_user');
	}


	public function diagnosa()
	{
		$gejala = $this->input->post('kode_gejala');
		$jumlah_dipilih = count($gejala);
		for ($x = 0; $x < $jumlah_dipilih; $x++) {

			$query =	$this->db->query("select DISTINCT p.kode_penyakit, p.penyakit from basispengetahuan b, penyakit p where b.kode_gejala='$gejala[$x]' and p.kode_penyakit=b.kode_penyakit group by kode_penyakit limit 1");

			$data['penyakit'] = $query->result_array();
		}


		$this->load->view('user/header_user');
		$this->load->view('user/diagnosa', $data);
		$this->load->view('user/footer_user');
	}

	public function detail_penyakit()
	{

		$kode_penyakit = $this->uri->segment('3');
		$data['$kode_penyakit'] = $kode_penyakit;

		$penyakit = $this->model_admin->get_penyakit($kode_penyakit)->row();
		$data['penyakit'] = $penyakit->penyakit;
		$data['solusi'] = $penyakit->solusi;

		$data['gejala'] = $this->model_admin->get_gejala_penyakit($kode_penyakit)->result_array();

		$this->load->view('user/header_user');
		$this->load->view('user/detail_penyakit', $data);
		$this->load->view('user/footer_user');
	}
}
