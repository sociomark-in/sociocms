<?php
require_once APPPATH . "controllers/base/BaseController.php";
class RBAController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata($this->APP_ID . "_appuser")){
            redirect('login');
        }
    }
}
