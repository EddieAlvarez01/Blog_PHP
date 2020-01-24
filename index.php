<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8">
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
					<li>
						<a href="index.php">Categoría 1</a>
					</li>
					<li>
						<a href="index.php">Sobre mí</a>
					</li>
					<li>
						<a href="index.php">Contacto</a>
					</li>
				</ul>
			</nav>
		</header>
		
		<div id="container">
			<!-- SIDEBAR -->
		 	<aside id="sidebar">
		 		<div id="login" class="block-aside">
		 			<h3>Identificate</h3>
		 			<form action="login.php" method="post">
		 				<label for="email">Email: </label>
		 				<input type="email" name="email">
		 				<label for="password">Contraseña: </label>
		 				<input type="password" name="password">
		 				<input type="submit" value="Entrar">
		 			</form>
		 		</div>
		 		<div id="register" class="block-aside">
		 			<h3>Registrate</h3>
		 			<form action="register.php" method="post">
		 				<label for="name">Nombre: </label>
		 				<input type="text" name="name">
		 				<label for="lastName">Apellidos: </label>
		 				<input type="text" name="lastName">
		 				<label for="email">Email: </label>
		 				<input type="email" name="email">
		 				<label for="password">Contraseña: </label>
		 				<input type="password" name="password">
		 				<input type="submit" value="Registrarse">
		 			</form>
		 		</div>
			</aside>
			
		    <!-- CONTENIDO PRINCIPAL -->
		    <div class="main">
		    	<h1>Últimas entradas</h1>
		    	<article class="entry">
		    		<h2>Título de mi entrada</h2>
		    		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
		    		 standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
		    		  specimen book.
		    		 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
		    		 It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
		    		  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		    	</article>
		    </div>
		    
		</div>
		
		<!-- PIE DE PAGINA -->
		<footer id="foot">
			<p>Desarrollado por Eddie Alvarez &copy; 2020</p>
		</footer>
		
	</body>
</html>
