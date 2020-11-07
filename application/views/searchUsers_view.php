<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/datatables.min.css" />
    <script src="<?php echo base_url() ?>assets/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/searchUsers.css">
</head>

<body>

    <br><br>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>U-ID</th>
                <th>DP</th>
                <th>Name</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Joined</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $type = '';
            foreach ($data as $user) {
                echo "
            <tr id='data'>
            <td>{$user['user_id']}</td>
            <td> <div class='profile-pic'>
            <img id='profile' src='upload/user{$user['profile']}' alt='Profile Pic'>
            </td>
            <td>{$user['full_name']}</td>
            <td>{$user['username']}</td>
            <td>{$user['gender']}</td>
            <td>{$user['created_at']}</td>
            <td><a href='view/{$user['user_id']}'><button>View User</button></a></td>
            </tr>
                ";
            }

            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>U-ID</th>
                <th>DP</th>
                <th>Name</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Joined</th>
                <th>View</th>
            </tr>
        </tfoot>
    </table>
    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
</body>

</html>