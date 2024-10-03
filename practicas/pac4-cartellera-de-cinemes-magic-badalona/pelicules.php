<?php

// Crearemos un array estilo bd con los campos nombre, imagen,horario de proyeccion, sinopsis, durada, director, repartimiento, calificacion, genero, url trailer.




$pelicula = [
    [
    'id' => 1,
    'nombre' =>  'Pulp Fiction',
    'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/d/d0/Pulp_Fiction_Logo.svg',
    'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
    'sinopsis' => 'Una pareja de adolescentes conocidos como el protagonista, Wes Anderson (Brad Pitt) y el enemigo, Michael Douglas (Christopher Nolan)',
    'duracion' => '152 minutos',
    'director' => 'Quentin Tarantino',
   'reparto' => ['Quentin Tarantino', 'Brad Pitt', 'Christopher Nolan', 'Kate Winslet', 'Anurag Kashyap'],
    'calificacion' => '+18',
    'genero' => ['Drama', 'Thriller'],
    'url_trailer' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
    ],
    [
        'id' => 2,
        'nombre' => 'Inception',
        'imagen' => 'https://es.web.img3.acsta.net/medias/nmedia/18/72/41/74/20198901.jpg',
       'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'Un ladrón que roba secretos corporativos a través de los sueños es dado la oportunidad de borrar su pasado si logra implantar una idea en la mente de un objetivo.',
        'duracion' => '148 minutos',
        'director' => 'Christopher Nolan',
        'reparto' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt', 'Elliot Page', 'Tom Hardy'],
        'calificacion' => 13,
        'genero' => ['Ciencia Ficción', 'Acción'],
        'url_trailer' => 'https://www.youtube.com/watch?v=YoHD9XEInc0'
    ],
    [
        'id' => 3,
        'nombre' => 'The Shawshank Redemption',
        'imagen' => 'https://i.ebayimg.com/images/g/b3oAAOSwstxfKFdM/s-l1200.jpg',
        'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'Un banquero es condenado a cadena perpetua por un crimen que no cometió y forja una amistad con otro prisionero, mientras busca una forma de redención.',
        'duracion' => '142 minutos',
        'director' => 'Frank Darabont',
        'reparto' => ['Tim Robbins', 'Morgan Freeman'],
        'calificacion' => '+18',
        'genero' => ['Drama'],
        'url_trailer' => 'https://www.youtube.com/watch?v=6hB3S9bIaco'
    ],
    [
        'id' => 4,
        'nombre' => 'The Godfather',
        'imagen' => 'https://pics.filmaffinity.com/the_godfather-109363915-large.jpg',
        'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'La historia de la familia mafiosa Corleone y el patriarca Don Vito Corleone, quien intenta mantener el control sobre su imperio criminal.',
        'duracion' => '175 minutos',
        'director' => 'Francis Ford Coppola',
        'reparto' => ['Marlon Brando', 'Al Pacino', 'James Caan'],
        'calificacion' => '+18',
        'genero' => ['Crimen', 'Drama'],
        'url_trailer' => 'https://www.youtube.com/watch?v=sY1S34973zA'
    ],
    [
        'id' => 5,
        'nombre' => 'Fight Club',
        'imagen' => 'https://pics.filmaffinity.com/El_club_de_la_lucha-381374539-large.jpg',
        'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'Un hombre desencantado con su vida crea un club de lucha subterráneo como una forma de encontrar sentido a su existencia.',
        'duracion' => '139 minutos',
        'director' => 'David Fincher',
        'reparto' => ['Brad Pitt', 'Edward Norton', 'Helena Bonham Carter'],
        'calificacion' => +18,
        'genero' => ['Drama', 'Thriller'],
        'url_trailer' => 'https://www.youtube.com/watch?v=SUXWAEX2jLg'
    ],
    [
        'id' => 6,
        'nombre' => 'Forrest Gump',
        'imagen' => 'https://i.pinimg.com/474x/dd/16/39/dd163911d14ba1399f5a32fcaf8fe72b.jpg',
        'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'La vida extraordinaria de un hombre con un coeficiente intelectual bajo, que se convierte en testigo de momentos históricos en Estados Unidos.',
        'duracion' => '142 minutos',
        'director' => 'Robert Zemeckis',
        'reparto' => ['Tom Hanks', 'Robin Wright', 'Gary Sinise'],
        'calificacion' => 13,
        'genero' => ['Drama', 'Romance'],
        'url_trailer' => 'https://www.youtube.com/watch?v=bLvqoHBptjg'
    ],
    [
        'id' => 7,
        'nombre' => 'The Dark Knight',
        'imagen' => 'https://pics.filmaffinity.com/the_dark_knight-102763119-mmed.jpg',
       'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'Batman, con la ayuda del fiscal de distrito Harvey Dent y el teniente James Gordon, se enfrenta al criminal Joker en Gotham City.',
        'duracion' => '152 minutos',
        'director' => 'Christopher Nolan',
        'reparto' => ['Christian Bale', 'Heath Ledger', 'Aaron Eckhart'],
        'calificacion' => 13,
        'genero' => ['Acción', 'Crimen', 'Drama'],
        'url_trailer' => 'https://www.youtube.com/watch?v=EXeTwQWrcwY'
    ],
    [
        'id' => 8,
        'nombre' => 'The Matrix',
        'imagen' => 'https://static.wikia.nocookie.net/wiki-doblaje-espana/images/1/1a/Matrixposter.jpg/revision/latest?cb=20200229192606&path-prefix=es',
       'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'Un hacker descubre la verdadera naturaleza de su realidad y su papel en la lucha contra sus opresores.',
        'duracion' => '136 minutos',
        'director' => 'Lana Wachowski, Lilly Wachowski',
        'reparto' => ['Keanu Reeves', 'Laurence Fishburne', 'Carrie-Anne Moss'],
        'calificacion' => '+18',
        'genero' => ['Acción', 'Ciencia Ficción'],
        'url_trailer' => 'https://www.youtube.com/watch?v=vKQi3bpLyHi'
    ],
    [
        'id' => 9,
        'nombre' => 'The Silence of the Lambs',
        'imagen' => 'https://images-na.ssl-images-amazon.com/images/I/81SVDO6WcrL._AC_UL210_SR210,210_.jpg',
       'horario_proyeccion' => '12:00  - 17:30',
    'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'Una joven agente del FBI debe obtener la ayuda de un prisionero psicópata para atrapar a otro asesino en serie.',
        'duracion' => '138 minutos',
        'director' => 'Jonathan Demme',
        'reparto' => ['Jodie Foster', 'Anthony Hopkins', 'Scott Glenn'],
        'calificacion' => '+18',
        'genero' => ['Crimen', 'Drama', 'Thriller'],
        'url_trailer' => 'https://www.youtube.com/watch?v=1d6K7p5XgKc'
    ],
    [
        'id' => 10,
        'nombre' => 'Schindler List',
        'imagen' => 'https://static.filmin.es/images/es/media/39953/1/poster_0_3_210x0.png',
        'horario_proyeccion' => '12:00  - 17:30',
        'horario_array' => ['9:00','11:45', '14:30', '17:15' ],
        'sinopsis' => 'La historia real de Oskar Schindler, un empresario que salvó a más de mil judíos durante el Holocausto.',
        'duracion' => '195 minutos',
        'director' => 'Steven Spielberg',
        'reparto' => ['Liam Neeson', 'Ben Kingsley', 'Ralph Fiennes'],
        'calificacion' => '+18',
        'genero' => ['Biografía', 'Drama', 'Historia'],
        'url_trailer' => 'https://www.youtube.com/watch?v=4zLfCnGVeL4'
    ]


];


?>