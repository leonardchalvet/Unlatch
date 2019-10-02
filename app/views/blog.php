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
						<?php
						foreach ($articles as $article) {
							if($idA != $article->id && $i <= 8) { 
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

<script type="text/javascript">
	$(document).ready(function(){

		let saveContainerEl = $('#header-blog-desktop .wrapper .container-link .search .dropdown').html();
        
		let url = window.location.href;
		let urlS = url.split('/');

        $('#header-blog-desktop .wrapper .container-link .search .container-input input').on("keyup", function() {
        	let value = $(this).val().toLowerCase();
            if(value.length > 0) {
	            request(readDateSearch, '/' + $.trim(urlS[3]) + '/livesearch?value=' + value);
	        }
	        else {
	        	$('#header-blog-desktop .wrapper .container-link .search .dropdown').empty();
				$('#header-blog-desktop .wrapper .container-link .search .dropdown').append(saveContainerEl);
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
		}
    });
</script>