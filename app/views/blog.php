<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;
$articles = $WPGLOBAL['articles']->results;

$p = isset($_GET['p']) ? intval($_GET['p']) : 1;
$nbMax = 11;
$pStart = ($p - 1) * $nbMax;
$nbMaxA = $nbMax * $p;
$nbA = 0;
foreach ($articles as $article) { $nbA++; }
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
						<?php

						$i = 0;

						$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
						                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
						                $_SERVER['REQUEST_URI']; 

						$linkS = explode('/', $link);
						$newLink = $linkS[0] . '//' . $linkS[2] . '/' . $linkS[3] . '/blog';

						foreach ($articles as $article) {
							$uid = $article->uid;
							if($idA != $article->id && $i >= $pStart && $i < $nbMaxA) {
								$article = $article->data; ?>
								<a class="el-blog" href="<?php echo $newLink.'/'.RichText::asText($article->global_categorie).'/'.$uid; ?>">
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
								</a>
						<?php } $i++; } ?>
					</div>

					<div class="nav-index">
						<?php if($p != 1) { ?>
							<a href="<?php echo $newLink.'?p='.($p-1); ?>" class="nav-prev">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
									<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
								</svg>
								<div class="text">
									<?= RichText::asText($document->common_prev); ?>
								</div>
							</a>
						<?php } ?>

						<ul>
							<?php if( ceil($nbA/$nbMax) <= 4 ) { 
								for ($i = 1 ; $i <= ceil($nbA/$nbMax) ; $i++) { ?>
									<li <?php if($i==$p) { echo 'class="active"'; } ?>>
										<a href="<?php echo $newLink.'?p='.$i; ?>"><?php echo $i; ?></a>
									</li>
							<?php }
							} 
							else { ?>
								<li class="active">
									<a href="<?php echo $newLink.'?p=1'; ?>">1</a>
								</li>
								<li>
									<a href="<?php echo $newLink.'?p=2'; ?>">2</a>
								</li>
								<li>
									<a>...</a>
								</li>
								<li>
									<a href="<?php echo $newLink.'?p='.ceil($nbA/$nbMaxA); ?>"><?php echo ceil($nbA/$nbMax); ?></a>
								</li>
							<?php } ?>
						</ul>

						<?php if($p < ceil($nbA/$nbMax)) { ?>
							<a href="<?php echo $newLink.'?p='.($p+1); ?>" class="nav-next">
								<div class="text">
									<?= RichText::asText($document->common_next); ?>
								</div>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
									<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
								</svg>
							</a>
						<?php } ?>
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

		let saveContainerEl = $('.header-blog .container-input .dropdown').html();
        
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
				$('#header-blog-desktop .wrapper .container-link .search .dropdown').append(saveContainerEl);

				$('#header-blog-mobile .container-link .search .dropdown').empty();
				$('#header-blog-mobile .container-link .search .dropdown').append(saveContainerEl);
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
			$('#header-blog-desktop .wrapper .container-link .search .dropdown').empty();
			$('#header-blog-desktop .wrapper .container-link .search .dropdown').append(sData);

			$('#header-blog-mobile .container-link .search .dropdown').empty();
			$('#header-blog-mobile .container-link .search .dropdown').append(sData);
		}
    });
</script>