<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<head><title>some title</title>

	<body>here's list of foods from the database
		<table>
			<tr><th>id</th>name<th></th><th>action</th></tr>
		<?php
/*		$c = count($data);
		$i = 0;
		while($i < $c){
			echo $data[$i];
			$i++;
		}*/
		foreach ($data as $food) {
			echo "<tr>
			<td>$food->id</td>
			<td>$food->name</td>
			<td><a href = '/Food/delete/$food->id'>delete</a>
			</td>
			</tr>";
		}

		?>
	</table>
	<form action='' method='post'>
		input the new food to add to the list:
		<input type='text' name='new_food' /><br/>
		<input type='submit' value='Send' name='action'>
	</form>
	<a href='\Main/index2'> go to Main/index</a>
</body>
	</html>