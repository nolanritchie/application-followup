<?php
class Interview
{
	public static $title = 'Interview test';  // was missing the word "static" 
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

$person = $_POST['person']; // unsafe, no form of validation before outputting 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	// Print 10 times
	for ($i=0; $i<10; $i++) { // 2 problems with loop condition cuasing it not to run at all 
		echo '<p>'.$lipsum.'</p>'; // changed two "+" to "." as that is how to concat string not "+" 
	}
	?>


	<hr>

	
	<form method="post" action=""> <?php /*changed get to post as post was used first above 5*/       /*$_SERVER['REQUEST_URI'] in form unsafe and uneeded, changed to action="" #9*/?>
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email']; // unsafe, no form of validation before outputting ?></p>
	<?php endif; ?>


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): // "$person" varable is already in use, though it does not cause problem now it could easily create confusion or problems if this page expands in future ?>
				<tr>
					<td><?=$person['first_name']; // changed => to $person['first_name'] bc stored as array not object ?></td>
					<td><?=$person['last_name']; //stored as array not object ?></td>
					<td><?=$person['email']; // stored as array not object ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>