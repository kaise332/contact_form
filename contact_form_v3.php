<?php

if (isset($_POST['send'])) {
    $required = ['name', 'email', 'message'];

    $to = 'microman10@yahoo.com';
    $headers = [];
    header('Location: includes/thank_you.php');
}
    
?>

<!DOCTYPE>
<html>
    <head>
        
        <meta charset="utf-8">
        
    </head>
    <body>
        
        <?php require_once 'includes/process_mail_v3.php' ?>

    <form method="post" name="contact_form_v3" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">



        <!--     START OF "YOUR NAME"     -->

        <label>Name</label>


        <input name="name" type="text" 
               <?php echo isset($value['name']) ? 'value: "' . htmlspecialchars($field['name']) . '"' : ''; ?> />
        
        <?php echo isset($errors['name']); ?>
  
        

<br>
    
        <!--     START OF "YOUR MESSAGE"     -->
                    
        <label>Message</label>

        <textarea name="message" placeholder="e.g. project, goal, mission, website" cols="35" rows="9"><?php 
            
            echo isset($value['message']) ? htmlspecialchars($field['message']) : ''; 
        
        ?></textarea>
        
        <?php echo isset($errors['message']); ?>
        

<br>
    
        <!--     START OF "YOUR EMAIL"     -->
                
        <label>Email</label>

        <input name="email" type="email" 
               <?php echo isset($value['email']) ? 'value: "' . htmlspecialchars($field['email']) . '"' : ''; ?> />
        
        <?php echo isset($errors['email']); ?>
        
<br>

        <!--     END OF "SUBMIT BUTTON"     -->        
        <input name="send" value="Submit" type="submit" />

    </form>
        
        <?php echo isset($errors['fail']); ?>
    
    

    </body>

</html>