<?php
echo "<!doctype html>
<html xmlns:og='http://opengraphprotocol.org/schema/' xmlns:fb='http://www.facebook.com/2008/fbml' lang='en-CA'  >
  <head>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<!-- META-->";

	require_once __DIR__.'/tsv-to-array.inc.php';
	$file = __DIR__.'/SITE.tsv';
	$data = tsv_to_array($file, array('header_row'=>true, 'remove_header_row'=>true));
parse_str(implode('&', array_slice($argv, 1)), $_GET);

$DESCRIPTION=$data[2]["DESCRIPTION"];
$SHORTCUTICON=$data[2]["SHORTCUTICON"];
$CANONICALURL=$data[2]["CANONICALURL"];
$FB=$data[2]["FB"];
$SITE_NAME=$data[2]["SITE_NAME"];
$INSTA=$data[2]["INSTA"];

$file = __DIR__.'/ARTICLES.tsv';
$data = tsv_to_array($file, array('header_row'=>true, 'remove_header_row'=>true));

$ARTICLE_ID=$_GET['article_id'];
$file = "articles/$ARTICLE_ID/body.draft";
for ($i=2; $i<sizeof($data); $i++){
	$item=$data[$i];
	if ($item["ARTICLE_ID"]==$ARTICLE_ID){

		$ARTICLE_NAME=$item["ARTICLE_NAME"];

		$ARTICLE_TITLE=$item["ARTICLE_TITLE"];
		$BYLINE=$item["BYLINE"];
		$AUTHOR_IDS=$item["AUTHOR_IDS"];
	}
}
$ABOUT_AUTHOR="Abt author" ;/* $item["ABOUT_AUTHOR"];*/

$contents = file($file);
$PARAGRAPHS_OF_ARTICLE=implode("<br>", $contents);

$FEATURES_CONTAINER_MENU_NAV=implode("",file("FEATURES_MENU_NAV.html"));
$MAGAZINE_MENU_NAV=implode("",file("MAGAZINE_MENU_NAV.html"));
$CONTAINER_MENU_NAV=implode("",file("CONTAINER_MENU_NAV.html"));
$FEATURES_MENU_NAV=implode("",file("FEATURES_MENU_NAV.html"));



	echo "
	<base href=''>
	<meta charset='utf-8' />
	<title>$ARTICLE_NAME</title>
	<link rel='shortcut icon' type='image/x-icon' href='$SHORTCUTICON'/>
	<link rel='canonical' href='$CANONICALURL'/>
	<meta property='og:site_name' content='$SITE_NAME'/>
	<meta property='og:title' content='$SITE_NAME'/>
	<meta property='og:url' content='$CANONICALURL'/>
	<meta property='og:type' content='website'/>
	<meta property='og:description' content='$DESCRIPTION'/>
	<meta itemprop='name' content='$SITE_NAME'/>
	<meta itemprop='url' content='$CANONICALURL'/>
	<meta itemprop='description' content='$DESCRIPTION'/>
	<meta name='twitter:title' content='$SITE_NAME'/>
	<meta name='twitter:url' content='$CANONICALURL'/>
	<meta name='twitter:card' content='summary'/>
	<meta name='twitter:description' content=$DESCRIPTION'/>
	<meta name='description' content='$DESCRIPTION' />";

echo "<!----META-------------->
	  <!--format-->
