<?php

session_start();

include("./include.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['connect_user_id']);

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
    <link rel="stylesheet" href="css/userpage/timeline.css">

</head>
<body>

    <?php include("./header.php")?>
    <div class="cover_area">
     
        <!--BELOW COVER AREA-->
        <div class="content">

            <!--FRIENDS AREA-->
            <div class="content_friends">
                <div class="friends_bar">
                    <img id="profile_pic" src='https://image.cnbcfm.com/api/v1/image/106330923-1578676182018gettyimages-1178141599.jpeg?v=1584633147&w=1400&h=950' alt="">
                    <br>
                    <a href="profile.php"><p> <?php echo $user_data['fname'] . "<br>" . $user_data['lname']?></p></a>
                    
                </div>
                <br>
            </div>

            <!--POSTS AREA-->
            <div class="content_messages">
                <!--Me to Post-->
                <div class="post_area">
                    <textarea name="post" placeholder="What's on your Mind?"></textarea>
                    <input type="submit" class="post_button" name="submit" value="POST">
                    <br> 
                </div>

                <!--POSTS-->
                <div class="post_bar">

                    <!--Post1-->
                    <div class="post">
                        <div class="post_profile">
                            <img class="post_profile_img" src="img/defaults/head_alizarin.png" alt="">
                        </div>
                        
                        <div class="post_profile_post">
                            <p>First User</p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Quas praesentium aliquid dolorum distinctio dolores,
                            sapiente repudiandae tempore facere autem dicta eaque incidunt,
                            nesciunt eum vero esse quisquam sint itaque! Maiores.
                            <br><br>

                            <div class="post_profile_post_adds">
                                <a href="">Like</a> . <a href="">Comment</a> . <span>April 3rd, 2023</span>
                            </div>
                        </div>
                    </div>

                    <!--Post2-->
                    <div class="post">
                        <div class="post_profile">
                            <img class="post_profile_img" src="img/defaults/head_deep_blue.png" alt="">
                        </div>
                        
                        <div class="post_profile_post">
                            <p>First User</p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Quas praesentium aliquid dolorum distinctio dolores,
                            sapiente repudiandae tempore facere autem dicta eaque incidunt,
                            nesciunt eum vero esse quisquam sint itaque! Maiores.
                            <br><br>

                            <div class="post_profile_post_adds">
                                <a href="">Like</a> . <a href="">Comment</a> . <span>April 3rd, 2023</span>
                            </div>
                        </div>
                    </div>

                    <!--Post3-->
                    <div class="post">
                        <div class="post_profile">
                            <img class="post_profile_img" src="img/defaults/head_pete_river.png" alt="">
                        </div>
                        
                        <div class="post_profile_post">
                            <p>First User</p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Quas praesentium aliquid dolorum distinctio dolores,
                            sapiente repudiandae tempore facere autem dicta eaque incidunt,
                            nesciunt eum vero esse quisquam sint itaque! Maiores.
                            <br><br>

                            <div class="post_profile_post_adds">
                                <a href="">Like</a> . <a href="">Comment</a> . <span>April 3rd, 2023</span>
                            </div>
                        </div>
                    </div>

                    <!--Post4-->
                    <div class="post">
                        <div class="post_profile">
                            <img class="post_profile_img" src="img/defaults/head_red.png" alt="">
                        </div>
                        
                        <div class="post_profile_post">
                            <p>First User</p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Quas praesentium aliquid dolorum distinctio dolores,
                            sapiente repudiandae tempore facere autem dicta eaque incidunt,
                            nesciunt eum vero esse quisquam sint itaque! Maiores.
                            <br><br>

                            <div class="post_profile_post_adds">
                                <a href="">Like</a> . <a href="">Comment</a> . <span>April 3rd, 2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="js/users.js"></script>
</body>
</html>