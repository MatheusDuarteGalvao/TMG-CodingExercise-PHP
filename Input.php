<?php
class Input
{

    /**
     * Input type
     * @var string
     */
    protected $type;

    /**
     * Input name
     * @var string
     */
    protected $name;

    /**
     * Input value
     * @var string
     */
    protected $value;

    /**
     * Input label
     * @var string
     */
    protected $label;

    /**
     * Required status on the input
     * @var bool
     */
    protected $required;

    public function __construct($type, $name, $label, $value)
    {
        $this->type     = $type;
        $this->name     = $name;
        $this->value    = $value;
        $this->label    = $label;
        $this->required = false;
    }

    /**
     * Method responsible for returning the input name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Method responsible for returning the input value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Method responsible for returning the input label
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Method responsible for setting the required status for the input
     * @return void
     */
    public function setRequired($required = true)
    {
        $this->required = $required;
    }

    /**
     * Method responsible for setting the value for the input
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Method responsible for validate the required status for the input
     * @return void
     */
    public function isRequired()
    {
        return $this->required == true;
    }

    /**
     * Method responsible for validation
     * @return boolean
     */
    public function isValid()
    {
        return !empty($this->value);
    }

    /**
     * Method responsible for rendering the HTML for the form inpunt element
     * @return string
     */
    public function render()
    {
        return "
            <div class='form-group'>
                <label for='{$this->name}'>{$this->label}:</label>
                <input type='{$this->type}' id='{$this->name}' name='{$this->name}' value='{$this->value}'>
            </div>
        ";
    }
}
