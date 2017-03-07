
<?php
$manager = new BookManager($db);
$list = $manager->findAll();
foreach ($list AS $book)
{
	require('views/search_elem.phtml');
}
?>
<!-- 

<//?php
$manager = new BookManager($db);
if (isset($_GET['name'], $_GET['author']))
{
	$list = $manager->search($_GET['name'], $_GET['author'], $_GET['gender'], $_GET['year1'], $_GET['year2'], $_GET['editorial'], $_GET['isbn'], $_GET['price1'], $_GET['price2']);
	foreach ($list AS $book)
	{
		require('views/search_elem.phtml');
		var_dump($_GET)
	}
}
?> -->