<?php

/*
 * This is the main file of the application, including routing and controllers.
 *
 * $app is a Slim application instance, see the framework documentation for more details:
 * http://docs.slimframework.com/
 *
 * The order of the routes matter, as it will define the priority of routes. For that reason we
 * need to keep the more "generic" routes, such as the pages route, at the end of the file.
 *
 * If you decide to change the URLs, make sure to change PrismicLinkResolver in LinkResolver.php
 * as well to make sures links in your site are correctly generated.
 */

use Prismic\Api;
use Prismic\Predicates;

require_once 'includes/http.php';

/*
 *  --[ INSERT YOUR ROUTES HERE ]--
 */

// Index page
$app->get('/', function ($request, $response) use ($app, $prismic) {

    $api = $prismic->get_api(); // PART 1 - Call api

    //PART 2 - Call Header & Footer
    $header   = $api->getByUID('header', 'header');
    $footer   = $api->getByUID('footer', 'footer');
    $lightbox = $api->getByUID('lightbox', 'lightbox');

    //PART 3 - Call home page (ask to client for default languages)
    $document = $api->getByID(''); //For get ID, print_r($document) in home views, ctrl-c [id]

    render($app, 'home', array('document' => $document, 'lightbox' => $lightbox, 'header' => $header, 'footer' => $footer));
});

// Livesearch
$app->get('/{lg}/livesearch', function ($request, $response, $args) use ($app, $prismic) {

    $api = $prismic->get_api(); // PART 1 - Call api

    //PART 2 - Select languages
    $allLang = switchLanguages($args['lg']);
    if(!$allLang) {
        header('Location: /'); // 404 or /
        exit;
    }
    $options = false;
    foreach ($allLang as $lang) {
        $testReturn = $api->getByUID('header', 'header', [ 'lang' => $lang ] );
        if($testReturn) {
            $options = [ 'lang' => $lang ];
            break;
        }
    }
    if(!$options) {
        header('Location: /404'); // 404 or /
        exit;
    }

    //PART 3 - Call Blog
    $options['pageSize'] = 9999;
    $document = $api->query(Predicates::at('document.type', 'articles'), $options);

    //PART 4 - Render the page
    render($app, 'livesearch', array('document' => $document));
});

// Call page with name => https://url.com/namepage
$app->get('/{uid}', function ($request, $response, $args) use ($app, $prismic) {
    $api = $prismic->get_api(); // PART 1 - Call api

    //PART 2 - Call Header & Footer
    $header = $api->getByUID('header', 'header');
    $footer = $api->getByUID('footer', 'footer');
    
    //PART 3 - Call current page
    $document = NULL;
    $nType = 0;
    $arrayTypes = ['']; // UPDATE NAME OF CUSTOM TYPE HERE (only if exist in CONTENT)
    $arrayView = ['']; // NAME IN "VIEWS" FOLDER, ALWAYS SAME POSITION BETWEEN "arrayTypes" & "arrayView"
    foreach ($arrayTypes as $type) {
        $document = $api->getByUID($type, $args['uid']);
        
        $nType++;
        if($document != NULL) {
            break;
        }
    }

    //PART 4 - Call good view
    if($document != NULL) {
      render($app, $arrayView[$nType-1], array('document' => $document, 'header' => $header, 'footer' => $footer));
    }
    else {
      header('Location: /'); // 404 or /
      exit;
    }
});

