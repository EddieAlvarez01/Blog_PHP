<?php require_once 'includes/header.php'; ?>
			<?php require_once 'includes/sidebar.php'; ?>
		    <!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<h1>Entradas encontradas</h1>
		    	<?php 
		    	     $entrys = GetEntrysCoincidence($db, $_POST['coincidence']);
		    	     if(!empty($entrys)):
		    	     while($entry = mysqli_fetch_assoc($entrys)):
		        ?>
		        <article class="entry">
		    		<a href="entry-detail.php?id=<?= $entry['id'] ?>">
		    			<h2><?= $entry['titulo'] ?></h2>
		    			<span class="date"><?= $entry['nombre'] . ' | ' . date('d/m/Y', strtotime($entry['fecha'])) ?></span>
    		    		<p><?= $entry['descripcion'] ?></p>
		    		</a>
		    	</article>
		        <?php 
		          endwhile; 
		          else:
		        ?>
		        <div class="error-alert">
		        	No hay coincidencias
		        </div>
		        <?php endif; ?>
		    </div>
		
		<?php require_once 'includes/footer.php'; ?>