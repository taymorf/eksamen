<div class="span9">
		<div class="content">
			<div class="module message">
				<div class="module-head">
				</div>
				<div class="module-option clearfix">
					<div class="table-responsive">
						<table class="table table-striped">


							<tbody>
								<?php
								if (isset($_POST['Soegetekst'])){
	$Soegetekst = $_POST['Soegetekst'];
								$result = $dbforbindelse->query( "SELECT	bolsjer.id,
												bolsjer.bolsje_navn,
												bolsjer_farve.farve_navn,
												bolsjer.vaegt,
												smag_surhed.smag_surhed_navn,
												smag_styrke.smag_styrke_navn,
												smag_type.smag_type_navn,
												bolsjer.pris



						FROM bolsjer
						INNER JOIN bolsjer_farve
							ON fk_farve = bolsjer_farve.id
						INNER JOIN smag_surhed
							ON fk_smag_surhed = smag_surhed.id
						INNER JOIN smag_styrke
							ON fk_smag_styrke = smag_styrke.id
						INNER JOIN smag_type
							ON fk_smag_type = smag_type.id

							WHERE bolsje_navn LIKE '%$Soegetekst%' OR farve_navn LIKE '%$Soegetekst%' OR vaegt LIKE '%$Soegetekst%' OR smag_surhed_navn LIKE '%$Soegetekst%' OR smag_styrke_navn LIKE '%$Soegetekst%' OR smag_type_navn LIKE '%$Soegetekst%' OR pris LIKE '%$Soegetekst%' " );
								while ( $row = $result->fetch_assoc() ) {
									echo '<tr>
						<td>' . $row[ 'id' ] . '</td>
						<td>' . $row[ 'bolsje_navn' ] . '</td>
						<td>' . $row[ 'farve_navn' ] . '</td>
						<td>' . $row[ 'vaegt' ] . '</td>
						<td>' . $row[ 'smag_surhed_navn' ] . '</td>
						<td>' . $row[ 'smag_styrke_navn' ] . '</td>
						<td>' . $row[ 'smag_type_navn' ] . '</td>

					<td><span class="float-left">' . number_format( $row[ 'pris' ], 2, ',', '.' ) . '</span><span class="float-right"> øre. </span></td>

			 </tr>';
								}
								$result->free();
								}
								?>

							</tbody>

						</table>
					<h2>Søg produkter</h2>
<form action="" method="post">
	<input type="text" type="submit" value="Søg" name="Soegetekst" />
</form>





					</div>

				</div>

			</div>
		</div>
	</div>
