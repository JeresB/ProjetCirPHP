<?php

  include 'loginBDD.php';
  include 'header.php';

 $old_nom = $_POST["nom"];
  echo "$old_nom";
  $old_prenom = $_POST["prenom"];
  /*$old_mail=
  $old_date_naissance=
  $old_section =*/


  echo "<div class='container'>
        <div class='page-header'>
          <h1>Modifer l'étudiant : ".$old_nom." ".$old_prenom." <small> Back office</small></h1>
        </div>";


        $query = $pdo->prepare("SELECT * FROM etudiant WHERE `nom` = '".$_POST['nom']."' AND `prenom` = '".$_POST['prenom']."'");
        $query->execute();
        $row = $query->fetch();

        $query_section = $pdo->prepare("SELECT * FROM section");
        $query_section->execute();



  echo '<form class="form-horizontal" method="post" action="modifier.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Nom:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "nouveau_nom" id="nouveau_nom" value="'.$row['nom'].'" >

              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">prenom:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "nouveau_prenom" id="nouveau_nom" value="'.$row['prenom'].'" >

              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Mail:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "mail" id="nouveau_nom" value="'.$row['mail'].'" >

              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Date de naissance:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name = "date" id="nouveau_nom" value="'.$row["date_naissance"].'" >

              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="section">Section :</label>
              <div class="col-sm-10">
                <select class="form-control selectpicker" name = "section" id = "section" required>';
                  for ($i=0; $row_section = $query_section->fetch() ; $i++) {
                    echo '<option>'.$row_section["section"].'</option>';
                  }
                echo '</select>
              </div>
          </div>

          <input type="submit"/>
        </form>';
            $nom = htmlspecialchars($_POST["nouveau_nom"]);
            //echo "$nom";
            $prenom = htmlspecialchars($_POST["nouveau_prenom"]);
            $mail = htmlspecialchars($_POST["mail"]);
            $date = htmlspecialchars($_POST["date"]);
            $section = htmlspecialchars($_POST["section"]);

            if (isset($nom) ) {

              $query = $pdo->prepare("UPDATE etudiant SET  nom =  '".$nom."' WHERE  nom =  '".$row['nom']."'");
              $query->execute();


              echo '<script type="text/javascript">
                      alert ("Nom modifié !");
                    </script>';
              var_dump($row['nom']);
            }


          /* if (isset($_POST["nouveau_prenom"]) ) {
              $query = $pdo->prepare("UPDATE etudiant SET prenom =  '".$prenom."' WHERE nom = '".$old_nom."' AND mail =  '".$mail."'");
              $query->execute();
              echo '<script type="text/javascript">
                      alert ("Prenom modifié !");
                    </script>';
            }/*
            if (isset($_POST["mail"]) && !isset($_POST["nouveau_prenom"])) {
              $query = $pdo->prepare("UPDATE etudiant SET mail =  '".$mail."' WHERE nom =  '".$old_nom."' AND prenom = '".$old_prenom."'");
              $query->execute();
              echo '<script type="text/javascript">
                      alert ("Adresse mail modifiée !");
                    </script>';
            }
            if (isset($_POST["date"]) && !isset($_POST["nouveau_prenom"])) {
              $query = $pdo->prepare("UPDATE etudiant SET date_naissance =  '".$date."' WHERE nom =  '".$old_nom."' AND prenom = '".$old_prenom."'");
              $query->execute();
              echo '<script type="text/javascript">
                      alert ("Date de naissance modifiée !");
                    </script>';
            }
            if (isset($_POST["section"]) && !isset($_POST["nouveau_prenom"])) {
              $query = $pdo->prepare("UPDATE etudiant SET section =  '".$section."' WHERE nom =  '".$old_nom."' AND prenom = '".$old_prenom."'");
              $query->execute();
              echo '<script type="text/javascript">
                      alert ("Section modifiée !");
                    </script>';
            }*/
  include 'footer.php';
