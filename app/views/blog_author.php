<?php 
use Prismic\Dom\RichText;
$cta = $WPGLOBAL['cta'];
$document = $WPGLOBAL['document']->results[0]->data;
$articles = $WPGLOBAL['articles']->results;

$i = 0;
foreach ($document->container_authors as $author) {
    $author = trim(strtolower($author->author_name_page[0]->text));

    if($cta == $author) {
    	break;
    }
    $i++;
}
$documentA = $document->container_authors[$i];

$p = isset($_GET['p']) ? intval($_GET['p']) : 1;
$nbMax = 7;
$pStart = ($p - 1) * $nbMax;
$nbMaxA = $nbMax * $p;
$nbA = 0;
foreach ($articles as $article) { 
	if($cta == $article->data->profil_url[0]->text) {
		$nbA++;
	}
}
?>
<html>
  	<head>

    	<title><?= RichText::asText($documentA->author_meta_title); ?></title>

    	<meta name="description" content="<?= RichText::asText($documentA->author_meta_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/blog-author.css">

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

			<section id="section-blog">
				
				<div class="wrapper">

					<div class="container-text">
						<div class="container-path">
							<a href="<?= $document->authors_path_link->url; ?>">
								<?= RichText::asText($document->author_path_text); ?>
							</a>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
								<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
							</svg>
							<a><?= RichText::asText($documentA->author_title); ?></a>
						</div>
						<div class="container-infos">
							<div class="pp">
								<img src="<?= $documentA->author_photo->url; ?>" alt="">
							</div>
							<div class="text">
								<?= RichText::asHtml($documentA->author_title); ?>
								<p>
									<?= RichText::asText($documentA->author_text); ?>
								</p>
							</div>
						</div>
						
					</div>
					
					<div class="container-blog">
						<?php $i = 1; 

						$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
						                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
						                $_SERVER['REQUEST_URI']; 

						$linkS = explode('/', $link);
						$newLink = $linkS[0] . '//' . $linkS[2] . '/' . $linkS[3] . '/blog';

						foreach ($articles as $article) {
							$uid = $article->uid;
							if($cta == $article->data->profil_url[0]->text) {
								if($idA != $article->id && $i >= $pStart && $i < $nbMaxA ) { 
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
						<?php } $i++; } } ?>
					</div>

					<div class="nav-index">
						<?php if($p != 1) { ?>
							<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p='.($p-1); ?>" class="nav-prev">
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
										<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p='.$i; ?>"><?php echo $i; ?></a>
									</li>
							<?php }
							} 
							else { ?>
								<li class="active">
									<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p='.$i; ?>">1</a>
								</li>
								<li>
									<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p='.$i; ?>">2</a>
								</li>
								<li>
									<a>...</a>
								</li>
								<li>
									<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p='.ceil($nbA/$nbMaxA); ?>"><?php echo ceil($nbA/$nbMax); ?></a>
								</li>
							<?php } ?>
						</ul>

						<?php if($p < ceil($nbA/$nbMax)) { ?>
							<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p='.($p+1); ?>" class="nav-next">
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