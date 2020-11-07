<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/register.css">
</head>

<body>

    <form action="<?php echo base_url('saveUserToDB') ?>" method="post" enctype="multipart/form-data">
        <!-- name -->
        <div class="full_name">
            <label>Full Name: </label>
            <input type="text" name="full_name" id="full_name" placeholder="enter your name" value="<?php echo set_value('full_name') ?>">
            <?php form_error('full_name') ?>
        </div><br>

        <!-- username -->
        <div class="username">
            <label>Username: </label>
            <input type="text" name="username" id="username" placeholder="enter your username" value="<?php echo set_value('username') ?>">
            <?php form_error('username') ?>
        </div><br>

        <!-- email -->
        <div class="email">
            <label>E-mail: </label>
            <input type="text" name="email" id="email" placeholder="enter your email" value="<?php echo set_value('email') ?>">
            <?php form_error('email') ?>
        </div><br>


        <!-- gender -->
        <div class="gender">
            <label>Gender: </label><br>
            Male: <input type="radio" name="gender" value="Male">&nbsp;&nbsp;&nbsp;
            Female: <input type="radio" name="gender" value="Female">&nbsp;&nbsp;&nbsp;
            Others: <input type="radio" name="gender" value="Others">
            <?php form_error('gender') ?>
        </div><br>

        <!-- password -->
        <div class="password">
            <label>Password: </label>
            <input type="password" name="password" id="password" placeholder="enter your password" value="<?php echo set_value('password') ?>">
            <?php form_error('password') ?>
        </div><br><br>

        <!-- profile pic -->
        <div class="profile">
            <label id="label-profile" for="profile">Upload Profile Pic </label>
            <input type="file" hidden name="profile" id="profile">
        </div><br><br>

        <!-- submit -->
        <input type="submit" value="Register" id="submit"><br>
    </form><br>

    <a href="<?php echo base_url('index') ?>"><button>Cancel</button></a>

</body>

</html>