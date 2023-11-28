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

          
        }
    }

    public function add_product()
    {
        $this->load->view('add_product');
    }

    
}
    

?>
