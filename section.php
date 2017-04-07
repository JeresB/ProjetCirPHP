<?php // Inclusion : connexion à la BDD et header html
  include 'loginBDD.php';
  include 'header.php';
?>

  <!-- Titre -->
  <div class='container'>
    <div class='page-header'>
      <h1>Liste des sections <small>Back office</small></h1>
  </div>

<?php // Requête SQL : selection
  $query = $pdo->prepare("SELECT * FROM section");
  $query->execute();
?>

<!-- Container incluant le tableau d'affichage des sections -->
<div class = "container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Section</th>
        <th>Modification</th>
        <th>Suppression</th>
      </tr>
    </thead>
    <tbody>

<!-- Boucle For pour afficher chaques sections -->
<?php for ($i=0; $row = $query->fetch() ; $i++) { ?>
  <tr>
    <!-- Affiche le nom de la section -->
    <td><?php $row["section"] ?></td>
    <!-- Formulaire permettant de modfifier le nom de la section -->
    <form action='modifsection.php' method='post'>
      <input type='hidden' name='section' value='<?php $row['section'] ?>' />
      <td><input type='submit' value='Modifier' /></td>
    </form>
    <!-- Formulaire permettant de supprimer la section -->
    <form action='suppsection.php' method='post'>
      <input type='hidden' name='section' value='<?php $row['section'] ?>' />
      <td><input type='submit' value='Supprimer' /></td>
    </form>
  </tr>
<?php } ?>

    </tbody>
  </table>
  <!-- Bouton d'ajout d'une nouvelle section -->
  <a class='btn btn-default btn-lg btn-block' href = 'ajoutsection.php'>Nouvelle Section</a>
</div>
<!-- Fin du tableau d'affichage des sections -->

<!-- Inclusion du footer html -->
<?php include 'footer.php'; ?>
