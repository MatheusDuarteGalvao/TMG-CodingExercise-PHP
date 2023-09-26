<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Form</title>
    <style>
        /* Apply a basic reset to remove default margins and paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Container styles */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading styles */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form styles */
        form {
            display: block;
            margin-bottom: 20px;
        }

        /* Form group styles */
        .form-group {
            margin-bottom: 20px;
        }

        /* Label styles */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Input styles */
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Button styles */
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Add additional styles as needed */
    </style>
</head>

<body>
    <div class="container">
        <h2>Sample Form</h2>

        <?php
        require 'Form.php';
        require 'TextInput.php';

        $firstNameInput = new TextInput("firstname", "First Name", "Bruce");
        $firstNameInput->setRequired();

        $lastNameInput = new TextInput("lastname", "Last Name", "Wayne");
        $lastNameInput->setRequired();

        $form = new Form();
        $form->addInput($firstNameInput);
        $form->addInput($lastNameInput);
        $form->addSubmitButton('Register');

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            foreach ($form->getFields() as $field) {
                if (isset($_POST[$field->getName()])) {
                    $field->setValue($_POST[$field->getName()]);
                }
            }

            $form->validate();

            if ($form->getErrors()) {
                // Display validation errors
                foreach ($form->getErrors() as $error) {
                    echo "<p>$error</p>";
                }
            } else {
                $form->display();
            }
        } else {
            $form->display();
        }
        ?>
    </div>
</body>

</html>