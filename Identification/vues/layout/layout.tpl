<?php  
	global $controle;  
	global $action;
?>

<html>

<head>
	<title>Accueil</title>
	<link href="./vues/style.css" rel="stylesheet"> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
    <header>
	    <h1>Service: <?php echo $action; ?></h1>
	</header>

    <main> 
		<?php require("./vues/" . $controle . "/" . $action . ".tpl"); ?>  
	</main>

	<footer>
		<p>Dans le cadre du cours de PWEB par Léo, Siméon et Jules.</p>
	</footer>
</body>

</html>