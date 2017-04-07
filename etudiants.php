<?php
  // Inclusion : connexion à la BDD et header Html
  include 'loginBDD.php';
  include 'header.php';

  // Titre
  echo "<div class='container'>
        <div class='page-header'>
          <h1>Liste des étudiants <small>Back office</small></h1>
        </div>";

  // Requête de selection des étudiants rangés par nom
  $query = $pdo->prepare("SELECT * FROM etudiant ORDER BY nom");
  $query->execute();

  // Tableau principale : affiche le liste des étudiants
  echo "<table class='table table-striped'>
          <thead>
            <tr>
              <th>Identité</th>
              <th>Section</th>
              <th>Détails</th>
              <th>Modification</th>
              <th>Suppression</th>
            </tr>
          </thead>
          <tbody>";
            // Boucle for affiche une ligne par étudiants
            for ($i=0; $row = $query->fetch() ; $i++) {
            echo  "<tr>
                    <!-- Nom et prenom de l'étudiant -->
                    <td>".$row["nom"]." ".$row["prenom"]."</td>
                    <!-- Section de l'étudiant -->
                    <td>".$row["section"]."</td>

                    <!-- Bouton Detail envoie le nom et prenom
                     de l'étudiant à la page details.php -->
                    <form action='details.php' method='post'>
                      <input type='hidden' name='nom' value='".$row['nom']."' />
                      <input type='hidden' name='prenom' value='".$row['prenom']."' />
                      <td><input type='submit' value='Details' /></td>
                    </form>

                    <!-- Bouton Modifier envoie le nom et prenom
                     de l'étudiant à la page modifier.php -->
                    <form action='modifier.php' method='post'>
                      <input type='hidden' name='nom' value='".$row['nom']."' />
                      <input type='hidden' name='prenom' value='".$row['prenom']."' />
                      <td><input type='submit' value='Modifier' /></td>
                    </form>

                    <!-- Bouton Supprimer envoie le nom et prenom
                     de l'étudiant à la page supprimer.php -->
                    <form action='supprimer.php' method='post'>
                      <input type='hidden' name='nom' value='".$row['nom']."' />
                      <input type='hidden' name='prenom' value='".$row['prenom']."' />
                      <td><input type='submit' value='Supprimer' /></td>
                    </form>";
          }

          echo "</tbody>
                  </table>";

  // Bouton pour ajouter un étudiant
  echo "<a class='btn btn-default btn-lg btn-block' href = 'ajout.php'>Nouvel Etudiant</a></div>";

  // Inclusion du footer Html
  include 'footer.php';
