<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Showing Data</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<!--This is taken from "https://developers.facebook.com/docs/plugins/comments#configurator" -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<h1>Selected Club Data</h1>


<?php
$club_id = $_GET['club_id'];
// connection to database
try {
    require('database.php');
// selecting data from clubs table
    $sql = "Select * from clubs WHERE club_id = :club_id";
// execute & store the result
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
    $cmd->execute();

//having data from the table clubs
    $clubs = $cmd->fetchAll();
// starting table
    echo '<table class="table table-striped table-hover"><thead><th>Club Name</th><th>Ground</th><th>Club Id</th></thead>';
// loop through the data & show each restaurant on a new row
    foreach ($clubs as $c) {
        echo "<tr><td> {$c['club_name']} </td>
        <td> {$c['ground']} </td>
         <td> {$c['club_id']} </td></tr>";
    }
// close the table
    echo '</table>';

// disconnect
    $db = null;
}
catch(Exception $e) {
    // send
    mail('kbanyal10@gmail.com', 'Barrie Eats Error', $e);
    // show generic error page
    header('location:error.php');
}

require('Commenting.php');


?>
<a href="Form.php">Back To Main Page</a>






