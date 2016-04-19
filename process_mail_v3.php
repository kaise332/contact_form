<?php

$errors = [];



foreach ($_POST as $field => $value) {
    if(empty($value) && in_array($field, $required)) {
        $errors[] = "The " . $field . " is required";
    } else {
        $errors['fail'] = "Something went wrong.";
    }
}

/*
//validates email
if (!empty($email)) :
    $validMail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
    if ($validMail) {
        $headers[] = 'Reply to: ' . $validMail;
    } else {
        $errors['email'] = true;
    }
endif;
  */



?>