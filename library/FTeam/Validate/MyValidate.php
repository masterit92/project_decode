<?php

class FTeam_Validate_MyValidate
{

    protected $messages = array();
    protected $value = array();

    public function isValid($arr_fields = array(), $arr_messages = array())
    {
        $error = TRUE;
        if (count($arr_fields) > 0)
        {
            foreach ($arr_fields as $fields => $validate)
            {
                $value = Zend_Controller_Front::getInstance()->getRequest()->getParam($fields, '');
                if (is_array($validate))
                {
                    foreach ($validate as $vali)
                    {
                        if (!$vali->isValid($value))
                        {
                            $mess = $vali->getMessages();
                            if (isset($arr_messages[$fields]) && is_array($arr_messages[$fields]))
                            {
                                foreach ($arr_messages[$fields] as $key => $mess_val)
                                {
                                    $mess[$key] = $mess_val;
                                }
                            }
                            $this->messages[$fields][] = current($mess);
                            $error = FALSE;
                        }
                        else
                        {
                            $this->value[$fields] = $value;
                        }
                    }
                }
                else
                {
                    if (!$validate->isValid($value))
                    {
                        $error = FALSE;
                        $mess = $validate->getMessages();
                        if (isset($arr_messages[$fields]) && is_array($arr_messages[$fields]))
                        {
                            foreach ($arr_messages[$fields] as $key => $mess_val)
                            {
                                $mess[$key] = $mess_val;
                            }
                        }
                        $this->messages[$fields][] = current($mess);
                    }
                    else
                    {
                        $this->value[$fields] = $value;
                    }
                }
            }
        }
        return $error;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getValue()
    {
        return $this->value;
    }

}
