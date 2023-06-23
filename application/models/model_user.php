<?php
class model_user extends CI_Model
{

	function diagnosa()
	{

		$gejala = $this->input->post('kode_gejala');
		$jumlah_dipilih = count($gejala);
		for ($x = 0; $x < $jumlah_dipilih; $x++) {

			$this->db->query("select DISTINCT p.kode_penyakit, p.penyakit from basispengetahuan b, penyakit p where b.kode_gejala='$gejala[$x]' and p.kode_penyakit=b.kode_penyakit group by kode_penyakit");

			return $this->db->get();
		}
	}
}
