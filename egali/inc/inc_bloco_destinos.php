<?php
global $egali_globais;
if(isset($locaisRelacionados)) {
	$locRes = array();
	foreach($locaisRelacionados as $loc) {
		$locRes[] = $loc->slug;
	}
}
?>

<!-- DESTINATIONS -->
<section class="main-destinations">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h5 class="mb-4"><?php _e('Destinos','egali')?></h5>
			</div>
			<div class="col-12">
				<div class="masonry">

					<?php
					if(isset($locRes)) {
						//se a página que incluiu este bloco tem destinos relacionados, mostra apenas estes destinos
						foreach($egali_globais["destinos"] as $k1 => $v1) {
							if(in_array($k1,$locRes)) {
								?>
								<div class="item">
									<a class="nav-link active" href="<?php echo $egali_globais["destinos"][$k1]["link"];?>"><?php echo $egali_globais["destinos"][$k1]["nome"];?></a>
									<?php
									foreach($egali_globais["destinos"][$k1]["cidades"] as $k2 => $v2) {
										if(in_array($k2,$locRes)) {
											?>
											<a class="nav-link" href="<?php echo $egali_globais["destinos"][$k1]["cidades"][$k2]["link"];?>"><?php echo $egali_globais["destinos"][$k1]["cidades"][$k2]["nome"];?></a>
											<?php
										}
									}
									?>
								</div>
								<?php
							}
						}
					} else {
						//senão mostra todos
						foreach($egali_globais["destinos"] as $pais) {
							if($pais["link"]) {
								?>
								<div class="item">
									<a class="nav-link active" href="<?php echo $pais["link"];?>"><?php echo $pais["nome"];?></a>
									<?php
									foreach($pais["cidades"] as $cidade) {
										if($cidade["link"]) {
											?>
											<a class="nav-link" href="<?php echo $cidade["link"];?>"><?php echo $cidade["nome"];?></a>
											<?php
										}
									}
									?>
								</div>
								<?php
							}
						}
					}
					?>

				</div>
			</div>

		</div>
	</div>
</section>
