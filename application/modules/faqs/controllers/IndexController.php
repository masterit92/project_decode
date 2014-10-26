<?php

class Faqs_IndexController extends FTeam_Controller_Action
{

    protected $class_body = 'faq';

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $faqs = new Admin_Model_Faqs();
        $this->view->faqs = $faqs->getFaqs(1, 1, FALSE);
    }

}
