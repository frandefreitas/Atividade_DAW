-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Maio-2018 às 11:21
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cdcidade` int(11) NOT NULL,
  `nmcidade` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `ufcidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cdcidade`, `nmcidade`, `ufcidade`) VALUES
(1, 'Pelotas', 1),
(3, 'Porto Alegre', 1),
(4, 'Bagée', 2),
(6, 'Cangucuu', 3),
(9, 'Capão da Garupa', 1),
(11, 'Curitiba', 3),
(13, 'Minas de Camaqua', 1),
(27, 'Tapes', 1),
(28, 'Joinville', 2),
(29, 'Camburio', 3),
(30, 'Francisco Beltrao', 3),
(33, 'Rio Verde', 3),
(34, 'Santana do Livramento', 1),
(35, 'Igrejinha', 1),
(38, 'Alegrete', 1),
(39, 'Alvorada', 1),
(40, 'Baraguaa', 3),
(41, 'Florianópolis', 2),
(42, 'Guaporé', 1),
(45, 'Manaue', 1),
(46, 'sldksdklslkdskl', 1),
(47, 'lkkllççl', 1),
(48, 'Goias', 3),
(50, 'kklklkl', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cdcurso` int(11) NOT NULL,
  `nmcurso` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `semestres` int(2) NOT NULL,
  `horas` int(4) NOT NULL,
  `nivel` enum('médio','tecnológico','técnico','fic','proeja') COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cdcurso`, `nmcurso`, `semestres`, `horas`, `nivel`) VALUES
(1, 'Informática', 6, 2400, 'tecnológico'),
(2, 'Eletrônica', 5, 2000, 'tecnológico'),
(10, 'Design de Interiores', 10, 6000, 'técnico'),
(11, 'Design de Moda', 10, 6000, 'técnico'),
(12, 'Design de Produto', 10, 6000, 'tecnológico'),
(13, 'Design Gráfico', 10, 6000, 'técnico'),
(14, 'Design de Móveis', 8, 7000, 'tecnológico'),
(17, 'Engenharia Civil', 10, 5000, 'tecnológico'),
(18, 'Engenharia Eletrica', 10, 5000, 'tecnológico'),
(19, 'Engenharia de Software', 10, 5000, 'tecnológico'),
(20, 'Engenharia da Produção', 10, 5000, 'tecnológico'),
(21, 'Engenharia de Petroleo', 10, 5000, 'tecnológico'),
(22, 'Engenharia da Computação', 10, 5000, 'tecnológico'),
(23, 'Engenharia de Hardware', 10, 5000, 'tecnológico'),
(24, 'Engenharia de Eletrônica', 10, 5000, 'tecnológico'),
(25, 'Engenharia de Química', 10, 5000, 'tecnológico'),
(26, 'Engenharia Mecatrônica', 10, 5000, 'tecnológico'),
(27, 'Engenharia Mecânica', 10, 5000, 'tecnológico'),
(28, 'Engenharia Florestal', 10, 5000, 'tecnológico'),
(30, 'Engenharia Agronoma', 10, 5000, 'tecnológico'),
(31, 'Engenharia Cartográfica', 10, 5000, 'tecnológico'),
(32, 'Engenharia Eletromecânica', 10, 5000, 'tecnológico'),
(33, 'Engenharia Industrial Madereira', 10, 5000, 'tecnológico'),
(34, 'Engenharia Cívil Portuária', 10, 5000, 'tecnológico'),
(35, 'Engenharia de Materias', 10, 5000, 'tecnológico'),
(36, 'Engenharia Bioquímica', 10, 5000, 'tecnológico'),
(37, 'Agronomia', 10, 5000, 'tecnológico'),
(38, 'Administração de Empresas', 10, 5000, 'tecnológico'),
(40, 'Economia', 10, 5000, 'tecnológico'),
(41, 'Ecologia', 10, 5000, 'tecnológico'),
(42, 'Agronegócio', 10, 5000, 'tecnológico'),
(45, 'Engenharia de Dados', 8000, 50, 'tecnológico'),
(50, 'Design Automotivoo00', 90, 9, 'tecnológico'),
(51, 'Letras', 90, 9, 'tecnológico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `cdestado` int(2) NOT NULL,
  `nmestado` varchar(2) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`cdestado`, `nmestado`) VALUES
(1, 'RS'),
(2, 'SC'),
(3, 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `cdmatricula` int(11) NOT NULL,
  `cdpessoa` int(11) NOT NULL,
  `cdcurso` int(11) NOT NULL,
  `situacao` int(11) NOT NULL,
  `anosemestre` varchar(5) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`cdmatricula`, `cdpessoa`, `cdcurso`, `situacao`, `anosemestre`) VALUES
(20171245, 73, 15, 4, '20172'),
(20172767, 67, 7, 3, '20172'),
(201711452, 77, 11, 8, '20171'),
(201711485, 85, 14, 3, '20171'),
(201711573, 73, 15, 3, '20171'),
(201713891, 91, 38, 3, '20171'),
(201713967, 67, 39, 3, '20171'),
(201714277, 73, 14, 8, '20171'),
(201721067, 67, 10, 3, '20172'),
(201721152, 52, 11, 3, '20172'),
(201721167, 67, 11, 3, '20172'),
(201721283, 68, 10, 12, '20172'),
(201724277, 77, 42, 3, '20172'),
(201725091, 91, 50, 3, '20172');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `cdpessoa` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(1) CHARACTER SET latin1 NOT NULL,
  `cdcidadepessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`cdpessoa`, `nome`, `nascimento`, `sexo`, `cdcidadepessoa`) VALUES
