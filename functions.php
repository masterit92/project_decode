<?php

//Translate
function __($str)
{
    $translate = Zend_Registry::get('Zend_Translate');
    return $translate->_($str);
}

//Add Route static
function Add_Router_Route_Static($route, $defaults, $routeName)
{
    $objRoute = new Zend_Controller_Router_Route_Static($route, $defaults);
    $font = Zend_Controller_Front::getInstance();
    $fontRoute = $font->getRouter();
    $fontRoute->addRoute($routeName, $objRoute);
}

//Add Route Regex
function Add_Router_Route_Regex($route, $defaults, $map, $routeName)
{
    $objRoute = new Zend_Controller_Router_Route_Regex($route, $defaults, $map);
    $font = Zend_Controller_Front::getInstance();
    $fontRoute = $font->getRouter();
    $fontRoute->addRoute($routeName, $objRoute);
}

//Add Route RegRouteex
function Add_Router_Route($route, $defaults, $reqs, $routeName)
{
    $objRoute = new Zend_Controller_Router_Route($route, $defaults, $reqs);
    $font = Zend_Controller_Front::getInstance();
    $fontRoute = $font->getRouter();
    $fontRoute->addRoute($routeName, $objRoute);
}

//Make Title Url
function Make_Title_Url($text)
{
    $make_title = new FTeam_MakeTitleUrl();
    return $make_title->make_title_url($text);
}

//return base url template default
function BaseUrl_Template_Default()
{
    return Zend_Controller_Front::getInstance()->getBaseUrl() . DEFAULT_TEMPLATE_URL;
}

//return base url template admin
function BaseUrl_Template_Admin()
{
    return $this->baseUrl(ADMIN_TEMPLATE_URL);
}

//password
function Password_Generator($str)
{
    $str .= '!%^&@#$%(&)^%';
    return md5(sha1(md5($str)));
}

//check file exits upload forder
function Check_File_Exists_Upload($file)
{
    if (file_exists(PUBLIC_PATH . '/upload/' . $file))
    {
        return TRUE;
    }
    return FALSE;
}


