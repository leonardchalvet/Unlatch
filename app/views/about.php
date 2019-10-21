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

		<link rel="stylesheet" type="text/css" href="/style/css/about.css">

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

		<?php include('common-lightbox.php') ?>

		<main>

			<section id="section-cover" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text">
						<?= RichText::asHtml($document->cover_title); ?>
						<div class="sep elAnim__slide anim__delayMedium_2"></div>
						<p class="elAnim__slide anim__delayMedium_3">
							<?= RichText::asText($document->cover_text); ?>
						</p>
					</div>
					<div class="container-img">
						<div class="img img-1 elAnim__slide anim__delayMedium_2">
							<img src="<?= $document->cover_img_left->url; ?>" alt="">
						</div>
						<div class="img img-2 elAnim__slide anim__delayMedium_3">
							<img src="<?= $document->cover_img_middle->url; ?>" alt="">
						</div>
						<div class="img img-3 elAnim__slide anim__delayMedium_4">
							<img src="<?= $document->cover_img_right->url; ?>" alt="">
						</div>
					</div>
					<img class="obj-1 elAnim__slide anim__delayMedium_5" src="/img/about/section-cover/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_6" src="/img/about/section-cover/obj-2.svg" alt="">
				</div>
			</section>

			<section id="section-features" class="sectionAnim_container">
				<div class="wrapper">
					<div class="container-text elAnim__slide anim__delayMedium_1">
						<?= RichText::asHtml($document->features_title); ?>
					</div>
					<div class="container-col">
						<?php $i = 1; 
						foreach ($document->features_container_features as $feature) {
							if ( ($i % 2) == 1 ) { ?>
								<div class="col">
									<div class="container-el">
							<?php } ?>
							<div class="el el-<?php echo $i; ?> elAnim__slide anim__delayMedium_<?php echo ($i+1); ?>">
								<div class="icn">
									<img src="<?= $feature->feature_icn->url; ?>" alt="">
								</div>
								<div class="text">
									<?= RichText::asHtml($feature->feature_title); ?>
									<p>
										<?= RichText::asText($feature->feature_text); ?>
									</p>
								</div>
							</div>
							<?php
							if ( ($i % 2) == 0 ) { ?>
			                		</div>
			                	</div>
			              	<?php }
			              	$i++;
						} ?>
					</div>
				</div>
			</section>

			<section id="section-fondateurs" class="sectionAnim_container">
				<div class="container-background">
					<img class="obj-1 elAnim__slide anim__delayMedium_1" src="/img/about/section-fondateurs/obj-1.svg" alt="">
					<img class="obj-2 elAnim__slide anim__delayMedium_2" src="/img/about/section-fondateurs/obj-2.svg" alt="">
				</div>
				<div class="wrapper">

					<div class="container-text elAnim__slide anim__delayMedium_3">
						<?= RichText::asHtml($document->fondateurs_title); ?>
					</div>
					<div class="container-el">
						<?php $i =4; 
						foreach ($document->fondateurs_container_fondateurs as $fondateur) { ?>
						<div class="el elAnim__slide anim__delayMedium_<?php echo $i; ?>">
							<div class="pp">
								<img src="<?= $fondateur->fondateur_photo->url; ?>" alt="">
							</div>
							<div class="container-infos">
								<div class="name"><?= RichText::asText($fondateur->fondateur_name); ?></div>
								<div class="job"><?= RichText::asText($fondateur->fondateur_job); ?></div>
								<a href="<?= $fondateur->fondateur_link->url; ?>">
									<img src="<?= $fondateur->fondateur_icn->url; ?>" alt="">
								</a>
							</div>
							<?= RichText::asHtml($fondateur->fondateur_text); ?>
						</div>
						<?php $i++; } ?>
					</div>
				</div>
			</section>

			<section id="section-stats" class="sectionAnim_container">
		        <div class="wrapper">
		          <div class="container-col">
		            <?php for( $i = 1 ; $i <= 6 ; $i++ ) {
		              if ( ($i % 2) == 1 ) { ?>
		                <div class="col">
		                  <div class="container-el">
		              <?php } ?>
		              <div class="el el-<?php echo $i; ?> elAnim__slide anim__delayMedium_<?php echo $i; ?>">
		                <h4><?= RichText::asText($document->stats_container_stats[($i-1)]->stat_number); ?></h4>
		                <p><?= RichText::asText($document->stats_container_stats[($i-1)]->stat_text); ?></p>
		              </div>
		              <?php
		              if ( ($i % 2) == 0 ) { ?>
		                  </div>
		                </div>
		              <?php } 
		            } ?>
		          </div>
		        </div>
		    </section>

			<section id="common-section-join" class="sectionAnim_container">
				<img class="obj-1 elAnim__slide anim__delayMedium_1" src="/img/common/section-join/obj-1.svg" alt="">
				<img class="obj-2 elAnim__slide anim__delayMedium_2" src="/img/common/section-join/obj-2.svg" alt="">
				<img class="obj-3 elAnim__slide anim__delayMedium_3" src="/img/common/section-join/obj-3.svg" alt="">
				<img class="obj-4 elAnim__slide anim__delayMedium_4" src="/img/common/section-join/obj-4.svg" alt="">
				<div class="wrapper">
					<div class="container-text elAnim__slide anim__delayMedium_5">
						<?= RichText::asHtml($document->join_title); ?>
					</div>
					<div class="container-btn elAnim__slide anim__delayMedium_6">
						<a href="<?= $document->join_button_link->url; ?>">
							<span class="btn-text">
								<?= RichText::asText($document->join_button_text); ?>
							</span>
						</a>
					</div>
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
</script>