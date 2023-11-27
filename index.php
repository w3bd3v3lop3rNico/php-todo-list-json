<?php 
$title = 'To Do List';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

    <!-- <form action="./server.php" method="POST">
        <input type="text" name="prova">
        <button type="submit">Invia</button>
    </form> -->

    <div id="app">
        <header>
            <div class="container title">
                <h1><?php echo $title; ?></h1>
            </div>
        </header>
        <main>
            <div class="container">
            <input type="text" placeholder="inserisci una 'todo'" 
            v-model="newTodo" @keyup.enter="addTodo">
                <ul class="todos">
                    <li class="todo-item" :class="{ completed: todo.done }"
                    v-for="(todo, idx) in todos" :key="idx">
                    <!-- :class="todo.done : 'completed' "  -->
                        <span >{{ todo.text }}</span>
                        <span>elimina</span>
                    </li>
                </ul>
            </div>
        </main>
    </div>
    
    
    <script src="./js/app.js"></script>
</body>
</html>