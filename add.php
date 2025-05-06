<?php include 'database.php' ?>

<?php
  $error = "";

  if(isset($_POST['submit'])) {

    // Get post variables
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];

    // Choices array
    $choices = array();

    $choices[1] = $_POST['choice_1'];
    $choices[2] = $_POST['choice_2'];
    $choices[3] = $_POST['choice_3'];
    $choices[4] = $_POST['choice_4'];
    $choices[5] = $_POST['choice_5'];
    
    // Number of filled choices.
    $filled_choices = 0;
    foreach ($choices as $choice) {
      if (isset($choice) AND $choice != "") {
        $filled_choices++;
      }
    }

    
    /*
    *  Get all question numbers
    */ 
    
    // Create an empty array to hold database values
    $all_question_numbers = array();

    // Query
    $question_number_query = "SELECT `question_number` FROM `questions`";
    $question_number_result = $mysqli->query($question_number_query) or die($mysqli->error.__LINE__);

    // Put all results into array
    while ($question_number_row = $question_number_result->fetch_array()) {
      $all_question_numbers[] =  $question_number_row['question_number']; 
    }

    // Error handling
    if (!isset($question_text) || !is_string($question_text) || $question_text == "") { $error .= "Question field can not be empty. "; }
    if (!isset($correct_choice) || !is_numeric($correct_choice) || $correct_choice < 1 || $correct_choice > $filled_choices) { $error .= "\"Correct Choise\" field has incorect value. "; }
    if ($filled_choices < 2) { $error .= "Please fill at least two \"Choice\" fields. "; }
    if (in_array($question_number, $all_question_numbers)) { $error .= "Selected question number \"" . $question_number . "\" is taken. "; }

    // Question query
    $query = "INSERT INTO `questions` (question_number, text) VALUES ('$question_number', '$question_text')";

    // Run query
    $insert_row = NULL;
    if (!isset($error) || $error == "") {
      $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
    }
    

    // Validate insert
    if ($insert_row) {
      foreach ($choices as $choice => $value) {
        if ($value != '') {
          if ($correct_choice == $choice) {
            $is_correct = 1;
          } else {
            $is_correct = 0;
          }

          // Choice query
          $query = "INSERT INTO `choices` (question_number, is_correct, text) VALUES ('$question_number', '$is_correct', '$value')";

          // Run query
          $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

          // Validate insert
          if ($insert_row) {
            continue;
          } else {
            die('Error : ('.$mysqli->errno . ') ' . $mysqli->error);
          }
        }
      }
        // Message if all validation pass and database updated.
        $msg = 'Question has been added.';
    }
  }  

  /*
   *  Get total questions
   */ 

   $query = "SELECT * FROM `questions`";

   // Get result
   $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
   $total = $results->num_rows;
   $next = $total + 1;
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
      <h2>Add a Quastion</h2>
      <?php 
        if (isset($error) AND $error != "") {
          echo '<p class="message__error">' . $error . '</p>';
        } 
        
        if (isset($msg)) {
          echo '<p class="message__success">' . $msg . '</p>';
        }
      ?>
      <form method="POST" action="add.php" class="add-form">
        <p>
          <label for="question_number">Question Number</label>
          <input type="number" value="<?php echo $next; ?>" name="question_number" id="question_number">
        </p>
        <p>
          <label for="question_text">Question Text</label>
          <input type="text" name="question_text" id="question_text">
        </p>
        <p>
          <label for="choice_1">Choice #1:</label>
          <input type="text" name="choice_1" id="choice_1">
        </p>
        <p>
          <label for="choice_2">Choice #2:</label>
          <input type="text" name="choice_2" id="choice_2">
        </p>
        <p>
          <label for="choice_3">Choice #3:</label>
          <input type="text" name="choice_3" id="choice_3">
        </p>
        <p>
          <label for="choice_4">Choice #4:</label>
          <input type="text" name="choice_4" id="choice_4">
        </p>
        <p>
          <label for="choice_5">Choice #5:</label>
          <input type="text" name="choice_5" id="choice_5">
        </p>
        <p>
          <label for="correct_choice">Correct Choice Number</label>
          <input type="number" name="correct_choice" id="correct_choice">
        </p>
        <p>
          <input type="submit" name="submit" value="submit" class="submit-button">
        </p>
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
