$(document).ready(function()
{
	$('.search-input, .search-input-numbers').keyup(function()
	{
		var name = encodeURIComponent($('#name').val());
		var isbn = encodeURIComponent($('#isbn').val());
		var author = encodeURIComponent($('#author').val());
		var country = encodeURIComponent($('#country').val());
		var gender = encodeURIComponent($('#gender').val());
		var year1 = encodeURIComponent($('#year1').val());
		var year2 = encodeURIComponent($('#year2').val());
		var editorial = encodeURIComponent($('#editorial').val());
		var price1 = encodeURIComponent($('#price1').val());
		var price2 = encodeURIComponent($('#price2').val());
		$('#resultats').load("index.php?page=search_elem&ajax&name="+name+"&isbn="+isbn+"&author="+author+"&country="+country+"&gender="+gender+"&year1="+year1+"&year2="+year2+"&editorial="+editorial+"&price1="+price1+"&price2="+price2);
		alert("index.php?page=search_elem&ajax&name="+name+"&isbn="+isbn+"&author="+author+"&country="+country+"&gender="+gender+"&year1="+year1+"&year2="+year2+"&editorial="+editorial+"&price1="+price1+"&price2="+price2)
	});
});
