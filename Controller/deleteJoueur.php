<?php

include("../Model/delete.php");
$id = $_GET['id'];
deleteJoueur($id);
header("Location: /egames/View/admin.php?success=4")

?>