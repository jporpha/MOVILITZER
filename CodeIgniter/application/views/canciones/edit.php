<body>
<?php echo form_open("/canciones/actualizar/".$id);


 foreach($cancion->result() as $row)
{ 

	$idq=$row->id;
	$artistaq=$row->artista;
	$cancionq=$row->cancion;
	$generoq=$row->genero;
	$duracionq=$row->duracion;
	$estadoq=$row->estado;
	$urlq=$row->url;
}

	$artista = array(
		'name' => 'artista',
		'placeholder' => 'Escribe el artista',
		'value' => $artistaq
		);
	$cancion = array(
		'name' => 'cancion',
		'placeholder' => 'Escribe la cancion',
		'value' => $cancionq
		);
		$genero = array(
		'name' => 'genero',
		'placeholder' => 'Escribe el genero',
		'value' => $generoq
		);
	$duracion = array(
		'name' => 'duracion',
		'placeholder' => 'Escribe la duracion',
		'value' => $duracionq
		);
		$estado = array(
		'name' => 'estado',
		'placeholder' => 'Escribe el estado',
		'value' => $estadoq
		);
	$url = array(
		'name' => 'url',
		'placeholder' => 'Escribe la url',
		'value' => $urlq
		);
	?>



	<?php echo form_label('Artista: ', 'artista'); ?>
		<?php echo form_input($artista); ?>
	
	<br>

	<?php echo form_label('Cancion: ', 'cancion'); ?>
		<?php echo form_input($cancion); ?>
	<br>

	<?php echo form_label('Genero: ', 'genero'); ?>
		<?php echo form_input($genero); ?>
	
	<br>

	<?php echo form_label('Duracion: ', 'duracion'); ?>
		<?php echo form_input($duracion); ?>
	<br>

	<?php echo form_label('Estado: ', 'estado'); ?>
		<?php echo form_input($estado); ?>
	
	<br>

	<?php echo form_label('URL: ', 'url'); ?>
		<?php echo form_input($url); ?>
	<br>


	<?php  
	echo form_submit('','Actualizar');
	echo form_close();
	?>





</body>
</html>