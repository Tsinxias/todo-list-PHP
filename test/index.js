// function getCount(parent, getChildrensChildren){
//     var relevantChildren = 0;
//     var children = parent.childNodes.length;
//     for(var i=0; i < children; i++){
//         if(parent.childNodes[i].nodeType != 3){
//             if(getChildrensChildren)
//                 relevantChildren += getCount(parent.childNodes[i],true);
//             relevantChildren++;
//         }
//     }
//     return relevantChildren;
// }
let checkers = document.getElementById("checkers").children;
// alert(getCount(checkers, false));
console.log(checkers);


$("#btnSubmit").on("click", function(){
  let item = $(':checkbox:checked').closest("p");
  let inputChecked = $('input:checked');
  for (var i = 0; i < checkers.length; i++) {
    if ($("input:checked").val()) {
      $(item).appendTo(".archived");
    }
  }
});


for (var i = 0; i < checkers.length; i++) {
  if ($("#checkers input:checked").val()) {
    $(item).appendTo(".archived");
      <?php
      $current_dataOne = file_get_contents('todo.json');
      $array_dataOne = json_decode($current_dataOne, true);
      foreach ($array_dataOne as $key => $value) {
        ?>
        if ($(':checkbox:checked')) {
          <?php
          $array_dataOne[$key]['status'] = "done";
          ?>
        }
        <?php
      }
      $final_dataOne = json_encode($array_dataOne);
      file_put_contents('todo.json', $final_dataOne);
      ?>

  }
}
