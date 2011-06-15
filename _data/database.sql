/*
SQLyog Community Edition- MySQL GUI v6.56
MySQL - 5.0.51a-3ubuntu5.8 : Database - prototype
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`prototype` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `prototype`;

/*Table structure for table `tm_aplikasi` */

DROP TABLE IF EXISTS `tm_aplikasi`;

CREATE TABLE `tm_aplikasi` (
  `appl_kode` char(6) collate utf8_bin NOT NULL,
  `ga_kode` char(6) collate utf8_bin default NULL,
  `appl_seq` tinyint(3) unsigned default NULL,
  `appl_file` varchar(50) collate utf8_bin default NULL,
  `appl_proc` varchar(100) collate utf8_bin default NULL,
  `appl_nama` varchar(50) collate utf8_bin default NULL,
  `appl_deskripsi` tinyint(4) default NULL,
  `appl_sts` tinyint(4) default NULL,
  `appl_ref` tinyint(4) default NULL,
  PRIMARY KEY  (`appl_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tm_aplikasi` */

insert  into `tm_aplikasi`(`appl_kode`,`ga_kode`,`appl_seq`,`appl_file`,`appl_proc`,`appl_nama`,`appl_deskripsi`,`appl_sts`,`appl_ref`) values ('110501','110000',4,'test/form_nonghol.php','test/proses.php','Fungsi Nonghol',0,0,0);
insert  into `tm_aplikasi`(`appl_kode`,`ga_kode`,`appl_seq`,`appl_file`,`appl_proc`,`appl_nama`,`appl_deskripsi`,`appl_sts`,`appl_ref`) values ('110301','110000',3,'test/form_peringatan.php','0','Fungsi Peringatan',0,0,0);
insert  into `tm_aplikasi`(`appl_kode`,`ga_kode`,`appl_seq`,`appl_file`,`appl_proc`,`appl_nama`,`appl_deskripsi`,`appl_sts`,`appl_ref`) values ('110000','000000',9,'0','0','Development',0,0,0);
insert  into `tm_aplikasi`(`appl_kode`,`ga_kode`,`appl_seq`,`appl_file`,`appl_proc`,`appl_nama`,`appl_deskripsi`,`appl_sts`,`appl_ref`) values ('110101','110000',1,'test/form_buka.php','0','Fungsi Buka',0,0,0);
insert  into `tm_aplikasi`(`appl_kode`,`ga_kode`,`appl_seq`,`appl_file`,`appl_proc`,`appl_nama`,`appl_deskripsi`,`appl_sts`,`appl_ref`) values ('110201','110000',2,'test/form_periksa.php','0','Fungsi Periksa',0,0,0);
insert  into `tm_aplikasi`(`appl_kode`,`ga_kode`,`appl_seq`,`appl_file`,`appl_proc`,`appl_nama`,`appl_deskripsi`,`appl_sts`,`appl_ref`) values ('110401','110000',5,'test/form.php','test/proses.php','Simple Form',0,0,0);

/*Table structure for table `v_menu_item` */

DROP TABLE IF EXISTS `v_menu_item`;

/*!50001 DROP VIEW IF EXISTS `v_menu_item` */;
/*!50001 DROP TABLE IF EXISTS `v_menu_item` */;

/*!50001 CREATE TABLE `v_menu_item` (
  `appl_kode` char(6) collate utf8_bin NOT NULL,
  `l1` varchar(2) collate utf8_bin NOT NULL default '',
  `l2` varchar(2) collate utf8_bin NOT NULL default '',
  `l3` varchar(2) collate utf8_bin NOT NULL default '',
  `parent_id` char(6) collate utf8_bin default NULL,
  `appl_file` varchar(50) collate utf8_bin default NULL,
  `appl_proc` varchar(100) collate utf8_bin default NULL,
  `appl_name` varchar(50) collate utf8_bin default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin */;

/*View structure for view v_menu_item */

/*!50001 DROP TABLE IF EXISTS `v_menu_item` */;
/*!50001 DROP VIEW IF EXISTS `v_menu_item` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_menu_item` AS select `a`.`appl_kode` AS `appl_kode`,substr(`a`.`appl_kode`,1,2) AS `l1`,substr(`a`.`appl_kode`,3,2) AS `l2`,substr(`a`.`appl_kode`,5,2) AS `l3`,`a`.`ga_kode` AS `parent_id`,`a`.`appl_file` AS `appl_file`,`a`.`appl_proc` AS `appl_proc`,`a`.`appl_nama` AS `appl_name` from `tm_aplikasi` `a` where (`a`.`appl_sts` = 0) order by `a`.`ga_kode`,`a`.`appl_seq` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;