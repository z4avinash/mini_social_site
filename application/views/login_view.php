<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect-U | LOGIN</title>
</head>

<body>
    <form action="<?php echo base_url('checkUserLogin') ?>" method="post">

        <!-- username -->
        <div class="username">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" placeholder="enter your username" value="<?php echo set_value('username') ?>"><?php echo form_error('username') ?>
        </div><br>

        <!-- password -->
        <div class="password">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" placeholder="enter your password" value="<?php echo set_value('password') ?>"><?php echo form_error('password') ?>
        </div><br><br>

        <input type="submit" value="LogIn" name="submit" id="submit">
    </form><br>
    <a href="<?php echo base_url('index') ?>"><button>Cancel</button></a>

</body>

</html>