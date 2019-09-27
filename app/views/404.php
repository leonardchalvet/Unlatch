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

		<link rel="stylesheet" type="text/css" href="/style/css/404.css">

	</head>
	
	<body>

		<?php include('common-header.php') ?>

		<?php include('common-lightbox.php') ?>

		<main>

			
			<section id="section-404">
				<div class="wrapper">
					<?= RichText::asHtml($document->title); ?>
					<div class="sep"></div>
					<?= RichText::asHtml($document->text); ?>
					<div class="container-btn">
						<a href="<?= $document->button_link->url; ?>">
							<span class="btn-text"><?= RichText::asText($document->button_text); ?></span>
						</a>
					</div>
				</div>
			</section>
			
		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/common-min.js"></script>
	</body>
</html>
