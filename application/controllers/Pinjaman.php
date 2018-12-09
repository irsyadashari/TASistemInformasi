<?php 

	/**
	 * 
	 */
	class Pinjaman extends CI_Controller
	{
		
		public function index()
		{
			 $data['konten'] = 'pinjam/tampil';
             $this->load->view('template_petugas',$data);
        
		}
	}

 ?>