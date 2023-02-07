for f in articles/*/;do
	ff="${f#articles/}"
	ff="${ff%/}"
	echo $ff
	php ARTICLE_PARA-template.php article_id="$ff"> articles/$ff/body.draft
	php ARTICLE-template.php article_id="$ff" > articles/$ff/index.html

done;