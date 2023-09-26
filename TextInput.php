<?php
require_once 'Input.php';
class TextInput extends Input
{
    /**
     * Constructor method
     * @param string $name
     * @param string $label
     * @param string $value
     */
    public function __construct($name, $label, $value = '')
    {
        parent::__construct('text', $name, $label, $value);
    }

    /**
     * Method responsible for validation
     * @return boolean
     */
    public function isValid()
    {
        if ($this->isRequired() && empty($this->getValue()))
            return false;

        if (!preg_match('/^[a-zA-Z0-9]+$/', $this->getValue()))
            return false;

        return true;
    }
}
