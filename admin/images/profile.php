<?php
/*
Connections Are Located In processForm.php
Author:- Abdul Techie

*/
include('processForm.php');
$sql="SELECT * FROM images ";
$results=mysqli_query($conn,$sql);
$user=mysqli_fetch_all($results,MYSQLI_ASSOC);
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
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <table class="table table-bordered">
                    <thead>
                        <th>logo</th>
                    </thead>
                    <tbody>
                        <!--fetching data from the database using ForeachLoop:-->
                        <?php foreach($user as $images):?>
                        <tr>
                        <td><img src="images/<?php echo $images['profile_image']; ?>"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </script>
</body>
</html>