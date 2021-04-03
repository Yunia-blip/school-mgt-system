<?php 
// Start the session
session_start();
ob_start();
include("./base.php"); 
require_once "functions.php";
$unique_image=(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1).substr(md5(time()),1));
     
// Define variables and initialize with empty values
$businessname=$cover_image_error = $motto = $telephone = $businessdescription =  $email = $location = $facebook = $youtube = $instagram = $twitter = $mainservice = $maindescription = $secondservice = $seconddescription =  $fourthservice = $fourthdescription = $fifthservice =  $fifthdescription = $sixthservice = $sixthdescription = $seventhservice = $seventhdescription = "";
$businessname_err = $motto_err = $telephone_err =  $businessdescription_err =  $email_err = $location_err = $facebook_err  = $youtube_err = $instagram_err = $twitter_err = $mainservice_err = $maindescription_err = $secondservice_err = $seconddescription_err =  $fourthservice_err = $fourthdescription_err =  $fifthservice_err = $fifthdescription_err = $sixthservice_err = $sixthdescription_err = $seventhservice_err =  $seventhdescription_err = "";
$uploaded_image_name="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate username

        $cover_image = $_FILES['cover_image']['name'];
        if(empty($cover_image)){
            $uploaded_image_name="default_cover_img.jpg";
        }else{
            $target_dir = "upload/";
            $uploaded_img=$unique_image.basename($cover_image);
            $target_file = $target_dir . $uploaded_img;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              // Valid file extensions
           $extensions_arr = array("jpg","jpeg","png","gif");

           // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 //uploading...image
    if(move_uploaded_file($_FILES['cover_image']['tmp_name'],$target_file)){
        $uploaded_image_name=$uploaded_img;
    }
    
 }else{
    $cover_image_error="Image extension not allowed";
 }
        }

        if(empty(trim($_POST["fname"]))){
            $businessname_err = "Please enter a businessname.";
        } else{
            $sql = "SELECT id FROM student WHERE fname = ? AND fk_user_id <> ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_businessname,$param_user_id);
                
                // Set parameters
                $param_businessname = trim($_POST["businessname"]);
                $param_user_id=$_SESSION['id'];
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $businessname_err = "This businessname is already taken.";
                    } else{
                        $businessname = trim($_POST["businessname"]);
                    }
                } else{
                    $_SESSION['error'] = "Something went wrong. Please try again later.";
   
    header('Location: pi.php');
die;
                    echo "Oops! Something went wrong. Please try again later.";
           
            }
        }
    }

       // Validate motto
    $input_motto = trim($_POST["motto"]);
    if(empty($input_motto)){
        $motto_err = "Please enter  What you do.";     
    } else{
        $motto = $input_motto;
    }
    
 // Validate telephone
 $input_telephone = trim($_POST["telephone"]);
 if(empty($input_telephone)){
     $telephone_err = "Please enter the telephone.";     
 } elseif(!ctype_digit($input_telephone)){
     $telephone_err = "Please enter your telephone.";
 } else{
     $telephone = $input_telephone;
 }

 
  // Validate businessdescription
    $input_businessdescription = trim($_POST["businessdescription"]);
    if(empty($input_businessdescription)){
        $businessdescription_err = "Please enter description.";     
    } else{
        $businessdescription = $input_businessdescription;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your email.";     
    } else{
        $email = $input_email;
    }

    // Validate businessdescription
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter your location.";     
    } else{
        $location = $input_location;
    }

    // Validate facebook
    $input_facebook = trim($_POST["facebook"]);
    if(empty($input_facebook)){
        $facebook_err = "Please enter your facebook account.";     
    } else{
        $facebook = $input_facebook;
    }

    // Validate youtube
    $input_youtube = trim($_POST["youtube"]);
    if(empty($input_youtube)){
        $youtube_err = "Please enter your youtube account.";     
    } else{
        $youtube = $input_youtube;
    }

    // Validate instagram
    $input_instagram = trim($_POST["instagram"]);
    if(empty($input_instagram)){
        $instagram_err = "Please enter your instagram account.";     
    } else{
        $instagram = $input_instagram;
    }
    // Validate twitter
    $input_twitter = trim($_POST["twitter"]);
    if(empty($input_twitter)){
        $twitter_err = "Please enter your twitter account.";     
    } else{
        $twitter = $input_twitter;
    }

    // Validate mainservice
    $input_mainservice = trim($_POST["mainservice"]);
    if(empty($input_mainservice)){
        $mainservice_err = "service.";     
    } else{
        $mainservice = $input_mainservice;
    }

    // Validate maindescription
    $input_maindescription = trim($_POST["maindescription"]);
    if(empty($input_maindescription)){
        $maindescription_err = "description.";     
    } else{
        $maindescription = $input_maindescription;
    }

    // Validate secondservice
    $input_secondservice = trim($_POST["secondservice"]);
    if(empty($input_secondservice)){
        $secondservice_err = "service.";     
    } else{
        $secondservice = $input_secondservice;
    }

    // Validate seconddescription
    $input_seconddescription = trim($_POST["seconddescription"]);
    if(empty($input_seconddescription)){
        $seconddescription_err = "description.";     
    } else{
        $seconddescription = $input_seconddescription;
    }

   
    // Validate fourthservice
    $input_fourthservice = trim($_POST["fourthservice"]);
    if(empty($input_fourthservice)){
        $fourthservice_err = "service.";     
    } else{
        $fourthservice = $input_fourthservice;
    }

    // Validate fourthdescription
    $input_fourthdescription = trim($_POST["fourthdescription"]);
    if(empty($input_fourthdescription)){
        $fourthdescription_err = "description.";     
    } else{
        $fourthdescription = $input_fourthdescription;
    }

    
    

	  // Check input errors before inserting in database
      if(empty($businessname_err) && empty($cover_image_error) && empty($motto_err) && empty($telephone_err) 
      && empty($businessdescription_err) && empty($email_err) && empty($location_err) &&
       empty($facebook_err) && empty($youtube_err) &&
       empty($instagram_err) && empty ($twitter_err) && empty($mainservice_err) && empty($maindescription_err) &&
        empty($secondservice_err) && empty($seconddescription_err)  && empty($fourthservice_err)
         && empty($fourthdescription_err)){
        // Prepare an insert statement
        $query = "SELECT * FROM userdetails WHERE fk_user_id=".$_SESSION['id'] ;
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) >0) {

###########update records

$stmt = mysqli_prepare($link,"UPDATE students SET 
         businessname=?, slug=?, motto=?,  telephone=?, businessdescription=?,
            email=?, `location`=?, facebook=?, youtube=?, instagram=?, twitter=?, cover_image=?,
             mainservice=?, maindescription=?, secondservice=?, 
             seconddescription=?,  fourthservice=?, fourthdescription=? WHERE fk_user_id=?");

if ($stmt === false) {
    
  return;
}
$id = 1;
/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */
$stmt->bind_param('ssssssssssssssssssi', $param_businessname,$param_slug, $param_motto, $param_telephone, 
$param_businessdescription, $param_email, $param_location, $param_facebook, $param_youtube,
 $param_instagram, $param_twitter,$param_cover_img, $param_mainservice, $param_maindescription, $param_secondservice,
  $param_seconddescription, $param_fourthservice, $param_fourthdescription,$user_id);

/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */
$user_id=$_SESSION['id'];
$param_businessname = $businessname;
$param_cover_img=$uploaded_image_name;

$param_slug=preg_replace('/\s+/', '_',strtolower(trim($businessname)));
$param_motto = $motto;
$param_telephone = $telephone;
$param_businessdescription = $businessdescription;
$param_email = $email;
$param_location = $location;
$param_facebook = $facebook;
$param_youtube = $youtube;
$param_instagram = $instagram;
$param_twitter = $twitter;
$param_mainservice = $mainservice;
$param_maindescription = $maindescription;
$param_secondservice = $secondservice;
$param_seconddescription = $seconddescription;
$param_fourthservice = $fourthservice;
$param_fourthdescription = $fourthdescription;

/* Execute the prepared Statement */
$status = $stmt->execute();
/* BK: always check whether the execute() succeeded */
if ($status === false) {
  trigger_error($stmt->error, E_USER_ERROR);
  $_SESSION['error'] = "Something went wrong during update. Please contact admin.";
   
  header('Location: pi.php');
die;
}
printf("%d Row inserted.\n", $stmt->affected_rows);




$_SESSION['message'] = "Info successfully updated";
   
header('Location: index.php');
exit();
########end of update
        }

        
         else{   //insert new
        $sql = "INSERT INTO userdetails
         (fk_user_id,businessname,slug, motto, telephone, businessdescription, 
        email, `location`, facebook, youtube, instagram, twitter,cover_image, mainservice,
         maindescription, secondservice,
         seconddescription,  fourthservice, fourthdescription)
          VALUES (?,?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
       
        if($stmt = mysqli_prepare($link, $sql)){
          
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssss",$user_id, $param_businessname,$param_slug,
             $param_motto, $param_telephone, $param_businessdescription, $param_email, $param_location,
              $param_facebook, $param_youtube, $param_instagram,$param_twitter, $param_cover_img, $param_mainservice, $param_maindescription,
               $param_secondservice, $param_seconddescription, $param_fourthservice, $param_fourthdescription);
            
            // Set parameters
            $user_id=$_SESSION['id'];
        
            $param_businessname = $businessname;
            $param_slug=preg_replace('/\s+/', '_',strtolower(trim($businessname)));
            $param_motto = $motto;
            $param_cover_img=$uploaded_image_name;
            $param_telephone = $telephone;
            $param_businessdescription = $businessdescription;
            $param_email = $email;
            $param_location = $location;
            $param_facebook = $facebook;
            $param_youtube = $youtube;
            $param_instagram = $instagram;
            $param_twitter = $twitter;
            $param_mainservice = $mainservice;
            $param_maindescription = $maindescription;
            $param_secondservice = $secondservice;
            $param_seconddescription = $seconddescription;
            $param_fourthservice = $fourthservice;
            $param_fourthdescription = $fourthdescription;
            



           
            
     
// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    // Records created successfully. Redirect to landing page

    $_SESSION['message'] = "Info successfully saved.";
    header("location: index.php");
    exit();
} else{
    
    $_SESSION['error'] = "Something went wrong. Please try again later.";
   
    header('Location: index.php');
    exit();
}
mysqli_stmt_close($stmt);
}else{
   
}

// Close statement
         

}

