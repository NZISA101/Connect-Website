<div class="friends">
    
    <?php
            
        $image = "img/user_male.jpg";

        if($FRIEND_ROW['gender'] == "female")
        {
            $image = "img/user_female.jpg";
        }

        if(file_exists($FRIEND_ROW['profile_image']))
        {
            $image = $image_class->get_thumb_profile($FRIEND_ROW['profile_image']);
        }
    ?>

    <a href="profile.php?id=<?php echo $FRIEND_ROW['user_id']; ?>">
        
            <img class="friends_img" src="  <?php echo $image ?> " alt="">
            <br>
            <p>
                <?php echo $FRIEND_ROW['fname'] . " " . $FRIEND_ROW['lname']?>
            </p>
    </a>
</div> 