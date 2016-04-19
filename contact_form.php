<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'comments'];
    $to = 'microman10@yahoo.com';
    $subject = 'Feedback from online form';
    $headers = [];
    $headers[] = 'From: skaiser@kaiserdesigner.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = '-fskaiser@kaiserdesigner.com';
    require 'includes/process_mail.php';
    if ($mailSent) {
        header('Location: ../thank_you.php');
        exit;
    }
}
?>


<!DOCTYPE>

<html>

<head>
    
    <title>Contact Form</title>
    <meta charset="utf-8">
    
</head>
    
    <body>
    
    <h1>Contact Form</h1>
        <?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
        <p style="color:red">Sorry, your message could not be sent</p>
        
        <?php elseif ($errors || $missing) : ?>
            <p> please fix the item(s) indicated</p>
        <?php endif; ?>
    
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        
            <p>
            <label for="name">
                <?php if ($missing && in_array('name', $missing)) : ?>
                <span style="color: red">Please enter your name</span>
                <?php endif; ?>
                
                <br>Name:
                </label>
                <input type="name" name="name"
                       
                       <?php if ($errors || $missing) {
                        echo 'value="' . htmlentities($name) . '"';
} 
                       ?>></input>
            </p>
            
            <p>
            <label for="email" >
                <?php if ($missing && in_array('email', $missing)) : ?>
                <span style="color: red">Please enter your email</span>
                <?php elseif (isset($errors['email'])) : ?>
                <span style="color:red">Invalid email address</span>
                <?php endif; ?>
                
                <br>Email:
                </label>
            <input type="email" name="email"<?php if ($errors || $missing) {
                        echo 'value="' . htmlentities($email) . '"';
} 
                       ?>>
            </p>
            
            <p>
            <label for="comments">
                <?php if ($missing && in_array('comments', $missing)) : ?>
                <span style="color: red">You forgot to enter your comments</span>
                <?php endif; ?>
                
                <br>Comments:
                </label>
                <textarea name="comments"><?php   
                    if ($errors || $missing) {
                        echo htmlentities($comments);
} 
                       
                    ?></textarea>
            </p>
            
            <p><input type="submit" name="send" value="Send Comments">
            </p>
        
        
        </form>
    
        
    
    </body>
    
</html>