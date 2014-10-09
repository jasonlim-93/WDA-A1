<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd"/>
<html>
<head>
	<meta charset="UTF-8">
	<title>Jason's Wine Store </title>
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
<form action="wine_search.php" method=get>
	<table width="1200px">
		<tr>
			<td align="center">
				<img src ="wine_logo.jpg" alt="Wine store logo"
				style="width:450px; height:235px; "/>
			</td>
		</tr>
			
		<tr>
		<td>
		
		<table width="800px">
		
		<tr>
			<td colspan="2" style="text-align:center; color:#0000CC;">
				Welcome to Jason Lim's Wine Store <br><br>
				Use the search below to find your favourite wine
			</td>
		</tr>
		
		<tr>
			<td>
				Wine Name
			</td>
			<td>
				<input type="text" name="winename"/>
			</td>
		</tr>
		
		<tr>
			<td>
				Winery Name
			</td>
			<td>
				<input type="text" name="wineryname"/>
			</td>
		</tr>
		
		<tr>
			<td>
				Region
			</td>
			<td>
				<?php
					$conn = mysqli_connect("localhost","root","","winestore");
					$query = mysqli_query ($conn,"SELECT region_name FROM region");
					echo '<select name="region">';
					while ($row=mysqli_fetch_array($query))
					{
						echo "<option>".($row["region_name"])."</option>";
					}
					echo "</select>";
				?>
			</td>
		</tr>
		
		<tr>
			<td>
				Year
			</td>
			<td>
				<input type="number" name="year_start" min="1970" max = "1999" />
				To
				<input type="number" name="year_end" min="1970" max = "1999" />
			</td>
		</tr>
		
		<tr>
			<td>
				Number of Stocks
			</td>
			<td>
				<input type="number" min="0" max = "9999" name="stock"/>
			</td>
		</tr>
		
		<tr>
			<td>
				Number of Customers who purchased
			</td>
			<td>
				<input type="number" min="0" max = "9999" name="customer"/>
			</td>
		</tr>
		
		<tr>
			<td>
				Price ($)
			</td>
			<td>
				<input type="number" min="0" max = "9999" name="price_min"/>
				To
				<input type="number" min="0" max = "9999" name="price_max"/>
			</td>
		</tr>
		
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Search"/> <input type="reset" value="Clear"/>
			</td>
		</tr>
		
	</table>
	</tr>
	</td>
	</table>
	
</form>
</body>	
</html>
