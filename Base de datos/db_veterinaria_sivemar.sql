-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-03-2023 a las 23:37:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_veterinaria_sivemar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aplica`
--

CREATE TABLE `tbl_aplica` (
  `cod_vacuna` int(10) NOT NULL,
  `cod_consulta` int(10) NOT NULL,
  `dosis` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_aplica`
--

INSERT INTO `tbl_aplica` (`cod_vacuna`, `cod_consulta`, `dosis`) VALUES
(10, 1, '10mg'),
(13, 2, '3mg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_citas`
--

CREATE TABLE `tbl_citas` (
  `cod_mascota` int(10) NOT NULL,
  `fecha_cita` date NOT NULL,
  `num_consultorio` int(20) NOT NULL,
  `ced_propietario` int(10) NOT NULL,
  `ced_veterinario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clases`
--

CREATE TABLE `tbl_clases` (
  `cod_clase` int(10) NOT NULL,
  `descripcion_cla` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_phylum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_clases`
--

INSERT INTO `tbl_clases` (`cod_clase`, `descripcion_cla`, `cod_phylum`) VALUES
(1, 'mammalia', 1),
(2, 'sauropsida', 1),
(3, 'aves', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_consultas`
--

CREATE TABLE `tbl_consultas` (
  `cod_consulta` int(10) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `tratamiento` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `frec_cardiaca` float NOT NULL,
  `frec_respiratoria` float NOT NULL,
  `temperatura` float NOT NULL,
  `rev_oftalmologica` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_mascota` int(10) NOT NULL,
  `ced_veterinario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_consultas`
--

INSERT INTO `tbl_consultas` (`cod_consulta`, `fecha_consulta`, `estado`, `tratamiento`, `frec_cardiaca`, `frec_respiratoria`, `temperatura`, `rev_oftalmologica`, `cod_mascota`, `ced_veterinario`) VALUES
(1, '2023-03-18', 'mal', 'un poquito de agua y sol', 10, 8, 37, 'buena vista', 1, 10199211),
(2, '2023-03-17', 'grave', 'no se', 10, 15, 35, 'fino', 1, 29655551),
(3, '2023-03-17', 'decente', 'no hay solucion', 15, 10, 20, 'bien', 4, 29655551);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_especies`
--

CREATE TABLE `tbl_especies` (
  `cod_especie` int(10) NOT NULL,
  `descripcion_esp` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_genero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_especies`
--

INSERT INTO `tbl_especies` (`cod_especie`, `descripcion_esp`, `cod_genero`) VALUES
(1, 'canis lupus familiaris', 11),
(2, 'felis silvestres catus', 10),
(3, 'chelonoidis carbonaria', 9),
(4, 'chinchilla lanigera', 8),
(5, 'phodopus campbelli', 7),
(6, 'cavia porcellus', 6),
(7, 'mustela putorius', 5),
(8, 'chamaeleo chamaeleon', 4),
(9, 'serinus canaria', 3),
(10, 'icterus icterus', 2),
(11, 'ara macao', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_familias`
--

CREATE TABLE `tbl_familias` (
  `cod_familia` int(10) NOT NULL,
  `descripcion_fam` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_orden` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_familias`
--

INSERT INTO `tbl_familias` (`cod_familia`, `descripcion_fam`, `cod_orden`) VALUES
(1, 'canidae', 1),
(2, 'felidae', 1),
(3, 'testudinidae', 2),
(4, 'chinchillidae', 3),
(5, 'cricetidae', 3),
(6, 'caviidae', 3),
(7, 'mustelidae', 1),
(8, 'chamaeleonidae', 4),
(9, 'fringillidae', 5),
(10, 'icteridae', 5),
(11, 'psittacidae', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

CREATE TABLE `tbl_generos` (
  `cod_genero` int(10) NOT NULL,
  `descripcion_gen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_familia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_generos`
--

INSERT INTO `tbl_generos` (`cod_genero`, `descripcion_gen`, `cod_familia`) VALUES
(1, 'ara', 11),
(2, 'icterus', 10),
(3, 'serinus', 9),
(4, 'chamaeleo', 8),
(5, 'mustela', 7),
(6, 'cavia', 6),
(7, 'phodopus', 5),
(8, 'chinchilla', 4),
(9, 'chelonoidis', 3),
(10, 'felis', 2),
(11, 'canis', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mascotas`
--

CREATE TABLE `tbl_mascotas` (
  `ced_propietario` int(10) NOT NULL,
  `cod_mascota` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ced_usuario` int(10) NOT NULL,
  `cod_especie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_mascotas`
--

INSERT INTO `tbl_mascotas` (`ced_propietario`, `cod_mascota`, `nombre`, `fecha_nacimiento`, `ced_usuario`, `cod_especie`) VALUES
(29655551, 1, 'domi', '2021-02-10', 29655551, 1),
(29655551, 4, 'Jonathan', '2019-02-06', 29655485, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_medicinas`
--

CREATE TABLE `tbl_medicinas` (
  `cod_medicina` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cant_disponible` int(10) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_medicinas`
--

INSERT INTO `tbl_medicinas` (`cod_medicina`, `nombre`, `descripcion`, `cant_disponible`, `costo`) VALUES
(1, 'Miralax', 'En pequeñas dosis, este laxante puede ayudar a tu mascota si tuviera problemas de estreñimiento\n', 25, 5.5),
(2, 'Pepcid', 'Puede ser usado para prevenir úlceras e inflamación causada por acidez estomacal tanto en humanos como en mascotas. \r\n', 20, 7.5),
(3, 'Prilosec', 'Este es un antiácido que suele ser seguro para mascotas, aunque también se han presentado efectos secundarios como vómito, pérdida de apetito, flatulencia, cambios en la orina.\r\n', 20, 4),
(4, 'Lomotil', 'Este medicamento generalmente es recetado para tratar diarrea, sin embargo, con mascotas también suele ser particularmente efectivo para tratar la tos.\r\n', 20, 10.8),
(5, 'Benadryl', 'Popularmente conocida por ayudar con las alergias en humanos, este medicamento también puede ser efectivo con mascotas. Asimismo, puede servir como sedante en caso de animales ansiosos, especialmente cuando un paseo en auto los marea o los pone nerviosos,', 20, 5.7),
(6, 'Solución salina', 'Estas gotas pueden ayudarte a lavar e hidratar los ojos de tu gato, así como también han probado ser efectivas para aliviar una conjuntivitis leve e irritación de ojos.\r\n', 20, 3.2),
(7, 'Dramamine', 'Así como las personas, algunas mascotas también se marean. Este medicamento puede ayudarlas a reducir los síntomas del vértigo o cuando pasean en el auto.\r\n', 20, 6.7),
(8, 'Glucosamine', 'Son ideales para aliviar el dolor en mascotas que presentan síntomas de artritis u otros problemas de articulaciones, particularmente en mascotas de la tercera edad.\r\n', 20, 15),
(9, 'Agua oxigenada', 'Comúnmente usado como un antiséptico en humanos, este compuesto químico también ayuda a inducir el vómito.\r\n', 20, 2.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ordenes`
--

CREATE TABLE `tbl_ordenes` (
  `cod_orden` int(10) NOT NULL,
  `descripcion_ord` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_clase` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_ordenes`
--

INSERT INTO `tbl_ordenes` (`cod_orden`, `descripcion_ord`, `cod_clase`) VALUES
(1, 'carnivora', 1),
(2, 'testudines', 2),
(3, 'rodentia', 1),
(4, 'isquamata', 2),
(5, 'ipasseriformes', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `cedula` int(10) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_personas`
--

INSERT INTO `tbl_personas` (`cedula`, `nombre`, `apellido`, `telefono`) VALUES
(10199211, 'luis', 'mata', '04123533117'),
(12067253, 'Suhail Aurora', 'Zabala Ayala', '04265865694'),
(27650675, 'Joel', 'Guillen', '04262839053'),
(29655485, 'Juan', 'arismendi', '04164567891'),
(29655551, 'Luis', 'mata', '04120937388');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_phylums`
--

CREATE TABLE `tbl_phylums` (
  `cod_phylum` int(10) NOT NULL,
  `descripcion_phy` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_reino` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_phylums`
--

INSERT INTO `tbl_phylums` (`cod_phylum`, `descripcion_phy`, `cod_reino`) VALUES
(1, 'chordata', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_propietarios`
--

CREATE TABLE `tbl_propietarios` (
  `cedula` int(10) NOT NULL,
  `direccion` varchar(75) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_propietarios`
--

INSERT INTO `tbl_propietarios` (`cedula`, `direccion`) VALUES
(12067253, 'La Guardia'),
(29655485, 'guacuco'),
(29655551, 'la fuente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_receta`
--

CREATE TABLE `tbl_receta` (
  `cod_medicina` int(10) NOT NULL,
  `cod_consulta` int(11) NOT NULL,
  `indicaciones` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reinos`
--

CREATE TABLE `tbl_reinos` (
  `cod_reino` int(10) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_reinos`
--

INSERT INTO `tbl_reinos` (`cod_reino`, `descripcion`) VALUES
(1, 'animalia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `cedula` int(10) NOT NULL,
  `login` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nivel_acceso` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`cedula`, `login`, `password`, `nivel_acceso`) VALUES
(29655485, 'juan', '$2y$10$Thq.OXPBpy14XzhVnRC.z.fC/bXNmEJL7USADS/Wiz3TSB/JuEB96', 'cliente'),
(29655485, 'juan_admin', '$2y$10$aCbW66/5q8SUiUgTS1Tx0OcFHIcTVIuAAMPfHjpalvhP3h7GV/GCm', 'admin'),
(29655551, 'luis', '$2y$10$7q78w.ATGmXd9prwXSp/Te/.9dU6tT32OBEUflCpXdaMheIty0qNK', 'admin'),
(29655551, 'luis_cliente', '$2y$10$qGPKRRXvAdcWEtjynSRQ7.bJbwAVZlGhVxQuYOmXrjof90ZnXetLi', 'cliente'),
(27650675, 'Mondongo1', '$2y$10$01VnvbFNkuWJArkRTa9AX..uPwfV8Uov45IZxK4O5DAHJhGZg5ATK', 'admin'),
(12067253, 'saza', '$2y$10$a.FzgrWRujpfaEGCfmZ/3eQvwoEZsDM5.YPEzA6qh4Ig2LOkoTQ3C', 'cliente'),
(12067253, 'sazasazasaza', '$2y$10$suhTpDy1fM9aQ6dGrc7PfeGWLPc9P3myJgzfHKvR9QFlTsMCX6otm', 'admin'),
(10199211, 'si', '$2y$10$e6eOIhRyHz2O0oKlBRo5x.i.E99DNYK0WhsrfGMZ88ut8nTsb9qKu', 'veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vacunas`
--

CREATE TABLE `tbl_vacunas` (
  `cod_vacuna` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_vacunas`
--

INSERT INTO `tbl_vacunas` (`cod_vacuna`, `nombre`, `descripcion`) VALUES
(1, 'Vacuna contra el distemper', 'Está indicada para el uso en animales con niveles elevados de anticuerpos maternos contra el Virus Distemper Canino. La edad más temprana a que estos niveles no interfieren con la vacunación es de 6 semanas en la mayoría de los animales.'),
(2, 'Vacuna contra parvovirus', 'Es para la vacunación de perros sanos de 6 semanas de edad o mayores, como una ayuda en la prevención de la Enteritis causada por el Coronavirus Canino y el Parvovirus Canino.'),
(3, 'Vacuna contra la hepatitis infecciosa canina o ade', 'La vacuna está indicada para la inmunización activa de perros y cachorros sanos contra las enfermedades producidas por el virus del adenovirus canino de tipo 1 y 2 '),
(4, 'Vacuna contra la leptospirosis', 'Es una suspensión inyectable que se utiliza para vacunar a perros a partir de las 6 semanas de edad, a fin protegerlos contra la leptospirosis causada por uno de cuatro tipos específicos de la bacteria Leptospira.'),
(5, 'Vacuna contra la rabia', 'Es una vacuna en suspensión acuosa de fosfato de aluminio, que contiene virus de la rabia, clonado de la cepa Pasteur RIVM con una potencia ≥ 2.0 UI. El virus es cultivado en la línea de la célula BHK 21 clone CT e inactivado por Beta-propiolactona.'),
(6, 'Vacuna contra el moquillo', 'Al tener el moquillo canino o distemper en inglés, posee una mortalidad cercana al 100%, es muy importante prevenirla, por esta razón se deberá vacunar.'),
(7, 'Vacuna Trivalente', 'La vacuna trivalente en gatos es una forma de inmunizar al animal frente a tres enfermedades potencialmente graves para él: la rinotraqueítis felina, el calicivirus felino y la panleucopenia felina.'),
(8, 'Vacuna Leucemia ', 'Ayuda a proteger a su gato contra el virus de la leucemia felina (FeLV). Este virus se transmite de un gato a otro, o por medio del contacto con platos de alimentos o cajones de arena para excrementos contaminados'),
(9, 'Marek', 'Esta vacuna contiene la cepa Rispens CVI 988 del virus herpes de pollo. Este producto se usa como una ayuda en la prevención de casos muy virulentos de la enfermedad de Marek en aves.'),
(10, 'Gumboro', 'Es una vacuna activa liofilizada contra la enfermedad infecciosa de la Bursa (Gumboro), desarrollada en huevos embrionados'),
(11, 'Viruela Aviar', 'Vacuna contra la Viruela Aviar está indicada para la prevención y control de la Viruela Aviar en aves sanas a partir de las 3 semanas de edad'),
(12, 'Newcastle', 'Vacuna a virus vivo indicada contra los signos clínicos causados por el virus de la Enfermedad de Newcastle, de uso en aves'),
(13, 'Bronquitis Infecciosa', 'Es una vacuna que contiene un virus atenuado de la Bronquitis Infecciosa Aviar (cepa1/96) que pertenece al grupo viral 793 B'),
(14, 'Reovirosis Aviar', 'Es una vacuna para aves sanas como ayuda en la prevención de la Tenosinovitis Viral (Artritis Viral) causada por Reovirus en pollo de engorde desde un día de edad y en reproductoras desde las 2 semanas de edad o mayores, en el agua de bebida.'),
(15, 'Coriza Infecciosa', 'Es una vacuna inactivada contra la Coriza Infecciosa, Bronquitis Infecciosa, Enfermedad de Newcastle y Síndrome de Baja Postura, indicada para la inmunización activa de aves de postura'),
(16, 'Coccidiosis Aviar', 'Es una vacuna veterinaria destinada a proteger a las aves frente a la coccidiosis causada por los parásitos coccidios Eimeria acervulina, Eimeria maxima, Eimeria mitis, Eimeria praecox y Eimeria tenella.'),
(17, 'Cólera Aviar', 'Está indicada para la vacunación de aves sanas de pollos de carne, postura y reproductoras, como ayuda en la prevención de Cólera aviar '),
(18, 'Hepatitis por Cuerpos de Inclusión', 'La vacunación es el método más eficaz contra la enfermedad gracias a la transmisión vertical de anticuerpos maternos.'),
(19, 'Laringotraqueitis Aviar', 'Es una vacuna veterinaria que se utiliza para proteger a las aves de infecciones en las vías respiratorias que pueden afectar a su crecimiento y su reproducción '),
(20, 'Influenza Aviar', 'La vacuna estimula la inmunidad activa frente al virus de la Influenza Aviar tipo A, subtipo H5. '),
(21, 'Metapneumovirosis Aviar (A.R.T.)', 'Vacuna a virus vivo contra el AMPV conteniendo la cepa pollo 1062 subtipo B, con un título de 102.4 DICT50.'),
(22, 'Colibacilosis', 'Es una vacuna que se utiliza en aves para la inmunización activa contra una infección provocada por Escherichia coli serotipo O78 y que se denomina colibacilosis.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_veterinarios`
--

CREATE TABLE `tbl_veterinarios` (
  `cedula` int(10) NOT NULL,
  `experiencia_lab` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estudios` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `num_colegio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_veterinarios`
--

INSERT INTO `tbl_veterinarios` (`cedula`, `experiencia_lab`, `estudios`, `num_colegio`) VALUES
(10199211, 'dormir', 'demasiados', 123),
(29655551, 'Mucha', 'Los suficientes como para graduarme', 10583);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_aplica`
--
ALTER TABLE `tbl_aplica`
  ADD PRIMARY KEY (`cod_vacuna`,`cod_consulta`),
  ADD KEY `cod_consulta` (`cod_consulta`);

--
-- Indices de la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  ADD PRIMARY KEY (`cod_mascota`,`fecha_cita`),
  ADD KEY `ced_propietario` (`ced_propietario`),
  ADD KEY `ced_veterinario` (`ced_veterinario`);

--
-- Indices de la tabla `tbl_clases`
--
ALTER TABLE `tbl_clases`
  ADD PRIMARY KEY (`cod_clase`),
  ADD KEY `cod_phylum` (`cod_phylum`);

--
-- Indices de la tabla `tbl_consultas`
--
ALTER TABLE `tbl_consultas`
  ADD PRIMARY KEY (`cod_consulta`),
  ADD KEY `ced_veterinario` (`ced_veterinario`),
  ADD KEY `cod_mascota` (`cod_mascota`);

--
-- Indices de la tabla `tbl_especies`
--
ALTER TABLE `tbl_especies`
  ADD PRIMARY KEY (`cod_especie`),
  ADD KEY `cod_genero` (`cod_genero`);

--
-- Indices de la tabla `tbl_familias`
--
ALTER TABLE `tbl_familias`
  ADD PRIMARY KEY (`cod_familia`),
  ADD KEY `cod_orden` (`cod_orden`);

--
-- Indices de la tabla `tbl_generos`
--
ALTER TABLE `tbl_generos`
  ADD PRIMARY KEY (`cod_genero`),
  ADD KEY `cod_familia` (`cod_familia`);

--
-- Indices de la tabla `tbl_mascotas`
--
ALTER TABLE `tbl_mascotas`
  ADD PRIMARY KEY (`cod_mascota`) USING BTREE,
  ADD KEY `ced_usuario` (`ced_usuario`),
  ADD KEY `cod_especie` (`cod_especie`);

--
-- Indices de la tabla `tbl_medicinas`
--
ALTER TABLE `tbl_medicinas`
  ADD PRIMARY KEY (`cod_medicina`);

--
-- Indices de la tabla `tbl_ordenes`
--
ALTER TABLE `tbl_ordenes`
  ADD PRIMARY KEY (`cod_orden`),
  ADD KEY `cod_clase` (`cod_clase`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `tbl_phylums`
--
ALTER TABLE `tbl_phylums`
  ADD PRIMARY KEY (`cod_phylum`),
  ADD KEY `cod_reino` (`cod_reino`);

--
-- Indices de la tabla `tbl_propietarios`
--
ALTER TABLE `tbl_propietarios`
  ADD UNIQUE KEY `cedula_2` (`cedula`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `tbl_receta`
--
ALTER TABLE `tbl_receta`
  ADD PRIMARY KEY (`cod_medicina`,`cod_consulta`),
  ADD KEY `cod_consulta` (`cod_consulta`);

--
-- Indices de la tabla `tbl_reinos`
--
ALTER TABLE `tbl_reinos`
  ADD PRIMARY KEY (`cod_reino`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `tbl_vacunas`
--
ALTER TABLE `tbl_vacunas`
  ADD PRIMARY KEY (`cod_vacuna`);

--
-- Indices de la tabla `tbl_veterinarios`
--
ALTER TABLE `tbl_veterinarios`
  ADD UNIQUE KEY `num_colegio` (`num_colegio`),
  ADD KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_clases`
--
ALTER TABLE `tbl_clases`
  MODIFY `cod_clase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_consultas`
--
ALTER TABLE `tbl_consultas`
  MODIFY `cod_consulta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_especies`
--
ALTER TABLE `tbl_especies`
  MODIFY `cod_especie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_familias`
--
ALTER TABLE `tbl_familias`
  MODIFY `cod_familia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_generos`
--
ALTER TABLE `tbl_generos`
  MODIFY `cod_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_mascotas`
--
ALTER TABLE `tbl_mascotas`
  MODIFY `cod_mascota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_medicinas`
--
ALTER TABLE `tbl_medicinas`
  MODIFY `cod_medicina` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_ordenes`
--
ALTER TABLE `tbl_ordenes`
  MODIFY `cod_orden` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_phylums`
--
ALTER TABLE `tbl_phylums`
  MODIFY `cod_phylum` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_reinos`
--
ALTER TABLE `tbl_reinos`
  MODIFY `cod_reino` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_vacunas`
--
ALTER TABLE `tbl_vacunas`
  MODIFY `cod_vacuna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_aplica`
--
ALTER TABLE `tbl_aplica`
  ADD CONSTRAINT `tbl_aplica_ibfk_1` FOREIGN KEY (`cod_vacuna`) REFERENCES `tbl_vacunas` (`cod_vacuna`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_aplica_ibfk_2` FOREIGN KEY (`cod_consulta`) REFERENCES `tbl_consultas` (`cod_consulta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  ADD CONSTRAINT `tbl_citas_ibfk_1` FOREIGN KEY (`cod_mascota`) REFERENCES `tbl_mascotas` (`cod_mascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_citas_ibfk_3` FOREIGN KEY (`ced_veterinario`) REFERENCES `tbl_veterinarios` (`cedula`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_citas_ibfk_4` FOREIGN KEY (`ced_propietario`) REFERENCES `tbl_propietarios` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_clases`
--
ALTER TABLE `tbl_clases`
  ADD CONSTRAINT `tbl_clases_ibfk_1` FOREIGN KEY (`cod_phylum`) REFERENCES `tbl_phylums` (`cod_phylum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_consultas`
--
ALTER TABLE `tbl_consultas`
  ADD CONSTRAINT `tbl_consultas_ibfk_1` FOREIGN KEY (`cod_mascota`) REFERENCES `tbl_mascotas` (`cod_mascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_consultas_ibfk_2` FOREIGN KEY (`ced_veterinario`) REFERENCES `tbl_veterinarios` (`cedula`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_especies`
--
ALTER TABLE `tbl_especies`
  ADD CONSTRAINT `tbl_especies_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `tbl_generos` (`cod_genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_familias`
--
ALTER TABLE `tbl_familias`
  ADD CONSTRAINT `tbl_familias_ibfk_1` FOREIGN KEY (`cod_orden`) REFERENCES `tbl_ordenes` (`cod_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_generos`
--
ALTER TABLE `tbl_generos`
  ADD CONSTRAINT `tbl_generos_ibfk_1` FOREIGN KEY (`cod_familia`) REFERENCES `tbl_familias` (`cod_familia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mascotas`
--
ALTER TABLE `tbl_mascotas`
  ADD CONSTRAINT `tbl_mascotas_ibfk_3` FOREIGN KEY (`cod_especie`) REFERENCES `tbl_especies` (`cod_especie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_ordenes`
--
ALTER TABLE `tbl_ordenes`
  ADD CONSTRAINT `tbl_ordenes_ibfk_1` FOREIGN KEY (`cod_clase`) REFERENCES `tbl_clases` (`cod_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_phylums`
--
ALTER TABLE `tbl_phylums`
  ADD CONSTRAINT `tbl_phylums_ibfk_1` FOREIGN KEY (`cod_reino`) REFERENCES `tbl_reinos` (`cod_reino`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_propietarios`
--
ALTER TABLE `tbl_propietarios`
  ADD CONSTRAINT `tbl_propietarios_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `tbl_personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_receta`
--
ALTER TABLE `tbl_receta`
  ADD CONSTRAINT `tbl_receta_ibfk_1` FOREIGN KEY (`cod_medicina`) REFERENCES `tbl_medicinas` (`cod_medicina`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_receta_ibfk_2` FOREIGN KEY (`cod_consulta`) REFERENCES `tbl_consultas` (`cod_consulta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `tbl_personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_veterinarios`
--
ALTER TABLE `tbl_veterinarios`
  ADD CONSTRAINT `tbl_veterinarios_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `tbl_personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
