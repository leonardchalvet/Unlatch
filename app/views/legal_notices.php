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

		<link rel="stylesheet" type="text/css" href="/style/css/legal-mentions.css">

	</head>
	
	<body>

		<?php include('common-header.php') ?>

		<main>

			<section id="section-legal-mentions">
				<div class="wrapper">
					<?= RichText::asHtml($document->content_title); ?>
					<div class="sep"></div>
					<?= RichText::asHtml($document->content_text); ?>
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

		</main>

		<?php include('common-footer.php') ?>

	</body>

	<script type="text/javascript" src="/script/minify/common-min.js"></script>
</html>