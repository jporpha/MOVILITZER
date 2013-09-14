<body>
<?php 
if($canciones){
	foreach ($canciones->result() as $cancion) {
		 ?>

		 <ul>
		 	<li><?php echo $cancion->artista; ?></li>
		 	<li><?php echo $cancion->cancion; ?></li>
		 	<li><?php echo $cancion->genero; ?></li>
		 	<li><?php echo $cancion->duracion; ?></li>
		 	<li><?php echo $cancion->url; ?></li>
		 </ul>

		 <?php 
	}
}else echo "<p>error en la aplicacion(no existe)</p>";
 ?>



</body>
</html>