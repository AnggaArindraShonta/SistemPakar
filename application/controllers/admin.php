<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_login');
		$this->load->model('model_admin');

		$id_admin = $this->session->userdata('id_admin');

		$this->db->where('id_admin', $id_admin);
		$db = $this->db->get('admin')->row();

		if (!$this->session->userdata('id_admin') == TRUE) {
			redirect('auth');
		}
	}
	public function index()
	{

		$id_admin = $this->session->userdata('id_admin');
		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['gejala'] = $this->model_admin->get_all_gejala()->num_rows();
		$data['penyakit'] = $this->model_admin->get_all_penyakit()->num_rows();
		$data['basispengetahuan'] = $this->model_admin->get_all_basispengetahuan()->num_rows();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/dashboard_admin', $data);
		$this->load->view('admin/footer');
	}

	public function profile()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;

		$data['admin'] = $this->model_admin->get_admin($id_admin)->result_array();


		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/footer');
	}

	public function edit_admin()
	{

		$delete = $this->model_admin->edit_admin();

		if ($delete['result'] == 'success') {



			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Profile Success!
			</div>
			');
			redirect('admin/profile');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Profile Failed!
			</div>
			');
			redirect('admin/profile');
		}
	}


	public function gejala()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['gejala'] = $this->model_admin->get_all_gejala()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/gejala', $data);
		$this->load->view('admin/footer');
	}

	public function gejalacf()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['gejalacf'] = $this->model_admin->get_all_gejalacf()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/gejalacf', $data);
		$this->load->view('admin/footer');
	}

	public function add_gejala()
	{

		$add = $this->model_admin->add_gejala();

		if ($add['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Gejala Success!
			</div>
			');
			redirect('admin/gejala');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Gejala Failed!
			</div>
			');
			redirect('admin/gejala');
		}
	}

	public function add_gejalacf()
	{

		$add = $this->model_admin->add_gejalacf();

		if ($add['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Gejala Success!
			</div>
			');
			redirect('admin/gejalacf');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Gejala Failed!
			</div>
			');
			redirect('admin/gejalacf');
		}
	}

	public function delete_gejala()
	{

		$delete = $this->model_admin->delete_gejala();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Gejala Success!
			</div>
			');
			redirect('admin/gejala');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Gejala Failed!
			</div>
			');
			redirect('admin/gejala');
		}
	}

	public function delete_gejalacf()
	{

		$delete = $this->model_admin->delete_gejalacf();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Gejala Success!
			</div>
			');
			redirect('admin/gejalacf');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Gejala Failed!
			</div>
			');
			redirect('admin/gejalacf');
		}
	}

	public function edit_gejala()
	{

		$delete = $this->model_admin->edit_gejala();



		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Gejala Success!
			</div>
			');


			redirect('admin/gejala');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Gejala Failed!
			</div>
			');
			redirect('admin/gejala');
		}
	}

	public function edit_gejalacf()
	{

		$delete = $this->model_admin->edit_gejalacf();


		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Gejala CF Success!
			</div>
			');


			redirect('admin/gejalacf');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Gejala CF Failed!
			</div>
			');
			redirect('admin/gejalacf');
		}
	}

	public function penyakit()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['penyakit'] = $this->model_admin->get_all_penyakit()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/penyakit', $data);
		$this->load->view('admin/footer');
	}

	public function penyakitcf()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['penyakitcf'] = $this->model_admin->get_all_penyakitcf()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/penyakitcf', $data);
		$this->load->view('admin/footer');
	}

	public function add_penyakit()
	{

		$add = $this->model_admin->add_penyakit();

		if ($add['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Penyakit Success!
			</div>
			');
			redirect('admin/penyakit');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Penyakit Failed!
			</div>
			');
			redirect('admin/penyakit');
		}
	}

	public function add_penyakitcf()
	{

		$add = $this->model_admin->add_penyakitcf();

		if ($add['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Penyakit Success!
			</div>
			');
			redirect('admin/penyakitcf');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Penyakit Failed!
			</div>
			');
			redirect('admin/penyakitcf');
		}
	}

	public function delete_penyakit()
	{

		$delete = $this->model_admin->delete_penyakit();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Penyakit Success!
			</div>
			');
			redirect('admin/penyakit');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Penyakit Failed!
			</div>
			');
			redirect('admin/penyakit');
		}
	}

	public function delete_penyakitcf()
	{

		$delete = $this->model_admin->delete_penyakitcf();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Penyakit Success!
			</div>
			');
			redirect('admin/penyakitcf');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Penyakit Failed!
			</div>
			');
			redirect('admin/penyakitcf');
		}
	}

	public function edit_penyakit()
	{

		$delete = $this->model_admin->edit_penyakit();
		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Penyakit Success!
			</div>
			');


			redirect('admin/penyakit');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Penyakit Failed!
			</div>
			');
			redirect('admin/penyakit');
		}
	}

	public function edit_penyakitcf()
	{

		$delete = $this->model_admin->edit_penyakitcf();
		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Penyakit Success!
			</div>
			');


			redirect('admin/penyakitcf');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Penyakit Failed!
			</div>
			');
			redirect('admin/penyakitcf');
		}
	}

	public function detail_penyakit()
	{

		$id_admin = $this->session->userdata('id_admin');
		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;

		$kode_penyakit = $this->uri->segment('3');
		$data['kode_penyakit'] = $kode_penyakit;

		$hp = $this->model_admin->get_penyakit($kode_penyakit)->row();
		$data['penyakit'] = $hp->penyakit;

		$data['gejala'] = $this->model_admin->get_gejala_penyakit($kode_penyakit)->result_array();
		$data['all_gejala'] = $this->model_admin->get_all_gejala()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/detail_penyakit', $data);
		$this->load->view('admin/footer');
	}

	public function detail_penyakitcf()
	{

		$id_admin = $this->session->userdata('id_admin');
		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;

		$kode_penyakitcf = $this->uri->segment('3');
		$data['kode_penyakitcf'] = $kode_penyakitcf;

		$hp = $this->model_admin->get_penyakitcf($kode_penyakitcf)->row();
		$data['penyakitcf'] = $hp->penyakitcf;

		$data['gejalacf'] = $this->model_admin->get_gejala_penyakitcf($kode_penyakitcf)->result_array();
		$data['all_gejalacf'] = $this->model_admin->get_all_gejalacf()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/detail_penyakitcf', $data);
		$this->load->view('admin/footer');
	}

	public function basispengetahuan()
	{
		$id_admin = $this->session->userdata('id_admin');
		$data['nama_admin'] = $this->model_admin->get_admin($id_admin)->row()->nama_admin;
		$data['basispengetahuan'] = $this->model_admin->get_all_basispengetahuan()->result_array();

		$data['data_gejala'] = $this->model_admin->get_all_gejala()->result();
		$data['data_penyakit'] = $this->model_admin->get_all_penyakit()->result();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/basis_pengetahuan', $data);
		$this->load->view('admin/footer');
	}

	public function aturan()
	{
		$id_admin = $this->session->userdata('id_admin');
		$data['nama_admin'] = $this->model_admin->get_admin($id_admin)->row()->nama_admin;
		$data['aturan'] = $this->model_admin->get_all_aturan()->result_array();

		$data['data_gejalacf'] = $this->model_admin->get_all_gejalacf()->result();
		$data['data_penyakitcf'] = $this->model_admin->get_all_penyakitcf()->result();
		$data['cfaturan'] = $this->model_admin->get_all_aturan()->result();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/aturan', $data);
		$this->load->view('admin/footer');
	}

	public function add_basispengetahuan()
	{
		$kode_penyakit = $this->input->post('kode_penyakit');
		$kode_gejala = $this->input->post('kode_gejala');
		$add = $this->model_admin->add_basispengetahuan();

		if ($add['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Aturan Success!
        </div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Aturan Failed!
        </div>');
		}

		redirect('admin/basispengetahuan');
	}

	public function add_aturan()
	{
		$id_penyakitcf = $this->input->post('id_penyakitcf');
		$id_gejalacf = $this->input->post('id_gejalacf');
		$cfaturan = $this->input->post('cfaturan');
		$add = $this->model_admin->add_aturan();

		if ($add['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Aturan Success!
        </div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Aturan Failed!
        </div>');
		}

		redirect('admin/aturan');
	}

	public function edit_basispengetahuan()
	{
		$edit = $this->model_admin->edit_basispengetahuan();

		if ($edit['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Edit Aturan Success!</div>');
			redirect('admin/basispengetahuan');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Edit Aturan Failed!</div>');
			redirect('admin/basispengetahuan');
		}
	}

	public function edit_aturan()
	{
		$edit = $this->model_admin->edit_aturan();

		if ($edit['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Edit Aturan Success!</div>');
			redirect('admin/aturan');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Edit Aturan Failed!</div>');
			redirect('admin/aturan');
		}
	}


	public function delete_basispengetahuan()
	{
		$id = $this->input->post('id');
		$delete = $this->model_admin->delete_basispengetahuan();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Aturan Success!
			</div>
			');
			redirect('admin/basispengetahuan/' . $id);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Aturan Failed!
			</div>
			');
			redirect('admin/basispengetahuan/' . $id);
		}
	}

	public function delete_aturan()
	{
		$id = $this->input->post('id');
		$delete = $this->model_admin->delete_aturan();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Aturan Success!
			</div>
			');
			redirect('admin/aturan/' . $id);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Aturan Failed!
			</div>
			');
			redirect('admin/aturan/' . $id);
		}
	}

	public function member()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['member'] = $this->model_admin->get_all_member()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('admin/footer');
	}

	public function ubah_statusaktif($id)
	{
		$result = $this->model_admin->get_by_id($id)->row_object();
		if ($result) {
			$status = $result->status_aktif;
			if ($status == "Y") {
				$dataUpdate = array('status_aktif' => "N");
			} else {
				$dataUpdate = array('status_aktif' => "Y");
			}
			$this->model_admin->update('member', $dataUpdate, 'id_member', $id);
		}
		redirect('admin/member');
	}

	public function ubah_statuspremium($id)
	{
		$result = $this->model_admin->get_by_id($id)->row_object();
		if ($result) {
			$status = $result->premium;
			if ($status == "Y") {
				$dataUpdate = array('premium' => "N");
			} else {
				$dataUpdate = array('premium' => "Y");
			}
			$this->model_admin->update('member', $dataUpdate, 'id_member', $id);
		}
		redirect('admin/member');
	}

	public function delete($id)
	{
		$this->model_admin->delete('member', 'id_member', $id);
		redirect('admin/member');
	}
}
