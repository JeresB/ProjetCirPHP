<?php

  // On inclut la connexion à la base de données et le header html
  include 'loginBDD.php';
  include 'header.php';

  // Requête de selection des sections
  $query_section = $pdo->prepare("SELECT * FROM section");
  $query_section->execute();

  // Titre de la page
  echo "<div class='container'>
        <div class='page-header'>
          <h1>Ajouter un étudiant <small>Back office</small></h1>
        </div>";

  // Formulaire
  echo '<form class="form-horizontal" method="post" action="ajout.php">
          <!-- Nom -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="nom">Nom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "nom" id="nom" required>
              </div>
          </div>

          <!-- Prenom -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="prenom">Prenom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "prenom" id="prenom" required>
              </div>
          </div>

          <!-- Mail -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="mail">Mail :</label>
              <div class="col-sm-10">
                <input type="mail" class="form-control" name = "mail" id="mail" required>
              </div>
          </div>

          <!-- Date de naissance -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date d\'anniversaire :</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name = "date" id="date" required>
              </div>
          </div>

          <!-- Section -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="section">Section :</label>
              <div class="col-sm-10">
                <select class="form-control selectpicker" name = "section" id = "section" required>';

                  // On recupère les sections dans la BDD pour crée le menu déroulant
                  for ($i=0; $row = $query_section->fetch() ; $i++) {
                    echo '<option>'.$row["section"].'</option>';
                  }
                echo '</select>
              </div>
          </div>

          <!-- Bouton d\'envoie -->
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default" value = "Ajouter" /><a href = "etudiants.php" class="btn btn-default">Retour</a>
            </div>
          </div>
        </form>';

  // On sécurise les données recueillies dans la base de données
  $nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : NULL;
  $prenom = isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : NULL;
  $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : NULL;
  $date = isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : NULL;
  $section = isset($_POST["section"]) ? htmlspecialchars($_POST["section"]) : NULL;

  // Si les données existent
  if ($nom != NULL && $prenom != NULL && $prenom != NULL && $date != NULL && $section != NULL) {
    $requete_sql = "INSERT INTO etudiant (mail, nom, prenom, date_naissance, section) VALUES (:mail, :nom, :prenom, :date, :section)";
    $query = $pdo->prepare($requete_sql);
    $query->bindParam(":mail", $mail, PDO::PARAM_STR, 50);
    $query->bindParam(":nom", $nom, PDO::PARAM_STR, 20);
    $query->bindParam(":prenom", $prenom, PDO::PARAM_STR, 20);
    $query->bindParam(":date", $date);
    $query->bindParam(":section", $section, PDO::PARAM_STR, 15);
    $query->execute();

    // Redirection vers la liste des étudiants
    header('Location: etudiants.php');
  }

  // Inclusion du footer Html
  include 'footer.php';
