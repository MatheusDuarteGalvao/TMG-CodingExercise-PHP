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
}
