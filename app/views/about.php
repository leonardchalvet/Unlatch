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

		<link rel="stylesheet" type="text/css" href="/style/css/about.css">

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

		<?php include('common-lightbox.php') ?>

		<main>

			<section id="section-cover" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->cover_title); ?>
						<div class="sep elAnim__slide anim__delayMedium_2"></div>
						<p class="elAnim__slide anim__delayMedium_3">
							<?= RichText::asText($document->cover_text); ?>
						</p>
					</div>
					<div class="container-img">
						<div class="img img-1 elAnim__slide anim__delayMedium_2">
							<img src="<?= $document->cover_img_left->url; ?>" alt="">
						</div>
						<div class="img img-2 elAnim__slide anim__delayMedium_3">
							<img src="<?= $document->cover_img_middle->url; ?>" alt="">
						</div>
						<div class="img img-3 elAnim__slide anim__delayMedium_4">
							<img src="<?= $document->cover_img_right->url; ?>" alt="">
						</div>
					</div>
					<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/about/section-cover/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_6" src="/img/about/section-cover/obj-2.svg" alt="">
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
							<div class="el el-<?php echo $i; ?> elAnim__slide anim__delayMedium_<?php echo ($i+1); ?>">
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

			<section id="section-fondateurs" class="sectionAnim_container">
				<div class="container-background">
					<img class="obj-1 elAnim__slide anim__delayMedium_1" src="/img/about/section-fondateurs/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_2" src="/img/about/section-fondateurs/obj-2.svg" alt="">
				</div>
				<div class="wrapper">

					<div class="container-text elAnim__slide anim__delayMedium_3">
						<?= RichText::asHtml($document->fondateurs_title); ?>
					</div>
					<div class="container-el">
						<?php $i =4; 
						foreach ($document->fondateurs_container_fondateurs as $fondateur) { ?>
						<div class="el elAnim__slide anim__delayMedium_<?php echo $i; ?>">
							<div class="pp">
								<img src="<?= $fondateur->fondateur_photo->url; ?>" alt="">
							</div>
							<div class="container-infos">
								<div class="name"><?= RichText::asText($fondateur->fondateur_name); ?></div>
								<div class="job"><?= RichText::asText($fondateur->fondateur_job); ?></div>
								<a href="<?= $fondateur->fondateur_link->url; ?>">
									<img src="<?= $fondateur->fondateur_icn->url; ?>" alt="">
								</a>
							</div>
							<?= RichText::asHtml($fondateur->fondateur_text); ?>
						</div>
						<?php $i++; } ?>
					</div>
				</div>
			</section>

			<section id="section-stats" class="sectionAnim_container">
		        <div class="wrapper">
		          <div class="container-col">
		            <?php for( $i = 1 ; $i <= 6 ; $i++ ) {
		              if ( ($i % 2) == 1 ) { ?>
		                <div class="col">
		                  <div class="container-el">
		              <?php } ?>
		              <div class="el el-<?php echo $i; ?> elAnim__slide anim__delayMedium_<?php echo $i; ?>">
		                <h4><?= RichText::asText($document->stats_container_stats[($i-1)]->stat_number); ?></h4>
		                <p><?= RichText::asText($document->stats_container_stats[($i-1)]->stat_text); ?></p>
		              </div>
		              <?php
		              if ( ($i % 2) == 0 ) { ?>
		                  </div>
		                </div>
		              <?php } 
		            } ?>
		          </div>
		        </div>
		    </section>

			<section id="common-section-join" class="sectionAnim_container">
				<img class="obj-1 elAnim__slide anim__delayMedium_1" src="/img/common/section-join/obj-1.svg" alt="">
				<img class="obj-2 elAnim__slide anim__delayMedium_2" src="/img/common/section-join/obj-2.svg" alt="">
				<img class="obj-3 elAnim__slide anim__delayMedium_3" src="/img/common/section-join/obj-3.svg" alt="">
				<img class="obj-4 elAnim__slide anim__delayMedium_4" src="/img/common/section-join/obj-4.svg" alt="">
				<div class="wrapper">
					<div class="container-text elAnim__slide anim__delayMedium_5">
						<?= RichText::asHtml($document->join_title); ?>
					</div>
					<div class="container-btn elAnim__slide anim__delayMedium_6">
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
    $('#section-cover h1').addClass('elAnim__slide anim__delayMedium_1');
</script>