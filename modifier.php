<?php

  include 'loginBDD.php';
  include 'header.php';

  $old_nom = $_POST["nom"];
  $old_prenom = $_POST["prenom"];

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Modifer l'étudiant : ".$old_nom." ".$old_prenom." <small> Back office</small></h1>
        </div>";

  echo '<form class="form-horizontal" method="post" action="modifier.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Nouveau Nom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "nouveau_nom" id="nouveau_nom">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_prenom">Nouveau Prenom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "nouveau_prenom" id="nouveau_prenom">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="mail">Nouveau Mail :</label>
              <div class="col-sm-10">
                <input type="mail" class="form-control" name = "mail" id="mail">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="date">Nouveau date d\'anniversaire :</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name = "date" id="date">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="section">Nouvelle section :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "section" id="section">
              </div>
          </div>
          <input type="hidden" name="nom" value='.$old_nom.' />
          <input type="hidden" name="prenom" value='.$old_prenom.' />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default" value = "Modifier" /><a href = "etudiants.php" class="btn btn-default">Retour</a>
            </div>
          </div>
        </form>';

    $nom = $_POST["nouveau_nom"];
    $prenom = $_POST["nouveau_prenom"];
    $mail = $_POST["mail"];
    $date = $_POST["date"];
    $section = $_POST["section"];

    echo "info : ".$nom." ".$prenom." ".$mail." ".$date." ".$section;
    echo "de : ".$old_nom." ".$old_prenom." ";

    if (isset($nom)) {
      $query = $pdo->prepare("UPDATE etudiant SET mail = '".$mail."', nom = '".$nom."', prenom = '".$prenom."', date_naissance = '".$date."', section = '".$section."' WHERE nom = '".$old_nom."' AND prenom = '".$old_prenom."'");
      $query->execute();

      echo '<script type="text/javascript">
              alert ("Mise à jour effectuée !");
            </script>';
    }


  include 'footer.php';
