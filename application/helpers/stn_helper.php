<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('stn')){
   function stn( $datafield=null,$value=null ){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       if( !empty($datafield) && !empty($value) ){
           return unserialize($datafield)[$value];
       }else if(!empty($datafield) && empty($value)){
           return unserialize($datafield);
       }
   }
}

