bash articulate.sh
bash navigate.sh
f=$(cat SECTIONS.tsv)
ff=${f:12}
for l in $ff; do
	echo $l
	php USER_ITEMS_DATA-template.php section=$l > itemdata/$l.dat
	php SECTION_LIST_ITEM-template.php section=$l > itemdata/$l.html
	done;
php SECTION-template.php> SECTIONS.html

php main.php> index.html