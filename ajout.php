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

  $nom = htmlspecialchars($_POST["nom"]);
  $prenom = htmlspecialchars($_POST["prenom"]);
  $mail = htmlspecialchars($_POST["mail"]);
  $date = htmlspecialchars($_POST["date"]);
  $section = htmlspecialchars($_POST["section"]);


  if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["date"]) && isset($_POST["section"])) {
    $requete = "INSERT INTO etudiant (mail, nom, prenom, date_naissance, section) VALUES (:mail, :nom, :prenom, :date, :section)";
    $query = $pdo->prepare($requete);
    $query->bindParam(":mail", $mail, PDO::PARAM_STR, 50);
    $query->bindParam(":nom", $nom, PDO::PARAM_STR, 20);
    $query->bindParam(":prenom", $prenom, PDO::PARAM_STR, 20);
    $query->bindParam(":date", $date);
    $query->bindParam(":section", $section, PDO::PARAM_STR, 15);
    $query->execute();

    header('Location: etudiants.php');
  }

  include 'footer.php';
