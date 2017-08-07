<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    *{
        box-sizing: border-box;
        background-color: #e2ade8;
        font-family: sans-serif, helvetica;
    }
    h1{
        text-align: center;
    }
    ul{
        font-size: 2em;
        border-radius: 3%;
        padding: 2em;
        width: 45%;
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
        color: #2a15b4;
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
    .userlist{
        width: 60%;
        text-align: center;
        list-style:inside lower-roman url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAABRFBMVEX///93Skr+9o9uPj778nSEXFyYd3dpODhmMzMHBwbn39fDlT39+LwcHBtqOAf89ZVbW1pfXDTGmUR0cUCkn1p7dkNZVjFLSClkYTbmz2HcwY3w5M29iCLm0GfVsEPfxpeakEuDTQ4nJiC3sl6cl1NpTDyUY0SlgVWdeyVbWlOall+FglvQrWqXbBIZFw3sx5LFv2Wjk2Pbu3+2fhvJn1OLZxW+iyn06bX798rv4afVs2Ds3L/n0oX06tnn07DOp1TfoZrsxp399qHQqT/z2pTw0ZTz5YL99qry1qz03Kv67qzmtZx/VCmqjnJxQiF0Rz+AVT6gaBalck6UYkR6Rx5sOye+qZOkhWfbz8OQbEmDWTGVcmDv6uWliIChgnhfOS3Vsjy/n4CFf3+mpp1TNBWenYOYlJFmMxTNp37MoCr253i9kHUbzisZAAABSUlEQVQokV3R6z/CUBgH8FlDNp6YkDpEkVtCJrqzVgvrgi22olxD//97Z5fTyvfF2dnz+zzPzueMomxsSzcUQ689UWM6NQVAxUB9ZEfqrA5q++UZaxtguE0dHZpTRBOMYU8L6pOuOtTIIAUaE46GBgAKSxo0jwOX1Yf7u6wd6KBNW7x9UGODZA4F7UABr60PyqD8yzA/cTtQgdRj3xUG6/Fu4PF06/XmK2PpcSTQum9flnfTZ4kj34CPecvBvrnu7TqjdjZj23OWrWgEr5EzwQ7Cp8mTGVMiepwwH4fOqUJolQ6sLAeW/DTtX1wIbKCwcyf8Oj1qDYWcIIgqPp9POpKksoQ3JYHcbj61Lori1SV2K4sVVBj+kDDKyfLNdbVaTcuy24DFUW7WkUllqbEkk77AzjPDI5FpPOKKmWKKK1D/FZICLwTz5PUP35g9p/9noB0AAAAASUVORK5CYII=);
    }
</style>

    <title>To Do Items </title>
</head>
<body>
 <ul>
     
    <?php foreach ($tasks as $todo) {
        if (!$todo->completed) {
            echo "<li>   $todo->description</li>";
        }
        else {
            echo "<li class=\"linethrough\"><span class=\"crossedout\">   $todo->description</span></li>";
        }
    }
    ?>
       
    
    
 </ul>   
 <ul class="userlist">
     
    <?php foreach ($users as $user) : ?>
       <li><?= "$user->username can be reached at <br>  $user->email"; ?></li>
    
       <?php endforeach; ?>
       
    
    
 </ul>   
</body>
</html>