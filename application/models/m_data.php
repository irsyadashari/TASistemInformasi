<?php 
 
class M_data extends CI_Model{

	function insert_data($data){
		$this->db->insert("operator",$data);
	}

	function delete_data($id){
		$this->db->where("id_username",$id);
		$this->db->delete("operator");

	}

	function fetch_single_data($id)
	{
		$this->db->where("id_username",$id);
		$query = $this->db->get("operator");
		return $query;
		//SELECT * FROM operator where id = '$id'
	}


	function fetch_data(){

		$query = $this->db->get("operator");

		return $query;
	}


	function update_data($data,$id)
	{
		$this->db->where("id_username",$id);
		$this->db->update("operator",$data);

		//UPDATE operator SET * where id = $id
	}

}
?>