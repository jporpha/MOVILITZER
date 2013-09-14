<body>
<?php 
if($canciones){
	foreach ($canciones->result() as $cancion) {
		 ?>

		 <ul>
		 	<li><a href="<?php echo $cancion->id; ?>"><?php echo $cancion->artista; ?></li></a>
		 </ul>

		 <?php 
	}
}else echo "<p>error en la aplicacion(no existe)</p>";
 ?>



</body>
</html>