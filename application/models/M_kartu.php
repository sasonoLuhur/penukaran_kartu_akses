<?php 

class M_kartu extends CI_Model{

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function get_jumlah_masuk_hari_ini(){
    $result = $this->db->query("SELECT COUNT(*) as jumlah FROM pengunjung WHERE tanggal = CURDATE();")->row();
    return $result->jumlah;
}
function get_jumlah_masuk_tahun_ini(){
    $result = $this->db->query("SELECT COUNT(*) as jumlah FROM pengunjung WHERE YEAR(tanggal) = YEAR(CURDATE());")->row();
    return $result->jumlah;
}
		
}
?>