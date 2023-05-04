<?php
require_once "db.php";
if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $image=$_FILES['image'];
     if(!empty($_FILES["image"]["name"])) { 
          // Get file info 
          $fileName = basename($_FILES["image"]["name"]); 
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
           
          // Allow certain file formats 
          $allowTypes = array('jpg','png','jpeg','gif'); 
          if(in_array($fileType, $allowTypes)){ 
              $image = $_FILES['image']['tmp_name']; 
              $imgContent = addslashes(file_get_contents($image)); 
              $insert = "insert into `register` (firstname,lastname,email,password,image) values ('$firstname','$lastname','$email','$password',''$imgContent'')";
              if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 

?>
<!DOCTYPE html>
  
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
     <h1 class="text-center my-4">USER DATA</h1>
     <div class="container mt-5 d-flex justify-content-center">
       <table class="table table-bordered w-50">
          <thead>
            <tr>
              
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Image</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $result = $db->query("SELECT * FROM register"); 
              ?>

              <?php if($result->num_rows > 0){ ?> 
                  <div class="gallery"> 
                      <?php while($row = $result->fetch_assoc()){ ?>  
                          $firstname=$row['firstname'];
                          $lastname=$row['lastname'];
                          $email=$row['email'];
                          $image=$row['image'];
                      <?php } ?> 
                  </div> 
              <?php }else{ ?> 
                  <p class="status error">Image(s) not found...</p> 
              <?php } ?>`
              echo'<tr>
                <td>'.$firstname'</td>
                <td>'.$lastname'</td>
                <td>'.$email'</td>
                <td>'<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> '</td>
              </tr>
          </tbody>
        </table>
     </div>
    </body>
</html>