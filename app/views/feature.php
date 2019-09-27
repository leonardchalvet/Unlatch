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

		<link rel="stylesheet" type="text/css" href="/style/css/feature.css">

	</head>
	
	<body>

		<?php include('common-header.php') ?>

		<main>
			<section id="section-cover">
				<div class="wrapper">
					<div class="container-text">
						<div class="title">
							<span><?= RichText::asText($document->cover_subtitle); ?></span>
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
					<img class="obj-1" src="/img/common-feature/section-cover/obj-1.svg" alt="">
					<img class="obj-2" src="/img/common-feature/section-cover/obj-2.svg" alt="">
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
						<?php foreach ($document->features_container_features as $feature) { ?>
		                  	<div class="feature <?php if($feature->feature_highlight == 'yes') { 
													echo 'higlight'; 
												} ?>">
								<div class="container-illu">
									<img src="<?= $feature->highlight_img->url; ?>" alt="">
								</div>
								<div class="container-text">
									<?= RichText::asHtml($feature->highlight_title); ?>
									<p>
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

			<section id="section-pres">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->press_title); ?>
					</div>
					<div class="container-el">
						<?php foreach ($document->press_container_press as $pres) { ?>
							<div class="el">
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
						<?php } ?>
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


			<section id="common-section-join">
				<img class="obj-1" src="/img/common/section-join/obj-1.svg" alt="">
				<img class="obj-2" src="/img/common/section-join/obj-2.svg" alt="">
				<img class="obj-3" src="/img/common/section-join/obj-3.svg" alt="">
				<img class="obj-4" src="/img/common/section-join/obj-4.svg" alt="">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->join_title); ?>
					</div>
					<div class="container-btn">
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