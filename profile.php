<?php
    session_start();

    include("./include.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['connect_user_id']);

   
    if (isset($_GET['id']) && is_numeric($_GET['id']))//input white listing
    {
        $profile = new Profile();
        $profile_data = $profile->get_profile($_GET['id']);
    
        if(is_array($profile_data))
        {
            $user_data = $profile_data[0];
        }
    }
    
    
    
    //For Posting
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $post = new Post();
        $id = $_SESSION['connect_user_id'];
        $result = $post->create_post($id, $_POST, $_FILES);

        //Don't repeat posts when refreshing
        if($result = "")
        {
            echo "<div style= 'text-align: center; font-size:12px; color:white; background-color:var(--theme-color);'>";
            echo "<br> The following erros occured: <br>";
            echo "- ";
            echo $result;
            echo "</div>";
            
        }
        else
        {
            header("Location: profile.php");
            die;
        }
    }

    //Post Collector
    $post = new Post();
    $id = $user_data['user_id'];    

    $posts = $post->get_post($id);

    //Friend Collector
    $user = new User();

    $friends = $user->get_friends($id);

    $image_class = new Image();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Userpage</title>

    <link rel="shortcut icon" type="image/png" href="img/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage/profile.css">

</head>
<body>

   <?php include("./header.php")?>

    <div class="cover_area">
        <div class="cover_page">

                <?php
                    $image = "img/user_coverpage.jpg";

                    if(file_exists($user_data['cover_image']))
                    {
                        $image = $image_class->get_thumb_cover($user_data['cover_image']);
                    }
                ?>
            <img src="<?php echo $image ?>">
            <span>
                <?php
                    $image = "img/user_male.jpg";

                    if($user_data['gender'] == "female")
                    {
                        $image = "img/user_female.jpg";
                    }

                    if(file_exists($user_data['profile_image']))
                    {
                        $image = $image_class->get_thumb_profile($user_data['profile_image']);
                    }
                ?>
                <img id="profile_pic" src="<?php echo $image ?>"><br>
                <a href="profile_change.php?change=profile">Change Profile Image</a><br>
                <a href="profile_change.php?change=cover">Change Cover</a>
            </span>
            <br>
            <div class="profile_name">
                <?php
                    echo $user_data['fname'] . "  " . $user_data['lname']
                ?>
            </div>
            <br>
            <div class="cover_page_info">
                <a class="menu_buttons" href="timeline.php">Timeline</a>
                <a class="menu_buttons" href="">About</a>
                <a class="menu_buttons" href="">Photos</a>
                <a class="menu_buttons" href="">Settings</a>
            </div>
        </div>

        <!--BELOW COVER AREA-->
        <div class="content">

            <!--FRIENDS AREA-->
            <div class="content_friends">
                <div class="friends_bar">
                    
                    <h2>Friends</h2> 
                    <?php

                        if($friends)
                        {
                            foreach($friends as $FRIEND_ROW)
                            {
                                
                                include("user.php");
                            }
                        }

                    ?>
                                            
                </div>
                <br>
            </div>

            <!--POSTS AREA-->
            <div class="content_messages">
                <!--Me to Post-->
                <div class="post_area">

                    <form method="POST" enctype="multipart/form-data">
                        <textarea name="post" placeholder="What's on your Mind?"></textarea>
                        <input type="file" name="file" class="load">
                        <input type="submit" class="post_button" name="submit" value="POST">
                        <br> 
                    </form>

                </div>

                <!--POSTS-->
                <div class="post_bar">

                    <?php

                    if($posts)
                    {
                        foreach($posts as $ROW)
                        {
                            $user = new User();
                            $ROW_USER = $user->get_user($ROW['user_id']);
                            
                            include("post.php");
                        }
                    }

                    ?>

                </div>
            </div>
        </div>

    </div>

    <script src="js/users.js"></script>
</body>
</html>