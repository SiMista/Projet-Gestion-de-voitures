
<p>Bienvenue <b><?php echo $profil["prenom"] . ' ' . $profil["nom"];?></b> ! <br>Votre adresse mail est <b><?php echo $profil["email"];?></b>.</p>

<form class="normal" method="post">
	<input type="hidden" />
	<input type="submit" name="calcul" value="Accéder à la calculatrice"/>
	<input type="submit" name="contacts" value="Accéder à vos contacts"/>
	<input type="submit" name="disconnect" value="Appuyez pour vous déconnecter"/>
</form>