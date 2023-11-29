<?php
$index = $_POST['id'] ?? null;

if ($index !== null && is_numeric($index)) {

    $index = intval($index);

    $todos_json = file_get_contents('./todos.json');

    $todos_converted = json_decode($todos_json, true);

    $removed = array_splice($todos_converted, $index, 1);

    $response = [
        'success' => true,
        'results' => $todos_converted,
        // 'post' => $_POST
    ];

    $todos_json = json_encode($todos_converted);

    file_put_contents('./todos.json', $todos_json);

    header('Content-type: application/json');
    echo json_encode($response);

}

