<?php

$config = [

'login_validations' => 	[
[
'field'=>'user_email',
'label'=>'Email',
'rules'=>'trim|required|valid_email'
],
[
'field'=>'user_password',
'label'=>'Password',
'rules'=>'required|min_length[8]|max_length[20]|trim'
]
],
'register_validations' => 	[
[
'field'=>'user_f_name',
'label'=>'First Name',
'rules'=>'trim|required'
],
[
'field'=>'user_l_name',
'label'=>'Last Name',
'rules'=>'required|trim'
],
[
'field'=>'user_email',
'label'=>'Email',
'rules'=>'required|trim|required|valid_email|is_unique[users.user_email]'
],
[
'field'=>'user_password',
'label'=>'Password',
'rules'=>'required|min_length[8]|max_length[20]|trim'
],
[
'field'=>'passconf',
'label'=>'Password',
'rules'=>'trim|required|matches[user_password]'
],
[
'field'=>'user_authority',
'label'=>'Authority',
'rules'=>'trim|required'
],
[
'field'=>'user_phone',
'label'=>'Phone',
'rules'=>'trim|required|numeric'
]
]


];