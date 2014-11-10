<?php

/**
 * Excel Library
 */
require PUBLIC_LIB.'/PHPExcel/PHPExcel.php';
class FTeam_Excel
{
    private $phpExcel;

    private $options = array(
        'filename'    => 'NewSpreadsheet',
        'creator'     => 'Kitagawa',
        'title'       => 'New Spreadsheet',
        'subject'     => 'New Spreadsheet',
        'description' => 'New Spreadsheet',
        'type'        => 'Excel2007',
        'path'        => ''
    );

    private $writerType = array(
        'Excel2007' => 'xlsx',
        'Excel5'    => 'xls'
    );

    private $mimeType = array(
        'Excel2007' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'Excel5'    => 'application/vnd.ms-excel'
    );

    public function __construct(array $options = array())
    {
        $this->phpExcel = new PHPExcel();
        $this->setOptions($options);
    }

    public static function factory(array $options = array())
    {
        $excel = get_class();

        return new $excel($options);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->phpExcel, $name), $arguments);
    }

    public function setOptions(array $options = array())
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    public function setProperties()
    {
        $this->phpExcel->getProperties()->setCreator($this->options['creator'])
            ->setTitle($this->options['title'])
            ->setSubject($this->options['subject'])
            ->setDescription($this->options['description']);

        return $this;
    }

    public function setData(array $data = array())
    {
        foreach ($data as $row => $rowValue) {
            foreach ($rowValue as $col => $colValue) {
                $this->phpExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row + 1, $colValue);
            }
        }
    }

    public function save()
    {
        $fullpath = $this->options['path'];

        if (!$fullpath) {
            $fullpath = sys_get_temp_dir() . DIRECTORY_SEPARATOR;
        }

        $fullpath = $fullpath . $this->options['filename'] . '.' . $this->writerType[$this->options['type']];
        $this->setProperties();
        $writer = PHPExcel_IOFactory::createWriter($this->phpExcel, $this->options['type']);
        $writer->save($fullpath);

        return $fullpath;
    }

    public function send($response)
    {
//        $response = new Response();
//        $response->setStatusCode(Response::STATUS_CODE_200);
//        $response->getHeaders()->addHeaders(array(
//            'HeaderField1' => 'header-field-value',
//            'HeaderField2' => 'header-field-value2',
//        ));
        $response->send_file($this->save(),
            $this->options['filename'] . '.' . $this->writerType[$this->options['type']],
            array(
                'mime_type' => $this->mimeType[$this->options['type']]
            )
        );
    }
}