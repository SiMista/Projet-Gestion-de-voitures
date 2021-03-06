<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajout de voiture</title>

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
        <h1 class="nomCo">Ajouter une nouvelle voiture</h1>
    </div>

    <div id="formAjoutVoiture">
        <form action="" method="post">
            <h2>Formulaire d'ajout d'une nouvelle voiture :</h2>
            <div class="form-group">
                <label for="typeV">Modèle de la voiture : </label>
                <input type="text" name="typeV" id="typeV" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix de la location par jour (en €) : </label>
                <input type="number" name="prix" id="prix" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre de modèles disponibles : </label>
                <input type="number" step="0.01" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie : </label>
                <select class="form-control" type="text" name="categorie" id="categorie" required>
                    <option>SUV</option>
                    <option>berline</option>
                    <option>citadine</option>
                    <option>polyvalente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="moteur">Moteur : </label>
                <select class="form-control" type="text" name="moteur" id="moteur" required>
                    <option>diesel</option>
                    <option>essence</option>
                    <option>electrique</option>
                </select>    
            </div>
            <div class="form-group">
                <label for="vitesse">Boîte de vitesse : </label>
                <select class="form-control" type="text" name="vitesse" id="vitesse" required>
                    <option>manuelle</option>
                    <option>automatique</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nbPlaces">Nombre de places : </label>
                <input type="number" name="nbPlaces" id="nbPlaces" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo : </label>
                <input type="file" name="photo" id="photo" required>
            </div>
            <div class="form-group">
                <input class="btn btn-dark btn-lg btn-block" type="submit" value="Ajouter la voiture">
            </div>
        </form>
    </div>

    <footer>
        <p>© 2021 Vida Locar - All rights reserved</p>
    </footer>
</body>

</html>