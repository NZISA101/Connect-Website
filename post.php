<div class="post">
    <div class="post_profile">

        <?php
        
            $image = "img/user_male.jpg";

            if($ROW_USER['gender'] == "female")
            {
                $image = "img/user_female.jpg";
            }
            
            if(file_exists($ROW_USER['profile_image']))
            {
                $image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
            }
            
        ?>

        
        <img class="post_profile_img" 
        src="  <?php echo $image ?> " alt="">
    </div>
    
    <div class="post_profile_post">
        <p>
            <?php
                echo $ROW_USER['fname'] . " " . $ROW_USER['lname']; 
    
                if($ROW['is_profile_image'])
                {
                    $pronoun = "his";
                    if($ROW_USER['gender'] = "female")
                    {
                        $pronoun = "her";
                    }
                    echo "<span style='font-weight:normal; color:#aaa;'> update $pronoun profile image</span>";
                }

                if($ROW['is_cover_image'])
                {
                    $pronoun = "his";
                    if($ROW_USER['gender'] = "female")
                    {
                        $pronoun = "her";
                    }
                    echo "<span style='font-weight:normal; color:#aaa;'> update $pronoun cover image</span>";
                }
            ?>
        </p>

        
        <?php echo htmlspecialchars($ROW['post'] )?>
        <br><br>

        <?php
        
        if(file_exists($ROW['image']))
        {
            $post_image = $image_class->get_thumb_post($ROW['image']);
            echo "<img src= '$post_image' style='widh:70%;' />";
        }
        ?>
        <br><br>
        
        <div class="post_profile_post_adds">
            <a href="">Like</a> . <a href="">Comment</a> . 
            
            <span>  <?php echo $ROW['date'] ?> </span>
        </div>

        <div class="post_profile_post_adds" style="float:right;">
            <a href="edit.php">Edit</a>
            .
            <a href="delete.php?id=<?php echo $ROW['post_id']?>">Delete</a>
        </div>
    </div>
</div>                     