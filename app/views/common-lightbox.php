<?php 
use Prismic\Dom\RichText;
$lightbox = $WPGLOBAL['lightbox']->data;

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']; 
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
			<form method="post" action="/sendlightbox.php" <?php if(isset($_GET['valid'])) { echo 'class="valid"'; } ?>>
				<div class="input">
					<input type="text" name="email" placeholder="<?= RichText::asText($lightbox->input); ?>">
					<div class="line"></div>
				</div>
				<input type="text" name="page" value="<?php echo $link; ?>" style="display: none;">
				<input type="text" name="allmail" value="<?= trim(RichText::asText($lightbox->email)); ?>" style="display: none;">
				<button>
					<span class="btn-text"><?= RichText::asText($lightbox->button_text); ?></span>
				</button>
			</form>
			<a class="download" href="<?= $lightbox->doc_pdf->url; ?>" style="display: none;"></a>
		</div>
	</div>
</div>

<script type="text/javascript">

	function defer(method) {
	    if (window.jQuery) {
	        method();
	    } else {
	        setTimeout(function() { defer(method) }, 50);
	    }
	}
	defer(method);

	function method() {
		$(document).ready(function(){
			let url = window.location.href;
			let urlS = url.split('/');
			history.pushState({ path: this.path }, '', url.split('?')[0]);

			$('.container-lightbox .lightbox a.download').click(function(){
				window.open($('.container-lightbox .lightbox a.download').attr('href'), '_blank');
			})

			if($('.container-lightbox form').hasClass('valid')) {
				$('.container-lightbox .lightbox a.download').click();
			}

			function isEmpty(el){
				return !$.trim(el.val());
			}

			let stateForm = false;
			$('.container-lightbox form').on('submit', function() {

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
					stateForm = true;
					setTimeout(function(){
						$('form').submit();
					}, 500)
				}

				return false;
			})
		})
	}
</script>