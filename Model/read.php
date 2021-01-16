<?php
function RecupJeux(){
    include("connection.php");
    $query = "SELECT id,nom FROM jeux";
    $query_params = array();
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function RecupLoginInfo($login){
  include("connection.php");
  $query = "SELECT login, mdp FROM admins WHERE login = :login" ;
  $query_params = array(':login' => $login);
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result[0];
}

function RecupEmails(){
  include("connection.php");
  $query = "SELECT email FROM joueurs";
  $query_params = array();
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function RecupNomsEquipesByGame($fk_jeu){
  include("connection.php");
  $query = "SELECT nom FROM equipes WHERE fk_jeu = :fk_jeu";
  $query_params = array(":fk_jeu" => $fk_jeu);
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function RecupPseudosByGame($fk_jeu){
  include("connection.php");
  $query = "SELECT pseudo FROM joueurs WHERE fk_jeu = :fk_jeu";
  $query_params = array(":fk_jeu" => $fk_jeu);
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function RecupNbJoueursParEquipe(){
  include("connection.php");
  $query = "SELECT equipes.id, equipes.nom, count(joueurs.id)
            FROM equipes
            LEFT JOIN joueurs on equipes.id = joueurs.fk_equipe
            GROUP BY equipes.id";
  $query_params = array();
  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function RecupJoueursParEquipe($equipe_id){
  include("connection.php");
  $query = "SELECT id, nom, prenom, dateNaissance, email, pseudo FROM joueurs WHERE fk_equipe = :equipe_id";
  $query_params = array(":equipe_id" => $equipe_id);          
  try{ 
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


function RecupListeAdmins(){
  include("connection.php");
  $query = "SELECT login from admins";
  $query_params = array();          
  try{ 
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getAllData(){
  include("connection.php");
  $query = "SELECT joueurs.id, joueurs.nom, joueurs.prenom, joueurs.age, joueurs.email, joueurs.pseudo, joueurs.fk_jeu, joueurs.fk_equipe, equipes.nom as eqnom,jeux.nom as jnom
    from joueurs
    LEFT JOIN equipes on joueurs.fk_equipe = equipes.id
    LEFT JOIN jeux on joueurs.fk_jeu = jeux.id

            ";
  $query_params = array();          
  try{ 
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function RecupEquipes(){
    include("connection.php");
    $query = "SELECT id,nom,fk_jeu FROM equipes";
    $query_params = array();
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function RecupJoueurById($id){
    include("connection.php");
    $query = "SELECT id, nom, prenom, dateNaissance, email, pseudo, fk_jeu FROM joueurs WHERE id = :id";
    $query_params = array(':id' => $id);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}


function RecupEquipeById($id){
    include("connection.php");
    $query = "SELECT nom, fk_jeu FROM equipes WHERE id = :id";
    $query_params = array(':id' => $id);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}
?>