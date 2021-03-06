<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Vida Locar</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./vue/styleCSS/style.css">
	<link rel="stylesheet" href="./vue/styleCSS/menu.css">
	<!-- <script src="script.js"></script> -->
</head>

<body>

	<header>
		<div id="menu">
			<nav id="nav" class="navbar navbar-expand-lg navbar-light">
				<a href="index.php"><img src='./vue/images/header/logo.png' id="logo"></a>
				<div class="container-fluid">
					

					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link active" onclick="AfficherConnexion()" href="#"
								id="item">Connexion</a>

						</li>
						<li class="nav-item">
							<a class="nav-link active" onclick="AfficherInscription()" href="#"
								id="inscription">Inscription</a>
						</li>

						<script>
							function AfficherConnexion() {
									if (document.getElementById("formInscri").style.display == "block")
										document.getElementById("formInscri").style.display = "none";
									var x = document.getElementById("formConnex");
									if (x.style.display === "block") {
										x.style.display = "none";
									} else {
										x.style.display = "block";
									}
							}
							function AfficherInscription() {
									if (document.getElementById("formConnex").style.display == "block")
										document.getElementById("formConnex").style.display = "none";
									var x = document.getElementById("formInscri");
									if (x.style.display === "block") {
										x.style.display = "none";
									} else {
										x.style.display = "block";
									}
							}
						</script>
					</ul>

				</div>
			</nav>
			<div id="formConnex" class="formulaire col-lg-4 col-md-4 col-sm-8 +col-xs-4">
				<form action="index.php?controle=utilisateur&action=ident" method="post">
					<a class="fermer" onclick="AfficherConnexion()" href="#" id="item">x</a>
					<h1>Connexion</h1>
					<p>
						<?php echo $_SESSION['msgCo']; $_SESSION['msgCo']=''?>
					</p>
					<p>Email : </p>
					<input name="email" value="" type="email" required/>
					<p>Mot de passe : </p>
					<input type="password" name="mdp" value="" required/> <br></br>
					<input class="btn btn-outline-light" type="submit" value="Se connecter" /> <br></br>
				</form>
			</div>
			<div id="formInscri" class="formulaire col-lg-4 col-md-4 col-sm-8 +col-xs-4">
				<form action="index.php?controle=utilisateur&action=inscri" method="post">
					<a class="fermer" onclick="AfficherInscription()" href="#" id="item">x</a>
					<h1>Inscription</h1>
					<p>
						<?php echo $_SESSION['msgIns']; $_SESSION['msgIns']=''?>
					</p>
					<p>Nom : </p>
					<input name="nom" id="nom" value="" required/>
					<p>Pseudo : </p>
					<input name="pseudo" id="pseudo" value="" required/>
					<p>Email : </p>
					<input name="email" id="email" value="" type="email" required />
					<p>Mot de passe : </p>
					<input type="password" name="mdp" id="mdp" value="" required/> 
					<p>Nom de l'entreprise : </p>
					<input name="nomE" id="nomE"/>
					<p>Adresse de l'entreprise : </p>
					<input name="adresseE" id="adresseE"/><br></br>
					<input class="btn btn-outline-light" type="submit" value="Valider" />
				</form>
			</div>
		</div>
	</header>

	<div>
		<img id="img-fond" src="./vue/images/carbackground.jpg" class="img-fluid" alt="Responsive image">
	</div>
	<h1 class="nomCo">Venez vivre la vida locar</h1>
	<div> 
		<?php
		if (isset ($VoituresDispo)) {
			echo
			'<div class="flex-container">
				<div id="blocPrincipal" class="d-flex p-3 text-white row justify-content-center align-self-center" > ';
					foreach ($VoituresDispo as $c) {
						$obj = json_decode($c['caract']);
						echo '
						<div id="boxes" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<img id="zoom" src="./vue/images/'. utf8_encode($c['photo']) . '"  style="max-height:200px" class="img-fluid" alt="Responsive image">
							<p id="txt1">Mod??le : '. ($c['typeV']) . '</p>
							<p id="txt1">Nombre de v??hicules disponibles : '. utf8_encode($c['nb']) . '</p>
							<p id="txt1">Cat??gorie : '. $obj->categorie . '</p>
							<p id="txt1">Moteur : '. $obj->moteur . '</p>
							<p id="txt1">Vitesse : '. $obj->vitesse . '</p>
							<p id="txt1">Nombre de places : '. $obj->nbPlaces . '</p>
						</div>
						';
					}
				echo '
				</div>
			</div>
			';
		}
		else 
			echo ('Pas de voitures');
		?>
	</div>


	<footer>
		<p>?? 2021 Vida Locar - All rights reserved</p>
	</footer>
</body>

</html>