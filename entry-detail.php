<?php require_once 'includes/header.php'; ?>
			<?php require_once 'includes/sidebar.php'; ?>
		    <!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<?php 
		    	     $entrys = GetEntryByid($db, (int)$_GET['id']);
		    	     if(!empty($entrys)):
		    	     while($entry = mysqli_fetch_assoc($entrys)):
		        ?>
		        <h1><?= $entry['titulo'] ?></h1>
		        <h2><?= $entry['nombre'] ?></h2>
		        <h4><?= date('d/m/Y', strtotime($entry['fecha'])) ?></h4>
		        <p>
		        	<?= $entry['descripcion'] ?>
		        </p>
		        <?php 
		          endwhile; 
		          endif;
		        ?>
		    </div>
		
		<?php require_once 'includes/footer.php'; ?>