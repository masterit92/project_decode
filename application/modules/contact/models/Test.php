<?php
class Contact_Model_Test extends Zend_Db_Table{
	
	public function test(){
		echo '<br>' . __METHOD__;
	}

    public function saveFaqs($data){
            $this->insert($data);
    }
}