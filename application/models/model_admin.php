<?php
class model_admin extends CI_Model
{

	function get_admin($id_admin)
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $id_admin);

		return $this->db->get();
	}

	function get_all_admin()
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_admin', 'Desc');

		return $this->db->get();
	}

	function edit_admin()
	{
		$data = array(
			'username' =>  $this->input->post('username'),
			'password' =>  $this->input->post('password'),
			'nama_admin' =>  $this->input->post('nama_admin')
		);
		$this->db->where('id_admin', $this->input->post('id_admin'));
		$this->db->update('admin', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function get_all_gejala()
	{
		$this->db->select('*');
		$this->db->from('gejala');
		$this->db->order_by('kode_gejala', 'ASC');
		return $this->db->get();
	}

	function get_all_gejalacf()
	{
		$this->db->select('*');
		$this->db->from('gejalacf');
		$this->db->order_by('kode_gejalacf', 'ASC');
		return $this->db->get();
	}

	public function get_bobot_pakar($kode_gejalacf)
	{
		$this->db->select('bobot_pakar');
		$this->db->from('gejalacf');
		$this->db->where('kode_gejalacf', $kode_gejalacf);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->bobot_pakar;
		} else {
			return null;
		}
	}


	function get_penyakit($kode_penyakit)
	{

		$this->db->select('*');
		$this->db->from('penyakit');
		$this->db->where('kode_penyakit', $kode_penyakit);

		return $this->db->get();
	}

	function get_penyakitcf($kode_penyakitcf)
	{

		$this->db->select('*');
		$this->db->from('penyakitcf');
		$this->db->where('kode_penyakitcf', $kode_penyakitcf);

		return $this->db->get();
	}

	function add_gejala()
	{
		$this->db->order_by('kode_gejala', 'DESC');
		$db = $this->db->get('gejala')->row();

		$lastCode = $db->kode_gejala;
		$lastNumber = (int) substr($lastCode, 1);
		$newNumber = $lastNumber + 1;

		$char = "G";
		$newID = $char . $newNumber;

		while ($this->db->get_where('gejala', array('kode_gejala' => $newID))->row()) {
			$newNumber++;
			$newID = $char . $newNumber;
		}

		$data = array(
			'kode_gejala' => $newID,
			'gejala' => $this->input->post('gejala')
		);

		$this->db->insert('gejala', $data);

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}


	function add_gejalacf()
	{
		$this->db->order_by('kode_gejalacf', 'DESC');
		$db = $this->db->get('gejalacf')->row();

		$lastCode = $db->kode_gejalacf;
		$lastNumber = (int) substr($lastCode, 1);
		$newNumber = $lastNumber + 1;

		$char = "G";
		$newID = $char . $newNumber;

		while ($this->db->get_where('gejalacf', array('kode_gejalacf' => $newID))->row()) {
			$newNumber++;
			$newID = $char . $newNumber;
		}

		$data = array(
			'kode_gejalacf' => $newID,
			'gejalacf' => $this->input->post('gejalacf'),
			'bobot_pakar' => $this->input->post('bobot_pakar')
		);

		$this->db->insert('gejalacf', $data);

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	function delete_gejala()
	{

		$this->db->where('kode_gejala', $this->input->post('kode_gejala'));
		$this->db->delete('gejala');

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function delete_gejalacf()
	{
		$this->db->where('kode_gejalacf', $this->input->post('kode_gejalacf'));
		$this->db->delete('gejalacf');

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}

		return $return;
	}

	function edit_gejala()
	{

		$data = array(
			'gejala' =>  $this->input->post('gejala')
		);
		$this->db->where('kode_gejala', $this->input->post('kode_gejala'));
		$this->db->update('gejala', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function edit_gejalacf()
	{
		$data = array(
			'gejalacf' =>  $this->input->post('gejalacf'),
			'bobot_pakar' =>  $this->input->post('bobot_pakar')
		);
		$this->db->where('kode_gejalacf', $this->input->post('kode_gejalacf'));
		$this->db->update('gejalacf', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function get_all_penyakit()
	{
		$this->db->select('*');
		$this->db->from('penyakit');
		$this->db->order_by('kode_penyakit', 'ASC');
		return $this->db->get();
	}

	function get_all_penyakitcf()
	{
		$this->db->select('*');
		$this->db->from('penyakitcf');
		$this->db->order_by('kode_penyakitcf', 'ASC');
		return $this->db->get();
	}

	function add_penyakit()
	{
		$this->db->order_by('kode_penyakit', 'Desc');
		$db = $this->db->get('penyakit')->row();

		$lastNumber = (int) substr($db->kode_penyakit, 1);
		$newNumber = $lastNumber + 1;

		$char = "P";
		$newID = $char . $newNumber;

		$isDuplicate = true;
		while ($isDuplicate) {
			$query = $this->db->get_where('penyakit', array('kode_penyakit' => $newID));
			if ($query->num_rows() > 0) {
				$newNumber++;
				$newID = $char . $newNumber;
			} else {
				$isDuplicate = false;
			}
		}

		$data = array(
			'kode_penyakit' => $newID,
			'penyakit' =>  $this->input->post('penyakit'),
			'solusi' =>  $this->input->post('solusi')
		);

		$this->db->insert('penyakit', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function add_penyakitcf()
	{
		$this->db->order_by('kode_penyakitcf', 'Desc');
		$db = $this->db->get('penyakitcf')->row();

		$lastNumber = (int) substr($db->kode_penyakitcf, 1);
		$newNumber = $lastNumber + 1;

		$char = "P";
		$newID = $char . $newNumber;

		$isDuplicate = true;
		while ($isDuplicate) {
			$query = $this->db->get_where('penyakitcf', array('kode_penyakitcf' => $newID));
			if ($query->num_rows() > 0) {
				$newNumber++;
				$newID = $char . $newNumber;
			} else {
				$isDuplicate = false;
			}
		}

		$data = array(
			'kode_penyakitcf' => $newID,
			'penyakitcf' =>  $this->input->post('penyakitcf'),
			'solusicf' =>  $this->input->post('solusicf')
		);

		$this->db->insert('penyakitcf', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function delete_penyakit()
	{

		$this->db->where('kode_penyakit', $this->input->post('kode_penyakit'));
		$this->db->delete('penyakit');

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function delete_penyakitcf()
	{
		$this->db->where('kode_penyakitcf', $this->input->post('kode_penyakitcf'));
		$this->db->delete('penyakitcf');

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	function edit_penyakit()
	{

		$data = array(
			'penyakit' =>  $this->input->post('penyakit'),
			'solusi' =>  $this->input->post('solusi')
		);
		$this->db->where('kode_penyakit', $this->input->post('kode_penyakit'));
		$this->db->update('penyakit', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function edit_penyakitcf()
	{

		$data = array(
			'penyakitcf' =>  $this->input->post('penyakitcf'),
			'solusicf' =>  $this->input->post('solusicf')
		);
		$this->db->where('kode_penyakitcf', $this->input->post('kode_penyakitcf'));
		$this->db->update('penyakitcf', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function get_gejala_penyakit($kode_penyakit)
	{

		$this->db->select('*');
		$this->db->from('basispengetahuan');
		$this->db->join('gejala', 'basispengetahuan.kode_gejala = gejala.kode_gejala', 'left');
		$this->db->where('kode_penyakit', $kode_penyakit);

		return $this->db->get();
	}

	function get_gejalacf_penyakitcf($kode_penyakitcf)
	{

		$this->db->select('*');
		$this->db->from('aturan');
		$this->db->join('gejalacf', 'aturan.kode_gejalacf = gejalacf.kode_gejalacf', 'left');
		$this->db->where('kode_penyakitcf', $kode_penyakitcf);

		return $this->db->get();
	}

	function get_all_basispengetahuan()
	{
		$this->db->select('bp.id, bp.kode_penyakit, p.penyakit, bp.kode_gejala, g.gejala');
		$this->db->from('basispengetahuan bp');
		$this->db->join('penyakit p', 'p.kode_penyakit = bp.kode_penyakit');
		$this->db->join('gejala g', 'g.kode_gejala = bp.kode_gejala');

		return $this->db->get();
	}

	function get_all_aturan()
	{
		$this->db->select('atr.id, atr.kode_penyakitcf, p.penyakitcf, atr.kode_gejalacf, g.gejalacf, atr.cfaturan');
		$this->db->from('aturan atr');
		$this->db->join('penyakitcf p', 'p.kode_penyakitcf = atr.kode_penyakitcf');
		$this->db->join('gejalacf g', 'g.kode_gejalacf = atr.kode_gejalacf');

		return $this->db->get();
	}

	function add_basispengetahuan()
	{

		$data = array(
			'id' => '',
			'kode_penyakit' =>  $this->input->post('kode_penyakit'),
			'kode_gejala' =>  $this->input->post('kode_gejala')
		);

		$this->db->insert('basispengetahuan', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function add_aturan()
	{
		$data = array(
			'kode_gejalacf' =>  $this->input->post('kode_gejalacf'),
			'kode_penyakitcf' =>  $this->input->post('kode_penyakitcf'),
			'cfaturan' =>  $this->input->post('cfaturan')
		);

		$this->db->insert('aturan', $data);

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}


	function delete_basispengetahuan()
	{


		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('basispengetahuan');

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function delete_aturan()
	{


		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('aturan');

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	public function edit_basispengetahuan()
	{
		$data = array(
			'kode_penyakit' =>  $this->input->post('kode_penyakit'),
			'kode_gejala' =>  $this->input->post('kode_gejala')
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('basispengetahuan', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	public function edit_aturan()
	{
		$data = array(
			'kode_penyakitcf' =>  $this->input->post('kode_penyakitcf'),
			'kode_gejalacf' =>  $this->input->post('kode_gejalacf'),
			'cfaturan' =>  $this->input->post('cfaturan')
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('aturan', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	public function get_kondisi_user($id)
	{
		$this->db->select('bobot_user');
		$this->db->from('kondisi');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->kondisi_user;
		} else {
			return null;
		}
	}

	public function get_cfaturan($id)
	{
		$this->db->select('cfaturan');
		$this->db->from('aturan');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->kondisi_user;
		} else {
			return null;
		}
	}

	function get_by_id($id_member)
	{

		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('id_member', $id_member);

		return $this->db->get();
	}

	function get_all_member()
	{

		$this->db->select('*');
		$this->db->from('member');
		$this->db->order_by('id_member', 'Desc');

		return $this->db->get();
	}

	public function update($tabel, $data, $pk, $id)
	{
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($tabel, $id, $val)
	{
		$this->db->delete($tabel, array($id => $val));
	}
}
