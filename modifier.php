<?php

  include 'loginBDD.php';
  include 'header.php';

  $old_nom = htmlspecialchars($_POST["nom"]);
  $old_prenom = htmlspecialchars($_POST["prenom"]);

  $query = $pdo->prepare("SELECT * FROM etudiant WHERE nom = '".$old_nom."' AND prenom = '".$old_prenom."'");
  $query->execute();
  $row = $query->fetch();

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Modifer l'étudiant : ".$old_nom." ".$old_prenom." <small> Back office <a href = 'etudiants.php' class='btn btn-default'>Retour</a></small></h1>
        </div>";

  echo '<form class="form-horizontal" method="post" action="modifier.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="nouveau_nom">Nouveau Nom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name = "nouveau_nom" id="nouveau_nom">
              </div>
          </div>
          <input type="hidden" name="nom" value='.$row["nom"].' />
          <input type="hidden" name="prenom" value='.$row["prenom"].' />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default" value = "Modifier le nom" />
            </div>
          </div>
        </form>

        <form class="form-horizontal" method="post" action="modifier.php">
           <div class="form-group">
             <label class="control-label col-sm-2" for="nouveau_prenom">Nouveau Prenom :</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" name = "nouveau_prenom" id="nouveau_prenom">
               </div>
           </div>
           <input type="hidden" name="nom" value='.$row["nom"].' />
           <input type="hidden" name="mail" value='.$row["mail"].' />
           <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
               <input type="submit" class="btn btn-default" value = "Modifier le prenom" />
             </div>
           </div>
         </form>

         <form class="form-horizontal" method="post" action="modifier.php">
            <div class="form-group">
               <label class="control-label col-sm-2" for="mail">Nouveau Mail :</label>
               <div class="col-sm-10">
                  <input type="mail" class="form-control" name = "mail" id="mail">
                </div>
             </div>
            <input type="hidden" name="nom" value='.$row["nom"].' />
            <input type="hidden" name="prenom" value='.$row["prenom"].' />
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value = "Modifier l\'adresse mail" />
              </div>
            </div>
          </form>

          <form class="form-horizontal" method="post" action="modifier.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="date">Nouvelle date d\'anniversaire :</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name = "date" id="date">
              </div>
          </div>
             <input type="hidden" name="nom" value='.$row["nom"].' />
             <input type="hidden" name="prenom" value='.$row["prenom"].' />
             <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                 <input type="submit" class="btn btn-default" value = "Modifier la date de naissance" />
               </div>
             </div>
           </form>

           <form class="form-horizontal" method="post" action="modifier.php">
           <div class="form-group">
             <label class="control-label col-sm-2" for="section">Nouvelle section :</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" name = "section" id="section">
               </div>
           </div>
              <input type="hidden" name="nom" value='.$row["nom"].' />
              <input type="hidden" name="prenom" value='.$row["prenom"].' />
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-default" value = "Modifier la section" />
                </div>
              </div>
            </form>';


    $nom = htmlspecialchars($_POST["nouveau_nom"]);
    $prenom = htmlspecialchars($_POST["nouveau_prenom"]);
    $mail = htmlspecialchars($_POST["mail"]);
    $date = htmlspecialchars($_POST["date"]);
    $section = htmlspecialchars($_POST["section"]);


    if (isset($_POST["nouveau_nom"])) {
      $query = $pdo->prepare("UPDATE  `pdo`.`etudiant` SET  `nom` =  '".$nom."' WHERE  `etudiant`.`mail` =  '".$row["mail"]."' AND `etudiant`.`prenom` = '".$row["prenom"]."'");
      $query->execute();

      echo '<script type="text/javascript">
              alert ("Nom modifié !");
            </script>';
    }

    if (isset($_POST["nouveau_prenom"])) {
      $query = $pdo->prepare("UPDATE etudiant SET prenom =  '".$prenom."' WHERE nom = '".$old_nom."' AND mail =  '".$mail."'");
      $query->execute();

      echo '<script type="text/javascript">
              alert ("Prenom modifié !");
            </script>';
    }

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
    }

  include 'footer.php';
