<?php

  include 'loginBDD.php';
  include 'header.php';

  $section = htmlspecialchars($_POST["section"]);

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Modifier la section ".$section." <small>Back office</small></h1>
        </div>";

  echo '<form class="form-horizontal" method="post" action="modifsection.php">
          <div class="form-group">
            <label class="control-label col-sm-4" for="nouvelle_section">Nom de la nouvelle section :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name = "nouvelle_section" id="nouvelle_section">
              </div>
          </div>
          <input type="hidden" name="section" value='.$section.' />
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <input type="submit" class="btn btn-default" value = "Modifier" /><a href = "section.php" class="btn btn-default">Retour</a>
            </div>
          </div>
        </form>';

  $nouvelle_section = htmlspecialchars($_POST["nouvelle_section"]);

  if (isset($_POST["nouvelle_section"])) {
    // Suppression de la section à modifier
    $requete_supp = "DELETE FROM section WHERE `section` = :section";
    $query = $pdo->prepare($requete_supp);
    $query->bindParam(":section", $section, PDO::PARAM_STR, 15);
    $query->execute();

    // Ajout d'une nouvelle section
    $requete_add = "INSERT INTO section (section) VALUES (:nouvelle_section)";
    $query = $pdo->prepare($requete_add);
    $query->bindParam(":nouvelle_section", $nouvelle_section, PDO::PARAM_STR, 15);
    $query->execute();

    header('Location: section.php');
  }

  include 'footer.php';
