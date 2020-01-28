<?php 
    require_once 'includes/redirection.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
?>
<!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<h1>Editar Datos</h1>
		    	<?php 
		    	     $users = GetUser($db, $_SESSION['user']['id']);
		    	     $user = mysqli_fetch_assoc($users);
		    	     if(isset($_SESSION['error-edit'])):
		    	         echo ShowErrors($_SESSION['error-edit'], 'general');
		    	     endif;
		    	?>
		    	<form action="save-data.php" method="post">
		    		<label for="name">Nombre: </label>
		    		<input type="text" name="name" value="<?= $user['nombre'] ?>">
		    			<?php
		    			   if(isset($_SESSION['error-edit'])):
		    			       echo showErrors($_SESSION['error-edit'], 'name');
		    			   endif;
		    			 ?>
		    		<label for="lastName">Apellidos: </label>
		    		<input type="text" name="lastName" value="<?= $user['apellidos'] ?>">
		    			<?php
		    			   if(isset($_SESSION['error-edit'])):
		    			      echo showErrors($_SESSION['error-edit'], 'lastName');
		    			   endif;
		    			 ?>
		    		<label for="email">Correo: </label>
		    		<input type="email" name="email" value="<?= $user['email'] ?>">
		    			<?php
		    			   if(isset($_SESSION['error-edit'])):
		    			       echo showErrors($_SESSION['error-edit'], 'email');
		    			   endif;
		    			 ?>
		    		<label for="password">Contraseña: </label>
		    		<input type="password" name="password">
		    		<input type="hidden" name="password2" value="<?= $user['password'] ?>">
		    		<input type="submit" value="Editar">
		    	</form>
		    </div>
		    <?php
		      if(isset($_SESSION['error-edit'])):
		          GenericDeleteErrors('error-edit');
		      endif;
		    ?>
<?php require_once 'includes/footer.php'; ?>