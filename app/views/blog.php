<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;
$articles = $WPGLOBAL['articles']->results;
?>
<html>
  	<head>

    	<title><?= RichText::asText($document->blog_meta_title); ?></title>

    	<meta name="description" content="<?= RichText::asText($document->blog_meta_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/blog.css">

	</head>
	
	<body>

		<?php include('common-header-blog.php') ?>

		<main>

			<section id="section-blog">
				<div class="wrapper">
					<div class="head">
						<?= RichText::asHtml($document->blog_title); ?>
						<p>
							<?= RichText::asText($document->blog_text); ?>
						</p>
					</div>
					<div class="container-blog">
						<?php foreach ($articles as $article) { ?>
						<div class="el-blog">
							<div class="cover">
								<div class="bdg">
									<span>IMMOBILIER</span>
								</div>
								<div class="btn">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</div>
								<img src="/img/img-test/background-1.jpg" alt="">
							</div>
							<div class="text">
								<div class="infos">
									<div class="name">Sonia Dupont</div>
									<div class="sep"></div>
									<div class="date">09 Septembre 2019</div>
								</div>
								<h3>
									Titre de l’article sur une ou deux lignes maximum.
								</h3>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
							</div>
						</div>
						<?php } ?>
					</div>

					<div class="nav-index">
						<a href="" class="nav-prev">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
								<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
							</svg>
							<div class="text">
								<?= RichText::asText($document->common_prev); ?>
							</div>
						</a>

						<ul>
							<li class="active">
								<a href="">1</a>
							</li>
							<li>
								<a href="">2</a>
							</li>
							<li>
								<a href="">...</a>
							</li>
							<li>
								<a href="">10</a>
							</li>
						</ul>

						<a href="" class="nav-next">
							<div class="text">
								<?= RichText::asText($document->common_next); ?>
							</div>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
								<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
							</svg>
						</a>
					</div>
				</div>
			</section>
			

		</main>

		<?php include('common-footer.php') ?>
	</body>

	<script type="text/javascript" src="/script/minify/common-min.js"></script>
</html>