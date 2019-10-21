<?php 
use Prismic\Dom\RichText;
$cta = $WPGLOBAL['cta'];
$document = $WPGLOBAL['document']->results[0]->data;
$articles = $WPGLOBAL['articles']->results;

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
          "https" : "https") . "://" . $_SERVER['HTTP_HOST'] .  
          $_SERVER['REQUEST_URI'];

$i = 0;
foreach ($document->container_categories as $categorie) {
    $categorie = trim(strtolower($categorie->categorie_name_page[0]->text));

    if($cta == $categorie) {
    	break;
    }
    $i++;
}
$documentC = $document->container_categories[$i];

$p = isset($_GET['p']) ? intval($_GET['p']) : 1;
$nbMax = 9;
$pStart = ($p - 1) * $nbMax;
$nbMaxA = $nbMax * $p;
$nbA = 0;
foreach ($articles as $article) { 
	if($cta == $article->data->global_categorie[0]->text) {
		$nbA++;
	}
}
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

    	<title><?= RichText::asText($documentC->categorie_meta_title); ?></title>

    	<meta name="description" content="<?= RichText::asText($documentC->categorie_meta_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/blog-categories.css">

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

			<section id="section-blog">
				
				<div class="wrapper">
					
					<div class="container-blog">

						<div class="el-text">
							<div class="container-path">
								<a href="<?= $document->categories_path_link->url; ?>">
									<?= RichText::asText($document->categories_path_text); ?>
								</a>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
									<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
								</svg>
								<a><?= RichText::asText($documentC->categorie_title); ?></a>
							</div>
							<h1>
								<?= RichText::asText($documentC->categorie_title); ?>
							</h1>
							<p>
								<?= RichText::asText($documentC->categorie_text); ?>
							</p>
						</div>
						
						<?php $i = 1; 

						$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
						          "https" : "https") . "://" . $_SERVER['HTTP_HOST'] .  
						          $_SERVER['REQUEST_URI'];

						$linkS = explode('/', $link);
						$newLink = $linkS[0] . '//' . $linkS[2] . '/' . $linkS[3] . '/blog';

						foreach ($articles as $article) {
							$uid = $article->uid;
							if($cta == $article->data->global_categorie[0]->text) {
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
								<li <?php if($p==1) { echo 'class="active"'; } ?> >
									<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p=1'; ?>">1</a>
								</li>
								<li <?php if($p==2) { echo 'class="active"'; } ?> >
									<a href="<?php echo $newLink.'/'.explode('?', $linkS[5])[0].'?p=2'; ?>">2</a>
								</li>
								<li>
									<a>...</a>
								</li>
								<li <?php if($p==ceil($nbA/$nbMax)) { echo 'class="active"'; } ?> >
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