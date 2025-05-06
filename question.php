<?php session_start(); ?>
<?php include 'database.php' ?>

<?php 
  // Set question number
  $number = (int) $_GET['n'];

  /*
   *  Get total questions
   */ 

   $query = "SELECT * FROM `questions`";

   // Get result
   $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
   $total = $results->num_rows;

  /*
  * Get Question
  */

  $query = "SELECT * FROM `questions` ";
  $query .= "WHERE question_number = $number";

  // Get result
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

  $question = $result->fetch_assoc();

  /*
  * Get Choices
  */

  $query = "SELECT * FROM `choices` ";
  $query .= "WHERE question_number = $number";

  // Get results
  $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Quiz</title>
  <link rel="stylesheet" href="style/style.css" type="text/css">
</head>
<body>
  <header>
    <div class="container">
      <h1>PHP Quiz</h1>
    </div>
  </header>
  <main>
    <section class="container">
      <h2 class="current-question-number">Question <?php echo $question['question_number'] . " of " . $total ?></h2>
      <p class="question">
        <?php echo $question['text']; ?>
      </p>
      <form method="POST" action="process.php">
        <ul class="choices">
          <?php while($row = $choices->fetch_assoc()) : ?>
            <li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></li>
          <?php endwhile; ?>
        </ul>
        <input class="submit-button" name="submit" type="submit" value="Submit">
        <input type="hidden" name="number" value="<?php echo $number ?>">
      </form>
    </section>
  </main>
  <footer>
    <div class="container">
      <p>Walid Ben bourch</p>
    </div>
  </footer>
</body>
</html>
