@if ($data['categoryGame'])
    <h2>El nombre del videojuego es: {{$data['nameVideogame']}} y la categoria es: {{$data['categoryGame']}}</h2>
@else
    <h2>El nombre del videojuego es: {{$data['nameVideogame']}} y no hay categoria</h2>
@endif
<button class="btn btn-primary">

</button>