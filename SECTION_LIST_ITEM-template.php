
<?php

parse_str(implode('&', array_slice($argv, 1)), $_GET);
	 $SECTION=$_GET["section"];
	 require_once __DIR__.'/tsv-to-array.inc.php';
	 $file = __DIR__."/sections/$SECTION.tsv";
	$data = tsv_to_array($file, array('header_row'=>true, 'remove_header_row'=>true));

foreach($data as $item){



$ARTICLE_LINK=$item["ARTICLE_LINK"];
$ARTICLE_TYPE=$item["ARTICLE_TYPE"];
$ASSET_URL=$item["ASSET_URL"];
$CREDITS=$item["CREDITS"];
$ARTICLE_TITLE=$item["ARTICLE_TITLE"];
$PUBLICATION=$item["PUBLICATION"];




echo

"

<li
      class='
        list-item

      '
      style='

      '
      data-is-card-enabled='false'
    >





      <div class='list-item-media'
        style='

            margin-bottom: 4%;

          width: 50%;
        '
      >
        <div class='list-item-media-inner'
          data-aspect-ratio='1:1'
          data-animation-role='image'
        >
          <img

            data-image-focal-point=','
            alt=''
            src='$ASSET_URL'
            class='list-image'
            data-load='true'
            data-mode='cover'
            data-use-advanced-positioning='true'
          />
        </div>
      </div>



        <div class='list-item-content'>


    <div class='list-item-content__text-wrapper'>


        <h2
          class='list-item-content__title'
          style='max-width: 75%;'
        >$ARTICLE_TITLE</h2>



        <div class='list-item-content__description

          '
          style='
            margin-top: 1%;
            max-width: 75%;
          '
        >
          <p class='' style='white-space:pre-wrap;'>$CREDITS</p><p class='' style='white-space:pre-wrap;'>$ARTICLE_TYPE | $PUBLICATION</p><p class='' style='white-space:pre-wrap;'><a href='$ARTICLE_LINK'>View</a></p>
        </div>


    </div>



</div>



    </li>";

    }


    ?>