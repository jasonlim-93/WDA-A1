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
	
	require 'wine_db.inc';
	
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
		
	$result_all = "select wine_name, winery_name, variety, region_name, cost, on_hand, year, count(items.cust_id) as total
						from wine, winery, items, region, inventory, grape_variety, wine_variety
					where 
						wine.wine_id = inventory.wine_id and wine.wine_id = wine_variety.wine_id and wine_variety.variety_id = grape_variety.variety_id and
						wine.winery_id = winery.winery_id and winery.region_id = region.region_id and wine.wine_id = items.wine_id and wine_name like '%".$winename."%' and
						winery_name like '%".$wineryname."%' and region_name like '%".$region."%' and on_hand >= '".$stock."' and (cost between '".$price_min."' and '".$price_max."') and
						(year between '".$year_start."' and '".$year_end."')
		
					group by wine.wine_name,winery.winery_name, grape_variety.variety,region.region_name,wine.year,inventory.on_hand,inventory.cost
		
					having (total >= '".$customer."') ";
					
	
					
	if (!($conn = @ mysql_connect($hostName, $username, $password)))
			die("Fail to connect to the database");

	if (!(mysql_select_db($databaseName, $conn)))
			showerror();

	if (!($query = @ mysql_query ($result_all, $conn)))
			showerror();
					
	$template = new HTML_Template_IT(".");

	$template->loadTemplatefile("wine_store_template_IT.tpl", true, true);		
	
		if($year_end <= $year_start || $price_max <= $price_min)
		
		{	
			
		}
		
		else if (mysql_num_rows($query) == 0)
		{
		
		}
		
		else
		{
			
		while ($row =  mysql_fetch_array($query))
		
	}
		$template->show();
		
		function display_error()
	{
		print '<table>
		
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;"> Validation error detected ! </td> </tr>
					
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;"> There are a few of the reasons , you see this screen is because : </td> </tr>
					
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;"> 1. One of the search field is left empty .</td> </tr>
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;"> 2. The maximum price is more than the minimum price .</td> </tr>
		    <tr> <td colspan="8" style="text-align:center; color:#0000CC;"> 3. The maximum number of customer purchased is more than the minimum number of customer purchased .</td> </tr>
					
			</table>';
	}
?>
</body>
</html>

	
