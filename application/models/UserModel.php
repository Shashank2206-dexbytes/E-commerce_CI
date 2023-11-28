<?php

class UserModel extends CI_Model
{
    

    public function registerUser($data)
    {
        $this->load->library('encryption');
        $encryptedPassword = $this->encryption->encrypt($data['password']);
        $data['password']= $encryptedPassword;
        return $this->db->insert('users', $data);
    }
}

?>