// Close connection
mysqli_close($link);
}
   
}
?>
<?php


?>
    
    <div class="app-main__inner">
    
<div class="row">

    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
        
                

<?php 
if(isset($_SESSION['error'])){?>
 <div class="alert alert-danger" role="alert">
<?php
    echo $_SESSION['error']; // display the message
    unset($_SESSION['error']); // clear the value so that it doesn't display again
    ?></div><?php
}

if(isset($_SESSION['message'])){?>
 <div class="alert alert-primary" role="alert">
<?php
    echo $_SESSION['message']; // display the message
    unset($_SESSION['message']); // clear the value so that it doesn't display again
    ?></div><?php
}

?>



            <h5 class="card-title">Business Information</h5>
<?php

$edit_businessname = $edit_motto = $edit_telephone = $edit_businessdescription =  $edit_email =
 $edit_location = $edit_facebook = $edit_youtube = $edit_instagram = $edit_twitter =  $edit_mainservice = $edit_maindescription
  = $edit_secondservice = $edit_seconddescription =  $edit_fourthservice = $edit_fourthdescription ="";


	$query = "SELECT * FROM userdetails WHERE fk_user_id=".$_SESSION['id'] ." ORDER BY id DESC LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) >0) {
        while ($row = mysqli_fetch_assoc($results)) {
            $edit_businessname=$row['businessname'];
            $edit_motto=$row['motto'];
            $edit_telephone=$row['telephone'];
            $edit_businessdescription=$row['businessdescription'];
            $edit_email=$row['email'];
            $edit_location=$row['location'];
            $edit_facebook=$row['facebook'];
            $edit_youtube=$row['youtube'];
            $edit_instagram=$row['instagram'];
            $edit_twitter=$row['twitter'];

            $edit_mainservice=$row['mainservice'];
            $edit_maindescription=$row['maindescription'];
            $edit_secondservice=$row['secondservice'];
            $edit_seconddescription=$row['seconddescription'];
            $edit_fourthservice=$row['fourthservice'];
            $edit_fourthdescription=$row['fourthdescription'];



        }
    }

