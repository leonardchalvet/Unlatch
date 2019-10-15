<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;
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

		<link rel="stylesheet" type="text/css" href="/style/css/legal-mentions.css">

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

			<section id="section-legal-mentions">
				<div class="wrapper">
					<?= RichText::asHtml($document->content_title); ?>
					<div class="sep"></div>
					<?= RichText::asHtml($document->content_text); ?>
				</div>
			</section>

			<section id="section-logos">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->logos_title); ?>
					</div>
					<div class="container-logos">
						<img src="<?= $document->logos_img->url; ?>" alt="">
						<img src="<?= $document->logos_img->url; ?>" alt="">
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