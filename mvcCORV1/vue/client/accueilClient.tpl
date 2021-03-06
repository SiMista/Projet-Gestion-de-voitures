<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Vida Locar</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./vue/styleCSS/style.css">
	<link rel="stylesheet" href="./vue/styleCSS/menu.css">
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
		<h1 class="nomCo">Bienvenue
			<?php echo $_SESSION['pseudo']; ?>
		</h1>
	</div>
	<div>
		<form action="index.php?controle=client&action=louer" method="post" style="margin: 0%;">
			<div>
				<?php
				if (isset ($VoituresDispo)) {
					echo 
					'<div class="flex-container">
						<div id="blocPrincipal" class="d-flex p-3 text-white row justify-content-center align-self-center" > ';
							foreach ($VoituresDispo as $c) {
								$obj = json_decode($c['caract']);
								$dateD = date('Y-m-d');
								$i = 1;
								echo '
								<div id="boxes" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
									<label class="btn btn-danger form-check-label">
										<input type="checkbox" name="checkboxVoiture[]" class="form-check-input" value="'. utf8_encode($c['idVoiture']) .'" autocomplete="off">Sélectionner
									</label>			
									<label>Début de réservation :
										<input type="date" name="dateD" min="' . $dateD . '" value="' . $dateD . '" disabled>
									</label>
									<label>Fin de réservation :
										<input type="date" name="dateF[]" value="" min = "'. $dateD.'">
									</label>
									<img id="zoom" src="./vue/images/'. utf8_encode($c['photo']) . '"  style="max-height:200px" class="img-fluid" alt="Responsive image">
									<p id="txt1">Modèle : '. utf8_encode($c['typeV']) . '</p>
									<p id="txt1">Prix par jour : '. utf8_encode($c['prix']) . '€</p>
									<p id="txt1">Nombre de véhicules disponibles : '. utf8_encode($c['nb']) . '</p>
									<p id="txt1">Catégorie : '. $obj->categorie . '</p>
									<p id="txt1">Moteur : '. $obj->moteur . '</p>
									<p id="txt1">Vitesse : '. $obj->vitesse . '</p>
									<p id="txt1">Nombre de places : '. $obj->nbPlaces . '</p>
								</div>
								';
								$i = $i + 1;
							}
						echo '
						</div>
					</div>
					';
				}
				else {
					echo '<div> Pas de voitures </div>';
				}
				?>
				<div id="blocPrincipal" style="position: inherit;" class="d-flex p-3 text-white row justify-content-center align-self-center">
					<input type="submit"  class="btn btn-warning btn-lg" name="formSubmit" value="LOUER" />
				</div>
			</div>
		</form>
	</div>

	<footer>
		<p>© 2021 Vida Locar - All rights reserved</p>
	</footer>
</body>

</html>