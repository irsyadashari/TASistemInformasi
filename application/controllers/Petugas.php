<?php
class Petugas extends CI_Controller {

        public function index()
        {
               $this->load->model('m_data');
               $data["fetch_data"] = $this->m_data->fetch_data();
        	   $data["konten"] = 'petugas/tampil';
               $this->load->view('template_petugas',$data);
        }

        public function form_validation()
        {
        	   
               $this->load->library('form_validation');
               $this->form_validation->set_rules("nama","Nama",'required');
               $this->form_validation->set_rules("username","Username",'required');
               $this->form_validation->set_rules("password","Password",'required');
               $this->form_validation->set_rules("pekerjaan","Pekerjaan",'required');
               $this->form_validation->set_rules("email","Email",'required');


            if($this->form_validation->run())
            {
               
                $this->load->model("m_data");
                $data = array(
                        "nama_lengkap"  =>$this->input->post("nama"),
                        "username"      =>$this->input->post("username"),
                        "password"      =>$this->input->post("password"),
                        "pekerjaan"     =>$this->input->post("pekerjaan"),
                        "email"         =>$this->input->post("email")
                );


                if($this->input->post("update"))
                {
                    $this->m_data->update_data($data,$this->input->post("hidden_id"));
                    redirect(base_url() . "Petugas/updated");
                }

                if($this->input->post("insert"))
                {
                    $this->m_data->insert_data($data);

                    redirect(base_url() . "Petugas/inserted");
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
            $this->load->model("m_data");
            $this->m_data->delete_data($id);
            redirect(base_url() . "Petugas/deleted");
        }

        public function deleted()
        {
            $this->index();
        }

        public function update_data() /*REDIRECT KE LAMAN HTML KOSONG YANG SUDAH KUEDIT SEDIKIT*/
        {
            $user_id = $this->uri->segment(3);
            $this->load->model("m_data");

            $data["user_data"]= $this->m_data->fetch_single_data($user_id);
            $data["fetch_data"]= $this->m_data->fetch_data();
            $data["konten"] = 'petugas/tampil';
            $this->load->view('template_petugas',$data);
        }

        public function updated()
        {
            $this->index();
        }

}