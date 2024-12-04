<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="get">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" required>
        <button>Envoyer</button>
    </form>

    <div>
        <h2>Nom: <?php
            echo $_GET["nom"]
        ?></h2>
         <p>age: <?php
            echo $_GET["age"]
        ?></p>
    </div>
</body>
</html>