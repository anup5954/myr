<?php
class Forgot_password_model extends MY_Model
{

function mail_exists($key)
{
    $this->db->where('user_email',$key);
    $query = $this->db->get('users');
    if ( $query->num_rows() ==1 ){
        return true;
    }
    else{
        return false;
    }
}

function reset_password(){
    $query = $this->db->where(['user_email'=>$this->input->post('user_email')])->update('users',['user_password'=>rand()]);
    $q = $this->db->where(['user_email'=>$this->input->post('user_email')])->get( 'users' );
	
    if ( $q ){
        return $q->row()->user_password;		
    }
    else{
        return false;
    }
}

} //End Model