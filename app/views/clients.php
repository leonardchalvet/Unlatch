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

    <link rel="stylesheet" type="text/css" href="/style/css/clients.css">

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
            <img src="<?= $document->logos_img->url; ?>" alt="">
          </div>
        </div>
      </section>
      
    </main>

    <?php include('common-footer.php') ?>

    <script type="text/javascript" src="/script/minify/clients-min.js"></script>

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

<script type="text/javascript">
    $('#section-cover h1').addClass('elAnim__slide anim__delayMedium_1');
    $('#section-clients h2').addClass('elAnim__slide anim__delayMedium_1');
</script>