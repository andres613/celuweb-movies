/* DROP TABLE Movies; */
/* DROP TABLE Users; */
/* DROP TABLE Genres; */

/* DATA DEFINITION */

CREATE TABLE IF NOT EXISTS celuweb_database.Users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
	user_name VARCHAR(30) NOT NULL,
	email varchar(30) NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS celuweb_database.Genres (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	genre_movie varchar(30) NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS celuweb_database.Movies (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	user_id INT(11) NOT NULL,
	genre_id INT(11) NOT NULL,
	image_path varchar(100) NOT NULL,
	title varchar(100) NOT NULL,
	overview TEXT NOT NULL,
	release_date DATE NOT NULL,
	in_existence INT(1) NOT NULL,
	FOREIGN KEY (user_id) REFERENCES celuweb_database.Users(id),
	FOREIGN KEY (genre_id) REFERENCES celuweb_database.Genres(id)
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci;

/* INSERTS */

/* INSERT INTO celuweb_database.Genres (`genre_movie`) VALUES ("Acción"),("Terror"),("Comedia"),("Ficción"),("Drama"); */

/* INSERT INTO celuweb_database.Users (`user_name`, `email`) VALUES ("Lucelly", "lucelly@test.com"),("Andres", "andres@test.com"); */

INSERT INTO Movies (
    `user_id`,
    `genre_id`,   
    `image_path`, 
    `title`, 
    `overview`, 
    `release_date`,
    `in_existence`
    ) 
VALUES 
    (
        1,
        1,
        "the_batman.jpg",
        "The Batman",
        "Después de dos años acechando por las calles de la ciudad como Batman (Robert Pattinson), e infundiendo miedo en las mentes perversas de los criminales, Bruce Wayne está sumido en las profundidades de las sombras de Gotham City. Este vigilante solitario cuenta con pocos aliados de confianza y eso le ha llevado a convertirse en la única encarnación de la venganza entre sus conciudadanos. Cuando un asesino apunta a la élite de Gotham con una serie de maquinaciones sádicas, un rastro de pistas crípticas lleva al \"mejor detective del mundo\" a realizar una investigación en el inframundo.",
        '2022-03-04',
        9
    ),
    (
        2,
        2,
        "huye.jpg",
        "Huye",
        "Un joven afroamericano visita a la familia de su novia blanca, un matrimonio adinerado. Para Chris (Daniel Kaluuya) y su novia Rose (Allison Williams) ha llegado el momento de conocer a los futuros suegros, por lo que ella le invita a pasar un fin de semana en el campo con sus padres, Missy (Catherine Keener) y Dean (Bradley Whitford). Al principio, Chris piensa que el comportamiento \"demasiado\" complaciente de los padres se debe a su nerviosismo por la relación interracial de su hija, pero a medida que pasan las horas, una serie de descubrimientos cada vez más inquietantes le llevan a descubrir una verdad inimaginable.",
        '2017-02-24',
        4
    ),
    (
        2,
        2,
        "scream.jpg",
        "Scream",
        "Veinticinco años después de que una serie de brutales asesinatos conmocionara al tranquilo pueblo de Woodsboro, un nuevo asesino se ha puesto la máscara de Ghostface y comienza a perseguir a un grupo de adolescentes para resucitar los secretos del mortífero pasado del pueblo.",
        '2022-01-14',
        7
    ),
    (
        2,
        3,
        "ace_ventura.jpg",
        "Ace Ventura",
        "El detective Ace Ventura, especializado en rescatar animales secuestrados, recibe el encargo de localizar y rescatar el delfin Copo de Nieve, mascota del equipo de fútbol de Miami, que ha sido secuestrado el día anterior a la gran final que debe disputar el equipo.",
        '1994-02-04',
        4
    ),
    (
        2,
        4,
        "interstellar.jpg",
        "Interstellar",
        "Al ver que la vida en la Tierra está llegando a su fin, un grupo de exploradores dirigidos por el piloto Cooper (McConaughey) y la científica Amelia (Hathaway) emprende una misión que puede ser la más importante de la historia de la humanidad: viajar más allá de nuestra galaxia para descubrir algún planeta en otra que pueda garantizar el futuro de la raza humana.",
        '2014-10-26',
        6
    ),
    (
        1,
        5,
        "metodo_williams.jpg",
        "Método Williams",
        "Biopic sobre Richard Williams, un padre inasequible que ayudó a formar a dos de las deportistas más extraordinarias de todos los tiempos, dos atletas que acabarían marcando época en el deporte del tenis. Richard tenía una visión muy clara del futuro de sus hijas, y sirviéndose de métodos arriesgados y poco convencionales, elaboró un plan que llevaría a Venus y Serena Williams de las calles de Compton, California, al olimpo del deporte, convirtiéndolas en iconos del tenis.",
        '2022-01-21',
        5
    ),
    (
        1,
        5,
        "mas_alla_de_los_sueños.jpg",
        "Mas allá de los sueños",
        "La vida de Skeeter Bronson (Adam Sandler), un empleado de hotel, se complica cuando, de repente y misteriosamente, los cuentos que lee a sus sobrinos para que se duerman, se convierten en realidad.",
        '1988-10-02',
        3
    );
