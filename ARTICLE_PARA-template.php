<?php
parse_str(implode('&', array_slice($argv, 1)), $_GET);
$ARTICLE_ID=$_GET['article_id'];

$files = glob("articles/$ARTICLE_ID/*.md");

    foreach($files as $file) {
        $content = implode("<br>",file($file));
        echo "<p class='sqsrte-small' data-rte-preserve-empty='true' style='white-space:pre-wrap;'>$content</p>";
    }
