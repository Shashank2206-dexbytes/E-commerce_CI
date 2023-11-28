<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		$this->load->model('CategoryModel');
		$getcategory['category']=$this->CategoryModel->selectcategory();
		$this->load->view('category',$getcategory);
	}

	public function selectcategory()
    {
        $this->index();
        if ($this->input->server('REQUEST_METHOD') == 'POST')
         {
        
            $selectcategory = array(
                'name' => $this->input->post('category_name'),
                'description' => $this->input->post('category_description'),
                'image'=>$this->input->post('category_image'),
                'parent_category'=>$this->input->post('parent_category'),
            );
        }
    }

    public function active_status_user($id)
    {
        $this->load->model('CategoryModel');
		$result=$this->CategoryModel->active($id);
        if ($result == 1) 
        {
            $this->session->set_flashdata('success', "Status has been change successfully");
            $this->session->set_flashdata('success', 'Status has been change successfully');
        }
        else 
        {
            $this->session->set_flashdata('danger', 'Status not update successfully');
            $this->session->set_flashdata('danger', 'Status not update successfully');  
        }
        redirect('category'); 
    }
          
          
    
    public function deactiv_status_user($id)
    {
        $this->load->model('CategoryModel');
		$getstatus=$this->CategoryModel->deactive($id);
        
        if ($result == 1)
        {
            $this->session->set_flashdata('success', "Status has been change successfully");
            $this->session->set_flashdata('success', 'Status has been change successfully');
        }
        else 
        {
            $this->session->set_flashdata('danger', 'Status not update successfully');
            $this->session->set_flashdata('danger', 'Status not update successfully');
        }
            redirect('category');
                    
    }

    public function addcategory()
    {
        $this->load->model('CategoryModel');
        $getcategory['category']=$this->CategoryModel->selectcategory();

        $this->load->view('add_category',$getcategory);
        
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category_name', 'Category Name', 'required');
            $this->form_validation->set_rules('category_description', 'Category Description', 'required');
            
            try {
                if ($this->form_validation->run() == FALSE) 
                {
                    $this->load->view('add_category');
                } 
                else 
                {
                
                    $categoryData = array(
                        'name' => $this->input->post('category_name'),
                        'description' => $this->input->post('category_description'),
                        'image'=>$this->input->post('category_image'),
                        'parent_category'=>$this->input->post('parent_category'),
                    );

                        $this->load->model('CategoryModel');
                        $checkdata = $this->CategoryModel->duplicateCheck($categoryData['name']);

                        if ($checkdata['count'] > 0) 
                        {
                            echo "<script>alert('Category with the same name already exists!')</script>";
                        } 
                        else
                        {
                            $categoryData = array(
                                'name' => $this->input->post('category_name'),
                                'description' => $this->input->post('category_description'),
                                'image'=>$this->input->post('category_image'),
                                'parent_category'=>$this->input->post('parent_category'),
                            );
                            $this->load->model('CategoryModel');
                            $this->CategoryModel->addcategory($categoryData);
            
                            $this->session->set_flashdata('success', 'Product added successfully');
                            redirect(base_url().'category');
                        }
                }
            } catch (Exception $e) {
                echo 'Exception: ' . $e->getMessage();
            }
        }
    }
    
        
    

    public function editcategory($id)
    {
        $this->load->model('CategoryModel');
    
        if ($this->input->post()) {
            $formArray = array(
                'name' => $this->input->post('category_name'),
                'description' => $this->input->post('category_description'),
                'image' => $this->input->post('category_image'),
                'parent_category' => $this->input->post('parent_category')
            );

            $formArraynotimage = array(
                'name' => $this->input->post('category_name'),
                'description' => $this->input->post('category_description'),
                'parent_category' => $this->input->post('parent_category')
            );

            if(!empty($formArray['image']))
            {
                $this->CategoryModel->updatecategory($id, $formArray);
                $this->session->set_flashdata('success', 'Record Update Successfully');
                redirect(base_url().'category');
            }
            else
            {
                $this->CategoryModel->updatecategorynotimage($id, $formArraynotimage);
                $this->session->set_flashdata('success', 'Record Update Successfully');
                redirect(base_url().'category');
            }

        } 
        else 
        {
            $data = array();
            $data['edit'] = $this->CategoryModel->editcategory($id);
            $getcategory['category'] = $this->CategoryModel->selectcategory();
            $data['category'] = $getcategory['category'];
            $this->load->view('edit_category', $data);
        }
    }
		
    
}


?>
