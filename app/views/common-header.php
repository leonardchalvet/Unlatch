<?php 
use Prismic\Dom\RichText;
$header = $WPGLOBAL['header']->data;
?>

<header id="header-desktop">
	<div class="head">
		<div class="wrapper">
			<a href="<?= $header->hc_logo_link->url; ?>" class="logo">
				<img src="<?= $header->hc_logo->url; ?>" alt="">
			</a>
			<ul class="container-link">
				<?php $i = 1; 
					foreach ($header->hc_links as $link) { ?>
					<li>
						<a <?php if($link->hc_link_ifdropdown == 'no') { 
									echo 'href="' .$link->hc_link->url. '"';
								 } else {
								 	echo 'class="link-'.$i.'" onclick="openDropdown(' .$i. ')"';
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

<header id="header-mobile">
	<div class="head">
		<div class="wrapper">
			<a class="logo" href="">
				<img src="<?= $header->hc_logo->url; ?>" alt="">
			</a>
			<div class="container-action">
				<div class="container-burger">
					<div class="line"></div>
					<div class="line"></div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="container-link">
		<div class="wrapper">
			<div class="list-link">
				<?php $i = 0; 
					foreach ($header->hc_links as $link) { ?>
					<div class="link">
						<a <?php if($link->hc_link_ifdropdown == 'no') { 
								echo 'href="' .$link->hc_link->url. '"'; } ?> >
							<span><?= RichText::asText($link->hc_link_text); ?></span>
							<?php if($link->hc_link_ifdropdown == 'yes') { 
								echo '<img class="arrow" src="/img/common/arrow-2.svg" alt="">'; 
							} ?>
						</a>
						<?php if($link->hc_link_ifdropdown == 'yes') { ?>
							<div class="container-el">
								<?php foreach ($header->body[$i]->items as $item) { ?>
								<a class="el" href="<?= $item->hc_dp_link->url; ?>">
									<img class="icn" src="<?= $item->hc_dp_icn->url; ?>" alt="">
									<div class="text">
										<h3><?= RichText::asText($item->hc_dp_title); ?></h3>
										<p>
											<?= RichText::asText($item->hc_dp_text); ?>
										</p>
									</div>
								</a>
								<?php } ?>
							</div>
						<?php $i++; } ?>
					</div>
				<?php } ?>
			</div>
			<div class="container-action">
				<a class="tel" href="<?= $header->hc_phone_link->url; ?>">
					<span><?= RichText::asText($header->hc_phone_number); ?></span>
				</a>
				<a class="signup" href="<?= $header->hc_button_link->url; ?>">
					<span class="btn-text"><?= RichText::asText($header->hc_button_text); ?></span>
				</a>
			</div>
		</div>
	</div>
</header>

<div id="cookies" class="hide">
	<div class="text">
		<p>
			<?= RichText::asText($header->cookies_text); ?>
		</p>
	</div>
	<div class="container-action">
		<a class="btn">
			<div class="btn-text"><?= RichText::asText($header->cookies_btn); ?></div>
		</a>
	</div>
</div>