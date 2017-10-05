<?php
/*
Template Name: Logout Page Template
*/
unset($_COOKIE['csafny']);
setcookie('csafny', '', (time()-5400));

header('Location: /wp-login.php?redirect_to=/?canada=true&reauth=1');

