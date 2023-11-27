<?php
$todos_json = file_get_contents('./todos.json');
$todos = json_decode($todos_json, true);

// $todos_string = json_encode($todos);

$response = [
    'success' => true,
    'results' => $todos
];


header('Content-Type: application/json');
echo json_encode($response);

// file_put_contents('./todos.json', $todos_string);