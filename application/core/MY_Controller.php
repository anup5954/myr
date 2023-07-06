<?php
/**
 * Description of MY_Controller
 *
 * @author RME
 */
class MY_Controller extends CI_Controller {

public function __construct(){
parent::__construct();
if( ! $this->session->userdata('user_id') )
{
return redirect('login');
}

}

/*class ADMIN_Controller extends MY_Controller {
  public function __construct()
{
    parent::__construct();
    if( $this->session->userdata('userId') &&  $this->session->userdata('authority')!='admin' )
    {
return redirect('/');
    }
}
}

class SUP_Controller extends MY_Controller {
  public function __construct()
{
    parent::__construct();
    if( $this->session->userdata('userId') &&  $this->session->userdata('authority')!='supplier' )
    {
return redirect('/');
    }
}
}*/

public function msg($data,$r,$m){

if($data==true){
$this->session->set_flashdata('s_msg', 'Data Successfully '.$m.'.');
}else{
$this->session->set_flashdata('s_msg', 'Data Not '.$m.'.');
}
return redirect($r);

}

public function img_upload( $image=null ){

$img = $_FILES[$image]['name'];

if($img != ""){

$config=[

"upload_path"=>"./assets/uploads/",

"allowed_types"=>"gif|png|jpg|jpeg|PNG|JPEG"

];

$this->load->library( "upload",$config );

$this->upload->do_upload( $image );

$fileData = $this->upload->data();

return $img_name = $fileData['file_name'];

}else{

return $img_name = '';

}

}

}

class MY_Administrator extends CI_Controller {

}

class MY_FrontEnd extends CI_Controller {

}