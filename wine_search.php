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

?>

</body>
</html>
