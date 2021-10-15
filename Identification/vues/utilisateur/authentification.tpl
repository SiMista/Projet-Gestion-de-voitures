<form action="./index.php?controle=utilisateur&action=authentification" method="post">
	<span>E-mail</span>
	<input type="email" id="email" name="email" placeholder="Votre e-mail" />
	
	<span>Numéro secret</span> 
	<input type="password" id="num" name="num" placeholder="Votre numéro secret" />

	<input type="submit" value="Soumettre" />
</form>

<p id="res"><?php if(isset($res)) echo $res; ?></p>

<a href="./index.php?controle=utilisateur&action=inscription">Appuyez pour créer un compte</a>