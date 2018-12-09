<?php 
 
class model_simpanan extends CI_Model{


	function fetch_single_data($id)
	{
		$this->db->where("id_anggota",$id);
		$query = $this->db->get("anggota");
		return $query;
		//SELECT * FROM operator where id = '$id'
	}


	function fetch_data(){

		$query = $this->db->get("anggota");

		return $query;
	}
	
}
?>