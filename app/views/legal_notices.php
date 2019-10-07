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

		<link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="/img/favicon/site.webmanifest">
		<link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff4d37">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">

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