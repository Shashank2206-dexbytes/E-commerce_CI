<?php
 class CategoryModel extends CI_Model{

    /**
     * Select the Category 
     */
    public function selectcategory(){
        $this->db->select('c1.id, c1.name, c1.description,c1.image,c1.parent_category,c2.name AS parent_category_name,c1.status');
        $this->db->from('category c1');
        $this->db->join('category c2', 'c1.parent_category = c2.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Add the Category
     */
    public function addcategory($data) {
        $this->db->insert('category', $data);
    }   

  
    /**
     * Save the data in the edit feild 
     */
	public function editcategory($id){
        
       $this->db->select('c1.id, c1.name, c1.description, c1.image, c1.parent_category, c2.name AS parent_category_name, c1.status');
        $this->db->join('category c2', 'c1.parent_category = c2.id', 'left');
        $this->db->where("c1.id", $id); 
        $row = $this->db->get('category c1')->row_array();

        return $row;
    }

    /**
     * Update the Category
     */

    public function updatecategory($id,$fromArray){
        $this->db->where('id',$id);
        $this->db->update('category',$fromArray);
    }


    /**
     * Update the Category with same image
     */

    public function updatecategorynotimage($id,$formArraynotimage){
        $this->db->where('id',$id);
        $this->db->update('category',$formArraynotimage);
    }

    /**
     * check the duplicate entry
     */
    public function duplicateCheck($name)
    {
        $this->db->select("COUNT(*) as count");
        $this->db->where('name', $name);
        $duplicateData = $this->db->get('category');
        return $duplicateData->row_array();
    }

    /**
     * check the status is active
     */
    public function active($id)
    {
        $data['status'] = 0 ;
        $this->db->where('id', $id);
        $result = $this->db->update('category',$data);
        return $result;
    }

     /**
     * check the status is deactive
     */
          
    public function deactive($id)
    {
        $data['status'] = 1 ;
        $this->db->where('id',$id);
        $result = $this->db->update('category',$data);
        return $result;
                    
    }

    
 }

?>