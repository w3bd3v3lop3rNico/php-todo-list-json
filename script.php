<?php
// $todos_json = file_get_contents('./todos.json');
$todos = [
    [
    'text' => 'Fare la spesa',
    'done' => false
    ],
    [
    'text' => 'Studiare',
    'done' => false
    ],
    [
    'text' => 'Fare il letto',
    'done' => true
    ],
    [
    'text' => 'Andare a lezione di chitarra',
    'done' => true
    ]
];

$todos_string = json_encode($todos);

file_put_contents('./todos.json', $todos_string);