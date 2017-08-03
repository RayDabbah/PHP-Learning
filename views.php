<!DOCTYPE html>
<html lang="en">
<head>
<style>
    *{
        background-color: #73e866;
        font-family: sans-serif, helvetica;
    }
    h1{
        text-align: center;
    }
    li{
        margin: 0 auto;
        margin-left: 40%;
        margin-right: 45%;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h1>
    <?=  $greeting; ?>
</h1>
<ul>
<?php
    foreach($foods as $food){
        echo "<li> $food</li>";
    }
    ?>
</ul><br><br>
<ol>
<?php foreach($animals as $animal) : ?>
     <li><?=$animal;?></li>
<?php endforeach; ?>
</ol>
<ul>
<?php
foreach($ages as $person => $age) : ?>
<li><?=ucwords("<strong>$person</strong> is $age years old.")  ?></li><br>
<?php endforeach; ?>
</ul>
<!--one way to put out an assiative array (booleans don't show up)  -->
<ul>
<?php
 foreach($tasks as $item => $description)
 echo "<li><strong>$item: </strong> $description.</li>"
?>
</ul>
<!--2nd way (booleans do show up)  -->



<pre> 

 This   
            is testing            
                                    pre tags 
                                    to         see if 



                                    it works
                and how well!
                </pre>