// let ajax = new XMLHttpRequest;
// ajax.open("GET", "todo.json", true);
// ajax.send(null);
// ajax.onload = function() {
//   let data = ajax.responseText;
//   let dataObject = JSON.parse(data);
// }
//
// // $('#register').on('click', function(dataObj) {
// //   if ($('input:checked')) {
// //     for (var i = 0; i < dataObj.length; i++) {
// //       dataObj[i]["status"] = "done";
// //       console.log(dataObj[i]["status"]);
// //     }
// //   }
// // })
// $('#addButton').on('click', function() {
//   let myObject = new Object();
//   myObject.task = $('taskToAdd').val();
//   myObject.status = "todo";
// })

// $('#register').on("click", function(){
//   console.log($("input:checked").val());
// });

let array = $("input[name='name']:checked").map(function(){
  return this.value;
}).get();
