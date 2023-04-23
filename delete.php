<?php

    session_start();

    include("./include.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['connect_user_id']);

    $ERROR = "";

    $post = new Post();

    if(isset($_GET['id']))
    {
       $ROW = $post->get_one_post($_GET['id']);

       if(!$ROW)
       {
        $ERROR = "No such post was found";
       }
    }

    else
    {
        $ERROR = "No such post was found";
    }

    //If something was posted
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $post->delete_post($_POST['post_id']);
        print_r($_POST);
        print_r($_GET);
        //header("Location: profile.php");
        die;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Delete</title>

    <link rel="shortcut icon" type="image/png" href="img/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage/delete.css">

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
                    <h2>DELETE POST</h2><br>
                    <form method="POST">
                        
                        <?php 
                            if($ERROR != "")
                            {
                                echo $ERROR;
                            }
                            if($ROW)
                            {
                                echo "<p>Are you sure you want to Delete?</p><br><hr><br>";
                                $user = new User();
                                $ROW_USER = $user->get_user($ROW['user_id']);
                        
                                include("post_delete.php");
                            }
                        ?>

                        <input type="hidden" class="post_button" name="post_id" value="<?php echo $ROW['post_id']; ?>">
                        <input type="submit" class="post_button" name="submit" value="DELETE">

                        <br> 
                    </form>
                    
                </div>

            </div>
        </div>

    </div>

    <script src="js/users.js"></script>
</body>
</html>