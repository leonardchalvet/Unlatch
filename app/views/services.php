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

		<link rel="stylesheet" type="text/css" href="/style/css/services.css">

	</head>
	
	<body>

		<?php include('common-header.php') ?>

		<main>

			<section id="section-cover">
				<div class="wrapper">
					<div class="container-text" class="sectionAnim_container">
						<?= RichText::asHtml($document->cover_title); ?>
						<div class="sep elAnim__slide anim__delayMedium_2"></div>
						<p>
							<?= RichText::asText($document->cover_text); ?>
						</p>
						<a href="<?= $document->cover_button_link->url; ?>" class="elAnim__slide anim__delayMedium_4">
							<span class="btn-text">
								<?= RichText::asText($document->cover_button_text); ?>
							</span>
						</a>
					</div>
					<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/services/section-cover/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_6" src="/img/services/section-cover/obj-2.svg" alt="">
					<div class="container-img elAnim__slide anim__delayMedium_7">
						<img src="<?= $document->cover_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section id="section-features" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text elAnim__slide anim__delayMedium_1">
						<?= RichText::asHtml($document->features_title); ?>
					</div>
					<div class="container-col">
						<?php $i = 1; 
						foreach ($document->features_container_features as $feature) {
							if ( ($i % 2) == 1 ) { ?>
								<div class="col">
									<div class="container-el">
							<?php } ?>
							<div class="el el-<?php echo $i; ?> elAnim__slide anim__delayMedium_<?php echo $i; ?>">
								<div class="icn">
									<img src="<?= $feature->feature_icn->url; ?>" alt="">
								</div>
								<div class="text">
									<?= RichText::asHtml($feature->feature_title); ?>
									<p>
										<?= RichText::asText($feature->feature_text); ?>
									</p>
								</div>
							</div>
							<?php
							if ( ($i % 2) == 0 ) { ?>
			                		</div>
			                	</div>
			              	<?php }
			              	$i++;
						} ?>
					</div>
				</div>
			</section>

			<section id="section-services" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->services_title); ?>
						<p class="elAnim__slide anim__delayMedium_2">
							<?= RichText::asText($document->services_text); ?>
						</p>
						<div class="container-actions elAnim__slide anim__delayMedium_3">
							<a href="<?= $document->services_button_link->url; ?>" class="btn">
								<span class="btn-text">
									<?= RichText::asText($document->services_button_text); ?>
								</span>
							</a>
							<a href="<?= $document->services_link->url; ?>" class="link">
								<span class="link-text">
									<?= RichText::asText($document->services_link_text); ?>
								</span>
								<span class="link-arrow">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</span>
							</a>
						</div>
					</div>
					<div class="container-img elAnim__slide anim__delayMedium_4">
						<img src="<?= $document->services_img->url; ?>" alt="">
					</div>
					<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/services/section-services/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_6" src="/img/services/section-services/obj-2.svg" alt="">
				</div>
			</section>

			<section id="section-quote" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-img elAnim__slide anim__delayMedium_1">
						<img class="elAnim__slide anim__delayMedium_2" src="<?= $document->quote_img->url; ?>" alt="">
					</div>
					<div class="container-quote">
						<img class="obj-1" src="/img/common/icn-quote-red.svg" alt="">
						<div class="container-el">
							<div class="el">
								<q class="elAnim__slide anim__delayMedium_3">
									<?= RichText::asText($document->quote_text); ?>
								</q>
								<div class="container-infos elAnim__slide anim__delayMedium_4">
									<div class="name"><?= RichText::asText($document->quote_name); ?></div>
									<div class="job"><?= RichText::asText($document->quote_job); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="section-demo" class="sectionAnim_container">
				<img class="obj-1 elAnim__slide anim__delayMedium_1" src="/img/services/section-demo/obj-1.svg" alt="">
				<img class="obj-2 elAnim__slide anim__delayMedium_2" src="/img/services/section-demo/obj-2.svg" alt="">
				<img class="obj-3 elAnim__slide anim__delayMedium_3" src="/img/services/section-demo/obj-3.svg" alt="">
				<img class="obj-4 elAnim__slide anim__delayMedium_4" src="/img/services/section-demo/obj-4.svg" alt="">
				<div class="wrapper">
					<div class="container-text elAnim__slide anim__delayMedium_1">
						<?= RichText::asHtml($document->demo_title); ?>
					</div>
					<div class="container-btn elAnim__slide anim__delayMedium_2">
						<a href="<?= $document->demo_button_link->url; ?>" class="btn">
							<span class="btn-text">
								<?= RichText::asText($document->demo_button_text); ?>
							</span>
						</a>
					</div>
				</div>
			</section>

		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/common-min.js"></script>

	</body>
</html>
<script type="text/javascript">
	$('#section-cover h1').addClass('elAnim__slide anim__delayMedium_1');
	$('#section-services h2').addClass('elAnim__slide anim__delayMedium_1');
</script>