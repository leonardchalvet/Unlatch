<?php
$document = $WPGLOBAL['document'];
	
$value = isset($_GET['value']) ? $_GET['value'] : -1;

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "https") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']; 

$linkS = explode('/', $link);
$newLink = $linkS[0] . '//' . $linkS[2] . '/' . $linkS[3] . '/blog/';

if($value != -1) {
	foreach ($document->results as $el) {

		$uid = $el->uid;
		$el = $el->data;

		$titre = $el->common_title[0]->text;

		$titre = strtoupper($titre);
		$value = strtoupper($value);
		
		if( strpos($titre, $value) !== false ) { ?>
			<a href="<?php echo $newLink.''.$el->global_categorie[0]->text.'/'.$uid; ?>">
				<?php echo $el->common_title[0]->text; ?>
			</a>
		<?php
		} 
		$i++;
	} 
}
?>