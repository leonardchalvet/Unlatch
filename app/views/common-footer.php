<?php 
use Prismic\Dom\RichText;
$footer = $WPGLOBAL['footer']->data;
?>

<footer>
	
	<div class="wrapper">
		
		<div class="container-link">
			<div class="container-logo">
				<a class="logo" href="">
					<img src="<?= $footer->logo->url; ?>" alt="">
				</a>
				<h5><?= RichText::asText($footer->logo_text); ?></h5>
			</div>
			<?php foreach ($footer->body as $slice) { ?>
				<ul>
					<li>
						<a><?= RichText::asText($slice->primary->categori_text); ?></a>
					</li>
					<?php foreach ($slice->items as $item) { ?>
					<li>
						<a href="<?= $item->link->url; ?>"><?= RichText::asText($item->link_text); ?></a>
					</li>
					<?php } ?>
				</ul>		
			<?php } ?>
		</div>


		<div class="foot">
			<div class="container-lg">
				<div class="lg">
					<img src="<?= $footer->languages[0]->icn_language->url; ?>">
					<span><?= RichText::asText($footer->languages[0]->text_language); ?></span>
					<svg viewBox="0 0 6 4" xmlns="http://www.w3.org/2000/svg">
					  <path d="M3 4l3-4H0z" fill="#FFF" fill-rule="evenodd"/>
					</svg>	
				</div>
				<div class="dropdown">
					<?php foreach ($footer->languages as $lg) { ?>
						<a href="<?= $lg->link_language->url; ?>" class="lg">
							<img src="<?= $lg->icn_language->url; ?>">
							<span><?= RichText::asText($lg->text_language); ?></span>	
						</a>
					<?php } ?>
				</div>
			</div>

			<div class="container-cdr">
				<a href="<?= $footer->mentions_legales_link->url; ?>"><?= RichText::asText($footer->mentions_legales); ?></a>
				<a href="<?= $footer->privacy_legal_link->url; ?>"><?= RichText::asText($footer->privacy_legal); ?></a>
				<div><?= RichText::asText($footer->copyright); ?></div>
			</div>

			<div class="container-share">
				<?php foreach ($footer->social_network as $sn) { ?>
					<a href="<?= $sn->sn_link->url; ?>">
						<img src="<?= $sn->sn_icn->url; ?>" alt="">
					</a>
				<?php } ?>
			</div>
		</div>

	</div>


</footer>