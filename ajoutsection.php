<?php

  include 'loginBDD.php';
  include 'header.php';

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Ajouter une section <small>Back office</small></h1>
        </div>";

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

  $section = $_POST["section"];

  if (isset($section)) {
    $query = $pdo->prepare("INSERT INTO section (section) VALUES ('".$section."')");
    $query->execute();

    header('Location: section.php');
  }

  include 'footer.php';
