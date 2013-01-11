	<article>
		<header>NOTICIAS</header>
		<?PHP
			$paging=new paging(5,5);
			$paging->db("$db_host","$db_user","$db_pass","$db_name");
			$paging->query("Select * FROM noti ORDER BY story_num DESC");
			while ($result=$paging->result_assoc()) {
				echo "
					<section>
						<h2>".$result[story_title]."</h2>
						<span>".$result[story_text]."
								
							<div id='dates'><div id='fecha'><b>Fecha:</b> ".$result[story_date]."</div>
							<div id='autor'><b>Autor:</b> ".$result[story_read_more]."</div></div>
						</span>
					</section>
				";
			}
			echo "<header>".$paging->print_link()."</header>";	
		?>
	</article>