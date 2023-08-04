<?php 
// echo "the ninja screamed \"whaaa\"";
//echo name[0] 
//to get individual letter out of string

//strlen($name)
//to find a length of string
//strtoupper()
//strtoupper()

//echo str_replace('to be replaced','replaced with',$variable)
//power is **
//order of operation (B I D M A S)
// $peopleThree =array_merge(peopleTwo,PeopleOne)
// $ninjasOne=['key'=>'value']


	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Pizzas!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($pizzas as $pizza): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>