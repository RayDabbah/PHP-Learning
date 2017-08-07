<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    *{
        background-color: #73e866;
        font-family: sans-serif, helvetica;
    }
    h1{
        text-align: center;
    }
    ul{
        font-size: 2em;
        border-radius: 3%;
        padding: 2em;
        width: 30%;
        background-color: white;
        margin: 0 auto;
        margin-top: 3em;
        box-shadow: 5px 5px 5px grey;
    }
    li{
        padding: 10px;
        margin: 0 auto;
        background-color: inherit;
    }
    .linethrough{
        background-color: inherit;
        text-decoration: line-through;
    }
    .crossedout{
        background-color: inherit;
        color: #605555;
    }
    i{
        color: #ec3866;
        text-shadow: 3px 2px 12px #351f06;
        font-size: 1.5em;
    }
</style>

    <title>To Do Items </title>
</head>
<body>
 <ul>
     
    <?php foreach ($tasks as $todo) {
        if (!$todo->completed) {
            echo "<li>  $todo->description</li>";
        }
        else {
            echo "<li class=\"linethrough\"><span class=\"crossedout\">  $todo->description</span></li>";
        }
    }
        ?>
       
    
    
 </ul>   
</body>
</html>