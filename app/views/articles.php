<?php 
use Prismic\Dom\RichText;
$idA = $WPGLOBAL['document']->id;
$document = $WPGLOBAL['document']->data;
$articles = $WPGLOBAL['articles']->results;
?>
<html>
  	<head>

  		<!-- Global site tag (gtag.js) - Google Analytics -->
	    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149848357-1"></script>
	    <script>
	      window.dataLayer = window.dataLayer || [];
	      function gtag(){dataLayer.push(arguments);}
	      gtag('js', new Date());

	      gtag('config', 'UA-149848357-1');
	    </script>
	    <!-- Google Tag Manager -->
	    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	    })(window,document,'script','dataLayer','GTM-TBP9M7J');</script>
	    <!-- End Google Tag Manager -->
	    <!-- Facebook Pixel Code -->
	    <script>
	    !function(f,b,e,v,n,t,s)
	    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	    n.queue=[];t=b.createElement(e);t.async=!0;
	    t.src=v;s=b.getElementsByTagName(e)[0];
	    s.parentNode.insertBefore(t,s)}(window,document,'script',
	    'https://connect.facebook.net/en_US/fbevents.js');
	     fbq('init', '706181269862400'); 
	    fbq('track', 'PageView');
	    </script>
	    <noscript>
	     <img height="1" width="1" 
	    src="https://www.facebook.com/tr?id=706181269862400&ev=PageView
	    &noscript=1"/>
	    </noscript>
	    <!-- End Facebook Pixel Code -->
	    <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"11012398"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>

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
		<link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#000000">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		
	</head>
	
	<body>

		<!-- Google Tag Manager (noscript) -->
	    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBP9M7J"
	    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	    <!-- End Google Tag Manager (noscript) -->

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

		<script type="text/javascript">
	    _linkedin_partner_id = "1118217";
	    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
	    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
	    </script><script type="text/javascript">
	    (function(){var s = document.getElementsByTagName("script")[0];
	    var b = document.createElement("script");
	    b.type = "text/javascript";b.async = true;
	    b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
	    s.parentNode.insertBefore(b, s);})();
	    </script>
	    <noscript>
	    <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1118217&fmt=gif" />
	    </noscript>
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

			if(!$.trim(sData)) {
				sData = '<a>Aucun résultat</a>';
			}

			$('#header-blog-desktop .wrapper .container-link .search .dropdown').empty();
			$('#header-blog-desktop .wrapper .container-link .search .dropdown').append(sData);

			$('#header-blog-mobile .container-link .search .dropdown').empty();
			$('#header-blog-mobile .container-link .search .dropdown').append(sData);
		}
    });
</script>