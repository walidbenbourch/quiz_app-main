<?php session_start(); ?>

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
    <section class="container final-page">
      <h2>You're Done!</h2>
      <p>Congrats! You have completed the quiz.</p>
      <p>Final Score: <?php echo $_SESSION['score']; ?></p>
      <a href="question.php?n=1" class="start-button">Take Again</a>
    </section>
  </main>
  <footer>
    <div class="container">
      <p>Walid Ben bourch</p>
    </div>
  </footer>
</body>
</html>

<?php 
  $_SESSION['score'] = 0;
?>
