<?php
$index = $_POST['id'] ?? null;

if ($index !== null & is_numeric($index)) {
    $index = intval($index);

    $todos_json = file_get_contents('./todos.json');

    $todos_converted = json_decode($todos_json, true);

    $currentTodo = $todos_converted[$index];

    if($currentTodo['done'] === false) {
        $currentTodo['done'] = true;
    } else {
        $currentTodo['done'] = false;
    }

    $todos_converted[$index] = $currentTodo;

    $response = [
        'success' => true,
        'results' => $todos_converted,
        'selected' => $currentTodo
    ];

    $todos_json = json_encode($todos_converted);

    file_put_contents('./todos.json', $todos_json);

    header('Content-type: application/json');
    echo json_encode($response);
}