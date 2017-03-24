<?php

  include 'loginBDD.php';
  include 'header.php';

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Liste des étudiants <small>Back office</small></h1>
        </div>";

  $query = $pdo->prepare("SELECT * FROM etudiant");
  $query->execute();

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
            for ($i=0; $row = $query->fetch() ; $i++) {
            echo  "<tr><td>".$row["nom"]." ".$row["prenom"]."</td> <td>".$row["section"]."</td>
                  <form action='details.php' method='post'>
                  <input type='hidden' name='nom' value='".$row['nom']."' />
                  <input type='hidden' name='prenom' value='".$row['prenom']."' />
                  <td><input type='submit' value='Details' /></td>
                  </form>
                  <form action='modifier.php' method='post'>
                  <input type='hidden' name='nom' value='".$row['nom']."' />
                  <input type='hidden' name='prenom' value='".$row['prenom']."' />
                  <td><input type='submit' value='Modifier' /></td>
                  </form>
                  <form action='supprimer.php' method='post'>
                  <input type='hidden' name='nom' value='".$row['nom']."' />
                  <input type='hidden' name='prenom' value='".$row['prenom']."' />
                  <td><input type='submit' value='Supprimer' /></td>
                  </form>";
          }

          echo "</tbody>
                  </table>";


  echo "<a class='btn btn-default btn-lg btn-block' href = 'ajout.php'>Nouvel Etudiant</a></div>";

  include 'footer.php';
