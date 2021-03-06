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
				<div class="container-fluid">
					<a href="index.php?controle=loueur&action=accueil"><img src='./vue/images/header/logo.png'
							id="logo"></a>
					<ul class="navbar-nav ml-auto">
                        <li class="nav-item">
							<a class="nav-link active" href="index.php?controle=loueur&action=getfactures"
								id="item">Factures 📃</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="index.php?controle=loueur&action=monStock"
								id="item">Mon stock 🔑</a>
						</li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?controle=loueur&action=nouvelleVoiture"
                                id="item">Nouvelle voiture 🚙</a>
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
		<h1 class="nomCo"> Mes factures
		</h1>
	</div>
    <div class="flex-container">
        <div id="blocPrincipal" class="d-flex p-3 text-white row justify-content-center align-self-center" > 
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <form action="index.php?controle=loueur&action=getfactures" method="post">
                    <h2>Entrez le nom d'un client :</h2> <input name="nom" class="nom" value="" required/>
                    <input type="submit" value="OK"/>  
                </form>
            </div>
        </div>
	<div>
		<form action="index.php?controle=loueur&action=getfactures" method="post">

			<div>			  
				<?php
                foreach ($factures as $c) {
                    if ($c['nbFactures'] > 10){
                        $val = $c['valeur'];
	                    $c['valeur'] = ($val * 0.90);
                    }
	            
	
                    echo '
                    <div class="flex-container">
						<div id="blocPrincipal" class="d-flex p-3 text-white row justify-content-center align-self-center" > 
                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <table style="width: 100%; height: 50vh;">
                                    <tr>
                                        <th style=" border: 1px solid black;">Nom du client</td>
                                        <td  colspan="2" style=" border: 1px solid black;"> '. utf8_encode($c['nom']) . '</td>
                                    </tr>
                                    <tr>
                                        <th style=" border: 1px solid black;">Facture du mois </td>
                                        <td colspan="2" style=" border: 1px solid black;"> '. utf8_encode($c['valeur']) . '€</td>
                                    </tr>
                                 </table>
                                
                                
                            </div>
                        </div>
                    </div>
                    ';
                }
				?>

			</div>
		</form>

	</div>
</div>
	<footer>
		<p>© 2021 Vida Locar - All rights reserved</p>
	</footer>
</body>

</html>