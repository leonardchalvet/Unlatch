<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;
$nbT = $document->global_skeleton;
?>
<html>
  <head>

    <title><?= RichText::asText($document->global_title); ?></title>

    <meta name="description" content="<?= RichText::asText($document->global_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/feature.css">

		<link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="/img/favicon/site.webmanifest">
		<link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#000000">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">

	</head>
	
	<body>

		<?php include('common-header.php') ?>

		<main>
			<section id="section-cover" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text">
						<div class="title elAnim__slide anim__delayMedium_1">
							<span><?= RichText::asText($document->cover_subtitle); ?></span>
						</div>
						<?= RichText::asHtml($document->cover_title); ?>
						<p class="elAnim__slide anim__delayMedium_3">
							<?= RichText::asText($document->cover_text); ?>
						</p>
						<div class="container-btn elAnim__slide anim__delayMedium_4">
							<a href="<?= $document->cover_button_link->url; ?>" >
								<span class="btn-text">
									<?= RichText::asText($document->cover_button_text); ?>
								</span>
							</a>
						</div>
					</div>
					<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/common-feature/section-cover/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_6" src="/img/common-feature/section-cover/obj-2.svg" alt="">
					<div class="container-img elAnim__slide anim__delayMedium_7">
						<img src="<?= $document->cover_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section id="section-features" class="feature-<?php echo $nbT; ?>">
				<div class="wrapper">
					<div class="container-text sectionAnim_container">
						<?= RichText::asHtml($document->features_title); ?>
					</div>
					<div class="container-features">
						<?php $i = 1; 
							foreach ($document->features_container_features as $feature) { ?>
		                  	<div class="feature sectionAnim_container <?php if($feature->feature_highlight == 'yes') { 
																	echo 'higlight'; 
																 } ?>">
								<div class="container-illu elAnim__sk">
									<?php if($feature->highlight_iskeloton == 'yes') { ?>
										<img class="sk-1" src="<?= $feature->highlight_img_1->url; ?>" alt="">
										
										<?php if(!empty($feature->highlight_img_2->url)) { ?>
											<img class="sk-2" src="<?= $feature->highlight_img_2->url; ?>" alt="">
										<?php } ?>
										
										<?php if(!empty($feature->highlight_img_3->url)) { ?>
											<img class="sk-3" src="<?= $feature->highlight_img_3->url; ?>" alt="">
										<?php } ?>

										<?php if(!empty($feature->highlight_img_4->url)) { ?>
											<img class="sk-4" src="<?= $feature->highlight_img_4->url; ?>" alt="">
										<?php } ?>

										<?php if(!empty($feature->highlight_img_5->url)) { ?>
											<img class="sk-5" src="<?= $feature->highlight_img_5->url; ?>" alt="">
										<?php } ?>

									<?php } else { ?>
										<img class="img" src="<?= $feature->highlight_img_1->url; ?>" alt="">
									<?php } ?>
								</div>
								<div class="container-text">
									<?= RichText::asHtml($feature->highlight_title); ?>
									<p class="elAnim__slide anim__delayMedium_2">
										<?= RichText::asText($feature->highlight_text); ?>
									</p>
								</div>
								<?php if($feature->feature_highlight == 'yes') { ?>
									<div class="container-background">
										<img class="obj-1" src="/img/common-feature/section-features/obj-1.svg" alt="">
										<img class="obj-2" src="/img/common-feature/section-features/obj-2.svg" alt="">
									</div>
								<?php } ?> 
							</div>
		              	<?php $i++; } ?>
					</div>
				</div>
			</section>

			<?php if($document->press_show == 'yes') { ?>
			<section id="section-pres" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text elAnim__slide anim__delayMedium_1">
						<?= RichText::asHtml($document->press_title); ?>
					</div>
					<div class="container-el">
						<?php $i = 2; 
							foreach ($document->press_container_press as $pres) { ?>
							<div class="el elAnim__slide anim__delayMedium_<?php echo $i; ?>">
								<div class="icn">
									<img src="<?= $pres->press_icn->url; ?>" alt="">
								</div>
								<div class="text">
									<?= RichText::asHtml($pres->press_subtitle); ?>
									<p>
										<?= RichText::asText($pres->press_text); ?>
									</p>
								</div>
							</div>
						<?php $i++; } ?>
					</div>
				</div>
			</section>
			<?php } ?>

			<section id="section-quotes" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-img elAnim__slide anim__delayMedium_1">
						<img src="<?= $document->quotes_img->url; ?>" alt="">
					</div>
					<div class="container-quotes">
						<img class="obj-1 elAnim__slide anim__delayMedium_2" src="/img/common/icn-quote-white.svg" alt="">
						<div class="container-el">
							<div class="el elAnim__slide anim__delayMedium_3">
								<q>
									<?= RichText::asText($document->quotes_text); ?>
								</q>
								<div class="container-infos">
									<div class="name"><?= RichText::asText($document->quotes_names); ?></div>
									<div class="job"><?= RichText::asText($document->quotes_job); ?></div>
								</div>
							</div>
						</div>
						<div class="container-action elAnim__slide anim__delayMedium_4">
							<div class="container-link">
								<a href="<?= $document->quotes_link->url; ?>">
									<span class="link-text">
										<?= RichText::asText($document->link_text); ?>
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


			<section id="common-section-join" class="sectionAnim_container">
				<img class="obj-1 elAnim__slide anim__delayMedium_3" src="/img/common/section-join/obj-1.svg" alt="">
				<img class="obj-2 elAnim__slide anim__delayMedium_4" src="/img/common/section-join/obj-2.svg" alt="">
				<img class="obj-3 elAnim__slide anim__delayMedium_5" src="/img/common/section-join/obj-3.svg" alt="">
				<img class="obj-4 elAnim__slide anim__delayMedium_6" src="/img/common/section-join/obj-4.svg" alt="">
				<div class="wrapper">
					<div class="container-text elAnim__slide anim__delayMedium_1">
						<?= RichText::asHtml($document->join_title); ?>
					</div>
					<div class="container-btn elAnim__slide anim__delayMedium_2">
						<a href="<?= $document->join_button_link->url; ?>">
							<span class="btn-text">
								<?= RichText::asText($document->join_button_text); ?>
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
	$('#section-cover h1').addClass('elAnim__slide anim__delayMedium_2');
	$('#section-features h2').addClass('elAnim__slide anim__delayMedium_1');
	$('#section-features h3').addClass('elAnim__slide anim__delayMedium_1');
</script>