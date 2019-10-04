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

			<section id="section-cover" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->cover_title); ?>
						<p class="sectionAnim_container elAnim__slide anim__delayMedium_2">
							<?= RichText::asText($document->cover_text); ?>
						</p>
						<div class="container-quotes elAnim__slide anim__delayMedium_2">
							<img class="obj-1 elAnim__slide anim__delayMedium_3" src="/img/common/icn-quote-red.svg" alt="">
							<h3 class="elAnim__slide anim__delayMedium_4">
								<?= RichText::asText($document->cover_quote_title); ?>
							</h3>
							<q class="elAnim__slide anim__delayMedium_5">
								<?= RichText::asText($document->cover_quote_text); ?>
							</q>
							<div class="container-logo elAnim__slide anim__delayMedium_6">
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
					<div class="container-img elAnim__slide anim__delayMedium_5">
						<img src="<?= $document->cover_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section class="common-section-pdf pdf-1 sectionAnim_container">
				<div class="wrapper">
					<?= RichText::asHtml($document->pres_title); ?>
					<div class="container-el">
						<?php $i = 2; $nbA = 1;
						 	foreach ($document->pres_container_el as $pres) { ?>
						  <div class="el elAnim__fade anim__delayMedium_<?php echo $i; ?>" <?php if($nbA > 4) { echo 'style="display:none"'; } ?>>
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
							   	<span class="link-text"><?= RichText::asText($pres->pres_link_text); ?></span>
								<span class="link-arrow">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</span>
							</a>
						</div>
						<?php $i+=2; $nbA++; } ?>
					</div>
					<?php if($nbA-1 > 4) { ?>
						<div class="container-btn elAnim__slide anim__delayMedium_3">
							<a>
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
					<?php } ?>
				</div>
			</section>

			<section class="common-section-pdf pdf-2 sectionAnim_container">
				<img class="obj-1" src="/img/pres/obj-1.svg">
				<img class="obj-2" src="/img/pres/obj-2.svg">
				<div class="wrapper">
					<?= RichText::asHtml($document->medias_title); ?>
					<div class="container-el">
						<?php $i = 2; $nbA = 1;
							foreach ($document->medias_container_el as $medias) { ?>
						  <div class="el elAnim__fade anim__delayMedium_<?php echo $i; ?>" <?php if($nbA > 4) { echo 'style="display:none"'; } ?>>
							<img src="<?= $pres->pres_logo->url; ?>" alt="">
							<h3><?= RichText::asText($medias->medias_subtitle); ?></h3>
							<q>
								<?= RichText::asText($medias->medias_text); ?>
							</q>
							<a href="<?= $pres->pres_link_pdf->url; ?>" target="_blank">
							   	<span class="link-text"><?= RichText::asText($medias->medias_link_text); ?></span>
								<span class="link-arrow">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</span>
							</a>
						</div>
						<?php $i+=2; $nbA++; } ?>
					</div>
					<?php if($nbA-1 > 4) { ?>
						<div class="container-btn elAnim__slide anim__delayMedium_3">
							<a>
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
					<?php } ?>
				</div>
			</section>
			
		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/common-min.js"></script>
	</body>
</html>

<script type="text/javascript">
	$('#section-cover h1').addClass('elAnim__slide anim__delayMedium_1');
	$('.common-section-pdf h2').addClass('elAnim__slide anim__delayMedium_1');

	$('.common-section-pdf.pdf-1 .container-btn a').click(function(){
		$('.common-section-pdf.pdf-1 .container-el .el').css('display', 'block');
		$('.common-section-pdf.pdf-1 .container-btn').css('display', 'none');
	})

	$('.common-section-pdf.pdf-2 .container-btn a').click(function(){
		$('.common-section-pdf.pdf-2 .container-el .el').css('display', 'block');
		$('.common-section-pdf.pdf-2 .container-btn').css('display', 'none');
	})
</script>