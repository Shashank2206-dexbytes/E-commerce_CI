<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('UserModel');
    }

    public function index()
    {
        
        $this->load->view('auth/register.php');
        
    
    }

    public function register()
    {
        
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        
        if($this->form_validation->run() == FALSE)
        {
            // failed
            $this->index();
        }
        else
        {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
                
            );
            $register_user = new UserModel;
            $checking = $register_user->registerUser($data);
            if($checking)
            {
                $this->session->set_flashdata('status','Registered Successfully.! Go to Login');
                redirect(base_url('register'));
            }
            else
            {
                $this->session->set_flashdata('status','Something Went Wrong.!');
                redirect(base_url('register'));
            }
        }
    }
}

?>