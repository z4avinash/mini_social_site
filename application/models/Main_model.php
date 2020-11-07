<?php
class Main_model extends CI_model
{
    //insert user to the database
    public function insertUserToDB($formData)
    {
        $this->db->insert('users', $formData);
    }

    //fetching password and for the user verification
    public function checkUser($login_username)
    {
        return $this->db->select('password,user_id')->from('users')->where('username', $login_username)->get()->row_array();
    }

    //fetch the data of specific user to display in dashboard
    public function getUserData($user_id)
    {
        return $this->db->select('full_name,profile,created_at')->from('users')->where('user_id', $user_id)->get()->row_array();
    }

    //fetch all users data present in database
    public function getAllUsers()
    {
        return $this->db->select('full_name,profile,gender,username,user_id,created_at')->from('users')->get()->result_array();
    }
}
