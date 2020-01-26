<?php require_once 'includes/header.php'; ?>
			<?php require_once 'includes/sidebar.php'; ?>
		    <!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<h1>Últimas entradas</h1>
		    	<?php 
		    	     $entrys = GetEntrys($db);
		    	     while($entry = mysqli_fetch_assoc($entrys)):
		        ?>
		        <article class="entry">
		    		<a href="view.entry?id=<?= $entry['id'] ?>">
		    			<h2><?= $entry['titulo'] ?></h2>
    		    		<p><?= $entry['descripcion'] ?></p>
		    		</a>
		    	</article>
		        <?php endwhile; ?>
		    	<div id="seeall">
		    		<a href="#">Ver todas las entradas</a>
		    	</div>
		    </div>
		
		<?php require_once 'includes/footer.php'; ?>
