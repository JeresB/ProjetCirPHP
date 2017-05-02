<?php

  include 'loginBDD.php';
  include 'header.php';

  $old_nom = $_POST["nom"];
  //echo "$old_nom";
  $old_prenom = $_POST["prenom"];
  

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Modifer l'étudiant : ".$old_nom." ".$old_prenom." <small> Back office</small></h1>
        </div>";


        $query = $pdo->prepare("SELECT * FROM etudiant WHERE `nom` = '".$_POST['nom']."' AND `prenom` = '".$_POST['prenom']."'");
        $query->execute();
        $row = $query->fetch();

        $query_section = $pdo->prepare("SELECT * FROM section");
        $query_section->execute();
        $row_section= $query_section->fetch();


  echo '<form class="form-horizontal" method="post" action="modifier.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Nom:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "nouveau_nom" id="nouveau_nom" value="'.$row['nom'].'" >

              </div>
          </div>
          <input type="hidden" class="form-control" name = "nom" id="nouveau_nom" value="'.$row['nom'].'" >

          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">prenom:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "nouveau_prenom" id="nouveau_nom" value="'.$row['prenom'].'" >

              </div>
          </div>
          <input type="hidden" class="form-control" name = "prenom" id="nouveau_nom" value="'.$row['prenom'].'" >

          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Mail:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "nouveau_mail" id="nouveau_nom" value="'.$row['mail'].'" >

              </div>
          </div>
          <input type="hidden" class="form-control" name = "mail" id="nouveau_nom" value="'.$row['mail'].'" >

          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Date de naissance:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "nouveau_date" id="nouveau_nom" value="'.$row["date_naissance"].'" >

              </div>
          </div>
          <input type="hidden" class="form-control" name = "date" id="nouveau_nom" value="'.$row["date_naissance"].'" >

          <div class="form-group">
            <label class="control-label col-sm-2" for="section">Section :</label>
              <div class="col-sm-10">
                <select class="form-control selectpicker" name = "nouveau_section" id = "section" required>';
                  for ($i=0; $row_section = $query_section->fetch() ; $i++) {
                    echo '<option>'.$row_section["section"].'</option>';
                  }
                echo '</select>
              </div>
          </div>
          <input type="hidden" name="section" value='.$row_section.' />
          <input type="submit"/>
        </form>';
            $nom = htmlspecialchars($_POST["nouveau_nom"]);
            //echo "$nom";
            $prenom = htmlspecialchars($_POST["nouveau_prenom"]);
            $mail = htmlspecialchars($_POST["nouveau_mail"]);
            $date = htmlspecialchars($_POST["nouveau_date"]);
            $section = htmlspecialchars($_POST["nouveau_section"]);

            
    if (isset($nom) AND $nom != $row['nom']) {
      $query = $pdo->prepare("UPDATE  `etudiant` SET  `nom` =  '".$nom."' WHERE  `mail` =  '".$row["mail"]."'");
      $query->execute();
      echo '<script type="text/javascript">
              alert ("Nom modifié !");
            </script>';
    }
    if (isset($prenom) AND $prenom != $row['prenom']) {
      $query = $pdo->prepare("UPDATE etudiant SET prenom =  '".$prenom."' WHERE mail =  '".$row["mail"]."'");
      $query->execute();
      echo '<script type="text/javascript">
              alert ("Prenom modifié !");
            </script>';
    }
    if (isset($mail) AND $mail != $row['mail'] ) {
      $query = $pdo->prepare("UPDATE etudiant SET mail =  '".$mail."' WHERE mail =  '".$row["mail"]."'");
      $query->execute();
      echo '<script type="text/javascript">
              alert ("Adresse mail modifiée !");
            </script>';
    }
    if (isset($date) AND  $date != $row["date_naissance"]) {
      $query = $pdo->prepare("UPDATE etudiant SET date_naissance =  '".$date."' WHERE mail =  '".$row["mail"]."'");
      echo '<script type="text/javascript">
              alert ("Date de naissance modifiée !");
            </script>';
    }
    if (isset($section)  AND $section != $row_section["section"]) {
      $query = $pdo->prepare("UPDATE etudiant SET section =  '".$section."' WHERE mail =  '".$row["mail"]."'");
      $query->execute();
      echo '<script type="text/javascript">
              alert ("Section modifiée !");
            </script>';
    }
            include 'footer.php';

