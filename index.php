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
    <div id="app">
        <header>
            <div class="container title">
                <h1><?php echo $title; ?></h1>
            </div>
        </header>
        <main>
            <div class="container">
            <input type="text" v-model="newTodo">
                <ul>
                    <li></li>
                </ul>
            </div>
        </main>
    </div>
    
    
    <script src="./js/app.js"></script>
</body>
</html>