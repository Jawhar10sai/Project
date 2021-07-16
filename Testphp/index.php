<?php
require_once "classes/fetchclass.php";
?>

<table border="1">
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
    </tr>

    <?php foreach (Employes::ListeEmployes() as $employe) : ?>
        <tr>
            <td><?= $employe->id; ?></td>
            <td><?= $employe->nom; ?></td>
            <td><?= $employe->prenom; ?></td>
            <td><?= $employe->email; ?></td>
        </tr>
    <?php endforeach; ?>

</table>