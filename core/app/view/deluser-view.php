<?php

$user = Userdata::getById($_GET["id"]);

$user->del();
Core::redir("./index.php?view=Users");


?>