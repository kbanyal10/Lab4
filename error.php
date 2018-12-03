
<html>

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
<a href="Form.php">Main Page</a>
<h1>Sorry!</h1>

<p>Something went wrong. And we are looking into it. Please try again later</p>
<?php
require('Commenting.php');
?>