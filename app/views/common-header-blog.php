<?php 
use Prismic\Dom\RichText;
$header = $WPGLOBAL['header']->data;
?>

<header id="header-blog-desktop" class="header-blog">
	<div class="wrapper">
		<a class="logo" href="<?= $header->hb_logo_link->url; ?>">
			<img src="<?= $header->hb_logo->url; ?>" alt="">
			<div class="bdg">
				<span>blog</span>
			</div>
		</a>
		<div class="container-link">
			<?php foreach ($header->hb_links as $link) { ?>
				<a href="<?= $link->hb_link->url; ?>">
					<?= RichText::asText($link->hb_link_text); ?>
				</a>
			<?php } ?>
			
			<div class="search">
				<div class="container-input">
					<input type="text" placeholder="<?= RichText::asText($header->hb_search); ?>">
					<img src="/img/common/search.svg" alt="">
				</div>
				<div class="dropdown"></div>
			</div>
		</div>
		<a href="<?= $header->hb_button_link->url; ?>" class="btn">
			<span class="btn-text">
				<?= RichText::asText($header->hb_button_text); ?>
			</span>
		</a>
	</div>
</header>

<header id="header-blog-mobile" class="header-blog">
	<div class="head">
		<div class="wrapper">
			<a class="logo" href="<?= $header->hb_logo_link->url; ?>">
				<img src="<?= $header->hb_logo->url; ?>" alt="">
				<div class="bdg">
					<span>blog</span>
				</div>
			</a>
			<div class="container-action">
				<div class="burger">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-link">
		<div class="wrapper">
			<div class="search">
				<div class="container-input">
					<input type="text" placeholder="<?= RichText::asText($header->hb_search); ?>">
					<img src="/img/common/search.svg" alt="">
				</div>
				<div class="dropdown"></div>
			</div>
			<?php foreach ($header->hb_links as $link) { ?>
				<a href="<?= $link->hb_link->url; ?>">
					<?= RichText::asText($link->hb_link_text); ?>
				</a>
			<?php } ?>
			<div class="container-btn">
				<a class="btn" href="<?= $header->hb_button_link->url; ?>">
					<span class="btn-text"><?= RichText::asText($header->hb_button_text); ?></span>
				</a>
			</div>
		</div>
	</div>
</header>