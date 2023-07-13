<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>

<body>
  
        @if ($categoryGame)
            <h2>El nombre del videojuego es: {{$nameVideogame}} y la categoria es: {{$categoryGame}}</h2>
        @else
            <h2>El nombre del videojuego es: {{$nameVideogame}} y no hay categoria</h2>
        @endif



 
</body>

</html>