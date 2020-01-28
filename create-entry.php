<?php 
    require_once 'includes/redirection.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
?>
<!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<h1>Crear Entrada</h1>
		    	<p>Añade nuevas entradas al blog para que los usuarios puedan leerlas.</p>
		    	<?php if(isset($_SESSION['error-entry'])): ?>
		    		<div class="error-alert">
		    			<?= $_SESSION['error-entry'] ?>
		    		</div>
		    	<?php
		    	     unset($_SESSION['error-entry']);
		    	     elseif(isset($_SESSION['error-general'])):
		    	?>
		    		<div class="error-alert">
		    			<?= $_SESSION['error-general'] ?>
		    		</div>
		    	<?php 
		    	     unset($_SESSION['error-general']);
		    	     elseif(isset($_SESSION['successEntry'])):
		    	?>
		    		<div class="success-alert">
		    			<?= $_SESSION['successEntry'] ?>
		    		</div>
		    	<?php
		    	     unset($_SESSION['successEntry']);
		    	     endif;
		    	?>
		    	<form action="save-entry.php" method="post">
		    		<label for="title">Título:</label>
		    		<input type="text" name="title">
		    		<?php if(isset($_SESSION['errorTitle'])): ?>
		    		<div class="error-alert">
		    			<?= $_SESSION['errorTitle'] ?>
		    		</div>
		    		<?php
		    		    unset($_SESSION['errorTitle']);
		    		    endif;
		    		?>
		    		<label for="description">Descripción:</label>
		    		<textarea rows="12" cols="100" name="description"></textarea>
		    		<label for="category">Categoría</label>
		    		<?php $categories = GetCategories($db); ?>
		    		<select name="category">
		    			<?php while($category = mysqli_fetch_assoc($categories)): ?>
		    			<option value="<?= $category['id'] ?>"><?= $category['nombre'] ?></option>
		    			<?php endwhile; ?>
		    		</select>
		    		<input type="submit" value="Crear Categoría">
		    	</form>
		    </div>
<?php require_once 'includes/footer.php'; ?>