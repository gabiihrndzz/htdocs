<?php
session_start();
echo <<<_END
<style>
    .toggle-eye {
        cursor: pointer;
        position: absolute;
        margin-left: -30px;
        margin-top: 10px; 
    }
    @font-face {
                font-family: 'NunitoXtra';
                src: url('Nunito-Black.ttf') format('truetype');
                font-style: normal;
            }   
            .titulo{
                font-family: 'NunitoXtra', serif; 
                text-align: center;
                flex-grow: 1; 
                font-size: 20px;
            }
        body{
            background-color: lightblue;
            text-align: center;
        }
        .enviar{
            padding: 5px 15px;
            border-width: 4px;
            border-radius: 50px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 15px;
            color: var(--color-white);
            transition:
                scale 0.25s ease-in, 
                opacity 0.25s ease-in, 
                filter 0.25s ease-in;}
            .enviar:hover {
    transform: scale(1.2); 
        }

</style>
_END;

$colores = ["Rojo", "Verde", "Azul", "Amarillo"];
$secuencia = [];
for ($i = 0; $i < 4; $i++) {
    $secuencia[] = $colores[array_rand($colores)];
}


$_SESSION["secuencia"] = $secuencia;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMON - Muestra la Secuencia</title>
    <style>
        body { text-align: center; background-color: aliceblue; }
        .color-box {
            display: inline-block; width: 100px; height: 100px; border-radius: 50%;
            margin: 15px; border: 3px solid black;
        }
        .rojo { background-color: red; }
        .verde { background-color: green; }
        .azul { background-color: blue; }
        .amarillo { background-color: yellow; }
        button {
            padding: 10px 20px; font-size: 18px; cursor: pointer; margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Memoriza la secuencia de colores</h1>
    <div>

        <?php
        foreach ($secuencia as $color) {
            echo "<div class='color-box " . strtolower($color) . "'></div>";
        }
        ?>
        <form action="pregunta.php" method="POST">
            <button class="enviar" type="submit" value="enviar">¡A jugar!</button>
        </form>
    </div>
</body>
</html>
