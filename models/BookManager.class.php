<?php
class BookManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function search($name, $author)
	{
		$request = "SELECT * FROM books WHERE ";
		if ($name != "")
		{
			$name = mysqli_real_escape_string($this->db, $name);
			$request .= " name LIKE '%".$name."%' ";
		}
		if ($author != "")
		{
			$author = mysqli_real_escape_string($this->db, $author);
			$request .= " author LIKE '%".$author."%' ";
		}
		$request .= " ORDER BY name DESC";
		$list = [];
		$res = mysqli_query($this->db, $request);
		while ($book = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $book;
		}
		return $list;
	}
	public function findGenders()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT gender FROM books GROUP BY gender ORDER BY gender");
		while ($gender = mysqli_fetch_assoc($res))
		{
			$list[] = $gender['gender'];
		}
		return $list;
	}
	public function findAll()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT * FROM books ORDER BY name DESC LIMIT 10");
		while ($book = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $book;
		}
		return $list;
	}
}
?>