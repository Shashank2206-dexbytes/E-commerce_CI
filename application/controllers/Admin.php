<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function validate_password($str) 
    {
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/', $str)) 
        {
            $this->form_validation->set_message('validate_password', 'The {field} must contain at least one letter, one number, and one special character.');
            return FALSE;
        }
        return TRUE;
    }
    
	public function index()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Adminemail','adminemail','required');
        $this->form_validation->set_rules('Adminpassword','adminpassword','required|callback_validate_password');
        if($this->form_validation->run())
        {
            $email=$this->input->post('Adminemail');
            $password=$this->input->post('Adminpassword');
            $this->load->model('login');
            $id=$this->login->isvalidate($email,$password);
            if($id)
            {
                $this->load->library('session');
                $this->session->set_userdata('id',$id);
                $this->load->view('Dashboard/dashboardlogin');
            }
            else
            {
                $this->session->set_flashdata('error', 'Login or Password is incorrect');
                redirect('Admin');
            }
        }
        else
        {
            $this->load->view('Admin/admin_login');
        }
       
	}

    public function logout() 
    {
        $this->session->sess_destroy();
        redirect('Admin/index'); 
    }

}
      

?>
