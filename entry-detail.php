<?php require_once 'includes/header.php'; ?>
			<?php require_once 'includes/sidebar.php'; ?>
		    <!-- CONTENIDO PRINCIPAL -->
		    <div id="main">
		    	<?php 
		    	     $entrys = GetEntryByid($db, (int)$_GET['id']);
		    	     if(!empty($entrys)):
		    	     while($entry = mysqli_fetch_assoc($entrys)):
		    	     if(isset($_SESSION['error-delete'])):
		    	         echo ShowErrors($_SESSION['error-delete'], 'general');
		    	         unset($_SESSION['error-delete']);
		    	     endif;
		        ?>
		        <h1><?= $entry['titulo'] ?></h1>
		        <h2><?= $entry['nombre'] ?></h2>
		        <h4><?= date('d/m/Y', strtotime($entry['fecha'])) ?> | <?= $entry['autor'] ?></h4>
		        <p>
		        	<?= $entry['descripcion'] ?>
		        </p>
		        <?php 
		          if(isset($_SESSION['user'])):
		              if($_SESSION['user']['id'] == $entry['usuario_id']): ?>
		              <a class="btn" href="edit-entry.php?id=<?= $entry['id'] ?>">Editar entrada</a>
		              <a class="btn" href="delete-entry.php?id=<?= $entry['id'] ?>">Borrar entrada</a>
		          <?php 
		              endif;
		          endif;
		          endwhile; 
		          endif;
		        ?>
		    </div>
		
		<?php require_once 'includes/footer.php'; ?>