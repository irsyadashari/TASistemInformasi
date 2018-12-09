<?php
class Anggota extends CI_Controller {

        public function index()
        {
               $this->load->model('model_anggota');
               $data["fetch_data"] = $this->model_anggota->fetch_data();
        	   $data["konten"] = 'anggota/tampil';
               $this->load->view('template_petugas',$data);
        }

        public function form_validation()
        {
        	   //echo 'ok';
               $this->load->library('form_validation');
               $this->form_validation->set_rules("nama","Nama",'required');
               $this->form_validation->set_rules("jurusan","Jurusan",'required');
               $this->form_validation->set_rules("simpanan","Simpanan",'required|numeric');
               $this->form_validation->set_rules("email","Email",'required');


            if($this->form_validation->run())
            {
               
                $this->load->model("model_anggota");
                $data = array(
                        "nama_lengkap"  =>$this->input->post("nama"),
                        "jurusan"       =>$this->input->post("jurusan"),
                        "simpanan"      =>$this->input->post("simpanan"),
                        "email"         =>$this->input->post("email")
                );


                if($this->input->post("update"))
                {
                    $this->model_anggota->update_data($data,$this->input->post("hidden_id"));
                    redirect(base_url() . "Anggota/updated");
                }

                if($this->input->post("insert"))
                {
                    $this->model_anggota->insert_data($data);

                    redirect(base_url() . "Anggota/inserted");
                }

                

            }
            else
            {
             $this->index();
            }

        }

        public function inserted()
        {
                $this->index();
        }

        public function delete_data()
        {
            $id = $this->uri->segment(3);
            $this->load->model("model_anggota");
            $this->model_anggota->delete_data($id);
            redirect(base_url() . "Anggota/deleted");
        }

        public function deleted()
        {
            $this->index();
        }

        public function update_data() /*REDIRECT KE LAMAN HTML KOSONG YANG SUDAH KUEDIT SEDIKIT*/
        {
            $user_id = $this->uri->segment(3);
            $this->load->model("model_anggota");

            $data["user_data"]= $this->model_anggota->fetch_single_data($user_id);
            $data["fetch_data"]= $this->model_anggota->fetch_data();
            $data["konten"] = 'anggota/tampil';
            $this->load->view('template_petugas',$data);
        }

        public function updated()
        {
            $this->index();
        }

}