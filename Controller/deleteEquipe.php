<?php

include("../Model/delete.php");
$id = $_GET['id'];
deleteEquipe($id);
deleteJoueursFromEquipe($id);
header("Location: /egames/View/admin.php?success=5");

?>