?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                    <div class="position-relative form-group  <?php echo (!empty($businessname_err)) ? 'has-error' : ''; ?>">
                     <label for="businessname" class="">Business Name</label>
                     <input name="businessname" id="businessname" required placeholder="Company Name" type="text" class="form-control" value="<?=empty($edit_businessname)?'':$edit_businessname; ?>" maxlength="20">
                     <span class="help-block"><?php echo $businessname_err;?></span>

                    </div>

                    <div class="position-relative form-group  <?php echo (!empty($motto_err)) ? 'has-error' : ''; ?>">
                    <label for="motto" class="">About Us</label>
                    <input name="motto" id="motto" placeholder="What I do" required type="text" class="form-control" value="<?=empty($edit_motto)?'':$edit_motto; ?>" maxlength="200">
                    <span class="help-block"><?php echo $motto_err;?></span>

                    </div>

                    <div class="position-relative form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                    <label for="telephone" class="">Telephone Number</label>
                    <input name="telephone" id="telephone" required placeholder="Telephone Number" onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" class="form-control numbersOnly" value="<?=empty($edit_telephone)?'':$edit_telephone; ?>"  maxlength="13">
                    <span class="help-block"><?php echo $telephone_err;?></span>

                    </div>

                    <div class="position-relative form-group <?php echo (!empty($businessdescription_err)) ? 'has-error' : ''; ?>">
                    <label for="businessdescription" class="">Reasons To Choose Us</label>
                    <textarea name="businessdescription" required id="businessdescription" class="form-control"   maxlength="500"><?=empty($edit_businessdescription)?'':$edit_businessdescription; ?></textarea>
                    <span class="help-block"><?php echo $businessdescription_err;?></span>

                    </div>

                    <div class="position-relative form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label for="email" class="">Business Email </label>
                    <input name="email" id="email" required placeholder="email address" type="text" class="form-control" value="<?=empty($edit_email)?'':$edit_email; ?>" value="<?php echo $email; ?>" maxlength="30">
                    <span class="help-block"><?php echo $email_err;?></span>

                    </div>

                    <div class="position-relative form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                    <label for="location" class="">Physical Location</label>
                    <input name="location" id="location" required placeholder="Physical Location" type="text" class="form-control"  value="<?=empty($edit_location)?'':$edit_location; ?>"  maxlength="50">
                    <span class="help-block"><?php echo $location_err;?></span>
  
                    </div>
                    
                    <div class="card-body"><h5 class="card-title" id="service"><br><br>Social Media Handles. </h5>
                        <p>This section is optional. </p>
                        <hr>
                        <hr>

                    <div class="form-row">
                            <div class="col-md-4">
                                <div class="position-relative form-group <?php echo (!empty($facebook_err)) ? 'has-error' : ''; ?>">
                                        <label for="facebook" class="">Facebook Account(Optional)</label>
                                        <input name="facebook" required id="facebook" type="text" class="form-control" value="<?=empty($edit_facebook)?'':$edit_facebook; ?>"  placeholder="Enter your facebook url">
                                        <span class="help-block"><?php echo $facebook_err;?></span>


                                 </div>
                    </div>

                                <div class="col-md-4">
                                    <div class="position-relative form-group <?php echo (!empty($youtube_err)) ? 'has-error' : ''; ?>">
                                             <label for="youtube" class="">Youtube Account(Optional)</label>
                                             <input name="youtube" required id="youtube" type="text" class="form-control"  value="<?=empty($edit_youtube)?'':$edit_youtube; ?>"  placeholder="Enter your youtube url">
                                             <span class="help-block"><?php echo $youtube_err;?></span>


                                    </div>
                                </div>

                                <div class="col-md-4">
                                      <div class="position-relative form-group <?php echo (!empty($instagram_err)) ? 'has-error' : ''; ?>">
                                            <label for="instagram" class="">Instagram Account(Optional)</label>
                                             <input name="instagram" required id="instagram" type="text" class="form-control" value="<?=empty($edit_instagram)?'':$edit_instagram; ?>"  placeholder="Enter your instagram url">
                                             <span class="help-block"><?php echo $instagram_err;?></span>


                                        </div>
                                </div>
                                <div class="col-md-4">
                                      <div class="position-relative form-group <?php echo (!empty($instagram_err)) ? 'has-error' : ''; ?>">
                                            <label for="twitter" class="">Twitter Account(Optional)</label>
                                             <input name="twitter" required id="twitter" type="text" class="form-control" value="<?=empty($edit_twitter)?'':$edit_twitter; ?>"  placeholder="Enter your twitter url">
                                             <span class="help-block"><?php echo $twitter_err;?></span>


                                        </div>
                                </div>
                        </div>

                        <div class="card-body"><h5 class="card-title" id="service"><br><br>Services & Products. </h5>
                        <p>This section is mandatory and should be filled with services or products you offer. </p>
                        <hr>
                        <hr>
                        <div class="col-md-6">
                        <div class="position-relative form-group  <?php echo (!empty($mainservice_err)) ? 'has-error' : ''; ?>">
                            <label for="mainservice" class="">First Service  </label>
                             <input name="mainservice" id="mainservice" required placeholder="Please fill in the services you offer" type="text" class="form-control" value="<?=empty($edit_mainservice)?'':$edit_mainservice; ?>"  maxlength="50">
                             <span class="help-block"><?php echo $mainservice_err;?></span>
                        </div>
                        </div>

                        <div class="position-relative form-group <?php echo (!empty($maindescription_err)) ? 'has-error' : ''; ?>">
                              <label for="maindescription" class="">Service Description</label>
                              <textarea name="maindescription" required id="maindescription" class="form-control"   maxlength="500"><?=empty($edit_maindescription)?'':$edit_maindescription; ?></textarea>
                               <span class="help-block"><?php echo $maindescription_err;?></span>
                        </div>
                        <div class="col-md-6">
                        <div class="position-relative form-group  <?php echo (!empty($secondservice_err)) ? 'has-error' : ''; ?>">
                            <label for="secondservice" class="">Second Service  </label>
                             <input name="secondservice" required id="secondservice"  type="text" class="form-control" value="<?=empty($edit_secondservice)?'':$edit_secondservice; ?>"  maxlength="50">
                             <span class="help-block"><?php echo $secondservice_err;?></span>
                        </div>
                        </div>

                        <div class="position-relative form-group <?php echo (!empty($seconddescription_err)) ? 'has-error' : ''; ?>">
                              <label for="seconddescription" class="">Service Description</label>
                              <textarea name="seconddescription" required id="seconddescription" class="form-control"  maxlength="500"><?=empty($edit_seconddescription)?'':$edit_seconddescription; ?></textarea>
                               <span class="help-block"><?php echo $seconddescription_err;?></span>
                        </div>

                        <div class="col-md-6">
                        <div class="position-relative form-group  <?php echo (!empty($fourthservice_err)) ? 'has-error' : ''; ?>">
                            <label for="fourthservice" class="">Third Service  </label>
                             <input name="fourthservice" required id="fourthservice"  type="text" class="form-control" value="<?=empty($edit_fourthservice)?'':$edit_fourthservice; ?>" maxlength="50">
                             <span class="help-block"><?php echo $fourthservice_err;?></span>
                        </div>
                        </div>

                        <div class="position-relative form-group <?php echo (!empty($fourthdescription_err)) ? 'has-error' : ''; ?>">
                              <label for="fourthdescription" class="">Service Description</label>
                              <textarea name="fourthdescription" required id="fourthdescription" class="form-control"  maxlength="500"><?=empty($edit_fourthdescription)?'':$edit_fourthdescription; ?></textarea>
                               <span class="help-block"><?php echo $fourthdescription_err;?></span>
                        </div>              
                        
                       <div class="card-body"><h5 class="card-title" id="service">Upload Cover Photo</h5>     
                        <div class="col-md-6">
                        <div class="position-relative form-group ">
                               <label for="fourthservice" class="">UPLOAD COVER IMAGE  </label>
                             <input name="cover_image"    type="file" class="form-control" >
                             <span class="help-block"><?php echo $cover_image_error;?></span>
                        </div>
                        </div>
                    </div>
                            
                        </div>

                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" >




                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script src="assets/js/script.js">
    </script>
  
<?php include("./assets/includes/footer.php"); ?> 
