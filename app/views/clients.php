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

    <link rel="stylesheet" type="text/css" href="/style/css/clients.css">

    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff4d37">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

  </head>
  
  <body>

    <?php include('common-header.php') ?>

    <main>

      <section id="section-cover" class="sectionAnim_container">
        <div class="wrapper">
          <?= RichText::asHtml($document->cover_title); ?>
          <div class="container-text">
            <p class="elAnim__slide anim__delayMedium_2">
              <?= RichText::asText($document->cover_text); ?>
            </p>
            <div class="container-quotes elAnim__slide anim__delayMedium_3">
              <img class="obj-1 elAnim__slide anim__delayMedium_3" src="/img/common/icn-quote-white.svg" alt=""> 
              <div class="container-el elAnim__slide anim__delayMedium_5">
                <?php $i = 0;
                  foreach ($document->cover_container_quotes as $quote) { ?>
                  <div class="el <?php if($i == 0) { echo 'active'; } ?>">
                    <q>
                      <?= RichText::asText($quote->cover_quote_text); ?>
                    </q>
                  </div>
                <?php $i++; } ?>
              </div>
              <div class="container-nav elAnim__slide anim__delayMedium_6">
                <div class="nav prev">
                  <span class="link-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                      <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                    </svg>
                  </span>
                </div>
                <div class="nav next">
                  <span class="link-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                      <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="container-img elAnim__slide anim__delayMedium_4">
            <?php $i = 0;
              foreach ($document->cover_container_quotes as $quote) { ?>
              <div class="el <?php if($i == 0) { echo 'active'; } else { echo 'hide-before'; } ?>">
                <img src="<?= $quote->cover_quotes_img->url; ?>" alt="">
                <div class="container-infos">
                  <div class="name"><?= RichText::asText($quote->cover_quote_name); ?></div>
                  <div class="job"><?= RichText::asText($quote->cover_quote_job); ?></div>
                </div>
              </div>
            <?php $i++; } ?>
          </div>
        </div>
      </section>

      <section id="section-clients" class="sectionAnim_container">
        <img class="obj-1" src="/img/clients/obj-1.svg" alt="">
        <img class="obj-2" src="/img/clients/obj-2.svg" alt="">
        <div class="wrapper">
          <?= RichText::asHtml($document->clients_title); ?>
          <div class="container-el">
            <?php $i = 1;
              foreach ($document->clients_container_clients as $client) { ?>
              <div class="el elAnim__slide anim__delayMedium_<?php echo $i; ?>">
                <img src="<?= $client->client_logo->url; ?>" alt="">
                <q>
                  <?= RichText::asText($client->client_text); ?>
                </q>
                <div class="info">
                  <div class="pp">
                    <div class="img" style="background-image: url(<?= $client->client_photo->url; ?>)" alt=""></div>
                  </div>
                  <div class="col">
                    <div class="name"><?= RichText::asText($client->client_name); ?></div>
                    <div class="job"><?= RichText::asText($client->client_job); ?></div>
                  </div>
                </div>
              </div>
            <?php $i+=2; } ?>
          </div>
        </div>
      </section>

      <section id="section-logos" class="sectionAnim_container">
        <div class="wrapper">
          <div class="container-text elAnim__slide anim__delayMedium_1">
            <?= RichText::asHtml($document->logos_title); ?>
          </div>
          <div class="container-logos elAnim__slide anim__delayMedium_2">
            <img src="<?= $document->logos_img->url; ?>" alt="">
          </div>
        </div>
      </section>
      
    </main>

    <?php include('common-footer.php') ?>

    <script type="text/javascript" src="/script/minify/clients-min.js"></script>
  </body>
</html>

<script type="text/javascript">
    $('#section-cover h1').addClass('elAnim__slide anim__delayMedium_1');
    $('#section-clients h2').addClass('elAnim__slide anim__delayMedium_1');
</script>