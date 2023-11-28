<?php
 class ProductModel extends CI_Model{

    /**
     * Select the Product 
     */
    public function selectproduct(){
        $this->db->select('c2.product_id,c2.product_name,c2.product_quantity,c2.product_price,c2.status,c1.name AS product_category_name');
        $this->db->from('category c1');
        $this->db->join('product c2', 'c1.id = c2.category_id', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function toggleStatus($product_id){
        $this->db->select('status');
        $this->db->from('product');
        $this->db->where('product_id',$product_id);
        $this->db->get();
    }
    

    
 }

?>