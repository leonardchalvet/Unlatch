<?php 
use Prismic\Dom\RichText;
$document = $WPGLOBAL['document']->data;

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
          "https" : "https") . "://" . $_SERVER['HTTP_HOST'] .  
          $_SERVER['REQUEST_URI'];

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

    <link rel="stylesheet" type="text/css"      href="/style/css/home.css"  >

    <link rel="canonical" href="<?php echo $link; ?>" >
    <?php foreach ($WPGLOBAL['allUrl'] as $url) { 

      $hrefS = explode('/', $link);
      $newHref = $hrefS[0] . '//' . $hrefS[2] . '/';

      ?>

      <link rel="alternate" hreflang="<?php echo $url['lang']; ?>" href="<?php echo $newHref . invertSwitchLanguage($url['lang']) . '/' . $url['url']; ?>" >

      <?php if($url['lang'] == 'fr-fr') { ?>
        <link rel="alternate" hreflang="x-default" href="<?php echo $newHref . 'fr/' . $url['url']; ?>" >
      <?php } ?>

      <?php if($url['lang'] == 'en-gb') { ?>
        <link rel="alternate" hreflang="en-us" href="<?php echo $newHref . 'en/' . $url['url']; ?>" >
      <?php } ?>

    <?php } ?>

    <script src="https://player.vimeo.com/api/player.js"></script>

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
                <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1118217&conversionId=1434073&fmt=gif" />
              </a>
            </div>
          </div>
          <div class="container-video">
            <img class="obj-1" src="/img/home/section-cover/obj-1.svg" alt="">
            <img class="obj-1-mobile" src="/img/home/section-cover/obj-1-mobile.svg" alt="">
            <iframe src="<?= $document->cover_video->url; ?>?&controls=0&background=1" frameborder="0" allowfullscreen></iframe>
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
                  <p class="wrapLine">
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
            <a class="elAnim__slide anim__delayMedium_6 openLightbox">
              <span class="link-text">
                <?= RichText::asText($document->pres_link_text); ?>
              </span>
              <span class="link-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                  <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                </svg>
              </span>
              <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1118217&conversionId=1434081&fmt=gif" />
            </a>
          </div>
          <div class="container-illu elAnim__sk">
            <?php if($document->pres_iskeleton == 'yes') { ?>
              <img class="sk-1" src="<?= $document->pres_img_1->url; ?>" alt="">
              <img class="sk-2" src="<?= $document->pres_img_2->url; ?>" alt="">
              <img class="sk-3" src="<?= $document->pres_img_3->url; ?>" alt="">
              <img class="sk-4" src="<?= $document->pres_img_4->url; ?>" alt="">
            <?php } else { ?>
              <img class="img" src="<?= $document->pres_img_1->url; ?>" alt="">
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
                <p class="wrapLine"><?= RichText::asText($document->stats_stat[($i-1)]->stat_text); ?></p>
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
              <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1118217&conversionId=1434073&fmt=gif" />
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
            <div class="container-progressbar">
              <div class="bar"></div>
            </div>
          </div>
          <div class="container-quotes elAnim__fade anim__delayMedium_2">
            <img class="obj-1" src="/img/common/icn-quote-white.svg" alt="">
            <div class="container-el">
              <?php foreach ($document->quotes_quotes as $quote) { ?>
                <div class="el">
                  <div class="quote">
                    <q class="wrapLine">
                      <?= RichText::asText($quote->quotes_text); ?>
                    </q>
                  </div>
                  <div class="container-infos elAnim__slide anim__delayMedium_4">
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
                  <a class="openLightbox">
                    <span class="link-text">
                      <?= RichText::asText($document->features_link_text); ?>
                    </span>
                    <span class="link-arrow">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 13">
                        <use xlink:href="/img/common/arrow-1.svg#arrow-1"></use>
                      </svg>
                    </span>
                    <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1118217&conversionId=1434081&fmt=gif" />
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
            <div class="container-btn elAnim__slide anim__delayMedium_3">
              <a href="<?= $document->banner_button_link->url; ?>" >
                <span class="btn-text"><?= RichText::asText($document->banner_buttton_text); ?></span>
                <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1118217&conversionId=1434073&fmt=gif" />
              </a>
            </div>
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
      $('#section-cover h1').addClass('wrapLine');
      $('#section-cover p').addClass('wrapLine');
      $('#section-metier h2').addClass('elAnim__slide anim__delayMedium_1');
      $('#section-pres h2').addClass('elAnim__slide anim__delayMedium_1 wrapLine');
      $('#section-pres p').addClass('elAnim__slide anim__delayMedium_2 wrapLine');
      $('#section-features h2').addClass('elAnim__slide anim__delayMedium_1');
      $('#common-section-banner h2').addClass('elAnim__slide anim__delayMedium_2');
    </script>

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