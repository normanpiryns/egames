<?php 

function editJoueur($post){
  include('connection.php');
  $query = "UPDATE joueurs SET nom = :nom, prenom = :prenom, dateNaissance = :dateNaissance, age = :age, email = :email, pseudo = :pseudo, fk_jeu = :fk_jeu where id = :id";
  $query_params = array( ':id' => $post['id'],
  						':nom' => $post['nom'],
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

function editEquipe($id,$nom,$fk_jeu){
  include('connection.php');
  $query = "UPDATE equipes SET nom = :nom, fk_jeu = :fk_jeu WHERE id = :id";
  $query_params = array( ':id' => $id,
              ':nom' => $nom,
              ':fk_jeu' => $fk_jeu);
  try
  {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
  }
  catch(PDOException $ex){
      die("Failed query : " . $ex->getMessage());
  }
}

function editJoueursEnEquipe($post){
  include('connection.php');
  $query = "UPDATE joueurs SET nom = :nom1, prenom = :prenom1, dateNaissance = :dateNaissance1, age = :age1, email = :email1, pseudo = :pseudo1, fk_jeu = :fk_jeu  WHERE id = :id1;
            UPDATE joueurs SET nom = :nom2, prenom = :prenom2, dateNaissance = :dateNaissance2, age = :age2, email = :email2, pseudo = :pseudo2, fk_jeu = :fk_jeu  WHERE id = :id2;
            UPDATE joueurs SET nom = :nom3, prenom = :prenom3, dateNaissance = :dateNaissance3, age = :age3, email = :email3, pseudo = :pseudo3, fk_jeu = :fk_jeu  WHERE id = :id3;
            UPDATE joueurs SET nom = :nom4, prenom = :prenom4, dateNaissance = :dateNaissance4, age = :age4, email = :email4, pseudo = :pseudo4, fk_jeu = :fk_jeu  WHERE id = :id4;
            UPDATE joueurs SET nom = :nom5, prenom = :prenom5, dateNaissance = :dateNaissance5, age = :age5, email = :email5, pseudo = :pseudo5, fk_jeu = :fk_jeu  WHERE id = :id5";
  $query_params = array( ':id1' => $post['id1'],
                        ':nom1' => $post['nom1'],
                        ':prenom1' => $post['prenom1'],
                        ':dateNaissance1' => $post['dateNaissance1'],
                        ':age1' => $post['age1'],
                        ':email1' => $post['email1'],
                        ':pseudo1' => $post['pseudo1'],
                        ':id2' => $post['id2'],
                        ':nom2' => $post['nom2'],
                        ':prenom2' => $post['prenom2'],
                        ':dateNaissance2' => $post['dateNaissance2'],
                        ':age2' => $post['age2'],
                        ':email2' => $post['email2'],
                        ':pseudo2' => $post['pseudo2'],
                        ':id3' => $post['id3'],
                        ':nom3' => $post['nom3'],
                        ':prenom3' => $post['prenom3'],
                        ':dateNaissance3' => $post['dateNaissance3'],
                        ':age3' => $post['age3'],
                        ':email3' => $post['email3'],
                        ':pseudo3' => $post['pseudo3'],
                        ':id4' => $post['id4'],
                        ':nom4' => $post['nom4'],
                        ':prenom4' => $post['prenom4'],
                        ':dateNaissance4' => $post['dateNaissance4'],
                        ':age4' => $post['age4'],
                        ':email4' => $post['email4'],
                        ':pseudo4' => $post['pseudo4'],
                        ':id5' => $post['id5'],
                        ':nom5' => $post['nom5'],
                        ':prenom5' => $post['prenom5'],
                        ':dateNaissance5' => $post['dateNaissance5'],
                        ':age5' => $post['age5'],
                        ':email5' => $post['email5'],
                        ':pseudo5' => $post['pseudo5'],
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

?>