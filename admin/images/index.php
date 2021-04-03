<?php
include('processForm.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <!--Bootstrap Libraries-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!---Using Division--->
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <h3 class="text-center">Registration</h3>
                <!--Php Codes to Echo For Errors-->
                <?php if(!empty($msg)):?>  
                    <div class="alert <?php echo $css_class;?>" >
                        <?php echo $msg;?>
                    </div>
                <?php endif;?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group text-center">
                        <img src="project_images/place.png" onclick="triggerClick()"id="profileDisplay">
                      <label for="profileImage">Profile Image</label> 
                      <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style="display: none;">     
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio:</label>
                        <textarea name="bio" id="bio" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save-user" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js">
    </script>
</body>
</html>