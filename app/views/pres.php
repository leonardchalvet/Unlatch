<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
          "https" : "https") . "://" . $_SERVER['HTTP_HOST'] .  
          $_SERVER['REQUEST_URI'];

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

		<link rel="stylesheet" type="text/css" href="/style/css/press.css">

		<link rel="canonical" href="<?php echo $link; ?>" >
	    <?php foreach ($WPGLOBAL['allUrl'] as $url) { 

	      $hrefS = explode('/', $link);
	      $newHref = $hrefS[0] . '//' . $hrefS[2] . '/';

	      ?>

	      <link rel="alternate" hreflang="<?php echo $url['lang']; ?>" href="<?php echo $newHref . invertSwitchLanguage($url['lang']) . '/' . $url['url']; ?>" >

	      <?php if($url['lang'] == 'fr-fr') { ?>
	        <link rel="alternate" hreflang="x-default" href="<?php echo $newHref . 'fr/' . $url['url']; ?>" >
	      <?php } ?>

	      <?php if($url['lang'] == 'en-gb') { ?>
	        <link rel="alternate" hreflang="en-us" href="<?php echo $newHref . 'en/' . $url['url']; ?>" >
	      <?php } ?>

	    <?php } ?>

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

		<?php include('common-header.php') ?>

		<main>

			<section id="section-cover" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->cover_title); ?>
						<p class="sectionAnim_container elAnim__slide anim__delayMedium_2">
							<?= RichText::asText($document->cover_text); ?>
						</p>
						<div class="container-quotes elAnim__slide anim__delayMedium_2">
							<img class="obj-1 elAnim__slide anim__delayMedium_3" src="/img/common/icn-quote-red.svg" alt="">
							<h3 class="elAnim__slide anim__delayMedium_4">
								<?= RichText::asText($document->cover_quote_title); ?>
							</h3>
							<q class="elAnim__slide anim__delayMedium_5">
								<?= RichText::asText($document->cover_quote_text); ?>
							</q>
							<div class="container-logo elAnim__slide anim__delayMedium_6">
								<div class="logo">
									<img class="logo" src="<?= $document->cover_quote_logo_1->url; ?>" alt="">
								</div>
								<?php if(!empty($document->cover_quote_logo_2->url)) { ?>
								<div class="logo">
									<img class="logo" src="<?= $document->cover_quote_logo_2->url; ?>" alt="">
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="container-img elAnim__slide anim__delayMedium_5">
						<img src="<?= $document->cover_img->url; ?>" alt="">
					</div>
				</div>
			</section>

			<section class="common-section-pdf pdf-1 sectionAnim_container">
				<div class="wrapper">
					<?= RichText::asHtml($document->pres_title); ?>
					<div class="container-el">
						<?php $i = 2; $nbA = 1;
						 	foreach ($document->pres_container_el as $pres) { ?>
						  <div class="el elAnim__fade anim__delayMedium_<?php echo $i; ?>" <?php if($nbA > 4) { echo 'style="display:none"'; } ?>>
							<div class="container-logo">
								<div class="logo">
									<img class="logo" src="<?= $pres->pres_logo_1->url; ?>" alt="">
								</div>
								<?php if(!empty($pres->pres_logo_2->url)) { ?>
								<div class="logo">
									<img class="logo" src="<?= $pres->pres_logo_2->url; ?>" alt="">
								</div>
								<?php } ?>
							</div>
							<h3><?= RichText::asText($pres->pres_subtitle); ?></h3>
							<q>
								<?= RichText::asText($pres->pres_text); ?>
							</q>
							<a href="<?= $pres->pres_link_pdf->url; ?>" target="_blank">
							   	<span class="link-text"><?= RichText::asText($pres->pres_link_text); ?></span>
								<span class="link-arrow">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</span>
							</a>
						</div>
						<?php $i+=2; $nbA++; } ?>
					</div>
					<?php if($nbA-1 > 4) { ?>
						<div class="container-btn elAnim__slide anim__delayMedium_3">
							<a>
								<span class="btn-text">
									<?= RichText::asText($document->pres_button_text); ?>
								</span>
							</a>
						</div>
					<?php } ?>
				</div>
			</section>

			<section class="common-section-pdf pdf-2 sectionAnim_container">
				<img class="obj-1" src="/img/pres/obj-1.svg">
				<img class="obj-2" src="/img/pres/obj-2.svg">
				<div class="wrapper">
					<?= RichText::asHtml($document->medias_title); ?>
					<div class="container-el">
						<?php $i = 2; $nbA = 1;
							foreach ($document->medias_container_el as $medias) { ?>
						  <div class="el elAnim__fade anim__delayMedium_<?php echo $i; ?>" <?php if($nbA > 4) { echo 'style="display:none"'; } ?>>
							<div class="container-logo">
								<img class="logo" src="<?= $medias->medias_logo->url; ?>" alt="">
							</div>
							<h3><?= RichText::asText($medias->medias_subtitle); ?></h3>
							<q>
								<?= RichText::asText($medias->medias_text); ?>
							</q>
							<a href="<?= $pres->pres_link_pdf->url; ?>" target="_blank">
							   	<span class="link-text"><?= RichText::asText($medias->medias_link_text); ?></span>
								<span class="link-arrow">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
										<use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
									</svg>
								</span>
							</a>
						</div>
						<?php $i+=2; $nbA++; } ?>
					</div>
					<?php if($nbA-1 > 4) { ?>
						<div class="container-btn elAnim__slide anim__delayMedium_3">
							<a>
								<span class="btn-text">
									<?= RichText::asText($document->medias_button_text); ?>
								</span>
							</a>
						</div>
					<?php } ?>
				</div>
			</section>
			
		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/common-min.js"></script>

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
</html>

<script type="text/javascript">
	$('#section-cover h1').addClass('elAnim__slide anim__delayMedium_1');
	$('.common-section-pdf h2').addClass('elAnim__slide anim__delayMedium_1');

	$('.common-section-pdf.pdf-1 .container-btn a').click(function(){
		$('.common-section-pdf.pdf-1 .container-el .el').css('display', 'block');
		$('.common-section-pdf.pdf-1 .container-btn').css('display', 'none');
	})

	$('.common-section-pdf.pdf-2 .container-btn a').click(function(){
		$('.common-section-pdf.pdf-2 .container-el .el').css('display', 'block');
		$('.common-section-pdf.pdf-2 .container-btn').css('display', 'none');
	})
</script>