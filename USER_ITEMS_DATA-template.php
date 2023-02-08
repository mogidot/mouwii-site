	 <?php
	 parse_str(implode('&', array_slice($argv, 1)), $_GET);
	 $SECTION=$_GET["section"];
	 require_once __DIR__.'/tsv-to-array.inc.php';
	 $file = __DIR__."/sections/$SECTION.tsv";
	$data = tsv_to_array($file, array('header_row'=>true, 'remove_header_row'=>true));


foreach($data as $item){
	$ASSET_URL=$item["ASSET_URL"];
$PUBLICATION=$item["PUBLICATION"];
$AUTHOR_ID=$item["AUTHOR_ID"];
$DISPLAYNAME=$item["DISPLAYNAME"];
$LASTNAME=$item["LASTNAME"];
$ARTICLE_TITLE=$item["ARTICLE_TITLE"];
$ARTICLE_LINK=$item["ARTICLE_LINK"];
$CREDITS=$item["CREDITS"];
$ARTICLE_TYPE=$item["ARTICLE_TYPE"];
$FIRSTNAME=$item["FIRSTNAME"];
$LIKES=$item["LIKES"];
$COMMENTS=$item["COMMENTS"];
$BODY=$item["BODY"];
	echo
	 "


	{
	&quot;title&quot;: &quot;$ARTICLE_TITLE&quot;,
	&quot;description&quot;: &quot;&lt;p class=\&quot;\&quot; style=\&quot;white-space:pre-wrap;\&quot;&gt;$CREDITS&lt;\/p&gt;&lt;p class=\&quot;\&quot; style=\&quot;white-space:pre-wrap;\&quot;&gt;$ARTICLE_TYPE | $PUBLICATION&lt;\/p&gt;&lt;p class=\&quot;\&quot; style=\&quot;white-space:pre-wrap;\&quot;&gt;&lt;a href=\&quot;$ARTICLE_LINK\&quot;&gt;View&lt;\/a&gt;&lt;\/p&gt;&quot;,
	&quot;button&quot;: {
	&quot;buttonText&quot;: &quot;View&quot;,
	&quot;buttonLink&quot;: &quot;$ARTICLE_LINK&quot;
	},
	&quot;imageId&quot;: &quot;63a61b27237e0e2a7a3ea7e1&quot;,
	&quot;image&quot;: {
	&quot;id&quot;: &quot;63a61b27237e0e2a7a3ea7e1&quot;,
	&quot;recordType&quot;: 2,
	&quot;addedOn&quot;: 1671830311937,
	&quot;updatedOn&quot;: 1671830312017,
	&quot;workflowState&quot;: 1,
	&quot;publishOn&quot;: 1671830311937,
	&quot;authorId&quot;: &quot;$AUTHOR_ID&quot;,
	&quot;systemDataId&quot;: &quot;cc4de2c9-ae10-496b-b91a-a13af09ea794&quot;,
	&quot;systemDataVariants&quot;: &quot;2136x3000,100w,300w,500w,750w,1000w,1500w&quot;,
	&quot;systemDataSourceType&quot;: &quot;JPG&quot;,
	&quot;filename&quot;: &quot;$FIRSTNAME&quot;,
	&quot;mediaFocalPoint&quot;: {
	&quot;x&quot;: 0.5,
	&quot;y&quot;: 0.5,
	&quot;source&quot;: 3
	},
	&quot;colorData&quot;: {
	&quot;topLeftAverage&quot;: &quot;a1a09b&quot;,
	&quot;topRightAverage&quot;: &quot;9c9b95&quot;,
	&quot;bottomLeftAverage&quot;: &quot;655e52&quot;,
	&quot;bottomRightAverage&quot;: &quot;645c51&quot;,
	&quot;centerAverage&quot;: &quot;443b31&quot;,
	&quot;suggestedBgColor&quot;: &quot;625d54&quot;
	},
	&quot;urlId&quot;: &quot;kiax6e88b6e4ho0060fjzi3p3pwbrk&quot;,
	&quot;title&quot;: &quot;&quot;,
	&quot;body&quot;: $BODY,
	&quot;likeCount&quot;:$LIKES,
	&quot;commentCount&quot;: $COMMENTS,
	&quot;publicCommentCount&quot;: 0,
	&quot;commentState&quot;: 2,
	&quot;unsaved&quot;: false,
	&quot;author&quot;: {
	&quot;id&quot;: &quot;$AUTHOR_ID&quot;,
	&quot;displayName&quot;: &quot;$DISPLAYNAME&quot;,
	&quot;firstName&quot;: &quot;$FIRSTNAME&quot;,
	&quot;lastName&quot;: &quot;$LASTNAME&quot;,
	&quot;bio&quot;: &quot;&quot;
	},
	&quot;assetUrl&quot;: &quot;$ASSET_URL&quot;,
	&quot;contentType&quot;: &quot;image/jpeg&quot;,
	&quot;items&quot;: [ ],
	&quot;pushedServices&quot;: { },
	&quot;pendingPushedServices&quot;: { },
	&quot;originalSize&quot;: &quot;2136x3000&quot;,
	&quot;recordTypeLabel&quot;: &quot;image&quot;
	}
	},





	" ;

}
	?>