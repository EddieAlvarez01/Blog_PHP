<?php 
    require_once 'includes/redirection.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
?>
<!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<h1>Editar Entrada</h1>
		    	<?php 
		    	     $entrys = GetEntryByid($db, (int)$_GET['id']);
		    	     $entry = mysqli_fetch_assoc($entrys);
		    	     if(isset($_SESSION['error-edit'])):
		    	         echo ShowErrors($_SESSION['error-edit'], 'general');
		    	     endif;
		    	?>
		    	<form action="save-edit-entry.php" method="post">
		    		<label for="title">Título: </label>
		    		<input type="text" name="title" value="<?= $entry['titulo'] ?>">
		    			<?php
		    			   if(isset($_SESSION['error-edit'])):
		    			       echo showErrors($_SESSION['error-edit'], 'title');
		    			   endif;
		    			 ?>
		    		<label for="description">Descripción: </label>
		    		<textarea rows="12" cols="100" name="description"><?= $entry['descripcion'] ?></textarea>
		    		<label for="email">Categoría: </label>
		    		<?php $categories = GetCategories($db); ?>
		    		<select name="category">
		    			<?php while($category = mysqli_fetch_assoc($categories)): ?>
		    			<option value="<?= $category['id'] ?>"
		    				<?=
		    				  ($category['id'] == $entry['categoria_id']) ? 'selected' : '';
		    				?>
		    			><?= $category['nombre'] ?> </option>
		    			<?php endwhile; ?>
		    		</select>
		    		<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
		    		<input type="submit" value="Editar">
		    	</form>
		    </div>
		    <?php
		      if(isset($_SESSION['error-edit'])):
		          GenericDeleteErrors('error-edit');
		      endif;
		    ?>
<?php require_once 'includes/footer.php'; ?>