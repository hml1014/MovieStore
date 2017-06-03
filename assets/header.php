<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- Set the viewport so this responsive site displays correctly on mobile devices -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if (array_key_exists('page-title', $data_set)) echo $data_set['page-title']; else echo "Framework v1.1"; ?></title>
<!-- Include bootstrap CSS -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo HOME.DS; ?>assets/css/styles.css" >
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='<?php echo HOME.DS; ?>assets/js/script.js'></script>
</head>
<body>
<div  class='row' id='outer-box' ><!-- outer box -->
        <div class='col-xs-12 header'>
                <h2><?php if (array_key_exists('page-title', $data_set)) echo $data_set['page-title']; else echo "Title";?></h2>
                <div class='col-xs-4'><a class='a-menu' href="<?php echo HOME; ?>">Home</a></div>
                <div class='col-xs-8'>
                        <div id='customer-name'><span id='user'>
                        <?php if (isset($_SESSION['username'])){  echo $_SESSION['username']; }?>
                                </span>
                                <span id='sign-out'>Sign out</span`>
                        </div>
                        <div id='lg-box'><span class='a-menu'>Username: </span><input type='text' id='username' class='log-info'>
                        <span class='a-menu'>Password: </span><input type='password' id='pwd' class='log-info'><span id='sign-in'>Sign in</span>
			</div>
                </div>
        </div>
 </div>
