<body>

	<?php  
	echo form_open('/orpha/recibirdatos');

	$artista = array(
		'name' => 'artista',
		'placeholder' => 'Escribe el artista'
		);
	$cancion = array(
		'name' => 'cancion',
		'placeholder' => 'Escribe la cancion'
		);
		$genero = array(
		'name' => 'genero',
		'placeholder' => 'Escribe el genero'
		);
	$duracion = array(
		'name' => 'duracion',
		'placeholder' => 'Escribe la duracion'
		);
		$estado = array(
		'name' => 'estado',
		'placeholder' => 'Escribe el estado'
		);
	$url = array(
		'name' => 'url',
		'placeholder' => 'Escribe la url'
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
	echo form_submit('','Subir');
	echo form_close();
	?>



</body>
</html>