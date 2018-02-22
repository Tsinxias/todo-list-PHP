<?php
  $addTask = $_POST["addTask"];
  echo $addTask;
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To Do List</title>
</head>
<body>
  <div class="screenOne">
    <h3>A FAIRE</h3>

    <?php

    $url = 'todo.json';
    $data = file_get_contents($url);
    $tasks = json_decode($data);

    foreach ($tasks as $key => $value) {
      if ($value->status == "todo") {
        echo "<input class='checking' type='checkbox'>" . $value->task . "<br>" . "<br>";
      }
    }



    ?>

    <input id="register" type="submit" name="" value="Enregistrer">
    <h3>ARCHIVE</h3>
    <?php
    foreach ($tasks as $key => $value) {
      if ($value->status == "done") {
        echo "<input type='checkbox' checked>" . $value->task . "<br>" . "<br>";
      }
    }
    ?>
  </div>


<div class="random">

</div>




  <div class="screenTwo">
    <h1>Ajouter une tâche</h1>
    <p>La tâche à effectuer</p>
    <form class="ajoutTache" action="index.php" method="post">
      <input id="taskToAdd" type="text" name="addTask" placeholder="Ajoutez une tâche">
      <input id="addButton" type="submit" name="" value="Ajouter">
    </form>
  </div>

  <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="todo.js" type="text/javascript"></script>
</body>
</html>
