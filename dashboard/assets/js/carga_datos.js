$(document).ready(function(){

$.ajax({
    type: 'POST',
    url: 'cargar_agencias.php',
    

})

.done(function(agencias){

    $('#idAgencia').html(agencias)

})
.fail(function(){
    alert("Error al cargar las agencias");
})


//Evento onChange

$('')


})