<?php if(!isset($utilisateur))
		echo "Veuillez fournir l'identifiant d'un utilisateur";
	  else { ?>

<p>Voici les contacts de <b><?php echo $utilisateur["prenom"] . ' ' . $utilisateur["nom"];?></b> !</p>
	
<form class="normal" method="post">
	<input type="hidden" />
	<input type="submit" name="accueil" value="Revenir à l'accueil"/>
	<input type="submit" name="disconnect" value="Appuyez pour vous déconnecter"/>
</form>

<table>
	<tr>
		<td colspan="5">Contacts</td>
	</tr>
	<tr>
		<td>Prénom</td>
		<td>Nom</td>
		<td>E-mail</td>
		<td>Rôle</td>
		<td>Identifiant</td>
	</tr>
	<?php
		if(isset($contacts)) foreach ($contacts as $contact) {
			echo '<tr>';
			echo '<td>' . $contact['prenom'] . '</td>';
			echo '<td>' . $contact['nom'] . '</td>';
			echo '<td>' . $contact['email'] . '</td>';
			echo '<td>' . $contact['role'] . '</td>';
			echo '<td><a href="index.php?controle=contact&action=contacts&id=' . $contact['id_nom'] . '">' . $contact['id_nom'] . '</a></td>';
			echo '</tr>';
		}
	?>
</table>

<?php } ?>