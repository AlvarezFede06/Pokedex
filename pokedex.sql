-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 27-09-2024 a las 20:58:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokedex`
--

CREATE TABLE `pokedex` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo1` varchar(20) NOT NULL,
  `tipo2` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokedex`
--

INSERT INTO `pokedex` (`id`, `numero`, `nombre`, `tipo1`, `tipo2`, `imagen`, `descripcion`) VALUES
(1, 1, 'Bulbasaur', 'Planta', 'Veneno', 'img/svg/1.svg', 'Bulbasaur es un Pokémon de tipo Planta y Veneno que lleva una semilla en su espalda desde que nace. Esta semilla crece lentamente a medida que el Pokémon absorbe nutrientes. Bulbasaur tiene la habilidad de realizar fotosíntesis, lo que le permite recuperarse más rápido cuando está bajo la luz del sol.'),
(2, 2, 'Ivysaur', 'Planta', 'Veneno', 'img/svg/2.svg', 'Ivysaur, la evolución de Bulbasaur, lleva una planta más grande en su espalda. Este Pokémon de tipo Planta y Veneno utiliza la energía solar para fortalecer sus ataques. Cuando la planta florece, Ivysaur se vuelve aún más fuerte y está preparado para evolucionar en su forma final.'),
(3, 3, 'Venusaur', 'Planta', 'Veneno', 'img/svg/3.svg', 'Venusaur, la evolución final de Bulbasaur, tiene una enorme flor que ha florecido en su espalda. Este Pokémon de tipo Planta y Veneno es capaz de controlar el clima para atraer luz solar intensa, lo que aumenta el poder de sus ataques de tipo Planta. Su flor desprende un aroma que calma a otros Pokémon y fomenta el crecimiento de las plantas cercanas.'),
(4, 4, 'Charmander', 'Fuego', NULL, 'img/svg/4.svg', 'Charmander es un Pokémon de tipo Fuego con una llama encendida en la punta de su cola. Esta llama es un indicador de su salud y estado emocional; cuando está contento, la llama brilla con fuerza, y cuando está débil, apenas arde. Charmander es conocido por su naturaleza valiente y su habilidad para resistir el calor intenso.'),
(5, 5, 'Charmeleon', 'Fuego', NULL, 'img/svg/5.svg', 'Charmeleon, la evolución de Charmander, es un Pokémon de tipo Fuego con una actitud más agresiva. Su cola sigue ardiendo, pero las llamas son mucho más intensas que antes. Charmeleon utiliza su afilada garra para atacar a sus oponentes y tiende a buscar desafíos más difíciles, ya que disfruta de las batallas.'),
(6, 6, 'Charizard', 'Fuego', 'Volador', 'img/svg/6.svg', 'Charizard es la forma evolucionada de Charmeleon. Este majestuoso Pokémon de tipo Fuego y Volador puede volar a grandes alturas y escupir intensas llamaradas que derriten incluso la roca más dura. Aunque es increíblemente poderoso, Charizard solo utiliza su aliento de fuego en batallas contra oponentes dignos, lo que demuestra su gran orgullo y autocontrol.'),
(7, 7, 'Squirtle', 'Agua', NULL, 'img/svg/7.svg', 'Squirtle es un Pokémon de tipo Agua con una concha protectora que le permite esconderse de los ataques enemigos. Cuando se siente amenazado, Squirtle se mete en su concha y dispara agua a presión desde su boca. Este Pokémon es conocido por su lealtad y su habilidad para nadar a grandes velocidades en corrientes de agua.'),
(8, 8, 'Wartortle', 'Agua', NULL, 'img/svg/8.svg', 'Wartortle, la evolución de Squirtle, tiene una cola y orejas más grandes que indican su crecimiento y experiencia. Su cola es un símbolo de longevidad en muchas culturas, y Wartortle la usa para equilibrarse mientras nada. Este Pokémon es especialmente hábil en el uso de movimientos de tipo Agua para defenderse de los ataques enemigos.'),
(9, 9, 'Blastoise', 'Agua', NULL, 'img/svg/9.svg', 'Blastoise es la evolución final de Squirtle. Este imponente Pokémon de tipo Agua tiene cañones en su espalda que pueden disparar chorros de agua a una presión increíblemente alta. Blastoise utiliza sus cañones tanto para atacar como para maniobrar rápidamente en combate. Su fuerza y resistencia lo convierten en un formidable oponente en cualquier batalla.'),
(10, 10, 'Caterpie', 'Bicho', NULL, 'img/svg/10.svg', 'Caterpie es un pequeño Pokémon de tipo Bicho que utiliza su camuflaje natural para esconderse de los depredadores. Aunque es débil en combate, Caterpie es conocido por su capacidad para evolucionar rápidamente. Sus antenas emiten un olor desagradable que repele a sus enemigos.'),
(11, 11, 'Metapod', 'Bicho', NULL, 'img/svg/11.svg', 'Metapod es la evolución de Caterpie. Durante esta etapa, Metapod permanece en su capullo mientras su cuerpo interno se desarrolla para su evolución final. Aunque no puede moverse ni atacar, su caparazón es increíblemente duro y le proporciona una defensa excelente contra los ataques.'),
(12, 12, 'Butterfree', 'Bicho', 'Volador', 'img/svg/12.svg', 'Butterfree es la evolución final de Caterpie. Este Pokémon de tipo Bicho y Volador es conocido por sus hermosas alas y su capacidad para polinizar flores. Las escamas en sus alas tienen propiedades curativas, y puede esparcir polvo venenoso o somnífero para debilitar a sus oponentes en combate.'),
(13, 13, 'Weedle', 'Bicho', 'Veneno', 'img/svg/13.svg', 'Weedle es un Pokémon de tipo Bicho y Veneno que utiliza el cuerno en su cabeza para inyectar veneno a sus enemigos. Aunque es pequeño, es muy peligroso para los Pokémon desprevenidos. Weedle pasa la mayor parte de su tiempo buscando hojas que pueda comer.'),
(14, 14, 'Kakuna', 'Bicho', 'Veneno', 'img/svg/14.svg', 'Kakuna es la evolución de Weedle. En esta etapa de su vida, Kakuna no puede moverse ni luchar, pero su caparazón es muy resistente y lo protege mientras se prepara para evolucionar. En su interior, Kakuna está desarrollando sus alas y aguijones, que usará una vez que se transforme en Beedrill.'),
(15, 15, 'Beedrill', 'Bicho', 'Veneno', 'img/svg/15.svg', 'Beedrill es la forma evolucionada de Kakuna. Este feroz Pokémon de tipo Bicho y Veneno ataca con sus afilados aguijones, que están cargados de veneno. Beedrill es extremadamente territorial y ataca en enjambres a cualquier intruso que se acerque a su nido. Es rápido y tiene una gran capacidad para planear emboscadas.'),
(16, 16, 'Pidgey', 'Normal', 'Volador', 'img/svg/16.svg', 'Pidgey es un Pokémon de tipo Normal y Volador que es conocido por su habilidad para orientarse en el aire y regresar a su hogar desde cualquier parte. Aunque no es muy fuerte en combate, Pidgey utiliza su agilidad para evitar ataques y escapa rápidamente volando.'),
(17, 17, 'Pidgeotto', 'Normal', 'Volador', 'img/svg/17.svg', 'Pidgeotto es la evolución de Pidgey. Este Pokémon de tipo Normal y Volador es más grande y fuerte que su predecesor. Pidgeotto patrulla grandes territorios en busca de presas y es capaz de volar a grandes alturas mientras busca comida. Es un cazador ágil que ataca con gran precisión.'),
(18, 18, 'Pidgeot', 'Normal', 'Volador', 'img/svg/18.svg', 'Pidgeot, la evolución final de Pidgey, es un Pokémon majestuoso con enormes alas que pueden generar ráfagas de viento. Pidgeot es increíblemente rápido y es capaz de romper la barrera del sonido al volar. Se le considera uno de los Pokémon voladores más poderosos.'),
(19, 19, 'Rattata', 'Normal', NULL, 'img/svg/19.svg', 'Rattata es un Pokémon de tipo Normal con dientes extremadamente afilados, que utiliza para roer casi cualquier cosa. Aunque es pequeño, es muy ágil y puede adaptarse fácilmente a diferentes entornos. Rattata se mueve en manadas para defenderse de los depredadores más grandes.'),
(20, 20, 'Raticate', 'Normal', NULL, 'img/svg/20.svg', 'Raticate es la evolución de Rattata. Con sus poderosos dientes, puede destrozar incluso los materiales más duros. Raticate es un Pokémon extremadamente territorial y puede volverse muy agresivo si siente que su territorio está en peligro. Su cola le ayuda a mantener el equilibrio mientras corre a gran velocidad.'),
(21, 21, 'Spearow', 'Normal', 'Volador', 'img/svg/21.svg', 'Spearow es un Pokémon de tipo Normal y Volador que se mueve rápidamente y ataca sin previo aviso. Sus alas cortas le permiten volar a gran velocidad en distancias cortas. Spearow es conocido por su temperamento agresivo y su disposición a defender su territorio con fiereza.'),
(22, 22, 'Fearow', 'Normal', 'Volador', 'img/svg/22.svg', 'Fearow, la evolución de Spearow, es un Pokémon grande de tipo Normal y Volador con un pico largo y afilado. Fearow es capaz de volar durante largos períodos de tiempo sin cansarse, lo que le permite recorrer grandes distancias en busca de presas. Es extremadamente hábil en el vuelo, capaz de realizar maniobras aéreas complejas.'),
(23, 23, 'Ekans', 'Veneno', NULL, 'img/svg/23.svg', 'Ekans es un Pokémon de tipo Veneno que se desliza silenciosamente por el suelo. Puede envolver a sus enemigos con su cuerpo y asfixiarlos antes de darles una mordida venenosa. Ekans también es capaz de trepar árboles y moverse en silencio para cazar a su presa.'),
(24, 24, 'Arbok', 'Veneno', NULL, 'img/svg/24.svg', 'Arbok, la evolución de Ekans, es un Pokémon intimidante de tipo Veneno con un patrón en su abdomen que asusta a sus enemigos. Arbok puede aplastar a sus oponentes con su poderosa constricción y su mordida está llena de veneno. Es extremadamente territorial y no dudará en atacar a cualquier intruso.'),
(25, 25, 'Pikachu', 'Eléctrico', NULL, 'img/svg/25.svg', 'Pikachu es un Pokémon de tipo Eléctrico conocido por sus habilidades para generar electricidad desde las bolsas en sus mejillas. Pikachu es un compañero leal y tiene un gran sentido de la amistad, pero cuando está amenazado, puede liberar potentes descargas eléctricas que aturden a sus oponentes.'),
(26, 26, 'Raichu', 'Eléctrico', NULL, 'img/svg/26.svg', 'Raichu es la evolución de Pikachu. Este Pokémon de tipo Eléctrico tiene una mayor capacidad para almacenar electricidad, lo que le permite generar potentes ataques eléctricos. Raichu utiliza su cola como conductor para liberar descargas que pueden dejar fuera de combate a sus enemigos en un instante.'),
(27, 27, 'Sandshrew', 'Tierra', NULL, 'img/svg/27.svg', 'Sandshrew es un Pokémon de tipo Tierra que excava en la arena para escapar de los depredadores. Su piel es dura como una roca, lo que lo protege de los ataques y lo ayuda a resistir las altas temperaturas de los desiertos. Sandshrew es capaz de rodar en una bola para defenderse o atacar.'),
(28, 28, 'Sandslash', 'Tierra', NULL, 'img/svg/28.svg', 'Sandslash, la evolución de Sandshrew, tiene garras afiladas que utiliza para excavar rápidamente. Su cuerpo está cubierto de púas duras que usa tanto para defenderse como para atacar a sus oponentes. Sandslash es muy rápido bajo tierra y puede crear túneles en cuestión de segundos.'),
(29, 29, 'Nidoran♀', 'Veneno', NULL, 'img/svg/29.svg', 'Nidoran♀ es un Pokémon de tipo Veneno con pequeñas púas venenosas en su cuerpo. A pesar de su tamaño, es muy valiente y no dudará en atacar si se siente amenazado. Sus orejas sensibles le permiten detectar el peligro a gran distancia.'),
(30, 30, 'Nidorina', 'Veneno', NULL, 'img/svg/30.svg', 'Nidorina, la evolución de Nidoran♀, es más fuerte y resistente que su predecesora. Aunque sigue siendo de tipo Veneno, Nidorina prefiere no usar sus púas venenosas a menos que sea absolutamente necesario. Es un Pokémon muy protector con su familia y amigos.'),
(31, 31, 'Nidoqueen', 'Veneno', 'Tierra', 'img/svg/31.svg', 'Nidoqueen es la evolución final de Nidoran♀. Este Pokémon de tipo Veneno y Tierra es extremadamente fuerte y utiliza su cuerpo masivo para aplastar a sus oponentes. Nidoqueen también es conocida por su capacidad para crear madrigueras en las que protege a sus crías.'),
(32, 32, 'Nidoran♂', 'Veneno', NULL, 'img/svg/32.svg', 'Nidoran♂ es un Pokémon de tipo Veneno que usa sus orejas para detectar amenazas a su alrededor. Sus cuernos contienen veneno, y los utiliza para defenderse de los depredadores. A pesar de su naturaleza cautelosa, Nidoran♂ es bastante rápido y ágil en combate.'),
(33, 33, 'Nidorino', 'Veneno', NULL, 'img/svg/33.svg', 'Nidorino, la evolución de Nidoran♂, tiene un cuerno más grande y afilado que está cargado de veneno. Nidorino es muy territorial y no duda en usar su cuerno para atacar a cualquier intruso. Es un Pokémon feroz en combate, conocido por su temperamento.'),
(34, 34, 'Nidoking', 'Veneno', 'Tierra', 'img/svg/34.svg', 'Nidoking es la evolución final de Nidoran♂. Este Pokémon de tipo Veneno y Tierra utiliza su increíble fuerza y su cuerno venenoso para atacar. Nidoking es muy territorial y defenderá su territorio con todas sus fuerzas, utilizando tanto su fuerza física como su poder venenoso.'),
(35, 35, 'Clefairy', 'Hada', NULL, 'img/svg/35.svg', 'Clefairy es un Pokémon de tipo Hada que adora bailar bajo la luz de la luna. Se cree que Clefairy obtiene su energía de la luz lunar, lo que le permite realizar poderosos ataques de tipo Hada. Su naturaleza tímida lo lleva a vivir en las montañas, lejos de los humanos.'),
(36, 36, 'Clefable', 'Hada', NULL, 'img/svg/36.svg', 'Clefable, la evolución de Clefairy, es un Pokémon de tipo Hada que es aún más poderoso bajo la luz de la luna. Se dice que su habilidad para flotar sobre el agua y su capacidad para escuchar incluso el sonido más suave le permiten moverse con gran gracia y sigilo.'),
(37, 37, 'Vulpix', 'Fuego', NULL, 'img/svg/37.svg', 'Vulpix es un Pokémon de tipo Fuego con seis colas que crecen a medida que envejece. Vulpix tiene la capacidad de controlar pequeñas llamas y generar fuego desde el interior de su cuerpo. Es un Pokémon astuto que usa su inteligencia para escapar de situaciones peligrosas.'),
(38, 38, 'Ninetales', 'Fuego', NULL, 'img/svg/38.svg', 'Ninetales, la evolución de Vulpix, es un Pokémon de tipo Fuego con un cuerpo elegante y nueve colas. Cada una de sus colas está llena de energía mística, y se dice que quien toque una de sus colas será maldecido. Ninetales tiene una longevidad extraordinaria y puede vivir durante miles de años.'),
(39, 39, 'Jigglypuff', 'Normal', 'Hada', 'img/svg/39.svg', 'Jigglypuff es un Pokémon de tipo Normal y Hada conocido por su habilidad para cantar melodías que adormecen a sus oponentes. Su suave cuerpo le permite inflarse como un globo y flotar en el aire. Jigglypuff utiliza su canto no solo en combate, sino también para calmar a los demás.'),
(40, 40, 'Wigglytuff', 'Normal', 'Hada', 'img/svg/40.svg', 'Wigglytuff, la evolución de Jigglypuff, es un Pokémon de tipo Normal y Hada con un cuerpo extremadamente elástico. Wigglytuff puede inflarse a un tamaño gigante y su piel es tan suave como la seda. Sus enormes ojos pueden derretir el corazón de cualquiera que los mire.'),
(41, 41, 'Zubat', 'Veneno', 'Volador', 'img/svg/41.svg', 'Zubat es un Pokémon de tipo Veneno y Volador que vive en la oscuridad de las cuevas. Aunque no tiene ojos, Zubat utiliza la ecolocación para moverse y cazar en la oscuridad. Prefiere vivir en grandes grupos, ya que eso le brinda protección contra los depredadores.'),
(42, 42, 'Golbat', 'Veneno', 'Volador', 'img/svg/42.svg', 'Golbat, la evolución de Zubat, es un Pokémon de tipo Veneno y Volador que usa sus colmillos afilados para chupar la sangre de sus enemigos. Golbat es más grande y fuerte que Zubat, y puede volar a gran velocidad en busca de presas. Su sed de sangre lo convierte en un peligroso oponente en combate.'),
(43, 43, 'Oddish', 'Planta', 'Veneno', 'img/svg/43.svg', 'Oddish es un Pokémon de tipo Planta y Veneno que crece enterrado en la tierra durante el día. Por la noche, Oddish sale para absorber la luz lunar y caminar. Es conocido por esparcir semillas mientras se mueve, lo que lo convierte en una parte importante del ecosistema de su entorno.'),
(44, 44, 'Gloom', 'Planta', 'Veneno', 'img/svg/44.svg', 'Gloom, la evolución de Oddish, es un Pokémon de tipo Planta y Veneno que desprende un olor muy desagradable para sus oponentes. Sin embargo, Gloom utiliza este olor como defensa, y aquellos que lo resisten pueden descubrir que sus pétalos tienen propiedades curativas.'),
(45, 45, 'Vileplume', 'Planta', 'Veneno', 'img/svg/45.svg', 'Vileplume es la evolución final de Oddish. Este Pokémon de tipo Planta y Veneno tiene el pétalo más grande y pesado de todos los Pokémon. Su polen es extremadamente tóxico, y un solo grano puede paralizar a un oponente. Vileplume es especialmente peligroso en combate debido a su capacidad para esparcir este polen en grandes cantidades.'),
(46, 46, 'Paras', 'Bicho', 'Planta', 'img/svg/46.svg', 'Paras es un Pokémon de tipo Bicho y Planta que tiene setas creciendo en su espalda. Estas setas son en realidad un hongo parásito que controla a Paras. En combate, Paras utiliza las esporas de estas setas para dormir o paralizar a sus oponentes.'),
(47, 47, 'Parasect', 'Bicho', 'Planta', 'img/svg/47.svg', 'Parasect, la evolución de Paras, es completamente controlado por el hongo en su espalda. Este Pokémon de tipo Bicho y Planta se mueve de manera lenta, pero su habilidad para esparcir esporas tóxicas lo convierte en un oponente peligroso. Las setas en su espalda crecen hasta cubrirlo por completo, afectando su comportamiento.'),
(48, 48, 'Venonat', 'Bicho', 'Veneno', 'img/svg/48.svg', 'Venonat es un Pokémon de tipo Bicho y Veneno cubierto de un pelaje denso que lo protege de los ataques enemigos. Sus ojos grandes y rojos pueden detectar incluso el más leve movimiento en la oscuridad. Venonat prefiere atacar en grupo, lanzando esporas venenosas para debilitar a sus oponentes.'),
(49, 49, 'Venomoth', 'Bicho', 'Veneno', 'img/svg/49.svg', 'Venomoth, la evolución de Venonat, es un Pokémon de tipo Bicho y Veneno con alas que esparcen polvo venenoso. Cuando Venomoth bate sus alas, puede crear nubes tóxicas que envenenan a sus enemigos. Su capacidad para volar le permite moverse rápidamente en combate.'),
(50, 50, 'Diglett', 'Tierra', NULL, 'img/svg/50.svg', 'Diglett es un Pokémon de tipo Tierra que vive bajo tierra. Aunque solo se puede ver su cabeza en la superficie, Diglett excava túneles subterráneos con gran rapidez. Este Pokémon es conocido por ayudar en la agricultura, ya que airea el suelo mientras excava.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_pokemon`
--

CREATE TABLE `tipos_pokemon` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_pokemon`
--

INSERT INTO `tipos_pokemon` (`id`, `tipo`) VALUES
(1, 'Normal'),
(2, 'Fuego'),
(3, 'Agua'),
(4, 'Planta'),
(5, 'Eléctrico'),
(6, 'Hielo'),
(7, 'Lucha'),
(8, 'Veneno'),
(9, 'Tierra'),
(10, 'Volador'),
(11, 'Psíquico'),
(12, 'Bicho'),
(13, 'Roca'),
(14, 'Fantasma'),
(15, 'Dragón'),
(16, 'Siniestro'),
(17, 'Acero'),
(18, 'Hada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`) VALUES
(1, 'admin', '123456'),
(2, 'test', 'test');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokedex`
--
ALTER TABLE `pokedex`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `numero_2` (`numero`);

--
-- Indices de la tabla `tipos_pokemon`
--
ALTER TABLE `tipos_pokemon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokedex`
--
ALTER TABLE `pokedex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `tipos_pokemon`
--
ALTER TABLE `tipos_pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
