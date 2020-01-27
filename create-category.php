<?php require_once 'includes/redirection.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>
<!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<h1>Crear Categoría</h1>
		    	<p>Añade nuevas categorías al blog para que los usuarios puedan usarlas al crear sus entradas.</p>
		    	<br>
		    	<?php 
		    	     if(isset($_SESSION['mistakes'])):
		    	     echo ShowErrors($_SESSION['mistakes'], 'general');
		    	?>
		    	<?php elseif(isset($_SESSION['success-create-category'])): ?>
		    	<div class="success-alert">
		    		<?= $_SESSION['success-create-category'] ?>
		    	</div>
		    	<?php endif; ?>
		    	<form action="save-category.php" method="post">
		    		<label for="name">Nombre de la categoría: </label>
		    		<input type="text" name="name">
		    		<?php if(isset($_SESSION['mistakes'])): ?>
		    		<?php echo ShowErrors($_SESSION['mistakes'], 'name'); ?>
		    		<?php endif; ?>
		    		<input type="submit" value="Crear Categoría">
		    	</form>
		    </div>
		    <?php DeleteErrors(); ?>
<?php require_once 'includes/footer.php'; ?>