// Call page with language and name => https://url.com/language/namepage
$app->get('/{lg}/{uid}', function ($request, $response, $args) use ($app, $prismic) {
    $api = $prismic->get_api(); // PART 1 - Call api

    //PART 2 - Select languages
    $allLang = switchLanguages($args['lg']);
    if(!$allLang) {
        header('Location: /'); // 404 or /
        exit;
    }
    $options = false;
    foreach ($allLang as $lang) {
        $testReturn = $api->getByUID('header',   'header', [ 'lang' => $lang ] );
        if($testReturn) {
            $options = [ 'lang' => $lang ];
            break;
        }
    }
    if(!$options) {
        header('Location: /404'); // 404 or /
        exit;
    }

    //PART 3 - Call Header & Footer & Lightbox
    $header   = $api->getByUID('header',   'header',   $options);
    $footer   = $api->getByUID('footer' ,  'footer',   $options);
    $lightbox = $api->getByUID('lightbox', 'lightbox', $options);

    //PART 4 - Call current page
    $document = NULL;
    $nType = 0;
    $arrayTypes = ['home', 'blog', 'clients', 'pres', 'services', 'about', 'legal_notices', 'solutions', 'contact', 'features', 'p404']; // UPDATE NAME OF CUSTOM TYPE HERE (only if exist in CONTENT)
    $arrayView  = ['home', 'blog', 'clients', 'pres', 'services', 'about', 'legal_notices', 'solutions', 'contact', 'feature', '404']; // NAME IN "VIEWS" FOLDER, ALWAYS SAME POSITION BETWEEN "arrayTypes" & "arrayView"
    foreach ($arrayTypes as $type) {
        $document = $api->getByUID($type, $args['uid'], $options);
        $allLang = $api->getByUID($type, $args['uid'], [ 'lang' => '*' ] );
        
        $nType++;
        if($document != NULL) {
            break;
        }
    }

    //PART 5 - Call good view
    if($document != NULL) {
      if($arrayView[$nType-1] == 'blog') {
      	$options['pageSize'] = 9999;
  	  	$articles = $api->query(Predicates::at('document.type', 'articles'), $options);
  	  	
        render($app, $arrayView[$nType-1], array('document' => $document, 'articles' => $articles, 'header' => $header, 'footer' => $footer, 'lightbox' => $lightbox));
      }
      else {
      	render($app, $arrayView[$nType-1], array('document' => $document, 'header' => $header, 'footer' => $footer, 'lightbox' => $lightbox));
      }
    }
    else {
      //header('Location: /'); // 404 or /
      header('Location: /'.$args['lg'].'/404'); // 404 or /
      exit;
    }
});

// Call page with language and categorie/author and name => https://url.com/language/cta
$app->get('/{lg}/blog/{cta}', function ($request, $response, $args) use ($app, $prismic) {

    $api = $prismic->get_api(); // PART 1 - Call api

    //PART 2 - Select languages
    $allLang = switchLanguages($args['lg']);
    if(!$allLang) {
        header('Location: /'); // 404 or /
        exit;
    }
    $options = false;
    foreach ($allLang as $lang) {
        $testReturn = $api->getByUID('header',   'header', [ 'lang' => $lang ] );
        if($testReturn) {
            $options = [ 'lang' => $lang ];
            break;
        }
    }
    if(!$options) {
        header('Location: /404'); // 404 or /
        exit;
    }

    //PART 3 - Call Header & Footer & Lightbox
    $header   = $api->getByUID('header',   'header',   $options);
    $footer   = $api->getByUID('footer' ,  'footer',   $options);
    $lightbox = $api->getByUID('lightbox', 'lightbox', $options);

    //PART 4 - Call Blog
    $document = $api->query(Predicates::at('document.type', 'blog'), $options);

    //PART 5 - Call Articles
    $options['pageSize'] = 9999;
    $articles = $api->query(Predicates::at('document.type', 'articles'), $options);

    if($document == NULL && $articles == NULL) {
        header('Location: /'.$args['lg'].'/404'); // 404 or /
        exit;
    }

    //PART 6 - Check CTA => categories/authors
    $cta = skip_accents(trim(strtolower($args['cta'])));
    
    $bool = false;
    foreach ($document->results[0]->data->container_categories as $categorie) {
        $categorie = skip_accents(trim(strtolower($categorie->categorie_name_page[0]->text)));

        if($cta == $categorie) {
            $bool = true;
            render($app, 'blog_categories', array('document' => $document, 'articles' => $articles, 'header' => $header, 'footer' => $footer, 'lightbox' => $lightbox, 'cta' => $cta));
        }
    }

    foreach ($document->results[0]->data->container_authors as $author) {
        $author = skip_accents(trim(strtolower($author->author_name_page[0]->text)));

        if($cta == $author) {
            $bool = true;
            render($app, 'blog_author', array('document' => $document, 'articles' => $articles, 'header' => $header, 'footer' => $footer, 'lightbox' => $lightbox, 'cta' => $cta));
        }
    }

    if(!$bool) {
        header('Location: /'.$args['lg'].'/404'); // 404 or /
        exit;
    }
});

