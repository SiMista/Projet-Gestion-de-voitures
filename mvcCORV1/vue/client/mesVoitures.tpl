<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Mes voitures</title>

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
				<a href="index.php?controle=client&action=accueil"><img src='./vue/images/header/logo.png'
					id="logo"></a>
				<div class="container-fluid">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link active" href="index.php?controle=client&action=mesVoitures"
								id="item">Mes voitures 🚗</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="index.php?controle=utilisateur&action=deconnexion"
								id="deconnexion">Déconnexion 🚪</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<div>
		<img id="img-fond" src="./vue/images/carbackground.jpg" class="img-fluid" alt="Responsive image">
		<h1 class="nomCo">Mes voitures</h1>
	</div>
	<div>
		<?php
            if (isset ($Voitures)) {
                echo 
                '<div class="flex-container">
					<div id="blocPrincipal" class="d-flex p-3 text-white row justify-content-center align-self-center" > ';
                        foreach ($Voitures as $c) {
                            $obj = json_decode($c['caract']);
                            echo '
                            <div id="boxes" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <img id="zoom" src="./vue/images/'. utf8_encode($c['photo']) . '"  style="max-height:200px" class="img-fluid" alt="Responsive image">
                                <p id="txt1">Modèle : '. utf8_encode($c['typeV']) . '</p>
								<p id="txt1">Prix de la location : '. utf8_encode($c['valeur']) . '€</p>
                                <p id="txt1">Catégorie : '. $obj->categorie . '</p>
                                <p id="txt1">Moteur : '. $obj->moteur . '</p>
                                <p id="txt1">Vitesse : '. $obj->vitesse . '</p>
                                <p id="txt1">Nombre de places : '. $obj->nbPlaces . '</p>
                                <p id="txt1">Début de location : '. date("d/m/Y", strtotime($c['dateD'])) . '</p>
								<p id="txt1">Fin de location : ' . date("d/m/Y", strtotime($c['dateF'])) . '</p>';
							echo '</div>
							';
						}
						echo 
					'</div>
				</div>
				';
			}
			else 
                echo ('Pas de voitures');
		?>
	</div>

	<footer>
		<p>© 2021 Vida Locar - All rights reserved</p>
	</footer>
</body>

</html>