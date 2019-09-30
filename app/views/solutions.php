<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;
?>
<html>
  <head>

    <title><?= RichText::asText($document->global_title); ?></title>

    <meta name="description" content="<?= RichText::asText($document->global_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/solution_<?php echo $document->global_template; ?>.css">

	</head>
	
	<body>

		<?php include('common-header.php') ?>

		<main>
			<section id="section-cover">
				<div class="wrapper">
					<div class="container-text">
						<div class="title">
							<span><?= RichText::asText($document->cover_name); ?></span>
						</div>
						<?= RichText::asHtml($document->cover_title); ?>
						<p>
							<?= RichText::asText($document->cover_text); ?>
						</p>
						<a href="<?= $document->cover_button_link->url; ?>">
							<span class="btn-text">
								<?= RichText::asText($document->cover_button_text); ?>
							</span>
						</a>
					</div>
					<img class="obj-1" src="/img/common-solutions/section-cover/obj-1.svg" alt="">
					<img class="obj-2" src="/img/common-solutions/section-cover/obj-2.svg" alt="">
					<div class="container-img">
						<img src="<?= $document->cover_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section id="section-features">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->features_title); ?>
					</div>
					<div class="container-features">
						<?php foreach ($document->body as $slice) { ?>

							<div class="feature <?php if($slice->primary->feature_highlight == 'yes') { echo 'higlight'; } ?>">
								<div class="container-illu">
									<img src="<?= $slice->primary->feature_img->url; ?>" alt="">
								</div>
								<div class="container-text">
									<?= RichText::asHtml($slice->primary->feature_title); ?>
									<p>
										<?= RichText::asText($slice->primary->feature_text); ?>
									</p>
									<ul>
										<?php foreach ($slice->items as $item) { ?>
											<li>
												<a href="<?= $item->feature_link->url; ?>"><?= RichText::asText($item->feature_link_text); ?></a>
											</li>
										<?php } ?>
									</ul>
								</div>
								<?php if($slice->primary->feature_highlight == 'yes') { ?>
									<div class="container-background">
										<img class="obj-1" src="/img/common-solutions/section-features/obj-1.svg" alt="">
										<img class="obj-2" src="/img/common-solutions/section-features/obj-2.svg" alt="">
									</div>
								<?php } ?>
							</div>

						<?php
							$i++;
						} ?>
						<!--
						<div class="feature">
							<div class="container-illu">
								<img src="img/common/section-quotes/quote-img-1.jpg" alt="">
							</div>
							<div class="container-text">
								<h3>
									Accélérez vos <span>ventes immobilières.</span>
								</h3>
								<p>
									L’objectif de Unlatch est de réduire le délai entre la réservation et la signature de l’acte authentique de vente chez le notaire. Vos commerciaux ne pourront plus s’en passer :
								</p>
								<ul>
									<li>
										<a href="">Gestion de la relation client (CRM)</a>
									</li>
									<li>
										<a href="">Espace prescripteurs</a>
									</li>
									<li>
										<a href="">Digitalisation de la vente immobilière</a>
									</li>
									<li>
										<a href="">Suivi des ventes immobilières</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="feature">
							<div class="container-illu">
								<img src="img/common/section-quotes/quote-img-1.jpg" alt="">
							</div>
							<div class="container-text">
								<h3>
									<span>Collaborez</span> avec les différents intervenants.
								</h3>
								<p>
									Véritable plateforme collaborative. Unlatch facilite le travail et le suivi des différents intervenants (dirigeants, vendeurs, administration des ventes, commercialisateurs externes, notaires).
								</p>
								<ul>
									<li>
										<a href="">Gestion de la relation client (CRM)</a>
									</li>
									<li>
										<a href="">Espace prescripteurs</a>
									</li>
									<li>
										<a href="">Digitalisation de la vente immobilière</a>
									</li>
									<li>
										<a href="">Suivi des ventes immobilières</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="feature higlight">
							<div class="container-illu">
								<img src="img/common/section-quotes/quote-img-1.jpg" alt="">
							</div>
							<div class="container-text">
								<h3>
									<span>Rendez heureux</span> vos clients acquéreurs.
								</h3>
								<p>
									Avec Unlatch, vos clients bénéficient dès la réservation du bien immobilier d’un espace personnalisé à vos couleurs pour compléter leur dossier et suivre l’avancement des travaux.
								</p>
								<ul>
									<li>
										<a href="">Espace Client Acheteur</a>
									</li>
								</ul>
							</div>
							<div class="container-background">
								<img class="obj-1" src="img/common-solutions/section-features/obj-1.svg" alt="">
								<img class="obj-2" src="img/common-solutions/section-features/obj-2.svg" alt="">
							</div>
						</div>
						<div class="feature">
							<div class="container-illu">
								<img src="img/common/section-quotes/quote-img-1.jpg" alt="">
							</div>
							<div class="container-text">
								<h3>
									<span>Analysez finement</span> vos ventes immobilières.
								</h3>
								<p>
									Créez facilement des dashboards incroyables pour piloter votre activité commerciale. Générez des reporting en pdf pour vos présentations.
								</p>
								<ul>
									<li>
										<a href="">Business Intelligence</a>
									</li>
								</ul>
							</div>
						</div>
						-->
					</div>
				</div>
			</section>

			<section id="section-quotes">
				<div class="wrapper">
					<div class="container-img">
						<img src="<?= $document->quotes_img->url; ?>" alt="">
					</div>
					<div class="container-quotes">
						<img class="obj-1" src="/img/common/icn-quote-white.svg" alt="">
						<div class="container-el">
							<div class="el">
								<q>
									<?= RichText::asText($document->quotes_text); ?>
								</q>
								<div class="container-infos">
									<div class="name"><?= RichText::asText($document->quotes_names); ?></div>
									<div class="job"><?= RichText::asText($document->quotes_job); ?></div>
								</div>
							</div>
						</div>
						<div class="container-action">
							<div class="container-link">
								<a href="<?= $document->quotes_link->url; ?>">
									<span class="link-text">
										<?= RichText::asText($document->quotes_link_text); ?>
									</span>
									<span class="link-arrow">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
											<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
										</svg>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="section-logos">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->logos_title); ?>
					</div>
					<div class="container-logos">
						<img src="<?= $document->logos_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section id="common-section-banner">
		        <img class="obj-2" src="/img/common/section-banner/obj-2.svg" alt="">
		        <img class="obj-3" src="/img/common/section-banner/obj-3.svg" alt="">
		        <div class="wrapper">
		          <div class="container-img elAnim__slide anim__delayMedium_1">
		            <img src="<?= $document->banner_photo->url; ?>" alt="">
		          </div>
		          <div class="container-text">
		            <?= RichText::asHtml($document->banner_title); ?>
		            <p>
		            	<?= RichText::asText($document->banner_text); ?>
		            </p>
		            <a href="<?= $document->banner_button_link->url; ?>" class="elAnim__slide anim__delayMedium_3">
		              <span class="btn-text"><?= RichText::asText($document->banner_buttton_text); ?></span>
		            </a>
		            <div class="container-infos elAnim__slide anim__delayMedium_4">
		              <p><?= RichText::asText($document->banner_information); ?></p>
		            </div>
		          </div>
		        </div>
		    </section>
		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/common-min.js"></script>
	</body>
</html>