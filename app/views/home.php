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

    <link rel="stylesheet" type="text/css" href="/style/css/home.css">

    <script src="https://player.vimeo.com/api/player.js"></script>

  </head>
  
  <body>

    <?php include('common-header.php') ?>

    <?php include('common-lightbox.php') ?>

    <main>
      
      <section id="section-cover" class="sectionAnim_container">
        <div class="wrapper">
          <div class="container-text">
            <?= RichText::asHtml($document->cover_title); ?>
            <div class="sep elAnim__slide anim__delayMedium_2"></div>
            <?= RichText::asHtml($document->cover_text); ?>
            <div class="container-btn elAnim__slide anim__delayMedium_4">
              <a href="<?= $document->cover_btn_link->url; ?>">
                <span class="btn-text"><?= RichText::asText($document->cover_btn_txt); ?></span>
              </a>
            </div>
          </div>
          <div class="container-video">
            <img class="obj-1" src="/img/home/section-cover/obj-1.svg" alt="">
            <iframe src="<?= $document->cover_video->url; ?>?&background=1&mute=0" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </section>

      <section id="section-logos" class="sectionAnim_container">
        <img class="obj-1 elAnim__slide anim__delayMedium_3" src="/img/home/section-logos/obj-1.svg" alt="">
        <img class="obj-2 elAnim__slide anim__delayMedium_4" src="/img/home/section-logos/obj-2.svg" alt="">
        <img class="obj-3 elAnim__slide anim__delayMedium_5" src="/img/home/section-logos/obj-3.svg" alt="">
        <img class="obj-4 elAnim__slide anim__delayMedium_6" src="/img/home/section-logos/obj-4.svg" alt="">
        <div class="wrapper">
          <div class="container-text elAnim__slide anim__delayMedium_1">
            <?= RichText::asHtml($document->company_text); ?>
          </div>
          <div class="container-el elAnim__slide anim__delayMedium_3">
            <?php for($i=0;$i<6;$i++) { ?>
              <div class="el">
                <?php foreach ($document->company_logos as $logo) { ?>
                  <img src="<?= $logo->company_logo->url; ?>" alt="">
                <?php } ?>
              </div>
            <? } ?>
          </div>
        </div>
      </section>

      <section id="section-metier" class="sectionAnim_container">
        <div class="wrapper">
          <div class="container-text elAnim__slide anim__delayMedium_1">
            <?= RichText::asHtml($document->job_title); ?>
          </div>
          <div class="container-el">
            <?php $i = 1; 
                foreach ($document->job_jobs as $job) { ?>
              <div class="el">
                <div class="icn elAnim__slide anim__delayMedium_<?php echo ($i + 1); ?>">
                  <img src="<?= $job->job_icn_job->url; ?>" alt="">
                </div>
                <div class="text">
                  <h3 class="elAnim__slide anim__delayMedium_<?php echo ($i + 2); ?>"><?= RichText::asText($job->job_title_job); ?></h3>
                  <p class="elAnim__slide anim__delayMedium_<?php echo ($i + 3); ?>">
                    <?= RichText::asText($job->job_text_job); ?>
                  </p>
                  <a href="<?= $job->job_link_job->url; ?>" class="elAnim__slide anim__delayMedium_<?php echo ($i + 4); ?>">
                    <span class="link-text">
                      <?= RichText::asText($job->job_link_text_job); ?>
                    </span>
                    <span class="link-arrow">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                        <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                      </svg>
                    </span>
                  </a>
                </div>
              </div>
              <?php $i++; } ?>
            </div>
          </div>
        </div>
      </section>

      <section id="section-pres" class="sectionAnim_container">
        <div class="background">
          <img class="obj-1 elAnim__slide anim__delayMedium_1" src="/img/home/section-pres/obj-1.svg" alt="">
          <img class="obj-2 elAnim__slide anim__delayMedium_2" src="/img/home/section-pres/obj-2.svg" alt="">
        </div>
        <div class="wrapper">
          <div class="container-text">
            <?= RichText::asHtml($document->pres_title); ?>
            <?= RichText::asHtml($document->pres_text); ?>
            <a class="elAnim__slide anim__delayMedium_3 openLightbox">
              <span class="link-text">
                <?= RichText::asText($document->pres_link_text); ?>
              </span>
              <span class="link-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                  <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                </svg>
              </span>
            </a>
          </div>
          <div class="container-illu elAnim__sk">
            <?php if(empty($document->pres_image->url)) { ?>
              <img class="sk-1 anim__delayMedium_1" src="/img/home/section-pres/skeleton/Dashboard-List@4x.png" alt="">
              <img class="sk-2 anim__delayMedium_2" src="/img/home/section-pres/skeleton/Bank@4x.png">
              <img class="sk-3 anim__delayMedium_3" src="/img/home/section-pres/skeleton/Profil@4x.png">
              <img class="sk-4 anim__delayMedium_4" src="/img/home/section-pres/skeleton/Profil-2@4x.png">
            <?php } else { ?>
              <img class="img" src="<?= $document->pres_image->url; ?>" alt="">
            <?php } ?>
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
                <h4><?= RichText::asText($document->stats_stat[($i-1)]->stat_title); ?></h4>
                <p><?= RichText::asText($document->stats_stat[($i-1)]->stat_text); ?></p>
              </div>
              <?php
              if ( ($i % 2) == 0 ) { ?>
                  </div>
                </div>
              <?php } 
            } ?>
          </div>  
          <div class="container-btn elAnim__slide anim__delayMedium_6">
            <a href="<?= $document->stats_button_link->url; ?>">
              <span class="btn-text"><?= RichText::asText($document->stats_button); ?></span>
            </a>
          </div>
        </div>
      </section>

      <section id="section-quotes" class="sectionAnim_container">
        <div class="wrapper">
          <div class="container-img elAnim__fade anim__delayMedium_1">
            <?php foreach ($document->quotes_quotes as $quote) { ?>
              <img src="<?= $quote->quotes_photo->url; ?>" alt="">
            <?php } ?>
          </div>
          <div class="container-quotes elAnim__fade anim__delayMedium_2">
            <img class="obj-1" src="/img/common/icn-quote-white.svg" alt="">
            <div class="container-el">
              <?php foreach ($document->quotes_quotes as $quote) { ?>
                <div class="el">
                  <q>
                    <?= RichText::asText($quote->quotes_text); ?>
                  </q>
                  <div class="container-infos">
                    <div class="name"><?= RichText::asText($quote->quotes_name); ?></div>
                    <div class="job"><?= RichText::asText($quote->quotes_job); ?></div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="container-action elAnim__fade anim__delayMedium_3">
              <div class="container-link">
                <a href="<?= $document->quotes_link->url; ?>">
                  <span class="link-text">
                    <?= RichText::asText($document->quotes_link_text); ?>
                  </span>
                  <span class="link-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                      <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                    </svg>
                  </span>
                </a>
              </div>
              <div class="container-nav">
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
        </div>
      </section>

      <section id="section-features" class="sectionAnim_container">
        <div class="wrapper">
          <div class="container-text elAnim__slide anim__delayMedium_1">
            <?= RichText::asHtml($document->features_title); ?>
          </div>
          <div class="container-ftr">
            
            <div class="container-el elAnim__slide anim__delayMedium_2">
              <?php $i = 1;
                  foreach ($document->features_features as $feature) { ?>
                <div class="el <?php if($i == 1) { echo 'active'; } ?>">
                  <div class="head">
                    <h3>
                      <?= RichText::asText($feature->feature_title); ?>
                    </h3>
                  </div>
                  <div class="text">
                    <div class="container-line">
                      <div class="line"></div>
                    </div>
                    <p>
                      <?= RichText::asText($feature->feature_text_normal); ?>
                    </p>
                    <div class="container-ps">
                      <p>
                        <?= RichText::asText($feature->feature_text_bold); ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php $i++; } ?>
            </div>

            <div class="container-img elAnim__slide anim__delayMedium_3">
              <?php foreach ($document->features_features as $feature) { ?>
                <div class="img">
                  <img src="<?= $feature->feature_image->url; ?>" alt="">
                  <a href="<?= $document->feature_link->url; ?>">
                    <span class="link-text">
                      <?= RichText::asText($document->features_link_text); ?>
                    </span>
                    <span class="link-arrow">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                        <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                      </svg>
                    </span>
                  </a>
                </div>
              <?php $i++; } ?>
            </div>
          </div>
        </div>
      </section>

      <section id="common-section-banner" class="sectionAnim_container">
        <img class="obj-2" src="/img/common/section-banner/obj-2.svg" alt="">
        <img class="obj-3" src="/img/common/section-banner/obj-3.svg" alt="">
        <div class="wrapper">
          <div class="container-img elAnim__slide anim__delayMedium_1">
            <img src="<?= $document->banner_photo->url; ?>" alt="">
          </div>
          <div class="container-text">
            <?= RichText::asHtml($document->banner_title); ?>
            <a href="<?= $document->banner_button_link->url; ?>" class="elAnim__slide anim__delayMedium_3">
              <span class="btn-text"><?= RichText::asText($document->banner_buttton_text); ?></span>
            </a>
            <div class="container-infos elAnim__slide anim__delayMedium_4">
              <p><?= RichText::asText($document->banner_information); ?></p>
            </div>
          </div>
        </div>
      </section>

    </main>

    <?php include('common-footer.php') ?>

    <script type="text/javascript" src="/script/minify/index-min.js"></script>
    <script type="text/javascript">
      $('#section-cover h1').addClass('elAnim__slide anim__delayMedium_1');
      $('#section-cover p').addClass('elAnim__slide anim__delayMedium_3');
      $('#section-metier h2').addClass('elAnim__slide anim__delayMedium_1');
      $('#section-pres h2').addClass('elAnim__slide anim__delayMedium_1');
      $('#section-pres p').addClass('elAnim__slide anim__delayMedium_2');
      $('#section-features h2').addClass('elAnim__slide anim__delayMedium_1');
      $('#common-section-banner h2').addClass('elAnim__slide anim__delayMedium_2');
    </script>

  </body>
</html>