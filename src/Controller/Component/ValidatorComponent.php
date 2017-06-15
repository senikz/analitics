<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

class ValidatorComponent extends Component
{
    private $lastErrors;

    public function getLastError()
    {
        if (!empty($this->lastErrors)) {
            return array_shift($this->lastErrors);
        }
        return false;
    }

    public function getLastErrors()
    {
        return $this->lastErrors;
    }

    public function required($data, $fields, $strict = false)
    {
        $isValid = true;
        $this->lastErrors = [];

        foreach ($fields as $key) {
            if (!isset($data[$key])
                || (empty($data[$key]) && $data[$key] !==0)
                || ($strict && (empty($data[$key]) || $data[$key] ===0))) {
                $isValid = false;
                $this->lastErrors[] = sprintf(MSG_ERROR_FIELD, $key);
            }
        }

        return $isValid;
    }
}
