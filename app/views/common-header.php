<?php 
use Prismic\Dom\RichText;
$header = $WPGLOBAL['header']->data;
?>

<header id="header-desktop">
	<div class="head">
		<div class="wrapper">
			<a href="./" class="logo">
				<img src="<?= $header->hc_logo->url; ?>" alt="">
			</a>
			<ul class="container-link">
				<?php $i = 1; 
					foreach ($header->hc_links as $link) { ?>
					<li>
						<a <?php if($link->hc_link_ifdropdown == 'no') { 
									echo 'href="' .$link->hc_link->url. '"';
								 } else {
								 	echo 'class="link-'.$i.'"';
								 	$i++;
								 } ?> >
							<span><?= RichText::asText($link->hc_link_text); ?></span>
							<?php if($link->hc_link_ifdropdown == 'yes') { 
								echo '<img src="/img/common/arrow-2.svg" alt="">'; 
							} ?>
						</a>
					</li>
				<?php } ?>
			</ul>
			<div class="container-action">
				<a class="tel" href="<?= $header->hc_phone_link->url; ?>"><?= RichText::asText($header->hc_phone_number); ?></a>
				<a class="demo" href="<?= $header->hc_button_link->url; ?>">
					<span class="btn-text"><?= RichText::asText($header->hc_button_text); ?></span>
				</a>
			</div>
		</div>
	</div>

	<?php
		$i = 0; 
		foreach ($header->body as $slice) { ?>

		<div class="dropdown dropdown-<?php echo ($i+1); ?>">
			<div class="wrapper">
				<ul>
					<?php foreach ($slice->items as $item) { ?>
					<li>
						<a href="">
							<div class="icn">
								<img src="<?= $item->hc_dp_icn->url; ?>" alt="">
							</div>
							<div class="text">
								<h4>
									<?= RichText::asText($item->hc_dp_title); ?>
								</h4>
								<p>
									<?= RichText::asText($item->hc_dp_text); ?>
								</p>
							</div>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	<?php
		$i++;
	} ?>
	
</header>