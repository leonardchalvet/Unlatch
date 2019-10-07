<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;
?>
<html>
  <head>

    <title><?= RichText::asText($document->global_title); ?></title>

    <meta name="description" content="<?= RichText::asText($document->global_description); ?>" />

		<meta http-equiv="content-type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="/style/css/contact.css">

	</head>
	
	<body>

		<main>

			<section id="section-contact" class="sectionAnim_container">
				<div class="wrapper">
					<div class="header">
						<a href="<?= $document->content_logo_link->url; ?>" class="logo">
							<img src="<?= $document->content_logo->url; ?>" alt="">
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
								<span class="btn-text"><?= RichText::asText($document->form_button_text); ?></span>
							</button>
						</form>
					</div>
				</div>
			</section>

		</main>

		<?php include('common-footer.php') ?>

		<script type="text/javascript" src="/script/minify/contact-min.js"></script>
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
			$('form button').addClass('active');
			stateForm = true;
			setTimeout(function(){
				$('form').submit();
			}, 500)
		}

		return false;
	})
</script>