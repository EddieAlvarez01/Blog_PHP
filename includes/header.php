<?php 
    require_once 'connection.php';
    require_once './includes/helpers.php';
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
		<title>Blog de Videojuegos</title>
	</head>
	<body>
		<!--  Cabecera -->
		<header id="header">
			<div id="logo">
				<a href="index.php">
					Blog de Videojuegos
				</a>
			</div>
			
			<!-- MENU -->
			<nav id="nav">
				<ul>
					<li>
						<a href="index.php">Inicio</a>
					</li>
					<?php $categories = GetCategories($db); ?>
					<?php while($category = mysqli_fetch_assoc($categories)): ?>
						<li>
							<a href="category.php?id=<?= $category['id'] ?>"><?= $category['nombre'] ?></a>
						</li>
					<?php endwhile; ?>
					<li>
						<a href="index.php">Sobre mí</a>
					</li>
					<li>
						<a href="index.php">Contacto</a>
					</li>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</header>
<div id="container">