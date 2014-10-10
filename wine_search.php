<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd"/>
<html>
<head>
	<meta charset="UTF-8">
	<title>Jason's Wine Store : Results </title>
	<style>	
	
	input[type='text']
	{
	font-family:Lucida Console;
	}
	
	input:focus 
	{
    border-color: #0000CC;
	}
	
	td
	{	
		font-family:Lucida Console;
		padding: 12px;
	}
	
	table
	{
		align: center;
		margin: auto;
		border: 1px ridge #9900CC;;
		padding: 3px;
	}
	
	</style>
</head>

<body>
	<table width="1200px">
		<tr>
			<td align="center">
				<img src ="wine_logo.jpg" alt="Wine store logo"
				style="width:450px; height:235px; "/>
			</td>
		</tr>
	</table>
	
<?php
	
	$winename = $_GET['winename'];
	$wineryname = $_GET['wineryname'];
	$region = $_GET['region'];
	$year_start = $_GET['year_start'];
	$year_end = $_GET['year_end'];
	$stock = $_GET['stock'];
	$customer = $_GET['customer'];
	$price_min = $_GET['price_min'];
	$price_max = $_GET['price_max'];
	
	function display_ok($query)
	{
		if(mysqli_num_rows($query) == 0)
		{
			print '<table>
			
			<tr>
				<td colspan="8" style="text-align:center; color:#0000CC;">
				
				<br/> 
				
					The wine you are looking for is not found is our store database currently , please try again later .
				</td>
			</tr>
			
			</table>';
		}
		
		else
		{
		print '<table>
	
		<tr>
			<td colspan="8" style="text-align:center; color:#0000CC;">
				Your search results is as below :
			</td>
		</tr>
		<tr>
			<th>Wine Name</th>
			<th>Wine Variety</th>
			<th>Year</th>
			<th>Winery</th>
			<th>Region</th>
			<th>Price</th>
			<th>Number of Stock</th>
			<th>Number of Customer</th>
		</tr>';
		
		while ($row =  mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>".($row["wine_name"])."</td>";
			echo "<td>".($row["variety"])."</td>";
			echo "<td>".($row["year"])."</td>";
			echo "<td>".($row["winery_name"])."</td>";
			echo "<td>".($row["region_name"])."</td>";
			echo "<td>".($row["cost"])."</td>";
			echo "<td>".($row["on_hand"])."</td>";
			echo "<td>".($row["total"])."</td>";
			echo "</tr>";
		}
			print "</table>";
		}
	}
	
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
	
	if($year_end <= $year_start || $price_max <= $price_min)
	{
		display_error();
	}
	else
	{
		$result_all = "select wine_name, winery_name, variety, region_name, cost, on_hand, year, count(items.cust_id) as total
						from wine, winery, items, region, inventory, grape_variety, wine_variety
						where 
		wine.wine_id = inventory.wine_id and wine.wine_id = wine_variety.wine_id and wine_variety.variety_id = grape_variety.variety_id and
		wine.winery_id = winery.winery_id and winery.region_id = region.region_id and wine.wine_id = items.wine_id and wine_name like '%".$winename."%' and
		winery_name like '%".$wineryname."%' and region_name like '%".$region."%' and on_hand >= '".$stock."' and (cost between '".$price_min."' and '".$price_max."') and
		(year between '".$year_start."' and '".$year_end."')
		
		group by wine.wine_name,winery.winery_name, grape_variety.variety,region.region_name,wine.year,inventory.on_hand,inventory.cost
		
		having (total >= '".$customer."') ";
	
		$conn = mysqli_connect("localhost","root","","winestore");
		$query = mysqli_query ($conn, $result_all);

		display_ok($query);
	}
	
?>

</body>
</html>
