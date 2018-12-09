<?php
class Simpanan extends CI_Controller {

        public function index()
        {
               $this->load->model('model_simpanan');
               $data["fetch_data"] = $this->model_simpanan->fetch_data();
        	   $data["konten"] = 'simpanan/tampil';
               $this->load->view('template_petugas',$data);
        }
}