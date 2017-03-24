<?php
    // Inclusion du header qui contient le <head> ainsi que le barre de navigation
    include 'header.php';
    include 'loginBDD.php';

    // Requete pour recupérer les données de la base étudiant
    $query = $pdo->prepare("SELECT * FROM etudiant");
    $query->execute();
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
          <div class='container'>
            <div class='page-header'>
              <h1>Liste des étudiants <small>Front office</small></h1>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Identité</th>
                <th>Section</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for ($i=0; $row = $query->fetch() ; $i++) {
                  echo "<tr>
                          <td>".$row["nom"]." ".$row["prenom"]."</td>
                          <td>".$row["section"]."</td>
                        </tr>";
                }
              ?>
            </tbody>
          </table>

          <?php
            $query = $pdo->prepare("SELECT * FROM section");
            $query->execute();
          ?>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>Section</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for ($i=0; $row = $query->fetch() ; $i++) {
                  echo "<tr>
                          <td>".$row["section"]."</td>
                        </tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

<?php
    include 'footer.php';