<script type='text/javascript' src='//use.typekit.net/ik/AKzFMQTRZ5PWQ6bDEmmgv7liHgEP-t-LlYOthd0x0twfeTSIfFHN4UJLFRbh52jhWDjDFQZqwRqkwhbajAm8Feb3jcBRF2qX5g7VMkG0jAFu-WsoShFGZAsude80ZkoRdhXCHKoyjamTiY8Djhy8ZYmC-Ao1Oco8if37OcBDOcu8OfG0ZhUzjcBCdYqlScNziemqO1FUiABkZWF3jAF8OcFzdP37O1FUiABkZWF3jAF8ShFGZAsude80ZkoRdhXCjAFu-WsoShFGZAsude80ZkoRdhXCjAFu-WsoShFGZAsude80Zko0ZWbCjWw0dA9CZhUzjcBCdYqlScNziemqO1FUiABkZWF3jAF8OcFzdPU1deNKjAUCpW4zdas8ZfoRdhXCdeNRjAUGdaFXOYFUiABkZWF3jAF8ShFGZAsude80ZkoRdhXCiaiaOcBRiA8XpWFR-emqiAUTdcS0jhNlOYiaikoyjamTiY8Djhy8ZYmC-Ao1Oco8ifUaiaS0jWw0dA9CiaiaOciCdh4ydeUoOW4zdas8ZfoDSWmyScmDSeBRZPoRdhXCiaiaOciCdh4ydeUoScNziemqOcFzdPUaiaS0SaBujW48SagyjhmDjhy8ZYmC-Ao1OcFzdPJH-hm3demkOWFXZfG4f4BFIMMjMkMfH6qJR9XbMg6IJMJ7fbKPQsMMeM96MKG4fJNFIMMjgkMfH6qJKYJbMg6FJMJ7fbK5QsMMeMt6MKG4f4gFIMMjIPMfqMei7ZKig6.js'></script>
	  <style type='text/css'>@font-face{font-family:kepler-std;src:url(https://use.typekit.net/af/b795d0/000000000000000000013142/27/l?subset_id=2&fvd=n3&v=3) format('woff2'),url(https://use.typekit.net/af/b795d0/000000000000000000013142/27/d?subset_id=2&fvd=n3&v=3) format('woff'),url(https://use.typekit.net/af/b795d0/000000000000000000013142/27/a?subset_id=2&fvd=n3&v=3) format('opentype');font-weight:300;font-style:normal;font-stretch:normal;font-display:auto;}@font-face{font-family:kepler-std;src:url(https://use.typekit.net/af/de0ac1/000000000000000000013146/27/l?subset_id=2&fvd=n4&v=3) format('woff2'),url(https://use.typekit.net/af/de0ac1/000000000000000000013146/27/d?subset_id=2&fvd=n4&v=3) format('woff'),url(https://use.typekit.net/af/de0ac1/000000000000000000013146/27/a?subset_id=2&fvd=n4&v=3) format('opentype');font-weight:400;font-style:normal;font-stretch:normal;font-display:auto;}@font-face{font-family:kepler-std;src:url(https://use.typekit.net/af/4337b5/000000000000000000013144/27/l?subset_id=2&fvd=n5&v=3) format('woff2'),url(https://use.typekit.net/af/4337b5/000000000000000000013144/27/d?subset_id=2&fvd=n5&v=3) format('woff'),url(https://use.typekit.net/af/4337b5/000000000000000000013144/27/a?subset_id=2&fvd=n5&v=3) format('opentype');font-weight:500;font-style:normal;font-stretch:normal;font-display:auto;}@font-face{font-family:kepler-std;src:url(https://use.typekit.net/af/3f55d3/00000000000000000001313f/27/l?subset_id=2&fvd=n7&v=3) format('woff2'),url(https://use.typekit.net/af/3f55d3/00000000000000000001313f/27/d?subset_id=2&fvd=n7&v=3) format('woff'),url(https://use.typekit.net/af/3f55d3/00000000000000000001313f/27/a?subset_id=2&fvd=n7&v=3) format('opentype');font-weight:700;font-style:normal;font-stretch:normal;font-display:auto;}@font-face{font-family:kepler-std;src:url(https://use.typekit.net/af/304385/000000000000000000013143/27/l?subset_id=2&fvd=i3&v=3) format('woff2'),url(https://use.typekit.net/af/304385/000000000000000000013143/27/d?subset_id=2&fvd=i3&v=3) format('woff'),url(https://use.typekit.net/af/304385/000000000000000000013143/27/a?subset_id=2&fvd=i3&v=3) format('opentype');font-weight:300;font-style:italic;font-stretch:normal;font-display:auto;}@font-face{font-family:kepler-std;src:url(https://use.typekit.net/af/d0cd82/000000000000000000013141/27/l?subset_id=2&fvd=i4&v=3) format('woff2'),url(https://use.typekit.net/af/d0cd82/000000000000000000013141/27/d?subset_id=2&fvd=i4&v=3) format('woff'),url(https://use.typekit.net/af/d0cd82/000000000000000000013141/27/a?subset_id=2&fvd=i4&v=3) format('opentype');font-weight:400;font-style:italic;font-stretch:normal;font-display:auto;}@font-face{font-family:kepler-std;src:url(https://use.typekit.net/af/2c86cd/000000000000000000013140/27/l?subset_id=2&fvd=i7&v=3) format('woff2'),url(https://use.typekit.net/af/2c86cd/000000000000000000013140/27/d?subset_id=2&fvd=i7&v=3) format('woff'),url(https://use.typekit.net/af/2c86cd/000000000000000000013140/27/a?subset_id=2&fvd=i7&v=3) format('opentype');font-weight:700;font-style:italic;font-stretch:normal;font-display:auto;}</style>


	  <script type='text/javascript'>try{Typekit.load();}catch(e){}</script>
	  <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,700;1,300;1,700'>
	  <script type='text/javascript' crossorigin='anonymous' defer='defer' nomodule='nomodule' src='//assets.squarespace.com/@sqs/polyfiller/1.6/legacy.js'></script>
	  <script type='text/javascript' crossorigin='anonymous' defer='defer' src='//assets.squarespace.com/@sqs/polyfiller/1.6/modern.js'></script>
	  <link rel='stylesheet' type='text/css' href='../../site.css'>












	  <!--------formAT-------->
      <script>
        window.__INITIAL_SQUARESPACE_7_1_WEBSITE_COLORS__ = [{'id':'white','value':{'values':{'hue':0.0,'saturation':0.0,'lightness':100.0},'userFormat':'hex'}},{'id':'black','value':{'values':{'hue':0.0,'saturation':0.0,'lightness':0.0},'userFormat':'hex'}},{'id':'safeLightAccent','value':{'values':{'hue':42.86,'saturation':3.8699999999999997,'lightness':64.51},'userFormat':'hex'}},{'id':'safeDarkAccent','value':{'values':{'hue':42.86,'saturation':3.8699999999999997,'lightness':64.51},'userFormat':'hex'}},{'id':'safeInverseAccent','value':{'values':{'hue':0.0,'saturation':0.0,'lightness':100.0},'userFormat':'hex'}},{'id':'safeInverseLightAccent','value':{'values':{'hue':0.0,'saturation':0.0,'lightness':100.0},'userFormat':'hex'}},{'id':'safeInverseDarkAccent','value':{'values':{'hue':0.0,'saturation':0.0,'lightness':100.0},'userFormat':'hex'}},{'id':'accent','value':{'values':{'hue':42.86,'saturation':3.8699999999999997,'lightness':64.51},'userFormat':'hex'}},{'id':'lightAccent','value':{'values':{'hue':0.0,'saturation':0.0,'lightness':100.0},'userFormat':'rgb'}},{'id':'darkAccent','value':{'values':{'hue':240.0,'saturation':2.61,'lightness':22.55},'userFormat':'hex'}}];
      </script>

      <style id='colorThemeStyles'>
        :root {--white-hsl:0,0%,100%;--black-hsl:0,0%,0%;--safeLightAccent-hsl:42.86,3.8699999999999997%,64.51%;--safeDarkAccent-hsl:42.86,3.8699999999999997%,64.51%;--safeInverseAccent-hsl:0,0%,100%;--safeInverseLightAccent-hsl:0,0%,100%;--safeInverseDarkAccent-hsl:0,0%,100%;--accent-hsl:42.86,3.8699999999999997%,64.51%;--lightAccent-hsl:0,0%,100%;--darkAccent-hsl:240,2.61%,22.55%;}
        .white {--announcement-bar-background-color:hsla(var(--black-hsl),1);--announcement-bar-text-color:hsla(var(--white-hsl),1);--backgroundOverlayColor:hsla(var(--white-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeDarkAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--course-item-nav-background-color:hsla(var(--lightAccent-hsl),1);--course-item-nav-border-color:hsla(var(--safeInverseLightAccent-hsl),0.25);--course-item-nav-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--course-list-course-item-background:hsla(var(--lightAccent-hsl),1);--course-list-course-item-hover-background:hsla(var(--lightAccent-hsl),0.75);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--black-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--black-hsl),1);--headingLargeColor:hsla(var(--black-hsl),1);--headingLinkColor:hsla(var(--safeDarkAccent-hsl),1);--headingMediumColor:hsla(var(--black-hsl),1);--headingSmallColor:hsla(var(--black-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--white-hsl),0);--image-block-card-image-title-color:hsla(var(--black-hsl),1);--image-block-card-inline-link-color:hsla(var(--black-hsl),1);--image-block-collage-background-color:hsla(var(--lightAccent-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--white-hsl),0);--image-block-collage-image-title-color:hsla(var(--black-hsl),1);--image-block-collage-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--white-hsl),1);--image-block-overlap-image-title-color:hsla(var(--black-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--white-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--white-hsl),0);--image-block-stack-image-title-color:hsla(var(--black-hsl),1);--image-block-stack-inline-link-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--lightAccent-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--black-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--lightAccent-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--black-hsl),1);--list-section-carousel-description-color:hsla(var(--black-hsl),1);--list-section-carousel-title-color:hsla(var(--black-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--lightAccent-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--black-hsl),1);--list-section-simple-description-color:hsla(var(--black-hsl),1);--list-section-simple-title-color:hsla(var(--black-hsl),1);--list-section-title-color:hsla(var(--black-hsl),1);--menuOverlayBackgroundColor:hsla(var(--white-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--black-hsl),1);--navigationLinkColor:hsla(var(--black-hsl),1);--paragraphLargeColor:hsla(var(--black-hsl),1);--paragraphLinkColor:hsla(var(--safeDarkAccent-hsl),1);--paragraphMediumColor:hsla(var(--black-hsl),1);--paragraphSmallColor:hsla(var(--black-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--black-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--white-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--black-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--black-hsl),1);--portfolio-hover-static-title-color:hsla(var(--black-hsl),1);--portfolio-index-background-title-color:hsla(var(--black-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeDarkAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--lightAccent-hsl),1);--shape-block-dropshadow-color:hsla(var(--lightAccent-hsl),1);--siteBackgroundColor:hsla(var(--white-hsl),1);--siteTitleColor:hsla(var(--black-hsl),1);--social-links-block-main-icon-color:hsla(var(--black-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--white-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--black-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--text-highlight-color:hsla(var(--safeDarkAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--black-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--black-hsl),1);--tweak-blog-item-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-blog-item-title-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--black-hsl),1);--tweak-content-link-block-title-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-form-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--black-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-description-color:hsla(var(--black-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-option-color:hsla(var(--black-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-title-color:hsla(var(--black-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--white-hsl),1);--tweak-gallery-icon-color:hsla(var(--black-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--white-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--black-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--black-hsl),1);--tweak-line-block-line-color:hsla(var(--black-hsl),1);--tweak-marquee-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--black-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--black-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--black-hsl),1);--tweak-menu-block-nav-color:hsla(var(--black-hsl),1);--tweak-menu-block-title-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-quote-block-source-color:hsla(var(--black-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--black-hsl),1);--tweak-quote-block-text-color:hsla(var(--black-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--black-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-title-color:hsla(var(--black-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-text-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-video-item-description-color:hsla(var(--black-hsl),1);--tweak-video-item-meta-color:hsla(var(--black-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-video-item-title-color:hsla(var(--black-hsl),1);--video-grid-basic-description-color:hsla(var(--black-hsl),1);--video-grid-basic-meta-color:hsla(var(--black-hsl),1);--video-grid-basic-title-color:hsla(var(--black-hsl),1);--video-grid-category-nav-color:hsla(var(--black-hsl),1);}.white-bold {--announcement-bar-background-color:hsla(var(--accent-hsl),1);--announcement-bar-text-color:hsla(var(--safeInverseAccent-hsl),1);--backgroundOverlayColor:hsla(var(--white-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeDarkAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--course-item-nav-background-color:hsla(var(--white-hsl),1);--course-item-nav-border-color:hsla(var(--black-hsl),0.25);--course-item-nav-text-color:hsla(var(--black-hsl),1);--course-list-course-item-background:hsla(var(--lightAccent-hsl),1);--course-list-course-item-hover-background:hsla(var(--lightAccent-hsl),0.75);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--safeDarkAccent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--safeDarkAccent-hsl),1);--headingLargeColor:hsla(var(--safeDarkAccent-hsl),1);--headingLinkColor:hsla(var(--safeDarkAccent-hsl),1);--headingMediumColor:hsla(var(--safeDarkAccent-hsl),1);--headingSmallColor:hsla(var(--safeDarkAccent-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--white-hsl),0);--image-block-card-image-title-color:hsla(var(--black-hsl),1);--image-block-card-inline-link-color:hsla(var(--black-hsl),1);--image-block-collage-background-color:hsla(var(--lightAccent-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--white-hsl),0);--image-block-collage-image-title-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-inline-link-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--white-hsl),1);--image-block-overlap-image-title-color:hsla(var(--black-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--white-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--white-hsl),0);--image-block-stack-image-title-color:hsla(var(--black-hsl),1);--image-block-stack-inline-link-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--lightAccent-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--lightAccent-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-description-color:hsla(var(--black-hsl),1);--list-section-carousel-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--lightAccent-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-description-color:hsla(var(--black-hsl),1);--list-section-simple-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-title-color:hsla(var(--safeDarkAccent-hsl),1);--menuOverlayBackgroundColor:hsla(var(--white-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--black-hsl),1);--navigationLinkColor:hsla(var(--black-hsl),1);--paragraphLargeColor:hsla(var(--black-hsl),1);--paragraphLinkColor:hsla(var(--safeDarkAccent-hsl),1);--paragraphMediumColor:hsla(var(--black-hsl),1);--paragraphSmallColor:hsla(var(--black-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--safeDarkAccent-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--white-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--black-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--safeDarkAccent-hsl),1);--portfolio-hover-static-title-color:hsla(var(--safeDarkAccent-hsl),1);--portfolio-index-background-title-color:hsla(var(--black-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeDarkAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--lightAccent-hsl),1);--shape-block-dropshadow-color:hsla(var(--lightAccent-hsl),1);--siteBackgroundColor:hsla(var(--white-hsl),1);--siteTitleColor:hsla(var(--safeDarkAccent-hsl),1);--social-links-block-main-icon-color:hsla(var(--black-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--white-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--black-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--text-highlight-color:hsla(var(--safeDarkAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--black-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--black-hsl),1);--tweak-blog-item-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-blog-item-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-content-link-block-title-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-form-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--black-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-description-color:hsla(var(--black-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-option-color:hsla(var(--black-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-title-color:hsla(var(--black-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--white-hsl),1);--tweak-gallery-icon-color:hsla(var(--black-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--white-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--black-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-line-block-line-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--black-hsl),1);--tweak-menu-block-nav-color:hsla(var(--black-hsl),1);--tweak-menu-block-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-quote-block-source-color:hsla(var(--black-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-quote-block-text-color:hsla(var(--black-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--black-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-title-color:hsla(var(--black-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-text-block-background-color:hsla(var(--lightAccent-hsl),1);--tweak-video-item-description-color:hsla(var(--accent-hsl),1);--tweak-video-item-meta-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-video-item-title-color:hsla(var(--accent-hsl),1);--video-grid-basic-description-color:hsla(var(--accent-hsl),1);--video-grid-basic-meta-color:hsla(var(--accent-hsl),1);--video-grid-basic-title-color:hsla(var(--accent-hsl),1);--video-grid-category-nav-color:hsla(var(--accent-hsl),1);}:root {--announcement-bar-background-color:hsla(var(--darkAccent-hsl),1);--announcement-bar-text-color:hsla(var(--white-hsl),1);--backgroundOverlayColor:hsla(var(--lightAccent-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeDarkAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--course-item-nav-background-color:hsla(var(--white-hsl),1);--course-item-nav-border-color:hsla(var(--black-hsl),0.25);--course-item-nav-text-color:hsla(var(--black-hsl),1);--course-list-course-item-background:hsla(var(--white-hsl),1);--course-list-course-item-hover-background:hsla(var(--white-hsl),0.75);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--black-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--black-hsl),1);--headingLargeColor:hsla(var(--black-hsl),1);--headingLinkColor:hsla(var(--safeDarkAccent-hsl),1);--headingMediumColor:hsla(var(--black-hsl),1);--headingSmallColor:hsla(var(--black-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--lightAccent-hsl),0);--image-block-card-image-title-color:hsla(var(--black-hsl),1);--image-block-card-inline-link-color:hsla(var(--black-hsl),1);--image-block-collage-background-color:hsla(var(--white-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--lightAccent-hsl),0);--image-block-collage-image-title-color:hsla(var(--black-hsl),1);--image-block-collage-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--lightAccent-hsl),1);--image-block-overlap-image-title-color:hsla(var(--black-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--lightAccent-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--lightAccent-hsl),0);--image-block-stack-image-title-color:hsla(var(--black-hsl),1);--image-block-stack-inline-link-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--black-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--white-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--black-hsl),1);--list-section-carousel-description-color:hsla(var(--black-hsl),1);--list-section-carousel-title-color:hsla(var(--black-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--white-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--black-hsl),1);--list-section-simple-description-color:hsla(var(--black-hsl),1);--list-section-simple-title-color:hsla(var(--black-hsl),1);--list-section-title-color:hsla(var(--black-hsl),1);--menuOverlayBackgroundColor:hsla(var(--lightAccent-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--black-hsl),1);--navigationLinkColor:hsla(var(--black-hsl),1);--paragraphLargeColor:hsla(var(--black-hsl),1);--paragraphLinkColor:hsla(var(--safeDarkAccent-hsl),1);--paragraphMediumColor:hsla(var(--black-hsl),1);--paragraphSmallColor:hsla(var(--black-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--black-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--lightAccent-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--black-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--black-hsl),1);--portfolio-hover-static-title-color:hsla(var(--black-hsl),1);--portfolio-index-background-title-color:hsla(var(--black-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeDarkAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--white-hsl),1);--shape-block-dropshadow-color:hsla(var(--white-hsl),1);--siteBackgroundColor:hsla(var(--lightAccent-hsl),1);--siteTitleColor:hsla(var(--black-hsl),1);--social-links-block-main-icon-color:hsla(var(--black-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--lightAccent-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--black-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--text-highlight-color:hsla(var(--safeDarkAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--black-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--black-hsl),1);--tweak-blog-item-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-blog-item-title-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--black-hsl),1);--tweak-content-link-block-title-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-form-block-background-color:hsla(var(--white-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--black-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-description-color:hsla(var(--black-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-option-color:hsla(var(--black-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-title-color:hsla(var(--black-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--lightAccent-hsl),1);--tweak-gallery-icon-color:hsla(var(--black-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--lightAccent-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--black-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--black-hsl),1);--tweak-line-block-line-color:hsla(var(--black-hsl),1);--tweak-marquee-block-background-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--black-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--black-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--black-hsl),1);--tweak-menu-block-nav-color:hsla(var(--black-hsl),1);--tweak-menu-block-title-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color:hsla(var(--black-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--black-hsl),1);--tweak-quote-block-text-color:hsla(var(--black-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-background-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--black-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-title-color:hsla(var(--black-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-text-block-background-color:hsla(var(--white-hsl),1);--tweak-video-item-description-color:hsla(var(--black-hsl),1);--tweak-video-item-meta-color:hsla(var(--black-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-video-item-title-color:hsla(var(--black-hsl),1);--video-grid-basic-description-color:hsla(var(--black-hsl),1);--video-grid-basic-meta-color:hsla(var(--black-hsl),1);--video-grid-basic-title-color:hsla(var(--black-hsl),1);--video-grid-category-nav-color:hsla(var(--black-hsl),1);}.light-bold {--announcement-bar-background-color:hsla(var(--accent-hsl),1);--announcement-bar-text-color:hsla(var(--safeInverseAccent-hsl),1);--backgroundOverlayColor:hsla(var(--lightAccent-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeDarkAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--course-item-nav-background-color:hsla(var(--white-hsl),1);--course-item-nav-border-color:hsla(var(--black-hsl),0.25);--course-item-nav-text-color:hsla(var(--black-hsl),1);--course-list-course-item-background:hsla(var(--white-hsl),1);--course-list-course-item-hover-background:hsla(var(--white-hsl),0.75);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--safeDarkAccent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--safeDarkAccent-hsl),1);--headingLargeColor:hsla(var(--safeDarkAccent-hsl),1);--headingLinkColor:hsla(var(--safeDarkAccent-hsl),1);--headingMediumColor:hsla(var(--safeDarkAccent-hsl),1);--headingSmallColor:hsla(var(--safeDarkAccent-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--lightAccent-hsl),0);--image-block-card-image-title-color:hsla(var(--black-hsl),1);--image-block-card-inline-link-color:hsla(var(--black-hsl),1);--image-block-collage-background-color:hsla(var(--white-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--lightAccent-hsl),0);--image-block-collage-image-title-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-inline-link-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--lightAccent-hsl),1);--image-block-overlap-image-title-color:hsla(var(--black-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--lightAccent-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--lightAccent-hsl),0);--image-block-stack-image-title-color:hsla(var(--black-hsl),1);--image-block-stack-inline-link-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--white-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-description-color:hsla(var(--black-hsl),1);--list-section-carousel-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--white-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-description-color:hsla(var(--black-hsl),1);--list-section-simple-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-title-color:hsla(var(--safeDarkAccent-hsl),1);--menuOverlayBackgroundColor:hsla(var(--lightAccent-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--black-hsl),1);--navigationLinkColor:hsla(var(--black-hsl),1);--paragraphLargeColor:hsla(var(--black-hsl),1);--paragraphLinkColor:hsla(var(--safeDarkAccent-hsl),1);--paragraphMediumColor:hsla(var(--black-hsl),1);--paragraphSmallColor:hsla(var(--black-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--safeDarkAccent-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--lightAccent-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--black-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--safeDarkAccent-hsl),1);--portfolio-hover-static-title-color:hsla(var(--safeDarkAccent-hsl),1);--portfolio-index-background-title-color:hsla(var(--black-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeDarkAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--white-hsl),1);--shape-block-dropshadow-color:hsla(var(--white-hsl),1);--siteBackgroundColor:hsla(var(--lightAccent-hsl),1);--siteTitleColor:hsla(var(--safeDarkAccent-hsl),1);--social-links-block-main-icon-color:hsla(var(--black-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--lightAccent-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--black-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeDarkAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseDarkAccent-hsl),1);--text-highlight-color:hsla(var(--safeDarkAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--black-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--black-hsl),1);--tweak-blog-item-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-blog-item-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--black-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-content-link-block-title-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-form-block-background-color:hsla(var(--white-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--black-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-description-color:hsla(var(--black-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-option-color:hsla(var(--black-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-title-color:hsla(var(--black-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--lightAccent-hsl),1);--tweak-gallery-icon-color:hsla(var(--black-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--lightAccent-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--black-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-line-block-line-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-background-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--black-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--black-hsl),1);--tweak-menu-block-nav-color:hsla(var(--black-hsl),1);--tweak-menu-block-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--black-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--black-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--safeDarkAccent-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color:hsla(var(--black-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-quote-block-text-color:hsla(var(--black-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-background-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--black-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-title-color:hsla(var(--black-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-text-block-background-color:hsla(var(--white-hsl),1);--tweak-video-item-description-color:hsla(var(--accent-hsl),1);--tweak-video-item-meta-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-video-item-title-color:hsla(var(--accent-hsl),1);--video-grid-basic-description-color:hsla(var(--accent-hsl),1);--video-grid-basic-meta-color:hsla(var(--accent-hsl),1);--video-grid-basic-title-color:hsla(var(--accent-hsl),1);--video-grid-category-nav-color:hsla(var(--accent-hsl),1);}.dark {--announcement-bar-background-color:hsla(var(--lightAccent-hsl),1);--announcement-bar-text-color:hsla(var(--black-hsl),1);--backgroundOverlayColor:hsla(var(--darkAccent-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeLightAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--course-item-nav-background-color:hsla(var(--black-hsl),1);--course-item-nav-border-color:hsla(var(--white-hsl),0.25);--course-item-nav-text-color:hsla(var(--white-hsl),1);--course-list-course-item-background:hsla(var(--white-hsl),1);--course-list-course-item-hover-background:hsla(var(--white-hsl),0.9);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--accent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--white-hsl),1);--headingLargeColor:hsla(var(--white-hsl),1);--headingLinkColor:hsla(var(--lightAccent-hsl),1);--headingMediumColor:hsla(var(--white-hsl),1);--headingSmallColor:hsla(var(--white-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--darkAccent-hsl),0);--image-block-card-image-title-color:hsla(var(--white-hsl),1);--image-block-card-inline-link-color:hsla(var(--white-hsl),1);--image-block-collage-background-color:hsla(var(--white-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--darkAccent-hsl),0);--image-block-collage-image-title-color:hsla(var(--black-hsl),1);--image-block-collage-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-title-color:hsla(var(--white-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--white-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--darkAccent-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--darkAccent-hsl),0);--image-block-stack-image-title-color:hsla(var(--white-hsl),1);--image-block-stack-inline-link-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--white-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--white-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--black-hsl),1);--list-section-carousel-description-color:hsla(var(--white-hsl),1);--list-section-carousel-title-color:hsla(var(--white-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--white-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--black-hsl),1);--list-section-simple-description-color:hsla(var(--white-hsl),1);--list-section-simple-title-color:hsla(var(--white-hsl),1);--list-section-title-color:hsla(var(--white-hsl),1);--menuOverlayBackgroundColor:hsla(var(--darkAccent-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--white-hsl),1);--navigationLinkColor:hsla(var(--white-hsl),1);--paragraphLargeColor:hsla(var(--white-hsl),1);--paragraphLinkColor:hsla(var(--safeLightAccent-hsl),1);--paragraphMediumColor:hsla(var(--white-hsl),1);--paragraphSmallColor:hsla(var(--white-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--white-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--darkAccent-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--white-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--white-hsl),1);--portfolio-hover-static-title-color:hsla(var(--white-hsl),1);--portfolio-index-background-title-color:hsla(var(--white-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeLightAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--white-hsl),1);--shape-block-dropshadow-color:hsla(var(--white-hsl),1);--siteBackgroundColor:hsla(var(--darkAccent-hsl),1);--siteTitleColor:hsla(var(--white-hsl),1);--social-links-block-main-icon-color:hsla(var(--white-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--darkAccent-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--white-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--text-highlight-color:hsla(var(--safeLightAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--white-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--white-hsl),1);--tweak-blog-item-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-blog-item-title-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--white-hsl),1);--tweak-content-link-block-title-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-form-block-background-color:hsla(var(--white-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--white-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-description-color:hsla(var(--white-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-option-color:hsla(var(--white-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--white-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-title-color:hsla(var(--white-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--darkAccent-hsl),1);--tweak-gallery-icon-color:hsla(var(--white-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--darkAccent-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--white-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--black-hsl),1);--tweak-line-block-line-color:hsla(var(--white-hsl),1);--tweak-marquee-block-background-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--white-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--black-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--white-hsl),1);--tweak-menu-block-nav-color:hsla(var(--white-hsl),1);--tweak-menu-block-title-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--white-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--black-hsl),1);--tweak-quote-block-text-color:hsla(var(--white-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-background-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--white-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--white-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-title-color:hsla(var(--white-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-text-block-background-color:hsla(var(--white-hsl),1);--tweak-video-item-description-color:hsla(var(--white-hsl),1);--tweak-video-item-meta-color:hsla(var(--white-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-video-item-title-color:hsla(var(--white-hsl),1);--video-grid-basic-description-color:hsla(var(--white-hsl),1);--video-grid-basic-meta-color:hsla(var(--white-hsl),1);--video-grid-basic-title-color:hsla(var(--white-hsl),1);--video-grid-category-nav-color:hsla(var(--white-hsl),1);}.dark-bold {--announcement-bar-background-color:hsla(var(--accent-hsl),1);--announcement-bar-text-color:hsla(var(--safeInverseAccent-hsl),1);--backgroundOverlayColor:hsla(var(--darkAccent-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeLightAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--course-item-nav-background-color:hsla(var(--black-hsl),1);--course-item-nav-border-color:hsla(var(--white-hsl),0.25);--course-item-nav-text-color:hsla(var(--white-hsl),1);--course-list-course-item-background:hsla(var(--white-hsl),1);--course-list-course-item-hover-background:hsla(var(--white-hsl),0.9);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--accent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--safeLightAccent-hsl),1);--headingLargeColor:hsla(var(--safeLightAccent-hsl),1);--headingLinkColor:hsla(var(--safeLightAccent-hsl),1);--headingMediumColor:hsla(var(--safeLightAccent-hsl),1);--headingSmallColor:hsla(var(--safeLightAccent-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--darkAccent-hsl),0);--image-block-card-image-title-color:hsla(var(--white-hsl),1);--image-block-card-inline-link-color:hsla(var(--white-hsl),1);--image-block-collage-background-color:hsla(var(--white-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--darkAccent-hsl),0);--image-block-collage-image-title-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-inline-link-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-title-color:hsla(var(--white-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--white-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--darkAccent-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--darkAccent-hsl),0);--image-block-stack-image-title-color:hsla(var(--white-hsl),1);--image-block-stack-inline-link-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--white-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-description-color:hsla(var(--white-hsl),1);--list-section-carousel-title-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--white-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-description-color:hsla(var(--white-hsl),1);--list-section-simple-title-color:hsla(var(--safeLightAccent-hsl),1);--list-section-title-color:hsla(var(--safeLightAccent-hsl),1);--menuOverlayBackgroundColor:hsla(var(--darkAccent-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--safeLightAccent-hsl),1);--navigationLinkColor:hsla(var(--safeLightAccent-hsl),1);--paragraphLargeColor:hsla(var(--white-hsl),1);--paragraphLinkColor:hsla(var(--safeLightAccent-hsl),1);--paragraphMediumColor:hsla(var(--white-hsl),1);--paragraphSmallColor:hsla(var(--white-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--safeLightAccent-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--darkAccent-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--white-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--safeLightAccent-hsl),1);--portfolio-hover-static-title-color:hsla(var(--safeLightAccent-hsl),1);--portfolio-index-background-title-color:hsla(var(--white-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeLightAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--white-hsl),1);--shape-block-dropshadow-color:hsla(var(--white-hsl),1);--siteBackgroundColor:hsla(var(--darkAccent-hsl),1);--siteTitleColor:hsla(var(--safeLightAccent-hsl),1);--social-links-block-main-icon-color:hsla(var(--white-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--darkAccent-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--white-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--text-highlight-color:hsla(var(--safeLightAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--white-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--white-hsl),1);--tweak-blog-item-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-blog-item-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-content-link-block-title-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-form-block-background-color:hsla(var(--white-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--white-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-description-color:hsla(var(--white-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-option-color:hsla(var(--white-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--white-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-title-color:hsla(var(--white-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--darkAccent-hsl),1);--tweak-gallery-icon-color:hsla(var(--white-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--darkAccent-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--white-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-line-block-line-color:hsla(var(--safeLightAccent-hsl),1);--tweak-marquee-block-background-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--safeLightAccent-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--white-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--white-hsl),1);--tweak-menu-block-nav-color:hsla(var(--safeLightAccent-hsl),1);--tweak-menu-block-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-quote-block-text-color:hsla(var(--white-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-background-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--white-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--white-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-title-color:hsla(var(--white-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-text-block-background-color:hsla(var(--white-hsl),1);--tweak-video-item-description-color:hsla(var(--accent-hsl),1);--tweak-video-item-meta-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-video-item-title-color:hsla(var(--accent-hsl),1);--video-grid-basic-description-color:hsla(var(--accent-hsl),1);--video-grid-basic-meta-color:hsla(var(--accent-hsl),1);--video-grid-basic-title-color:hsla(var(--accent-hsl),1);--video-grid-category-nav-color:hsla(var(--accent-hsl),1);}.black {--announcement-bar-background-color:hsla(var(--white-hsl),1);--announcement-bar-text-color:hsla(var(--black-hsl),1);--backgroundOverlayColor:hsla(var(--black-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeLightAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--course-item-nav-background-color:hsla(var(--darkAccent-hsl),1);--course-item-nav-border-color:hsla(var(--safeInverseDarkAccent-hsl),0.25);--course-item-nav-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--course-list-course-item-background:hsla(var(--white-hsl),1);--course-list-course-item-hover-background:hsla(var(--white-hsl),0.95);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--accent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--white-hsl),1);--headingLargeColor:hsla(var(--white-hsl),1);--headingLinkColor:hsla(var(--lightAccent-hsl),1);--headingMediumColor:hsla(var(--white-hsl),1);--headingSmallColor:hsla(var(--white-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--black-hsl),0);--image-block-card-image-title-color:hsla(var(--white-hsl),1);--image-block-card-inline-link-color:hsla(var(--white-hsl),1);--image-block-collage-background-color:hsla(var(--white-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--black-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--black-hsl),0);--image-block-collage-image-title-color:hsla(var(--black-hsl),1);--image-block-collage-inline-link-color:hsla(var(--black-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--black-hsl),1);--image-block-overlap-image-title-color:hsla(var(--white-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--white-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--black-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--black-hsl),0);--image-block-stack-image-title-color:hsla(var(--white-hsl),1);--image-block-stack-inline-link-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--white-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--white-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--black-hsl),1);--list-section-carousel-description-color:hsla(var(--white-hsl),1);--list-section-carousel-title-color:hsla(var(--white-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--white-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--black-hsl),1);--list-section-simple-description-color:hsla(var(--white-hsl),1);--list-section-simple-title-color:hsla(var(--white-hsl),1);--list-section-title-color:hsla(var(--white-hsl),1);--menuOverlayBackgroundColor:hsla(var(--black-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--white-hsl),1);--navigationLinkColor:hsla(var(--white-hsl),1);--paragraphLargeColor:hsla(var(--white-hsl),1);--paragraphLinkColor:hsla(var(--safeLightAccent-hsl),1);--paragraphMediumColor:hsla(var(--white-hsl),1);--paragraphSmallColor:hsla(var(--white-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--white-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--black-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--white-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--white-hsl),1);--portfolio-hover-static-title-color:hsla(var(--white-hsl),1);--portfolio-index-background-title-color:hsla(var(--white-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeLightAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--white-hsl),1);--shape-block-dropshadow-color:hsla(var(--white-hsl),1);--siteBackgroundColor:hsla(var(--black-hsl),1);--siteTitleColor:hsla(var(--white-hsl),1);--social-links-block-main-icon-color:hsla(var(--white-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--black-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--white-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--text-highlight-color:hsla(var(--safeLightAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--black-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--white-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--black-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--white-hsl),1);--tweak-blog-item-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-blog-item-title-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--white-hsl),1);--tweak-content-link-block-title-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-form-block-background-color:hsla(var(--white-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--white-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-description-color:hsla(var(--white-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-option-color:hsla(var(--white-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--white-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--black-hsl),1);--tweak-form-block-title-color:hsla(var(--white-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--black-hsl),1);--tweak-gallery-icon-color:hsla(var(--white-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--black-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--white-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--black-hsl),1);--tweak-line-block-line-color:hsla(var(--white-hsl),1);--tweak-marquee-block-background-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--black-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--white-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--black-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--white-hsl),1);--tweak-menu-block-nav-color:hsla(var(--white-hsl),1);--tweak-menu-block-title-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--black-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--black-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--black-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--white-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--black-hsl),1);--tweak-quote-block-text-color:hsla(var(--white-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-background-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--white-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--white-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--black-hsl),1);--tweak-summary-block-title-color:hsla(var(--white-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--black-hsl),1);--tweak-text-block-background-color:hsla(var(--white-hsl),1);--tweak-video-item-description-color:hsla(var(--white-hsl),1);--tweak-video-item-meta-color:hsla(var(--white-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-video-item-title-color:hsla(var(--white-hsl),1);--video-grid-basic-description-color:hsla(var(--white-hsl),1);--video-grid-basic-meta-color:hsla(var(--white-hsl),1);--video-grid-basic-title-color:hsla(var(--white-hsl),1);--video-grid-category-nav-color:hsla(var(--white-hsl),1);}.black-bold {--announcement-bar-background-color:hsla(var(--accent-hsl),1);--announcement-bar-text-color:hsla(var(--safeInverseAccent-hsl),1);--backgroundOverlayColor:hsla(var(--black-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--safeLightAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--course-item-nav-background-color:hsla(var(--black-hsl),1);--course-item-nav-border-color:hsla(var(--white-hsl),0.25);--course-item-nav-text-color:hsla(var(--white-hsl),1);--course-list-course-item-background:hsla(var(--white-hsl),1);--course-list-course-item-hover-background:hsla(var(--white-hsl),0.95);--course-list-course-item-text-color:hsla(var(--black-hsl),1);--course-list-course-progress-bar-color:hsla(var(--accent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--safeLightAccent-hsl),1);--headingLargeColor:hsla(var(--safeLightAccent-hsl),1);--headingLinkColor:hsla(var(--safeLightAccent-hsl),1);--headingMediumColor:hsla(var(--safeLightAccent-hsl),1);--headingSmallColor:hsla(var(--safeLightAccent-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--black-hsl),0);--image-block-card-image-title-color:hsla(var(--white-hsl),1);--image-block-card-inline-link-color:hsla(var(--white-hsl),1);--image-block-collage-background-color:hsla(var(--white-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--black-hsl),0);--image-block-collage-image-title-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-collage-inline-link-color:hsla(var(--safeDarkAccent-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--black-hsl),1);--image-block-overlap-image-title-color:hsla(var(--white-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--white-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--black-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--black-hsl),0);--image-block-stack-image-title-color:hsla(var(--white-hsl),1);--image-block-stack-inline-link-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--black-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--white-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--white-hsl),1);--list-section-carousel-card-description-color:hsla(var(--black-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-carousel-description-color:hsla(var(--white-hsl),1);--list-section-carousel-title-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--list-section-simple-card-color:hsla(var(--white-hsl),1);--list-section-simple-card-description-color:hsla(var(--black-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeLightAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--safeDarkAccent-hsl),1);--list-section-simple-description-color:hsla(var(--white-hsl),1);--list-section-simple-title-color:hsla(var(--safeLightAccent-hsl),1);--list-section-title-color:hsla(var(--safeLightAccent-hsl),1);--menuOverlayBackgroundColor:hsla(var(--black-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--safeLightAccent-hsl),1);--navigationLinkColor:hsla(var(--safeLightAccent-hsl),1);--paragraphLargeColor:hsla(var(--white-hsl),1);--paragraphLinkColor:hsla(var(--safeLightAccent-hsl),1);--paragraphMediumColor:hsla(var(--white-hsl),1);--paragraphSmallColor:hsla(var(--white-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--safeLightAccent-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--black-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--white-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--safeLightAccent-hsl),1);--portfolio-hover-static-title-color:hsla(var(--safeLightAccent-hsl),1);--portfolio-index-background-title-color:hsla(var(--white-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--section-divider-stroke-color:hsla(var(--safeLightAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--white-hsl),1);--shape-block-dropshadow-color:hsla(var(--white-hsl),1);--siteBackgroundColor:hsla(var(--black-hsl),1);--siteTitleColor:hsla(var(--safeLightAccent-hsl),1);--social-links-block-main-icon-color:hsla(var(--white-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--black-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--white-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeLightAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseLightAccent-hsl),1);--text-highlight-color:hsla(var(--safeLightAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--white-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--white-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--white-hsl),1);--tweak-blog-item-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-blog-item-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--white-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeLightAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-content-link-block-title-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-form-block-background-color:hsla(var(--white-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--white-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-description-color:hsla(var(--white-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-option-color:hsla(var(--white-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--white-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-form-block-title-color:hsla(var(--white-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--black-hsl),1);--tweak-gallery-icon-color:hsla(var(--white-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--black-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--white-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-line-block-line-color:hsla(var(--safeLightAccent-hsl),1);--tweak-marquee-block-background-color:hsla(var(--white-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--safeLightAccent-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--white-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--white-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--white-hsl),1);--tweak-menu-block-nav-color:hsla(var(--safeLightAccent-hsl),1);--tweak-menu-block-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeLightAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseDarkAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--white-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeLightAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--white-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--safeLightAccent-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color:hsla(var(--white-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-quote-block-text-color:hsla(var(--white-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-background-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--white-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--white-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--white-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--white-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-summary-block-title-color:hsla(var(--white-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--safeDarkAccent-hsl),1);--tweak-text-block-background-color:hsla(var(--white-hsl),1);--tweak-video-item-description-color:hsla(var(--accent-hsl),1);--tweak-video-item-meta-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-video-item-title-color:hsla(var(--accent-hsl),1);--video-grid-basic-description-color:hsla(var(--accent-hsl),1);--video-grid-basic-meta-color:hsla(var(--accent-hsl),1);--video-grid-basic-title-color:hsla(var(--accent-hsl),1);--video-grid-category-nav-color:hsla(var(--accent-hsl),1);}.bright {--announcement-bar-background-color:hsla(var(--safeInverseAccent-hsl),1);--announcement-bar-text-color:hsla(var(--accent-hsl),1);--backgroundOverlayColor:hsla(var(--accent-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--lightAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--course-item-nav-background-color:hsla(var(--black-hsl),1);--course-item-nav-border-color:hsla(var(--white-hsl),0.25);--course-item-nav-text-color:hsla(var(--white-hsl),1);--course-list-course-item-background:hsla(var(--safeInverseAccent-hsl),1);--course-list-course-item-hover-background:hsla(var(--safeInverseAccent-hsl),0.9);--course-list-course-item-text-color:hsla(var(--accent-hsl),1);--course-list-course-progress-bar-color:hsla(var(--darkAccent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--safeInverseAccent-hsl),1);--headingLargeColor:hsla(var(--safeInverseAccent-hsl),1);--headingLinkColor:hsla(var(--safeInverseAccent-hsl),1);--headingMediumColor:hsla(var(--safeInverseAccent-hsl),1);--headingSmallColor:hsla(var(--safeInverseAccent-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--accent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--accent-hsl),0);--image-block-card-image-title-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-card-inline-link-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-collage-background-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--accent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--accent-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--accent-hsl),0);--image-block-collage-image-title-color:hsla(var(--accent-hsl),1);--image-block-collage-inline-link-color:hsla(var(--accent-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--accent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--accent-hsl),1);--image-block-overlap-image-title-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--accent-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--accent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--accent-hsl),0);--image-block-stack-image-title-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-stack-inline-link-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--accent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--accent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--accent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-card-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-card-description-color:hsla(var(--accent-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--accent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--accent-hsl),1);--list-section-carousel-description-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-title-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-button-text-color:hsla(var(--accent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--accent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-card-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-card-description-color:hsla(var(--accent-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--accent-hsl),1);--list-section-simple-card-title-color:hsla(var(--accent-hsl),1);--list-section-simple-description-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-title-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-title-color:hsla(var(--safeInverseAccent-hsl),1);--menuOverlayBackgroundColor:hsla(var(--accent-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--safeInverseAccent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--accent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--safeInverseAccent-hsl),1);--navigationLinkColor:hsla(var(--safeInverseAccent-hsl),1);--paragraphLargeColor:hsla(var(--safeInverseAccent-hsl),1);--paragraphLinkColor:hsla(var(--safeInverseAccent-hsl),1);--paragraphMediumColor:hsla(var(--safeInverseAccent-hsl),1);--paragraphSmallColor:hsla(var(--safeInverseAccent-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--safeInverseAccent-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--accent-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--safeInverseAccent-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--safeInverseAccent-hsl),1);--portfolio-hover-static-title-color:hsla(var(--safeInverseAccent-hsl),1);--portfolio-index-background-title-color:hsla(var(--safeInverseAccent-hsl),1);--primaryButtonBackgroundColor:hsla(var(--safeInverseAccent-hsl),1);--primaryButtonTextColor:hsla(var(--accent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--safeInverseAccent-hsl),1);--secondaryButtonTextColor:hsla(var(--accent-hsl),1);--section-divider-stroke-color:hsla(var(--safeInverseAccent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--shape-block-dropshadow-color:hsla(var(--safeInverseAccent-hsl),1);--siteBackgroundColor:hsla(var(--accent-hsl),1);--siteTitleColor:hsla(var(--safeInverseAccent-hsl),1);--social-links-block-main-icon-color:hsla(var(--safeInverseAccent-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--accent-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--safeInverseAccent-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--safeInverseAccent-hsl),1);--tertiaryButtonTextColor:hsla(var(--accent-hsl),1);--text-highlight-color:hsla(var(--safeInverseAccent-hsl),1);--text-highlight-color-on-background:hsla(var(--accent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--accent-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--accent-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-item-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-content-link-block-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--accent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--accent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-caption-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--accent-hsl),1);--tweak-form-block-description-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--accent-hsl),1);--tweak-form-block-option-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--accent-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--accent-hsl),1);--tweak-form-block-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--accent-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--accent-hsl),1);--tweak-gallery-icon-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--accent-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--accent-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--accent-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--accent-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--accent-hsl),1);--tweak-line-block-line-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-marquee-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--accent-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--accent-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-menu-block-nav-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-menu-block-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--accent-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--accent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--accent-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--accent-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--accent-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--accent-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--accent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--accent-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--accent-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--white-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--white-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-quote-block-source-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--accent-hsl),1);--tweak-quote-block-text-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--accent-hsl),1);--tweak-summary-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--accent-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--accent-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--accent-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--accent-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--accent-hsl),1);--tweak-summary-block-title-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--accent-hsl),1);--tweak-text-block-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-video-item-description-color:hsla(var(--white-hsl),1);--tweak-video-item-meta-color:hsla(var(--white-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--white-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--white-hsl),1);--tweak-video-item-title-color:hsla(var(--white-hsl),1);--video-grid-basic-description-color:hsla(var(--white-hsl),1);--video-grid-basic-meta-color:hsla(var(--white-hsl),1);--video-grid-basic-title-color:hsla(var(--white-hsl),1);--video-grid-category-nav-color:hsla(var(--white-hsl),1);}.bright-inverse {--announcement-bar-background-color:hsla(var(--accent-hsl),1);--announcement-bar-text-color:hsla(var(--safeInverseAccent-hsl),1);--backgroundOverlayColor:hsla(var(--safeInverseAccent-hsl),1);--course-item-nav-active-lesson-background-color:hsla(var(--darkAccent-hsl),1);--course-item-nav-active-lesson-text-color:hsla(var(--safeInverseDarkAccent-hsl),1);--course-item-nav-background-color:hsla(var(--accent-hsl),1);--course-item-nav-border-color:hsla(var(--safeInverseAccent-hsl),0.25);--course-item-nav-text-color:hsla(var(--safeInverseAccent-hsl),1);--course-list-course-item-background:hsla(var(--accent-hsl),1);--course-list-course-item-hover-background:hsla(var(--accent-hsl),0.95);--course-list-course-item-text-color:hsla(var(--safeInverseAccent-hsl),1);--course-list-course-progress-bar-color:hsla(var(--darkAccent-hsl),1);--gradientHeaderBackgroundColor:hsla(var(--white-hsl),1);--gradientHeaderBorderColor:hsla(var(--black-hsl),1);--gradientHeaderDropShadowColor:hsla(var(--black-hsl),1);--gradientHeaderNavigationColor:hsla(var(--black-hsl),1);--headingExtraLargeColor:hsla(var(--accent-hsl),1);--headingLargeColor:hsla(var(--accent-hsl),1);--headingLinkColor:hsla(var(--accent-hsl),1);--headingMediumColor:hsla(var(--accent-hsl),1);--headingSmallColor:hsla(var(--accent-hsl),1);--image-block-card-image-button-bg-color:hsla(var(--accent-hsl),1);--image-block-card-image-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-card-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-card-image-subtitle-color:hsla(var(--accent-hsl),1);--image-block-card-image-title-bg-color:hsla(var(--safeInverseAccent-hsl),0);--image-block-card-image-title-color:hsla(var(--accent-hsl),1);--image-block-card-inline-link-color:hsla(var(--accent-hsl),1);--image-block-collage-background-color:hsla(var(--accent-hsl),1);--image-block-collage-image-button-bg-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-collage-image-button-text-color:hsla(var(--accent-hsl),1);--image-block-collage-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-collage-image-subtitle-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-collage-image-title-bg-color:hsla(var(--safeInverseAccent-hsl),0);--image-block-collage-image-title-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-collage-inline-link-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-overlap-image-button-bg-color:hsla(var(--accent-hsl),1);--image-block-overlap-image-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-overlap-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-overlap-image-subtitle-color:hsla(var(--accent-hsl),1);--image-block-overlap-image-title-bg-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-overlap-image-title-color:hsla(var(--accent-hsl),1);--image-block-overlap-inline-link-color:hsla(var(--accent-hsl),1);--image-block-overlay-color:hsla(var(--black-hsl),0.5);--image-block-poster-image-button-bg-color:hsla(var(--safeLightAccent-hsl),1);--image-block-poster-image-button-text-color:hsla(var(--safeInverseLightAccent-hsl),1);--image-block-poster-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-poster-image-subtitle-color:hsla(var(--white-hsl),1);--image-block-poster-image-title-bg-color-v2:hsla(var(--safeInverseAccent-hsl),0);--image-block-poster-image-title-color:hsla(var(--white-hsl),1);--image-block-poster-inline-link-color:hsla(var(--white-hsl),1);--image-block-stack-image-button-bg-color:hsla(var(--accent-hsl),1);--image-block-stack-image-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--image-block-stack-image-overlay-color:hsla(var(--darkAccent-hsl),1);--image-block-stack-image-subtitle-color:hsla(var(--accent-hsl),1);--image-block-stack-image-title-bg-color:hsla(var(--safeInverseAccent-hsl),0);--image-block-stack-image-title-color:hsla(var(--accent-hsl),1);--image-block-stack-inline-link-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-arrow-background-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-arrow-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-button-background-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-card-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-card-button-text-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-card-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-card-description-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-card-description-link-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-card-title-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-banner-slideshow-description-color:hsla(var(--accent-hsl),1);--list-section-banner-slideshow-title-color:hsla(var(--accent-hsl),1);--list-section-carousel-arrow-background-color:hsla(var(--accent-hsl),1);--list-section-carousel-arrow-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-button-background-color:hsla(var(--accent-hsl),1);--list-section-carousel-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-card-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-card-button-text-color:hsla(var(--accent-hsl),1);--list-section-carousel-card-color:hsla(var(--accent-hsl),1);--list-section-carousel-card-description-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-card-description-link-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-card-title-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-carousel-description-color:hsla(var(--accent-hsl),1);--list-section-carousel-title-color:hsla(var(--accent-hsl),1);--list-section-simple-button-background-color:hsla(var(--accent-hsl),1);--list-section-simple-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-card-button-background-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-card-button-text-color:hsla(var(--accent-hsl),1);--list-section-simple-card-color:hsla(var(--accent-hsl),1);--list-section-simple-card-description-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-card-description-link-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-card-title-color:hsla(var(--safeInverseAccent-hsl),1);--list-section-simple-description-color:hsla(var(--accent-hsl),1);--list-section-simple-title-color:hsla(var(--accent-hsl),1);--list-section-title-color:hsla(var(--accent-hsl),1);--menuOverlayBackgroundColor:hsla(var(--safeInverseAccent-hsl),1);--menuOverlayButtonBackgroundColor:hsla(var(--accent-hsl),1);--menuOverlayButtonTextColor:hsla(var(--safeInverseAccent-hsl),1);--menuOverlayNavigationLinkColor:hsla(var(--accent-hsl),1);--navigationLinkColor:hsla(var(--accent-hsl),1);--paragraphLargeColor:hsla(var(--accent-hsl),1);--paragraphLinkColor:hsla(var(--accent-hsl),1);--paragraphMediumColor:hsla(var(--accent-hsl),1);--paragraphSmallColor:hsla(var(--accent-hsl),1);--portfolio-grid-basic-title-color:hsla(var(--accent-hsl),1);--portfolio-grid-overlay-overlay-color:hsla(var(--safeInverseAccent-hsl),1);--portfolio-grid-overlay-title-color:hsla(var(--accent-hsl),1);--portfolio-hover-follow-title-color:hsla(var(--accent-hsl),1);--portfolio-hover-static-title-color:hsla(var(--accent-hsl),1);--portfolio-index-background-title-color:hsla(var(--accent-hsl),1);--primaryButtonBackgroundColor:hsla(var(--accent-hsl),1);--primaryButtonTextColor:hsla(var(--safeInverseAccent-hsl),1);--secondaryButtonBackgroundColor:hsla(var(--accent-hsl),1);--secondaryButtonTextColor:hsla(var(--safeInverseAccent-hsl),1);--section-divider-stroke-color:hsla(var(--accent-hsl),1);--section-inset-border-color:hsla(var(--lightAccent-hsl),1);--shape-block-background-color:hsla(var(--accent-hsl),1);--shape-block-dropshadow-color:hsla(var(--accent-hsl),1);--siteBackgroundColor:hsla(var(--safeInverseAccent-hsl),1);--siteTitleColor:hsla(var(--accent-hsl),1);--social-links-block-main-icon-color:hsla(var(--accent-hsl),1);--social-links-block-secondary-icon-color:hsla(var(--safeInverseAccent-hsl),1);--solidHeaderBackgroundColor:hsla(var(--white-hsl),1);--solidHeaderBorderColor:hsla(var(--black-hsl),1);--solidHeaderDropShadowColor:hsla(var(--black-hsl),1);--solidHeaderNavigationColor:hsla(var(--black-hsl),1);--summary-block-limited-availability-label-color:hsla(var(--accent-hsl),1);--tertiaryButtonBackgroundColor:hsla(var(--accent-hsl),1);--tertiaryButtonTextColor:hsla(var(--safeInverseAccent-hsl),1);--text-highlight-color:hsla(var(--accent-hsl),1);--text-highlight-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-accordion-block-background-color:hsla(var(--accent-hsl),1);--tweak-accordion-block-divider-color:hsla(var(--accent-hsl),1);--tweak-accordion-block-divider-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-accordion-block-icon-color:hsla(var(--accent-hsl),1);--tweak-accordion-block-icon-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-blog-alternating-side-by-side-list-excerpt-color:hsla(var(--accent-hsl),1);--tweak-blog-alternating-side-by-side-list-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-alternating-side-by-side-list-read-more-color:hsla(var(--accent-hsl),1);--tweak-blog-alternating-side-by-side-list-title-color:hsla(var(--accent-hsl),1);--tweak-blog-basic-grid-list-excerpt-color:hsla(var(--accent-hsl),1);--tweak-blog-basic-grid-list-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-basic-grid-list-read-more-color:hsla(var(--accent-hsl),1);--tweak-blog-basic-grid-list-title-color:hsla(var(--accent-hsl),1);--tweak-blog-item-author-profile-color:hsla(var(--accent-hsl),1);--tweak-blog-item-comment-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-item-comment-text-color:hsla(var(--accent-hsl),1);--tweak-blog-item-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-blog-item-pagination-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-blog-item-title-color:hsla(var(--accent-hsl),1);--tweak-blog-masonry-list-excerpt-color:hsla(var(--accent-hsl),1);--tweak-blog-masonry-list-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-masonry-list-read-more-color:hsla(var(--accent-hsl),1);--tweak-blog-masonry-list-title-color:hsla(var(--accent-hsl),1);--tweak-blog-side-by-side-list-excerpt-color:hsla(var(--accent-hsl),1);--tweak-blog-side-by-side-list-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-side-by-side-list-read-more-color:hsla(var(--accent-hsl),1);--tweak-blog-side-by-side-list-title-color:hsla(var(--accent-hsl),1);--tweak-blog-single-column-list-excerpt-color:hsla(var(--accent-hsl),1);--tweak-blog-single-column-list-meta-color:hsla(var(--accent-hsl),1);--tweak-blog-single-column-list-read-more-color:hsla(var(--accent-hsl),1);--tweak-blog-single-column-list-title-color:hsla(var(--accent-hsl),1);--tweak-content-link-block-title-color:hsla(var(--accent-hsl),1);--tweak-events-item-pagination-date-color:hsla(var(--accent-hsl),1);--tweak-events-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-events-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-form-block-background-color:hsla(var(--accent-hsl),1);--tweak-form-block-button-background-color:hsla(var(--accent-hsl),1);--tweak-form-block-button-background-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-button-text-color-on-background:hsla(var(--accent-hsl),1);--tweak-form-block-caption-color:hsla(var(--accent-hsl),1);--tweak-form-block-caption-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-description-color:hsla(var(--accent-hsl),1);--tweak-form-block-description-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-option-color:hsla(var(--accent-hsl),1);--tweak-form-block-option-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-survey-title-color:hsla(var(--accent-hsl),1);--tweak-form-block-survey-title-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-form-block-title-color:hsla(var(--accent-hsl),1);--tweak-form-block-title-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-gallery-icon-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-gallery-icon-color:hsla(var(--accent-hsl),1);--tweak-gallery-lightbox-background-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-gallery-lightbox-icon-color:hsla(var(--accent-hsl),1);--tweak-heading-extra-large-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-heading-large-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-heading-medium-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-heading-small-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-line-block-line-color:hsla(var(--accent-hsl),1);--tweak-marquee-block-background-color:hsla(var(--accent-hsl),1);--tweak-marquee-block-heading-color:hsla(var(--accent-hsl),1);--tweak-marquee-block-heading-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-marquee-block-paragraph-color:hsla(var(--accent-hsl),1);--tweak-marquee-block-paragraph-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-menu-block-item-description-color:hsla(var(--accent-hsl),1);--tweak-menu-block-item-price-color:hsla(var(--accent-hsl),1);--tweak-menu-block-item-title-color:hsla(var(--accent-hsl),1);--tweak-menu-block-nav-color:hsla(var(--accent-hsl),1);--tweak-menu-block-title-color:hsla(var(--accent-hsl),1);--tweak-newsletter-block-background-color:hsla(var(--accent-hsl),1);--tweak-newsletter-block-button-background-color:hsla(var(--accent-hsl),1);--tweak-newsletter-block-button-background-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-button-text-color:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-button-text-color-on-background:hsla(var(--accent-hsl),1);--tweak-newsletter-block-description-color:hsla(var(--accent-hsl),1);--tweak-newsletter-block-description-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-footnote-color:hsla(var(--accent-hsl),1);--tweak-newsletter-block-footnote-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-newsletter-block-title-color:hsla(var(--accent-hsl),1);--tweak-newsletter-block-title-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-paragraph-large-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-paragraph-link-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-paragraph-medium-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-paragraph-small-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-portfolio-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-portfolio-item-pagination-meta-color:hsla(var(--accent-hsl),1);--tweak-portfolio-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-breadcumb-nav-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-description-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-gallery-controls-color:hsla(var(--safeInverseLightAccent-hsl),1);--tweak-product-basic-item-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-title-color:hsla(var(--accent-hsl),1);--tweak-product-basic-item-variant-fields-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-category-nav-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-pagination-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-sale-price-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-scarcity-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-status-color:hsla(var(--accent-hsl),1);--tweak-product-grid-text-below-list-title-color:hsla(var(--accent-hsl),1);--tweak-product-quick-view-button-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-controls-color:hsla(var(--black-hsl),1);--tweak-product-quick-view-lightbox-overlay-color:hsla(var(--white-hsl),1);--tweak-quote-block-background-color:hsla(var(--accent-hsl),1);--tweak-quote-block-source-color:hsla(var(--accent-hsl),1);--tweak-quote-block-source-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-quote-block-text-color:hsla(var(--accent-hsl),1);--tweak-quote-block-text-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-background-color:hsla(var(--accent-hsl),1);--tweak-summary-block-excerpt-color:hsla(var(--accent-hsl),1);--tweak-summary-block-excerpt-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-header-text-color:hsla(var(--accent-hsl),1);--tweak-summary-block-header-text-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-primary-metadata-color:hsla(var(--accent-hsl),1);--tweak-summary-block-primary-metadata-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-read-more-color:hsla(var(--accent-hsl),1);--tweak-summary-block-read-more-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-secondary-metadata-color:hsla(var(--accent-hsl),1);--tweak-summary-block-secondary-metadata-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-summary-block-title-color:hsla(var(--accent-hsl),1);--tweak-summary-block-title-color-on-background:hsla(var(--safeInverseAccent-hsl),1);--tweak-text-block-background-color:hsla(var(--accent-hsl),1);--tweak-video-item-description-color:hsla(var(--accent-hsl),1);--tweak-video-item-meta-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-icon-color:hsla(var(--accent-hsl),1);--tweak-video-item-pagination-title-color:hsla(var(--accent-hsl),1);--tweak-video-item-title-color:hsla(var(--accent-hsl),1);--video-grid-basic-description-color:hsla(var(--accent-hsl),1);--video-grid-basic-meta-color:hsla(var(--accent-hsl),1);--video-grid-basic-title-color:hsla(var(--accent-hsl),1);--video-grid-category-nav-color:hsla(var(--accent-hsl),1);}
      </style>


    <style id='rteTextColorMapping'>
      .sqsrte-text-color--white{color:hsla(var(--white-hsl),1);}.sqsrte-text-color--black{color:hsla(var(--black-hsl),1);}.sqsrte-text-color--safeLightAccent{color:hsla(var(--safeLightAccent-hsl),1);}.sqsrte-text-color--safeDarkAccent{color:hsla(var(--safeDarkAccent-hsl),1);}.sqsrte-text-color--safeInverseAccent{color:hsla(var(--safeInverseAccent-hsl),1);}.sqsrte-text-color--safeInverseLightAccent{color:hsla(var(--safeInverseLightAccent-hsl),1);}.sqsrte-text-color--safeInverseDarkAccent{color:hsla(var(--safeInverseDarkAccent-hsl),1);}.sqsrte-text-color--accent{color:hsla(var(--accent-hsl),1);}.sqsrte-text-color--lightAccent{color:hsla(var(--lightAccent-hsl),1);}.sqsrte-text-color--darkAccent{color:hsla(var(--darkAccent-hsl),1);}
    </style>
  </head>";

echo "

  <body
    id='collection-63a4c9172e5a7814cdc4fd29'
    class='
      header-overlay-alignment-center header-width-full tweak-transparent-header tweak-fixed-header tweak-fixed-header-style-basic tweak-blog-alternating-side-by-side-width-full tweak-blog-alternating-side-by-side-image-aspect-ratio-11-square tweak-blog-alternating-side-by-side-text-alignment-left tweak-blog-alternating-side-by-side-read-more-style-show tweak-blog-alternating-side-by-side-image-text-alignment-middle tweak-blog-alternating-side-by-side-delimiter-bullet tweak-blog-alternating-side-by-side-meta-position-top tweak-blog-alternating-side-by-side-primary-meta-categories tweak-blog-alternating-side-by-side-secondary-meta-date tweak-blog-alternating-side-by-side-excerpt-show tweak-blog-basic-grid-width-full tweak-blog-basic-grid-image-aspect-ratio-11-square tweak-blog-basic-grid-text-alignment-left tweak-blog-basic-grid-delimiter-bullet tweak-blog-basic-grid-image-placement-above tweak-blog-basic-grid-read-more-style-hide tweak-blog-basic-grid-primary-meta-categories tweak-blog-basic-grid-secondary-meta-author tweak-blog-basic-grid-excerpt-show tweak-blog-item-width-custom tweak-blog-item-text-alignment-center tweak-blog-item-meta-position-above-title tweak-blog-item-show-categories tweak-blog-item-show-date tweak-blog-item-show-author-name tweak-blog-item-show-author-profile tweak-blog-item-delimiter-bullet tweak-blog-masonry-width-inset tweak-blog-masonry-text-alignment-left tweak-blog-masonry-primary-meta-categories tweak-blog-masonry-secondary-meta-none tweak-blog-masonry-meta-position-top tweak-blog-masonry-read-more-style-show tweak-blog-masonry-delimiter-space tweak-blog-masonry-image-placement-above tweak-blog-masonry-excerpt-show tweak-blog-side-by-side-width-full tweak-blog-side-by-side-image-placement-left tweak-blog-side-by-side-image-aspect-ratio-11-square tweak-blog-side-by-side-primary-meta-categories tweak-blog-side-by-side-secondary-meta-date tweak-blog-side-by-side-meta-position-top tweak-blog-side-by-side-text-alignment-left tweak-blog-side-by-side-image-text-alignment-middle tweak-blog-side-by-side-read-more-style-show tweak-blog-side-by-side-delimiter-bullet tweak-blog-side-by-side-excerpt-show tweak-blog-single-column-width-full tweak-blog-single-column-text-alignment-center tweak-blog-single-column-image-placement-above tweak-blog-single-column-delimiter-bullet tweak-blog-single-column-read-more-style-show tweak-blog-single-column-primary-meta-categories tweak-blog-single-column-secondary-meta-date tweak-blog-single-column-meta-position-top tweak-blog-single-column-content-full-post tweak-events-stacked-width-full tweak-events-stacked-height-large  tweak-events-stacked-show-thumbnails tweak-events-stacked-thumbnail-size-32-standard tweak-events-stacked-date-style-with-text tweak-events-stacked-show-time tweak-events-stacked-show-location  tweak-events-stacked-show-excerpt   tweak-global-animations-complexity-level-detailed tweak-global-animations-animation-style-fade tweak-global-animations-animation-type-none tweak-global-animations-animation-curve-ease tweak-portfolio-grid-basic-width-full tweak-portfolio-grid-basic-height-large tweak-portfolio-grid-basic-image-aspect-ratio-11-square tweak-portfolio-grid-basic-text-alignment-left tweak-portfolio-grid-basic-hover-effect-fade tweak-portfolio-grid-overlay-width-full tweak-portfolio-grid-overlay-height-large tweak-portfolio-grid-overlay-image-aspect-ratio-11-square tweak-portfolio-grid-overlay-text-placement-center tweak-portfolio-grid-overlay-show-text-after-hover tweak-portfolio-index-background-link-format-stacked tweak-portfolio-index-background-width-full tweak-portfolio-index-background-height-large  tweak-portfolio-index-background-vertical-alignment-middle tweak-portfolio-index-background-horizontal-alignment-center tweak-portfolio-index-background-delimiter-none tweak-portfolio-index-background-animation-type-fade tweak-portfolio-index-background-animation-duration-medium tweak-portfolio-hover-follow-layout-inline  tweak-portfolio-hover-follow-delimiter-forward-slash tweak-portfolio-hover-follow-animation-type-fade tweak-portfolio-hover-follow-animation-duration-medium tweak-portfolio-hover-static-layout-stacked  tweak-portfolio-hover-static-delimiter-forward-slash tweak-portfolio-hover-static-animation-type-scale-up tweak-portfolio-hover-static-animation-duration-medium tweak-product-basic-item-width-full tweak-product-basic-item-gallery-aspect-ratio-34-three-four-vertical tweak-product-basic-item-text-alignment-left tweak-product-basic-item-navigation-breadcrumbs tweak-product-basic-item-content-alignment-top tweak-product-basic-item-gallery-design-slideshow tweak-product-basic-item-gallery-placement-left tweak-product-basic-item-thumbnail-placement-side tweak-product-basic-item-click-action-none tweak-product-basic-item-hover-action-none tweak-product-basic-item-variant-picker-layout-dropdowns tweak-products-width-full tweak-products-image-aspect-ratio-11-square tweak-products-text-alignment-left tweak-products-price-show tweak-products-nested-category-type-top tweak-products-category-title tweak-products-header-text-alignment-middle tweak-products-breadcrumbs primary-button-style-solid primary-button-shape-rounded secondary-button-style-solid secondary-button-shape-square tertiary-button-style-solid tertiary-button-shape-square image-block-poster-text-alignment-left image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-content-position-center image-block-collage-text-alignment-left image-block-stack-text-alignment-left hide-opentable-icons opentable-style-dark tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light native-currency-code-cad collection-63a4c9172e5a7814cdc4fd29 collection-type-page collection-layout-default homepage mobile-style-available sqs-seven-one









    '
    tabindex='-1'
  >
    <div
      id='siteWrapper'
      class='clearfix site-wrapper'
    >

        <div id='floatingCart' class='floating-cart hidden'>
          <a href='/cart' class='icon icon--stroke icon--fill icon--cart sqs-custom-cart'>
            <span class='Cart-inner'>




  <svg class='icon icon--cart' viewBox='0 0 31 24'>
  <g class='svg-icon cart-icon--odd'>
    <circle fill='none' stroke-miterlimit='10' cx='22.5' cy='21.5' r='1'/>
    <circle fill='none' stroke-miterlimit='10' cx='9.5' cy='21.5' r='1'/>
    <path fill='none' stroke-miterlimit='10' d='M0,1.5h5c0.6,0,1.1,0.4,1.1,1l1.7,13
      c0.1,0.5,0.6,1,1.1,1h15c0.5,0,1.2-0.4,1.4-0.9l3.3-8.1c0.2-0.5-0.1-0.9-0.6-0.9H12'/>
  </g>
</svg>

              <div class='legacy-cart icon-cart-quantity'>
                <span class='sqs-cart-quantity'>0</span>
              </div>
            </span>
          </a>
        </div>













<header
  data-test='header'
  id='header'

  class='





    header theme-col--primary
  '
  data-controller='Header'
  data-current-styles='{
&quot;layout&quot;: &quot;navRight&quot;,
&quot;action&quot;: {
&quot;buttonText&quot;: &quot;Get Started&quot;,
&quot;newWindow&quot;: false
},
&quot;showSocial&quot;: true,
&quot;socialOptions&quot;: {
&quot;socialBorderShape&quot;: &quot;none&quot;,
&quot;socialBorderStyle&quot;: &quot;outline&quot;,
&quot;socialBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;menuOverlayAnimation&quot;: &quot;fade&quot;,
&quot;cartStyle&quot;: &quot;cart&quot;,
&quot;cartText&quot;: &quot;Cart&quot;,
&quot;showEmptyCartState&quot;: true,
&quot;cartOptions&quot;: {
&quot;iconType&quot;: &quot;stroke-1&quot;,
&quot;cartBorderShape&quot;: &quot;none&quot;,
&quot;cartBorderStyle&quot;: &quot;outline&quot;,
&quot;cartBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;showButton&quot;: false,
&quot;showCart&quot;: false,
&quot;showAccountLogin&quot;: true,
&quot;headerStyle&quot;: &quot;dynamic&quot;,
&quot;languagePicker&quot;: {
&quot;enabled&quot;: false,
&quot;iconEnabled&quot;: false,
&quot;iconType&quot;: &quot;globe&quot;,
&quot;flagShape&quot;: &quot;shiny&quot;,
&quot;languageFlags&quot;: [ ]
},
&quot;mobileOptions&quot;: {
&quot;layout&quot;: &quot;logoLeftNavRight&quot;,
&quot;menuIcon&quot;: &quot;doubleLineHamburger&quot;,
&quot;menuIconOptions&quot;: {
&quot;style&quot;: &quot;doubleLineHamburger&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
}
},
&quot;dynamicOptions&quot;: {
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
}
}
},
&quot;solidOptions&quot;: {
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 100.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
}
},
&quot;gradientOptions&quot;: {
&quot;gradientType&quot;: &quot;faded&quot;,
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 90.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
}
},
&quot;showPromotedElement&quot;: false
}'
  data-section-id='header'
  data-header-theme=''
  data-menu-overlay-theme=''
  data-header-style='dynamic'
  data-language-picker='{
&quot;enabled&quot;: false,
&quot;iconEnabled&quot;: false,
&quot;iconType&quot;: &quot;globe&quot;,
&quot;flagShape&quot;: &quot;shiny&quot;,
&quot;languageFlags&quot;: [ ]
}'

  data-first-focusable-element
  tabindex='-1'
>



  <div class='header-announcement-bar-wrapper'
  >

    <a
      href='#page'

      tabindex='1'
      class='header-skip-link sqs-button-element--primary'
    >
      Skip to Content
    </a>



<style>
    @supports (-webkit-backdrop-filter: none) or (backdrop-filter: none) {
        .header-blur-background {


        }
    }
</style>
    <div
      class='header-border'
      data-header-style='dynamic'
      data-test='header-border'
      style='







    border-width: 0px !important;




'
    ></div>
    <div
      class='header-dropshadow'
      data-header-style='dynamic'
      data-test='header-dropshadow'
      style='

'
    ></div>



    <div class='header-inner container--fluid



       header-mobile-layout-logo-left-nav-right






       header-layout-nav-right








      '
      style='







    padding: 0;




'
      data-test='header-inner'
      >
      <!-- Background -->
      <div class='header-background theme-bg--primary'></div>

      <div class='header-display-desktop' data-content-field='site-title'>













          <!-- Social -->





          <!-- Title and nav wrapper -->
          <div class='header-title-nav-wrapper'>






              <!-- Title -->

                <div
                  class='
                    header-title

                  '
                  data-animation-role='header-element'
                >

                    <div class='header-title-text'>
                      <a id='site-title' href='/' data-animation-role='header-element'>$SITE_NAME</a>
                    </div>


                </div>



              <!-- Nav -->
              <div class='header-nav'>
                <div class='header-nav-wrapper'>
                  <nav class='header-nav-list'>




    <div class='header-nav-item header-nav-item--collection header-nav-item--active header-nav-item--homepage'>
      <a
        href='../../'
        data-animation-role='header-element'

          aria-current='page'

      >
        Home
      </a>
    </div>






    <div class='header-nav-item header-nav-item--collection'>
      <a
        href='about'
        data-animation-role='header-element'

      >
        About
      </a>
    </div>






    <div class='header-nav-item header-nav-item--folder'>
      <a
        class='header-nav-folder-title'
        href='../../magazine'

        data-animation-role='header-element'

      >
        Magazine
      </a>
      <div class='header-nav-folder-content'>






      </div>
    </div>





    <div class='header-nav-item header-nav-item--folder'>
      <a
        class='header-nav-folder-title'
        href='../../features'

        data-animation-role='header-element'

      >
        Features
      </a>
      <div class='header-nav-folder-content'>


			$FEATURES_MENU_NAV



      </div>
    </div>





                  </nav>
                </div>
              </div>


          </div>


          <!-- Actions -->
          <div class='header-actions header-actions--right'>



                <div class='header-actions-action header-actions-action--social'>


                      <a class='icon icon--fill  header-icon header-icon-border-shape-none header-icon-border-style-outline'  href='https://www.instagram.com/$INSTA' target='_blank' aria-label='Instagram'>
                        <svg viewBox='23 23 64 64'>
                          <use xlink:href='#instagram-unauth-icon' width='110' height='110'></use>
                        </svg>
                      </a>

                      <a class='icon icon--fill  header-icon header-icon-border-shape-none header-icon-border-style-outline'  href='https://www.facebook.com/$FB' target='_blank' aria-label='Facebook'>
                        <svg viewBox='23 23 64 64'>
                          <use xlink:href='#facebook-unauth-icon' width='110' height='110'></use>
                        </svg>
                      </a>


                </div>









            <div class='showOnMobile'>

            </div>


            <div class='showOnDesktop'>

            </div>


          </div>




<style>
  .top-bun,
  .patty,
  .bottom-bun {
    height: 1px;
  }
</style>

<!-- Burger -->
<div class='header-burger

  menu-overlay-has-visible-non-navigation-items

' data-animation-role='header-element'>
  <button class='header-burger-btn burger' data-test='header-burger'>
    <span hidden class='js-header-burger-open-title visually-hidden'>Open Menu</span>
    <span hidden class='js-header-burger-close-title visually-hidden'>Close Menu</span>
    <div class='burger-box'>
      <div class='burger-inner header-menu-icon-doubleLineHamburger'>
        <div class='top-bun'></div>
        <div class='patty'></div>
        <div class='bottom-bun'></div>
      </div>
    </div>
  </button>
</div>







      </div>
      <div class='header-display-mobile' data-content-field='site-title'>


          <!-- Social -->





          <!-- Title and nav wrapper -->
          <div class='header-title-nav-wrapper'>






              <!-- Title -->

                <div
                  class='
                    header-title

                  '
                  data-animation-role='header-element'
                >

                    <div class='header-title-text'>
                      <a id='site-title' href='/' data-animation-role='header-element'>$SITE_NAME</a>
                    </div>


                </div>



              <!-- Nav -->
              <div class='header-nav'>
                <div class='header-nav-wrapper'>
                  <nav class='header-nav-list'>




    <div class='header-nav-item header-nav-item--collection header-nav-item--active header-nav-item--homepage'>
      <a
        href='../../'
        data-animation-role='header-element'

          aria-current='page'

      >
        Home
      </a>
    </div>






    <div class='header-nav-item header-nav-item--collection'>
      <a
        href='../../about'
        data-animation-role='header-element'

      >
        About
      </a>
    </div>






    <div class='header-nav-item header-nav-item--folder'>
      <a
        class='header-nav-folder-title'
        href='../../magazine'

        data-animation-role='header-element'

      >
        Magazine
      </a>
     <div class='header-nav-folder-content'>
       $MAGAZINE_MENU_NAV

      </div>
    </div>





    <div class='header-nav-item header-nav-item--folder'>
      <a
        class='header-nav-folder-title'
        href='../../features'

        data-animation-role='header-element'

      >
        Features
      </a>
      <div class='header-nav-folder-content'>
       $FEATURES_MENU_NAV

      </div>
    </div>





                  </nav>
                </div>
              </div>


          </div>


          <!-- Actions -->
          <div class='header-actions header-actions--right'>



                <div class='header-actions-action header-actions-action--social'>


                      <a class='icon icon--fill  header-icon header-icon-border-shape-none header-icon-border-style-outline'  href='https://www.instagram.com/$INSTA/' target='_blank' aria-label='Instagram'>
                        <svg viewBox='23 23 64 64'>
                          <use xlink:href='#instagram-unauth-icon' width='110' height='110'></use>
                        </svg>
                      </a>

                      <a class='icon icon--fill  header-icon header-icon-border-shape-none header-icon-border-style-outline'  href='https://www.facebook.com/$FB' target='_blank' aria-label='Facebook'>
                        <svg viewBox='23 23 64 64'>
                          <use xlink:href='#facebook-unauth-icon' width='110' height='110'></use>
                        </svg>
                      </a>


                </div>









            <div class='showOnMobile'>

            </div>


            <div class='showOnDesktop'>

            </div>


          </div>




<style>
  .top-bun,
  .patty,
  .bottom-bun {
    height: 1px;
  }
</style>

<!-- Burger -->
<div class='header-burger

  menu-overlay-has-visible-non-navigation-items

' data-animation-role='header-element'>
  <button class='header-burger-btn burger' data-test='header-burger'>
    <span hidden class='js-header-burger-open-title visually-hidden'>Open Menu</span>
    <span hidden class='js-header-burger-close-title visually-hidden'>Close Menu</span>
    <div class='burger-box'>
      <div class='burger-inner header-menu-icon-doubleLineHamburger'>
        <div class='top-bun'></div>
        <div class='patty'></div>
        <div class='bottom-bun'></div>
      </div>
    </div>
  </button>
</div>






      </div>
    </div>
  </div>
  <!-- (Mobile) Menu Navigation -->
  <div class='header-menu header-menu--folder-list





    '
    data-current-styles='{
&quot;layout&quot;: &quot;navRight&quot;,
&quot;action&quot;: {
&quot;buttonText&quot;: &quot;Get Started&quot;,
&quot;newWindow&quot;: false
},
&quot;showSocial&quot;: true,
&quot;socialOptions&quot;: {
&quot;socialBorderShape&quot;: &quot;none&quot;,
&quot;socialBorderStyle&quot;: &quot;outline&quot;,
&quot;socialBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;menuOverlayAnimation&quot;: &quot;fade&quot;,
&quot;cartStyle&quot;: &quot;cart&quot;,
&quot;cartText&quot;: &quot;Cart&quot;,
&quot;showEmptyCartState&quot;: true,
&quot;cartOptions&quot;: {
&quot;iconType&quot;: &quot;stroke-1&quot;,
&quot;cartBorderShape&quot;: &quot;none&quot;,
&quot;cartBorderStyle&quot;: &quot;outline&quot;,
&quot;cartBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;showButton&quot;: false,
&quot;showCart&quot;: false,
&quot;showAccountLogin&quot;: true,
&quot;headerStyle&quot;: &quot;dynamic&quot;,
&quot;languagePicker&quot;: {
&quot;enabled&quot;: false,
&quot;iconEnabled&quot;: false,
&quot;iconType&quot;: &quot;globe&quot;,
&quot;flagShape&quot;: &quot;shiny&quot;,
&quot;languageFlags&quot;: [ ]
},
&quot;mobileOptions&quot;: {
&quot;layout&quot;: &quot;logoLeftNavRight&quot;,
&quot;menuIcon&quot;: &quot;doubleLineHamburger&quot;,
&quot;menuIconOptions&quot;: {
&quot;style&quot;: &quot;doubleLineHamburger&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
}
},
&quot;dynamicOptions&quot;: {
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
}
}
},
&quot;solidOptions&quot;: {
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 100.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
}
},
&quot;gradientOptions&quot;: {
&quot;gradientType&quot;: &quot;faded&quot;,
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 90.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
}
},
&quot;showPromotedElement&quot;: false
}'
    data-section-id='overlay-nav'
    data-show-account-login='true'
    data-test='header-menu'>
    <div class='header-menu-bg theme-bg--primary'></div>
    <div class='header-menu-nav'>
      <nav class='header-menu-nav-list'>
        <div data-folder='root' class='header-menu-nav-folder'>
          <!-- Menu Navigation -->
<div class='header-menu-nav-folder-content'>

  <div class='container header-menu-nav-item header-menu-nav-item--collection header-menu-nav-item--active header-menu-nav-item--homepage'>
    <a
      href='/'

        aria-current='page'

    >
      <div class='header-menu-nav-item-content'>
        Home
      </div>
    </a>
  </div>

  <div class='container header-menu-nav-item header-menu-nav-item--collection'>
    <a
      href='about'

    >
      <div class='header-menu-nav-item-content'>
        About
      </div>
    </a>
  </div>

  <div class='container header-menu-nav-item'>
    <a
      data-folder-id='magazine'
      href='magazine'

    >
      <div class='header-menu-nav-item-content'>
        <span class='visually-hidden'>Folder:</span>
        <span>Magazine</span>
        <span class='chevron chevron--right'></span>
      </div>
    </a>
  </div>
  <div data-folder='magazine' class='header-menu-nav-folder'>
    <div class='header-menu-nav-folder-content'>
    <div class='header-menu-controls container header-menu-nav-item'>
      <a class='header-menu-controls-control header-menu-controls-control--active' data-action='back' href='/'>
        <span class='chevron chevron--left'></span><span>Back</span>
      </a>
    </div>

    $CONTAINER_MENU_NAV

    </div>
  </div>

  <div class='container header-menu-nav-item'>
    <a
      data-folder-id='features'
      href='features'

    >
      <div class='header-menu-nav-item-content'>
        <span class='visually-hidden'>Folder:</span>
        <span>Features</span>
        <span class='chevron chevron--right'></span>
      </div>
    </a>
  </div>
  <div data-folder='features' class='header-menu-nav-folder'>
    <div class='header-menu-nav-folder-content'>
    <div class='header-menu-controls container header-menu-nav-item'>
      <a class='header-menu-controls-control header-menu-controls-control--active' data-action='back' href='/'>
        <span class='chevron chevron--left'></span><span>Back</span>
      </a>
    </div>

    $FEATURES_CONTAINER_MENU_NAV

    </div>
  </div>


</div>

          <div class='header-menu-actions'>
            <div class='header-menu-actions-action header-menu-actions-action--social mobile'>
              <a class='icon icon--lg icon--fill  header-icon header-icon-border-shape-none header-icon-border-style-outline'  href='https://www.instagram.com/$INSTA/' target='_blank' aria-label='Instagram'>
                <svg viewBox='23 23 64 64'>
                  <use xlink:href='#instagram-unauth-icon' width='110' height='110'></use>
                </svg>
              </a>
            </div>

            <div class='header-menu-actions-action header-menu-actions-action--social mobile'>
              <a class='icon icon--lg icon--fill  header-icon header-icon-border-shape-none header-icon-border-style-outline'  href='https://www.facebook.com/$FB' target='_blank' aria-label='Facebook'>
                <svg viewBox='23 23 64 64'>
                  <use xlink:href='#facebook-unauth-icon' width='110' height='110'></use>
                </svg>
              </a>
            </div>
            </div>


        </div>
      </nav>
    </div>
  </div>
</header>


<main id='page' class='container' role='main'>



		<article class='sections' data-page-sections='63a4cde853710b2ff4ba38b4' id='sections'>









<section data-test='page-section' data-section-theme='' class='page-section

      full-bleed-section
      layout-engine-section

    background-width--full-bleed

      section-height--medium


      content-width--wide

    horizontal-alignment--center
    vertical-alignment--middle




    ' data-section-id='63a4ce4708e3bd176d5818df' data-controller='SectionWrapperController' data-current-styles='{
&quot;imageOverlayOpacity&quot;: 0.15,
&quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
&quot;sectionHeight&quot;: &quot;section-height--medium&quot;,
&quot;customSectionHeight&quot;: 10,
&quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
&quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
&quot;contentWidth&quot;: &quot;content-width--wide&quot;,
&quot;customContentWidth&quot;: 50,
&quot;backgroundColor&quot;: &quot;&quot;,
&quot;sectionTheme&quot;: &quot;&quot;,
&quot;sectionAnimation&quot;: &quot;none&quot;,
&quot;backgroundMode&quot;: &quot;image&quot;
}' data-current-context='{
&quot;video&quot;: null,
&quot;backgroundImageId&quot;: null,
&quot;backgroundMediaEffect&quot;: null,
&quot;divider&quot;: null,
&quot;typeName&quot;: &quot;page&quot;
}' data-animation='none' data-fluid-engine-section='' style='padding-top: 476.633px;' data-controllers-bound='SectionWrapperController' data-active='true'>
  <div class='section-border'>
    <div class='section-background'>



    </div>
  </div>

  <div class='content-wrapper' style='



    '>
    <div class='content'>






      <div data-fluid-engine='true'><style>.fe-63a4ce47a941354aa255fa74 {
  --grid-gutter: calc(var(--sqs-mobile-site-gutter, 6vw) - 11.0px);
  --cell-max-width: calc( ( var(--sqs-site-max-width, 1500px) - (11.0px * (8 - 1)) ) / 8 );

  display: grid;
  position: relative;
  grid-area: 1/1/-1/-1;
  grid-template-rows: repeat(5,minmax(24px, auto));
  grid-template-columns:
    minmax(var(--grid-gutter), 1fr)
    repeat(8, minmax(0, var(--cell-max-width)))
    minmax(var(--grid-gutter), 1fr);
  row-gap: 11.0px;
  column-gap: 11.0px;
}

@media (min-width: 768px) {
  .background-width--inset .fe-63a4ce47a941354aa255fa74 {
    --inset-padding: calc(var(--sqs-site-gutter) * 2);
  }

  .fe-63a4ce47a941354aa255fa74 {
    --grid-gutter: calc(var(--sqs-site-gutter, 4vw) - 11.0px);
    --cell-max-width: calc( ( var(--sqs-site-max-width, 1500px) - (11.0px * (24 - 1)) ) / 24 );
    --inset-padding: 0vw;

    --row-height-scaling-factor: 0.0215;
    --container-width: min(var(--sqs-site-max-width, 1500px), calc(100vw - var(--sqs-site-gutter, 4vw) * 2 - var(--inset-padding) ));

    grid-template-rows: repeat(30,minmax(calc(var(--container-width) * var(--row-height-scaling-factor)), auto));
    grid-template-columns:
      minmax(var(--grid-gutter), 1fr)
      repeat(24, minmax(0, var(--cell-max-width)))
      minmax(var(--grid-gutter), 1fr);
  }
}


  .fe-block-yui_3_17_2_1_1671744676552_6306 {
    grid-area: 1/2/3/10;
    z-index: 1;
  }

  .fe-block-yui_3_17_2_1_1671744676552_6306 .sqs-block {
    justify-content: flex-start;
  }

  .fe-block-yui_3_17_2_1_1671744676552_6306 .sqs-block-alignment-wrapper {
    align-items: flex-start;
  }

  @media (min-width: 768px) {
    .fe-block-yui_3_17_2_1_1671744676552_6306 {
      grid-area: 1/2/29/26;
      z-index: 1;
    }

    .fe-block-yui_3_17_2_1_1671744676552_6306 .sqs-block {
      justify-content: flex-start;
    }

    .fe-block-yui_3_17_2_1_1671744676552_6306 .sqs-block-alignment-wrapper {
      align-items: flex-start;
    }
  }

  .fe-block-yui_3_17_2_1_1671744676552_168543 {
    grid-area: 3/2/4/10;
    z-index: 2;
  }

  .fe-block-yui_3_17_2_1_1671744676552_168543 .sqs-block {
    justify-content: center;
  }

  .fe-block-yui_3_17_2_1_1671744676552_168543 .sqs-block-alignment-wrapper {
    align-items: center;
  }

  @media (min-width: 768px) {
    .fe-block-yui_3_17_2_1_1671744676552_168543 {
      grid-area: 28/12/29/16;
      z-index: 2;
    }

    .fe-block-yui_3_17_2_1_1671744676552_168543 .sqs-block {
      justify-content: center;
    }

    .fe-block-yui_3_17_2_1_1671744676552_168543 .sqs-block-alignment-wrapper {
      align-items: center;
    }
  }

  .fe-block-yui_3_17_2_1_1671744676552_171927 {
    grid-area: 4/2/6/10;
    z-index: 3;
  }

  .fe-block-yui_3_17_2_1_1671744676552_171927 .sqs-block {
    justify-content: flex-start;
  }

  .fe-block-yui_3_17_2_1_1671744676552_171927 .sqs-block-alignment-wrapper {
    align-items: flex-start;
  }

  @media (min-width: 768px) {
    .fe-block-yui_3_17_2_1_1671744676552_171927 {
      grid-area: 29/2/31/26;
      z-index: 3;
    }

    .fe-block-yui_3_17_2_1_1671744676552_171927 .sqs-block {
      justify-content: flex-start;
    }

    .fe-block-yui_3_17_2_1_1671744676552_171927 .sqs-block-alignment-wrapper {
      align-items: flex-start;
    }
  }
</style><div class='fluid-engine fe-63a4ce47a941354aa255fa74'><div class='fe-block fe-block-yui_3_17_2_1_1671744676552_6306'><div class='sqs-block html-block sqs-block-html' data-block-type='2' id='block-yui_3_17_2_1_1671744676552_6306'><div class='sqs-block-content'>

<p class='' style='white-space:pre-wrap;'>$ARTICLE_TITLE</p><p class='sqsrte-small' style='white-space:pre-wrap;'><span class='sqsrte-text-color--darkAccent'>$BYLINE</span></p>
$PARAGRAPHS_OF_ARTICLE

</div></div></div><div class='fe-block fe-block-yui_3_17_2_1_1671744676552_168543'><div class='sqs-block horizontalrule-block sqs-block-horizontalrule' data-block-type='47' id='block-yui_3_17_2_1_1671744676552_168543'><div class='sqs-block-content'><hr></div></div></div><div class='fe-block fe-block-yui_3_17_2_1_1671744676552_171927'><div class='sqs-block html-block sqs-block-html' data-block-type='2' id='block-yui_3_17_2_1_1671744676552_171927'><div class='sqs-block-content'>

<p class='sqsrte-small' style='white-space:pre-wrap;'><span class='sqsrte-text-color--darkAccent'>$ABOUT_AUTHOR.</span></p>


</div></div></div></div></div>
    </div>
  </div>

</section>


</article>



      </main>

      <script type='text/javascript'>
        const firstSection = document.querySelector('.page-section');
        const header = document.querySelector('.header');
        const mobileOverlayNav = document.querySelector('.header-menu');
        const sectionBackground = firstSection ? firstSection.querySelector('.section-background') : null;
        const headerHeight = header ? header.getBoundingClientRect().height : 0;
        const firstSectionHasBackground = firstSection ? firstSection.className.indexOf('has-background') >= 0 : false;
        const isFirstSectionInset = firstSection ? firstSection.className.indexOf('background-width--inset') >= 0 : false;
        const isLayoutEngineSection = firstSection ? firstSection.className.indexOf('layout-engine-section') >= 0 : false;

        if (firstSection) {
          firstSection.style.paddingTop = headerHeight + 'px';
        }
        if (sectionBackground && isLayoutEngineSection) {
          if (isFirstSectionInset) {
            sectionBackground.style.top = headerHeight + 'px';
          } else {
            sectionBackground.style.top = '';
          }
        }
      </script>


        <footer class='sections' id='footer-sections' data-footer-sections>







<section
  data-test='page-section'

  data-section-theme=''
  class='page-section

      full-bleed-section
      layout-engine-section

    background-width--full-bleed


        section-height--custom



      content-width--wide

    horizontal-alignment--center
    vertical-alignment--middle




    '

  data-section-id='6356d2933d7aee4d0bac4976'

  data-controller='SectionWrapperController'
  data-current-styles='{
&quot;imageOverlayOpacity&quot;: 0.15,
&quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
&quot;sectionHeight&quot;: &quot;section-height--custom&quot;,
&quot;customSectionHeight&quot;: 0,
&quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
&quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
&quot;contentWidth&quot;: &quot;content-width--wide&quot;,
&quot;customContentWidth&quot;: 50,
&quot;sectionTheme&quot;: &quot;&quot;,
&quot;sectionAnimation&quot;: &quot;none&quot;,
&quot;backgroundMode&quot;: &quot;image&quot;,
&quot;imageEffect&quot;: &quot;none&quot;
}'
  data-current-context='{
&quot;video&quot;: {
&quot;playbackSpeed&quot;: 0.5,
&quot;filter&quot;: 2,
&quot;filterStrength&quot;: 0,
&quot;zoom&quot;: 0,
&quot;videoSourceProvider&quot;: &quot;none&quot;
},
&quot;backgroundImageId&quot;: null,
&quot;backgroundMediaEffect&quot;: {
&quot;type&quot;: &quot;none&quot;
},
&quot;divider&quot;: null,
&quot;typeName&quot;: &quot;page&quot;
}'
  data-animation='none'
  data-fluid-engine-section



>
  <div
    class='section-border'

  >
    <div class='section-background'>



    </div>
  </div>

  <div
    class='content-wrapper'
    style='




          padding-top: calc(0vmax / 10); padding-bottom: calc(0vmax / 10);


    '
  >
    <div
      class='content'

    >






      <div data-fluid-engine='true'><style>.fe-6356d2933d7aee4d0bac4975 {
  --grid-gutter: calc(var(--sqs-mobile-site-gutter, 6vw) - 11.0px);
  --cell-max-width: calc( ( var(--sqs-site-max-width, 1500px) - (11.0px * (8 - 1)) ) / 8 );

  display: grid;
  position: relative;
  grid-area: 1/1/-1/-1;
  grid-template-rows: repeat(15,minmax(24px, auto));
  grid-template-columns:
    minmax(var(--grid-gutter), 1fr)
    repeat(8, minmax(0, var(--cell-max-width)))
    minmax(var(--grid-gutter), 1fr);
  row-gap: 11.0px;
  column-gap: 11.0px;
}

@media (min-width: 768px) {
  .background-width--inset .fe-6356d2933d7aee4d0bac4975 {
    --inset-padding: calc(var(--sqs-site-gutter) * 2);
  }

  .fe-6356d2933d7aee4d0bac4975 {
    --grid-gutter: calc(var(--sqs-site-gutter, 4vw) - 11.0px);
    --cell-max-width: calc( ( var(--sqs-site-max-width, 1500px) - (11.0px * (24 - 1)) ) / 24 );
    --inset-padding: 0vw;

    --row-height-scaling-factor: 0.0215;
    --container-width: min(var(--sqs-site-max-width, 1500px), calc(100vw - var(--sqs-site-gutter, 4vw) * 2 - var(--inset-padding) ));

    grid-template-rows: repeat(8,minmax(calc(var(--container-width) * var(--row-height-scaling-factor)), auto));
    grid-template-columns:
      minmax(var(--grid-gutter), 1fr)
      repeat(24, minmax(0, var(--cell-max-width)))
      minmax(var(--grid-gutter), 1fr);
  }
}


  .fe-block-1a33dcfa68a7c41b12e8 {
    grid-area: 1/2/10/10;
    z-index: 0;
  }

  .fe-block-1a33dcfa68a7c41b12e8 .sqs-block {
    justify-content: flex-start;
  }

  .fe-block-1a33dcfa68a7c41b12e8 .sqs-block-alignment-wrapper {
    align-items: flex-start;
  }

  @media (min-width: 768px) {
    .fe-block-1a33dcfa68a7c41b12e8 {
      grid-area: 1/8/8/20;
      z-index: 0;
    }

    .fe-block-1a33dcfa68a7c41b12e8 .sqs-block {
      justify-content: flex-start;
    }

    .fe-block-1a33dcfa68a7c41b12e8 .sqs-block-alignment-wrapper {
      align-items: flex-start;
    }
  }

  .fe-block-46cff975ba27d218989a {
    grid-area: 10/2/11/10;
    z-index: 1;
  }

  .fe-block-46cff975ba27d218989a .sqs-block {
    justify-content: flex-start;
  }

  .fe-block-46cff975ba27d218989a .sqs-block-alignment-wrapper {
    align-items: flex-start;
  }

  @media (min-width: 768px) {
    .fe-block-46cff975ba27d218989a {
      grid-area: 8/10/9/18;
      z-index: 1;
    }

    .fe-block-46cff975ba27d218989a .sqs-block {
      justify-content: flex-start;
    }

    .fe-block-46cff975ba27d218989a .sqs-block-alignment-wrapper {
      align-items: flex-start;
    }
  }

  .fe-block-yui_3_17_2_1_1668784490312_50298 {
    grid-area: 11/2/16/10;
    z-index: 2;
  }

  .fe-block-yui_3_17_2_1_1668784490312_50298 .sqs-block {
    justify-content: flex-start;
  }

  .fe-block-yui_3_17_2_1_1668784490312_50298 .sqs-block-alignment-wrapper {
    align-items: flex-start;
  }

  @media (min-width: 768px) {
    .fe-block-yui_3_17_2_1_1668784490312_50298 {
      grid-area: 2/2/7/8;
      z-index: 2;
    }

    .fe-block-yui_3_17_2_1_1668784490312_50298 .sqs-block {
      justify-content: flex-start;
    }

    .fe-block-yui_3_17_2_1_1668784490312_50298 .sqs-block-alignment-wrapper {
      align-items: flex-start;
    }
  }

</style><div class='fluid-engine fe-6356d2933d7aee4d0bac4975'><div class='fe-block fe-block-1a33dcfa68a7c41b12e8'><div class='sqs-block newsletter-block sqs-block-newsletter' data-block-type='51' id='block-1a33dcfa68a7c41b12e8'><div class='sqs-block-content'>




<div class='newsletter-form-wrapper

  newsletter-form-wrapper--layoutFloat
  newsletter-form-wrapper--alignCenter

  '
  >
  <form
     class='newsletter-form'
     data-form-id='6356d2933d7aee4d0bac4973'

     autocomplete='on'
     method='POST'
     novalidate
     onsubmit='return (function (form) {
    Y.use('squarespace-form-submit', 'node', function usingFormSubmit(Y) {
      (new Y.Squarespace.FormSubmit(form)).submit({
        formId: '6356d2933d7aee4d0bac4973',
        collectionId: '63a4c9172e5a7814cdc4fd29',
        objectName: '1a33dcfa68a7c41b12e8'
      });
    });
    return false;
  })(this);'>
    <header class='newsletter-form-header'>

      <div class='newsletter-form-header-description'><p class='' style='white-space:pre-wrap;'>Sign up to receive news and updates.</p></div>
    </header>
    <div class='newsletter-form-body'>
      <div class='newsletter-form-fields-wrapper form-fields' style='vertical-align: middle;'>



            <div id='email-yui_3_17_2_1_1558377152037_12926' class='newsletter-form-field-wrapper form-item field email required' style='vertical-align: bottom;'>
              <label class='newsletter-form-field-label title' for='email-yui_3_17_2_1_1558377152037_12926-field'>Email Address</label>
              <input id='email-yui_3_17_2_1_1558377152037_12926-field' class='newsletter-form-field-element field-element' name='email' x-autocompletetype='email' autocomplete='email' type='email' spellcheck='false' placeholder='Email Address' />
            </div>




      </div>
      <div data-animation-role='button' class='newsletter-form-button-wrapper submit-wrapper' style='vertical-align: middle;'>
        <button
          class='
            newsletter-form-button
            sqs-system-button
            sqs-editable-button-layout
            sqs-editable-button-style
            sqs-editable-button-shape
            sqs-button-element--primary
          '
          type='submit'
          value='Sign Up'
        >
          <span class='newsletter-form-spinner sqs-spin light large'></span>
          <span class='newsletter-form-button-label'>Sign Up</span>
          <span class='newsletter-form-button-icon'></span>
        </button>
      </div>

        <div class='model'></div>


    </div>
    <div class='newsletter-form-footnote'><p class='' style='white-space:pre-wrap;'>We respect your privacy</p></div>
    <div class='hidden form-submission-text'><p class='' style='white-space:pre-wrap;'>Thank you! Remember to confirm your sign up in the email that will be sent to your inbox shortly.</p></div>
    <div class='hidden form-submission-html' data-submission-html=''></div>
  </form>
</div>
</div></div></div><div class='fe-block fe-block-46cff975ba27d218989a'><div class='sqs-block html-block sqs-block-html' data-block-type='2' id='block-46cff975ba27d218989a'><div class='sqs-block-content'>

<p style='text-align:center;white-space:pre-wrap;' class='sqsrte-small'><a href='about/'>About</a>     <a href='tc'>Privacy Policy</a></p>


</div></div></div><div class='fe-block fe-block-yui_3_17_2_1_1668784490312_50298'><div class='sqs-block search-block sqs-block-search' data-block-type='33' id='block-yui_3_17_2_1_1668784490312_50298'><div class='sqs-block-content'>

<div class='sqs-search-ui-text-input sqs-search-ui-button-wrapper color-light' data-source='block' data-preview='true' data-collection=''>
  <div class='spinner-wrapper'></div>
  <input
    type='search'
    class='search-input'
    value=''
    placeholder='Search'
    aria-label='Search'
  />
</div>
</div></div></div></div></div>
    </div>
  </div>

</section>


</footer>

    </div>
<script defer='defer' src='https://static1.squarespace.com/static/vta/5c5a519771c10ba3470d8101/scripts/site-bundle.99163b73755b8f7c4a34d12baf96779c.js' type='text/javascript'></script>
    <svg xmlns='http://www.w3.org/2000/svg' version='1.1' style='display:none' data-usage='social-icons-svg'><symbol id='instagram-unauth-icon' viewBox='0 0 64 64'><path d='M46.91,25.816c-0.073-1.597-0.326-2.687-0.697-3.641c-0.383-0.986-0.896-1.823-1.73-2.657c-0.834-0.834-1.67-1.347-2.657-1.73c-0.954-0.371-2.045-0.624-3.641-0.697C36.585,17.017,36.074,17,32,17s-4.585,0.017-6.184,0.09c-1.597,0.073-2.687,0.326-3.641,0.697c-0.986,0.383-1.823,0.896-2.657,1.73c-0.834,0.834-1.347,1.67-1.73,2.657c-0.371,0.954-0.624,2.045-0.697,3.641C17.017,27.415,17,27.926,17,32c0,4.074,0.017,4.585,0.09,6.184c0.073,1.597,0.326,2.687,0.697,3.641c0.383,0.986,0.896,1.823,1.73,2.657c0.834,0.834,1.67,1.347,2.657,1.73c0.954,0.371,2.045,0.624,3.641,0.697C27.415,46.983,27.926,47,32,47s4.585-0.017,6.184-0.09c1.597-0.073,2.687-0.326,3.641-0.697c0.986-0.383,1.823-0.896,2.657-1.73c0.834-0.834,1.347-1.67,1.73-2.657c0.371-0.954,0.624-2.045,0.697-3.641C46.983,36.585,47,36.074,47,32S46.983,27.415,46.91,25.816z M44.21,38.061c-0.067,1.462-0.311,2.257-0.516,2.785c-0.272,0.7-0.597,1.2-1.122,1.725c-0.525,0.525-1.025,0.85-1.725,1.122c-0.529,0.205-1.323,0.45-2.785,0.516c-1.581,0.072-2.056,0.087-6.061,0.087s-4.48-0.015-6.061-0.087c-1.462-0.067-2.257-0.311-2.785-0.516c-0.7-0.272-1.2-0.597-1.725-1.122c-0.525-0.525-0.85-1.025-1.122-1.725c-0.205-0.529-0.45-1.323-0.516-2.785c-0.072-1.582-0.087-2.056-0.087-6.061s0.015-4.48,0.087-6.061c0.067-1.462,0.311-2.257,0.516-2.785c0.272-0.7,0.597-1.2,1.122-1.725c0.525-0.525,1.025-0.85,1.725-1.122c0.529-0.205,1.323-0.45,2.785-0.516c1.582-0.072,2.056-0.087,6.061-0.087s4.48,0.015,6.061,0.087c1.462,0.067,2.257,0.311,2.785,0.516c0.7,0.272,1.2,0.597,1.725,1.122c0.525,0.525,0.85,1.025,1.122,1.725c0.205,0.529,0.45,1.323,0.516,2.785c0.072,1.582,0.087,2.056,0.087,6.061S44.282,36.48,44.21,38.061z M32,24.297c-4.254,0-7.703,3.449-7.703,7.703c0,4.254,3.449,7.703,7.703,7.703c4.254,0,7.703-3.449,7.703-7.703C39.703,27.746,36.254,24.297,32,24.297z M32,37c-2.761,0-5-2.239-5-5c0-2.761,2.239-5,5-5s5,2.239,5,5C37,34.761,34.761,37,32,37z M40.007,22.193c-0.994,0-1.8,0.806-1.8,1.8c0,0.994,0.806,1.8,1.8,1.8c0.994,0,1.8-0.806,1.8-1.8C41.807,22.999,41.001,22.193,40.007,22.193z'/></symbol><symbol id='instagram-unauth-mask' viewBox='0 0 64 64'><path d='M43.693,23.153c-0.272-0.7-0.597-1.2-1.122-1.725c-0.525-0.525-1.025-0.85-1.725-1.122c-0.529-0.205-1.323-0.45-2.785-0.517c-1.582-0.072-2.056-0.087-6.061-0.087s-4.48,0.015-6.061,0.087c-1.462,0.067-2.257,0.311-2.785,0.517c-0.7,0.272-1.2,0.597-1.725,1.122c-0.525,0.525-0.85,1.025-1.122,1.725c-0.205,0.529-0.45,1.323-0.516,2.785c-0.072,1.582-0.087,2.056-0.087,6.061s0.015,4.48,0.087,6.061c0.067,1.462,0.311,2.257,0.516,2.785c0.272,0.7,0.597,1.2,1.122,1.725s1.025,0.85,1.725,1.122c0.529,0.205,1.323,0.45,2.785,0.516c1.581,0.072,2.056,0.087,6.061,0.087s4.48-0.015,6.061-0.087c1.462-0.067,2.257-0.311,2.785-0.516c0.7-0.272,1.2-0.597,1.725-1.122s0.85-1.025,1.122-1.725c0.205-0.529,0.45-1.323,0.516-2.785c0.072-1.582,0.087-2.056,0.087-6.061s-0.015-4.48-0.087-6.061C44.143,24.476,43.899,23.682,43.693,23.153z M32,39.703c-4.254,0-7.703-3.449-7.703-7.703s3.449-7.703,7.703-7.703s7.703,3.449,7.703,7.703S36.254,39.703,32,39.703z M40.007,25.793c-0.994,0-1.8-0.806-1.8-1.8c0-0.994,0.806-1.8,1.8-1.8c0.994,0,1.8,0.806,1.8,1.8C41.807,24.987,41.001,25.793,40.007,25.793z M0,0v64h64V0H0z M46.91,38.184c-0.073,1.597-0.326,2.687-0.697,3.641c-0.383,0.986-0.896,1.823-1.73,2.657c-0.834,0.834-1.67,1.347-2.657,1.73c-0.954,0.371-2.044,0.624-3.641,0.697C36.585,46.983,36.074,47,32,47s-4.585-0.017-6.184-0.09c-1.597-0.073-2.687-0.326-3.641-0.697c-0.986-0.383-1.823-0.896-2.657-1.73c-0.834-0.834-1.347-1.67-1.73-2.657c-0.371-0.954-0.624-2.044-0.697-3.641C17.017,36.585,17,36.074,17,32c0-4.074,0.017-4.585,0.09-6.185c0.073-1.597,0.326-2.687,0.697-3.641c0.383-0.986,0.896-1.823,1.73-2.657c0.834-0.834,1.67-1.347,2.657-1.73c0.954-0.371,2.045-0.624,3.641-0.697C27.415,17.017,27.926,17,32,17s4.585,0.017,6.184,0.09c1.597,0.073,2.687,0.326,3.641,0.697c0.986,0.383,1.823,0.896,2.657,1.73c0.834,0.834,1.347,1.67,1.73,2.657c0.371,0.954,0.624,2.044,0.697,3.641C46.983,27.415,47,27.926,47,32C47,36.074,46.983,36.585,46.91,38.184z M32,27c-2.761,0-5,2.239-5,5s2.239,5,5,5s5-2.239,5-5S34.761,27,32,27z'/></symbol><symbol id='facebook-unauth-icon' viewBox='0 0 64 64'><path d='M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z'/></symbol><symbol id='facebook-unauth-mask' viewBox='0 0 64 64'><path d='M0,0v64h64V0H0z M39.6,22l-2.8,0c-2.2,0-2.6,1.1-2.6,2.6V28h5.3l-0.7,5.3h-4.6V47h-5.5V33.3H24V28h4.6V24 c0-4.6,2.8-7,6.9-7c2,0,3.6,0.1,4.1,0.2V22z'/></symbol></svg>

  </body>
</html>";
?>