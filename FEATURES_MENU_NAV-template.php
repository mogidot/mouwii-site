<?php

require_once __DIR__.'/tsv-to-array.inc.php';
$file = __DIR__.'/ARTICLES.tsv';
$data = tsv_to_array($file, array('header_row'=>true, 'remove_header_row'=>true));


foreach($data as $item)
{
$ARTICLE_LINK=$item["ARTICLE_LINK"];
$ARTICLE_TITLE=$item["ARTICLE_TITLE"];
$BYLINE=$item["BYLINE"];
echo "
<div class='header-nav-folder-item'>
  <a href='articles/$ARTICLE_LINK' >
    <div class='header-nav-folder-item-content'>
      $ARTICLE_TITLE $BYLINE
    </div>
  </a>
</div>
";
}




?>
