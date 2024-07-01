<?php
require_once APPPATH . "controllers/base/BaseController.php";
class AuthenticationController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User");
    }

    public function logout()
    {
        $this->session->unset_userdata($this->APP_ID . "_appuser");
        $this->load->mini_layout('auth/logout');
    }
    public function login()
    {
        $this->load->mini_layout('auth/login');
    }
    public function signin(){
        $form_data = $this->input->post(); 
        if($this->User->exists($form_data['username'])){
            $user = $this->User->get(null, ['username' => $this->security->xss_clean($form_data['username'])]);

            if(password_verify($form_data['password'], $user['password'])){
                $this->session->set_userdata($this->APP_ID . "_appuser", $user);
                redirect($form_data['referrer']);
            } else {
                print_r($user);
            }
        }
    }

}
