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

		<link rel="stylesheet" type="text/css" href="/style/css/contact.css">

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

		<main>

			<!-- Google Tag Manager -->
		    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		    })(window,document,'script','dataLayer','GTM-TBP9M7J');</script>
		    <!-- End Google Tag Manager -->
		    <!-- Global site tag (gtag.js) - Google Analytics -->
		    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149848357-1"></script>
		    <script>
		      window.dataLayer = window.dataLayer || [];
		      function gtag(){dataLayer.push(arguments);}
		      gtag('js', new Date());
		      gtag('config', 'UA-149848357-1');
		    </script>
		    <!-- End Global site tag (gtag.js) - Google Analytics -->

			<section id="section-contact" class="sectionAnim_container">
				<div class="wrapper">
					<div class="header">
						<a href="<?= $document->content_logo_link->url; ?>" class="logo">
							<img class="logo-black" src="<?= $document->content_logo_black->url; ?>" alt="">
							<img class="logo-white" src="<?= $document->content_logo_white->url; ?>" alt="">
						</a>
						<a href="<?= $document->content_cross_link->url; ?>" class="close">
							<img src="/img/common/cross.svg" alt="">
						</a>
					</div>
					<div class="container-text">
						<div class="container-cover">
							<img class="elAnim__slide anim__delayMedium_1" src="<?= $document->content_img->url; ?>" alt="">
							<?= RichText::asHtml($document->content_title); ?>
							<?= RichText::asHtml($document->content_under_title); ?>
						</div>

						<div class="container-infos elAnim__slide anim__delayMedium_4">
							<p>
								<?= RichText::asText($document->content_text); ?>
							</p>

							<ul class="elAnim__slide anim__delayMedium_5">
								<?php foreach ($document->content_container_points as $point) { ?>
									<li>
										<p><?= RichText::asText($point->content_point); ?></p>
									</li>
								<?php } ?>
							</ul>

							<div class="container-logo elAnim__slide anim__delayMedium_6">
								<?= RichText::asHtml($document->content_before_logos); ?>
								<div class="list-logo elAnim__slide anim__delayMedium_7">
									<?php foreach ($document->content_container_logos as $logo) { ?>
										<img src="<?= $logo->content_logo->url; ?>" alt="">
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="container-form">
						<div class="head elAnim__slide anim__delayMedium_1">
							<?= RichText::asHtml($document->form_title); ?>
							<p>
								<?= RichText::asText($document->form_text); ?>
							</p>
						</div>
						<form action="/sendcontact.php" method="post" class="elAnim__slide anim__delayMedium_2">
							<?php $i = 0; 
								foreach ($document->form_container_input as $input) { 
								if($input->form_dropdown == 'no') { ?>
									<div class="label label-text">
										<input type="text" name="<?= trim(RichText::asText($input->form_name)); ?>">
										<div class="name"><?= RichText::asText($input->form_placeholder); ?></div>
									</div>	
								<?php } else { ?>
									<div class="label label-dropdown">
										<div class="container-input">
											<input readonly type="text" name="<?= trim(RichText::asText($input->form_name)); ?>">
											<div class="name"><?= RichText::asText($input->form_placeholder); ?></div>
											<img class="arrow" src="/img/common/arrow-3.svg" alt="">
										</div>
										<div class="dropdown">
											<?php foreach ($document->body[$i]->items as $dp) { ?>
												<div class="el"><?= RichText::asText($dp->form_choice); ?></div>
											<?php } ?>
										</div>
									</div>
								<?php $i++; } ?>
							<?php } ?>

							<?php 
							$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
						                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
						                $_SERVER['REQUEST_URI']; 
							?>

							<input type="text" name="page" value="<?php echo $link; ?>" style="display: none;">
							<input type="text" name="allmail" value="<?= trim(RichText::asText($document->all_email)); ?>" style="display: none;">
							<button>
								<span class="btn-text">
									<?= RichText::asText($document->form_button_text_1); ?>
								</span>
								<span class="btn-load"></span>
								<span class="btn-validation">
									<?= RichText::asText($document->form_button_text_2); ?>
								</span>
							</button>
						</form>
					</div>
				</div>
			</section>

		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/contact-min.js"></script>

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
	$('#section-contact .container-text .container-cover h1').addClass('elAnim__slide anim__delayMedium_2');
	$('#section-contact .container-text .container-cover p').addClass('elAnim__slide anim__delayMedium_3');
</script>

<script type="text/javascript">

	function isEmpty(el){
		return !$.trim(el.val());
	}

	function verifEmail(c) {
		let regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
		return regex.test(c.val());
	}

	function verifNumber(c) {
		c = $.trim(c.val().replace(/ /g,''));
		return $.isNumeric(c);
	}

	let stateForm = false;
	$('form').on('submit', function() {

		if(stateForm) return true;

		let returnF = true;

		$(this).find('input').each(function(){
			
			if( isEmpty($(this)) ) {
				returnF = false;
				$(this).parent().addClass('error');
				$(this).parent().parent().addClass('error');
			}
			else {
				$(this).parent().removeClass('error');
				$(this).parent().parent().removeClass('error');
			}
		})

		if(returnF) {
			$('form button').addClass('style-load');
			stateForm = true;
			setTimeout(function(){
				$('form button').removeClass('style-load').addClass('style-validation');
			}, 1600)
			setTimeout(function(){
				$('form').submit();
			}, 2000)
		}

		return false;
	})
</script>