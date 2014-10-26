<?php

class FTeam_Controller_Action extends Zend_Controller_Action
{

    protected $class_body = 'home';
    protected $_currentController;
    protected $languages = DEFAULT_LANGUAGES;

    public function init()
    {
        $this->loadTemplate(DEFAULT_TEMPLATE);
        $this->view->class_body = $this->class_body;
        $this->changLanguages();
        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['module'] . '/' . $this->_arrParam['controller'];
        $this->view->currentController = $this->_currentController;
        $this->getConfigsGeneral();
    }

    protected function loadTemplate($template_path, $fileConfig = 'template.ini', $sectionConfig = 'template')
    {

        //Xoa nhung du cua layout truoc
        $this->view->headTitle()->set('');
        $this->view->headMeta()->getContainer()->exchangeArray(array());
        $this->view->headLink()->getContainer()->exchangeArray(array());
        $this->view->headScript()->getContainer()->exchangeArray(array());

        $filename = $template_path . "/" . $fileConfig;
        $section = $sectionConfig;
        $config = new Zend_Config_Ini($filename, $section);
        $config = $config->toArray();

        $baseUrl = $this->_request->getBaseUrl();
        $templateUrl = $baseUrl . $config['url'];
        $cssUrl = $templateUrl . $config['dirCss'];
        $jsUrl = $templateUrl . $config['dirJs'];
        $imgUrl = $templateUrl . $config['dirImg'];

        //Nap title cho layout
        $this->view->headTitle($config['title']);

        //Nap cac the meta vao layout
        if (count($config['metaHttp']) > 0) {
            foreach ($config['metaHttp'] as $key => $value) {
                $tmp = explode("|", $value);
                $this->view->headMeta()->appendHttpEquiv($tmp[0], $tmp[1]);
            }
        }

        if (count($config['metaName']) > 0) {
            foreach ($config['metaName'] as $key => $value) {
                $tmp = explode("|", $value);
                $this->view->headMeta()->appendName($tmp[0], $tmp[1]);
            }
        }

        //Nap cac tap tin CSS vao layout
        if (count($config['fileCss']) > 0) {
            foreach ($config['fileCss'] as $key => $css) {
                $this->view->headLink()->appendStylesheet($cssUrl . $css, 'screen');
            }
        }

        //Nap cac tap tin javascript cho layout
        if (count($config['fileJs']) > 0) {
            foreach ($config['fileJs'] as $key => $js) {
                $this->view->headScript()->appendFile($jsUrl . $js, 'text/javascript');
            }
        }

        $this->view->templateUrl = $templateUrl;
        $this->view->cssUrl = $cssUrl;
        $this->view->jsUrl = $jsUrl;
        $this->view->imgUrl = $imgUrl;

        $option = array('layoutPath' => $template_path, 'layout' => $config['layout']);
        Zend_Layout::startMvc($option);
    }

    protected function changLanguages()
    {
        $_lang = $this->getRequest()->getParam('lang');
        $languages = New Zend_Session_Namespace('languages');
        if (!empty($_lang)) {
            $languages->languages = $_lang;
        }
        if (empty($languages->languages)) {
            $languages->languages = DEFAULT_LANGUAGES;
        }
        $locale = $languages->languages;
        $module = $this->_request->getModuleName();
        $file = APPLICATION_PATH . '/languages/' . $module . '/' . $locale . '/' . 'lang.php';
        $option = array(
            'adapter' => 'array',
            'content' => $file,
            'locale' => $locale
        );
        $this->languages = $locale;
        $translate = new Zend_Translate($option);
        Zend_Registry::set('Zend_Translate', $translate);
    }

    protected function getConfigsGeneral()
    {
        $option = new Admin_Model_Options();
        $this->view->options_logo = $option->get_options_fontend(GLOBAL_LOGO);
        $this->view->options_menu = $option->get_options_fontend(GLOBAL_MENU_TOP);
    }

    protected function response($html = '', $isCorrect = true, $err = '')
    {
        $aryResponse = array(
            'html' => $html,
            'isCorrect' => $isCorrect,
            'error' => $err
        );
        return $this->_response->setBody(Zend_Json::encode($aryResponse));
    }

}
