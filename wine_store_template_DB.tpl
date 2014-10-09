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
	
	<table width="1200px">
		
		<!-- validation_error -->
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;">{print_error_msg_line_1}</td> </tr>
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;">{print_error_msg_line_2}</td> </tr>
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;">{print_error_msg_line_3}</td> </tr>
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;">{print_error_msg_line_4}</td> </tr>
		    <tr> <td colspan="8" style="text-align:center; color:#0000CC;">{print_error_msg_line_5}</td> </tr>	
		<!--  validation_error -->
		
		<!-- BEGIN not_found -->
			<tr><td colspan="8" style="text-align:center; color:#0000CC;">
				<br/>{print_not_found_msg_line_1} </td>
			</tr>
		<!-- END not_found -->
		
		<!-- BEGIN found -->
			<tr> <td colspan="8" style="text-align:center; color:#0000CC;"> {print_found_line_0} </td> </tr>
			<tr>
				<th>{print_found_line_1}</th>
				<th>{print_found_line_2}</th>
				<th>{print_found_line_3}</th>
				<th>{print_found_line_4}</th>
				<th>{print_found_line_5}</th>
				<th>{print_found_line_6}</th>
				<th>{print_found_line_7}</th>
				<th>{print_found_line_8}</th>
			</tr>
		<!-- END found -->		

		<!-- BEGIN results -->
			<tr>
				<td> {wine_name} </td>
				<td> {variety} </td>
				<td> {year} </td>
				<td> {winery_name} </td>
				<td> {region_name} </td>
				<td> {cost} </td>
				<td> {on_hand} </td>
				<td> {total} </td>
			</tr>
		<!-- END results -->

	</table>
	</body>
	</html>
	
