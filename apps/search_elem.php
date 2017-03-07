<?php
$manager = new BookManager($db);
if (isset($_GET['name'], $_GET['author']))
{
	$list = $manager->search($_GET['name'], $_GET['author']);
	foreach ($list AS $book)
	{
		require('views/search_elem.phtml');
	}
}
?>