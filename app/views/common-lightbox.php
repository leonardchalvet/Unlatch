<?php 
use Prismic\Dom\RichText;
$lightbox = $WPGLOBAL['lightbox']->data;
?>

<div class="container-lightbox">
	<div class="lightbox">
		<div class="cross">
			<div class="line"></div>
			<div class="line"></div>
		</div>
		<div class="wrapper">
			<h3>
				<?= RichText::asText($lightbox->title); ?>
			</h3>
			<p>
				<?= RichText::asText($lightbox->text); ?>
			</p>
			<form>
				<div class="input">
					<input type="text" name="email" placeholder="<?= RichText::asText($lightbox->input); ?>">
					<div class="line"></div>
				</div>
				<a class="download" href="path_to_file" download="<?= $lightbox->doc_pdf->url; ?>" style="display: none;"></a>
				<input type="text" name="email" value="<?= RichText::asText($lightbox->email); ?>" style="display: none;">
				<button>
					<span class="btn-text"><?= RichText::asText($lightbox->button_text); ?></span>
				</button>
			</form>
		</div>
	</div>
</div>