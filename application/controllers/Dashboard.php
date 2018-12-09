<?php 

class Dashboard extends CI_Controller
{
	
	public function index()
	{
		$data['konten'] = 'konten';
        $this->load->view('template_petugas',$data);
        
	}
}
 ?>