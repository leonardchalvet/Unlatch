<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;
$nbT = $document->global_template;
?>
<html>
  <head>

    <title><?= RichText::asText($document->global_title); ?></title>

    <meta name="description" content="<?= RichText::asText($document->global_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/solution_<?php echo $nbT; ?>.css">

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
							<span><?= RichText::asText($document->cover_name); ?></span>
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
					<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/common-solutions/section-cover/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_6" src="/img/common-solutions/section-cover/obj-2.svg" alt="">
					<div class="container-img elAnim__slide anim__delayMedium_7">
						<img src="<?= $document->cover_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section id="section-features">
				<div class="wrapper">
					<div class="container-text sectionAnim_container">
						<?= RichText::asHtml($document->features_title); ?>
					</div>
					<div class="container-features">
						<?php $i = 1; 
							foreach ($document->body as $slice) { ?>
							<div class="feature sectionAnim_container <?php if($slice->primary->feature_highlight == 'yes') { echo 'higlight'; } ?>">
								<div class="container-illu elAnim__sk">
									<?php if(empty($slice->primary->feature_img->url)) { 

										if($nbT == 1) {
											if($i == 1) {
												echo '<img class="sk-1" src="/img/common-solutions/solution-1/1/Bank@4x.png" alt="">
													  <img class="sk-2" src="/img/common-solutions/solution-1/1/Icon-text-1@4x.png" alt="">
													  <img class="sk-3" src="/img/common-solutions/solution-1/1/Icon-text-2@4x.png" alt="">';
											}
											else if($i == 2) {
												echo '<img class="sk-1" src="/img/common-solutions/solution-1/2/Dashboard-List@4x.png" alt="">
													  <img class="sk-2" src="/img/common-solutions/solution-1/2/1@4x.png" alt="">
													  <img class="sk-3" src="/img/common-solutions/solution-1/2/2@4x.png" alt="">
													  <img class="sk-4" src="/img/common-solutions/solution-1/2/3@4x.png" alt="">
													  <img class="sk-5" src="/img/common-solutions/solution-1/2/4@4x.png" alt="">';
											}
											else if($i == 3) {
												echo '<img class="sk-1" src="/img/common-solutions/solution-1/3/Icon-text@4x.png" alt="">
													  <img class="sk-2" src="/img/common-solutions/solution-1/3/Image@4x.png" alt="">';
											}
											else if($i == 4) {
												echo '<img class="sk-1" src="/img/common-solutions/solution-1/4/Bank@4x.png" alt="">
													  <img class="sk-2" src="/img/common-solutions/solution-1/4/Layout-Icon@4x.png" alt="">
													  <img class="sk-3" src="/img/common-solutions/solution-1/4/Pie-global@4x.png" alt="">';
											}
										}
										else if($nbT == 2) {
											if($i == 1) {
												echo '<img class="sk-1" src="/img/common-solutions/solution-2/1/Bank@4x.png" alt="">
												      <img class="sk-2" src="/img/common-solutions/solution-2/1/Icon-text-1@4x.png" alt="">
													  <img class="sk-3" src="/img/common-solutions/solution-2/1/Icon-text-2@4x.png" alt="">
													  <img class="sk-4" src="/img/common-solutions/solution-2/1/Sign@4x.png" alt="">';
											}
											else if($i == 2) {
												echo '<img class="sk-1" src="/img/common-solutions/solution-2/2/Image@4x.png" alt="">
													  <img class="sk-2" src="/img/common-solutions/solution-2/2/Icon-text@4x.png" alt="">';
											}
											else if($i == 3) {
												echo '<img class="sk-1" src="/img/common-solutions/solution-2/3/Bank@4x.png" alt="">
													  <img class="sk-2" src="/img/common-solutions/solution-2/3/Icon-text@4x.png" alt="">
													  <img class="sk-3" src="/img/common-solutions/solution-2/3/Notifs@4x.png" alt="">';
											}
										}

									} else { ?>
										<img class="img" src="<?= $slice->primary->feature_img->url; ?>" alt="">
									<?php } ?>
								</div>
								<div class="container-text">
									<?= RichText::asHtml($slice->primary->feature_title); ?>
									<p class="elAnim__slide anim__delayMedium_2">
										<?= RichText::asText($slice->primary->feature_text); ?>
									</p>
									<ul>
										<?php $j = 3; 
											foreach ($slice->items as $item) { ?>
											<li class="elAnim__slide anim__delayMedium_<?php echo $j; ?>">
												<a href="<?= $item->feature_link->url; ?>"><?= RichText::asText($item->feature_link_text); ?></a>
											</li>
										<?php $j++; } ?>
									</ul>
								</div>
								<?php if($slice->primary->feature_highlight == 'yes') { ?>
									<div class="container-background">
										<?php if($nbT == 1) { ?>
											<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/common-solutions/section-features/obj-1.svg" alt="">
										<?php } else { ?>
											<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/common-solutions/section-features/obj-3.svg" alt="">
										<?php } ?>
										<img class="obj-2 elAnim__slide anim__delayMedium_6" src="/img/common-solutions/section-features/obj-2.svg" alt="">
									</div>
								<?php } ?>
							</div>

						<?php
							$i++;
						} ?>
					</div>
				</div>
			</section>

			<section id="section-quotes" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-img elAnim__slide anim__delayMedium_1">
						<img src="<?= $document->quotes_img->url; ?>" alt="">
					</div>
					<div class="container-quotes">
						<img class="obj-1 elAnim__slide anim__delayMedium_2" src="/img/common/icn-quote-red.svg" alt="">
						<div class="container-el">
							<div class="el">
								<q class="elAnim__slide anim__delayMedium_3">
								 	<?= RichText::asText($document->quotes_text); ?>
								</q>
								<div class="container-infos elAnim__slide anim__delayMedium_4">
									<div class="name"><?= RichText::asText($document->quotes_names); ?></div>
									<div class="job"><?= RichText::asText($document->quotes_job); ?></div>
								</div>
							</div>
						</div>
						<div class="container-action elAnim__slide anim__delayMedium_5">
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

			<section id="section-logos" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->logos_title); ?>
					</div>
					<div class="container-logos elAnim__fade anim__delayMedium_2">
						<img src="<?= $document->logos_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section id="common-section-banner" class="sectionAnim_container">
		        <img class="obj-2 elAnim__slide anim__delayMedium_5" src="/img/common/section-banner/obj-2.svg" alt="">
		        <img class="obj-3 elAnim__slide anim__delayMedium_6" src="/img/common/section-banner/obj-3.svg" alt="">
		        <div class="wrapper">
		          <div class="container-img elAnim__slide anim__delayMedium_1">
		            <img src="<?= $document->banner_photo->url; ?>" alt="">
		          </div>
		          <div class="container-text">
		            <?= RichText::asHtml($document->banner_title); ?>
		            <p class="elAnim__slide anim__delayMedium_2">
		            	<?= RichText::asText($document->banner_text); ?>
		            </p>
		            <div class="container-btn elAnim__slide anim__delayMedium_3">
			            <a href="<?= $document->banner_button_link->url; ?>" >
			              <span class="btn-text"><?= RichText::asText($document->banner_buttton_text); ?></span>
			            </a>
			        </div>
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
<script type="text/javascript">
	$('#section-cover h1').addClass('elAnim__slide anim__delayMedium_2');
	$('#section-features h2').addClass('elAnim__slide anim__delayMedium_1');
	$('#section-features h3').addClass('elAnim__slide anim__delayMedium_1');
	$('#section-logos h2').addClass('elAnim__slide anim__delayMedium_1');
	$('#common-section-banner h2').addClass('elAnim__slide anim__delayMedium_1');
</script>