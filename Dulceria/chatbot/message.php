<?php
// Conexion de Base de Datos
$conn = mysqli_connect("localhost", "root", "", "dulceria") or die("Database Error");

// Obteniendo el mensaje del usuario.
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//Consulta en la Base de Datos
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// Si la plabra se encuentra en la Base de Datos Respondera dependiendo del Usuario o su consulta.
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    //Mensaje en caso de que el Bot no tenga la respuesta
    echo "Disuculpa, no tengo la respuesta en este <br>momento.";
}
}
?>