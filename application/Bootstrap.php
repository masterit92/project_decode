<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    //Session
    protected function _intSession(){
        Zend_Session::start();
    }
    //cau hinh ket noi db
    protected function _initDb(){	
        $optionResources = $this->getOption('resources');
        $dbOption = $optionResources['db'];
        $dbOption['params']['host'] = '210.211.122.243';
        $dbOption['params']['username'] = 'decodec1_binhpt';
        $dbOption['params']['password'] = 'phanthebinh';
        $dbOption['params']['dbname'] = 'decodec1_db_project_decode';
        
//        $dbOption['params']['host'] = 'localhost';
//        $dbOption['params']['username'] = 'root';
//        $dbOption['params']['password'] = '123456';
//        $dbOption['params']['dbname'] = 'db_project_decode';

        $adapter = $dbOption['adapter'];
        $config = $dbOption['params'];

        $db = Zend_Db::factory($adapter,$config);
        $db->setFetchMode(Zend_Db::FETCH_ASSOC);
        $db->query("SET NAMES 'utf8'");
        $db->query("SET CHARACTER SET 'utf8'");

        Zend_Registry::set('connectDb',$db);

        Zend_Db_Table::setDefaultAdapter($db);

        return $db;
    }
}