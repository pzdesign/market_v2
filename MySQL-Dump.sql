/*
Navicat MySQL Data Transfer

Source Server         : Serverová databáze
Source Server Version : 50173
Source Host           : loki.fakaheda.eu:3306
Source Database       : 139162_mysql_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2014-01-23 17:56:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for authme
-- ----------------------------
DROP TABLE IF EXISTS `authme`;
CREATE TABLE `authme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `ip` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `lastlogin` bigint(20) DEFAULT NULL,
  `x` smallint(6) DEFAULT '0',
  `y` smallint(6) DEFAULT '0',
  `z` smallint(6) DEFAULT '0',
  `world` varchar(255) COLLATE utf8_czech_ci DEFAULT 'world',
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT 'your@email.com',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- ----------------------------
-- Records of authme
-- ----------------------------
INSERT INTO `authme` VALUES ('28', 'test', '$SHA$896436b552952874$75592e1ab87d3b130a95a331a2fea12033892775eecc7f055e161cb48322db92', '89.103.20.114', '1389285918127', '0', '0', '0', 'world', 'your@email.com');
-- ----------------------------
-- Table structure for iConomy
-- ----------------------------
DROP TABLE IF EXISTS `iConomy`;
CREATE TABLE `iConomy` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `balance` double(64,2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iConomy
-- ----------------------------
INSERT INTO `iConomy` VALUES ('60', 'test', '600.00', '0');

-- ----------------------------
-- Table structure for ws_cart
-- ----------------------------
DROP TABLE IF EXISTS `ws_cart`;
CREATE TABLE `ws_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item` (`item_id`),
  CONSTRAINT `ws_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ws_items` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- ----------------------------
-- Records of ws_cart
-- ----------------------------

-- ----------------------------
-- Table structure for ws_coupons
-- ----------------------------
DROP TABLE IF EXISTS `ws_coupons`;
CREATE TABLE `ws_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text COLLATE utf8_czech_ci NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `owner` varchar(60) COLLATE utf8_czech_ci DEFAULT NULL,
  `create_time` bigint(20) NOT NULL,
  `expiration_time` bigint(20) NOT NULL DEFAULT '0',
  `use_time` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- ----------------------------
-- Records of ws_coupons
-- ----------------------------

-- ----------------------------
-- Table structure for ws_items
-- ----------------------------
DROP TABLE IF EXISTS `ws_items`;
CREATE TABLE `ws_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name_cs` mediumtext COLLATE utf8_czech_ci NOT NULL,
  `item_name_en` mediumtext COLLATE utf8_czech_ci NOT NULL,
  `item_id` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `item_data` varchar(200) COLLATE utf8_czech_ci NOT NULL DEFAULT '0',
  `image` varchar(200) COLLATE utf8_czech_ci NOT NULL DEFAULT './images/0.png',
  `price` int(11) NOT NULL,
  `real_money` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `price_discount` int(11) NOT NULL DEFAULT '0',
  `server` varchar(200) COLLATE utf8_czech_ci NOT NULL DEFAULT 'default',
  `visible` tinyint(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- ----------------------------
-- Records of ws_items
-- ----------------------------
INSERT INTO `ws_items` VALUES ('1', 'Kámen', 'Stone', '1', '0', './images/1.png', '10', null, '10', 'default', '1');
INSERT INTO `ws_items` VALUES ('2', 'Láva', 'Lava', '10', '0', './images/10.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('3', 'Červená houba (blok)', 'Red Mushroom (Block)', '100', '0', './images/100.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('4', 'Železné mříže', 'Iron Bars', '101', '0', './images/101.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('5', 'Tabulka skla', 'Glass Pane', '102', '0', './images/102.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('6', 'Meloun (blok)', 'Melon (Block)', '103', '0', './images/103.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('7', 'Dýňové víno', 'Pumpkin Vine', '104', '0', './images/104.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('8', 'Melounové víno', 'Melon Vine', '105', '0', './images/105.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('9', 'Vinice', 'Vines', '106', '0', './images/106.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('10', 'Branka', 'Fence Gate', '107', '0', './images/107.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('11', 'Cihlové schody', 'Brick Stairs', '108', '0', './images/108.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('12', 'Schody z kamenných cihel ', 'Stone Brick Stairs', '109', '0', './images/109.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('13', 'Láva (neroztéká se)', 'Lava (No Spread)', '11', '0', './images/11.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('14', 'Podhoubí', 'Mycelium', '110', '0', './images/110.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('15', 'Leknín', 'Lily Pad', '111', '0', './images/111.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('16', 'Netheritová cihla', 'Nether Brick', '112', '0', './images/112.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('17', 'Netheritový plot', 'Nether Brick Fence', '113', '0', './images/113.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('18', 'Netheritové schody', 'Nether Brick Stairs', '114', '0', './images/114.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('19', 'Bradavičník', 'Nether Wart', '115', '0', './images/115.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('20', 'Oltář očarování', 'Enchantment Table', '116', '0', './images/116.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('21', 'Varný stojan (blok)', 'Brewing Stand (Block)', '379', '0', './images/379.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('22', 'Kotel (blok)', 'Cauldron (Block)', '118', '0', './images/118.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('23', 'End Portál', 'End Portal', '119', '0', './images/119.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('24', 'Písek', 'Sand', '12', '0', './images/12.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('25', 'End Portál rámeček', 'End Portal Frame', '120', '0', './images/120.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('26', 'Enderit', 'End Stone', '121', '0', './images/121.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('27', 'Dračí vejce', 'Dragon Egg', '122', '0', './images/122.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('28', 'Ruditová lampa', 'Redstone Lamp', '123', '0', './images/123.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('29', 'Ruditová lampa (zaplá)', 'Redstone Lamp (On)', '124', '0', './images/124.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('30', 'Dubový půlblok (dvojitý)', 'Oak-Wood Slab (Double)', '125', '0', './images/125.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('31', 'Smrkový půlblok (dvojitý)', 'Spruce-Wood Slab (Double)', '125', '1', './images/125.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('32', 'Břízový půlblok (dvojitý)', 'Birch-Wood Slab (Double)', '125', '2', './images/125.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('33', 'Sekvojový půlblok (dvojitý)', 'Jungle-Wood Slab (Double)', '125', '3', './images/125.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('34', 'Dubový půlblok', 'Oak-Wood Slab', '126', '0', './images/126.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('35', 'Smrkový půlblok', 'Spruce-Wood Slab', '126', '1', './images/126.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('36', 'Břízový půlblok', 'Birch-Wood Slab', '126', '2', './images/126.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('37', 'Sekvojový půlblok', 'Jungle-Wood Slab', '126', '3', './images/126.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('38', 'Koka', 'Coca Plant', '127', '0', './images/127.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('39', 'Pískovcové schody', 'Sandstone Stairs', '128', '0', './images/128.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('40', 'Smaragdové ložisko', 'Emerald Ore', '129', '0', './images/129.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('41', 'Štěrk', 'Gravel', '13', '0', './images/13.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('42', 'Enderitová truhla', 'Ender Chest', '130', '0', './images/130.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('43', 'Uchycení nástražného drátu', 'Tripwire Hook', '131', '0', './images/131.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('44', 'Nástražný drát', 'Tripwire', '132', '0', './images/132.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('45', 'Smaragdový blok', 'Block of Emerald', '133', '0', './images/133.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('46', 'Smrkové schody', 'Wooden Stairs (Spruce)', '134', '0', './images/134.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('47', 'Břízové schody', 'Wooden Stairs (Birch)', '135', '0', './images/135.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('48', 'Sekvojové schody', 'Wooden Stairs (Jungle)', '136', '0', './images/136.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('49', 'Příkazový blok', 'Command Block', '137', '0', './images/137.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('50', 'Maják', 'Beacon', '138', '0', './images/138.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('51', 'Kamenná zeď', 'Cobblestone Wall', '139', '0', './images/139.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('52', 'Kamenná zeď porostlá mechem', 'Mossy Cobblestone Wall', '139', '1', './images/139.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('53', 'Zlatá ruda', 'Gold Ore', '14', '0', './images/14.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('54', 'Květináč', 'Flower Pot (Block)', '140', '0', './images/140.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('55', 'Mrkev', 'Carrot (Crop)', '141', '0', './images/141.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('56', 'Brambor', 'Potatoes (Crop)', '142', '0', './images/142.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('57', 'Tlačítko (dřevěné)', 'Button (Wood)', '143', '0', './images/143.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('58', 'Lebka kostlivce', 'Head Block (Skeleton)', '144', '0', './images/144.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('59', 'Lebka Wither kostlivce', 'Head Block (Wither)', '144', '1', './images/144.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('60', 'Hlava zombie', 'Head Block (Zombie)', '144', '2', './images/144.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('61', 'Hlava ', 'Head Block (Steve)', '144', '3', './images/144.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('62', 'Hlava syčáka', 'Head Block (Creeper)', '144', '4', './images/144.4.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('63', 'Kovadlina', 'Anvil', '145', '0', './images/145.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('64', 'Truhla - past', 'Trapped Chest', '146', '0', './images/146.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('65', 'Váhová nášlapná deska (lehká)', 'Weighted Pressure Plate (Light)', '147', '0', './images/147.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('66', 'Váhová nášlapná deska (těžká)', 'Weighted Pressure Plate (Heavy)', '148', '0', './images/148.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('67', 'Ruditový porovnávač (vypnutý)', 'Redstone Comparator (Off)', '149', '0', './images/149.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('68', 'Železná ruda', 'Iron Ore', '15', '0', './images/15.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('69', 'Ruditový porovnávač (zapnutý)', 'Redstone Comparator (On)', '150', '0', './images/150.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('70', 'Čidlo denního světla', 'Daylight Sensor', '151', '0', './images/151.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('71', 'Ruditový blok', 'Block of Redstone', '152', '0', './images/152.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('72', 'Křemenná runa', 'Nether Quartz Ore', '153', '0', './images/153.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('73', 'Násypka', 'Hopper', '154', '0', './images/154.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('74', 'Blok křemene', 'Quartz Block', '155', '0', './images/155.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('75', 'Opracovaný blok křemene', 'Chiseled Quartz Block', '155', '1', './images/155.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('76', 'Křemenný pilíř', 'Pillar Quartz Block', '155', '2', './images/155.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('77', 'Křemenné shody', 'Quartz Stairs', '156', '0', './images/156.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('78', 'Aktivační kolej', 'Activator Rail', '157', '0', './images/157.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('79', 'Kapátko', 'Dropper', '158', '0', './images/158.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('80', 'Ložisko uhlí', 'Coal Ore', '16', '0', './images/16.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('81', 'Dubové dřevo', 'Wood (Oak)', '17', '0', './images/17.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('82', 'Smrkové dřevo', 'Wood (Spruce)', '17', '1', './images/17.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('83', 'Březové dřevo', 'Wood (Birch)', '17', '2', './images/17.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('84', 'Sekvojové dřevo', 'Wood (Jungle)', '17', '3', './images/17.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('85', 'Dubové listí', 'Leaves (Oak)', '18', '0', './images/18.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('86', 'Smrkové listí', 'Leaves (Spruce)', '18', '1', './images/18.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('87', 'Břízové listí', 'Leaves (Birch)', '18', '2', './images/18.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('88', 'Sekvojové listí', 'Leaves (Jungle)', '18', '3', './images/18.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('89', 'Mořská houba', 'Sponge', '19', '0', './images/19.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('90', 'Trávník', 'Grass', '2', '0', './images/2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('91', 'Sklo', 'Glass', '20', '0', './images/20.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('92', 'Ložisko Lapisu lazuli', 'Lapis Lazuli Ore', '21', '0', './images/21.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('93', 'Blok Lapisu lazuli', 'Lapis Lazuli Block', '22', '0', './images/22.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('94', 'Dávkovač', 'Dispenser', '23', '0', './images/23.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('95', 'Pískovec', 'Sandstone', '24', '0', './images/24.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('96', 'Opracovaný pískovec', 'Sandstone (Chiseled)', '24', '1', './images/24.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('97', 'Vyhlazený pískovec', 'Sandstone (Smooth)', '24', '2', './images/24.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('98', 'Hudební blok', 'Note Block', '25', '0', './images/25.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('99', 'Železná lopata', 'Iron Shovel', '256', '0', './images/256.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('100', 'Železný krumpáč', 'Iron Pickaxe', '257', '0', './images/257.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('101', 'Železná sekera', 'Iron Axe', '258', '0', './images/258.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('102', 'Křesadlo', 'Flint and Steel', '259', '0', './images/259.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('103', 'Postel', 'Bed (Block)', '26', '0', './images/26.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('104', 'Jablko', 'Apple', '260', '0', './images/260.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('105', 'Luk', 'Bow', '261', '0', './images/261.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('106', 'Šíp', 'Arrow', '262', '0', './images/262.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('107', 'Uhlí', 'Coal', '263', '0', './images/263.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('108', 'Dřevené uhlí', 'Charcoal', '263', '1', './images/263.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('109', 'Diamantový klenot', 'Diamond Gem', '264', '0', './images/264.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('110', 'Železný ingot', 'Iron Ingot', '265', '0', './images/265.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('111', 'Zlatý ingot', 'Gold Ingot', '266', '0', './images/266.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('112', 'Železný meč', 'Iron Sword', '267', '0', './images/267.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('113', 'Dřevený meč', 'Wooden Sword', '268', '0', './images/268.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('114', 'Dřevěná lopata', 'Wooden Shovel', '269', '0', './images/269.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('115', 'Napájené koleje', 'Powered Rail', '27', '0', './images/27.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('116', 'Dřevěný krumpáč', 'Wooden Pickaxe', '270', '0', './images/270.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('117', 'Dřevěná sekera', 'Wooden Axe', '271', '0', './images/271.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('118', 'Kamenný meč', 'Stone Sword', '272', '0', './images/272.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('119', 'Kamenná lopata', 'Stone Shovel', '273', '0', './images/273.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('120', 'Kamenný krumpáč', 'Stone Pickaxe', '274', '0', './images/274.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('121', 'Kamenná sekera', 'Stone Axe', '275', '0', './images/275.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('122', 'Diamantový meč', 'Diamond Sword', '276', '0', './images/276.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('123', 'Diamantová lopata', 'Diamond Shovel', '277', '0', './images/277.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('124', 'Diamantový krumpáč', 'Diamond Pickaxe', '278', '0', './images/278.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('125', 'Diamantová sekera', 'Diamond Axe', '279', '0', './images/279.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('126', 'Koleje se senzorem', 'Detector Rail', '28', '0', './images/28.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('127', 'Tyčka', 'Stick', '280', '0', './images/280.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('128', 'Miska', 'Bowl', '281', '0', './images/281.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('129', 'Houbový guláš', 'Mushroom Stew', '282', '0', './images/282.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('130', 'Zlatý meč', 'Gold Sword', '283', '0', './images/283.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('131', 'Zlatá lopata', 'Gold Shovel', '284', '0', './images/284.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('132', 'Zlatý krumpáč', 'Gold Pickaxe', '285', '0', './images/285.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('133', 'Zlatá sekera', 'Gold Axe', '286', '0', './images/286.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('134', 'Vlákno', 'String', '287', '0', './images/287.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('135', 'Pírko', 'Feather', '288', '0', './images/288.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('136', 'Střelný prach', 'Gunpowder', '289', '0', './images/289.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('137', 'Lepivý píst', 'Sticky Piston', '29', '0', './images/29.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('138', 'Dřevěná motyka', 'Wooden Hoe', '290', '0', './images/290.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('139', 'Kamenná motyka', 'Stone Hoe', '291', '0', './images/291.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('140', 'Železná motyka', 'Iron Hoe', '292', '0', './images/292.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('141', 'Diamantová motyka', 'Diamond Hoe', '293', '0', './images/293.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('142', 'Zlatá motyka', 'Gold Hoe', '294', '0', './images/294.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('143', 'Semínka pšenice', 'Wheat Seeds', '295', '0', './images/295.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('144', 'Pšenice', 'Wheat', '296', '0', './images/296.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('145', 'Chléb', 'Bread', '297', '0', './images/297.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('146', 'Kožená čapka', 'Leather Helmet', '298', '0', './images/298.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('147', 'Kožená tunika', 'Leather Chestplate', '299', '0', './images/299.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('148', 'Hlína', 'Dirt', '3', '0', './images/3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('149', 'Pavučina', 'Web', '30', '0', './images/30.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('150', 'Kožené kalhoty', 'Leather Leggings', '300', '0', './images/300.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('151', 'Kožené boty', 'Leather Boots', '301', '0', './images/301.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('152', 'Kroužková kapuce', 'Chainmail Helmet', '302', '0', './images/302.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('153', 'Kroužková košile', 'Chainmail Chestplate', '303', '0', './images/303.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('154', 'Krožkové kalhoty', 'Chainmail Leggings', '304', '0', './images/304.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('155', 'Kroužkové boty', 'Chainmail Boots', '305', '0', './images/305.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('156', 'Železná helma', 'Iron Helmet', '306', '0', './images/306.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('157', 'Železné brnění', 'Iron Chestplate', '307', '0', './images/307.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('158', 'Železné kalhoty', 'Iron Leggings', '308', '0', './images/308.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('159', 'Železné boty', 'Iron Boots', '309', '0', './images/309.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('160', 'Suché křoví', 'Tall Grass (Dead Shrub)', '31', '0', './images/31.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('161', 'Vysoká tráva', 'Tall Grass', '31', '1', './images/31.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('162', 'Kapradina', 'Tall Grass (Fern)', '31', '2', './images/31.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('163', 'Diamantová helma', 'Diamond Helmet', '310', '0', './images/310.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('164', 'Diamantové brnění', 'Diamond Chestplate', '311', '0', './images/311.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('165', 'Diamantové kalhoty', 'Diamond Leggings', '312', '0', './images/312.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('166', 'Diamantové boty', 'Diamond Boots', '313', '0', './images/313.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('167', 'Zlatá helma', 'Gold Helmet', '314', '0', './images/314.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('168', 'Zlaté brnění', 'Gold Chestplate', '315', '0', './images/315.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('169', 'Zlaté kalhoty', 'Gold Leggings', '316', '0', './images/316.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('170', 'Zlaté boty', 'Gold Boots', '317', '0', './images/317.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('171', 'Křemen', 'Flint', '318', '0', './images/318.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('172', 'Syrová kotleta', 'Raw Porkchop', '319', '0', './images/319.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('173', 'Suché křoví', 'Dead Shrub', '32', '0', './images/32.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('174', 'Pečená kotleta', 'Cooked Porkchop', '320', '0', './images/320.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('175', 'Obraz', 'Painting', '321', '0', './images/321.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('176', 'Zlaté jablko', 'Golden Apple', '322', '0', './images/322.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('177', 'Zakleté zlaté jablko', 'Enchanted Golden Apple', '322', '1', './images/322.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('178', 'Cedule', 'Sign', '323', '0', './images/323.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('179', 'Dřevěné dveře', 'Wooden Door', '324', '0', './images/324.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('180', 'Kbelík', 'Bucket', '325', '0', './images/325.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('181', 'Kbelík (voda)', 'Bucket (Water)', '326', '0', './images/326.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('182', 'Kbelík (láva)', 'Bucket (Lava)', '327', '0', './images/327.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('183', 'Vozík', 'Minecart', '328', '0', './images/328.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('184', 'Sedlo', 'Saddle', '329', '0', './images/329.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('185', 'Píst', 'Piston', '33', '0', './images/33.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('186', 'Železné dveře', 'Iron Door', '330', '0', './images/330.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('187', 'Ruditový prach', 'Redstone Dust', '331', '0', './images/331.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('188', 'Sněhová koule', 'Snowball', '332', '0', './images/332.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('189', 'Loď', 'Boat', '333', '0', './images/333.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('190', 'Kůže', 'Leather', '334', '0', './images/334.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('191', 'Kbelík (mlíko)', 'Bucket (Milk)', '335', '0', './images/335.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('192', 'Jílová cihla', 'Clay Brick', '336', '0', './images/336.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('193', 'Jíl', 'Clay', '337', '0', './images/337.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('194', 'Cukrová třtina', 'Sugar Cane', '338', '0', './images/338.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('195', 'Papír', 'Paper', '339', '0', './images/339.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('196', 'Píst (hlava)', 'Piston (Head)', '34', '0', './images/34.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('197', 'Kniha', 'Book', '340', '0', './images/340.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('198', 'Sliz', 'Slime Ball', '341', '0', './images/341.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('199', 'Nákladní vozík', 'Storage Minecart', '342', '0', './images/342.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('200', 'Parní vozík', 'Powered Minecart', '343', '0', './images/343.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('201', 'Vejce', 'Egg', '344', '0', './images/344.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('202', 'Kompas', 'Compass', '345', '0', './images/345.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('203', 'Rybářský prut', 'Fishing Rod', '346', '0', './images/346.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('204', 'Hodiny', 'Watch', '347', '0', './images/347.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('205', 'Světlitový prášek', 'Glowstone Dust', '348', '0', './images/348.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('206', 'Syrová ryba', 'Raw Fish', '349', '0', './images/349.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('207', 'Vlna', 'Wool', '35', '0', './images/35.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('208', 'Oranžová vlna', 'Orange Wool', '35', '1', './images/35.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('209', 'Fialová vlna', 'Purple Wool', '35', '10', './images/35.10.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('210', 'Modrá vlna', 'Blue Wool', '35', '11', './images/35.11.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('211', 'Hnědá vlna', 'Brown Wool', '35', '12', './images/35.12.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('212', 'Zelená vlna', 'Green Wool', '35', '13', './images/35.13.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('213', 'Červená vlna', 'Red Wool', '35', '14', './images/35.14.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('214', 'Černá vlna', 'Black Wool', '35', '15', './images/35.15.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('215', 'Purpurová vlna', 'Magenta Wool', '35', '2', './images/35.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('216', 'Světle modrá vlna', 'Light Blue Wool', '35', '3', './images/35.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('217', 'Žlutá vlna', 'Yellow Wool', '35', '4', './images/35.4.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('218', 'Světle zelená vlna', 'Lime Wool', '36', '5', './images/35.5.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('219', 'Růžová vlna', 'Pink Wool', '36', '6', './images/35.6.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('220', 'Šedá vlna', 'Gray Wool', '36', '7', './images/35.7.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('221', 'Světle šedá vlna', 'Light Gray Wool', '36', '8', './images/35.8.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('222', 'Azurová vlna', 'Cyan Wool', '36', '9', './images/35.9.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('223', 'Pečená ryba', 'Cooked Fish', '350', '0', './images/350.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('224', 'Váček inkoustu', 'Ink Sack', '351', '0', './images/351.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('225', 'Šípková červeň', 'Rose Red Dye', '351', '1', './images/351.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('226', 'Pampeliškově žluté barvivo', 'Lime Dye', '351', '10', './images/351.10.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('227', 'Světlé modré barvivo', 'Dandelion Yellow Dye', '351', '11', './images/351.11.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('228', 'Světlé modré barvivo', 'Light Blue Dye', '351', '12', './images/351.12.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('229', 'Fialové barvivo', 'Magenta Dye', '351', '13', './images/351.13.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('230', 'Oranžové barvivo', 'Orange Dye', '351', '14', './images/351.14.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('231', 'Kostní moučka', 'Bone Meal', '351', '15', './images/351.15.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('232', 'Kaktusová zeleň', 'Cactus Green Dye', '351', '2', './images/351.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('233', 'Kakaové boby', 'Coca Bean', '351', '3', './images/351.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('234', 'Lapis lazuli', 'Lapis Lazuli', '351', '4', './images/351.4.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('235', 'Purpurové barvivo', 'Purple Dye', '352', '5', './images/351.5.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('236', 'Světlé šedé barvivo barvivo', 'Cyan Dye', '352', '6', './images/351.6.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('237', 'Šedé barvivo', 'Light Gray Dye', '352', '7', './images/351.7.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('238', 'Růžové barvivo', 'Gray Dye', '352', '8', './images/351.8.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('239', 'Světle zelené barvivo', 'Pink Dye', '352', '9', './images/351.9.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('240', 'Kost', 'Bone', '352', '0', './images/352.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('241', 'Cukr', 'Sugar', '353', '0', './images/353.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('242', 'Dort', 'Cake', '354', '0', './images/354.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('243', 'Postel', 'Bed', '355', '0', './images/355.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('244', 'Ruditový opakovač', 'Redstone Repeater', '356', '0', './images/356.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('245', 'Sušenka', 'Cookie', '357', '0', './images/357.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('246', 'Mapa', 'Map', '358', '0', './images/358.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('247', 'Nůžky', 'Shears', '359', '0', './images/359.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('248', 'Piston (hýbající se)', 'Piston (Moving)', '36', '0', './images/36.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('249', 'Meloun (kousek)', 'Melon (Slice)', '360', '0', './images/360.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('250', 'Dýňová semínka', 'Pumpkin Seeds', '361', '0', './images/361.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('251', 'Melounová semínka', 'Melon Seeds', '362', '0', './images/362.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('252', 'Syrový steak', 'Raw Beef', '363', '0', './images/363.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('253', 'Steak', 'Steak', '364', '0', './images/364.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('254', 'Syrové kuře', 'Raw Chicken', '365', '0', './images/365.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('255', 'Pečené kuře', 'Cooked Chicken', '366', '0', './images/366.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('256', 'Shnilé maso', 'Rotten Flesh', '367', '0', './images/367.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('257', 'Ender perla ', 'Ender Pearl', '368', '0', './images/368.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('258', 'Ohnivá hůl', 'Blaze Rod', '369', '0', './images/369.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('259', 'Pampeliška', 'Dandelion', '37', '0', './images/37.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('260', 'Slza ducha', 'Ghast Tear', '370', '0', './images/370.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('261', 'Zlatý nuget', 'Gold Nugget', '371', '0', './images/371.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('262', 'Semínka bradavičníku', 'Nether Wart Seeds', '372', '0', './images/372.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('263', 'Lahvička s vodou', 'Water Bottle', '373', '0', './images/373.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('264', 'Akward lektvar', 'Awkward Potion', '373', '16', './images/373.16.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('265', 'Vrhací lektvar regenerace (0.33)', 'Regeneration Splash (0.33)', '373', '16385', './images/373.16385.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('266', 'Vrhací lektvar svižnosti (2.15)', 'Swiftness Splash (2.15)', '373', '16386', './images/373.16386.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('267', 'Vrhací lektvar ohnivzdornosti (2.15)', 'Fire Resistance Splash (2.15)', '373', '16387', './images/373.16387.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('268', 'Thick lektvar', 'Thick Potion', '373', '32', './images/373.32.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('269', 'Světský lektvar', 'Mundane Potion', '374', '64', './images/373.64.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('270', 'Lektvar regenerace (0.45)', 'Regeneration Potion (0.45)', '374', '8193', './images/373.8193.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('271', 'Lektvar svižnosti (3.00)', 'Swiftness Potion (3.00)', '374', '8194', './images/373.8194.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('272', 'Lektvar ohnivzdornosti (3.00)', 'Fire Resistance Potion (3.00)', '374', '8195', './images/373.8195.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('273', 'Jed (0.45)', 'Poison Potion (0.45)', '374', '8196', './images/373.8196.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('274', 'Léčivý lektvar', 'Healing Potion', '374', '8197', './images/373.8197.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('275', 'Lektvar nočního vidění (3.00)', 'Night Vision Potion (3.00)', '374', '8198', './images/373.8198.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('276', 'Lektvar slabosti (1.30)', 'Weakness Potion (1.30)', '374', '8200', './images/373.8200.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('277', 'Lektvar síly (3.00)', 'Strength Potion (3.00)', '374', '8201', './images/373.8201.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('278', 'Lektvar zpomalení (1.30)', 'Slowness Potion (1.30)', '374', '8202', './images/373.8202.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('279', 'Lektvar zranění', 'Harming Potion', '374', '8204', './images/373.8204.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('280', 'Lektvar neviditelnosti (3.00)', 'Invisibility Potion (3.00)', '374', '8206', './images/373.8206.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('281', 'Lektvar regenerace (0.22)', 'Regeneration Potion II (0.22)', '374', '8225', './images/373.8225.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('282', 'Lektvar svižnosti (1.30)', 'Swiftness Potion II (1.30)', '374', '8226', './images/373.8226.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('283', 'Jed (0.22)', 'Poison Potion II (0.22)', '374', '8228', './images/373.8228.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('284', 'Léčivý lektvar II', 'Healing Potion II', '374', '8229', './images/373.8229.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('285', 'Lektvar síly (1.30)', 'Strength Potion II (1.30)', '374', '8233', './images/373.8233.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('286', 'Lektvar zranění II', 'Harming Potion II', '374', '8236', './images/373.8236.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('287', 'Lektvar regenerace (2.00)', 'Regeneration Potion (2.00)', '374', '8257', './images/373.8257.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('288', 'Lektvar svižnosti (8.00)', 'Swiftness Potion (8.00)', '374', '8258', './images/373.8258.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('289', 'Lektvar ohnivzdortnosti (8.00)', 'Fire Resistance Potion (8.00)', '374', '8259', './images/373.8259.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('290', 'Jed (2.00)', 'Poison Potion (2.00)', '374', '8260', './images/373.8260.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('291', 'Lektvar nočního vidění (8.00)', 'Night Vision Potion (8.00)', '374', '8262', './images/373.8262.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('292', 'Lektvar slabosti (4.00)', 'Weakness Potion (4.00)', '374', '8264', './images/373.8264.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('293', 'Lektvar síly (8.00)', 'Strength Potion (8.00)', '374', '8265', './images/373.8265.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('294', 'Lektvar zpomalení (4.00)', 'Slowness Potion (4.00)', '374', '8266', './images/373.8266.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('295', 'Lektvar eviditelnosti (8.00)', 'Invisibility Potion (8.00)', '374', '8270', './images/373.8270.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('296', 'Růže', 'Rose', '38', '0', './images/38.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('297', 'Hnědá houba', 'Brown Mushroom', '39', '0', './images/39.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('298', 'Kamenná suť', 'Cobblestone', '4', '0', './images/4.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('299', 'Červená houba', 'Red Mushroom', '40', '0', './images/40.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('300', 'Blok zlata', 'Block of Gold', '41', '0', './images/41.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('301', 'Blok železa', 'Block of Iron', '42', '0', './images/42.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('302', 'Kamenný půlblok (zdvojený)', 'Stone Slab (Double)', '43', '0', './images/43.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('303', 'Pískovcový půlblok (zdvojený)', 'Sandstone Slab (Double)', '43', '1', './images/43.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('304', 'Dřevěný půlblok (zdvojený)', 'Wooden Slab (Double)', '43', '2', './images/43.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('305', 'Půlblok z kamenné suti (zdvojený)', 'Cobblestone Slab (Double)', '43', '3', './images/43.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('306', 'Cihlový půlblok (zdvojený)', 'Brick Slab (Double)', '43', '4', './images/43.4.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('307', 'Půlblok z kamenných cihel (zdvojený)', 'Stone Brick Slab (Double)', '44', '5', './images/43.5.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('308', 'Půlblok z Netheritových cihel (zdvojený)', 'Nether Brick Slab (Double)', '44', '6', './images/43.6.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('309', 'Křemenné dlaždice (zdvojené)', 'Quartz Slab (Double)', '44', '7', './images/43.7.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('310', 'Kamenný půlblok', 'Stone Slab', '44', '0', './images/44.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('311', 'Pískovcový půlblok', 'Sandstone Slab', '44', '1', './images/44.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('312', 'Dřevěný půlblok', 'Wooden Slab', '44', '2', './images/44.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('313', 'Půlblok z kamenné suti', 'Cobblestone Slab', '44', '2', './images/44.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('314', 'Cihlový půlblok', 'Brick Slab', '44', '4', './images/44.4.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('315', 'Půlblok z kamenných cihel', 'Stone Brick Slab', '45', '5', './images/44.5.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('316', 'Půlblok z Netheritových cihel', 'Nether Brick Slab', '45', '6', './images/44.6.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('317', 'Křemenné dlaždice', 'Quartz Slab', '45', '7', './images/44.7.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('318', 'Cihly', 'Brick', '45', '0', './images/45.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('319', 'TNT', 'TNT', '46', '0', './images/46.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('320', 'Knihovna', 'Bookcase', '47', '0', './images/47.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('321', 'Mechový kámen', 'Moss Stone', '48', '0', './images/48.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('322', 'Obsidián', 'Obsidian', '49', '0', './images/49.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('323', 'Dubová prkna', 'Wooden Plank (Oak)', '5', '0', './images/5.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('324', 'Smrková prkna ', 'Wooden Plank (Spruce)', '5', '1', './images/5.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('325', 'Břízová prkna', 'Wooden Plank (Birch)', '5', '2', './images/5.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('326', 'Sekvojová prkna', 'Wooden Plank (Jungle)', '5', '3', './images/5.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('327', 'Louč', 'Torch', '50', '0', './images/50.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('328', 'Oheň', 'Fire', '51', '0', './images/51.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('329', 'Spawner mobů', 'Mob Spawner', '52', '0', './images/52.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('330', 'Dubové schody', 'Wooden Stairs (Oak)', '53', '0', './images/53.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('331', 'Truhla', 'Chest', '54', '0', './images/54.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('332', 'Rudit', 'Redstone Wire', '55', '0', './images/55.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('333', 'Diamantové ložisko', 'Diamond Ore', '56', '0', './images/56.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('334', 'Diamantový blok', 'Block of Diamond', '57', '0', './images/57.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('335', 'Pracovní stůl', 'Workbench', '58', '0', './images/58.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('336', 'Pšenice', 'Wheat (Crop)', '59', '0', './images/59.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('337', 'Sazenice dubu', 'Sapling (Oak)', '6', '0', './images/6.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('338', 'Sazenice smrku', 'Sapling (Spruce)', '6', '1', './images/6.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('339', 'Sazenice břízi', 'Sapling (Birch)', '6', '2', './images/6.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('340', 'Sazenice sekvoje', 'Sapling (Jungle)', '6', '3', './images/6.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('341', 'Zemědělská půda', 'Farmland', '60', '0', './images/60.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('342', 'Pec', 'Furnace', '61', '0', './images/61.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('343', 'Pec (vypalující)', 'Furnace (Smelting)', '62', '0', './images/62.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('344', 'Cedule (blok)', 'Sign (Block)', '63', '0', './images/63.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('345', 'Dřevěné dveře (blok)', 'Wood Door (Block)', '64', '0', './images/64.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('346', 'Žebřík', 'Ladder', '65', '0', './images/65.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('347', 'Koleje', 'Rail', '66', '0', './images/66.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('348', 'Kamenné schody', 'Cobblestone Stairs', '67', '0', './images/67.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('349', 'Cedule (na zdi)', 'Sign (Wall Block)', '68', '0', './images/68.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('350', 'Páka', 'Lever', '69', '0', './images/69.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('351', 'Podloží', 'Bedrock', '7', '0', './images/7.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('352', 'Kamenná nášlapná deska', 'Stone Pressure Plate', '70', '0', './images/70.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('353', 'Železné dveře (blok)', 'Iron Door (Block)', '71', '0', './images/71.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('354', 'Dřevěná nášlapná deska', 'Wooden Pressure Plate', '72', '0', './images/72.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('355', 'Ruditové ložisko', 'Redstone Ore', '73', '0', './images/73.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('356', 'Ruditové ložisko (svítící)', 'Redstone Ore (Glowing)', '74', '0', './images/74.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('357', 'Rudivová louč (vyplá)', 'Redstone Torch (Off)', '75', '0', './images/75.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('358', 'Ruditová louč', 'Redstone Torch', '76', '0', './images/76.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('359', 'Tlačítko', 'Button (Stone)', '77', '0', './images/77.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('360', 'Sníh', 'Snow', '78', '0', './images/78.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('361', 'Led', 'Ice', '79', '0', './images/79.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('362', 'Voda', 'Water', '8', '0', './images/8.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('363', 'Sníh', 'Snow Block', '80', '0', './images/80.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('364', 'Kaktus', 'Cactus', '81', '0', './images/81.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('365', 'Jíl', 'Clay Block', '82', '0', './images/82.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('366', 'Cukrová třtina (blok)', 'Sugar Cane (Block)', '83', '0', './images/83.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('367', 'Hrací skříň', 'Jukebox', '84', '0', './images/84.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('368', 'Plot', 'Fence', '85', '0', './images/85.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('369', 'Dýně', 'Pumpkin', '86', '0', './images/86.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('370', 'Netherit', 'Netherrack', '87', '0', './images/87.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('371', 'Písek duší', 'Soul Sand', '88', '0', './images/88.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('372', 'Světlit', 'Glowstone', '89', '0', './images/89.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('373', 'Voda (neroztéká se)', 'Water (No Spread)', '9', '0', './images/9.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('374', 'Portál', 'Portal', '90', '0', './images/90.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('375', 'Svítící dýně', 'Jack-O-Lantern', '91', '0', './images/91.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('376', 'Dort (blok)', 'Cake (Block)', '92', '0', './images/92.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('377', 'Ruditový opakovač (blok vyplý)', 'Redstone Repeater (Block Off)', '93', '0', './images/93.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('378', 'Ruditový opakovač (blok zaplý)', 'Redstone Repeater (Block On)', '94', '0', './images/94.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('379', 'Truhla - past', 'Locked Chest', '95', '0', './images/95.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('380', 'Padací dveře', 'Trapdoor', '96', '0', './images/96.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('381', 'Kámen ukrývající rybenku', 'Silverfish Stone', '97', '0', './images/97.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('382', 'Kamenná suť ukrývající rybenku', 'Silverfish Cobblestone', '97', '1', './images/97.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('383', 'Kamenná cihla ukrývající rybenku', 'Silverfish Stone Brick', '97', '2', './images/97.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('384', 'Kamenné cihly', 'Stone Bricks', '98', '0', './images/98.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('385', 'Mechem porostlé kamenné cihly', 'Mossy Stone Bricks', '98', '1', './images/98.1.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('386', 'Popraskané kamenné cihly', 'Cracked Stone Bricks', '98', '2', './images/98.2.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('387', 'Opracované kamenné cihly', 'Chiseled Stone Brick', '98', '3', './images/98.3.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('388', 'Hnědá houba (blok)', 'Brown Mushroom (Block)', '99', '0', './images/99.png', '10', null, '0', 'default', '1');
INSERT INTO `ws_items` VALUES ('389', 'Gold VIP', 'Zlaté VIP', 'pex user %nick% group set VIP; say pokus; say dalsi pokus', '0', './images/premium_gold.png', '20', null, '46', 'default', '1');
INSERT INTO `ws_items` VALUES ('391', 'Pokus', 'Experiment', 'broadcast pokus; say ahoj; money pay test', '0', './images/premium_wood.png', '16', null, '15', 'default', '1');

-- ----------------------------
-- Table structure for ws_settings
-- ----------------------------
DROP TABLE IF EXISTS `ws_settings`;
CREATE TABLE `ws_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `option_value` varchar(200) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- ----------------------------
-- Records of ws_settings
-- ----------------------------
INSERT INTO `ws_settings` VALUES ('1', 'broadcastMessage', '§3Webshop§r: Hráč§b $username §rnakoupil za§b %cena');
INSERT INTO `ws_settings` VALUES ('2', 'playerMessage', '§3Webshop§r: Dekujeme ze jsi u nas zakoupil §b%item');
INSERT INTO `ws_settings` VALUES ('3', 'loginPlugin', 'AuthMe');
INSERT INTO `ws_settings` VALUES ('4', 'loginTable', 'AuthMe');
INSERT INTO `ws_settings` VALUES ('6', 'economyPlugin', 'iConomy');
INSERT INTO `ws_settings` VALUES ('7', 'economyTable', 'iConomy');
INSERT INTO `ws_settings` VALUES ('8', 'cmdType', 'CraftBukkit');
INSERT INTO `ws_settings` VALUES ('5', 'loginHash', 'SHA256');
INSERT INTO `ws_settings` VALUES ('9', 'giveType', 'JSONAPI');
INSERT INTO `ws_settings` VALUES ('10', 'motd', null);

-- ----------------------------
-- Table structure for ws_users
-- ----------------------------
DROP TABLE IF EXISTS `ws_users`;
CREATE TABLE `ws_users` (
  `id` int(66) NOT NULL AUTO_INCREMENT,
  `username` varchar(66) COLLATE utf8_czech_ci NOT NULL,
  `role` varchar(66) COLLATE utf8_czech_ci NOT NULL,
  `real_money` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- ----------------------------
-- Records of ws_users
-- ----------------------------
INSERT INTO `ws_users` VALUES ('10', 'test', 'admin', '0');