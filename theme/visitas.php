
	<article>
		<header>Libro de visitas</header>
		<?php
			include ('./include/config.php');
			if(isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar'){   
				if(!empty($_POST['Nombre']) && $_POST['Cali'] && $_POST['Texto']){
					$Nombre = $_POST['Nombre'];
					$Cali = $_POST['Cali'];
					$texto = $_POST['Texto'];
					$sqlInsertNot = mysql_query("INSERT INTO visitas (nombre, cali, text) 
					VALUES ('$Nombre', '$Cali', '$texto')") or die(mysql_error());     
				echo "Haz introducido un comentario exitosamente";   
		
				}else{     
					echo "Debe llenar todos los campos del formulario";   
				}
			} 
		?>
		<section id="form-visitas">
			<form name="layout" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">   
				<p>Su nombre:<br /> 
					<input type="text" name="Nombre" size="50" />
				</p>   
				<p>Calificanos:<br /> 
					<select name="Cali">
						<?php
							for ($i = 10; $i >= 1; $i--) {
								echo "<option>".$i."</option>";
							}
						?>
					</select>
				</p> 
				<p>Haz un comentario:<br /> 
					<textarea name="Texto" rows="10" cols="50"></textarea>
				</p> 
				<input type="submit" name="enviar" value="Enviar" />
			</form>
		</section>
		<section id="publicidad"><?php echo $general['publicidad']; ?></section>
		
			<header>Comentarios</header>
					<?php
			$sql = mysql_query("Select * FROM visitas ORDER BY id DESC");

			while($row = mysql_fetch_array($sql)){
				echo "
					<section>
					<h2>Nombre:".$row['nombre']." - Calificacion: ".$row['cali']."</h2>
						<span>
							".$row['text']."
						</span>
					</section>
				";
			}
		?>
		</section>
	</article>