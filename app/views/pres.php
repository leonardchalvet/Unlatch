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

		<link rel="stylesheet" type="text/css" href="/style/css/press.css">

	</head>
	
	<body>

		<?php include('common-header.php') ?>

		<main>

			<section id="section-cover">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->cover_title); ?>
						<p>
							<?= RichText::asText($document->cover_text); ?>
						</p>
						<div class="container-quotes">
							<img class="obj-1" src="/img/common/icn-quote-red.svg" alt="">
							<h3>
								<?= RichText::asText($document->cover_quote_title); ?>
							</h3>
							<q>
								<?= RichText::asText($document->cover_quote_text); ?>
							</q>
							<div class="container-logo">
								<div class="logo">
									<img class="logo" src="<?= $document->cover_quote_logo_1->url; ?>" alt="">
								</div>
								<?php if(!empty($document->cover_quote_logo_2->url)) { ?>
								<div class="logo">
									<img class="logo" src="<?= $document->cover_quote_logo_2->url; ?>" alt="">
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="container-img">
						<img src="<?= $document->cover_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section class="common-section-pdf">
				<div class="wrapper">
					<?= RichText::asHtml($document->pres_title); ?>
					<div class="container-el">
						<?php foreach ($document->pres_container_el as $pres) { ?>
						  <div class="el">
							<div class="container-logo">
								<div class="logo">
									<img class="logo" src="<?= $pres->pres_logo_1->url; ?>" alt="">
								</div>
								<?php if(!empty($pres->pres_logo_2->url)) { ?>
								<div class="logo">
									<img class="logo" src="<?= $pres->pres_logo_2->url; ?>" alt="">
								</div>
								<?php } ?>
							</div>
							<h3><?= RichText::asText($pres->pres_subtitle); ?></h3>
							<q>
								<?= RichText::asText($pres->pres_text); ?>
							</q>
							<a href="<?= $pres->pres_link_pdf->url; ?>" target="_blank">
							   	<span class="btn-text"><?= RichText::asText($pres->pres_link_text); ?></span>
								<span class="link-arrow">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</span>
							</a>
						</div>
						<?php } ?>
					</div>
					<div class="container-btn">
						<a href="<?= $document->pres_button_lik->url; ?>">
							<span class="btn-text">
								<?= RichText::asText($document->pres_button_text); ?>
							</span>
							<span class="link-arrow">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
									<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
								</svg>
							</span>
						</a>
					</div>
				</div>
			</section>

			<section class="common-section-pdf">
				<img class="obj-1" src="/img/pres/obj-1.svg">
				<img class="obj-2" src="/img/pres/obj-2.svg">
				<div class="wrapper">
					<?= RichText::asHtml($document->medias_title); ?>
					<div class="container-el">
						<?php foreach ($document->medias_container_el as $medias) { ?>
						  <div class="el">
							<img src="<?= $pres->pres_logo->url; ?>" alt="">
							<h3><?= RichText::asText($medias->medias_subtitle); ?></h3>
							<q>
								<?= RichText::asText($medias->medias_text); ?>
							</q>
							<a href="<?= $pres->pres_link_pdf->url; ?>" target="_blank">
							   	<span class="btn-text"><?= RichText::asText($medias->medias_link_text); ?></span>
								<span class="link-arrow">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</span>
							</a>
						</div>
						<?php } ?>
					</div>
					<div class="container-btn">
						<a href="<?= $document->medias_button_lik->url; ?>">
							<span class="btn-text">
								<?= RichText::asText($document->medias_button_text); ?>
							</span>
							<span class="link-arrow">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
									<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
								</svg>
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