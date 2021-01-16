<?php

function deleteJoueur($id){
  include('connection.php');
  $query = "DELETE FROM joueurs where id = :id";
  $query_params = array(':id' => $id);
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
}

function deleteEquipe($id){
  include('connection.php');
  $query = "DELETE FROM equipes where id = :id";
  $query_params = array(':id' => $id);
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
}
function deleteJoueursFromEquipe($fk_equipe){
  include('connection.php');
  $query = "DELETE FROM joueurs where fk_equipe = :fk_equipe";
  $query_params = array(':fk_equipe' => $fk_equipe);
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
}
?>