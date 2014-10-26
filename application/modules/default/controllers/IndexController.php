<?php

class IndexController extends FTeam_Controller_Action
{

    protected $class_body = 'home';

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $option = new Admin_Model_Options();
        $this->view->options_home_banner = $option->get_options_fontend(HOME_BANNER );
        $this->view->options_home_decode = $option->get_options_fontend(HOME_DECODE);
        $this->view->options_home_video = $option->get_options_fontend(HOME_VIDEO);
    }
}
