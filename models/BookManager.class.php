<?php
class BookManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function search($name, $author, $country, $gender, $year1, $year2, $editorial, $isbn, $price1, $price2)
	{
		$request = "SELECT * FROM books WHERE 1 ";
		if ($name != "")
		{
			$name = mysqli_real_escape_string($this->db, $name);
			$request .= "AND name LIKE '%".$name."%' ";
		}
		if ($author != "")
		{
			$author = mysqli_real_escape_string($this->db, $author);
			$request .= "AND author LIKE '%".$author."%' ";
		}
		if ($country != "")
		{
			$country = mysqli_real_escape_string($this->db, $country);
			$request .= "AND country LIKE '%".$country."%' ";
		}
		if ($gender != "")
		{
			$gender = mysqli_real_escape_string($this->db, $gender);
			$request .= "AND gender LIKE '%".$gender."%' ";
		}
		if ($year1 != "")
		{
			$year1 = intval($year1);
			$request .= "AND YEAR (year) >= '".$year1."'";
		}
		if ($year2!= "")
		{
			$year2 = intval($year2);
			$request .= "AND YEAR (year) <= '".$year2."'";
		}
		if ($editorial != "")
		{
			$editorial = mysqli_real_escape_string($this->db, $editorial);
			$request .= "AND editorial LIKE '%".$editorial."%' ";
		}
		if ($isbn != "")
		{
			$isbn = mysqli_real_escape_string($this->db, $isbn);
			$request .= "AND isbn LIKE '%".$isbn."%' ";
		}
		if ($price1!= "")
		{
			$price1 = intval($price1);
			$request .= "AND price >= '".$price1."'";
		}
		if ($price2!= "")
		{
			$price2 = intval($price2);
			$request .= "AND price <= '".$price2."'";
		}
		$request .= " ORDER BY name DESC LIMIT 10";
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