<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connect | Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link rel="stylesheet" href="./assets/css/switcher.css">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../img/logo2.png">
</head>
<body>
     
    <!-- /. NAV TOP  -->
    <?php
    
    include("./admin_nav_top.php");

    ?>
    
    <?php
    
    include("./admin_nav.php");
    
    ?>
    
    <!-- /. NAV TOP  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <p>THEME COLORS</p>
            <div class="colors">
                <span class="active" onclick="change_color('#1dd1a1')" style="--clr: #1dd1a1;"></span>
                <span  onclick="change_color('#ff6b6b')" style="--clr: #ff6b6b;"></span>
                <span  onclick="change_color('#2e86de')" style="--clr: #2e86de;"></span>
                <span  onclick="change_color('#f368e0')" style="--clr: #f368e0;"></span>
                <span  onclick="change_color('#ff9f43')" style="--clr: #ff9f43;"></span>
            </div>
        </div>
    </div>

    <script src="./assets/js/switcher.js"></script>
</body>
</html>
