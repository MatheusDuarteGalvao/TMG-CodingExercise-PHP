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
        if (empty($this->value) && !preg_match('/^[a-zA-Z0-9]+$/', $this->value))
            return false;

        return true;
    }
}
