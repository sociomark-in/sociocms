<?php

class BaseController extends CI_Controller
{
    public $APP_ID;
    public $SITE_URL;
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->APP_ID = "vcdojtxev66laxb1";
        $this->SITE_URL = "https://www.v3staffing.in";
        $this->data['APP_ID'] = "vcdojtxev66laxb1";
        $this->data['SITE_URL'] = "https://www.v3staffing.in";
    }
}
