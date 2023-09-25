<?php
class Form
{

    /**
     * Form fields
     * @var array
     */
    private $fields;

    /**
     * Form submit button
     * @var array
     */
    private $submit;

    /**
     * Form action
     * @var string
     */
    private $action;

    /**
     * Form method
     * @var string
     */
    private $method;

    /**
     * Constructor method
     * @param string $action
     * @param string $method
     */
    public function __construct($action = '', $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
        $this->submit = '';
    }

    /**
     * Method responsible for returning the submit button
     * @return string
     */
    public function getSubmit()
    {
        return $this->submit;
    }

    /**
     * Method responsible for adding an input instance to the collection of inputs managed by this form object
     * @param string $field
     * @return void
     */
    public function addInput($field)
    {
        $this->fields[] = $field;
    }

    /**
     * Method responsible for adding a submit button
     * @param string $field
     * @return void
     */
    public function addSubmitButton($text = 'Submit')
    {
        $this->submit = "<button type='submit'>$text</button>";
    }

    /**
     * Method responsible to iterate over all inputs managed by this form and returns false if any of them don't validate
     * @return array
     */
    public function validate()
    {
        $errors = [];

        foreach ($this->fields as $field) {
            if ($field instanceof Input) {
                $value = $this->getValue($field->getName());

                // Perform validation logic here
                if ($field->isRequired() && !strlen($value)) {
                    $errors[] = "{$field->getLabel()} is required.";
                }
            }
        }

        return $errors;
    }

    /**
     * Method responsible for return the value of the input by name
     * @param string $name
     * @return string|null
     */
    public function getValue($name)
    {
        if (in_array($_SERVER['REQUEST_METHOD'], ['POST', 'GET'])) {
            return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
        }
        return null;
    }

    /**
     * Method responsible from displaying the form with its fields
     * @return string
     */
    public function display()
    {
        echo "<form action='{$this->action}' method='{$this->method}'>";
        foreach ($this->fields as $field) {
            echo $field->render();
        }
        echo $this->getSubmit();
        echo '</form>';
    }
}
