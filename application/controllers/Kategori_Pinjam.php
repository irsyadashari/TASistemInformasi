<?php 

	/**
	 * 
	 */
	class Kategori_Pinjam extends CI_Controller
	{
		
		public function index()
		{
			 $data['konten'] = 'pinjam_kategori/tampil';
             $this->load->view('template_petugas',$data);
        
		}
	}

 ?>