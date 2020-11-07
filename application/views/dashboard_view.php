<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dashboard.css">
</head>

<body>
    <nav>
        <ul>
            <li>
                <div class="profile-pic">
                    <img id="profile" src="<?php echo base_url() ?>upload/user<?php echo $data['profile'] ?>" alt="Profile Pic">
                </div>
            </li>
            <a href="">
                <li id="title"><?php echo $data['full_name'] ?></li>
            </a>
            <a href="<?php echo base_url('searchUsers') ?>">
                <li><?php echo "Search Users" ?></li>
            </a>
            <a href="">
                <li><?php echo "[ 0 ] Followers" ?></li>
            </a>
            <a href="">
                <li><?php echo "[ 0 ] Following" ?></li>
            </a>
            <a href="">
                <li><?php echo "Edit Profile" ?></li>
            </a>
            <a href="<?php echo base_url('logout') ?>">
                <li><?php echo "Log Out" ?></li>
            </a>
        </ul>
    </nav>

    <div class="container">
        <h1>Newsfeed</h1>
    </div>

</body>

</html>