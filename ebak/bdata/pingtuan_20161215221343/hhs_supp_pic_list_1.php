<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `hhs_supp_pic_list`;");
E_C("CREATE TABLE `hhs_supp_pic_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `cat_id` varchar(30) NOT NULL,
  `suppliers_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>