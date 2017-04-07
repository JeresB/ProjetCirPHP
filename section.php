<?php
  // Inclusion : connexion à la BDD et header Html
  include 'loginBDD.php';
  include 'header.php';

  // Titre Html
  echo "<div class='container'>
        <div class='page-header'>
          <h1>Liste des sections <small>Back office</small></h1>
        </div>";

  // Préparation et execution de la selection
  $query = $pdo->prepare("SELECT * FROM section");
  $query->execute();

  // Div html principale contenant un tableau
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
            // Boucle for qui affiche chaques sections
            for ($i=0; $row = $query->fetch() ; $i++) {
              echo "<tr>
                      <!-- Nom de la section -->
                      <td>".$row["section"]."</td>
                      <!-- Formulaire de modification de la section -->
                      <form action='modifsection.php' method='post'>
                        <input type='hidden' name='section' value='".$row['section']."' />
                        <td><input type='submit' value='Modifier' /></td>
                      </form>
                      <!-- Formulaire de suppression de la section -->
                      <form action='suppsection.php' method='post'>
                        <input type='hidden' name='section' value='".$row['section']."' />
                        <td><input type='submit' value='Supprimer' /></td>
                      </form>
                    </tr>";
            }

    echo "</tbody>
        </table>
        <!-- Bouton pour ajouter une section -->
        <a class='btn btn-default btn-lg btn-block' href = 'ajoutsection.php'>
          </i> Nouvelle Section</a>
      </div>";

  // Inclusion du footer Html
  include 'footer.php';
