<?php

class FTeam_UploadFile
{

    protected $messages = NULL;
    protected $file_name = array();

    public function upload()
    {
        try
        {
            $adapter = new Zend_File_Transfer_Adapter_Http();
            $adapter->addValidator('Count', false, array('min' => 1, 'max' => 5))
                    ->addValidator('Size', false, array('max' => 5000000))
                    ->addValidator('Extension', false, array('extension' => 'jpg,png,gif', 'case' => true));
            $files = $adapter->getFileInfo();
            foreach ($files as $fileinfo)
            {
                if (($adapter->isUploaded($fileinfo['name'])) && ($adapter->isValid($fileinfo['name'])))
                {
                    $extension = substr($fileinfo['name'], strrpos($fileinfo['name'], '' . '') + 1);
                    $filename = rand(99, 99999) . '_' . date('Ymdhs') . '.' . $extension;
                    $adapter->setFilters(array(new Zend_Filter_File_Rename(array('target'=>PUBLIC_PATH . '/upload/' . $filename, 'overwrite'=>true))));
                    if ($adapter->receive($fileinfo['name']))
                    {
                        $this->file_name[] = $filename;
                    }
                }
            }
            $this->messages = $adapter->getMessages();
            if (count($this->messages) ===  0)
            {
                return TRUE;
            }
        }
        catch (Exception $ex)
        {
            $this->messages = $ex->getMessage();
        }
        return FALSE;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getListFile()
    {
        return $this->file_name;
    }

}
