	<article>
		<header>Diseños web</header>
		<?php
			$sql = mysql_query("Select * FROM layout ORDER BY id DESC");

			while($row = mysql_fetch_array($sql)){
				echo "
					<section>
						<h2>".$row[titulo]."</h2>
						<figure><img src='".$row[img]."' ' title='".$row[titulo]."' width='150' height='200' /></figure>
						<div id='text'>
							<span>
								".$row[text]."
							</span>
								
						</div>
						<div id='link'>
							<div id='demo'><a href='".$row[demo]."' target='_blank'>demostración</a></div>
							<div id='desc'><a href='".$row[linkdes]."' target='_blank'>descargar</a></div>
						</div>
					</section>
				";
			}
		?>
	</article>