(73, 'Elis Regina', '1982-07-07', 'F', 3),
(75, 'Manuela', '2000-10-01', 'F', 9),
(76, 'Jean', '2000-05-30', 'M', 6),
(77, 'Claudio', '2000-05-30', 'M', 6),
(78, 'Rivaldo', '2000-05-30', 'M', 6),
(79, 'Leonardo', '2000-05-30', 'M', 6),
(80, 'Leomar', '2000-05-30', 'M', 6),
(81, 'Felix', '2001-03-05', 'M', 11),
(82, 'Tabata', '2001-03-05', 'F', 11),
(83, 'Josefa', '2001-03-05', 'F', 11),
(84, 'Maiara', '2001-03-05', 'F', 11),
(85, 'Maraisa', '2001-03-05', 'F', 11),
(86, 'Simone', '2001-03-05', 'F', 11),
(87, 'Simaria', '2001-03-05', 'F', 11),
(88, 'Marilia', '2001-03-05', 'F', 11),
(89, 'Marilia', '2006-03-06', 'F', 11),
(90, 'oi', '2000-03-02', 'F', 38),
(91, 'dksdjs', '1990-01-31', 'F', 39),
(92, 'Osvaldo', '2000-03-02', 'M', 4),
(93, 'marcel', '2000-02-10', 'M', 4),
(94, 'oidfiod', '2000-01-01', 'M', 4),
(95, 'oidfiodlkkl', '2000-01-01', 'M', 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sexo`
--

CREATE TABLE `sexo` (
  `cdsexo` varchar(1) COLLATE utf8_swedish_ci NOT NULL,
  `nmsexo` varchar(10) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `sexo`
--

INSERT INTO `sexo` (`cdsexo`, `nmsexo`) VALUES
('F', 'Feminino'),
('M', 'Masculino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `cdsituacao` int(11) NOT NULL,
  `nmsituacao` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`cdsituacao`, `nmsituacao`) VALUES
(2, 'estagio'),
(3, 'cursando'),
(4, 'trancado'),
(5, 'cancelado'),
(8, 'andamentoo'),
(9, 'concluído'),
(10, 'andando'),
(11, 'afastadoooo'),
(12, 'atestado'),
(13, 'suspenso'),
(16, 'Ameba'),
(18, 'evadio'),
(19, 'cancelado'),
(20, 'trancamento'),
(21, 'trancou');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cdturma` int(11) NOT NULL,
  `cdcursoturma` int(11) NOT NULL,
  `nmturma` varchar(4) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cdturma`, `cdcursoturma`, `nmturma`) VALUES
(1, 1, '1N1'),
(2, 2, '2N2'),
(8, 2, '1A5'),
(9, 2, '1hs'),
(13, 1, '300'),
(14, 2, '102'),
(15, 2, '103'),
(16, 1, '1A4'),
(21, 21, '2017'),
(22, 21, '2018'),
(23, 21, '2018'),
(24, 21, '2019'),
(25, 21, '2019'),
(26, 1, '2019'),
(27, 1, '2020'),
(28, 1, '2020'),
(29, 1, '1a0'),
(30, 1, '1a1'),
(31, 1, '1a2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `user` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user`, `pass`) VALUES
('andre', '1234'),
('chico', 'senha5'),
('leonardo', '1234'),
('gabriela', '1234'),
('luiza natale', '2405'),
('janaina', '12340'),
('leonardo', '12340'),
('jean', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cdcidade`),
  ADD KEY `ufcidade` (`ufcidade`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cdcurso`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`cdestado`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`cdmatricula`),
  ADD KEY `FKSITUACAO` (`situacao`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`cdpessoa`),
  ADD KEY `fkcidadepessoa` (`cdcidadepessoa`);

--
-- Indexes for table `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`cdsexo`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`cdsituacao`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cdturma`),
  ADD KEY `fkcursoturma` (`cdcursoturma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cdcidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cdcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `cdestado` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `cdpessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `cdsituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `cdturma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fkuf` FOREIGN KEY (`ufcidade`) REFERENCES `estado` (`cdestado`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FKSITUACAO` FOREIGN KEY (`situacao`) REFERENCES `situacao` (`cdsituacao`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fkcidadepessoa` FOREIGN KEY (`cdcidadepessoa`) REFERENCES `cidade` (`cdcidade`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fkcursoturma` FOREIGN KEY (`cdcursoturma`) REFERENCES `curso` (`cdcurso`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
