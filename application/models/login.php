<?php
 class login extends CI_Model{

    public function isvalidate($email,$password)
    {
        $q=$this->db->get_where('users',['email'=>$email,'password'=>$password]);

        if($q->num_rows())
        {
            return $q->row()->id;
        }
        else
        {
            return false;
        }
    }
 }

?>