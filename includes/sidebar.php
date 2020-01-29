<!-- SIDEBAR -->
		 	<aside id="sidebar">
		 		<div id="seeker" class="block-aside">
		 			<h3>Buscar</h3>
		 			<form action="search.php" method="post">
		 				<input type="text" name="coincidence" required>
		 				<input type="submit" value="Buscar">
		 			</form>
		 		</div>
		 		<div id="login" class="block-aside">
		 			<?php if(isset($_SESSION['errorQuery'])): ?>
		 				<div class="error-alert">
		 					<?= $_SESSION['errorQuery'] ?>
		 				</div>
		 			<?php elseif (isset($_SESSION['errorCredential'])): ?>
		 				<div class="error-alert">
		 					<?= $_SESSION['errorCredential'] ?>
		 				</div>
		 			<?php endif; ?>
		 			<?php if(isset($_SESSION['user'])): ?>
		 				<h3>Hola, <?= $_SESSION['user']['name'] ?></h3>
		 				<a class="btn" href="create-entry.php">Crear Entrada</a>
		 				<a class="btn" href="create-category.php">Crear categoria</a>
		 				<a class="btn" href="mydata.php">Mis datos</a>
		 				<a class="btn" href="logout.php">Cerrar Sesión</a>
		 			<?php else: ?>
		 			<h3>Identificate</h3>
		 			<form action="login.php" method="post">
		 				<label for="email">Email: </label>
		 				<input type="email" name="email">
		 				<?php if(isset($_SESSION['mistakesLogin'])): ?>
		 				<?= showErrorLogin($_SESSION['mistakesLogin'], 'email') ?>
		 				<?php endif; ?>
		 				<label for="password">Contraseña: </label>
		 				<input type="password" name="password">
		 				<?php if(isset($_SESSION['mistakesLogin'])): ?>
		 				<?= showErrorLogin($_SESSION['mistakesLogin'], 'password') ?>
		 				<?php endif; ?>
		 				<input type="submit" value="Entrar">
		 			</form>
		 		</div>
		 		<div id="register" class="block-aside">
		 			<h3>Registrate</h3>
		 			<?php if(isset($_SESSION['complete'])): ?>
		 			      <div class="success-alert">
		 			      	<?=  $_SESSION['complete'] ?>
		 			      </div>
		 			  <?php elseif(isset($_SESSION['mistakes']['general'])): ?>
		 			  	<div class="error-alert">
		 			      	<?=  $_SESSION['mistakes']['general'] ?>
		 			      </div>
		 			  <?php endif; ?>
		 			<form action="register.php" method="post">
		 				<label for="name">Nombre: </label>
		 				<input type="text" name="name">
		 				<?php
		 				     if(isset($_SESSION['mistakes'])){
		 				         echo ShowErrors($_SESSION['mistakes'], 'name');
		 				     } 
		 				?>
		 				<label for="lastName">Apellidos: </label>
		 				<input type="text" name="lastName">
		 				<?php
		 				     if(isset($_SESSION['mistakes'])){
		 				         echo ShowErrors($_SESSION['mistakes'], 'lastName');
		 				     } 
		 				?>
		 				<label for="email">Email: </label>
		 				<input type="email" name="email">
		 				<?php
		 				     if(isset($_SESSION['mistakes'])){
		 				         echo ShowErrors($_SESSION['mistakes'], 'email');
		 				     } 
		 				?>
		 				<label for="password">Contraseña: </label>
		 				<input type="password" name="password">
		 				<?php
		 				     if(isset($_SESSION['mistakes'])){
		 				         echo ShowErrors($_SESSION['mistakes'], 'password');
		 				     } 
		 				?>
		 				<input type="submit" value="Registrarse" name="submit">
		 			</form>
		 		</div>
		 		<?php 
		 		   DeleteErrors();
		 		   endif;
		 		?>
			</aside>
