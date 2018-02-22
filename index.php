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
    $post = $_POST['addTask'];
    $url = 'todo.json';
    $data = file_get_contents($url);
    $tasks = json_decode($data);

    foreach ($tasks as $key => $value) {
      if ($value->status == "todo") {
        echo "<input class='checking' type='checkbox', name='name', value='value'>" . $value->task . "<br>" . "<br>";
      }
    }

    function addJson () {
      if (empty($_POST['addTask'])) {
      } else {
        if (file_exists('todo.json')) {
          $current_data = file_get_contents('todo.json');
          $array_data = json_decode($current_data, true);
          $adds = array(
            'task' => $_POST['addTask'],
            'status' => 'todo'
          );
          $array_data[] = $adds;
          $final_data = json_encode($array_data);
          file_put_contents('todo.json', $final_data);
          header("Refresh:0");
        } else {
          echo "no file";
        }
      }
    }
    addJson();
    ?>
  <input id="register" type="submit" name="saveArchive" value="Enregistrer">
  <h3>ARCHIVE</h3>


    <?php
    $setArchive = $_POST['setArchive'];

    foreach ($tasks as $key => $value) {
      if ($value->status == "done") {
        echo "<input type='checkbox' checked onclick='return false;'>" . $value->task . "<br>" . "<br>";
      }
    }

    // function archive($buttonPressed){
    //   foreach ($tasks as $key => $value) {
    //     if (empty($_POST['name'])) {
    //       echo "not checked";
    //     } else {
    //       echo "checked";
    //     }
    //   }
    // } archive($_POST['setArchive']);



    // function archive () {
    //   if (isset($_POST['test'])) {
    //     echo "123";
    //   }
    // }
    //
    // if (isset($setArchive)) {
    //   archive();
    // }
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
