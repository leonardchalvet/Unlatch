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

		<link rel="stylesheet" type="text/css" href="/style/css/contact.css">

	</head>
	
	<body>

		<main>

			<section id="section-contact">
				<div class="wrapper">
					<div class="container-text">
						<div class="container-cover">
							<img src="<?= $document->content_img->url; ?>" alt="">
							<?= RichText::asHtml($document->content_title); ?>
							<?= RichText::asHtml($document->content_under_title); ?>
						</div>

						<div class="container-infos">
							<p>
								<?= RichText::asText($document->content_text); ?>
							</p>

							<ul>
								<?php foreach ($document->content_container_points as $point) { ?>
									<li>
										<p><?= RichText::asText($point->content_point); ?></p>
									</li>
								<?php } ?>
							</ul>

							<div class="container-logo">
								<?= RichText::asHtml($document->content_before_logos); ?>
								<div class="list-logo">
									<?php foreach ($document->content_container_logos as $logo) { ?>
										<img src="<?= $logo->content_logo->url; ?>" alt="">
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="container-form">
						<div class="head">
							<?= RichText::asHtml($document->form_title); ?>
							<p>
								<?= RichText::asText($document->form_text); ?>
							</p>
						</div>
						<form action="">
							<?php foreach ($document->form_container_input as $input) { ?>
								<div class="label">
									<input type="text" name="<?= RichText::asText($input->form_name); ?>">
									<div class="name"><?= RichText::asText($input->form_placeholder); ?></div>
								</div>	
							<?php } ?>
							<input type="text" name="allmail" value="" style="display: none;">
							<button>
								<span class="btn-text"><?= RichText::asText($document->form_button_text); ?></span>
							</button>
						</form>
					</div>
				</div>
			</section>

		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/common-min.js"></script>
		<script type="text/javascript" src="/script/minify/contact-min.js"></script>
	</body>
</html>