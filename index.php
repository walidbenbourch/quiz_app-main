<?php include 'database.php' ?>

<?php 
  /*
  * Get Total Questions
  */

  $query = "SELECT * FROM `questions`";

  // Get results
  $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
  $total = $results->num_rows;

  /*
  * Print time to finish quiz
  */

  function calculateQuizTime($number_of_questions) {
    $total_time = $number_of_questions * 30; // One question takes 30 seconds
    if ($total_time < 60) {
      echo $total_time . " Seconds";
    }

    if ($total_time == 60) {
      echo "1 Minute";
    }

    if ($total_time > 60 AND $total_time < 120) {
      $seconds = $total_time % 60;
      
      if ($seconds) {
        echo "1 Minute and " . $seconds . " Seconds";
      } else {
        echo "1 Minute";
      }
    }

    if ($total_time >= 120) {
      $minutes = floor($total_time / 60);
      $seconds = $total_time % 60;

      if ($seconds) {
        echo $minutes . " Minutes and " . $seconds . " Seconds";
      } else {
        echo $minutes . " Minutes";
      }
    }
  }
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
      <h2>Test Your PHP Knowledge</h2>
      <p>This is a multiple choise quiz to test your knowledge of PHP</p>
      <ul>
        <li><span class="bold-text">Number of Questions: </span><?php echo $total; ?></li>
        <li><span class="bold-text">Type: </span>Multiple Choice</li>
        <li><span class="bold-text">Estimated Time: </span><?php echo calculateQuizTime($total); ?></li>
      </ul>
      <a href="question.php?n=1" class="start-button">Start Quiz</a>
    </section>
  </main>
  <footer>
    <div class="container">
      <p> Walid Ben bourch</p>
    </div>
  </footer>
</body>
</html>
