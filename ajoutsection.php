<?php
  // Inclusion : connexion à la BDD et header Html
  include 'loginBDD.php';
  include 'header.php';

  // Titre
  echo "<div class='container'>
        <div class='page-header'>
          <h1>Ajouter une section <small>Back office</small></h1>
        </div>";

  // Formulaire d'ajout d'une section
  echo '<form class="form-horizontal" method="post" action="ajoutsection.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="section">Section :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "section" id="section">
              </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default" value = "Ajouter" /><a href = "section.php" class="btn btn-default">Retour</a>
            </div>
          </div>
        </form>';

  // On récupère de le nom de la section
  $section = htmlspecialchars($_POST["section"]);

  // Si le nom de la section existe
  if (isset($_POST["section"])) {
    // Préparation et execution de la requête
    $requete = "INSERT INTO section (section) VALUES (:section)";
    $query = $pdo->prepare($requete);
    $query->bindParam(":section", $section, PDO::PARAM_STR, 15);
    $query->execute();

    // Redirection vers la liste des sections
    header('Location: section.php');
  }

  // Inclusion du footer Html
  include 'footer.php';
