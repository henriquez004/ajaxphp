$(document).ready(function(){

taskview();
  
 let flang = false;

 $('#tasks-result').hide();

 $('#search').keyup(function (e) { 

 let search = $('#search').val();


 if(search.length >0){

 
 $.ajax({
     type: "POST",
     url: "search-task.php",
     data: {search},
     success: function (response) {
     let tasks = JSON.parse(response);
     let tempalte = '';

     tasks.forEach(task => {

        console.log(task)
    
      tempalte += `<li>${task.name}</li>`




     });/*for*/

     $('#tasks-result').show();

      $('#container').html(tempalte);

     

     



         
    }
 });/*ajax*/

}/*if*/


     
 });/*keyup*/

 $('#form-task').submit(function(e){

 
  const task = {
    id: $('#taskid').val(),
    name: $("#name").val(),
    description : $("#description").val()
  }

 let url = (flang) ? 'update-task.php' : 'save-task.php';
$.post( url, task, function(response){
    taskview();
    console.log(response)
   $('#form-task').trigger('reset');
    flang=false;

});


 e.preventDefault();
 

});/*submit*/




function taskview(){

$.ajax({
  type: "GET",
  url: "list-task.php",
  success: function (response) {
  let tasks = JSON.parse(response);
  let tempale ='';
 tasks.forEach(task => {
   
  tempale +=`
    <tr taskID="${task.id}">
        <th>${task.id}</td>
        <td>${task.name}</td>
        <td>${task.description}</td>
        <td> <button class = "btn btn-danger task-delete">
        
        <i class="fas fa-trash-alt"></i>
        
        </button>

        <button class="btn btn-primary task-item">
        <i class="fas fa-marker"></i>
            
        </button>

      
      
      </td>

  <tr/>
  `

 });/*for*/

  $('#tasks').html(tempale);

  


  }
});/*ajax*/




}/*func*/
 



$(document).on('click', '.task-delete', function(){

  let element = $(this)[0].parentElement.parentElement;
  let id = $(element).attr('taskID');

  $.post("delete.task.php", {id},
    function (response) {
  
    console.log(response)
    taskview();


      
  });
  







})/*fuc*/


$(document).on('click','.task-item', function(){
let element = $(this)[0].parentElement.parentElement;
let id = $(element).attr('taskID');

$.post("single-task.php", {id},
  function (response) {
    let task = JSON.parse(response);
    task.forEach(result => {
      
      $('#name').val(result.name);
      $('#description').val(result.description);
      $('#taskid').val(result.id);

      flang = true;

  
    });
    
});









});/*func*/


























});/*callback*/