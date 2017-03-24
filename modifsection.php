<?php

  include 'loginBDD.php';
  include 'header.php';

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Modifier la section ".$_POST["section"]." <small>Back office</small></h1>
        </div>";

  $section = $_POST["section"];

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

  $nouvelle_section = $_POST["nouvelle_section"];

  if (isset($nouvelle_section)) {
    $query = $pdo->prepare("DELETE FROM section WHERE `section` = '".$section."'");
    $query->execute();

    $query = $pdo->prepare("INSERT INTO section (section) VALUES ('".$nouvelle_section."')");
    $query->execute();

    header('Location: section.php');
  }


  include 'footer.php';
