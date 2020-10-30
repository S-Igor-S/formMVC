<?php

namespace classes;

class FormHandler
{
    public $errors = [];
    public function sintaxValidation()
    {
        $inputConfig = require_once CONFIGS_PATH."InputConfig.php";;
        foreach ($_REQUEST as $key => $element) 
        {
            if (in_array($key, array_keys($inputConfig))) 
            {
                if(!preg_match($inputConfig[$key], $element)) 
                {
                    array_push($this->errors, $errorsConfig['syntaxError'][$key]);
                    unset($_REQUEST[$key]);
                }
            }
        }
    }
    public function logicValidation()
    {
        $errorsConfig = require_once CONFIGS_PATH."ErrorsConfig.php";
        foreach ($errorsConfig['logicError'] as $key => $error) 
        {
            switch ($key) 
            {
                case 'age':
                    if (isset($_REQUEST['age']) && ($_REQUEST['age'] > 127 || $_REQUEST['age'] < 10)) 
                    {
                        array_push($this->errors, $errorsConfig['logicError'][$key]);
                        unset($_REQUEST['age']);
                    }
                    break;
                case 'file':
                    if (empty($_FILES['file']['name'])) 
                    {
                        array_push($this->errors, $errorsConfig['logicError'][$key]);
                    }
                    break;
            }
        }
    }
    public function setCookie()
    {
        foreach ($_REQUEST as $key => $value) {
            if (gettype($_REQUEST[$key]) == "array") {
                setcookie($key, serialize($value), time() + 3600 * 24 * 30, '/');
            } else {
                setcookie($key, $value, time() + 3600 * 24 * 30, '/');
            }        
        }
    }
}
?>