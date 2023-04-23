<?php

session_start();

include("./include.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['connect_user_id']);


if($_SERVER['REQUEST_METHOD'] == "POST")
{

    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
    {

        if($_FILES['file']['type'] == "image/jpeg")
        {
            $allowed_size = (1024 * 1024) * 12;

            if($_FILES['file']['size'] < $allowed_size)
            {
                //Everything is fine
                $folder = "uploads/" . $user_data['user_id'] . "/";

                //Create Folder
                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                }

                $image = new Image();

                $filename = $folder .  $image->generate_filename(15). ".jpg";
                move_uploaded_file($_FILES['file']['tmp_name'], $filename);

                $change = "profile";

                //Check if it's Profile or Cover Photo that needs changing using query
                if(isset($_GET['change']))
                {
                    $change = $_GET['change'];
                }
                
                

                if($change == "cover")
                    {
                        if(file_exists($user_data['cover_image']))
                        {
                            unlink('cover_image');
                        }
                        $image->resize_image($filename, $filename,1500,1500);
                    }
                    else
                    {
                        if(file_exists($user_data['profile_image']))
                        {
                            unlink('profile_image');
                        }
                        $image->resize_image($filename, $filename,1500,1500);
                    }
                

                if(file_exists($filename))
                {

                    $user_id = $user_data['user_id'];
                    

                    if($change == "cover")
                    {
                        $query = "UPDATE users SET cover_image = '$filename' WHERE user_id =  '$user_id' limit 1";
                        $_POST['is_cover_image'] = 1;
                    }
                    else
                    {
                        $query = "UPDATE users SET profile_image = '$filename' WHERE user_id =  '$user_id' limit 1";
                        $_POST['is_profile_image'] = 1;
                    }

                    $DB = new Database();
                    $DB->save($query);

                    //Create post after profile change
                    $post = new Post();
                    $post->create_post($user_id, $_POST, $filename);

                    header("Location: profile.php");
                    die;
                }

            }
            else
            {
                echo "<div style= 'text-align: center; font-size:12px; color:white; background-color:var(--theme-color);'>";
                echo "<br> The following erros occured: <br>";
                echo "- ";
                echo "Images should be 12MB and below";
                echo "<br>";
                echo "</div>";
            }
        }
        else
        {
            echo "<div style= 'text-align: center; font-size:12px; color:white; background-color:var(--theme-color);'>";
            echo "<br> The following erros occured: <br>";
            echo "- ";
            echo "Only JPEG type images are allowed";
            echo "<br>";
            echo "</div>";
        }
        
    }
    else
    {
        echo "<div style= 'text-align: center; font-size:12px; color:white; background-color:var(--theme-color);'>";
        echo "<br> The following erros occured: <br>";
        echo "- ";
        echo "Please add a valid image";
        echo "<br>";
        echo "</div>";
    }

    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Change Profile  </title>

    <link rel="shortcut icon" type="image/png" href="img/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage/timeline.css">

</head>
<body>

    <?php include("./header.php")?>
    <div class="cover_area">
     
        <!--BELOW COVER AREA-->
        <div class="content">

            <!--POSTS AREA-->
            <div class="content_messages">
                <!--Me to Post-->
                <div class="post_area">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" class="post_button" name="submit" value="CHANGE">
                    </form>
                    <br> 
                </div>
                <br>
                <div style= "text-align: center;">
                    <?php
                        //Check if it's Profile or Cover Photo that needs changing using query
                        if(isset($_GET['change']) && $_GET['change'] == "cover")
                        {
                            $change = "cover";
                            echo "<img src = '$user_data[cover_image]' style = 'max-width:500px; margin-top:40px; border-radius: 8px;'>";
                        }
                        else
                        { 
                            echo "<img src = '$user_data[profile_image]' style = 'max-width:500px; margin-top:40px; border-radius: 8px;'>";
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>

    <script src="js/users.js"></script>
</body>
</html> 