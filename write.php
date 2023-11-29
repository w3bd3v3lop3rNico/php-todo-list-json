<?php
// recuperare il parametro passato dalla chiamata POST di axios, verificando che sia avvenuto 
$new_todo = isset($_POST['todo']) ? $_POST['todo'] : '';
//var_dump($new_todo);

// var_dump($_GET['ciao']);
// var_dump($_GET['']);

// SE il parametro è passato correttamente svolgere il codice seguente
if ($new_todo) {

    $new_todo_array = [
        'text' => $new_todo,
        'done' => false,
    ];

    // recupero dal file json la stringa di dati
    $todos_json = file_get_contents('./todos.json');

    // coverto il codice nella stinga in formato php
    $todos_converted_for_php = json_decode($todos_json, true);
    //var_dump($todos_converted_for_php);

    // pusho nell'array (convertito in php) il parametro che è stato passato con il metodo post
    $todos_converted_for_php[] = $new_todo_array;

    // creare un array associativo che ci permetta di fare controlli sui dati che sono stati passati.
    // nell'array associativo aggiungo una key 'todos' alla quale assegno l'array preso dal formato json, nel quale ho pushato il nuovo elemento
    $response = [
        'success' => true,
        'results' => $todos_converted_for_php,
        'postdata' => $_POST,
        'newtodo' => $new_todo, // var_dump($new_todo);
        'todos_converted_for_php' => $todos_converted_for_php
    ];

    // ricodifico il tutto in formato json
    $todos_json = json_encode($todos_converted_for_php);

    // sovrascrivo il mio file json con la nuova stringa modificata
    file_put_contents('./todos.json', $todos_json);

    header('Content-Type: application/json');
    echo json_encode($response);

}else {
    // ALTRIMENTI modifico l'array response, assegnando alla chiave 'success' il valore booleano false e crando la key 'message' assegnandole una stringa contenente un messaggio di errore a mia scelta
    $response = [
        'success' => false,
        'message' => 'Todo params is required',
        'postdata' => $_POST,
        'getdata' => $_GET,
        'newtodo' => $new_todo
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
}


