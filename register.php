<?php

    include("./include.php");

    $fname = "";
    $lname = "";
    $gender = "";
    $regnum = "";
    $dob = "";
    $email = "";
    $phone = "";  
    
   
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $signup = new Signup();
        $result = $signup->evaluate($_POST);

        if($result != "")
        {
            echo "<div style= 'text-align: center; font-size:12px; color:white; background-color:var(--theme-color);'>";
            echo "<br> The following erros occured: <br>";
            echo "- ";
            echo $result;
            echo "</div>";
        }   
        else
        {
            header("Location: login.php");
            die;
        }

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $regnum = $_POST['regnum'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone']; 
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" type="image/png" href="img/logo2.png">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Connect | Register</title>
</head>
<body>

    <div class="main">
        <div class="main_logo">
            <span>C</span>
        <div class="drop">
            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
            <svg class="logo" width="800pt" height="800pt" viewBox="0 0 800 800" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g id="#000000fe">
                    <path opacity="1.00" d=" M 302.86 92.59 C 370.25 71.97 444.57 74.81 510.10 100.79 C 572.95 125.39 627.32 170.85 662.90 228.17 C 685.62 264.54 700.77 305.61 707.05 348.03 C 713.76 392.26 710.63 437.87 698.31 480.86 C 682.94 469.96 667.60 459.04 652.29 448.07 C 661.51 404.38 659.25 358.38 645.70 315.83 C 613.07 315.79 580.44 315.81 547.81 315.82 C 550.99 341.99 552.60 368.35 552.61 394.72 C 532.97 394.61 513.73 402.54 499.27 415.72 C 501.29 382.35 498.71 348.87 494.13 315.81 C 427.86 315.81 361.60 315.80 295.33 315.81 C 287.73 368.07 287.52 421.39 294.83 473.69 C 354.44 473.70 414.05 473.69 473.67 473.69 C 473.63 491.25 473.79 508.81 473.59 526.36 C 417.36 526.23 361.14 526.35 304.91 526.30 C 313.23 559.23 324.76 591.88 343.54 620.39 C 351.91 632.75 361.86 644.59 374.92 652.17 C 383.55 657.21 394.13 659.49 403.89 656.62 C 417.27 652.85 427.87 643.03 436.62 632.65 C 453.55 611.96 464.57 587.23 473.69 562.31 C 473.62 608.26 473.78 654.22 473.61 700.18 C 428.80 711.98 381.42 713.73 335.91 705.00 C 267.13 692.19 203.27 655.37 157.30 602.69 C 131.97 573.85 111.94 540.36 98.59 504.36 C 74.83 440.71 72.60 369.32 92.17 304.28 C 110.65 242.09 149.07 186.15 200.14 146.20 C 230.69 122.21 265.70 103.90 302.86 92.59 M 353.32 156.43 C 341.98 170.16 333.35 185.90 326.08 202.10 C 317.32 221.76 310.67 242.30 305.41 263.16 C 364.96 263.17 424.51 263.17 484.06 263.16 C 477.38 236.90 468.63 211.02 456.07 186.96 C 447.29 170.57 436.90 154.50 422.30 142.69 C 412.81 135.00 400.31 129.54 387.93 132.29 C 373.73 135.38 362.44 145.62 353.32 156.43 M 498.37 152.97 C 518.24 186.99 530.59 224.85 539.08 263.16 C 566.89 263.16 594.69 263.19 622.50 263.15 C 594.34 214.40 550.15 175.10 498.37 152.97 M 166.95 263.15 C 194.75 263.19 222.55 263.13 250.35 263.19 C 258.88 224.89 271.23 187.06 291.03 153.01 C 239.26 175.11 195.12 214.44 166.95 263.15 M 143.69 315.82 C 127.55 366.81 127.59 422.68 143.68 473.68 C 176.32 473.68 208.97 473.74 241.61 473.65 C 235.27 421.30 235.32 368.18 241.59 315.82 C 208.95 315.80 176.32 315.80 143.69 315.82 M 167.15 526.31 C 195.29 575.02 239.35 614.38 291.10 636.52 C 271.27 602.48 258.72 564.67 250.33 526.31 C 222.60 526.30 194.88 526.31 167.15 526.31 Z" />
                    <path opacity="1.00" d=" M 540.72 449.86 C 548.81 445.66 559.10 446.24 566.72 451.24 C 580.51 461.90 595.01 471.61 609.11 481.86 C 655.59 515.01 702.05 548.19 748.55 581.31 C 753.20 585.31 758.38 589.18 760.88 595.00 C 764.82 603.29 763.48 613.72 757.77 620.87 C 753.92 625.94 748.08 629.08 742.10 630.91 C 717.18 635.36 692.27 639.89 667.34 644.30 C 685.06 679.94 703.00 715.47 720.77 751.09 C 724.80 758.87 724.59 768.64 720.20 776.22 C 714.82 785.94 702.87 791.34 692.03 788.90 C 683.78 787.28 676.65 781.42 673.23 773.78 C 655.94 739.17 638.64 704.57 621.33 669.97 C 607.58 686.04 594.03 702.28 580.36 718.42 C 576.14 723.19 572.51 728.61 567.19 732.24 C 559.87 737.47 549.77 738.23 541.66 734.41 C 533.35 730.63 527.25 722.27 526.49 713.13 C 526.18 709.12 526.36 705.09 526.32 701.07 C 526.30 624.40 526.37 547.72 526.28 471.06 C 526.95 462.09 532.73 453.87 540.72 449.86 Z" />
                </g>
            </svg>
        </div>
        <span class="two">NNECT</span>
        </div>
        <div class="welcome">
            <p>
                Welcome to MMUST Connect and thank you for
                choosing to register with us!!!
            </p>
        </div>
    </div>
        
    <div class="wrapper" >
        <div class="title">
            REGISTRATION FORM
        </div>
        <div class="form">
            <form method="post" action="" onsubmit="return validateRegistrationNumber()" id="registration_form" id="content">
                <div class="input_field">
                    <label>First Name</label>
                    <input value="<?php echo $fname?>" type="text" name="fname" class="input" required autocomplete="on" placeholder="Enter your First name">
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input value="<?php echo $lname?>" type="text" name="lname" class="input" required autocomplete="on" placeholder="Enter your Last name">
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_select">
                        <select name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="input_field">
                    <label>Registration Number</label>
                    <input value="<?php echo $regnum?>" type="text" id="registration_number" name="regnum" class="input" required autocomplete="on" placeholder="Enter your Reg. No. e.g. ITE/D/01-55621/2020">
                </div>
                
                <div class="input_field">
                    <label>Date of Birth</label>
                    <input value="<?php echo $dob?>" type="date" name="dob" class="input" id="dob" required pattern="\d{4}-\d{2}-\d{2}"  placeholder="YYYY-MM-DD">
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input value="<?php echo $email?>" type="email" name="email" class="input" required autocomplete="on" placeholder="Enter your Email Address">
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input value="<?php echo $phone?>" type="tel" name="phone" class="input" required autocomplete="on" placeholder="Enter your Phone Number">
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" name="pass" class="input" required placeholder="Enter your Password">
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" name="cpass" class="input" required placeholder="Confirm Password">
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>You soley Agreed to the Terms and Conditions</p>
                </div>
                <div class="input_field">
                    <input type="submit" name="submit" value="REGISTER" class="btn" required>
                </div>

                <p>Already have an Account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

    <script src="js/register.js"></script>
    <script src="js/DOBvalid.js"></script>
</body>
</html>