<?php

namespace Database\Seeders;

use App\Models\Restaurante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

class RestaurantesSeeder extends Seeder
{
   
    public function run(): void
    {
        Restaurante::upsert([
            [
                'id'=>1, 
                'titulo'=> "El Rincón de Sas",
                'descripcion'=> "Cocina de autor basada en la tradición de nuestras raíces, nuestra tierra y la técnica para aprovechar el 100% del producto y trasladarlo a nuestros platos.",
                'direccion'=> "C. del Blasón Aragonés, 6, 50003",
                'id_poblacion'=> 1,
                'telefono'=> "976 73 78 12",
                'horario'=> "<span>Lunes:	Cerrado </span><br>
                    <span>Martes:	12:30–17:00</span><br>
                    <span>Miércoles:	12:30–17:00</span><br>
                    <span>Jueves:	12:30–17:00, 20:00–24:00</span><br>
                    <span>Viernes:	12:30–17:00, 20:00–24:00</span><br>
                    <span>Sábado:	12:30–17:00, 20:00–24:00</span><br>
                    <span>Domingo:	Cerrado</span><br>",
                'gluten'=> true,
                'vegano'=> true,
                'web'=> "elrincondesas.com",
                'instagram'=>"elrincondesas",
            ],
            [
                'id'=>2, 
                'titulo'=> "El Truco",
                'descripcion'=> "Bar de tapas sencillo, con terraza, que sirve tentempiés y raciones sin gluten.",
                'direccion'=> "C. de los Estébanes, 2, 50003",
                'id_poblacion'=> 1,
                'telefono'=> "976 05 57 53",
                'horario'=> "<span>Lunes:	12:00–16:00, 20:00–24:00 </span><br>
                    <span>Martes:	Cerrado </span><br>
                    <span>Miércoles:	12:00–16:00, 20:00–24:00 </span><br>
                    <span>Jueves:	12:00–16:00, 20:00–24:00</span><br>
                    <span>Viernes:	12:00–16:00, 20:00–24:00</span><br>
                    <span>Sábado:	12:00–16:00, 20:00–24:00</span><br>
                    <span>Domingo:	12:00–16:00 </span><br>",
                'gluten'=> true,
                'vegano'=> true,
                'web'=> null,
                'instagram'=>"eltrucobar",
            ],
            [
                'id'=>3, 
                'titulo'=> "El Origen Huesca",
                'descripcion'=> "Productos de temporada con menú aragonés.",
                'direccion'=> "Pl. del Justicia, 4, 22001 ",
                'id_poblacion'=> 2,
                'telefono'=> "974 22 97 45",
                'horario'=> "<span>Lunes:	13:30–18:00 </span><br>
                    <span>Martes:	13:30–18:00 </span><br>
                    <span>Miércoles:	Cerrado </span><br>
                    <span>Jueves:	13:30–18:00</span><br>
                    <span>Viernes:	13:30–18:00, 21:00–1:00</span><br>
                    <span>Sábado:	13:30–18:00, 21:00–1:00</span><br>
                    <span>Domingo:	13:30–18:00 </span><br>",
                'gluten'=> true,
                'vegano'=> true,
                'web'=> "elorigenhuesca.com",
                'instagram'=> null,
            ],
            [
                'id'=>4, 
                'titulo'=> "La era de los nogales",
                'descripcion'=> "Restauración made in Aragón",
                'direccion'=> "C. Baja Sardas, 2, 22613 Sardas ",
                'id_poblacion'=> 2,
                'telefono'=> " 693 01 94 79",
                'horario'=> "<span>Lunes:	13:30-15:30 </span><br>
                    <span>Martes:	Cerrado </span><br>
                    <span>Miércoles:	Cerrado </span><br>
                    <span>Jueves:	13:30–18:00 </span><br>
                    <span>Viernes:	13:30–15:30 </span><br>
                    <span>Sábado:	13:30–15:30 </span><br>
                    <span>Domingo:	13:30–15:30 </span><br>",
                'gluten'=> true,
                'vegano'=> true,
                'web'=> "cateringyeventosdelpirineo.com",
                'instagram'=>"cateringyeventosdelpirineo",
            ],
            [
                'id'=>5, 
                'titulo'=> "Restaurante La Bodega de Chema",
                'descripcion'=> "Platos contundentes de la cocina aragonesa",
                'direccion'=> "C. de Félix Latassa, 34, 50006 ",
                'id_poblacion'=> 1,
                'telefono'=> " 976 55 50 14",
                'horario'=> "<span>Lunes:	13:30-15:30 </span><br>
                    <span>Martes:	Cerrado </span><br>
                    <span>Miércoles:	13:30-15:30 </span><br>
                    <span>Jueves:	13:30-15:30 </span><br>
                    <span>Viernes:	13:30–15:30, 20:30-22:30 </span><br>
                    <span>Sábado:	13:30–15:30, 20:30-22:30 </span><br>
                    <span>Domingo:	13:30–15:30 </span><br>",
                'gluten'=> true,
                'vegano'=> false,
                'web'=> "labodegadechema.es",
                'instagram'=>"labodegadechema_",
            ],
            [
                'id'=>6, 
                'titulo'=> "La Mina Gastrobar",
                'descripcion'=> "Cocina de autor,productos de primera calidad,raciones,platos,ensaladas,hamburguesas y mucho más...",
                'direccion'=> "C. Yagüe de salas, n4, 44002  ",
                'id_poblacion'=> 3,
                'telefono'=> " 978 09 27 68",
                'horario'=> "<span>Lunes:	12:30-16:00, 20:00-00:00 </span><br>
                    <span>Martes:	Cerrado </span><br>
                    <span>Miércoles:	Cerrado </span><br>
                    <span>Jueves:	12:30-16:00, 20:00-00:00 </span><br>
                    <span>Viernes:	12:30-16:00, 20:00-00:00 </span><br>
                    <span>Sábado:	12:30-16:00, 20:00-00:00 </span><br>
                    <span>Domingo:	12:30-16:00, 20:00-00:00 </span><br>",
                'gluten'=> true,
                'vegano'=> true,
                'web'=> false,
                'instagram'=>"laminagastrobar",
            ],
            [
                'id'=>7, 
                'titulo'=> "Los Marqueses de Vasalbar",
                'descripcion'=> "Cocina casera | Menú diario",
                'direccion'=> "C. Rubio 5 ",
                'id_poblacion'=> 3,
                'telefono'=> " 978 79 25 15",
                'horario'=> "<span>Lunes:	09:00-17:00 </span><br>
                    <span>Martes:	09:00-17:00 </span><br>
                    <span>Miércoles:	09:00-17:00, 20:00-23:30 </span><br>
                    <span>Jueves:	09:00-17:00, 20:00-23:30 </span><br>
                    <span>Viernes:	09:00-17:00, 20:00-23:30 </span><br>
                    <span>Sábado:	09:00-17:00, 20:00-23:30 </span><br>
                    <span>Domingo:	10:30–17:00 </span><br>",
                'gluten'=> true,
                'vegano'=> true,
                'web'=> null,
                'instagram'=>"losmarquesesrestauranteteruel",
            ],
            [
                'id'=>8, 
                'titulo'=> "Bodega Bar Pirineos ",
                'descripcion'=> "Bodega especializada en encurtidos, curados y quesos de gran calidad",
                'direccion'=> "C. Fraga, 16, 18, 22004 ",
                'id_poblacion'=> 2,
                'telefono'=> " 974 22 96 42",
                'horario'=> "<span>Lunes:	 09:00-15:00, 18:00-22:00</span><br>
                    <span>Martes:	 09:00-15:00, 18:00-22:00 </span><br>
                    <span>Miércoles:	 09:00-15:00, 18:00-22:00 </span><br>
                    <span>Jueves:	 09:00-15:00, 18:00-22:00 </span><br>
                    <span>Viernes:	 09:00-15:00, 18:00-22:00 </span><br>
                    <span>Sábado:	 09:00-15:00, 18:00-22:00 </span><br>
                    <span>Domingo:	 09:00-15:00 </span><br>",
                'gluten'=> true,
                'vegano'=> true,
                'web'=> null,
                'instagram'=>"bodegabarpirineos",
            ]
            
        ], ['id']);
    }
}
