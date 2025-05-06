<?php session_start(); ?>
<?php include 'database.php' ?>

<?php 

  // Check to see if score is set
  if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
  }

  if($_POST) {
    $question_number = $_POST['number'];
    $selected_choice_number = $_POST['choice'];
    $next_question_number = $question_number + 1;
  }
    
  /*
   *  Get total questions
   */ 

  $query = "SELECT * FROM `questions`";

  // Get result
  $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
  $total = $results->num_rows;


  /*
   *  Get correct choice
   */ 

   $query = "SELECT * FROM `choices` ";
   $query .= "WHERE question_number = $question_number ";
   $query .= "AND is_correct = 1";

   // Get result
   $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

   // Get row
   $row = $result->fetch_assoc();

   // Set correct choice
   $correct_choice = $row['id'];

   // Compare
   if ($correct_choice == $selected_choice_number) {
    // Answer is correct
    $_SESSION['score'] = $_SESSION['score'] + 1;
   }

   // Check if choice was selected
   $current_path = dirname(__FILE__);
   // If no choice selected, stay at the same page
   if (!isset($_POST['choice'])) {
    header("Location: question.php?n=" . $question_number);
    exit();
   }

   // Check if last question
   if($question_number == $total) {
    header("Location: final.php");
    exit();
   } else {
    header("Location: question.php?n=" . $next_question_number);
   }
