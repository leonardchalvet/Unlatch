<?php 
use Prismic\Dom\RichText;
$idA = $WPGLOBAL['document']->id;
$document = $WPGLOBAL['document']->data;
$articles = $WPGLOBAL['articles']->results;
?>
<html>
  	<head>

    	<title><?= RichText::asText($document->global_title); ?></title>

    	<meta name="description" content="<?= RichText::asText($document->global_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/blog-post.css">

		<meta property="og:title"       content="<?= RichText::asText($document->meta_thumbnail_title); ?>" />
		<meta property="og:description" content="<?= RichText::asText($document->meta_thumbnail_description); ?>" />
		<meta property="og:image"       content="<?= $document->meta_thumbnail_image->url; ?>" />

		<meta name="twitter:card"        content="summary_large_image" />
		<meta name="twitter:title"       content="<?= RichText::asText($document->meta_thumbnail_title); ?>" />
		<meta name="twitter:description" content="<?= RichText::asText($document->meta_thumbnail_description); ?>" />
		<meta name="twitter:image"       content="<?= $document->meta_thumbnail_image->url; ?>" />

		<link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="/img/favicon/site.webmanifest">
		<link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff4d37">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
		
	</head>
	
	<body>

		<?php include('common-header-blog.php') ?>

		<main>

			<section id="section-head">
				
				<img class="obj-1" src="/img/blog-post/obj-1.svg" alt="">
				<img class="obj-2" src="/img/blog-post/obj-2.svg" alt="">

				<div class="wrapper">
					<div class="container-path">
						<a href="<?= $document->content_link_blog->url; ?>">
							<?= RichText::asText($document->content_blog_text); ?>
						</a>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
							<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
						</svg>
						<a href="<?= $document->content_link_categorie->url; ?>">
							<?= RichText::asText($document->common_categorie); ?>
						</a>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
							<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
						</svg>
						<a>
							<?= RichText::asText($document->common_title); ?>
						</a>
					</div>

					<div class="container-text">
						<?= RichText::asHtml($document->common_title); ?>
					</div>

					<div class="container-infos">
						<div class="pp">
							<img src="<?= $document->profil_photo->url; ?>" alt="">
						</div>
						<div class="text">
							<div class="name">
								<?= RichText::asText($document->profil_name); ?>
							</div>
							<div class="post">
								<?= RichText::asText($document->profil_job); ?>
							</div>
							<div class="date">
								<?= RichText::asText($document->profil_date); ?> <?= RichText::asText($document->common_date); ?>
							</div>
						</div>
					</div>

					<div class="cover">
						<div class="bdg">
							<span><?= strtoupper(RichText::asText($document->common_categorie)); ?></span>
						</div>
						<img src="<?= $document->common_first_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section id="section-wysiwyg">
				
				<div class="wrapper">
					<div class="container-share">
						<?php foreach ($document->container_sn as $sn) { ?>
							<a href="<?= $sn->sn_link->url; ?>">
								<img src="<?= $sn->sn_icn->url; ?>" alt="">
							</a>
						<?php } ?>
					</div>
					<div class="wysiwyg">
						<?= RichText::asHtml($document->content_first_text); ?>
						<div class="container-quote">
							<div class="icn">
								<img src="/img/common/icn-quote-red.svg" alt="">
							</div>
							<div class="text">
								<q>
									<?= RichText::asText($document->content_quote); ?>
								</q>
							</div>
							
						</div>
						<p>
							<?= RichText::asHtml($document->content_before_img); ?>
							<img src="<?= $document->content_img->url; ?>" alt="">
						</p>
						
						<?= RichText::asHtml($document->content); ?>

						<iframe src="<?= $document->content_video->url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

						<div class="container-author">
							<div class="infos">
								<div class="pp">
									<img src="<?= $document->profil_photo->url; ?>" alt="">
								</div>
								<div class="text">
									<div class="name">
										<?= RichText::asText($document->profil_name); ?>
									</div>
									<div class="post">
										<?= RichText::asText($document->profil_job); ?>
									</div>
									<a href="<?= $document->profil_link->url; ?>">
										<?= RichText::asText($document->profil_link_text); ?>
									</a>
								</div>
							</div>
							<div class="share">
								<p>Vous  aimez cet article ? <span>Partagez le !</span></p>
								<div class="container-link">
									<?php foreach ($document->container_sn as $sn) { ?>
										<a href="<?= $sn->sn_link->url; ?>">
											<img src="<?= $sn->sn_icn->url; ?>" alt="">
										</a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
					
			</section>

			<section id="section-similar">
				
				<div class="wrapper">
					<div class="container-text">
						<h2>
							D’autres <span>articles similaires.</span>
						</h2>
					</div>
					<div class="container-blog">
						<?php $i = 1; 
						foreach ($articles as $article) {
							if($idA != $article->id && $i <= 3) { 
								$article = $article->data; ?>
								<div class="el-blog">
									<div class="cover">
										<div class="bdg">
											<span><?= strtoupper(RichText::asText($article->common_categorie)); ?></span>
										</div>
										<div class="btn">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
												<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
											</svg>
										</div>
										<img src="<?= $article->common_first_img->url; ?>" alt="">
									</div>
									<div class="text">
										<div class="infos">
											<div class="name"><?= RichText::asText($article->profil_name); ?></div>
											<div class="sep"></div>
											<div class="date"><?= RichText::asText($article->common_date); ?></div>
										</div>
										<h3>
											<?= RichText::asText($article->common_title); ?>
										</h3>
										<p>
											<?= RichText::asText($article->common_little_description); ?>
										</p>
									</div>
								</div>
						<?php $i++; } } ?>
					</div>
				</div>

			</section>


		</main>

		<?php include('common-footer.php') ?>
	</body>

	<script type="text/javascript" src="/script/minify/common-min.js"></script>
</html>

<script type="text/javascript">
	$(document).ready(function(){
        
		let url = window.location.href;
		let urlS = url.split('/');
		history.pushState({ path: this.path }, '', url.split('?')[0]);

        $('.header-blog .container-input input').on("keyup", function() {
        	let value = $(this).val().toLowerCase();
        	if(value.length > 0) {
	            request(readDateSearch, '/' + $.trim(urlS[3]) + '/livesearch?value=' + value);
	        }
	        else {
	        	$('#header-blog-desktop .wrapper .container-link .search .dropdown').empty();
				$('#header-blog-mobile .container-link .search .dropdown').empty();
				$('.header-blog .container-link .search .dropdown').removeClass('show');
	        }
        });

        // AJAX
        function getXMLHttpRequest() { 
		    let objXMLHttp = null;
		    if (window.XMLHttpRequest) {
		        objXMLHttp = new XMLHttpRequest();
		    }
		    else if (window.ActiveXObject) {
		        objXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    return objXMLHttp;
		}

        function request(callback, get) {
			let xhr = getXMLHttpRequest();
			
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					callback(xhr.responseText);
				}
			};

			xhr.open("GET", get, true);
			xhr.send(null);
		}

		function readDateSearch(sData) {

			$('.header-blog .container-link .search .dropdown').addClass('show');

			$('#header-blog-desktop .wrapper .container-link .search .dropdown').empty();
			$('#header-blog-desktop .wrapper .container-link .search .dropdown').append(sData);

			$('#header-blog-mobile .container-link .search .dropdown').empty();
			$('#header-blog-mobile .container-link .search .dropdown').append(sData);
		}
    });
</script>