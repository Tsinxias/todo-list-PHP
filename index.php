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

    <div id="checkers">

      <?php
      $post = $_POST['addTask'];
      $url = 'todo.json';
      $data = file_get_contents($url);
      $tasks = json_decode($data);

      foreach ($tasks as $key => $value) {
        if ($value->status == "todo") {
            echo "<p><input class='checking' type='checkbox', name='name',value='value'>" . $value->task . "</p>";
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

  </div>

  <input id="register" type="submit" name="saveArchive" value="Enregistrer">

  <div class="archived">
    <h3>ARCHIVE</h3>



    <?php
    $setArchive = $_POST['saveArchive'];

    foreach ($tasks as $key => $value) {
      if ($value->status == "done") {
        echo "<p><input type='checkbox' checked onclick='return false;'>" . $value->task . "</p>";
      }
    }
    ?>

  </div>

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

  <script type="text/javascript">
  let ajax = new XMLHttpRequest();
  ajax.open("GET", "todo.json", true);
  ajax.send(null);

  let checkers = document.getElementById("checkers").children;


  $("#register").on("click", function() {
    let data = ajax.responseText;
    let dataObject = JSON.parse(data);
    let inputChecked = $('input:checked');
    let item = $(':checkbox:checked').closest("p");

    for (var i = 0; i < checkers.length; i++) {
      if ($("#checkers input:checked").val()) {
        $(item).appendTo(".archived");
          <?php
          $current_dataOne = file_get_contents('todo.json');
          $array_dataOne = json_decode($current_dataOne, true);
          foreach ($array_dataOne as $key => $value) {
            if (isset($_POST'name')) {
              $array_dataOne[$key]['status'] = "done";
            }
          }
          $final_dataOne = json_encode($array_dataOne);
          file_put_contents('todo.json', $final_dataOne);
          ?>

      }
    }
  });
  </script>
  <?php
  // var_export($data);
  // file_put_contents('todo.json', $data);
   ?>
</body>
</html>
