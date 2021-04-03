<?php 
// Start the session
session_start();
ob_start();
include("./base.php"); 
require_once "functions.php";
     
// Define variables and initialize with empty values
$businessname = $motto = $telephone = $businessdescription =  $email = $location = $facebook = $youtube = $instagram = $twitter = $mainservice = $maindescription = $secondservice = $seconddescription =  $fourthservice = $fourthdescription = $fifthservice =  $fifthdescription = $sixthservice = $sixthdescription = $seventhservice = $seventhdescription = "";
$businessname_err = $motto_err = $telephone_err =  $businessdescription_err =  $email_err = $location_err = $facebook_err  = $youtube_err = $instagram_err = $twitter_err = $mainservice_err = $maindescription_err = $secondservice_err = $seconddescription_err =  $fourthservice_err = $fourthdescription_err =  $fifthservice_err = $fifthdescription_err = $sixthservice_err = $sixthdescription_err = $seventhservice_err =  $seventhdescription_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate username
        if(empty(trim($_POST["businessname"]))){
            $businessname_err = "Please enter a businessname.";
        } else{
          //  $businessname = trim($_POST["businessname"]);
            // Prepare a select statement
            $sql = "SELECT id FROM userdetails WHERE businessname = ? AND fk_user_id <> ?";
            
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
    
                // Close statement
                mysqli_stmt_close($stmt);
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
    $input_instagram = trim($_POST["twitter"]);
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
      if(empty($businessname_err) && empty($motto_err) && empty($telephone_err) && empty($businessdescription_err) && empty($email_err) && empty($location_err) && empty($facebook_err) && empty($youtube_err) && empty($instagram_err) && empty($twitter_err) && empty($mainservice_err) && empty($maindescription_err) && empty($secondservice_err) && empty($seconddescription_err)  && empty($fourthservice_err) && empty($fourthdescription_err)){
        // Prepare an insert statement

        $query = "SELECT * FROM userdetails WHERE fk_user_id=".$_SESSION['id'] ;
        $results = mysqli_query($db, $query);
    
        if (mysqli_num_rows($results) >0) {

###########update records

$stmt = mysqli_prepare($link,"UPDATE userdetails SET 
         businessname=?, slug=?, motto=?,  telephone=?, businessdescription=?,
            email=?, `location`=?, facebook=?, youtube=?, instagram=?, twitter=?, 
             mainservice=?, maindescription=?, secondservice=?, 
             seconddescription=?,  fourthservice=?, fourthdescription=? WHERE fk_user_id=?");

if ($stmt === false) {
    
  return;
}
$id = 1;
/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */
$stmt->bind_param('sssssssssssssssssi', $param_businessname,$param_slug, $param_motto, $param_telephone, 
$param_businessdescription, $param_email, $param_location, $param_facebook, $param_youtube,
 $param_instagram, $param_twitter, $param_mainservice, $param_maindescription, $param_secondservice,
  $param_seconddescription, $param_fourthservice, $param_fourthdescription,$user_id);

/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */
$user_id=$_SESSION['id'];
$param_businessname = $businessname;
$param_slug=preg_replace('/\s+/', '_',strtolower(trim($businessname)));
$param_motto = $motto;
$param_telephone = $telephone;
$param_businessdescription = $businessdescription;
$param_email = $email;
$param_location = $location;
$param_facebook = $facebook;
$param_youtube = $youtube;
$param_instagram = $instagram;
$param_instagram = $twitter;
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
        }else{

            //insert new
        $sql = "INSERT INTO userdetails (fk_user_id,businessname,slug, motto, telephone, businessdescription, email, `location`, facebook, youtube, instagram, twitter, mainservice, maindescription, secondservice, seconddescription,  fourthservice, fourthdescription) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssss",$user_id, $param_businessname,$param_slug, $param_motto, $param_telephone, $param_businessdescription, $param_email, $param_location, $param_facebook, $param_youtube, $param_instagram, $param_twitter, $param_mainservice, $param_maindescription, $param_secondservice, $param_seconddescription, $param_fourthservice, $param_fourthdescription);
            
            // Set parameters
            $user_id=$_SESSION['id'];
        
            $param_businessname = $businessname;
            $param_slug=preg_replace('/\s+/', '_',strtolower(trim($businessname)));
            $param_motto = $motto;
            $param_telephone = $telephone;
            $param_businessdescription = $businessdescription;
            $param_email = $email;
            $param_location = $location;
            $param_facebook = $facebook;
            $param_youtube = $youtube;
            $param_instagram = $instagram;
            $param_instagram = $twitter;
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
   
    header('Location: '.$_SERVER['PHP_SELF']);
die;
}
print_r(trigger_error($stmt->error, E_USER_ERROR));
mysqli_stmt_close($stmt);
}

// Close statement

}
      }

// Close connection
mysqli_close($link);
}
?>
<?php

?>