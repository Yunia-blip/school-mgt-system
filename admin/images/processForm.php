<?php

$msg="";
$css_class="";
$conn= mysqli_connect('localhost','root','','kazipal');
//sending the data to the database using POST command
if(isset($_POST['save-user'])){
    //the echo function prints the image and name to the screen
    echo"<pre>",print_r($_FILES['profileImage']['name']),"/<prev>";
     $bio =$_POST['bio'];
     $profileImageName=time().'_'.$_FILES['profileImage']['name'];
    //storing the images in local directory in the project
    $target ='images/'.$profileImageName;
    //moving the upload photos too the database
   if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
       $sql="INSERT INTO images(profile_image,bio)VALUES('$profileImageName','$bio')";
       //running the queries and checking for errors
       if(mysqli_query($conn,$sql)){
            $msg="Image Uploaded and saved To the database";
            $css_class="Alert_css";
       }else{
        $msg="Database Error: Failed to save User";
        $css_class="Alert_danger";
    }
       
       
   }else{
       $msg="Failed To Upload the Image";
       $css_class="Alert_danger";
   }
}
?>  