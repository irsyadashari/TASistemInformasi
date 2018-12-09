<?php 
 
class model_anggota extends CI_Model{

	function insert_data($data){
		$this->db->insert("anggota",$data);
	}

	function delete_data($id){
		$this->db->where("id_anggota",$id);
		$this->db->delete("anggota");

	}

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


	function update_data($data,$id)
	{
		$this->db->where("id_anggota",$id);
		$this->db->update("anggota",$data);

		//UPDATE operator SET * where id = $id
	}

}
?>