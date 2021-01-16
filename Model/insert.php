<?php

function insertJoueur($post){
  include('connection.php');
  $query = "INSERT INTO joueurs (nom, prenom, dateNaissance, age, email, pseudo, fk_jeu) VALUES (:nom, :prenom, :dateNaissance, :age, :email, :pseudo, :fk_jeu)";
  $query_params = array( ':nom' => $post['nom'],
                        ':prenom' => $post['prenom'],
                        ':dateNaissance' => $post['dateNaissance'],
                        ':age' => $post['age'],
                        ':email' => $post['email'],
                        ':pseudo' => $post['pseudo'],
                        ':fk_jeu' => $post['fk_jeu']);
  try
  {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
}

function insertEquipe($nom,$fk_jeu){
  include('connection.php');
  $query = "INSERT INTO equipes (nom, fk_jeu) VALUES (:nom, :fk_jeu)";
  $query_params = array( ':nom' => $nom,
                        ':fk_jeu' => $fk_jeu);
  try
  {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  return $db->lastInsertId();
}

function insertAllJoueurs($post){
  include('connection.php');
  $query = "INSERT INTO joueurs (nom, prenom, dateNaissance, age, email, pseudo, fk_jeu, fk_equipe) VALUES (:nom1, :prenom1, :dateNaissance1, :age1, :email1, :pseudo1, :fk_jeu, :fk_equipe);
  			INSERT INTO joueurs (nom, prenom, dateNaissance, age, email, pseudo, fk_jeu, fk_equipe) VALUES (:nom2, :prenom2, :dateNaissance2, :age2, :email2, :pseudo2, :fk_jeu, :fk_equipe);
  			INSERT INTO joueurs (nom, prenom, dateNaissance, age, email, pseudo, fk_jeu, fk_equipe) VALUES (:nom3, :prenom3, :dateNaissance3, :age3, :email3, :pseudo3, :fk_jeu, :fk_equipe);
  			INSERT INTO joueurs (nom, prenom, dateNaissance, age, email, pseudo, fk_jeu, fk_equipe) VALUES (:nom4, :prenom4, :dateNaissance4, :age4, :email4, :pseudo4, :fk_jeu, :fk_equipe);
  			INSERT INTO joueurs (nom, prenom, dateNaissance, age, email, pseudo, fk_jeu, fk_equipe) VALUES (:nom5, :prenom5, :dateNaissance5, :age5, :email5, :pseudo5, :fk_jeu, :fk_equipe);";
  			
  $query_params = array( ':nom1' => $post['nom1'],
                        ':prenom1' => $post['prenom1'],
                        ':dateNaissance1' => $post['dateNaissance1'],
                        ':age1' => $post['age1'],
                        ':email1' => $post['email1'],
                        ':pseudo1' => $post['pseudo1'],
                        ':nom2' => $post['nom2'],
                        ':prenom2' => $post['prenom2'],
                        ':dateNaissance2' => $post['dateNaissance2'],
                        ':age2' => $post['age2'],
                        ':email2' => $post['email2'],
                        ':pseudo2' => $post['pseudo2'],
                        ':nom3' => $post['nom3'],
                        ':prenom3' => $post['prenom3'],
                        ':dateNaissance3' => $post['dateNaissance3'],
                        ':age3' => $post['age3'],
                        ':email3' => $post['email3'],
                        ':pseudo3' => $post['pseudo3'],
                        ':nom4' => $post['nom4'],
                        ':prenom4' => $post['prenom4'],
                        ':dateNaissance4' => $post['dateNaissance4'],
                        ':age4' => $post['age4'],
                        ':email4' => $post['email4'],
                        ':pseudo4' => $post['pseudo4'],
                        ':nom5' => $post['nom5'],
                        ':prenom5' => $post['prenom5'],
                        ':dateNaissance5' => $post['dateNaissance5'],
                        ':age5' => $post['age5'],
                        ':email5' => $post['email5'],
                        ':pseudo5' => $post['pseudo5'],
                        ':fk_jeu' => $post['fk_jeu'],
  						':fk_equipe' => $post['equipe_id']);
  try
  {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
}



function insertAdmin($post){
  include('connection.php');
  $query = "INSERT INTO admins (login, mdp) VALUES (:login, :mdp)";
  $query_params = array( ':login' => $post['login'],
                        ':mdp' => $post['mdp']);
  try
  {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
}
?>

