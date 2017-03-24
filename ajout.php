<?php

  include 'loginBDD.php';
  include 'header.php';

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Ajouter un étudiant <small>Back office</small></h1>
        </div>";

  echo '<form class="form-horizontal" method="post" action="ajout.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="nom">Nom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "nom" id="nom">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="prenom">Prenom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "prenom" id="prenom">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="mail">Mail :</label>
              <div class="col-sm-10">
                <input type="mail" class="form-control" name = "mail" id="mail">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date d\'anniversaire :</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name = "date" id="date">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="section">Section :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "section" id="section">
              </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default" value = "Ajouter" /><a href = "etudiants.php" class="btn btn-default">Retour</a>
            </div>
          </div>
        </form>';

  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $mail = $_POST["mail"];
  $date = $_POST["date"];
  $section = $_POST["section"];

  if (isset($nom)) {
    $query = $pdo->prepare("INSERT INTO etudiant (mail, nom, prenom, date_naissance, section) VALUES ('".$mail."', '".$nom."', '".$prenom."', '".$date."', '".$section."')");
    $query->execute();

    header('Location: etudiants.php');
  }

  include 'footer.php';
