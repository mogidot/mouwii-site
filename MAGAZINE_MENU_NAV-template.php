<?php

require_once __DIR__.'/tsv-to-array.inc.php';
$file = __DIR__.'/ISSUES.tsv';
$data = tsv_to_array($file, array('header_row'=>true, 'remove_header_row'=>true));


foreach($data as $item)
{
$ISSUE_LINK=$item["ISSUE_LINK"];
$ISSUE_TITLE=$item["ISSUE_TITLE"];
$CREDITS=$item["CREDITS"];
echo "
<div class='header-nav-folder-item'>
  <a href='magazine/$ISSUE_LINK' >
    <div class='header-nav-folder-item-content'>
      $ISSUE_TITLE $CREDITS
    </div>
  </a>
</div>
";
}




?>
