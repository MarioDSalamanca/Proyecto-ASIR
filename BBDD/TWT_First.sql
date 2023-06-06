-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2023 a las 20:28:23
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TWT_First`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Componentes`
--

CREATE TABLE `Componentes` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especificación` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `empresa` varchar(25) NOT NULL,
  `grupo` enum('Comun','PCs','Portatil') NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tabla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Componentes`
--

INSERT INTO `Componentes` (`id`, `nombre`, `especificación`, `precio`, `empresa`, `grupo`, `tipo`, `cantidad`, `imagen`, `tabla`) VALUES
(10000, 'Bose L1 Pro32', 'Bose L1 Pro32 Altavoz De PA Portátil Bluetooth 1000W', 1899, 'Bose', 'Comun', 'Altavoz', 996, 'Bose L1 Pro32.jpg', 'Altavoz'),
(10001, 'Polk Reserve R600', 'Polk Reserve R600 Pareja Altavoces de Suelo Blancos', 1079, 'Polk', 'Comun', 'Altavoz', 1000, 'Polk Reserve R600.jpg', 'Altavoz'),
(10002, 'Bose Sub21', 'Bose Sub1 Módulo de Graves 480W', 849, 'Bose', 'Comun', 'Altavoz', 1000, 'Bose Sub21.jpg', 'Altavoz'),
(10003, 'Lenovo ThinkSmart Bar XL', 'Lenovo ThinkSmart Bar XL Barra de Sonido con Micrófono 40W Negra', 736.99, 'Lenovo', 'Comun', 'Altavoz', 1000, 'Lenovo ThinkSmart Bar XL.jpg', 'Altavoz'),
(10004, 'Sony MHC-V73D', 'Sony MHC-V73D Altavoz Trolley Bluetooth Negro', 710.19, 'Sony', 'Comun', 'Altavoz', 1000, 'Sony MHC-V73D.jpg', 'Altavoz'),
(10005, 'Bose S1 Pro', 'Bose S1 Pro Altavoz Profesional Bluetooth Negro', 628.99, 'Bose', 'Comun', 'Altavoz', 1000, 'Bose S1 Pro.jpg', 'Altavoz'),
(10006, 'Sony SRS-RA3000', 'Sony SRS-RA3000 Altavoz Inalámbrico Premium Gris', 561.87, 'Sony', 'Comun', 'Altavoz', 1000, 'Sony SRS-RA3000.jpg', 'Altavoz'),
(10007, 'JBL PartyBox 310', 'JBL PartyBox 310 Altavoz Bluetooth Negro', 544.98, 'JBL', 'Comun', 'Altavoz', 1000, 'JBL PartyBox 310.jpg', 'Altavoz'),
(10008, 'Polk Atrium6', 'Polk Atrium6 Pareja Altavoces de Exterior Blancos', 448.99, 'Polk', 'Comun', 'Altavoz', 1000, 'Polk Atrium6.jpg', 'Altavoz'),
(10009, 'Polk Reserve R350', 'Polk Reserve R350 Altavoz Central Negro', 399, 'Polk', 'Comun', 'Altavoz', 1000, 'Polk Reserve R350.jpg', 'Altavoz'),
(10010, 'JBL Xtreme 3', 'JBL Xtreme 3 Altavoz Bluetooth Azul', 313.23, 'JBL', 'Comun', 'Altavoz', 1000, 'JBL Xtreme 3.jpg', 'Altavoz'),
(10011, 'Sony MHC-V02', 'Sony MHC-V02 Sistema de Audio Hi-Fi Bluetooth/USB', 268.99, 'Sony', 'Comun', 'Altavoz', 1000, 'Sony MHC-V02.jpg', 'Altavoz'),
(10012, 'Sony SRS-NB10', 'Sony SRS-NB10 Altavoces Neckband Bluetooth Negros', 175.8, 'Sony', 'Comun', 'Altavoz', 1000, 'Sony SRS-NB10.jpg', 'Altavoz'),
(10013, 'Dell SP3022', 'Dell SP3022 Altavoz Manos Libres para Conferencias USB-C Blanco', 97.35, 'Dell', 'Comun', 'Altavoz', 1000, 'Dell SP3022.jpg', 'Altavoz'),
(10014, 'HP S101', 'HP S101 Barra de Sonido USB 2.5W', 53.49, 'HP', 'Comun', 'Altavoz', 998, 'HP S101.jpg', 'Altavoz'),
(10015, 'JVC XP-EXTI', 'JVC XP-EXT1 Auriculares Inalámbricos Negros', 999, 'JVC', 'Comun', 'Auricular', 1000, 'JVC XP-EXTI.jpg', 'Auricular'),
(10016, 'Bang & Olufsen Beoplay Portal', 'Bang & Olufsen Beoplay Portal Auriculares Gaming Bluetooth Azules', 550.4, 'Bang', 'Comun', 'Auricular', 1000, 'Bang & Olufsen Beoplay Portal.jpg', 'Auricular'),
(10017, 'Cisco 730', 'Cisco 730 Auriculares Bluetooth Supraaurales USB Negros con Cancelación Activa de Ruido', 445.61, 'Cisco', 'Comun', 'Auricular', 1000, 'Cisco 730.jpg', 'Auricular'),
(10018, 'Epos H3PRO Hybrid', 'Epos H3PRO Hybrid Auriculares Inalámbricos Gaming con Acústica Cerrada Blancos', 403, 'Epos', 'Comun', 'Auricular', 1000, 'Epos H3PRO Hybrid.jpg', 'Auricular'),
(10019, 'Cisco 561', 'Cisco 561 Auricular Monoaural Bluetooth USB Negro', 401.99, 'Cisco', 'Comun', 'Auricular', 1000, 'Cisco 561.jpg', 'Auricular'),
(10020, 'Razer Kraken V3 Pro', 'Razer Kraken V3 Pro Auriculares Gaming 7.1 Inalámbricos Negros', 317.79, 'Razer', 'Comun', 'Auricular', 1000, 'Razer Kraken V3 Pro.jpg', 'Auricular'),
(10021, 'Corsari Virtuoso RGB', 'Corsair Virtuoso RGB Wireless SE Auriculares Gaming 7.1 Inalámbricos', 301.91, 'Corsair', 'Comun', 'Auricular', 1000, 'Corsair Virtuoso RGB.jpg', 'Auricular'),
(10022, 'Apple AirPods Pro 2ªG', 'Apple AirPods Pro 2ª Generación con Estuche de Carga Inalámbrica Blancos', 282.99, 'Apple', 'Comun', 'Auricular', 1000, 'Apple AirPods Pro 2ªG.jpg', 'Auricular'),
(10023, 'Sony INZONE H7', 'Sony INZONE H7 Auriculares Gaming Inalámbricos 7.1 PC/PS5 Blanco', 218.99, 'Sony', 'Comun', 'Auricular', 1000, 'Sony INZONE H7.jpg', 'Auricular'),
(10024, 'Razer Barracuda', 'Razer Barracuda Auriculares Inalámbricos Gaming Quartz', 189.99, 'Razer', 'Comun', 'Auricular', 1000, 'Razer Barracuda.jpg', 'Auricular'),
(10025, 'Forgeon General', 'Forgeon General Auriculares Gaming Inalámbricos PC/PS4/PS5/Xbox/Xbox X/Switch Negros', 159.99, 'Forgeon', 'Comun', 'Auricular', 1000, 'Forgeon General.jpg', 'Auricular'),
(10026, 'Logitech G Pro X', 'Logitech G PRO X Auriculares Gaming 7.1', 83.49, 'Logitech', 'Comun', 'Auricular', 1000, 'Logitech G Pro X.jpg', 'Auricular'),
(10027, 'JBL Free II', 'JBL Free II Auriculares Bluetooth Blancos', 71.7, 'JBL', 'Comun', 'Auricular', 1000, 'JBL Free II.jpg', 'Auricular'),
(10028, 'Intel Core i5-11400F 2.6GHz', 'Intel Core i5-11400F 2.6GHz', 169.99, 'Intel', 'Comun', 'CPU', 1000, 'i5-11g.jpg', 'Procesador'),
(10029, 'Intel Core i5-10400F 2.9GHz', 'Intel Core i5-10400F 2.9GHz', 145.99, 'Intel', 'Comun', 'CPU', 1000, 'i5-10g.jpg', 'Procesador'),
(10030, 'Intel Core i5-12400F 4.4GHz', 'Intel Core i5-12400F 4.4GHz', 216.99, 'Intel', 'Comun', 'CPU', 1000, 'i5-12g.jpg', 'Procesador'),
(10031, 'Intel Core i3-10105 3.7GHz', 'Intel Core i3-10105 3.7GHz', 136.98, 'Intel', 'Comun', 'CPU', 1000, 'i3-10g.jpg', 'Procesador'),
(10032, 'Intel Core i3-12100 4.3GHz', 'Intel Core i3-12100 4.3GHz', 162.99, 'Intel', 'Comun', 'CPU', 1000, 'i3-12g.jpg', 'Procesador'),
(10033, 'Intel Core i7-10700 2.90GHz', 'Intel Core i7-10700 2.90GHz', 328.03, 'Intel', 'Comun', 'CPU', 1000, 'i7-10g.jpg', 'Procesador'),
(10034, 'Intel Core i7-11700KF 3.6GHz', 'Intel Core i7-11700KF 3.6GHz', 329.99, 'Intel', 'Comun', 'CPU', 1000, 'i7-11g.jpg', 'Procesador'),
(10035, 'Intel Core i7-12700F 4.9GHz', 'Intel Core i7-12700F 4.9GHz', 393.99, 'Intel', 'Comun', 'CPU', 1000, 'i7-12g.jpg', 'Procesador'),
(10036, 'Intel Core i9-10900KF 3.70GHz', 'Intel Core i9-10900KF 3.70GHz', 420, 'Intel', 'Comun', 'CPU', 1000, 'i9-10g.jpg', 'Procesador'),
(10037, 'Intel Core i9-11900KF 3.5GHz', 'Intel Core i9-11900KF 3.5GHz', 451.18, 'Intel', 'Comun', 'CPU', 1000, 'i9-11g.jpg', 'Procesador'),
(10038, 'Intel Core i9-12900KF 5.2GHz', 'Intel Core i9-12900KF 5.2GHz', 699, 'Intel', 'Comun', 'CPU', 1000, 'i9-12g.jpg', 'Procesador'),
(10039, 'AMD Ryzen 5 4600G 4.2GHz', 'AMD Ryzen 5 4600G 4.2GHz', 192.1, 'AMD', 'Comun', 'CPU', 1000, 'Ryzen5.jpg', 'Procesador'),
(10040, 'AMD Ryzen 5 7600X 4.7GHz', 'AMD Ryzen 5 7600X 4.7GHz', 367.99, 'AMD', 'Comun', 'CPU', 1000, 'Ryzen5-caro.jpg', 'Procesador'),
(10041, 'AMD Ryzen 7 5700X 3.4GHz', 'AMD Ryzen 7 5700X 3.4GHz', 372.9, 'AMD', 'Comun', 'CPU', 1000, 'Ryzen7.jpg', 'Procesador'),
(10042, 'AMD Ryzen 7 7700X 4.5GHz', 'AMD Ryzen 7 7700X 4.5GHz', 492.99, 'AMD', 'Comun', 'CPU', 1000, 'Ryzen7-caro.jpg', 'Procesador'),
(10043, 'AMD Ryzen 9 5900X 3.7GHz', 'AMD Ryzen 9 5900X 3.7GHz', 684, 'AMD', 'Comun', 'CPU', 1000, 'Ryzen9.jpg', 'Procesador'),
(10044, 'AMD Ryzen 9 7950X 4.5GHz', 'AMD Ryzen 9 7950X 4.5GHz', 859, 'AMD', 'Comun', 'CPU', 1000, 'Ryzen9-caro.jpg', 'Procesador'),
(10045, 'Logitech G G502 X', 'Logitech G G502 X Plus Lightspeed Ratón Inalámbrico RGB Gaming Blanco 25600 DPI', 169, 'Logitech', 'Comun', 'Raton', 1000, 'Logitech G G502 X.jpg', 'Ratón'),
(10046, 'QPad DX900', 'QPad DX900 Ratón Gaming Inalámbrico 16000 DPI Negro', 156.99, 'QPad', 'Comun', 'Raton', 1000, 'QPad DX900.jpg', 'Ratón'),
(10047, 'Corsair M65 RGB', 'Corsair M65 RGB Ultra Wireless Ratón Gaming Inalámbrico 26000DPI Blanco', 149.99, 'Corsair', 'Comun', 'Raton', 1000, 'Corsair M65 RGB.jpg', 'Ratón'),
(10048, 'Microsoft Arc Mouse', 'Microsoft Arc Mouse Ratón Bluetooth 1000 DPI Azul', 128.99, 'Microsoft', 'Comun', 'Raton', 1000, 'Microsoft Arc Mouse.jpg', 'Ratón'),
(10049, 'HP 935 Creator', 'HP 935 Creator Ratón Inalámbrico Negro', 95.35, 'HP', 'Comun', 'Raton', 1000, 'HP 935 Creator.jpg', 'Ratón'),
(10050, 'ASUS ROG Gladius III', 'ASUS ROG Gladius III Ratón Gaming 26000 DPI Negro', 69.99, 'ASUS', 'Comun', 'Raton', 1000, 'ASUS ROG Gladius III.jpg', 'Ratón'),
(10051, 'Logitech M325', 'Logitech M325 Ratón Inalámbrico 1000 DPI Gris', 53.46, 'Logitech', 'Comun', 'Raton', 1000, 'Logitech M325.jpg', 'Ratón'),
(10052, 'Microsoft Ratón Ergonómico', 'Microsoft Ratón Ergonómico Bluetooth Melocotón', 46.98, 'Microsoft', 'Comun', 'Raton', 1000, 'Microsoft Ratón Ergonómico.jpg', 'Ratón'),
(10053, 'Microsoft Surface Mobile Mouse', 'Microsoft Surface Mobile Mouse Ratón Bluetooth BlueTrack Ambidiestro Rojo', 42.41, 'Microsoft', 'Comun', 'Raton', 1000, 'Microsoft Surface Mobile Mouse.jpg', 'Ratón'),
(10054, 'Microsoft Wireless Mouse', 'Microsoft Wireless Mouse Mobile Ratón Inalámbrico 1000 DPI Negro', 38.81, 'Microsoft', 'Comun', 'Raton', 1000, 'Microsoft Wireless Mouse.jpg', 'Ratón'),
(10055, 'Trust Siero', 'Trust Siero Ratón Inalámbrico 2400 DPI Negro', 23.23, 'Trust', 'Comun', 'Raton', 1000, 'Trust Siero.jpg', 'Ratón'),
(10056, 'WD Purple 14TB', 'WD Purple 3.5 Pul 14TB SATA 3', 766, 'WD', 'Comun', 'HDD', 1000, 'WD Purple 14TB.jpg', 'Almacenamiento'),
(10057, 'Lenovo 00NA491 1TB', 'Lenovo 00NA491 2.5 Pul 1TB NL-SAS', 891.98, 'Lenovo', 'Comun', 'HDD', 1000, 'Lenovo 00NA491 1TB.jpg', 'Almacenamiento'),
(10058, 'Toshiba X300 18TB', 'Toshiba X300 3.5 Pul 18TB SATA3', 640.99, 'Toshiba', 'Comun', 'HDD', 1000, 'Toshiba X300 18TB.jpg', 'Almacenamiento'),
(10059, 'WD Red Pro 18TB', 'WD Red Pro 3.5 Pul 18TB NAS SATA 3', 557.1, 'WD', 'Comun', 'HDD', 1000, 'WD Red Pro 18TB.jpg', 'Almacenamiento'),
(10060, 'Seagate Exos X20 20TB', 'Seagate Exos X20 3.5 Pul 20TB SATA3 SAS', 462.26, 'Seagate', 'Comun', 'HDD', 1000, 'Seagate Exos X20 20TB.jpg', 'Almacenamiento'),
(10061, 'Seagate IronWolf 12TB', 'Seagate IronWolf NAS 12 TB SATA3', 383.96, 'Seagate', 'Comun', 'HDD', 1000, 'Seagate IronWolf 12TB.jpg', 'Almacenamiento'),
(10062, 'Seagate Exos 7E10 10TB', 'Seagate Exos 7E10 3.5\' 10TB SAS', 363.56, 'Seagate', 'Comun', 'HDD', 1000, 'Seagate Exos 7E10 10TB.jpg', 'Almacenamiento'),
(10063, 'Seagate SkyHawk 8TB', 'Seagate SkyHawk 8TB 3.5 Pul SATA3', 228.36, 'Seagate', 'Comun', 'HDD', 1000, 'Seagate SkyHawk 8TB.jpg', 'Almacenamiento'),
(10064, 'Dell 400-ATJG 1TB', 'Dell 400-ATJG 2.5 Pul 1TB SATA 3', 104.45, 'Dell', 'Comun', 'HDD', 1000, 'Dell 400-ATJG 1TB.jpg', 'Almacenamiento'),
(10065, 'SureFire Gaming RGB 1TB', 'SureFire Gaming RGB 1TB 2.5 Pul USB 3.2', 74.28, 'SureFire', 'Comun', 'HDD', 1000, 'SureFire Gaming RGB 1TB.jpg', 'Almacenamiento'),
(10066, 'Seagate BarraCuda 2TB', 'Seagate BarraCuda 3.5 Pul 2TB SATA 3', 53, 'Seagate', 'Comun', 'HDD', 1000, 'Seagate BarraCuda 2TB.jpg', 'Almacenamiento'),
(10067, 'WD Gold 7.68TB', 'Western Digital Gold 7.68TB SSD NVMe PCIe Gen 3.1 x4 Nivel Empresarial', 2522.99, 'WD', 'Comun', 'SSD', 1000, 'WD Gold 7.68TB.jpg', 'Almacenamiento'),
(10068, 'Synology SAT5210-3840G 3.48TB', 'Synology SAT5210-3840G 3.84TB SSD SATA 3', 1255.35, 'Synology', 'Comun', 'SSD', 1000, 'Synology SAT5210-3840G 3.48TB.jpg', 'Almacenamiento'),
(10069, 'PNY XLR8 CS3040 4TB', 'PNY XLR8 CS3040 SSD 4TB M.2 NVMe PCIe Gen4x4', 1153.98, 'PNY', 'Comun', 'SSD', 1000, 'PNY XLR8 CS3040 4TB.jpg', 'Almacenamiento'),
(10070, 'Kingston Data Center DC450R 7.68TB', 'Kingston Data Center DC450R SSD 2.5 Pul 7.68TB SATA 3', 1018.69, 'Kingston', 'Comun', 'SSD', 1000, 'Kingston Data Center DC450R 7.68TB.jpg', 'Almacenamiento'),
(10071, 'Kingston DC500M 3.84TB', 'Kingston DC500M SSD 2.5 Pul 3.84TB SATA 3', 948, 'Kingston', 'Comun', 'SSD', 1000, 'Kingston DC500M 3.84TB.jpg', 'Almacenamiento'),
(10072, 'Intel P4510 2TB', 'Intel P4510 2TB SSD 2.5 Pul NVMe PCIe SATA', 765.99, 'Intel', 'Comun', 'SSD', 1000, 'Intel P4510 2TB.jpg', 'Almacenamiento'),
(10073, 'Kingston DC450R 3.84TB', 'Kingston DC450R 2.5 Pul 3.84TB SATA III 3D TLC', 659.25, 'Kingston', 'Comun', 'SSD', 1000, 'Kingston DC450R 3.84TB.jpg', 'Almacenamiento'),
(10074, 'Gigabyte AORUS RAID 2TB', 'Gigabyte AORUS RAID SSD 2TB PCIe 3.0 x8 3D TLC NVMe', 397.55, 'Gigabyte', 'Comun', 'SSD', 1000, 'Gigabyte AORUS RAID 2TB.jpg', 'Almacenamiento'),
(10075, 'Samsung 980 Pro 2TB', 'Samsung 980 Pro SSD 2TB PCIe 4.0 NVMe M.2', 294.17, 'Samsung', 'Comun', 'SSD', 1000, 'Samsung 980 Pro 2TB.jpg', 'Almacenamiento'),
(10076, 'Seagate FireCuda 530 2TB', 'Seagate FireCuda 530 SSD 2TB M.2 NVMe 3D TLC', 253.99, 'Seagate', 'Comun', 'SSD', 1000, 'Seagate FireCuda 530 2TB.jpg', 'Almacenamiento'),
(10077, 'MSI Spatium M450 1TB', 'MSI Spatium M450 SSD 1TB M.2 NVMe PCIe 4.0', 215, 'MSI', 'Comun', 'SSD', 1000, 'MSI Spatium M450 1TB.jpg', 'Almacenamiento'),
(10078, 'Acer RE100 1TB', 'Acer RE100 2.5 Pul SSD 1TB SATA 3', 98.08, 'Acer', 'Comun', 'SSD', 1000, 'Acer RE100 1TB.jpg', 'Almacenamiento'),
(10079, 'Crucial P5 Plus 500GB', 'Crucial P5 Plus 500GB SSD M.2 2280 PCIe 4.0', 78, 'Crucial', 'Comun', 'SSD', 1000, 'Crucial P5 Plus 500GB.jpg', 'Almacenamiento'),
(10080, 'Lian-Li Odyssey', 'Lian-Li Odyssey X Cristal Templado USB-C/3.1 Negra', 461.89, 'Lian-Li', 'PCs', 'Carcasa-ATX', 1000, 'Lian-Li Odyssey.jpg', 'Chasis'),
(10081, 'Corsair iCUE 5000T', 'Corsair iCUE 5000T RGB Cristal Templado USB 3.0 Negra', 408.24, 'Corsair', 'PCs', 'Carcasa-ATX', 1000, 'Corsair iCUE 5000T.jpg', 'Chasis'),
(10082, 'ASUS GX601 Rog Strix Helios', 'ASUS GX601 Rog Strix Helios Cristal Templado USB 3.0', 357.99, 'ASUS', 'PCs', 'Carcasa-ATX', 1000, 'ASUS GX601 Rog Strix Helios.jpg', 'Chasis'),
(10083, 'Phanteks Enthoo Evolv', 'Phanteks Enthoo Evolv X USB 3.1 Cristal Templado RGB Negro', 392, 'Phanteks', 'PCs', 'Carcasa-ATX', 1000, 'Phanteks Enthoo Evolv.jpg', 'Chasis'),
(10084, 'Fractal Design Mashify 2', 'Fractal Design Meshify 2 USB-C 3.1 Negra', 297.99, 'Fractal', 'PCs', 'Carcasa-ATX', 1000, 'Fractal Design Mashify 2.jpg', 'Chasis'),
(10085, 'Phanteks Eclipse P600S', 'Phanteks Eclipse P600S Cristal Templado USB 3.1 Glacier White', 276, 'Phanteks', 'PCs', 'Carcasa-ATX', 1000, 'Phanteks Eclipse P600S.jpg', 'Chasis'),
(10086, 'Corsair Carbide Spec-Omega', 'Corsair Carbide Spec-Omega RGB Cristal Templado USB 3.0', 220.65, 'Corsair', 'PCs', 'Carcasa-ATX', 1000, 'Corsair Carbide Spec-Omega.jpg', 'Chasis'),
(10087, 'Tempest Shade', 'Tempest Shade RGB Torre ATX Negra', 53.99, 'Tempest', 'PCs', 'Carcasa-ATX', 1000, 'Tempest Shade.jpg', 'Chasis'),
(10088, 'Nfortec Vega', 'Nfortec Vega RGB Cristal Templado USB 3.0 Blanca', 79.95, 'Nfortec', 'PCs', 'Carcasa-ATX', 1000, 'Nfortec Vega.jpg', 'Chasis'),
(10089, 'Nfortec Azir', 'Nfortec Azir Black Cristal templado USB 3.0 Negra', 69.95, 'Nfortec', 'PCs', 'Carcasa-ATX', 1000, 'Nfortec Azir.jpg', 'Chasis'),
(10090, 'Tempest Spectra', 'Tempest Spectra RGB Torre ATX Negra', 40.99, 'Tempest', 'PCs', 'Carcasa-ATX', 1000, 'Tempest Spectra.jpg', 'Chasis'),
(10091, 'Cooler Master Cosmos C700P Black Edition', 'Cooler Master Cosmos C700P Black Edition Cristal Templado USB 3.0', 450.67, 'Cooler Master', 'PCs', 'Carcasa-EATX', 1000, 'Cooler Master Cosmos C700P Black Edition.jpg', 'Chasis'),
(10092, 'Seasonic Syncro Q704', 'Seasonic Syncro Q704 Cristal Templado USB 3.0 Negra', 323.99, 'Seasonic', 'PCs', 'Carcasa-EATX', 1000, 'Seasonic Syncro Q704.jpg', 'Chasis'),
(10093, 'Corsair iCUE 5000X', 'Corsair iCUE 5000X RGB QL Edition Cristal Templado USB 3.1 Blanca', 334.99, 'Corsair', 'PCs', 'Carcasa-EATX', 1000, 'Corsair iCUE 5000X.jpg', 'Chasis'),
(10094, 'Cooler Master TD500 Mesh Black', 'Cooler Master TD500 Mesh Black ARGB Cristal Templado USB 3.2', 237.99, 'Cooler Master', 'PCs', 'Carcasa-EATX', 1000, 'Cooler Master TD500 Mesh Black.jpg', 'Chasis'),
(10095, 'ASUS TUF Gaming GT501', 'ASUS TUF Gaming GT501 RGB Cristal Templado USB 3.0 Blanca', 209.9, 'ASUS', 'PCs', 'Carcasa-EATX', 1000, 'ASUS TUF Gaming GT501.jpg', 'Chasis'),
(10096, 'ASUS TUF Gaming GT501VC', 'ASUS TUF Gaming GT501VC Cristal Templado USB 3.2 Negra', 160.07, 'ASUS', 'PCs', 'Carcasa-EATX', 1000, 'ASUS TUF Gaming GT501VC.jpg', 'Chasis'),
(10097, 'Corsair Obsidian 1000D', 'Corsair Obsidian 1000D USB 3.0 Cristal Templado Negro', 689, 'Corsair', 'PCs', 'Carcasa-EATX', 1000, 'Corsair Obsidian 1000D.jpg', 'Chasis'),
(10098, 'Seasonic Prime Platinum 1300W', 'Seasonic Prime Platinum 1300W 80 Plus Platinum Modular', 332.47, 'Seasonic', 'PCs', 'FA', 1000, 'Seasonic Prime Platinum 1300W.jpg', 'Fuente alimentación'),
(10099, 'SilverStone STI200-PTS 1200W', 'SilverStone ST1200-PTS 1200W 80 Plus Platinum Modular', 291.99, 'SilverStone', 'PCs', 'FA', 1000, 'SilverStone STI200-PTS 1200W.jpg', 'Fuente alimentación'),
(10100, 'Aerocool LUX1000 1000W', 'Aerocool LUX1000 1000W 80 Plus Gold', 93.88, 'Aerocool', 'PCs', 'FA', 1000, 'Aerocool LUX1000 1000W.jpg', 'Fuente alimentación'),
(10101, 'Gigabyte P450B 450W', 'Gigabyte P450B 450W 80 Plus Bronze', 58.9, 'Gigabyte', 'PCs', 'FA', 1000, 'Gigabyte P450B 450W.jpg', 'Fuente alimentación'),
(10102, 'Aerocool LUX850 850W', 'Aerocool LUX 850 850W 80 Plus Bronze', 68.19, 'Aerocool', 'PCs', 'FA', 1000, 'Aerocool LUX850 850W.jpg', 'Fuente alimentación'),
(10103, 'Tempest PSU 750W', 'Tempest PSU 750W Fuente de Alimentación', 37.99, 'Tempest', 'PCs', 'FA', 1000, 'Tempest PSU 750W.jpg', 'Fuente alimentación'),
(10104, 'UNYKAch FA ATX 600W', 'UNYKAch Fuente de Alimentación ATX 600W', 25.27, 'UNYKAch', 'PCs', 'FA', 1000, 'UNYKAch FA ATX 600W.jpg', 'Fuente alimentación'),
(10105, 'PowerCase PCA-EP500 500W', 'PowerCase PCA-EP500 500W ', 13.32, 'PowerCase', 'PCs', 'FA', 1000, 'PowerCase PCA-EP500 500W.jpg', 'Fuente alimentación'),
(10106, 'Kingston Fury Renegade 32GB', 'Kingston Fury Renegade DDR4 4266MHz 32GB 2x16GB CL19', 443, 'Kingston', 'PCs', 'Memoria-RAM', 1000, 'Kingston Fury Renegade 32GB.jpg', 'Memoria-RAM'),
(10107, 'Crucial Ballistix Max RGB 32GB', 'Crucial Ballistix Max RGB DDR4 4000Mhz PC4-32000 2x16GB 32GB CL18', 416.21, 'Crucial', 'PCs', 'Memoria-RAM', 1000, 'Crucial Ballistix Max RGB 32GB.jpg', 'Memoria-RAM'),
(10108, 'Corsair Dominator Platinum RGB 64GB', 'Corsair Dominator Platinum RGB DDR5 5200MHz 64GB 2x32GB CL40', 423.98, 'Corasir', 'PCs', 'Memoria-RAM', 1000, 'Corsair Dominator Platinum RGB 64GB.jpg', 'Memoria-RAM'),
(10109, 'Corsair Vengeance RGB RS 64GB', 'Corsair Vengeance RGB RS DDR4 3600MHz 64GB 2x32GB CL18', 364.99, 'Corsair', 'PCs', 'Memoria-RAM', 1000, 'Corsair Vengeance RGB RS 64GB.jpg', 'Memoria-RAM'),
(10110, 'Kingston Fury Renegade RGB 32GB', 'Kingston Fury Renegade RGB DDR5 6400MHz 32GB 2x16GB CL32', 351.96, 'Kingston', 'PCs', 'Memoria-RAM', 1000, 'Kingston Fury Renegade RGB 32GB.jpg', 'Memoria-RAM'),
(10112, 'Kingston Fury Beast 32GB', 'Kingston FURY Beast DDR5 6000MHz 32GB 2x16GB CL36', 264.32, 'Kingston', 'PCs', 'Memoria-RAM', 1000, 'Kingston Fury Beast 32GB.jpg', 'Memoria-RAM'),
(10113, 'Crucial 64GB', 'Crucial DDR4 3200MHz PC4-25600 64GB 2x32GB CL22', 261.38, 'Crucial', 'PCs', 'Memoria-RAM', 1000, 'Crucial 64GB.jpg', 'Memoria-RAM'),
(10114, 'Kingston Fury Renegade 16GB', 'Kingston FURY Renegade DDR5 6000MHz 16GB CL32', 152.67, 'Kingston', 'PCs', 'Memoria-RAM', 1000, 'Kingston Fury Renegade 16GB.jpg', 'Memoria-RAM'),
(10115, 'Kingston Fury Beast 16GB', 'Kingston FURY Beast DDR5 4800MHz 16GB 2x8GB CL38', 106.23, 'Kingston', 'PCs', 'Memoria-RAM', 1000, 'Kingston Fury Beast 16GB.jpg', 'Memoria-RAM'),
(10116, 'Crucial CTI6G4DFD832A 16GB', 'Crucial CT16G4DFD832A DDR4 3200MHz PC4-25600 16GB CL22', 82.37, 'Crucial', 'PCs', 'Memoria-RAM', 1000, 'Crucial CTI6G4DFD832A 16GB.jpg', 'Memoria-RAM'),
(10117, 'Crucial 8GB', 'Crucial DDR5 4800MHz PC5-38400 8GB CL40', 53.94, 'Crucial', 'PCs', 'Memoria-RAM', 1000, 'Crucial 8GB.jpg', 'Memoria-RAM'),
(10118, 'Acer Predator X34S 34 Pul', 'Acer Predator X34S 34 Pul LED UWQHD 180Hz G-Sync Compatible Curva', 1289, 'Acer', 'PCs', 'Monitor', 1000, 'Acer Predator X34S 34 Pul.jpg', 'Pantalla'),
(10119, 'Dell U4616DW 49 Pul', 'Dell U4919DW 49 Pul LED IPS UltraWide Dual QuadHD Curva', 1525.21, 'Dell', 'PCs', 'Monitor', 1000, 'Dell U4616DW 49 Pul.jpg', 'Pantalla'),
(10120, 'LG 27MD5KL-B 27 Pul', 'LG 27MD5KL-B 27 Pul LED IPS 5K UltraHD', 1314.76, 'LG', 'PCs', 'Monitor', 1000, 'LG 27MD5KL-B 27 Pul.jpg', 'Pantalla'),
(10121, 'LG 34WK95U-W 34 Pul', 'LG 34WK95U-W 34 Pul LED IPS UltraWide UltraHD 5K', 1183.81, 'LG', 'PCs', 'Monitor', 1000, 'LG 34WK95U-W 34 Pul.jpg', 'Pantalla'),
(10122, 'ASUS ProArt PA329C 32 Pul', 'ASUS ProArt PA329C 32 Pul LED IPS UltraHD 4K HDR', 1190.02, 'ASUS', 'PCs', 'Monitor', 1000, 'ASUS ProArt PA329C 32 Pul.jpg', 'Pantalla'),
(10123, 'Philips Brilliance 499P9H 49 Pul', 'Philips Brilliance 499P9H 49 Pul LED SuperWide Curva', 1139, 'Philips', 'PCs', 'Monitor', 1000, 'Philips Brilliance 499P9H 49 Pul.jpg', 'Pantalla'),
(10124, 'Acer Predatos X X34GS 34 Pul', 'Acer Predator X X34GS 34 Pul LED IPS UWQHD 180Hz G-SYNC Compatible Curva', 1062.81, 'Acer', 'PCs', 'Monitor', 1000, 'Acer Predatos X X34GS 34 Pul.jpg', 'Pantalla'),
(10125, 'Dell C5519Q 55 Pul', 'Dell C5519Q Pantalla de Señalización LED 55 Pul UltraHD 4K', 982.31, 'Dell', 'PCs', 'Monitor', 1000, 'Dell C5519Q 55 Pul.jpg', 'Pantalla'),
(10126, 'MSI MPG Artymis 343CQRDE 34 Pul', 'MSI MPG Artymis 343CQRDE 34 Pul LED UWQHD HDR FreeSync Premium Curvo', 988.99, 'MSI', 'PCs', 'Monitor', 1000, 'MSI MPG Artymis 343CQRDE 34 Pul.jpg', 'Pantalla'),
(10127, 'Gigabyte M32UC 31.5 Pul', 'Gigabyte M32UC 31.5 Pul LED UltraHD 4K 160Hz FreeSync Premium Pro Curva', 699, 'Gigabyte', 'PCs', 'Monitor', 1000, 'Gigabyte M32UC 31.5 Pul.jpg', 'Pantalla'),
(10128, 'Philips 346P1CRH 34 Pul', 'Philips 346P1CRH 34 Pul LED UltraWide Quad HD 100Hz Curvo USB-C', 677.73, 'Philips', 'PCs', 'Monitor', 1000, 'Philips 346P1CRH 34 Pul.jpg', 'Pantalla'),
(10129, 'Samsung Odissey G7 28 Pul', 'Samsung Odissey G7 LS28AG700NUXEN 28 Pul LED IPS UltraHD 4K 144Hz G-Sync Compatible', 699.88, 'Samsung', 'PCs', 'Monitor', 1000, 'Samsung Odissey G7 28 Pul.jpg', 'Pantalla'),
(10130, 'MSI Optix MAG274QRF 27 Pul', 'MSI Optix MAG274QRF 27 Pul LED IPS WQHD 165Hz G-Sync Compatible', 660.99, 'MSI', 'PCs', 'Monitor', 1000, 'MSI Optix MAG274QRF 27 Pul.jpg', 'Pantalla'),
(10131, 'ASUS ROG Strix XG16AHP-W 15.6 Pul', 'ASUS ROG Strix XG16AHP-W Monitor Portátil 15.6 Pul LED IPS FullHD 144 Hz G-Sync Compatible Blanco', 497.43, 'ASUS', 'PCs', 'Monitor', 1000, 'ASUS ROG Strix XG16AHP-W 15.6 Pul.jpg', 'Pantalla'),
(10132, 'MSI Optix G241VC 23.6 Pul', 'MSI Optix G241VC 23.6 Pul LED FullHD 75Hz FreeSync Curva', 139.98, 'MSI', 'PCs', 'Monitor', 1000, 'MSI Optix G241VC 23.6 Pul.jpg', 'Pantalla'),
(10133, 'ASUS ROG Clymore II', 'ASUS ROG Claymore II Teclado Mecánico Gaming Modular RGB Switch Óptico ROG RX Red', 269.99, 'ASUS', 'PCs', 'Teclado', 1000, 'ASUS ROG Clymore II.jpg', 'Teclado'),
(10134, 'Logitech MK710', 'Logitech MK710 Combo Inalámbrico Teclado QWERTZ (SUI) + Ratón Negro', 225.78, 'Logitech', 'PCs', 'Teclado', 1000, 'Logitech MK710.jpg', 'Teclado'),
(10135, 'Corsair K100', 'Corsair K100 RGB Teclado Mecánico Gaming Switch Óptico OPX Negro', 269.99, 'Corsair', 'PCs', 'Teclado', 1000, 'Corsair K100.jpg', 'Teclado'),
(10136, 'Cherry TouchBoard G80-11900', 'Cherry TouchBoard G80-11900 Teclado con TouchPad Negro', 214.14, 'Cherry', 'PCs', 'Teclado', 1000, 'Cherry TouchBoard G80-11900.jpg', 'Teclado'),
(10137, 'Logitech Ergo K860', 'Logitech Ergo K860 Teclado Inalámbrico Bluetooth Grafito (USA)', 208.99, 'Logitech', 'PCs', 'Teclado', 1000, 'Logitech Ergo K860.jpg', 'Teclado'),
(10138, 'Logitech G915 TKL', 'Logitech G915 TKL Teclado Mecánico Gaming Inalámbrico RGB Switch GL Táctil Blanco', 229, 'Logitech', 'PCs', 'Teclado', 1000, 'Logitech G915 TKL.jpg', 'Teclado'),
(10139, 'Logitech MX Mechanical Mini', 'Logitech MX Mechanical Mini para Mac Teclado Mecánico Inalámbrico Gris Pálido', 159.99, 'Logitech', 'PCs', 'Teclado', 1000, 'Logitech MX Mechanical Mini.jpg', 'Teclado'),
(10140, 'Apple Magic Keyboard', 'Apple Magic Keyboard con Teclado Numérico Blanco', 118.99, 'Apple', 'PCs', 'Teclado', 1000, 'Apple Magic Keyboard.jpg', 'Teclado'),
(10141, 'Logitech MX Keys Mini', 'Logitech MX Keys Mini Teclado Bluetooth para Mac', 119, 'Logitech', 'PCs', 'Teclado', 1000, 'Logitech MX Keys Mini.jpg', 'Teclado'),
(10142, 'Logitech Keys-To-Go', 'Logitech Keys-To-Go Teclado Inalámbrico Bluetooth Azul para iPhone/iPad/Apple TV', 69.98, 'Logitech', 'PCs', 'Teclado', 1000, 'Logitech Keys-To-Go.jpg', 'Teclado'),
(10143, 'ASUS W5000', 'ASUS W5000 Teclado + Ratón Inalámbricos Gris', 44.66, 'ASUS', 'PCs', 'Teclado', 1000, 'ASUS W5000.jpg', 'Teclado'),
(10144, 'Dell Professional 15 Pul', 'Dell Professional Maletín para Portátil hasta 15 Pul Negro/Gris', 106.1, 'Dell', 'Portatil', 'Funda', 1000, 'Dell Professional 15 Pul.jpg', 'Funda portátiles'),
(10145, 'Mobilis Executive 3 17 Pul', 'Mobilis Executive 3 Maletín con Ruedas Negro/Azul para Portátil de 14 Pul-17\'', 94.99, 'Mobilis', 'Portatil', 'Funda', 1000, 'Mobilis Executive 3 17 Pul.jpg', 'Funda portátiles'),
(10146, 'MSI Prestige 17 Pul', 'MSI Prestige Maletín para Portátil 17 Pul', 89.39, 'MSI', 'Portatil', 'Funda', 1000, 'MSI Prestige 17.jpg', 'Funda portátiles'),
(10147, 'UAG Large Sleeve 15 Pul', 'UAG Large Sleeve para Tablet/Portátil 15 Pul Roja', 65.04, 'UAG', 'Portatil', 'Funda', 1000, 'UAG Large Sleeve 15 Pul.jpg', 'Funda portátiles'),
(10148, 'MSI TOPLOAD WORKSTATION 17 Pul', 'MSI TOPLOAD WORKSTATION Maletín para Portátil 17 Pul', 59, 'MSI', 'Portatil', 'Funda', 1000, 'MSI TOPLOAD WORKSTATION 17 Pul.jpg', 'Funda portátiles'),
(10149, 'Targus MultiFit EcoSmart 16 Pul', 'Targus MultiFit EcoSmart Funda Azul para Portátil hasta 16 Pul', 27.99, 'Targus', 'Portatil', 'Funda', 1000, 'Targus MultiFit EcoSmart 16 Pul.jpg', 'Funda portátiles'),
(10150, 'Rivacase Prater 7532 15.6 Pul', 'Rivacase Prater 7532 Maletín Gris/Azul para Portátil hasta 15.6 Pul', 27, 'Rivacase', 'Portatil', 'Funda', 1000, 'Rivacase Prater 7532 15.6 Pul.jpg', 'Funda portátiles'),
(10151, 'Tucano Colore 15.6 Pul', 'Tucano Colore Funda Neopreno Roja para Portátiles hasta 15.6 Pul', 23.7, 'Tucano', 'Portatil', 'Funda', 1000, 'Tucano Colore 15.6 Pul.jpg', 'Funda portátiles'),
(10152, 'Cool Mineápolis 16 Pul', 'Cool Mineápolis Maletín para Portátil de 15 Pul-16 Pul Rojo', 16.95, 'Cool', 'Portatil', 'Funda', 1000, 'Cool Mineápolis 16 Pul.jpg', 'Funda portátiles'),
(10153, 'Ewent EW2516 15.6 Pul', 'Ewent EW2516 Maletín Azul para Portátil hasta 15.6 Pul', 16.99, 'Ewent', 'Portatil', 'Funda', 1000, 'Ewent EW2516 15.6 Pul.jpg', 'Funda portátiles'),
(10154, 'Cool Alfa 17 Pul', 'Cool Alfa Maletín Azul para Portátil de 15 Pul-17 Pul', 14.96, 'Cool', 'Portatil', 'Funda', 1000, 'Cool Alfa 17 Pul.jpg', 'Funda portátiles'),
(10155, 'Phoenix Basics 14 Pul', 'Phoenix Basics Funda De Neopreno Gris Para Portatil Hasta 14 Pul', 11.45, 'Phoenix', 'Portatil', 'Funda', 1000, 'Phoenix Basics 14 Pul.jpg', 'Funda portátiles'),
(10156, 'Kingston Fury Impact DDR5 64GB', 'Kingston FURY Impact SO-DIMM DDR5 4800MHz 64GB 2x32GB CL38', 398.98, 'Kingston', 'Portatil', 'SO-DIMM', 1000, 'Kingston Fury Impact DDR5 64GB.jpg', 'SO-DIMM'),
(10157, 'Corsair Mac Memory DDR4 64GB', 'Corsair Mac Memory SO-DIMM 2666 DDR4 PC4-21300 64GB 2x32GB CL18', 301.99, 'Corsair', 'Portatil', 'SO-DIMM', 1000, 'Corsair Mac Memory DDR4 64GB.jpg', 'SO-DIMM'),
(10158, 'Kingston Fury Impact DDR4 64GB', 'Kingston Fury Impact SO-DIMM DDR4 3200MHz 64GB 2x32GB CL20 Negro', 243.53, 'Kingston', 'Portatil', 'SO-DIMM', 1000, 'Kingston Fury Impact DDR4 64GB.jpg', 'SO-DIMM'),
(10159, 'Corsair Vengeance DDR4 64GB', 'Corsair Vengeance SO-DIMM DDR4 2666MHz PC4-21300 64GB 2x32GB CL18', 214.35, 'Corsair', 'Portatil', 'SO-DIMM', 1000, 'Corsair Vengeance DDR4 64GB.jpg', 'SO-DIMM'),
(10160, 'HP DDR4 16GB', 'HP 141H4AA SO-DIMM DDR4 3200MHz PC4-25600 16GB', 183.54, 'HP', 'Portatil', 'SO-DIMM', 1000, 'HP DDR4 16GB.jpg', 'SO-DIMM'),
(10161, 'Kingston Fury Impact DDR5 32GB', 'Kingston FURY Impact SO-DIMM DDR5 4800MHz 32GB CL38', 160.3, 'Kingston', 'Portatil', 'SO-DIMM', 1000, 'Kingston Fury Impact DDR5 32GB.jpg', 'SO-DIMM'),
(10162, 'Crucial DDR4 32GB', 'Crucial SO-DIMM DDR4 2400MHz PC4-19200 32GB 2x16GB CL17', 132.24, 'Crucial', 'Portatil', 'SO-DIMM', 1000, 'Crucial DDR4 32GB.jpg', 'SO-DIMM'),
(10163, 'Kingston KCP426SD8 DDR4 32GB', 'Kingston KCP426SD8/32 SO-DIMM DDR4 2666Mhz 32GB CL19', 99.87, 'Kingston', 'Portatil', 'SO-DIMM', 1000, 'Kingston KCP426SD8 DDR4 32GB.jpg', 'SO-DIMM'),
(10164, 'PNY Performance DDR4 16GB', 'PNY Performance DDR4 2666MHz PC4-21300 16GB 2x8GB CL19', 88.91, 'PNY', 'Portatil', 'SO-DIMM', 1000, 'PNY Performance DDR4 16GB.jpg', 'SO-DIMM'),
(10165, 'Corsair Mac Memory DDR4 16GB', 'Corsair Mac Memory SO-DIMM DDR4 2666MHz 16GB 2x8GB CL18', 65.48, 'Corsair', 'Portatil', 'SO-DIMM', 1000, 'Corsair Mac Memory DDR4 16GB.jpg', 'SO-DIMM'),
(10166, 'Kingston ValueRAM DDR3L 8GB', 'Kingston ValueRAM SO-DIMM DDR3L 1600 PC3-12800 8GB CL11', 59.43, 'Kingston', 'Portatil', 'SO-DIMM', 1000, 'Kingston ValueRAM DDR3L 8GB.jpg', 'SO-DIMM'),
(10167, 'Crucial DDR4 16GB', 'Crucial SO-DIMM DDR4 3200MHz PC4-25600 16GB CL22', 47.96, 'Crucial', 'Portatil', 'SO-DIMM', 1000, 'Crucial DDR4 16GB.jpg', 'SO-DIMM'),
(10168, 'PNY MN4GSD42666 DDR4 4GB', 'PNY MN4GSD42666 SO-DIMM DDR4 2666 MHz 4GB CL19', 29.53, 'PNY', 'Portatil', 'SO-DIMM', 1000, 'PNY MN4GSD42666 DDR4 4GB.jpg', 'SO-DIMM'),
(10169, 'Corsair Vengeance DDR4 8GB', 'Corsair Vengeance SO-DIMM DDR4 2400MHz PC4-19200 8GB CL16', 25.99, 'Corsair', 'Portatil', 'SO-DIMM', 1000, 'Corsair Vengeance DDR4 8GB.jpg', 'SO-DIMM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `tabla` varchar(100) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `importe` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Consolas`
--

CREATE TABLE `Consolas` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especificación` varchar(150) NOT NULL,
  `precio` float NOT NULL,
  `empresa` varchar(25) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tabla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Consolas`
--

INSERT INTO `Consolas` (`id`, `nombre`, `especificación`, `precio`, `empresa`, `cantidad`, `imagen`, `tabla`) VALUES
(50000, 'Sony PS5', 'Consola - Sony PS5, 825 GB, 4K, HDR, Blanco', 499, 'Sony', 1000, 'Sony PS5.jpg', 'Consola'),
(50001, 'Volante G923', 'Volante - G923 LOGITECH G, PlayStation 5, Xbox One, Xbox 360, PC, Negro', 354.83, 'Logitech', 1000, 'Volante G923.jpg', 'Consola'),
(50002, 'Sony PS5 DualSense', 'Mando - Sony PS5 DualSense™, Inalámbrico, Blanco', 150.99, 'Sony', 1000, 'Sony PS5 DualSense.jpg', 'Consola'),
(50003, 'Sony PS4', 'Videoconsola PlayStation 4 Fat - Negro', 390, 'Sony', 1000, 'Sony PS4.jpg', 'Consola'),
(50004, 'Sony PS4 DualShock', 'Mando - Sony PS4 DualShock 4 V2, Inalámbrico, Panel táctil, Midnight Blue', 59.99, 'Sony', 1000, 'Sony PS4 DualShock.jpg', 'Consola'),
(50005, 'Microsoft Xbox Series S', 'Consola - Microsoft Xbox Series S, 512 GB SSD, Blanco', 289, 'Microsoft', 1000, 'Microsoft Xbox Series S.jpg', 'Consola'),
(50006, 'Microsoft Xbox Controler', 'Mando inalámbrico - Microsoft Xbox One Controller Wireless QAS-00002', 77.99, 'Microsoft', 1000, 'Microsoft Xbox Controler.jpg', 'Consola'),
(50007, 'Nintendo Switch', 'Consola - Nintendo Switch, 6.2 Pul, Joy-Con, Azul y Rojo Neón', 297, 'Nintendo', 1000, 'Nintendo Switch.jpg', 'Consola'),
(50008, 'Fifa 23', 'Fifa 23', 51.98, 'Videojuego', 1000, 'Fifa 23.jpg', 'Consola'),
(50009, 'PS4+COD MWII', 'Sony PS4 + CallOfDutfModern Warfare II', 379.39, 'Sony', 1000, 'PS4+COD MWII.jpg', 'Consola'),
(50010, 'COD MWII', 'CallOfDutfModern Warfare II Lote Multigeneracional', 79.99, 'Videojuego', 1000, 'COD MWII.jpg', 'Consola'),
(50011, 'COD CW', 'CallOfDutfBlack Ops Coold War', 77.99, 'Videojuego', 1000, 'COD CW.jpg', 'Consola'),
(50012, 'Nintendo Switch+Mario Kart 8', 'Nintendo Switch Azul/Rojo + Mario Kart 8 + 3 meses de suscripcion', 414.41, 'Nintendo', 1000, 'Nintendo Switch+Mario Kart 8.jpg', 'Consola'),
(50013, 'NSWitch Lite', 'Nintendo Switch Lite', 219.99, 'Nintendo', 1000, 'Nintendo Switch Lite.jpg', 'Consola'),
(50014, 'Minecraft', 'Minecraft', 24.99, 'Videojuego', 1000, 'Minecraft.jpg', 'Consola'),
(50015, 'Far Cry 6', 'Far Cry 6', 49.99, 'Videojuego', 1000, 'Far Cry 6.jpg', 'Consola'),
(50016, 'NFS-PayBack', 'Need For Speed - PayBack', 54.93, 'Videojuego', 1000, 'NFS-PayBack.jpg', 'Consola'),
(50017, 'NFS-HotPursuit', 'Need For Speed - HotPursuit', 30.99, 'Videojuego', 1000, 'NFS-HotPursuit.jpg', 'Consola'),
(50018, 'The Legend of Zelda', 'The Legend of Zelda', 68.98, 'Videojuego', 1000, 'The Legend of Zelda.jpg', 'Consola'),
(50019, 'Microsoft Xbox Series S+Fornite+RL', 'Microsoft Xbox Series S + Fornite + Rocket League', 511.47, 'Microsoft', 1000, 'Microsoft Xbox Series S+Fornite+RL.jpg', 'Consola'),
(50020, 'STAR WARS Jedi Survivor', 'STAR WARS Jedi: Survivor', 81.71, 'Videojuego', 1000, 'STAR WARS Jedi Survivor.jpg', 'Consola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` enum('opinion','pregunta') DEFAULT NULL,
  `respuesta` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id`, `nombre`, `apellido`, `comentario`, `fecha`, `tipo`, `respuesta`) VALUES
(1, 'Jose Manuel', 'Prieto', 'Hola buenos días, este es un comentario de relleno para el foro', '2023-05-15 00:00:00', 'opinion', NULL),
(2, 'Sandra', 'Bujak', 'Hola buenos días, este es un comentario de relleno para el foro más largo para ajustar el tamaño de las cajas', '2023-05-15 00:00:00', 'opinion', NULL),
(3, 'Mario', 'Dieguez', 'Hola buenos días, este es un comentario de relleno para el foro un poco más largo que el anterior para ajustar más el tamaño de las cajas de la página web de TWT_First', '2023-05-15 00:00:00', 'opinion', NULL),
(4, 'Antony James', 'Cruz', 'Muy buena tienda ;)', '2023-05-15 00:00:00', 'opinion', NULL),
(5, 'Jose Manuel', 'Prieto', 'Hola, esto es una pregunta de relleno para el foro', '2023-05-15 00:00:00', 'pregunta', 'Esto es la respuesta a tu pregunta Jose'),
(6, 'Sandra', 'Bujak', 'Esta es otra pregunta para el foro ¿Qué va antes el huevo o la gallina?', '2023-05-15 00:00:00', 'pregunta', 'La gallina sin duda'),
(7, 'Mario', 'Dieguez', 'Hola buenos días, Esta es una pregunta sin contestar de relleno para el foro un poco más largo que el anterior para ajustar más el tamaño de las cajas de la página web de TWT_First', '2023-05-15 00:00:00', 'pregunta', NULL),
(8, 'Antony James', 'Cruz', '¿Las devoluciones a donde se mandan?', '2023-05-15 00:00:00', 'pregunta', 'No se acepta devolución'),

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Móviles`
--

CREATE TABLE `Móviles` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `empresa` varchar(25) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tabla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Móviles`
--

INSERT INTO `Móviles` (`id`, `nombre`, `precio`, `empresa`, `cantidad`, `imagen`, `tabla`) VALUES
(100000, 'Galaxy Z Fold4', 1919, 'Samsung', 1000, 'Galaxy Z Fold4.jpg', 'Móvil'),
(100001, 'Galaxy Z Flip4', 1278.99, 'Samsung', 1000, 'Galaxy Z Flip4.jpg', 'Móvil'),
(100002, 'Galaxy Z Flip3', 1109, 'Samsung', 1000, 'Galaxy Z Flip3.jpg', 'Móvil'),
(100003, 'Galaxy S22 Ultra', 1159, 'Samsung', 1000, 'Galaxy S22 Ultra.jpg', 'Móvil'),
(100004, 'Galaxy S21 FE', 799, 'Samsung', 1000, 'Galaxy S21 FE.jpg', 'Móvil'),
(100005, 'Galaxy A53', 385, 'Samsung', 1000, 'Galaxy A53.jpg', 'Móvil'),
(100006, 'Galaxy A13', 229, 'Samsung', 1000, 'Galaxy A13.jpg', 'Móvil'),
(100007, 'Galaxy M53', 379, 'Samsung', 1000, 'Galaxy M53.jpg', 'Móvil'),
(100008, 'Galaxy M13', 199, 'Samsung', 1000, 'Galaxy M13.jpg', 'Móvil'),
(100009, 'IPhone 14 Pro Max', 1599, 'Apple', 1000, 'iPhone 14 Pro Max.jpg', 'Móvil'),
(100010, 'iPhone 14 Pro', 1449, 'Apple', 1000, 'iPhone 14 Pro.jpg', 'Móvil'),
(100011, 'iPhone 14 Plus', 1289, 'Apple', 1000, 'iPhone 14 Plus.jpg', 'Móvil'),
(100012, 'iPhone 14', 1139, 'Apple', 1000, 'iPhone 14.jpg', 'Móvil'),
(100013, 'iPhone SE', 759, 'Apple', 1000, 'iPhone SE.jpg', 'Móvil'),
(100014, 'iPhone 13 Mini', 929, 'Apple', 1000, 'iPhone 13 Mini.jpg', 'Móvil'),
(100015, 'iPhone 13', 1029, 'Apple', 1000, 'iPhone 13.jpg', 'Móvil'),
(100016, 'iPhone 12', 979, 'Apple', 1000, 'iPhone 12.jpg', 'Móvil'),
(100017, 'Xiaomi 12T Pro', 849, 'Xiaomi', 1000, 'Xiaomi 12T Pro.jpg', 'Móvil'),
(100018, 'Xiaomi 12 Lite', 449.99, 'Xiaomi', 1000, 'Xiaomi 12 Lite.jpg', 'Móvil'),
(100019, 'Xiaomi 12 Pro', 1099, 'Xiaomi', 1000, 'Xiaomi 12 Pro.jpg', 'Móvil'),
(100020, 'Xiaomi 11 Lite', 399, 'Xiaomi', 1000, 'Xiaomi 11 Lite.jpg', 'Móvil'),
(100021, 'Xiaomi Mi 11i', 699, 'Xiaomi', 1000, 'Xiaomi Mi 11i.jpg', 'Móvil'),
(100022, 'Xiaomi Mi 10T', 499, 'Xiaomi', 1000, 'Xiaomi Mi 10T.jpg', 'Móvil'),
(100023, 'Xiaomi Mi 10T Lite', 279, 'Xiaomi', 1000, 'Xiaomi Mi 10T Lite.jpg', 'Móvil'),
(100024, 'Redmi 10A', 115, 'Xiaomi', 1000, 'Redmi 10A.jpg', 'Móvil'),
(100025, 'Redmi 10C', 164.99, 'Xiaomi', 1000, 'Redmi 10C.jpg', 'Móvil'),
(100026, 'Redmi Note 11 Pro', 319, 'Xiaomi', 1000, 'Redmi Note 11 Pro.jpg', 'Móvil'),
(100027, 'Redmi Note 9 Pro', 199, 'Xiaomi', 1000, 'Redmi Note 9 Pro.jpg', 'Móvil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PCs`
--

CREATE TABLE `PCs` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especificación` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `empresa` varchar(25) NOT NULL,
  `función` enum('WorkStation','Gaming') DEFAULT NULL,
  `cantidad` int(8) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tabla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PCs`
--

INSERT INTO `PCs` (`id`, `nombre`, `especificación`, `precio`, `empresa`, `función`, `cantidad`, `imagen`, `tabla`) VALUES
(150000, 'MSI MEG Trident X2 13NUI-015ES', 'MSI MEG Trident X2 13NUI-015ES Intel Core i9-13900KF/64GB/2TB SSD/RTX4090', 5999, 'MSI', 'Gaming', 1000, 'MSI MEG Trident X2 13NUI-015ES.jpg', 'Ordenador'),
(150001, 'PcVIP Élite', 'PcVIP Élite Intel Core i9-13900K/64GB/4TB+2TB SSD/RTX 4090', 4698.99, 'PcVIP', 'Gaming', 1000, 'PcVIP Élite.jpg', 'Ordenador'),
(150002, 'MSI MAG Codex X5 12TJ-834EU', 'MSI MAG Codex X5 12TJ-834EU Intel Core i9-12900KF/64GB/2TB+2TB SSD/RTX 3090', 3999.99, 'MSI', 'Gaming', 1000, 'MSI MAG Codex X5 12TJ-834EU.jpg', 'Ordenador'),
(150003, 'PcVIP Kratos', 'PcVIP Kratos AMD Ryzen 9 5900X/32GB/1TB SSD + 2TB/RX 6900 XT', 2989.99, 'PcVIP', 'Gaming', 1000, 'PcVIP Kratos.jpg', 'Ordenador'),
(150004, 'Zone Evil Diamond80', 'Zone Evil Diamond80 Intel Core i9-11900F/16GB/1TB+500GB SSD/RTX 3060 Ti', 2314.59, 'Zone Evil', 'Gaming', 1000, 'Zone Evil Diamond80.jpg', 'Ordenador'),
(150005, 'Megamanía KatsuhitoPC', 'Megamanía KatsuhitoPC Intel Core i7-11700F/32GB/1TB SSD/RTX 3060', 1998, 'Megamanía', 'Gaming', 1000, 'Megamanía KatsuhitoPC.jpg', 'Ordenador'),
(150006, 'MSI Creator P50 11SI-076ES', 'MSI Creator P50 11SI-076ES Intel Core I7-11700/32GB/1TB+512GB SSD/GTX 1660 SUPER', 1599, 'MSI', 'Gaming', 1000, 'MSI Creator P50 11SI-076ES.jpg', 'Ordenador'),
(150007, 'HP OMEN 25L GT12-0017ns', 'HP OMEN 25L GT12-0017ns Intel Core i7-10700F/32GB/2TB+512GB SSD/RTX 2060 SUPER', 1407.59, 'HP', 'Gaming', 1000, 'HP OMEN 25L GT12-0017ns.jpg', 'Ordenador'),
(150008, 'PcVIP Cygnus', 'PcVIP Cygnus Intel Core i5-12400F/16GB/1TB + 500GB SSD/RTX 3060', 1138.99, 'PcVIP', 'Gaming', 1000, 'PcVIP Cygnus.jpg', 'Ordenador'),
(150009, 'HP Victus 15L TG02-0020ns', 'HP Victus 15L TG02-0020ns AMD Ryzen 7 5700G/16GB/1TB+512GB SSD/GTX 1660 SUPER', 879.98, 'HP', 'Gaming', 1000, 'HP Victus 15L TG02-0020ns.jpg', 'Ordenador'),
(150010, 'Megamanía TeseoPC', 'Megamanía TeseoPC AMD Ryzen 5 5600G/16GB/480GB SSD', 797.99, 'Megamanía', 'Gaming', 1000, 'Megamanía TeseoPC.jpg', 'Ordenador'),
(150011, 'Lenovo IdeaCentre Gaming 5 17IAB7', 'Lenovo IdeaCentre Gaming 5 17IAB7 Intel Core i5-12400F/16GB/512GB SSD/GTX1650 SUPER', 719.99, 'Lenovo', 'Gaming', 1000, 'Lenovo IdeaCentre Gaming 5 17IAB7.jpg', 'Ordenador'),
(150012, 'HP Pavilion Gaming TG01-1007NS', 'HP Pavilion Gaming TG01-1007NS Intel Core i5-10400F/16GB/1TB+512GB SSD/GTX1660Super', 688.64, 'HP', 'Gaming', 1000, 'HP Pavilion Gaming TG01-1007NS.jpg', 'Ordenador'),
(150013, 'PcCom Studio', 'PcCom Studio Intel Core i9-12900F/64GB/2TB SSD/RTX 4090/Windows 11 Pro', 4403.99, 'PcCom', 'WorkStation', 1000, 'PcCom Studio.jpg', 'Ordenador'),
(150014, 'HP Z8 G4', 'HP Z8 G4 Intel Xeon Silver 4116/128GB/512GB SSD/Quadro P5000', 3488.33, 'HP', 'WorkStation', 1000, 'HP Z8 G4.jpg', 'Ordenador'),
(150015, 'HP Z4 G4T', 'HP Z4 G4T Intel Core i9-10920X/32GB/1TB SSD', 2879, 'HP', 'WorkStation', 1000, 'HP Z4 G4T.jpg', 'Ordenador'),
(150016, 'HP Z1 G9', 'HP Z1 G9 Intel Core i7-12700/32GB/1TB SSD/RTX 3070', 2289, 'HP', 'WorkStation', 1000, 'HP Z1 G9.jpg', 'Ordenador'),
(150017, 'Lenovo ThinkStation P350 Tower', 'Lenovo ThinkStation P350 Tower Intel Core i7-11700/16GB/512GB SSD/Quadro T1000', 1801, 'Lenovo', 'WorkStation', 1000, 'Lenovo ThinkStation P350 Tower.jpg', 'Ordenador'),
(150018, 'Dell OptiPlex 7090 HGCYC', 'Dell OptiPlex 7090 HGCYC Intel Core i7-10700/16GB/512GB SSD', 1399, 'Dell', 'WorkStation', 1000, 'Dell OptiPlex 7090 HGCYC.jpg', 'Ordenador'),
(150019, 'Acer Veriton X X2680G', 'Acer Veriton X X2680G Intel Core i7-11700/16GB/512GB SSD', 885.1, 'Acer', 'WorkStation', 1000, 'Acer Veriton X X2680G.jpg', 'Ordenador'),
(150020, 'HP ProDesk 400 G9', 'HP ProDesk 400 G9 Intel Core i5-12500/8GB/512GB SSD', 717.78, 'HP', 'WorkStation', 1000, 'HP ProDesk 400 G9.jpg', 'Ordenador'),
(150021, 'Lenovo V55T Gen 2-13ACN', 'Lenovo V55T Gen 2-13ACN AMD Ryzen 5 5600G/8GB/256GB SSD', 607.16, 'Lenovo', 'WorkStation', 1000, 'Lenovo V55T Gen 2-13ACN.jpg', 'Ordenador'),
(150022, 'Lenovo ThinkCentre M720t', 'Lenovo ThinkCentre M720t Intel Core i7-8700/8GB/256GB SSD', 499, 'Lenovo', 'WorkStation', 1000, 'Lenovo ThinkCentre M720t.jpg', 'Ordenador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Portátiles`
--

CREATE TABLE `Portátiles` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especificación` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `empresa` varchar(25) NOT NULL,
  `función` enum('WorkStation','Gaming') NOT NULL,
  `cantidad` int(8) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tabla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Portátiles`
--

INSERT INTO `Portátiles` (`id`, `nombre`, `especificación`, `precio`, `empresa`, `función`, `cantidad`, `imagen`, `tabla`) VALUES
(200000, 'MSI GF63 Thin 11UD-271XES', 'MSI GF63 Thin 11UD-271XES Intel Core i7-11800H/16GB/512GB SSD/RTX 3050Ti/15.6 Pul', 1099.01, 'MSI', 'Gaming', 1000, 'MSI GF63 Thin 11UD-271XES.jpg', 'Portátil'),
(200001, 'HP ZBook Studio G8', 'HP ZBook Studio G8 Intel Core i9-11950H/32 GB/1TB SSD/RTX 3080/15.6 Pul', 4180.19, 'HP', 'Gaming', 1000, 'HP ZBook Studio G8.jpg', 'Portátil'),
(200002, 'Microsoft Surface Laptop Studio', 'Microsoft Surface Laptop Studio Intel Core i7-11370H/32GB/2TB SSD/RTX 3050Ti/14.4 Pul Táctil Platino', 3927.63, 'Microsoft', 'WorkStation', 1000, 'Microsoft Surface Laptop Studio.jpg', 'Portátil'),
(200003, 'ASUS ROG Strix G17 G713RS-LL008', 'ASUS ROG Strix G17 G713RS-LL008 AMD Ryzen 9 6900HX/32GB/1TB SSD/RTX 3080/17.3 Pul', 2999.01, 'ASUS', 'Gaming', 1000, 'ASUS ROG Strix G17 G713RS-LL008.jpg', 'Portátil'),
(200004, 'MSI Creator Z16 A12UET-010ES', 'MSI Creator Z16 A12UET-010ES Intel Core i9-12900H/32GB/1TB SSD/RTX 3060/16 Pul Táctil', 2202.25, 'MSI', 'Gaming', 1000, 'MSI Creator Z16 A12UET-010ES.jpg', 'Portátil'),
(200005, 'HP OMEN 17-ck0014ns', 'HP OMEN 17-ck0014ns Intel Core i7-11800H/32GB/1TB SSD/RTX 3070/17.3 Pul', 1849, 'HP', 'Gaming', 1000, 'HP OMEN 17-ck0014ns.jpg', 'Portátil'),
(200006, 'ASUS TUF Gaming F15 FX506HE-HN012', 'ASUS TUF Gaming F15 FX506HE-HN012 Intel Core i5-11400H/16 GB/512GB SSD/RTX 3050Ti/15.6 Pul', 1257.79, 'ASUS', 'Gaming', 1000, 'ASUS TUF Gaming F15 FX506HE-HN012.jpg', 'Portátil'),
(200007, 'MSI Prestige 15 A12UC-200XES', 'MSI Prestige 15 A12UC-200XES Intel Core i7-1280P/16GB/512GB SSD/RTX 3050/15.6 Pul', 1099.99, 'MSI', 'Gaming', 1000, 'MSI Prestige 15 A12UC-200XES.jpg', 'Portátil'),
(200008, 'HP Victus 16-E0098NS', 'HP Victus 16-E0098NS AMD Ryzen 7 5800H/16GB/512GB SSD/RTX 3050/16.1 Pul', 1032.03, 'HP', 'Gaming', 1000, 'HP Victus 16-E0098NS.jpg', 'Portátil'),
(200009, 'HP Victus 16-d1021ns', 'HP Victus 16-d1021ns Intel Core i7-12700H/16GB/512GB SSD/RTX 3050Ti/16.1 Pul', 999, 'HP', 'Gaming', 1000, 'HP Victus 16-d1021ns.jpg', 'Portátil'),
(200010, 'ASUS ROG Strix G15 G512LW-HN038', 'ASUS ROG Strix G15 G512LW-HN038 Intel Core i7-10750H/16GB/512GB SSD/RTX 2070/15.6 Pul', 962.75, 'ASUS', 'Gaming', 1000, 'ASUS ROG Strix G15 G512LW-HN038.jpg', 'Portátil'),
(200011, 'HP Pavilion Gaming 16-A0010NS', 'HP Pavilion Gaming 16-A0010NS Intel Core i7-10750H/16GB/512GB SSD/GTX 1650Ti/16.1 Pul', 833.14, 'HP', 'Gaming', 1000, 'HP Pavilion Gaming 16-A0010NS.jpg', 'Portátil'),
(200012, 'MSI GP65 Leopard 10SFK-240XES', 'MSI GP65 Leopard 10SFK-240XES Intel Core i7-10750H/32GB/1TB SSD/RTX 2070/15.6 Pul', 816.77, 'MSI', 'Gaming', 1000, 'MSI GP65 Leopard 10SFK-240XES.jpg', 'Portátil'),
(200013, 'ASUS TUF Gaming F15 Fx506lhb-hn359', 'ASUS TUF Gaming F15 Fx506lhb-hn359 Intel Core i5-10300H/16GB/512GB SSD/GTX 1650/15.6 Pul', 719.9, 'ASUS', 'Gaming', 1000, 'ASUS TUF Gaming F15 Fx506lhb-hn359.jpg', 'Portátil'),
(200014, 'Apple MacBook Pro', 'Apple MacBook Pro Apple M1 Max/64GB/2TB SSD/16.2 Pul Gris Espacial', 4459.01, 'Apple', 'WorkStation', 1000, 'Apple MacBook Pro.jpg', 'Portátil'),
(200017, 'Apple MacBook Air', 'Apple Macbook Air Apple M2/8GB/512GB SSD/GPU Deca Core/13.6 Pul Midnight', 1669, 'Apple', 'WorkStation', 1000, 'Apple MacBook Air.jpg', 'Portátil'),
(200018, 'Microsoft Surface Laptop 4 Platino', 'Microsoft Surface Laptop 4 Platino Intel Core i7-1185G7/16GB/256GB SSD/15 Pul Táctil', 1512, 'Microsoft', 'WorkStation', 1000, 'Microsoft Surface Laptop 4 Platino.jpg', 'Portátil'),
(200020, 'HP ProBook 430 G8', 'HP ProBook 430 G8 Intel Core i7-1165G7/16GB/512GB SSD/13.3 Pul', 1213.37, 'HP', 'WorkStation', 1000, 'HP ProBook 430 G8.jpg', 'Portátil'),
(200022, 'ASUS Chromebook Flip CX5 CB5400FMA', 'ASUS Chromebook Flip CX5 CB5400FMA Intel Core i7-1160G7/8GB/256GB SSD/14 Pul', 934.7, 'ASUS', 'WorkStation', 1000, 'ASUS Chromebook Flip CX5 CB5400FMA.jpg', 'Portátil'),
(200023, 'HP 15S-fq5055ns', 'HP 15S-fq5055ns Intel Core i7-1255U/16GB/512GB SSD/15.6 Pul', 899.99, 'HP', 'WorkStation', 1000, 'HP 15S-fq5055ns.jpg', 'Portátil'),
(200024, 'Microsoft Surface Pro X', 'Microsoft Surface Pro X Microsoft SQ1/8GB/256GB SSD/13 Pul Táctil Platino', 890.08, 'Microsoft', 'WorkStation', 1000, 'Microsoft Surface Pro X.jpg', 'Portátil'),
(200025, 'ASUS Vivobook 17 F712EA-AU674W', 'ASUS Vivobook 17 F712EA-AU674W Intel Core i7-1165G7/16GB/512GB SSD/17.3 Pul', 849, 'ASUS', 'WorkStation', 1000, 'ASUS Vivobook 17 F712EA-AU674W.jpg', 'Portátil'),
(200026, 'Microsoft Surface Laptop Go 2', 'Microsoft Surface Laptop Go 2 Intel Core i5-1135G7/8GB/256GB SSD/12.4 Pul Táctil', 829.01, 'Microsoft', 'WorkStation', 1000, 'Microsoft Surface Laptop Go 2.jpg', 'Portátil'),
(200027, 'HP 250 G8', 'HP 250 G8 Intel Core i5-1135G7/16 GB/1TB SSD/15.6 Pul', 749, 'HP', 'WorkStation', 1000, 'HP 250 G8.jpg', 'Portátil'),
(200028, 'HP 15S-fq4042ns', 'HP 15S-fq4042ns Intel Core i7-1195G7/8GB/512GB SSD/15.6 Pul', 599, 'HP', 'WorkStation', 1000, 'HP 15S-fq4042ns.jpg', 'Portátil'),
(200029, 'Microsoft Surface GO 3', 'Microsoft Surface GO 3 Intel Pentium Gold 6500Y/8GB/128GB SSD/10.5 Pul Táctil', 559, 'Microsoft', 'WorkStation', 1000, 'Microsoft Surface GO 3.jpg', 'Portátil'),
(200030, 'ASUS F1500EA-BQ2364W', 'ASUS F1500EA-BQ2364W Intel Core i5-1135G7/8GB/512GB SSD/15.6 Pul', 549, 'ASUS', 'WorkStation', 1000, 'ASUS F1500EA-BQ2364W.jpg', 'Portátil'),
(200031, 'HP 255 G9', 'HP 255 G9 AMD Ryzen 3 5425U/8GB/512GB SSD/15.6 Pul', 464, 'HP', 'WorkStation', 1000, 'HP 255 G9.jpg', 'Portátil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TVs`
--

CREATE TABLE `TVs` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especificación` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `empresa` varchar(25) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tabla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `TVs`
--

INSERT INTO `TVs` (`id`, `nombre`, `especificación`, `precio`, `empresa`, `cantidad`, `imagen`, `tabla`) VALUES
(250000, 'Sony Bravia XR-85X95KAEP 85 Pul', 'Sony Bravia XR-85X95KAEP 85 Pul Mini LED UltraHD 4K HDR 10', 5416.62, 'Sony', 1000, 'Sony Bravia XR-85X95KAEP 85 Pul.jpg', 'Televisión'),
(250001, 'LG OLED83C24LA 83 Pul', 'LG OLED83C24LA 83 Pul OLED 4K HDR10 Pro', 4569.12, 'LG', 1000, 'LG OLED83C24LA 83 Pul.jpg', 'Televisión'),
(250002, 'LG OLED83C14LA 83 Pul', 'LG OLED83C14LA 83 Pul OLED UltraHD 4K HDR', 4085.64, 'LG', 1000, 'LG OLED83C14LA 83 Pul.jpg', 'Televisión'),
(250003, 'LG OLED evo Gallery Edition OLED77G26LA 77 Pul', 'LG OLED evo Gallery Edition OLED77G26LA 77 Pul OLED EVO UltraHD 4K HDR10 Pro', 3749, 'LG', 1000, 'LG OLED evo Gallery Edition OLED77G26LA 77 Pul.jpg', 'Televisión'),
(250004, 'LG 75QNED966QA 75 Pul', 'LG 75QNED966QA 75 Pul QNED Mini LED 8K HDR10 Pro', 3179, 'LG', 1000, 'LG 75QNED966QA 75 Pul.jpg', 'Televisión'),
(250005, 'Philips 65PML9506-12 65 Pul', 'Philips 65PML9506-12 65 Pul LED UltraHD 4K HDR10+ Pul QNED Mini LED 8K HDR10 Pro', 2882.99, 'Philips', 1000, 'Philips 65PML9506-12 65 Pul.jpg', 'Televisión'),
(250006, 'LG 75QNED916QA 75 Pul', 'LG 75QNED916QA 75 Pul QNED MiniLED UltraHD 4K HDR10 Pro', 2629, 'LG', 1000, 'LG 75QNED916QA 75 Pul.jpg', 'Televisión'),
(250007, 'Samsung BE85A-H Pantalla de Señalización Digital 85 Pul', 'Samsung BE85A-H Pantalla de Señalización Digital 85 Pul LED UltraHD 4K HDR10+', 2412.03, 'Samsung', 1000, 'Samsung BE85A-H Pantalla de Señalización Digital 85 Pul.jpg', 'Televisión'),
(250008, 'Philips 65OLED887-12 65 Pul', 'Philips 65OLED887-12 65 Pul OLED UltraHD 4K HDR10+', 1998.99, 'Philips', 1000, 'Philips 65OLED887-12 65 Pul.jpg', 'Televisión'),
(250009, 'Xiaomi Mi TV Q1 75 Pul', 'Xiaomi Mi TV Q1 75 Pul QLED Ultra HD 4K HDR10+', 1722.16, 'Xiaomi', 1000, 'Xiaomi Mi TV Q1 75 Pul.jpg', 'Televisión'),
(250010, 'LG 86NANO766QA 86 Pul', 'LG 86NANO766QA 86 Pul LED NanoCell UltraHD 4K HDR10 Pro', 1603.4, 'LG', 1000, 'LG 86NANO766QA 86 Pul.jpg', 'Televisión'),
(250011, 'LG 86UQ80006LB 86 Pul', 'LG 86UQ80006LB 86 Pul LED UltraHD 4K HDR10 Pro', 1462.74, 'LG', 1000, 'LG 86UQ80006LB 86 Pul.jpg', 'Televisión'),
(250012, 'Sony KD65X85JAEP 65 Pul', 'Sony KD65X85JAEP 65 Pul LED UltraHD 4K HDR', 1136.58, 'Sony', 1000, 'Sony KD65X85JAEP 65 Pul.jpg', 'Televisión'),
(250013, 'LG 70UQ81006LB 70 Pul', 'LG 70UQ81006LB 70 Pul LED UltraHD 4K HDR10 Pro', 979, 'LG', 1000, 'LG 70UQ81006LB 70 Pul.jpg', 'Televisión'),
(250014, 'Samsung UE65BU8000K 65 Pul', 'Samsung UE65BU8000K 65 Pul LED UltraHD 4K HDR10+', 902.45, 'Samsung', 1000, 'Samsung UE65BU8000K 65 Pul.jpg', 'Televisión'),
(250015, 'Samsung QE55Q75BATXXC 55 Pul', 'Samsung QE55Q75BATXXC 55 Pul QLED UltraHD 4K HDR10+', 769, 'Samsung', 1000, 'Samsung QE55Q75BATXXC 55 Pul.jpg', 'Televisión'),
(250016, 'Sony KD50X85J 50 Pul', 'Sony KD50X85J 50 Pul LED UltraHD 4K HDR', 742.31, 'Sony', 1000, 'Sony KD50X85J 50 Pul.jpg', 'Televisión'),
(250017, 'Samsung QE50Q64BAUXXC 50 Pul', 'Samsung QE50Q64BAUXXC 50 Pul QLED UltraHD 4K HDR10+', 674.98, 'Samsung', 1000, 'Samsung QE50Q64BAUXXC 50 Pul.jpg', 'Televisión'),
(250018, 'LG 43UN711C 43 Pul', 'LG 43UN711C 43 Pul LED UltraHD 4K', 411.5, 'LG', 1000, 'LG 43UN711C 43 Pul.jpg', 'Televisión'),
(250019, 'Sony KD32W800 32 Pul', 'Sony KD32W800 32 Pul WXGA HDR10', 340.99, 'Sony', 1000, 'Sony KD32W800 32 Pul.jpg', 'Televisión'),
(250020, 'Philips 43PUS7406-12 43 Pul', 'Philips 43PUS7406-12 43 Pul UltraHD 4K HDR10+', 318.99, 'Philips', 1000, 'Philips 43PUS7406-12 43 Pul.jpg', 'Televisión'),
(250021, 'Xiaomi Mi TV P1 32 Pul', 'Xiaomi Mi TV P1 32 Pul LED HD', 206.54, 'Xiaomi', 1000, 'Xiaomi Mi TV P1 32 Pul.jpg', 'Televisión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `tipo_usuario` enum('cliente','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `clave`, `tipo_usuario`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '139b3c68f1c0f759f09fcbbdf42a9e30', 'admin'),
(2, 'Mario', 'Dieguez', 'mario@gmail.com', '139b3c68f1c0f759f09fcbbdf42a9e30', 'cliente'),
(3, 'Sandra', 'Bujak', 'sandra@gmail.com', '139b3c68f1c0f759f09fcbbdf42a9e30', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Componentes`
--
ALTER TABLE `Componentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Consolas`
--
ALTER TABLE `Consolas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Móviles`
--
ALTER TABLE `Móviles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `PCs`
--
ALTER TABLE `PCs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Portátiles`
--
ALTER TABLE `Portátiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `TVs`
--
ALTER TABLE `TVs`
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
-- AUTO_INCREMENT de la tabla `Componentes`
--
ALTER TABLE `Componentes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10173;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `Consolas`
--
ALTER TABLE `Consolas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50022;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;

--
-- AUTO_INCREMENT de la tabla `Móviles`
--
ALTER TABLE `Móviles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100029;

--
-- AUTO_INCREMENT de la tabla `PCs`
--
ALTER TABLE `PCs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150024;

--
-- AUTO_INCREMENT de la tabla `Portátiles`
--
ALTER TABLE `Portátiles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200033;

--
-- AUTO_INCREMENT de la tabla `TVs`
--
ALTER TABLE `TVs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250023;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
