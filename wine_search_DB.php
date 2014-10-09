<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd"/>
<html>
<head>
	<meta charset="UTF-8">
	<title>Jason's Wine Store : Results </title>
</head>

<?php
	
	set_include_path('C:/wamp/bin/php/php5.4.16/pear');
	require_once "HTML/Template/IT.php";
	
	require "DB.php";
	
	$winename = $_GET['winename'];
	$wineryname = $_GET['wineryname'];
	$region = $_GET['region'];
	$year_start = $_GET['year_start'];
	$year_end = $_GET['year_end'];
	$stock = $_GET['stock'];
	$customer = $_GET['customer'];
	$price_min = $_GET['price_min'];
	$price_max = $_GET['price_max'];
	
	if($year_start == null)
	{
		$year_start = 1970;
	}
	
	if($year_end == null)
	{
		$year_end = 1999;
	}
	
	if($price_min == null)
	{
		$price_min = 0;
	}
	
	if($price_max == null)
	{
		$price_max = 9999;
	}
		

?>		
</body>
</html>
			
		
	
	
