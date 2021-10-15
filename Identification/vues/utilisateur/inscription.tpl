<form action="index.php?controle=utilisateur&action=inscription" method="post" id="form-inscription">
	<span>Prenom</span>
	<input type="text" id="prenom" name="prenom" placeholder="Votre prénom" />

	<span>Nom</span>
	<input type="text" id="nom" name="nom" placeholder="Votre nom" />
	
	<span>Numéro secret</span> 
	<input type="password" id="num" name="num" placeholder="Votre numéro secret" />
	
	<span>E-mail</span> 
	<input type="email" id="email" name="email" placeholder="Votre email" />

	<span>Voulez-vous être seulement visiteur ?</span> 
	<input type="hidden" name="role" value="false" />
	<input type="checkbox" id="role" name="role" />

	<input type="submit" value="Soumettre" />
</form>

<p id="res"><?php if(isset($res)) echo $res; ?></p>

<a href="./index.php?controle=utilisateur&action=authentification">Appuyez si vous avez déjà un compte</a>