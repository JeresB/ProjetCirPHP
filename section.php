<?php

  include 'loginBDD.php';
  include 'header.php';

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Liste des sections <small>Back office</small></h1>
        </div>";

  $query = $pdo->prepare("SELECT * FROM section");
  $query->execute();

  echo '<div class = "container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Section</th>
              <th>Modification</th>
              <th>Suppression</th>
            </tr>
          </thead>
          <tbody>';
              for ($i=0; $row = $query->fetch() ; $i++) {
                echo "<tr>
                        <td>".$row["section"]."</td>
                        <form action='modifsection.php' method='post'>
                        <input type='hidden' name='section' value='".$row['section']."' />
                        <td><input type='submit' value='Modifier' /></td>
                        </form>
                        <form action='suppsection.php' method='post'>
                        <input type='hidden' name='section' value='".$row['section']."' />
                        <td><input type='submit' value='Supprimer' /></td>
                        </form>
                      </tr>";
              }

    echo "</tbody>
        </table>
        <a class='btn btn-default btn-lg btn-block' href = 'ajoutsection.php'>Nouvelle Section</a>
      </div>";


  include 'footer.php';