// Call page with language and categorie and name => https://url.com/language/cta/namepage
$app->get('/{lg}/{blog}/{ct}/{uid}', function ($request, $response, $args) use ($app, $prismic) {

    $api = $prismic->get_api(); // PART 1 - Call api

    //PART 2 - Select languages
    $allLang = switchLanguages($args['lg']);
    if(!$allLang) {
        header('Location: /'); // 404 or /
        exit;
    }
    $options = false;
    foreach ($allLang as $lang) {
        $testReturn = $api->getByUID('header',   'header', [ 'lang' => $lang ] );
        if($testReturn) {
            $options = [ 'lang' => $lang ];
            break;
        }
    }
    if(!$options) {
        header('Location: /404'); // 404 or /
        exit;
    }

    //PART 3 - Call Header & Footer & Lightbox
    $header   = $api->getByUID('header',   'header',   $options);
    $footer   = $api->getByUID('footer' ,  'footer',   $options);
    $lightbox = $api->getByUID('lightbox', 'lightbox', $options);

    // PART 4 - Call article with name & blog
    $document = $api->getByUID('articles', $args['uid'], $options);
    $blog     = $api->query(Predicates::at('document.type', 'blog'), $options);

    //PART 5 - Call Articles
    $options['pageSize'] = 4;
    $articles = $api->query(Predicates::at('document.type', 'articles'), $options);

    if($document == NULL && $articles == NULL) {
        header('Location: /'.$args['lg'].'/404'); // 404 or /
        exit;
    }

    //PART 6 - Check CT => categories URL / Check CTD => categories DOCUMENT
    $ct = skip_accents(trim(strtolower($args['ct'])));
    $ctD = $document->data->global_categorie[0]->text;
    
    $bool = false;
    foreach ($blog->results[0]->data->container_categories as $categorie) {
        $categorie = skip_accents(trim(strtolower($categorie->categorie_name_page[0]->text)));

        if($ct == $categorie && $ctD == $categorie) {
            $bool = true;
            render($app, 'articles', array('document' => $document, 'articles' => $articles, 'header' => $header, 'footer' => $footer, 'lightbox' => $lightbox, 'cta' => $cta));
        }
    }

    if(!$bool) {
        header('Location: /'.$args['lg'].'/404'); // 404 or /
        exit;
    }
});

//ADD LANGUAGES FOR MORE POSSIBILITIES
function switchLanguages($lg) {

    $lglg = '';
    switch (strtoupper($lg)) {

        case 'FR': return [ 'fr-fr', 'fr-be', 'fr-ca', 'fr-lu', 'fr-ch' ];
        case 'EN': return [ 'en-us', 'en-au', 'en-eu', 'en-bz', 'en-ca', 'en-de', 'en-gb', 'en-in', 'en-ie', 'en-jm', 'en-nz', 'en-ph', 'en-pl', 'en-za', 'en-tt' ];
        case 'US': return [ 'en-us', 'en-au', 'en-eu', 'en-bz', 'en-ca', 'en-de', 'en-gb', 'en-in', 'en-ie', 'en-jm', 'en-nz', 'en-ph', 'en-pl', 'en-za', 'en-tt' ];
        case 'DE': return [ 'de-at', 'de-de', 'de-li', 'de-lu', 'de-ch' ];
        case 'ES': return [ 'es-ar', 'es-bo', 'es-cl', 'es-co', 'es-cr', 'es-do', 'es-ec', 'es-sv', 'es-gt', 'es-hn', 'es-mx', 'es-ni', 'es-pa', 'es-py', 'es-pe', 'es-pr', 'es-es', 'es-uy', 'es-ve' ];
        case 'IT': return [ 'it-it', 'it-ch' ];
        case 'JP': return [ 'ja-jp' ];
        
        default: return false;
    }

    //return [ 'lang' => $lglg ];
}

//REMOVE ACCENTS
function skip_accents( $str, $charset='utf-8' ) {
    $str = htmlentities( $str, ENT_NOQUOTES, $charset );
    $str = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );
    $str = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $str );
    $str = preg_replace( '#&[^;]+;#', '', $str );
    return $str;
}