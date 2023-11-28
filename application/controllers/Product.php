<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$this->load->model('ProductModel');
		$getproduct['product']=$this->ProductModel->selectproduct();
		$this->load->view('product',$getproduct);
	}

	public function selectproduct()
    {
        $this->index();
        if($this->input->server('REQUEST_METHOD') == 'POST')
         {
        
            $selectcategory = array(
                'product_name' => $this->input->post('product_name'),
                'product_description' => $this->input->post('product_description'),
                'product_price'=>$this->input->post('product_price'),
                'discount'=>$this->input->post('discount'),
                'sku_no'=>$this->input->post('sku_no'),
                'product_quantity'=>$this->input->post('product_quantity'),
                'launch_date'=>$this->input->post('launch_date'),
                'category_id'=>$this->input->post('category_id'),
            );

            // $this->CategoryModel->addcategory($selectcategory);
            // $this->session->set_flashdata('success', 'Product added successfully');
        }
    }

    public function active_status_user($product_id)
    {
        $data['status'] = 0 ;
        $this->db->where('product_id', $product_id);
        $result = $this->db->update('product',$product_id);
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
        redirect('product'); 
    }
          
          
          
    public function deactiv_status_user($product_id)
    {
        $data['status'] = 1 ;
        $this->db->where('product_id',$product_id);
        $result = $this->db->update('product',$product_id);
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
        redirect('product');
                    
    }

    public function add_product()
    {
        $this->load->view('add_product');
    }

    
}
    

?>
