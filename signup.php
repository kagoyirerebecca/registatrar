<!DOCTYPE html>
<?php 
require_once('./operations.php');
?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="text-center my-3">REGISTRATION FORM</h1>
        <div class="container d-flex justify-content-center">
            <form action="display.php" method="POST" class="W-50" enctype="multipart/form-data">
               <?php inputFields("Firstname","firstname","","text");?>
               <?php inputFields("Lastname","lastname","","text");?>
               <?php inputFields("Email","email","","email");?>
               <?php inputFields("Password","password","","password");?>
               <?php inputFields("","image","","file");?>
               <button class="btn-dark p-2" type="submit" name="submit">Submit</button>
               <button class="btn-dark" ><a href="login.php">Login</a></button>
            </form>
        </div>
    </body>
</html>
