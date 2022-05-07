/*
Navicat MySQL Data Transfer

Source Server         : 本地链接
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : a_jzb_com

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2022-04-19 16:30:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_ad`
-- ----------------------------
DROP TABLE IF EXISTS `cms_ad`;
CREATE TABLE `cms_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `link_url` varchar(128) DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `ad_position` int(10) DEFAULT NULL,
  `mode` varchar(200) DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `start_date` int(11) DEFAULT NULL COMMENT '开始时间',
  `end_date` int(11) DEFAULT NULL COMMENT '结束时间',
  `asidetop` int(10) DEFAULT NULL,
  `asideleft` int(10) DEFAULT NULL,
  `screen_time` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `closed` tinyint(1) DEFAULT '0',
  `orderby` tinyint(3) DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_ad
-- ----------------------------
INSERT INTO `cms_ad` VALUES ('1', '百沐森塑胶地板', '/category/1.html', '20180913/dd6dd909abe208a4e84ae360c52614c4.png', '0', 'popup', '600', '450', '1536768000', '1759161600', '200', '5', '4', '0', '1', '10');

-- ----------------------------
-- Table structure for `cms_admin`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin`;
CREATE TABLE `cms_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin DEFAULT '' COMMENT '用户名',
  `password` varchar(32) COLLATE utf8_bin DEFAULT '' COMMENT '密码',
  `portrait` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '头像',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) DEFAULT '0' COMMENT '最后登录时间',
  `real_name` varchar(20) COLLATE utf8_bin DEFAULT '' COMMENT '真实姓名',
  `status` int(1) DEFAULT '0' COMMENT '状态',
  `groupid` int(11) DEFAULT '1' COMMENT '用户角色id',
  `token` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of cms_admin
-- ----------------------------
INSERT INTO `cms_admin` VALUES ('1', 'admin', '37730d10ec374a775d45f836868d7c4e', '20161122\\admin.jpg', '380', '60.173.242.117', '1536977586', 'admin', '1', '1', '0b0ecc209d22a601c3ce0a7980b79b5e');
INSERT INTO `cms_admin` VALUES ('9', 'yh2018', '37730d10ec374a775d45f836868d7c4e', '20161122\\ab9f9c492871857e1a6c5bc1c658ef7f.jpg', '35', '127.0.0.1', '1532489978', '6666', '1', '2', '920bba66aafc85c0defed8ae96131cee');
INSERT INTO `cms_admin` VALUES ('14', 'shine', '5725323e51457c061867494f775d77dc', '20161122\\8a69f4c962e26265fd9f12efbff65013.jpg', '1', '0.0.0.0', '1479826965', '2222228', '0', '3', '');

-- ----------------------------
-- Table structure for `cms_applet_config`
-- ----------------------------
DROP TABLE IF EXISTS `cms_applet_config`;
CREATE TABLE `cms_applet_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_applet_config
-- ----------------------------
INSERT INTO `cms_applet_config` VALUES ('1', 'applet_title', '百沐森塑胶地板');
INSERT INTO `cms_applet_config` VALUES ('3', 'applet_copy', '<p style=\"text-align: center;\">COPYRIGHT © 2018 晨飞网络</p><p style=\"text-align: center;\">&nbsp; 沪ICP备18034397号-1<br/></p><p style=\"text-align: center;\">&nbsp;POWERED BY HFCFWL.COM</p>');
INSERT INTO `cms_applet_config` VALUES ('4', 'newsParam', '8|0|1|50');
INSERT INTO `cms_applet_config` VALUES ('5', 'picParam', '8|2|0|1|0|40');
INSERT INTO `cms_applet_config` VALUES ('6', 'picTxtParam', '6|16|34|1');
INSERT INTO `cms_applet_config` VALUES ('2', 'applet_service_line', '13916481905');
INSERT INTO `cms_applet_config` VALUES ('7', 'applet_logo', '20180914/e2c92a5f25d536a5da6306f75ed68350.png');
INSERT INTO `cms_applet_config` VALUES ('8', 'applet_coordinate', '31.839262,117.413628');
INSERT INTO `cms_applet_config` VALUES ('9', 'applet_address', '合肥市华东建材城D区107栋28号');

-- ----------------------------
-- Table structure for `cms_applet_module`
-- ----------------------------
DROP TABLE IF EXISTS `cms_applet_module`;
CREATE TABLE `cms_applet_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titleStyle` tinyint(1) unsigned NOT NULL,
  `titPic` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_source` varchar(300) DEFAULT NULL,
  `bgcolor` varchar(100) DEFAULT NULL,
  `bgphoto` varchar(200) DEFAULT NULL,
  `topSpace` int(10) DEFAULT NULL,
  `bottomSpace` int(10) DEFAULT NULL,
  `cateId` int(10) DEFAULT NULL,
  `module_style` int(10) NOT NULL,
  `module_param` varchar(300) DEFAULT NULL,
  `module_content` text,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of cms_applet_module
-- ----------------------------
INSERT INTO `cms_applet_module` VALUES ('1', '6', '热销产品', '1', '', null, '#FFFFFF', '', '20', '20', '10', '1', '4|2|1|1|0', null, '0');
INSERT INTO `cms_applet_module` VALUES ('2', '6', '产品中心', '1', '', null, '#FFFFFF', '', '20', '20', '15', '1', '6|2|1|1|0', null, '1');
INSERT INTO `cms_applet_module` VALUES ('3', '6', '关于我们', '1', '', null, '#FFFFFF', '', '20', '20', '1', '3', '200|1|1|0|center', null, '1');
INSERT INTO `cms_applet_module` VALUES ('4', '6', '案例展示', '1', '', null, '#FFFFFF', '', '20', '20', '4', '1', '6|2|1|1|0', null, '1');
INSERT INTO `cms_applet_module` VALUES ('5', '6', '新闻中心', '1', '', null, '#FFFFFF', '', '20', '20', '3', '2', '4|14|1|1|28|0|0', null, '1');

-- ----------------------------
-- Table structure for `cms_applet_nav`
-- ----------------------------
DROP TABLE IF EXISTS `cms_applet_nav`;
CREATE TABLE `cms_applet_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cateId` int(10) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sortnum` (`sortnum`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_applet_nav
-- ----------------------------
INSERT INTO `cms_applet_nav` VALUES ('1', '10', '了解百沐森', '', null, '1', '1');
INSERT INTO `cms_applet_nav` VALUES ('2', '20', '产品中心', '', null, '2', '1');
INSERT INTO `cms_applet_nav` VALUES ('3', '30', '地板知识', '', null, '3', '1');
INSERT INTO `cms_applet_nav` VALUES ('4', '40', '案例展示', '', null, '4', '1');
INSERT INTO `cms_applet_nav` VALUES ('5', '50', '资讯动态', '', null, '5', '1');
INSERT INTO `cms_applet_nav` VALUES ('6', '60', '招商加盟', '', null, '6', '1');
INSERT INTO `cms_applet_nav` VALUES ('7', '70', '在线咨询', '', null, '7', '1');
INSERT INTO `cms_applet_nav` VALUES ('8', '80', '联系我们', '', null, '8', '1');

-- ----------------------------
-- Table structure for `cms_article`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章逻辑ID',
  `sortnum` int(10) DEFAULT NULL,
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `cate_id` int(11) NOT NULL DEFAULT '1' COMMENT '文章类别',
  `photo` varchar(200) DEFAULT '' COMMENT '文章图片',
  `seo_title` varchar(200) DEFAULT NULL,
  `description` text COMMENT '文章描述',
  `keyword` varchar(200) DEFAULT '' COMMENT '文章关键字',
  `website` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `intro` text,
  `content` text COMMENT '文章内容',
  `views` int(11) NOT NULL DEFAULT '1' COMMENT '浏览量',
  `status` tinyint(1) DEFAULT NULL,
  `isTop` int(1) DEFAULT '0' COMMENT '是否推荐',
  `from` varchar(16) DEFAULT '' COMMENT '来源',
  `writer` varchar(64) DEFAULT NULL COMMENT '作者',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `a_title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of cms_article
-- ----------------------------
INSERT INTO `cms_article` VALUES ('1', '10', '了解百木森', '1', '20180913/fdade4fe3a22b0f5a5eed733d68bdc0e.png', '', '', '', '', '', null, '<p><span style=\"font-size: 14px;\"><br/></span></p><p style=\"text-align:center\"></p><p><span style=\"font-size: 14px;\"><br/></span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 16px; color: rgb(192, 0, 0);\"><strong>百沐森</strong></span><span style=\"font-size: 14px;\">是上海今彩实业有限公司的pvc地板品牌。公司全系列产品均采用原生料生产，不添加任何形式的回收料；全系采用医用级别原料，保证环保，无害；百沐森全力做中国的高品质的典范地板，打造<span style=\"font-size: 16px; color: rgb(192, 0, 0);\"><strong>名族品牌</strong></span>。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px;\">产品目前有八大系列，上百个品种全部现货供应。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px;\"><br/></span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px;\"></span></p><hr/><p style=\"line-height: 2em;\"><span style=\"font-size: 14px;\"></span><br/></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px;\"></span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">八大系列分别为：</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一号初见系列，2.0mm发泡复合，</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">二号梅见系列，2.0mm密实复合，</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">三号夜樱系列，3.0mm发泡复合，</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">四号清和系列，2.0mm纯色卡通发泡复合，</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">五号浴兰系列，2.0mm通透，</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">六号蝉羽系列，2.0mm通透，</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">七号凉月系列，2.0mm通透，</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">八号月见系列，2.0mm通透，</span></p><p><br/></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一号初见系列，就如同地板名字一样，初次接触百沐森，带给您一种初见初恋般的感觉，产品颜色设计清新，淡雅，采用全新料生产的地板，有种干净通透的感觉（对着光透亮）。地板厚度2.0mm，耐磨层0.5mm，为用户打造更优质实惠的高质量产品。</span></p><p><br/></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">二号梅见系列为密室底抗压型塑胶地板。全新料生产，pvc原色的背地。所有原材料采用医用环保级别，为的就是要把真正好的产品带给中国客户。2.0mm的地板，耐磨层同样做到0.5mm，确保高人流量场所，高频使用。</span></p><p><br/></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">三号夜樱系列专为打造中国好质量产品而特别推出，柔软的发泡层，加厚的抗压层，即保证了舒适的脚感，又有保证良好的抗压性，0.7厚的耐磨层，只能用性能过剩来形容。素净的花纹，淡雅的颜色，一次体验终生难忘。</span></p><p><br/></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">四号清和系列，专为幼教系统开发的颜色。纯色满足设计师设计需求，卡通给孩子们带来新奇的感觉。全部采用全新料，零甲醛，重金属含量为零。呵护儿童健康，保护祖国的未来。</span></p><p><br/></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">五号，六号，七号，八号，为同质透心地板，同质透心地板，顾名思义，从上到下同一种材质。为保证产品良好的性能，百沐森同质透心地板石粉含量远低于同类产品，对折无痕迹，全系pur晶盾处理，抗碘酒，鞋印，鞋油。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">质量好，重环保，是百沐森人永远不变的追求。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px;\"></span><br/></p><p><br/></p>', '0', '1', '0', '', '', '1536141764', '1537251982');
INSERT INTO `cms_article` VALUES ('2', '10', 'PVC运动地板', '9', '20180906/a1ee41af7b3d57a484a76be26fb74f26.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226523', '1536226523');
INSERT INTO `cms_article` VALUES ('3', '20', 'PVC运动地板', '9', '20180906/b04bb66475f463d5e273a410d5271f6e.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226523', '1536226523');
INSERT INTO `cms_article` VALUES ('4', '30', 'PVC运动地板', '9', '20180906/c83b83dc97a4aca0656fc2c07b45a072.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226523', '1536226523');
INSERT INTO `cms_article` VALUES ('5', '40', 'PVC运动地板', '9', '20180906/4045815e4e7ab3f049728237008c682d.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226523', '1536226523');
INSERT INTO `cms_article` VALUES ('6', '50', 'PVC运动地板', '9', '20180906/33541dad2efad357f6af9dfcc9643d5b.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226523', '1536226523');
INSERT INTO `cms_article` VALUES ('7', '60', 'PVC运动地板', '9', '20180906/5acac4e195a742740a50feb97de392c2.jpg', null, null, '', null, null, null, '', '5', '-1', '0', '', null, '1536226523', '1536823966');
INSERT INTO `cms_article` VALUES ('8', '10', 'PVC复合地板', '10', '20180906/b6c681042cd4710257a8ac488ed406a0.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226563', '1536226563');
INSERT INTO `cms_article` VALUES ('9', '20', 'PVC复合地板', '10', '20180906/b316c00bb30b9630628e6563bd62275e.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226563', '1536226563');
INSERT INTO `cms_article` VALUES ('10', '30', 'PVC复合地板', '10', '20180906/8d708e2c599795cd07f3fd9a169ca43a.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226563', '1536226563');
INSERT INTO `cms_article` VALUES ('11', '40', 'PVC复合地板', '10', '20180906/b416c8491107b2eec5e3b219943b49e1.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226563', '1536226563');
INSERT INTO `cms_article` VALUES ('12', '50', 'PVC复合地板', '10', '20180906/55a2d4d189a5231c309f9c9094b769c0.jpg', null, null, '', null, null, null, '', '1', '-1', '0', '', null, '1536226563', '1536824112');
INSERT INTO `cms_article` VALUES ('13', '60', 'PVC复合地板', '10', '20180906/fea8de2780678e67369dce1d490a6dd4.jpg', '', '', '', '', '', null, '<p><img src=\"/uploads/ueditor/image/20180913/1536824058824804.png\" title=\"1536824058824804.png\" alt=\"image.png\"/><img src=\"/uploads/ueditor/image/20180913/1536823967319524.png\" title=\"1536823967319524.png\" alt=\"image.png\"/></p>', '16', '-1', '0', '', '', '1536226563', '1536825221');
INSERT INTO `cms_article` VALUES ('14', '10', 'PVC同质透心地板', '11', '20180906/bca3f2c661e18b8f64404831e572c95e.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226659', '1536226659');
INSERT INTO `cms_article` VALUES ('15', '20', 'PVC同质透心地板', '11', '20180906/60663cea6780132f85ad491929f05973.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226659', '1536226659');
INSERT INTO `cms_article` VALUES ('16', '30', 'PVC同质透心地板', '11', '20180906/7e58c1daedb9e0d132410c376151e32f.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226659', '1536226659');
INSERT INTO `cms_article` VALUES ('17', '40', 'PVC同质透心地板', '11', '20180906/2d2f176ff39460bca3f4d50ddd372bd0.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226659', '1536226659');
INSERT INTO `cms_article` VALUES ('18', '50', 'PVC同质透心地板', '11', '20180906/e0e5b574481072c3b877200ec8920e70.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226659', '1536226659');
INSERT INTO `cms_article` VALUES ('19', '60', 'PVC同质透心地板', '11', '20180906/831313d9d621aedc035cb9fa67924e28.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226659', '1536226659');
INSERT INTO `cms_article` VALUES ('20', '10', 'PVC片材复合地板', '12', '20180906/0ce1cee24b4344c52546fa6e8d03c782.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226701', '1536226701');
INSERT INTO `cms_article` VALUES ('21', '20', 'PVC片材复合地板', '12', '20180906/d2fa37d05be0936fc94c7d2deedfe84f.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226701', '1536226701');
INSERT INTO `cms_article` VALUES ('22', '30', 'PVC片材复合地板', '12', '20180906/dc10735e5ade33b662c5c6ea9d2d03e8.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226701', '1536226701');
INSERT INTO `cms_article` VALUES ('23', '40', 'PVC片材复合地板', '12', '20180906/6d29c0e6947ec6249b582d588c8b35bf.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226701', '1536226701');
INSERT INTO `cms_article` VALUES ('24', '50', 'PVC片材复合地板', '12', '20180906/a96d2eb936818e694613e8b616bf95c3.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226701', '1536226701');
INSERT INTO `cms_article` VALUES ('25', '60', 'PVC片材复合地板', '12', '20180906/deca3ce066d1203d56f0deab2bc638a8.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226701', '1536226701');
INSERT INTO `cms_article` VALUES ('26', '10', '案例展示', '4', '20180906/8b45059735c61078f48464f01cb30764.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226997', '1536226997');
INSERT INTO `cms_article` VALUES ('27', '20', '案例展示', '4', '20180906/85315479bba59d38a36f8387a9496605.jpg', null, null, '', null, null, null, '', '2', '-1', '0', '', null, '1536226997', '1536827551');
INSERT INTO `cms_article` VALUES ('28', '30', '案例展示', '4', '20180906/c6a8af6ba6e5c9d7ce36a357dd3599a9.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226997', '1536226997');
INSERT INTO `cms_article` VALUES ('29', '40', '案例展示', '4', '20180906/572b07536835dc56a9e29c08256470f6.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226997', '1536226997');
INSERT INTO `cms_article` VALUES ('30', '50', '案例展示', '4', '20180906/e204239daa0fe64ee04712fc0b0f8ff1.jpg', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536226997', '1536226997');
INSERT INTO `cms_article` VALUES ('31', '60', '案例展示', '4', '20180906/29bdb7d96b3a34a27390d7dab47f5a96.jpg', null, null, '', null, null, null, '', '1', '-1', '0', '', null, '1536226997', '1536824586');
INSERT INTO `cms_article` VALUES ('32', '10', '塑胶地板企业占领市场还需以质取胜', '13', '20180907/324b2c58aa1282af608e74a6172b1ceb.jpg', '', '', '', '', '', null, '<p><br/></p><p><br/></p><p><span style=\"font-size: 14px;\">塑胶地板<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">行业在中国发展了</span>30<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">多年以后已经逐渐被大众所接受，整个行业也日趋成熟进入全面快速的增长期，进入的门槛也越来越低，近年来大大小小的</span>塑胶地板<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">厂家和品牌像雨后春笋般出现在人们的视线中。但是这些</span>塑胶地板<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">厂家出来的产品可靠性与国际上的大品牌相比任然存在很大的差距。</span></span></p><p><span style=\"color: rgb(102, 102, 102); font-size: 14px;\"><br/></span></p><p><span style=\"color: rgb(102, 102, 102); font-size: 14px;\">众所周知，产品质量是企业的生存之本，质量的好坏直接影响到塑胶地板在市场上的竞争力。产品的质量对塑胶地板企业的整体发展起着巨大的作用，提升产品质量也成了当下塑胶地板企业发展的重中之重。</span></p>', '1', '1', '0', '', '', '1536313529', '1536822739');
INSERT INTO `cms_article` VALUES ('36', '10', 'PVC材料有哪些优点呢？', '14', '', '', '', '', '', '', null, '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">PVC材料有哪些优点呢?PVC电缆料生产厂家和大家分享。PVC材料力学性能，电性能优良，耐酸碱力极强，化学稳定性好，但软化点低. 适于制作薄板，电线电缆绝缘层，密封件等。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">PVC 管件、管材的优点抗化学性优越：UPVC 具有优良的抗酸碱性能，除接近饱和点强酸碱或强的 Oxidising agents atmaximun 外。轻便：PVC材料的比重只有铸铁的 1/10，运输，安装简易，降低成本。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">全新pvc材料</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">一、不导电：UPVC 材料不能导电，也不受电解、电流的腐蚀，因此无需二次加工。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">二、安装简易，成本低廉：切割及联接都很简易，使用 PVC 胶水联接实践证明可靠安全，操作简便，成本低廉。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">三、不能燃烧，也不助燃，没有消防顾虑。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">四、阻力小，流率高：内壁光滑，流体流动性损耗小，加以污垢不易附着在平滑管壁，保养较为简易，保养费用较低。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">五、耐用：抗候性优良，也不能被细菌及菌类所腐化。</p><p><br/></p>', '1', '1', '0', '', '', '1536314219', '1650337401');
INSERT INTO `cms_article` VALUES ('33', '20', '塑胶地板企业发展需不断完善服务体系', '13', '20180907/41ee3f5cb200f6d48a96e082a3c0ea17.jpg', '', '', '', '', '', null, '<p><br/></p><p><span style=\"color: rgb(102, 102, 102); font-family: \" microsoft=\"\" font-size:=\"\" text-indent:=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size: 14px;\"><span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">随着如今人们消费水平的提高，单纯的产品质量已经不能成为吸引消费者购买产品的优势了，产品的“服务”已经成为消费者心中权衡的重要指标，</span>塑胶地板<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">企业需要不断的完善服务体系，才能够获得消费者的认可。</span></span></p><p style=\"font-family: &#39;Microsoft YaHei&#39;;margin-top: 0px;margin-bottom: 0px;padding: 10px 0px 0px;text-indent: 2em;line-height: 25px;color: rgb(102, 102, 102);font-size: 14px;white-space: normal\"><span style=\"font-size: 14px;\">服务体系的建设分为售前和售后两方面，目前很多的塑胶地板企业更多的都局限在加强售中与售后的服务体系方面而忽略了售前服务的重要性，事实上售前服务是地板企业在市场抢占先机的重要环节万万忽视。</span></p><p style=\"font-family: &#39;Microsoft YaHei&#39;;margin-top: 0px;margin-bottom: 0px;padding: 10px 0px 0px;text-indent: 28px;line-height: 25px;color: rgb(102, 102, 102);font-size: 14px;white-space: normal\"><span style=\"font-size: 14px;\">塑胶地板企业通过做好市场调查，及时掌握产品变动信息；介绍产品知识，组织新产品展销等方面不断完善售前服务体系。除此之外还要更多的了解消费者和竞争对手的情况，权衡各方面的因素制定出适当的促销策略提高产品销售。</span></p><p><span style=\"color: rgb(102, 102, 102); font-size: 14px;\"><br/></span><br/></p>', '0', '1', '0', '', '', '1536313597', '1536314001');
INSERT INTO `cms_article` VALUES ('34', '30', 'PVC地板企业成开创地板电商先锋', '13', '20180907/616f9b7da81bb5d5d5b4809052866a6a.jpg', '', '', '', '', '', null, '<p><br/></p><p><span style=\"color: rgb(102, 102, 102); font-family: \" microsoft=\"\" font-size:=\"\" text-indent:=\"\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size: 14px;\"><span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">随着我国</span>PVC<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">地板行业在国内的的迅猛发展，国内消费市场中，</span>PVC<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">地板需求量越来越大。其根本原因在于人们在生活水平提高后对健康生活的追求，这种可持续观念的影响，促进了整个行业的快速发展。</span></span></p><p><span style=\"color: rgb(102, 102, 102); font-size: 14px;\"><br/></span></p><p><span style=\"color: rgb(102, 102, 102); font-size: 14px;\">然而，当下国内<span style=\"color: rgb(102, 102, 102); font-size: 14px; margin: 0px; padding: 0px;\">PVC</span>地板的销售渠道，大多还停留在传统的营销模式中。对于塑胶地板企业来说要想与时俱进，并成为行业领军者，就必须借助科技力量，顺应电子商务发展的大势是企业迅速的发展壮大。</span></p><p><span style=\"color: rgb(102, 102, 102); font-size: 14px;\"><br/></span></p><p><span style=\"color: rgb(102, 102, 102); font-size: 14px;\">目前很多PVC地板企业尝试单独建设一个网站，但是这种模式消耗成本非常大，后期的的维护更是需要消耗很多的人力物力以及财力。对于这些中小企业而言，选择一个用最少的投资和最合理的方式，收获效益与节约成本的发展模式才是正确的选择。</span></p>', '1', '1', '0', '', '', '1536313685', '1536995866');
INSERT INTO `cms_article` VALUES ('37', '20', 'PVC施工工艺', '14', '', '', '', '', '', '', null, '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">1、PVC雕刻板欧美称之为雪浮板，具有质地坚硬、质量轻、不变形，无污染、耐腐蚀耐酸碱等。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">2、优良品质，是市场上一种十分优质的新型装饰材料，也是最理想的工艺 装饰雕刻材料。/p&gt;</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">3、利用PVC雕刻板的优良品质，根据雪浮板的物理性能特点，雕刻时要求 走道刀速适中，雕刻后将刀口残屑打磨光滑。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">4、雕刻时为准确地、生动地达到设计效果，雕刻前需制作雕刻电子文件或 电脑放样等造型辅助工作。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px 10px; list-style: none; width: 800px; font-size: 14px; color: rgb(51, 51, 51); line-height: 20px; font-family: 微软雅黑; white-space: normal;\">5、PVC雕刻板烤漆加工时，需采用低温慢烤工艺（小于90摄氏度），防止温度太高变形</p><p><br/></p>', '1', '1', '0', '', '', '1536314238', '1650337404');
INSERT INTO `cms_article` VALUES ('35', '40', 'PVC地板市场行情分析', '13', '20180907/7155ba94592149ad1dc1694b29400540.jpg', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-size: 14px;\"><span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">从上世纪</span>80<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">年代第一款</span><span style=\"margin: 0px; padding: 0px;\">pvc</span>塑胶<span style=\"margin: 0px; padding: 0px;\">地板</span><span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">进入国内市场以来，一直到</span>2000<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">年整个行业处于摸索和初级阶段，进入</span>21<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">世纪</span>PVC<span style=\"margin: 0px; padding: 0px;\">地板</span><span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">行业有了初步发展，在</span>04<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">年到</span>07<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">年这段时间</span>pvc<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">塑胶运动地板和商用地板逐渐得到了业界的认可，越来越多的体育场馆、比赛场地已经商场办公楼开始选用专业的</span>PVC<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">地板，越来越多的建筑工程也也开始选用</span>PVC<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">商用地板。随着</span>2008<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">奥运会的举办，以及整个市场对</span><span style=\"margin: 0px; padding: 0px;\">PVC</span>塑胶地板<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">的认同。</span>PVC<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">地板行业进入了快速的发展期。预计未来</span>5—10<span style=\"color: rgb(102, 102, 102);\" microsoft=\"\" font-size:=\"\" text-indent:=\"\">年必将进入另一个高速发展期。</span></span></p><p><span style=\"color: rgb(102, 102, 102); font-family: \" microsoft=\"\" font-size:=\"\" text-indent:=\"\"><br/></span></p><p><span style=\"color: rgb(102, 102, 102); font-family: \" microsoft=\"\" font-size:=\"\" text-indent:=\"\"></span></p><p style=\"font-family: &#39;Microsoft YaHei&#39;;margin-top: 0px;margin-bottom: 0px;padding: 10px 0px 0px;text-indent: 2em;line-height: 25px;color: rgb(102, 102, 102);font-size: 14px;white-space: normal\">近几年建筑业是我国国民经济的支柱产业之一，国家将在城市建住宅面积<span style=\";padding: 0px\">33.5</span>亿平方米，在城镇建住宅面积<span style=\";padding: 0px\">50</span>亿平方米，公共建筑约<span style=\";padding: 0px\">10</span>亿平方米，如果<span style=\";padding: 0px\">PVC</span>地板能够在市场上占<span style=\";padding: 0px\">1/3</span>比例，那么这将是一个巨大的市场。有力带动<span style=\";padding: 0px\">PVC</span>塑胶地板行业发展。</p><p style=\"font-family: &#39;Microsoft YaHei&#39;;margin-top: 0px;margin-bottom: 0px;padding: 10px 0px 0px;text-indent: 2em;line-height: 25px;color: rgb(102, 102, 102);font-size: 14px;white-space: normal\"><span style=\";padding: 0px\">PVC</span>弹性塑胶地板是目前世界建材行业中最新颖的高科技铺地材料。现在在国外装饰工程中普遍采用。自<span style=\";padding: 0px\">80</span>年代进入国内市场得到大力推广，现在国内的一线城市在商业<span style=\";padding: 0px\">(</span>办公楼、商场、机场、<span style=\";padding: 0px\">)</span>，教育<span style=\";padding: 0px\">(</span>学校、图书馆、体育馆<span style=\";padding: 0px\">)</span>，医药<span style=\";padding: 0px\">(</span>制药厂、医院<span style=\";padding: 0px\">)</span>，工厂等行业也已经开始的广泛使用，且取得满意的效果，使用量日渐增大。</p><p><span style=\"color: rgb(102, 102, 102); font-family: \" microsoft=\"\" font-size:=\"\" text-indent:=\"\"><br/></span><br/></p>', '1', '1', '0', '', '', '1536313792', '1537005749');
INSERT INTO `cms_article` VALUES ('38', '30', '悬浮运动地板的特性优点', '14', '', '', '', '', '', '', null, '<p>悬浮拼装地板主要采用环保材料聚丙烯(PP)，无毒、无味、不寄生细菌、绿色环保，PP材料属食品级材料，安全卫生。悬浮拼装地板所用原料聚丙稀(PP)为高强度材料，采用具有抗紫外线辐射、抗氧化、抗寒等原材料的改性聚丙稀，使该产品具有耐压、耐冲击、耐高低温、使用寿命长等优点。</p><p>　　悬浮拼装地板特有的专利设计(底部676/898跟支撑柱支撑，拱形排水槽，边缘采用公扣母扣衔接)很好地实现垂直吸震及能量回送，侧向缓冲，防滑，防运动损伤，有效保护运动者的运动安全。</p><p>　　悬浮拼装地板最新耐磨层设计，令鞋底时刻紧着地面，防滑且能随心所欲传递强劲的运动动力。地板表层经特殊处理，与灯光亮度吻合，不吸光和反光刺眼，能更好的保护运动员眼睛，不易产生疲劳。低热反射、不吸汗、无湿气、不产生滞留气味。</p><p>　　悬浮拼装地板目前在同类产品当中性价比最高，使用该产品投资少(基本不需要重新做基础)、维护成本低、档次高、见效快(铺装画线完成即可使用)，是各类运动场地铺设的最佳选择。初始建设费用+零维护费(只需用清水冲洗即可，没有任何负面作用。)，使用寿命长达10年，不褪色不变形。场地划线用漆使用聚丙稀面层专用漆，不脱落。</p><p><br/></p>', '1', '1', '0', '', '', '1536314280', '1650337406');
INSERT INTO `cms_article` VALUES ('39', '40', '悬浮地板应该如何保养？您知道吗？', '14', '', '', '', '', '', '', null, '<p>　对于悬浮拼装地板，很多人因其优越的耐用性，所以在室外都是选用悬浮拼装地板来铺造球场。现在篮球、网球、排球、羽毛球、乒乓球、室内足球场等等运动场都可常见到悬浮拼装地板。但很多人对悬浮拼装地板并不了解，误认为既然能在室外使用的话并不需要过多的保养。其实再好的地板不进行日常的保养也会加速老化，甚至直接损坏。悬浮拼装地板正确的保养方法是怎样呢?</p><p>　　悬浮拼装地板如何保养：</p><p>　　1、勿穿钉运动鞋和高跟鞋</p><p>　　尖锐的物品对拼装悬浮拼装地板场地运动是有严重的损害的，因为悬浮拼装地板的原料是PP，这是归纳到塑料一类的。尖锐的物品对塑料必然有刮损的现象出现，长期受损甚至会使地板直接报销。所以切勿穿有钉运动鞋进入悬浮运动地板场地，因此以免损伤地板。</p><p>　　2、雪后及时清理积雪</p><p>　　虽然悬浮运动地板有很好的气候抗压性，不怕日晒高温、雨淋潮湿、冰雪严寒、永不翘曲剥落变形。但是在大雪花不及时清除地板间隙的积雪的话，积雪融化会使地板的温度低于地面温度，长期处于过低的温度下会对悬浮拼装地板板的使用寿命有多影响的。</p><p>　　3、常用水冲洗以保持清洁</p><p>　　日常的清洗只需用清水冲洗即可。因为集网孔排列的设计，使水与砂尘能够毫无阻碍的泄漏到地板面层的下面，通过下面支脚之间的空隙而排到场地的外面的水槽中。这样就可以保持地板的清洁。</p><p>　　4、勿将盐酸、硫酸等腐蚀性液体泼洒地板上</p><p>　　悬浮地板也是塑料运动地板的一种，和其他塑料运动地板一样，盐酸、硫酸等腐蚀性液体对其会有腐蚀的作用，因此在清洁地板的时候切记不能使用腐蚀性液体。若遇到顽固的污迹，用中性的清洁液清洗即可。</p><p><br/></p>', '1', '1', '0', '', '', '1536314300', '1650337407');
INSERT INTO `cms_article` VALUES ('40', '70', '单车房', '4', '20180913/d5c57e8113cf692687923c837e256be3.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001467717555.jpg\" title=\"1537001467717555.jpg\" alt=\"03-1.jpg\"/></p>', '0', '1', '1', '', '', '1536828513', '1537001469');
INSERT INTO `cms_article` VALUES ('41', '80', '展览馆', '4', '20180913/8474f366f792ac97fede30b718bc5735.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001441360464.jpg\" style=\"\" title=\"1537001441360464.jpg\"/></p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001441517197.jpg\" style=\"\" title=\"1537001441517197.jpg\"/></p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001441463022.jpg\" style=\"\" title=\"1537001441463022.jpg\"/></p><p><br/></p>', '0', '1', '1', '', '', '1536828513', '1537001453');
INSERT INTO `cms_article` VALUES ('42', '90', '办公室', '4', '20180913/371a3adc154cbcb1ce7db61fb3c2c48c.jpg', '', '', '', '', '', null, '<p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001396606004.jpg\" style=\"\" title=\"1537001396606004.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001396403373.jpg\" style=\"\" title=\"1537001396403373.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001396720488.jpg\" style=\"\" title=\"1537001396720488.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001397652799.jpg\" style=\"\" title=\"1537001397652799.jpg\"/></p><p><br/></p>', '0', '1', '1', '', '', '1536828513', '1537001415');
INSERT INTO `cms_article` VALUES ('43', '100', '电影院', '4', '20180913/22ac19dfe2f34fa2ae580d806fa7412a.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001372949937.jpg\" title=\"1537001372949937.jpg\" alt=\"04-1.jpg\"/></p>', '0', '1', '1', '', '', '1536828513', '1537001377');
INSERT INTO `cms_article` VALUES ('44', '110', '会议室', '4', '20180913/08d9eb8c2ca4a14f133cd85611ad575c.jpg', '', '', '', '', '', null, '<p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001357924862.jpg\" title=\"1537001357924862.jpg\" alt=\"05-1.jpg\"/></p>', '0', '1', '0', '', '', '1536828513', '1537001359');
INSERT INTO `cms_article` VALUES ('45', '120', '交通厅', '4', '20180913/4146a3a7664b60f7bfdc48263dbd44ac.jpg', '', '', '', '', '', null, '<p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001330911105.jpg\" style=\"\" title=\"1537001330911105.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001330809375.jpg\" style=\"\" title=\"1537001330809375.jpg\"/></p><p><br/></p>', '0', '1', '0', '', '', '1536828513', '1537001342');
INSERT INTO `cms_article` VALUES ('46', '130', '阶梯教室', '4', '20180913/8453ddb61a182362b173b9caffc231ec.jpg', '', '', '', '', '', null, '<p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001290458604.jpg\" title=\"1537001290458604.jpg\" alt=\"08-1.jpg\"/></p>', '0', '1', '0', '', '', '1536828513', '1537001295');
INSERT INTO `cms_article` VALUES ('47', '140', '楼梯', '4', '20180913/27b2aadec96318c7376d925f5cedddfd.jpg', '', '', '', '', '', null, '<p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001267277471.jpg\" style=\"\" title=\"1537001267277471.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001267294306.jpg\" style=\"\" title=\"1537001267294306.jpg\"/></p><p style=\"text-align: center;\"><br/></p>', '0', '1', '0', '', '', '1536828514', '1537001274');
INSERT INTO `cms_article` VALUES ('48', '150', '商场', '4', '20180913/360b4ef7e61a3ef53d82a84307fe708a.jpg', '', '', '', '', '', null, '<p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001227250762.jpg\" style=\"\" title=\"1537001227250762.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001227310282.jpg\" style=\"\" title=\"1537001227310282.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001227398288.jpg\" style=\"\" title=\"1537001227398288.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001228767765.jpg\" style=\"\" title=\"1537001228767765.jpg\"/></p><p><br/></p>', '0', '1', '1', '', '', '1536828514', '1537001244');
INSERT INTO `cms_article` VALUES ('49', '160', '健身房', '4', '20180913/3ceb2dacaddc7d8b9521b6eb955459dc.jpg', '', '', '', '', '', null, '<p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170916285.jpg\" style=\"\" title=\"1537001170916285.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170407809.jpg\" style=\"\" title=\"1537001170407809.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170896239.jpg\" style=\"\" title=\"1537001170896239.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170578452.jpg\" style=\"\" title=\"1537001170578452.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170655132.jpg\" style=\"\" title=\"1537001170655132.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170394415.jpg\" style=\"\" title=\"1537001170394415.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170890145.jpg\" style=\"\" title=\"1537001170890145.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170642830.jpg\" style=\"\" title=\"1537001170642830.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001170363898.jpg\" style=\"\" title=\"1537001170363898.jpg\"/></p><p><br/></p>', '1', '1', '1', '', '', '1536828514', '1537404349');
INSERT INTO `cms_article` VALUES ('50', '170', '手术室', '4', '20180913/6bd78d5601c2d0c410a357a2005c5217.jpg', '', '', '', '', '', null, '<p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001108914122.jpg\" style=\"\" title=\"1537001108914122.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001108369060.jpg\" style=\"\" title=\"1537001108369060.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001108994320.jpg\" style=\"\" title=\"1537001108994320.jpg\"/></p><p style=\"text-align: center;\"><br/></p>', '0', '1', '1', '', '', '1536828514', '1537001121');
INSERT INTO `cms_article` VALUES ('51', '180', '舞蹈房', '4', '20180913/e4459dbb5a881b68b087afa7468c3c3b.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001064132781.jpg\" style=\"\" title=\"1537001064132781.jpg\"/></p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001064546967.jpg\" style=\"\" title=\"1537001064546967.jpg\"/></p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001064916192.jpg\" style=\"\" title=\"1537001064916192.jpg\"/></p><p><br/></p><p><br/></p>', '0', '1', '1', '', '', '1536828514', '1537001084');
INSERT INTO `cms_article` VALUES ('52', '190', '医院', '4', '20180913/fc46904900b1c6bd4f97abe262600730.jpg', '', '', '', '', '', null, '<p style=\"text-align: center\"><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937706922.jpg\" style=\"\" title=\"1537000937706922.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937631230.jpg\" style=\"\" title=\"1537000937631230.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937152734.jpg\" style=\"\" title=\"1537000937152734.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937531442.jpg\" style=\"\" title=\"1537000937531442.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937865357.jpg\" style=\"\" title=\"1537000937865357.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937571653.jpg\" style=\"\" title=\"1537000937571653.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937838648.jpg\" style=\"\" title=\"1537000937838648.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937121199.jpg\" style=\"\" title=\"1537000937121199.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937493955.jpg\" style=\"\" title=\"1537000937493955.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537000937180184.jpg\" style=\"\" title=\"1537000937180184.jpg\"/></p><p><br/></p><p><br/></p>', '0', '1', '0', '', '', '1536828514', '1537001032');
INSERT INTO `cms_article` VALUES ('53', '200', '幼儿园', '4', '20180913/cddd938fe911d4e846f62b939aba91bd.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459113382.jpg\" style=\"\" title=\"1537000459113382.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园走廊</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459309318.jpg\" style=\"\" title=\"1537000459309318.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅<br/></p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459955652.jpg\" style=\"\" title=\"1537000459955652.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459955508.jpg\" style=\"\" title=\"1537000459955508.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459852354.jpg\" style=\"\" title=\"1537000459852354.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459973274.jpg\" style=\"\" title=\"1537000459973274.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459367881.jpg\" style=\"\" title=\"1537000459367881.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459929395.jpg\" style=\"\" title=\"1537000459929395.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459625151.jpg\" style=\"\" title=\"1537000459625151.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园大厅</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459111680.jpg\" style=\"\" title=\"1537000459111680.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园活动区</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459167249.jpg\" style=\"\" title=\"1537000459167249.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园室内</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459920625.jpg\" style=\"\" title=\"1537000459920625.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园楼梯</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459737003.jpg\" style=\"\" title=\"1537000459737003.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园读书室</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459485053.jpg\" style=\"\" title=\"1537000459485053.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园教室</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459328379.jpg\" style=\"\" title=\"1537000459328379.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园读书室</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459832708.jpg\" style=\"\" title=\"1537000459832708.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园走廊</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459143369.jpg\" style=\"\" title=\"1537000459143369.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园楼梯</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459276693.jpg\" style=\"\" title=\"1537000459276693.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园走廊</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459513926.jpg\" style=\"\" title=\"1537000459513926.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园走廊</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537000459941769.jpg\" style=\"\" title=\"1537000459941769.jpg\"/></p><p><br/></p><p style=\"text-align: center;\">幼儿园走廊</p><p><br/></p>', '1', '1', '0', '', '', '1536828514', '1537000834');
INSERT INTO `cms_article` VALUES ('54', '210', '瑜伽房', '4', '20180913/b6aeb4df5010b4e2eb64d47d01f5822f.jpg', '', '', '', '', '', null, '<p><br/></p><p><img src=\"/uploads/ueditor/image/20180915/1537000393688703.jpg\" style=\"\" title=\"1537000393688703.jpg\"/></p><p><br/></p><p><img src=\"http://1536977751.cfjzb.ahcfwl.com/uploads/ueditor/image/20180915/1537000393240480.jpg\" title=\"1537000393240480.jpg\" style=\"white-space: normal;\"/></p><p><br/></p>', '1', '1', '0', '', '', '1536828514', '1537000830');
INSERT INTO `cms_article` VALUES ('55', '220', '展厅', '4', '20180913/2682989b90b044b6f261dc8aca93dd32.jpg', '', '', '', '', '', null, '<p><img src=\"/uploads/ueditor/image/20180915/1537000357690274.jpg\" style=\"\" title=\"1537000357690274.jpg\"/></p><p><br/></p><p><img src=\"/uploads/ueditor/image/20180915/1537000357683484.jpg\" style=\"\" title=\"1537000357683484.jpg\"/></p><p><br/></p>', '5', '1', '0', '', '', '1536828514', '1537017019');
INSERT INTO `cms_article` VALUES ('56', '10', 'PVC地板 节能材料 ', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 国家大力倡导推广在建筑上使用节能材料，特别强调建筑屋面、墙体、门窗等，但很少谈到地面。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">其实地面在建筑空间节能环节中占有重要的位置，在谈建筑节能不能不讲地面节能。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; 传统材料中，石材、瓷砖的热传递很快，木材、复合地板、地毯的密封性能不好，热量的穿透性很强。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">对于建筑，夏天室内降温，要求地面与墙体及屋顶都能隔离室内的低温与室外、地面的高温。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">相反冬天室内升温，要求地面与墙体及屋顶都能隔离室内的高温与室外、地面的低温。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">因此，地面的温度隔离性能是考虑建筑节能方面不可确少的。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; PVC地板其材质为高分子聚乙烯，与我们生活中经常接触的食品包装袋同质，</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">普通规格的厚度在1．5㎜至4．0㎜，铺上PVC地板，就象一层很厚的密封聚乙烯膜铺在地上，</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">隔离室内与地面的热对流起很大的作用。其作用不亚于墙面。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; 因此，我国在考虑建筑节能及大力推广节能材料时，要完整地考虑热效应，</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">绝不能忽视地面材料的节能贡献。在欧美发达国家早就把使用pvc地板作为建筑节能材料，</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">随着我们对建筑节能的深入认识，一定会把PVC地板作为重要的建筑节能材料使用。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><br/></p>', '1', '1', '0', '', '', '1536829135', '1536829259');
INSERT INTO `cms_article` VALUES ('57', '20', 'PVC卷材地板国家标准', '3', '', '', '', '', '', '', null, '<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\"><br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">PVC卷材地板的国家标准号：GB /T 1 1982-2005《聚氯乙烯卷材地板》分为两个部分：其中第1部分带基材的聚氯乙烯卷材地板， 第2部分有基材有背涂层聚氯乙烯卷材地板，我们这里主要说的是GB/T 11982的第1部分。这部分与EN 651:1996《弹性地板带发泡层的聚氯乙烯地板技术要求》的一致性程度为非等效，主要差异如下：</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">1、EN651:1996包括卷材地板和块状地板，本部分只适用于卷材地板；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2、这部分与EN 651:1996对产品的分级不同；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3、这部分对卷材地板有外观质量的要求，EN 651:1996则没有；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4、采用的耐磨性试验方法不同；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5、增加了有害物质限量的项目。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6、这部分代替GB/T 11982.1 -1989((聚氯乙烯卷材地板第1部分带基材的聚氯乙烯卷材地板》。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7、这部分与GB/T 11982.1-1989相比主要变化如下：</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">8、根据产品的使用场所，按耐磨性分为家用通用型、家用耐用型、商用通用型、商用耐用型；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">9、取消了优等品、一等品、合格品的分级；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">10、根据产品是否有发泡层，采用不同的测厚仪测量厚度；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">11、修改了加热翘曲的试验方法；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">12、修改了剥离强度的试验方法；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">13、修改了耐磨性的试验方法；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">14、增加了有害物质限量的要求。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">这部分标准由中国建筑材料工业协会提出。由全国轻质与装饰装修建筑材料标准化技术委员会（CSBTS/TC195）归口。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">负责起草单位：上海市建筑科学研究院。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">参与起草单位：沈阳鸿翔塑胶制造有限公司、LG化学（中国）、得嘉亚洲有限公司、上海汇丽建材股份有限公司。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">主要起草人：赵敏、傅徽、王静。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">这部分于1989年12月首次发布，本次为第一次修订。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">1 范围</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">GB /T 1 1982的本部分规定了带基材的聚氯乙烯卷材地板（以下简称卷材地板）的术语和定义、分类和标记、要求、试验方法、检验规则、标志、包装、运输和贮存。适用于以聚氯乙烯树脂为主要原料，并加人适当助剂，在片状连续基材上，经涂敷工艺生产的卷材地板。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2 规范性引用文件</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">文件中的条款通过GB/T 11982的本部分的引用而成为本部分的条款。凡是注日期的引用文件，其随后所有的修改单（不包括勘误的内容）或修订版均不适用于本部分，然而，鼓励根据本部分达成协议的各方研究是否可使用这些文件的最新版本。凡是不注日期的引用文件，其最新版本适用于本部分。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">GB 2 50 -1995 评定变色用灰色样卡（idtI SO 105/A02:1993,T extiles-Testsf orc olourf astness-Part A02:Grey scale for assessing change in colour)</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">GB 7 30- 1998 纺织品色牢度试验耐光和耐气候色牢度蓝色羊毛标准（eqvI SO 105-B:1994)</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">GB /T 8 427-1998 纺织品色牢度试验耐人造光色牢度：氛弧（eqvI SO 105-1302:1994)</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">GB /T 18102-2000 浸渍纸层压木制地板</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">GB 1 858 6 室内装饰装修材料聚氯乙烯卷材地板中有害物质限量</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3 术语和定义</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">带基材的卷材地板floors heetsw ithb acking</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">带有基材、中间层和表面耐磨层的多层片状地面或楼面铺设材料。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4 分类和标记</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.1 分类</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.1.1 按中间层的结构分类</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">a）带基材的发泡聚氯乙烯卷材地板，代号为FB;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">b）带基材的致密聚氯乙烯卷材地板，代号为CBo</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.1.2 按耐磨性分级</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">a）通用型，代号为G;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">b） 耐用型，代号为Ha</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.2 标记</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">卷材地板标记顺序为：产品名称、结构分类、耐磨性级别、总厚度、宽度和长度、标准号。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">示例：总厚度1.5mm，宽度2000mm，长度15m 的通用型发泡卷材地板表示为：聚氯乙烯卷材地板FB-G1.5 X</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2000X15-GB/T 11982.1—20050</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5 要求</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5. 1 外观</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">外观应符合下面的规定。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">不允许表面有裂纹、断裂、分层，允许轻微的折皱、气泡，漏印、缺膜，套印偏差、色差、污染不明显，允许轻微图案变形。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5.2 尺寸允许偏差</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">尺寸允许偏差应下面的规定。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">长度、宽度不小于公称长度，厚度单个值正负0.20mm，平均值正0.18，负0.15mm。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5.3 物理性能</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">物理性能应符合下面的规定。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">单位面积质量公称值正13%负10%，纵横向加热尺寸变化小于等于0.40%，加热翘曲小于等于8mm，色牢度大于等于3级，纵横向抗剥离力平均值大于等于50N/50mm，单个值大于等于40N/50mm，残余凹陷通用型小于等于0.35mm，耐用型小于等于0.20mm，耐磨性通用型大于等于1500转，耐用型大于等于5000转。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5.4 有害物质限</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">有害物质限量应符合GB1 8586规定。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6 试验方法</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6. 1 状态调节及试验条件</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">样品试验前必须在温度23℃士20C ，相对湿度50％士10i0的标准条件下至少放置24h 并在此条件下进行试验。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.2 外观</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">在散射日光或日光灯下，光照度为100l x士201 x，将被测的卷材地板平铺，距离试样100cm，斜向目测检查外观，记录表1所列各种缺陷的存在情况。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.3 长度</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">将被测的整卷卷材地板耐磨层向上，在没有拉应力的情况下平铺在坚硬的平面上，用分度值为1 cm的钢卷尺测量距两边约200 mm处平行于纵向的两处长度，取两个长度测量值的算术平均值表示卷材地板的长度，精确至0.05 m 。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.4 宽度</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">按 6. 3 的方法，用分度值为lm m的钢卷尺测量中间和两端垂直于纵向的宽度，取最小的宽度表示卷材地板的宽度，精确至5 mm。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.5 总厚度</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.5．1 仪器</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">测厚仪应符合下面要求，分度值为0.01mm。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">平测头直径6.00正负0.30mm，提供平测头施压的总质量带基材的发泡聚氯乙烯卷材地板85正负3g，带基材的致密聚氯乙烯卷材地板28正负1g。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.5.2 试验步骤</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">从 同 一 卷卷材地板的两端或从两卷卷材地板的开始部分各取一个长度至少100m m，宽度为整个卷材地板宽度的试件。用百分表测厚仪测量每个试件的厚度，测量点距试件边缘应至少10 mm，每个试件应至少测10点。如有凹凸花纹时，测其凸出部位的厚度。分别记录并计算每个厚度测量值及所有</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">测量值的算术平均值与公称厚度值的偏差，精确至0.0 1m md</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.6 单位面积质且</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">从 卷 材 地板上切取五个10m mx 10m m的试件，测量每块试件的尺寸，精确至0.01 m m，然后称取每个试件的质量，精确至0.01g。计算五个试件的单位面积质量的算术平均值与公称单位面积质量值的偏差，以百分数表示，精确至1%。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.7 加热尺寸变化率</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.7.1 取样</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">切 取 试 件前，应将卷材地板尽可能铺平，并标好方向。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">在 卷 材 地板上等间距取三个边长约250m m的正方形试件，试件的任意一边应距卷材地板边缘至少100 mm，每个试件的各边应平行或垂直于生产方向。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.7.2 试验步骤</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">按 图 1 所示沿试件的纵向和横向距试件边缘约25m m处，各画两条间距为200m m的平行线，并标记四个交点，用游标卡尺分别测量出纵向和横向两条直线交点间的距离，精确至0. 02 mm。然后将试件耐磨层向上，平放在撒有滑石粉的磨光玻璃平板或不锈钢平板上，试件间应相距50 mm以上，一起放入温度为80℃土2℃的恒温鼓风烘箱内，平板与烘箱的垂直壁的间距应不小于50 mm，平板之间以及与烘箱间的垂直间距应不小于100 mm。保持6h后取出，在标准条件中放置24 h，再测量每个试件纵GB/T 11982.1-2005向和横向两条直线交点间的距离，精确至0.02 mm，测量时应用一块180mmX 1 80mmX 1 3mm的平钢板压在试件上面。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.7.3 结果计算</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">试件 纵 向 或横向加热尺寸变化率均按式（1)计算。分别计算纵向和横向加热尺寸变化率的算术平均值，精确至0.01%。式 中 ：</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">EH — 尺寸变化率，％；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">Lo — 加热前的距离，MM;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">L— 加 热后的距离，mm.</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">单 位 为 毫米</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.8 加热翘曲</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.8.1 取样</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">同 6. 7. 1。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.8.2 试验步骤</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">按 6. 5 测量卷材地板的平均厚度，然后将每个试件耐磨层向上，平放在撒有滑石粉的磨光玻璃平板或不锈钢平板上，试件间相距50 mm以上，一起放入温度为80℃士2℃的鼓风烘箱内，平板与烘箱的垂直壁的间距应不小于50 mm，平板之间以及与烘箱间的垂直间距应不小于100 mm。保持6h后，将放有试件的平板取出，不要移动试件，在标准条件下放置24 h，用高度游标卡尺测量试件各边的上表面到平板之间的最大距离（通常在角上），减去卷材地板的平均厚度，用三个试件共12个数据的算术平均值表示加热翘曲，精确至1 mm。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.9 色牢度</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">按 G B/ T 8427-1998规定进行，取三个试件。将两个试件与GB 730-1998规定的6级蓝色羊毛标准一起放人试验箱接受氮灯曝晒，另一个试件遮光保存。试验箱内黑板温度为45℃士5 0C，相对湿度为50％士10%a曝晒至6级蓝色羊毛标准的变色达到GB 250-1995规定的灰色样卡3级的色差时，终止试验。用GB 250-1995规定的灰色样卡评定试件变色等级，用两个试件中较差的等级表示色牢度。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6. 10 抗剥离力</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.10.1 取样</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">在 卷材 地 板上等间距取六个至少长150m m，宽为50m m上1m m的试件，纵向、横向各取三个，试件的任意一边应距卷材地板边缘至少100 mm。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.10.2 试验步骤</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">将 试件 直 立的浸人乙酸乙醋中，浸入深度不大于40m m,4 5m in后取出试件，用手剥开浸入溶剂部分的基材。将试件在60℃的鼓风烘箱中放置2h，以使溶剂充分挥发。在标准条件下调节24 h后试验，以100 mm/min士5 mm/min的拉伸速度进行剥离，记录试件被剥离的最大负荷，分别计算纵向和横向试件的算术平均值，精确到0. 01 N/50 mm。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6. 11 残余凹陷</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.11.1 仪器</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">凹 陷试 验 机，机上装有接触面平坦、直径为11.3 m m的钢柱压头，其边缘为半径0.1 5m m的圆角，能施加500 N士0. 5 N的负荷。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6. 11.2 取样</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">从 卷材 地 板上取三个尺寸为60m mX 6 0m m的试件。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6. 11.3 试验步骤</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">试件 在 标 准条件下放置1h以后，用6.5.1规定的测厚仪测量试件厚度，并标记测量点。将试件耐磨层向上置于凹陷试验机的工作平台上，在标记的测量点上均匀地加载500 N士0.5N,2s内开始计时，保持150 min，然后去掉所有负荷，150 min后测量标记的测量点的厚度，精确至0. 01 mm。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6. 11.4 结果计算</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">残 余 凹 陷按式（2)计算，用三个试件试验结果的算术平均值表示。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">D ＝ t 。一 t ·· ，·· ·· ··· ·· ··· ·· ··· 一 （ 2 ）</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">式 中 ：</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">D— 残 余凹陷，mm;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">to— 加 负荷前试件厚度，mm;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">t— 除 去 负 荷150m in后厚度，mmo</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.12 耐磨性</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">按 GB /T 18102-2000中6.3.11的规定取两个试件进行试验，用两个试件中较低的转数表示耐磨性。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6. 13 有害物质限R</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">按 GB 1 8586规定进行。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7 检验规则</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7. 1 检验分类</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">检 验 分 为出厂检验和型式检验两类。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.1.1 出厂检验</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">出厂 检 验 项目为5.1 ,5.2 和5.3 中单位面积质量、加热尺寸变化率、残余凹陷、耐磨性。其中5.1和5. 2为逐批进行检验。5. 3中单位面积质量、加热尺寸变化率、残余凹陷、耐磨性按检验批进行检验，相同配方、相同工艺、相同规格的四个连续批为一个检验批。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7. 1.2 型式检验</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">型 式 检 验项目为第5章所列的全部检验项目。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">有下 列 情 况之一，应进行型式检验。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">a) 新 产 品或老产品转厂生产的试制定型鉴定；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">GBJT 11982. 1-2005</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">b) 正 常生产时，每年进行一次；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">c） 正 式生产后，如材料、工艺有较大改变，可能影响产品性能时；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">d) 产 品 停产半年以上，恢复生产时；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">e) 出 厂检验结果与上次型式检验有较大差异时；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">f) 国家 质量监督机构提出进行型式检验的要求时。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.2 组批与取样</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.2.1 组批</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">检 验 以 批为单位，以相同配方、相同工艺、相同规格的卷材地板为一批，每批数量为50 00m Z，数量不足5 000 m,也作为一批，生产量小于5 000 ntz的以五天产量为一批计。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.2.2 取样</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">每 批 中 随机抽取三卷进行检验。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.3 判定规则</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.3.1 外观与尺寸</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">卷 材 地 板的外观和尺寸进行评定时，每卷都应符合5.1和5.2 的规定。若有任一项不合格，则从该批中再取六卷地板，对不合格项目进行复验，若仍不合格，则判该批产品不合格。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.3.2 物理性能</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">卷 材 地 板物理性能的评定应在按7.3.1评定合格的卷材地板中随机抽取一卷进行检验。若所有结果符合5.3规定，则判该批产品合格；若有任一项不合格，则从该批中重新取双倍试样对不合格项目进行复验，若仍不合格，则判该批产品不合格。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.3.3 有害物质限且</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">有 害 物 质限量中有任一项不合格，则判该批产品不合格。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">8 标志、包装、运输和贮存</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">8．1 标志</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">在 每 卷 包装的明显处应含有下列内容：</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">a) 标 准号；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">b） 名 称及商标；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">c） 标 记；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">d） 生 产日期或批号；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">e) 质 量；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">f) 宽 度 、厚度和长度；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">g) 生 产 单位的名称、地址。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">8．2 包装</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">卷 材 地 板耐磨层向外卷在管芯上，应进行外包装。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">8.3 运输</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">卷 材 地 板在运输过程中，不得受到冲击、日晒、雨淋。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">8.4 贮存</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">卷 材 地 板应分批直立贮存在温度为40℃ 以下的仓库内。距热源1m 以外。室内空气应流通、</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">干燥。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829265', '1536829337');
INSERT INTO `cms_article` VALUES ('58', '30', 'PVC抗菌地板：环保又舒适 ', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">在过去的一年里，地板行业发生了诸多大事--“欧典”事件致使现在很多人买地板都是“提心吊胆”的，生怕有什么闪失。征税后实木地板的价格又是一涨再涨，消费者只能持观望态度，多数人想买又不敢买，这样的条件下也促生了许多实木地板的替代产品，下面小编就为大家介绍一款“新生代”产品--PVC抗菌地板。PVC抗菌地板与以前的地板相比，在抗菌、防滑等各个方面上都得到了较大程度的提高。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; PVC地板&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 抗菌性&nbsp;&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; PVC地板本身具有不易生长细菌的天然特性；&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; PVC地板经过抗菌处理和表面PUR防污染处理，在其中添加了杀真菌剂,如碘类成分，具有强化杀菌效果和防污染功效，各种微生物难以在其表面生长,如:霉菌、白色念珠菌、藻菌、毛霉菌等，符合医院、GMP车间等公共场所防菌要求高的条件。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 防滑性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; PVC 弹性地板在局部压力下，会产生瞬间弹性变形而增大地板的摩擦系数，行走不易滑倒。而硬质地材的表面坚硬光滑，其摩擦系数 u 只是 PVC 的 1/3 ，行走更易滑倒。&nbsp; &nbsp;&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 防噪音性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 弹性 PVC 地板具有抗噪音的功效，当人和推车通过时，其噪音可以比同等条件下的硬质地材减低 10-15 分贝。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 脚感舒适性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 脚感接近地毯，相当的舒适；而在硬质地材上行走，脚感差，长时间行走容易酸痛，损伤脚骨；&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 耐磨性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 耐磨层—— 欧洲标准为 0.7mm（我国对PVC地板耐磨层没有严格的规定）。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 剩余压痕—— 欧洲标准为 :误差度&lt; 0.04 mm。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 滚动轮测试—— 我国PVC地板的耐磨转数为不小于1500转&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 表面磨损测试—— 可以分为T、P、M、F等4种类型&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 防火性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; PVC弹性地板系列符合国家GB 8624－1997 B1级(难燃)要求，拥有中国国家防火建筑材料质量检验中心的检测报告，为广大用户提供良好的安全保证。&nbsp;&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 抗化学性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 对日常物质有良好的抵抗能力，能抗酸碱值在 PH值在 5 – 12 之间的物质。通过酸、碱多种化学试剂的测试，对医院难以去除的碘酒污迹可提供有效清洁剂彻底去除。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 无论水磨石还是瓷砖，都不耐酸碱腐蚀；但 PVC 地板地材与弱酸碱和家用清洁剂不发生化学反应。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">易清洁性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; PVC地板表面经过 PUR（即Polyurethane Reinforced） 防污染处理，它能有效地把地材表面的毛细孔封闭，减低地板对灰尘、细菌以及化学品的吸收，达到防止污染的效果，从而减轻清洁的难度；&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">先进的无缝焊接，能有效防止水、污渍、灰尘的渗透和堆积，日常只需进行简单清洁维护即可。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">染色牢度&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">1. 人造光长时间照射下，检测地板颜色退色时间（EN ISO 105-B02：1999）&nbsp;&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2、耐光照、无辐射，长久使用不褪色，。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 装饰性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 色彩花色丰富，设计选择方案多，提供创意空间。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 适合不同装饰风格，无论是温馨、高雅，还是豪华、古典、前卫，都可从中找到答案。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 应用范围广泛，特别适用于医院、办公室、学校、购物中心等公共建筑。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 易施工性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 铺设非常方便、迅速；一般 5000 平方米的地面，安装瓷砖需要 1 个月时间，而铺设 PVC 地板只需要 15 天的时间，可以大大缩短施工工期。&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 安全环保性&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; PVC 是人类研究得最深入的塑料，坚固、耐用、安全，应用广泛多样，用于制造医用管子、血袋和其他医疗设备等；可循环再生，所有碎渣和拆掉的地板都可以被回收利用；通过了 ISO 14001 国际环保认证系统的要求；pvc弹性地板系列均符合国家强制性标准 GB18586-2001 《室内装饰装修材料 聚乙烯卷材地板中有害物质限量》规定的各项有害物质限量指标，包括以下检验项目：&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 氯乙烯单体限量&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 可溶性重金属限量&nbsp; &nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 挥发物的限量&nbsp;</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829341', '1536829387');
INSERT INTO `cms_article` VALUES ('59', '40', '弹性地板的优势', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">近来市场上出现了一种新型弹性地板，弥补了传统地材的缺陷，有报道称，这种地板是依照弹性力学的原理，在地板侧边的上下分别加入橡胶条，当地板因为气候原因上边或者下边膨胀的时候通过胶条吸收能量，减少因变形引起的地板边缘起翘，从而改善强化木地板的性能。由于地板之间有胶条组合，所以缝隙也非常小，防水性能更好。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　这种地板由树脂材料合成，表面覆有印刷贴层和超强耐磨层，使用寿命长达30年－50 年。该地板具有卓越的耐磨性、耐污性和防滑性，富有弹性的足感令行走十分舒适。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　适合家庭：面积较大的房间，这种地板需要专业的安装队伍，目前市场上出现了模仿带有胶条的地板，但是没有达到弹性地板的工艺要求，消费者一定要慎重购买。&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829390', '1536829432');
INSERT INTO `cms_article` VALUES ('60', '50', '地毯花纹片材地板将主导PVC地板市场 ', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp; 近2年来，韩国LG片材地毯花纹的地板（LG蝶晶石地毯纹地板）在欧美市场每年销售上涨60%以上，07年上涨势头更强。从欧美市场的销售情况分析，中国市场目前销售增长仅有20%的增幅，远远落后于发达国家。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp; 透过欧美市场的发展走势，可以看到今后中国PVC地板的发展情况，近2年时间很有可能PVC地毯纹片材地板销售将有较大幅度的增长，特别是办公、学校、商务楼的兴建增长会带动地毯纹PVC地板的需求。另外，地毯纹PVC地板自身特性的原因决定了其将引领地板行业的革命，主导PVC地板行业的发展。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp; 韩国LG蝶晶石（地毯纹）地板的特性：</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;1、地铁花纹逼真、自然，色泽鲜艳，完美的立体设计效果；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;2、地毯的质感感觉，缓解身体个关节的冲击力，减轻疲劳感；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;3、复合设计，表面有PU处理层，保证了地板的耐磨性能和耐污性，使地面清洁更加方便；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;4、表面耐磨层添加了自然银，使地板具有抗菌、抗霉的特性；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;5、由于PVC材料中100%不含有甲醛成分和其他有害气体释放，是目前最环保的地面装饰材料；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;6、为了保证PVC地板环保性能，LG地板生产严格可溶性铅等重金属的限量标准，避免造成重金属污染；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;7、防滑性能优良，即使在地板表面有水的情况下防滑效果也大大优于其他地板；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;8、良好的尺寸稳定性，地板不会因温度变化也不会开裂、变形、霉变、虫蛀问题发生；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;9、由于地板质量较轻，减轻了建筑物的承载重量；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;10、施工速度快，有效地保证施工任务的完成，缩短施工周期；</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp;11、防火等级B1级。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp;韩国LG公司根据市场的发展走向，及时制定市场销售指导，注重扩大LG蝶晶石地板的宣传和广告，加大销售力度，抢占商机，要求全国各代理商都要投入销售蝶晶石地板的宣传推广工作，免费为全国各装饰公司会议室铺设蝶晶石地毯纹地板，调整市场定位、改变销售思路、降低市场价格、多渠道、全方位地扩大市场销售量，力争2008年蝶晶石地板有较大幅度的增长。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　特别提醒：好的产品，需要专业铺设施工，需要专注严谨的服务！建议您一定要和专业服务商联系采购和铺装！</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829435', '1536829480');
INSERT INTO `cms_article` VALUES ('61', '60', '硅PU球场、传统刚性丙烯酸酯球场和聚氨酯（PU）球场', '3', '', '', '', '', '', '', null, '<p><img src=\"/uploads/ueditor/image/20180913/1536829533894497.jpg\" title=\"1536829533894497.jpg\" alt=\"硅PU球场、传统刚性丙烯酸酯.jpg\"/></p>', '0', '1', '0', '', '', '1536829492', '1536829560');
INSERT INTO `cms_article` VALUES ('62', '70', '健身花钱买健康，不要花钱买伤害 ', '3', '', '', '', '', '', '', null, '<p></p><p><span style=\"font-size: 14px;\">&nbsp; &nbsp; &nbsp; 随着人们物质生活的提高，人们越来越注重自己身体的健康，经常去一些室内体育馆或健身房参加体育锻炼和健身活动。特别是很多年轻人。这是人们常说的“花钱买健康”。往往很多人却忽视了健身房、室内体育场馆可能会给你造成的伤害，这样就变成了“花钱买伤害”了。</span></p><p><br/></p><p><span style=\"font-size: 14px;\">&nbsp; &nbsp; &nbsp; 健身房、业余体育场所的蓬勃兴起，给人们的业余生活带来了便利，也为很多投资者带来了机遇。很多投资者为了降低投入，不顾客户的利益大量使用低档的装修材料和不环保的低价地板。整修后不进行室内空气检测，不进行通风就进行营业，有的经营者为了改善室内甲醛污染给人们造成的刺激性气味，不是采取通风换气降低室内甲醛浓度，而是喷洒化学空气清新剂改善气味。殊不知这样不仅不能降低甲醛含量，反而造成二次污染。</span></p><p><br/></p><p><span style=\"font-size: 14px;\">&nbsp; &nbsp; &nbsp; 甲醛对人们的危害很多人不了解，甲醛已经被世界卫生组织确定为致癌和致畸形物质。室内所用的家具、地板（实木地板，强化地板，复合地板）、大芯板、胶合板、刨花板、密度板等都不断地释放有毒气体－甲醛，其释放期可达3-10年之久。</span></p><p><br/></p><p><span style=\"font-size: 14px;\">&nbsp; &nbsp; &nbsp; &nbsp;根据流行病学的统计，在中国白血病的自然发病率为十万分之三，每年新增约4万名白血病患者，其中2万多名是儿童，而且以 2-7岁的儿童居多，现在比以往患白血病的人数有增多趋势。在收治的病人中，既有知识分子也有农民，涉及的阶层和职业很广。专家称这与食品污染、装修污染、水源和大气污染有关。据华中师范大学生命科学学院院长杨旭教授披露的研究结果表明，高浓度的甲醛污染（≥1.0mg/m3）可以引起细胞突变和癌症（包括白血病）发生。（国家对室内装修甲醛含量标准为每立方米0.1毫克以下）</span></p><p><br/></p><p><span style=\"font-size: 14px;\">&nbsp; &nbsp; &nbsp; &nbsp; 健身房、室内体育馆装修甲醛污染最严重的就是涂料和地板，很多健身房为了降低投入成本选用价格较低的复合地板、强化地板和部分不合格的塑料运动地板（又叫PVC运动地板或塑胶运动地板）。我国目前还没有生产运动卷材地板的技术，国内很多厂家都在仿造国外的运动地板。PVC地板本身是不含甲醛的，由于国内很多生产厂家不掌握PVC地板的生产工艺，采用胶水粘结的方法生产地板。胶水中含有甲醛，因而生产的地板也含有甲醛。刚刚生产出来的地板有刺鼻的异味，时间长了气味变淡了，这样并不代表地板中就不含甲醛了。甲醛的释放是一个长期的过程，随着室内温度的变化，甲醛的释放也会发生变化，时间长达10年以上。</span></p><p><br/></p><p><span style=\"font-size: 14px;\">&nbsp; &nbsp; &nbsp; &nbsp;笔者在此提醒广大消费者，在选择健身房或参加锻炼的时候一定要了解他们的室内地板采用的是什么地板。不要“花钱买健康”变成了“花钱买伤害”了。</span></p><p><br/></p><p><span style=\"font-size: 14px;\">注意：适合健身房或室内体育馆使用的PVC运动地板，目前只有世界上少数几个国家可以生产。他们是韩国LG，意大利盟多，法国洁福，匈牙利嘉宝。</span></p><p><span style=\"font-size: 14px;\">&nbsp;</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829564', '1536829666');
INSERT INTO `cms_article` VALUES ('63', '80', '铺设施工质量控制 ', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">PVC铺装指南&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">1.地坪检测&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.使用温度湿度计检测湿度，室内温度以及地表温度15 ℃为宜，不应在5 ℃以下及30 ℃以上施工。宜于施工的相对空气湿度应20%-75%之间。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.使用含水率测试仪检测基层的含水率，基层的含水率应小于3% 。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.基层的强度不应低于混凝土强度C-20的要求，否则应采用适合的“妥善”自流平来加强强度。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.用硬度测试仪检测结果应是基层的表面硬度不低于1.2 兆帕。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5.对于塑胶地板材料的施工，基层的不平整度应在2米直尺范围内高低落差小于2毫米，否则应采用适合的“妥善”自流平进行找平。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.地坪预处理&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.采用1000瓦以上的地坪打磨机配适当的打磨片对地坪进行整体打磨，除去油漆、胶水等残留物，凸起和疏松的地块，用空鼓的地块也必须去除。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.用不小于2000瓦的工业吸尘器对地坪进行吸尘清洁。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3 对于地坪上的裂缝，可采用不锈钢加强筋以及“妥善”R726或“妥善”R710聚氨脂防水型粘合剂表面铺石英砂进行修补。&nbsp;&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.自流平施工--打底&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.吸收性的基层如混凝土、水泥砂泵，找平层应先使用“妥善” R777多用途界面处理剂按1：1比例兑水稀释后进行封闭打底。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.非吸收性的基层，如瓷砖、水磨石、大理石等，建议使用“妥善”R760密实型界面处理剂进行打底。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.如基层含水率过高（&gt;3%）又需马上施工，可以使用“妥善” R755 环氧界面处理剂进行打底处理，但前提是基层含水率不应大于 8% 。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4 界面处理剂施工应均匀，无明显积液。待界面处理剂表面风干后，即可进行下一步自流平施工。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.自流平施工--搅拌&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1 将一包“妥善”自流平按照规定的水灰比倒入盛有清水的搅拌桶中，边倾倒边搅拌。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2 为确保自流平搅拌均匀，须使用大功率、低转速的电钻配专用搅拌器进行搅拌。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3 搅拌至无结块的均匀浆液，将其静置熟化约3分钟，再短暂搅拌一次。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4 加水量应严格按照水灰比（请参照相应“妥善”自流平说明书）。水量过少会影响流动性，过多则会降低固化后的强度。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5.自流平施工--铺设&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.将搅拌好的自流平浆料倾倒在施工的地坪上，它将自行流动并找平地面，如设计厚度≤ 4 毫米，则需借助专用的齿刮板稍加批刮。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.随后应让施工人员穿上专用的钉鞋，进入施工地面，用专用的自流平放气滚筒在自流平表面轻轻滚动，将搅拌中混入的空气放出，避免气泡麻面及接口高差。（见小图）</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.施工完毕后请立即封闭现场，5小时内禁止行走，10小时内避免重物撞击，24小时后可进行塑胶地板的铺设。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.冬季施工，地板的铺设应在自流平施工48小时后进行。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5.如需对自流平进行精磨抛光，宜在自流平施工12小时后进行。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">6.地板的铺装--预铺及裁割&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1 无论是卷材还是块材，都应于现场放置24小时以上，使材料记忆性还原，温度与施工现场一致。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2 使用专用的修边器对卷采的毛边进行切割清理。（见小图）</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3 块材铺设时，两块材料之间应紧贴并没用接缝。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4 卷材铺设时，两块材料的搭接处应采用重叠切割，一般是要求重叠3厘米。注意保持一刀割断。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">7.地板的铺装--粘贴&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.根据本指南上的配套表格的对应关系选择适合塑胶地板的相应胶水及刮胶板。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.卷材铺粘时，将卷材的一端卷折起来。先清扫地坪和卷材背面，然后刮胶于地坪之上。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.块材铺粘时，请将块材从中间向两边翻起，同样将地面及地板背面清洁后上胶粘贴。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.不同的“妥善”粘合剂在施工中要求会有所不同，具体请参照相应的“妥善”产品说明书进行施工。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">8.地板的铺装--排气.滚压&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.地板粘贴后，先用软木块推压地板表面进行平整并挤出空气。（见小图）</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.随后用 50 或 75 公斤的钢压辊均匀滚压地板并及时修整拼接处翘边的情况。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.地板表面多余的胶水应及时擦去。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.24 小时后，再进行开槽和焊缝。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">9.地板的铺设--开缝&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.开槽必须在胶水完全固化后进行。使用专用的开槽器沿接缝处进行开槽，为使焊接牢固，开缝不应透底，建议开槽深度为地板厚度的2/3。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.在开缝器无法开刀的末端部位，请使用手动开缝器以同样的深度和宽度开缝。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.焊缝之前，须清除槽内残留的灰尘和碎料。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">10.地板的铺装--焊缝&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.可选用手工焊枪或自动焊接设备进行焊接。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.焊枪的温度应设置于约350度左右。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.以适当的焊接速度（保证焊条熔化），匀速地将焊条挤压入开好的槽中。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4.在焊条半冷却时，用焊条修平器或月型割刀将焊条高于地板平面的部分大体割区（见小图）。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">5.当焊条完全冷却后，在使用焊条修平器或月型割刀把焊条余下的凸起部分割去。&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">11.地板的清洁.保养&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;1.塑胶地板为室内场所开发设计，不宜在室外场地铺设使用。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2.请根据厂方推荐的方法，选用相应的清洁剂进行定期的清洁保养。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3.应避免甲苯，香蕉水之类高浓度溶剂及强酸、强碱溶液倾倒于地板表面，应避免使用不适当的工具和锐器刮铲或损伤地板表面。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp;</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829841', '1536829917');
INSERT INTO `cms_article` VALUES ('64', '90', '什么是塑胶地板', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">塑胶地板是PVC地板、橡胶地板、亚麻地板、静电地板、运动专用地板的统称。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">PVC地板是以高分子聚氯乙烯为主料的产品，具有良好的装饰效果，耐磨抗用，清洁卫生。主要应用在：教育、医疗、办公、机</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">场、商场等领域。 品牌有：得嘉塑美、玛丽、福尔波、洁福、台湾海利、阿姆斯壮、比利时博优、日本龙喜陆、韩国LG等。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">亚麻地板</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">亚麻地板是由亚麻籽油、松香、软木粉、染料、石粉混合到一起，形成的一种纯天然的地面弹性材料。是除未上漆的木地板外</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">世界最环保的地板。主要应用在：教育、医疗、办公、机场、商场等领域。 品牌：荷兰福尔波、美国阿姆斯壮、法国得嘉。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">橡胶地板</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">橡胶地板是经高温硫化而生产出来的，产品结构、性能稳定，具有不变形、抗烟头、超强耐磨等优点。主要应用在：教育、医</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">疗、办公、机场、商场等领域 品牌：德国诺拉、意大利的ARTIGO、意大利蒙多、澳大利亚韵诺等。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">静电地板</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">静电地板根据使用场所对电阻值的要求分为导静电地板R≤106欧姆；抗静电地板106欧姆≤R≤108欧姆。静电地板能有效防止和</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">降低静电对高精度电子设备的损坏，亦减少环境中尘埃的积聚。适合安装于洁净室、电子品厂房、医院的特护区和手术室、以</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">及电脑房等。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">塑胶PVC运动专用地板</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">塑胶PVC运动专用地板，冲击吸收好，减震性优，弹性佳，耐污抗菌，易保养，寿命长。能更有效地保护运动员不受伤害。主要</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">应用在：室内专业篮球场、排球场、乒乓球场、健身房等</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">品牌：得嘉运动地板、洁福运动地板、LG运动地板。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829929', '1536829972');
INSERT INTO `cms_article` VALUES ('65', '100', 'PVC塑胶地板采购过程中的误区：重产品 轻施工', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">有好多甲方持有这样的观点：只要花选择了好的PVC地板，一定能够做出好的效果，谁施工无所谓，施工费越便宜越好。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">我们认为该观点是错误的。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">PVC地板的采购好比是买布料定做衣服，当你买到了一块上好的法国布料，满心期待着做出同样质量上乘的衣服，但是如果您选择错了裁缝（如路边裁缝），料是好料，可惜施工水平一般，可以想象，最终的衣服可能改来改去还是不合适。但如果您选择了一家技艺高超的裁缝店卖的同样质量的产品，相信您最终会对自己的选择相当满意。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">PVC地板的施工工艺极其复杂，共有20-30道工序，每道工序都潜伏着不可逆转的错误风险。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">1、30多道工序均要经过正规厂家的培训和认证。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">2、踢脚线、门口、胶水等辅料的选择、上墙工艺、套边、拼花、库存管理、浪费等问题时刻威胁着最终的结果。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">3、安全问题：火灾、爆炸、砸伤、摔伤等隐患也不容忽视</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">4、PVC地板属于装修行业内的一个工种，一般都会与其他工种联合作战，与其他工种的协调连接就显得极其重要，协调得好，工期又快，质量又高，避免返工及质量隐患。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">由于我们在材料和施工管理方面的不懈努力和提高，我们三年前的项目和现在的就有很大的不同：我们的产品优秀率达95%以上，客户满意度达100%。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536829975', '1536830037');
INSERT INTO `cms_article` VALUES ('66', '110', '石塑地板是绿色产品吗？', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">石塑地板是绿色产品吗？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：石塑地板是绿色环保产品。 它们都是中国建筑材料企业管理协会推广使用的绿色建材。经有关权威部门检测，许多指标都达到甚至高于国际相关标准。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">石塑地板看起来同地板革差不多，两者有什么区别？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：地板革是一种普通的塑料软质卷材，不耐磨，重物压久后会形成不可恢复的压痕且容易老化变形；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">石塑地板是由天然大理石粉和树脂粘合而成，且复合类的地板是由耐磨层等五层结构组成，经过特殊工艺处理，具有不变形、抗衰老、抗菌、静音、耐磨等优点。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">地热的木合石地板的构成有什么特点？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：它的表面采用纯天然的意大利原木表皮，经过6次涂漆及环氧树脂进行表面加固，有效地解决了原木地板潮湿、污染和抗冲击的问题，中间层为导热性良好的麦饭石高厚度层，有效延长了保暖功能，使热量损失大大降低。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">什么是UV处理？它有什么作用？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：UV处理是运用环氧树脂进行表面加固处理的一种方式，可起到抗污染和有效吸收紫外线增强耐磨层、延缓产品衰老及易于清洗的作用。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">什么是石塑地板，石塑地板有哪些特点？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：石塑地板是由80%的天然大理石粉和20%的树脂粘合而成，表面采用UV处理,具有耐压耐磨、抗冲击、延缓老化、遇水防滑、质感柔和、防污防腐、易于清洁、质轻环保等特点。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">石塑地板与瓷砖、石材比有何优点？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：首先，瓷砖、石材是一种非常坚硬的材料，且表面光滑，这就不可避免的造成行走时脚感生硬，地面有水极易滑倒，造成伤害。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">而石塑地砖由于自身材料的优势，即具有石材的坚固性又具有有机材料的柔软性，使人行走时脚感非常舒适。同时具有“遇水更涩”的特点。即使不慎摔倒，也不会伤及人身，特别适用于有老人及儿童的家庭使用。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">地砖与木地板比优势在哪？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：实木地板价格昂贵，受潮后极易变型，风干后又易开裂收缩使接缝变大。 同时，木地板如保养不当，会造成霉变、虫蛀。地砖由成份决定了产品具有卓越稳定性、耐水性及防霉防虫蛀特性。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">地砖结实耐用吗？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：首先地砖的石粉含量在80%，决定了产品的耐压性优越，加入的树脂又使产品具有一定柔软度，在重物冲击时不会向瓷砖、石材一样被击碎。所以抗击性非常好。耐磨性是大家非常关心的问题，复合地砖表面采用UV耐磨涂层，使用过程中通过光化学反应，产品耐磨性将随使用时间增加而增强。UV层吸收紫外线，耐磨抗冲击使地砖印花层不会变色，同时大大减缓产品老化进度，延长使用寿命。 地砖施工方便吗？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：绝对方便。只需对地面进行简单清理，可自己动手铺装，地板指定销售商会有专人为您提供免费施工指导，如您 不愿自己动手，会有专业施工队为您 免费铺装。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">地砖是用胶粘吗？用什么胶？胶对人体有害吗？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：是用胶粘。建议您最好用指定胶。这种胶是水溶性胶，对人是安全的，国家环保检测部门证实，这种胶不含有毒重金属及毒性挥发物。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">市场上的石材据说有放射性，地砖有吗？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：客观的讲，石材不是全部都有放射性，颜色鲜艳的品种由于可能含有“氡”而有放射性。地砖采用的石粉是普通山石粉碎制成，其主要成份为碳酸钙，不含放射性物质。同时，产品通过国家环保检测部门检测，不含有放射性。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">地砖日常维护简单吗？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">答：简单。价格最低地砖需定期上蜡，防止其它污渍渗入，其他复合类地砖只要每日清扫，无需上蜡。当然，复合类地砖并不是不能上蜡，定期打磨抛光。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830041', '1536830089');
INSERT INTO `cms_article` VALUES ('67', '120', '石塑地砖 进入地面速装时代', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">无缝效果 貌似地板革</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; 　由于无缝石塑地砖铺装后的外貌与地板革有些相似，不少把这种新产品当成了地板革的改良产品。其实据某品牌天津销售公司陆先生介绍，地板革是塑料制成的，而石塑地砖其主体部分是由天然大理石粉与天然树脂黏合而成，其表层加贴进口的耐磨层和印花膜。而且，由于其主要原料是85％以上的天然大理石粉，这种材料经国家权威检测部门检验，对人体和环境无毒、无害、无副作用，属绿色环保产品。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; 另外，规格上也与地板革有区别，石塑地砖的规格是600cm*600cm，价格按材质、花色的不同在600元至几百元。</span></p><p><br/></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">铺装快捷 更适合旧房翻新使用</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; 据陆先生介绍，石塑防滑地砖较石材、木地板及复合木地板轻便，是一种高效轻体地材，因为其轻、薄，施工不用加装复杂的龙骨架或大量水泥，特别适于高层楼房的铺装，不但减轻了楼层承重，还增加了房间的使用空间，另外，它施工方便、快捷，在平整的水泥地面上以环保专用胶一铺即可。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; 除适宜新房装修外，该产品比其他地面材料更适合于旧房的改造翻新。可将其直接铺在原有地板上，而且铺装速度快，一般三居室只需一天，即铺即住。</span></p><p><br/></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">耐磨防滑 不留划痕&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; 据介绍，石塑防滑地砖具有良好的耐磨性能：其表面的耐磨层是0.25mm—0.5mm厚，可以承受高跟鞋及各种硬底鞋的踩踏，其厚度高于其他地材产品，可以禁得起20—50年以上的踩踏，而且还不会留下划痕。这层超轻度的耐磨层还防水防滑易保养，易清洗，平时只需用湿墩布擦拭即可保持清新亮洁，如能定期打蜡，效果更好。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; 同时，由于石塑地砖主要原料是85％以上的天然大理石粉，这种材料经国家权威检测部门检验，对人体和环境无毒、无害、无副作用，属绿色环保产品。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830092', '1536830144');
INSERT INTO `cms_article` VALUES ('68', '130', '石塑地砖：从工程市场全面进军家装市场', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">石塑地砖全面进军家装市场&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; “一周时间签了几十份销售协议。”在中关村数码大厦，北京时尚科贸公司(以下简称时尚公司)石塑地砖旗舰店里，一位销售人员告诉记者。木地板行业诚信危机及家装高峰期的到来给石塑地砖的业绩成长创造了契机。</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 欧美地材流行风将刮到中国&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 时尚公司负责人张东林介绍，当国人还在追捧强化木地板的时候，欧美已经全面淘汰强化地板取而代之的是石塑地砖。去年，欧洲利奥来公司石塑地砖卖了4000万平方米。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 欧美的流行趋势已经开始向中国蔓延。去年，台湾台北县石塑地砖一个月销量达到了100万平方米，这个销售业绩说明，这种产品在当地已经成为其他地面材料的全线换代产品。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 石塑地砖是一种轻体地材产品，材质似石非石，似木非木，既避免了大理石的放射性和材质比较沉重的缺点，也避免了木地板不能防潮、防火的缺点，而且耐强冲击。其最大的优点是其防滑性，因此，曾一度被大量用在医院、商场等公共场合。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 在追求个性化生活的欧美人眼中，石塑地砖最大的特点是时尚，可制成各种花色，如木地板花纹、地毯效果等，从而可以满足人们快捷更换的需求，由于其材质轻比较容易施工。不像瓷砖、木地板产品，旧房改造时，还要拆除重来。石塑地砖可以直接铺贴非常简便。市场人士分析，随着二手房市场的渐热，这种适宜二次装修的产品将会更有市场。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 经销避免“假洋货”&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 张东林表示，国内石塑地砖市场主要是进口产品，但是由于产地不同，质量存在着很大差距。主要差别在于其耐磨层，中国的产品质量最差。韩国、日本、中国台湾都生产石塑地砖，但是质量各有差别。韩国的产品质量最差，亚洲最好的石塑地砖产自日本。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 在欧洲，德国的石塑地砖品质最好，也比较适合中国市场。但是现在有很多德国企业在中国周边建厂，利用当地低成本的优势，但是产品质量却远远逊色于德国原产。这类产品虽然贴着德国的标签，但是已经失了德国水准。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 石塑地砖最好的产品产自美国，美国罗比公司是世界上最大的石塑地砖生产企业。由于进口关税很高，因此，一般真正的进口产品价格很难降下来。价格低又鼓吹是进口产品的往往都是“假洋货”。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 强化服务和低价策略&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; “木地板行业出现问题，这是石塑地砖的好机会。”张东林认为。在木地板行业大洗牌的时机，代理了欧美数个品牌的石塑地砖产品的时尚公司采取了一系列营销策略。为了突显这种产品的性能，近日时尚公司与居委会联系，组织老年人到公司产品展厅参观。既是体验营销，又是教育消费者的机会。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 针对中国的消费现状，时尚公司对于旗下的石塑地砖产品采取了中低价位路线。一款中外合资的产品定价甚至还低于某些强化木地板的价位。另外，强化售后服务，将顾客购买产品后一切服务费用全部免除。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 连锁模式区别其他产品&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 记者调查了解到，石塑地砖在建材城和建材超市这样的终端很少见。对于渠道单一问题，张东林表示，公司也考虑过进入建材城等主流渠道，但是一直没有涉足，目的是想与普通地面材料区别。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 加盟连锁的形式是目前时尚公司市场拓展的唯一方式。张东林认为这种模式更有利于市场的良性发展，同时可以最大限度地为经销商创造利益。时尚公司打算将石塑地砖、时尚家居、奇石收藏融于加盟店内，增加加盟店的卖点，打造不可模仿的经营模式。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; &nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; &nbsp; 从统计数据来看，几年前石塑地砖工程用量和家装用量的比例是7∶3，目前，工程用量和家装用量是3∶7，而且家装需求上升很快，利于加盟商的经营</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830147', '1536830214');
INSERT INTO `cms_article` VALUES ('69', '140', '石塑地砖不是地板革', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;石塑地砖是近两年市场上出现的一种新型地面装饰材料，因其具有“滑不倒、砸不坏、无毒害、施工快”等诸多优点受到装修用户的欢迎。但有读者提问，这新材料看上去就像早年流行的地板革，是不是如今换汤不换药冒名新材料？</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">　　石塑地砖不是地板革，地板革是由塑料制成，而石塑地砖主体部分是由天然大理石粉和天然树脂粘合而成，表面加美国进口的耐磨层和印花膜。</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">　　其最大特点是防滑，遇水增涩，尤其适宜有老人和孩子的家庭铺装。还具有良好的耐磨性能，可以承受女士高跟鞋及各种硬底鞋的“敲击”。另外，这种地砖防水防潮，易保养，易清洗，无渗水渗色现象，脏了用湿布擦拭即可保持清新亮洁，如定期打蜡，效果会更好。</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">　　石塑地砖重量轻，不会给建筑物的承重造成过载，因而高层建筑物的底层到顶层部位均可同时大面积铺用。</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">　　除适宜新房装修外，它比其它地面材料更适合于旧房的改造翻新。可将其直接铺在原有地板上，而且铺装速度快，一般三居室只需一天，即可铺装完，且能当即入住。另外，保养也非常方便，平时只需用湿墩布擦拭即可保持清新亮洁，如能定期打蜡，效果更好。与地板革的区别还有石塑地砖的规格是600＊ 600，购买时要注意这一点。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830219', '1536830271');
INSERT INTO `cms_article` VALUES ('70', '150', '石塑地砖的五个特点', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">位于大钟寺的时尚地材城推出主打地材“某某牌石塑防滑地砖”和“某某牌石塑艺术地砖”，其产品的优良特性和朴实的售后服务赢得了广大消费者的青睐，同时市场上许多貌似石塑地砖的轻体地材也打上了“石塑地砖”和“石塑地板砖”的招牌来欺骗消费者，所以消费者选购石塑地砖时要擦亮眼睛、辨别真伪，除了要认清石塑地砖的品牌外，还要了解石塑地砖的五个特点：&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; 一、质轻体薄、施工快捷。石塑防滑地砖是一种轻体地材，由耐磨层、印花膜、大理石粉三部分构成，因为轻、薄，特别适于高层楼房的铺装，不但减轻了楼层承重，还增加了房间的使用空间，另外，它施工方便、快捷，在平整的水泥地面上以环保专用胶一铺即可。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; 二、坚韧舒适、超轻耐磨。石塑防滑地砖表面的耐磨层是０．２５ｍｍ～０．５ｍｍ厚，其厚度在同行地材产品中当属“老大”。这层超轻度的耐磨层不但防水防滑，还可以禁得起２０～５０年以上的践踏，作为石塑防滑地砖的消费者，不必担心时间长了脚下会出现难堪的划痕。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; 三、源于天然，绿色环保。石塑防滑地砖的主要原料是８５％以上的天然大理石粉，这种材料经国家权威检测部门检验，对人体和环境无毒、无害、无副作用，属绿色环保产品。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; 四、花色繁多、款式新颖。石塑防滑地砖仿纹路逼真，消费者不但可以买到仿大理石、仿木地板、仿花岗岩的石塑地砖，而且还可以买到具有凹凸效果的鹅卵石地砖，它们都具有极强的装饰性。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp; 五、博采众长、国际流行。石塑防滑地砖因集中了多种传统地材之优点，被消费者称为“时尚换代型地材”，它具有石材的光洁豪华、超强耐磨；木地板的不凉不硬、有弹性、脚感好；陶瓷地砖的丰富花色、经济实惠。&nbsp;</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830275', '1536830335');
INSERT INTO `cms_article` VALUES ('71', '160', '使用PVC地板,拒绝“隐形杀手”', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">TVOC长期以来，人们认为装修污染罪魁祸首就是甲醛，其实不单纯是甲醛的问题，其中还包括常见的苯、甲苯、二甲苯、三氯乙烯、三氯甲烷、萘、二异氰酸酯类等，这些都是室内“隐形杀手”，主要来源于各种涂料、粘合剂、油漆、家居、地板及人造板等。TVOC可有嗅味，表现出毒性、刺激性，而且有些化合物有基因毒性。 TVOC能引起机体免疫水平失调，影响中枢神经系统功能，出现头晕、头痛、嗜睡、无力、胸闷等自觉症状，还可能影响消化系统，出现食欲不振、恶心等，严重时甚至可损伤肝脏和造血系统，出现变态反应等。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp; 众所周知甲醛、苯、二甲苯等有害物质对人体有害，VOC就是挥发性有机化合物(VotatileorganicCompound)的英文简称。无论是涂料还是油漆，在使用过程中，都会释放VOC。TVOC就是总挥发性有机化合物是常温下能够挥发成气体的各种有机化合物的统称。其中主要气体成分有烷、芳烃、烯、卤、酯、醛等。刺激眼睛和呼吸道，伤害人的肝、肾、大脑和神经系统。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　&nbsp; &nbsp;▲TVOC的来源：&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　室内环境中的VOCs可能从室外空气中进入，或从建筑材料、清洗剂、化妆品、蜡制品、地毯、家具、激光打印机、影印机、粘合剂以及室内的油漆中散发出来。一旦这些VOCs暂时的或持久的超出正常的背景水平，就会引起室内空气质量问题。&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　▲TVOC是什么物质？&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　总挥发性有机物TVOC是由一种或多种碳原子组成，容易在室温和正常大气压下蒸发的化合物的总称，他们是存在于室内环境中的无色气体。&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　▲TVOC对人体的危害：&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　若暴露在含高浓度VOCs工业环境中的会对人体的中枢神经系统、肝脏、肾脏及血液有毒害影响。&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　敏感的人即使对低浓度的VOCs也会有剧烈的反应。这些反应会在暴露在某一敏感气体或是一系列的敏感气体后产生，随后遇到更低的剂量也可能引发类似的症状，但长期暴露在低浓度中也会引起反应。&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　研究将暴露的常见的办公大楼中的VOCs和下列SBS症状联系在一起：&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　眼睛不适：灼热、干燥、异物感、水肿&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　喉咙不适：喉干&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　呼吸问题：呼吸短促；哮喘 头痛、贫血、头昏、疲乏、易怒&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">　　长期暴露在诸如苯，致癌物等化合物中可能增加致癌的可能。因为目前VOC对人体的毒害及感官影响以及他们的成分的了解有限，所以防止过分暴露在VOC中是十分必要的。&nbsp;</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830339', '1536830404');
INSERT INTO `cms_article` VALUES ('72', '170', '塑胶地板抗污的三个级别', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">塑胶地板丰富的产品系列以三个不同的产品级别提供了大量的富有表现力的图案和无限的设计空间：&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">IQ系列 - PUR 增强型：高质量高性能的地板材料系列－最明智的选择。</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">Plus -&nbsp; PUR 处理：经过 PUR 处理的地板材料系列，只需要少量维护。</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">Standard－覆盖有PU（聚亚氨酯）涂层：经过保护性涂料处理,表面覆盖有 PU 涂层的地板材料系列，可为将来的维护打下良好的基础。&nbsp;</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><br/></p>', '1', '1', '0', '', '', '1536830414', '1537005550');
INSERT INTO `cms_article` VALUES ('73', '180', '塑胶地板有何优点？', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">塑胶地板具有以下独特优点：</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">材质轻，减少建筑负重，是旧房改造的理想地材。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">铺设方便快捷，无需沙子、水泥，快快速式安装，几步到位</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">色彩柔和，即养『眼』又养『心』</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">柔和之中显高雅，高雅之中显大方</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">超厚耐磨层，不同寻常的“长寿”，完美效果，长久拥有。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">防水防滑：传统地材依靠表面纹路来解决防滑问题，治标而不治本，高分子材料面层作为耐磨层，且越沾水越涩，从根本上解决老人、儿童的后顾之忧。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">抗冲击：不怕击打，搬运，安装及使用过程重不易造成损坏，可广泛用于室内公共场所和家庭。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">坚韧有弹性：脚感舒服，增添行人愉快心情，韧而不脆，不易破碎。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">绿色环保：坚决使用无害材料，不含放射性元素，对环境有利无敝，是国家极力倡导的绿色产品。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">耐酸碱：对酸碱液体有一定抗腐蚀性。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">可循环再生：所有材料都可重复利用，有效保护社会资源。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">维修方便，如有破损，只需撬起损坏地板，重新粘沾新的地板就可。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">防止细菌滋生。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830464', '1536830522');
INSERT INTO `cms_article` VALUES ('74', '190', '同质透芯PVC塑胶地板---得嘉玛丽', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">得嘉是世界上最著名的PVC塑胶地板生产商，历史悠久，拥有最尖端的设备，最高的技术力量，PUR处理可达到通体即终身免维护的程度。尤其其近年开发出的通体产品耐磨等级可到T级，产品的花色清新、自然、美观、大方，是经过市场不断选择、更新而保留下来的，销售业绩在全国以及全球都是第一位的。英国玛丽也是世界顶级的地板生产商，拥有广泛的市场，2004年得嘉成功收购英国玛丽地板，并于2005年对工厂进行管理、技术、设备上的全面改造，保留了玛丽地板色系齐全、物美价廉等优点，并对关键技术PUR进行大幅度提高使产品的质量更上一层楼；将M级的云彩转移到瑞典得嘉通体产品的生产总部进行全面改造后生产。玛丽雅彩除了具有经得嘉PUR处理后免/低保养的特点外，其花色为无方向性的，使地板铺设后整体感更强，装饰效果极佳。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830526', '1536830565');
INSERT INTO `cms_article` VALUES ('75', '200', '橡胶地板---德国诺拉Nora', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">橡胶地板---德国诺拉Nora</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">橡胶地板由于是网状大分子结构，原子间的键不易被破坏，产品稳定性极佳，耐磨抗用，使用寿命可达50年，</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">抗烟头灼伤，尺寸受环境响变化不大，可推荐作无焊拼接。主要应用场所为机场、车站、健身房等。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">&nbsp; &nbsp; &nbsp; &nbsp; 橡胶地板起源于德国，德国诺拉为全球最好橡胶地板生产商，历史悠久，拥有最尖端的设备，最高的技术力量，经过市场不断选择、更新而保留下来&nbsp; 的，销售业绩在全国以及全球都是第一位的。在中国超过80%的机场使用德国诺拉橡胶地板，诺拉代表了橡胶地板的至高点。</span></p><p><br/></p>', '5', '1', '0', '', '', '1536830569', '1650338549');
INSERT INTO `cms_article` VALUES ('76', '210', '亚麻（籽油）弹性地板', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">亚麻地板是由亚麻籽油、松香、软木粉（橡树皮，制红酒瓶塞，可再生）、石粉、颜料混合到一起，经亚麻籽油和松香发生氧化反应起到粘合剂的作用，将混合原料熟化在黄麻背基上。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">该产品为世界上最环保的产品，纯天然，没有任何化学添加剂，产品具有一定的自主呼吸功能。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">亚麻地板极其耐磨，使用寿命是PVC的2-3倍可达35年之久。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">亚麻籽油和松香具有杀菌、抑菌的作用，亚麻籽油在以前是用来医治哮喘病人的，对呼吸道疾病的患者是很有好处的。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">花色丰富多彩、活泼可爱、热情奔放、清新亮丽、自然、柔和，是设计师眼中完美无缺的选择。</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;\">我们公司所代理的品牌荷兰福尔波（FORBO）是世界第一的亚麻生产工厂，历史悠久，拥有最尖端的设备，最高的技术力量，经过市场不断选择、更新而保留下来的，销售业绩在全国以及全球都是第一位的。我们在大连东北财经大学劝学楼中铺设了近1万平米的亚麻地板，历经数年，仍然色泽鲜艳如新，受到了使用方的一致好评。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830631', '1536830713');
INSERT INTO `cms_article` VALUES ('77', '220', '中小企业如何跑洋码头', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在国内越来越多大企业以海尔为榜样，积极实施“走出去”战略，到海外进行跨国经营。然而，众多中小企业对此却显得不太关心，觉得自己规模较小，品牌不响，外向经营能力不强，目前还不具备条件。这种看法有一定道理，然而，事情也不是绝对的，大企业有大企业的跨国经营优势，中小企业也有中小企业跨国经营的有利条件，只要注重扬长避短，中小企业也一样可以跨国经营。那么，中小企业如何进行跨国经营呢？&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">打民族特色牌&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">可以利用民族特色优势，以海外华裔侨民及其后裔为跨国经营对象，走出去创办本土化经营公司。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">有一个例子很能说明问题。菲律宾约里比（jolidee）快餐食品公司只是一个中等规模公司，但在菲律宾经营十分成功，其主打产品鲜鱼面和鲜鱼饭是菲律宾人非常喜欢的主食品种。通过不断提高服务质量，针对当地消费者的口味变化情况不断改进产品的花色品种，约里比已经在菲律宾快餐市场打出了自己的知名度。在麦当劳打进菲律宾市场后，面对对方的凌厉攻势，他们没有退缩，而是通过进一步深入的市场调研，推出了菲律宾人喜欢的大蒜和酱油风味的汉堡包，使麦当劳汉堡包黯然失色。在取得了与麦当劳这样的世界知名跨国公司竞争胜利并获得经验的同时，约里比公司也取得了走出去创办跨国公司的信心。它把目标瞄准在香港、中东、美国加州等地居住的菲律宾侨民及其后裔，在这些地方设立字号，以其深受菲律宾人喜爱的风味特色取得了海外经营的成功。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">我国海外华侨众多，遍布世界各国，虽然他们身处异国他乡，但故国情愫一直萦绕在他们的胸怀，表现在对有中华民族特色的产品上，都有一种强烈的偏爱。国内绝大多数中小企业的产品，特别是劳动密集型中小企业，其产品大都具有浓郁的中华民族特色，走出去到海外兴办生产民族特色产品的跨国公司，华侨会成为稳定顾客。如近年来兴起的“大娘水饺”在东南亚一些国家开设分店后，生意就都很理想。另外，不少国家华人居住区开设的中餐饭店，生意也大都非常红火。这些经验都表明，以海外华侨为服务对象，立足自己的乡土民族特色，中小企业也同样可以走出去。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">印度启示录&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">利用自己的相对技术先进性，以发展中国家的中低消费者为跨国经营对象，走出去办本土化经营公司。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">我国企业特别是中小企业的技术水平，从总体上来看目前还不高，与发达国家企业相比有明显差距，但如果与绝大多数发展中国家企业相比，则又具有明显的相对先进性，特别在制造业上，我国不少中小企业近年来通过引进、消化、创新，技术水平已有了很大提高，某些方面已接近甚至赶上了发达国家企业水平。从实用角度分析，我国中小企业的中档技术产品，更适应于发展中国家的消费者使用。因此，国内中小企业完全有条件也有能力到发展中国家去创办跨国公司。印度除软件产业外，其它方面的技术水平总体上要比我们低，但该国的中小企业近年来在发展中国家创办了不少跨国公司。如印度的亚洲油漆公司虽然与日本立邦、美国ICI相比，在总体竞争上处于劣势，但他们通过对比分析发现，自己也具有分销渠道较广、简易包装和简易配方的超低价产品等核心竞争优势。于是，运用相对优势，他们在与发达国家抗衡中获得了40％的印度市场份额。此后，他们又进一步进行认真分析和调查，认为这些优势完全可以延伸到其他发展中国家。在成功地向尼泊尔、斐济等国出口其产品后，亚洲油漆又开始在这些国家创办跨国公司，而且把服务的对象定位在中低收入的异国消费者集群上。而发达国家的大型跨国公司习惯了为富裕的顾客服务和优越的办公条件及大额买卖，亚洲公司的跨国公司经营更适合发展中国家绝大多数消费者的需求，因此，他们的工作自然要成功得多。像这样在国外创办跨国公司的中小企业，在印度还有不少。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">印度中小企业成功在发展中国家创办跨国公司的实例，很能给我国广大中小企业以启迪。其实，改革开放后，特别是近年来，我国已有不少企业投资发展中国家，创办跨国公司，并取得了很大成功，只是中小企业所占比例还不高，其主要原因又在于中小企业经营主们把创办跨国公司看成是十分神秘的事，总以为自己的条件不行，想也没敢往这方面想。可喜的是，我国沿海地区的一些中小企业，已经在创办跨国公司上带了个好头，江苏盐城市就有好几家乡镇服装和机电制造企业，去非洲一些国家成功地创办了跨国公司。可见，中小企业到发展中国家创办面向中低收入消费者的跨国公司，其实是“非不能也，而不为也”，就现在来说，条件已经成熟，只要思想解放，经营得当，走出去后肯定会“海阔天空”。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">以绝品取胜&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">利用自己的独特绝技，以发达国家的高收入消费者为跨国经营对象，走出去创办本土化经营公司。&nbsp;</span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">发达国家的不少富豪都有强烈的收藏欲，对世界各国的珍奇工艺品，都想方设法买来收藏，哪怕价格再高，只要是举世无双的孤品，都会毫不吝啬地重金购买。我国不少地方都有中华独特绝技工艺品生产厂，虽然规模大都很小，但产品在发达国家销售行情大都不错，对境外旅游者的创汇生意也一直很红火。只是这些企业目前基本上都在国内经营，如果换一个角度，从打响品牌、直接到国外去扩大销售、就近按异域消费者要求专门定制孤品等方面来考虑，则完全可以而且也应该将自己的企业办到国外去。有关中小企业不妨一试，相信定会有所裨益。</span></p><p><br/></p>', '0', '1', '0', '', '', '1536830716', '1536830767');
INSERT INTO `cms_article` VALUES ('78', '230', '帮助顾客成功的伙伴者—解决方案伙伴', '3', '', '', '', '', '', '', null, '<p><br/></p><p><span style=\"font-size: 14px;\">【LG化学CEO致辞】帮助顾客成功的伙伴者—解决方案伙伴&nbsp;</span></p><p><span style=\"font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-size: 14px;\">&nbsp;</span></p><p><span style=\"font-size: 14px;\">诸位员工：你们好！</span></p><p><span style=\"font-size: 14px;\">7月13日，正好是我们以“率先、快递、频繁”为基本精神，开展速度经营一周年的日子。一年来，全体员工克服种种困难，为实践速度经营做出了不懈的努力，对此我谨向你们表示衷心的感谢。</span></p><p><span style=\"font-size: 14px;\">凭借全体员工的努力，我们确保了恢复收益性的能量和自信心，即只要我们能够继续实践速度经营，就一定能够实现我们既定的蓝图。</span></p><p><span style=\"font-size: 14px;\">今天，我想谈一谈，我们在遇见客户时递给对方的名片上和各种报告书上，以及出入门上醒目地表明的蓝图口号-“解决方案伙伴”。</span></p><p><span style=\"font-size: 14px;\">解决方案伙伴蕴含着“凭借差异化的材料和解决方案，与顾客携手发展成为一流企业”的蓝图。同时，也含有“帮助顾客解决问题，为顾客提供差异化价值，成为使顾客成功的同伴者”的意义。</span></p><p><span style=\"font-size: 14px;\">现在，为了发展成为真正的解决方案伙伴，我们在研发、生产、营业等所有领域，积极开展满足顾客的活动，为顾客迅速提供更好的品质和服务，努力满足顾客的需求。</span></p><p><span style=\"font-size: 14px;\">同时，各个事业部门正在积极开展提供解决方案的活动，他们以优秀顾客为对象选择解决方案课题，支援顾客开发新产品和开拓新市场，改进成本和品质。</span></p><p><span style=\"font-size: 14px;\">诸位员工，</span></p><p><span style=\"font-size: 14px;\">我们决心通过多种多样的创新活动发展成为解决方案伙伴，以及为顾客创新价值和与顾客携手发展的世界一流企业。</span></p><p><span style=\"font-size: 14px;\">为此，从研发到工作人员，都应该认识到我们所开展的一切活动，都是以客户的成功为主要目的的，因此，我们必须站在顾客的立场上，思考顾客真正需求的是什么、为了顾客的成功我们应该做些什么等问题，并付诸于行动。</span></p><p><span style=\"font-size: 14px;\">我坚信，只要全体员工能够以速度经营的基本精神为基础，不断完善解决方按案伙伴的面貌，我们的蓝图就一定能够提前实现。</span></p><p><span style=\"font-size: 14px;\">谢谢。</span></p><p><span style=\"font-size: 14px;\">韩国LG化学社长 金盘石&nbsp;</span></p><p><span style=\"font-size: 14px;\">&nbsp;</span></p><p><br/></p>', '1', '1', '0', '', '', '1536830771', '1536994872');
INSERT INTO `cms_article` VALUES ('79', '10', '联系我们', '8', '', '', '', '', '', '', null, '<p><br/></p><p><strong><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;\">百沐森塑胶地板</span></strong></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;\">地 址：安徽省合肥市华东建材城D区107栋28号二楼</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;\">电 话：13916481905</span><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;\"><br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;\"><iframe class=\"ueditor_baidumap\" src=\"http://md1003.cfjzb.ahcfwl.com/static/admin/ueditor/dialogs/map/show.html#center=117.420092,31.844764&zoom=18&width=530&height=340&markers=117.420092,31.844764&markerStyles=l,A\" frameborder=\"0\" width=\"534\" height=\"344\"></iframe></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;\"><br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;\"><br/></span></p>', '0', '1', '0', '', '', '1536831096', '1536831453');
INSERT INTO `cms_article` VALUES ('80', '10', '招商加盟', '6', '', '', '', '', '', '', null, '<p><br/></p><p><strong><span style=\"font-size: 16px; color: rgb(192, 0, 0);\">百沐森</span></strong><span style=\"font-size: 16px;\">是上海今彩实业有限公司的pvc地板品牌。</span></p><p><span style=\"font-size: 16px;\">公司全系列产品均采用原生料生产，不添加任何形式的回收料；</span></p><p><span style=\"font-size: 16px;\">全系采用医用级别原料，保证环保，无害；</span></p><p><span style=\"font-size: 16px;\">百沐森全力做中国的高品质的典范地板，打造名族品牌。</span></p><p><span style=\"font-size: 16px;\">产品目前有八大系列，上百个品种全部现货供应。</span></p><p><span style=\"font-size: 16px;\"><br/></span></p><p><span style=\"font-size: 16px; color: rgb(192, 0, 0);\"><strong>欢迎您的加盟！</strong></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑, Arial, 微软雅黑; font-size: 13px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"font-size: 16px; margin: 0px; padding: 0px;\" microsoft=\"\" font-size:=\"\"><br/></span></strong></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑, Arial, 微软雅黑; font-size: 13px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; color: rgb(192, 0, 0);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"font-size: 16px; margin: 0px; padding: 0px;\" microsoft=\"\" font-size:=\"\">百沐森塑胶地板</span></strong></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑, Arial, 微软雅黑; font-size: 13px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">加盟地 址：安徽省合肥市华东建材城D区107栋28号二楼</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑, Arial, 微软雅黑; font-size: 13px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">加盟电 话：13916481905</span></p><p><br/></p>', '0', '1', '0', '', '', '1536831526', '1536995895');
INSERT INTO `cms_article` VALUES ('81', '130', 'MJ-1603', '10', '20180914/0b01822853e2eaeabc749b090fab246e.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\"><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></span></p><p><br/></p>', '<p><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></p><p><br/></p><p><br/></p>', '10', '1', '0', '', '', '1536888551', '1537320997');
INSERT INTO `cms_article` VALUES ('82', '140', 'MJ-1602', '10', '20180914/029c89c8477f973ffa2c461d95219460.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\"><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></span></p><p><br/></p>', '<p><br/></p><p><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></p>', '26', '1', '0', '', '', '1536888551', '1537404839');
INSERT INTO `cms_article` VALUES ('83', '150', 'MJ-1601', '10', '20180914/545f91b0aada95646cec799facaa0d81.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\"><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></span></p><p><br/></p>', '<p><br/></p><p><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></p>', '37', '1', '0', '', '', '1536888551', '1650337030');
INSERT INTO `cms_article` VALUES ('84', '120', 'MJ-1604', '10', '20180914/276e023d945d097ddab4304d97a7de1b.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\"><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></span></p><p><br/></p>', '<p><span style=\"font-size: 14px;\">厚度1.6mm，耐磨层0.15mm</span></p>', '9', '1', '0', '', '', '1536888551', '1537004420');
INSERT INTO `cms_article` VALUES ('85', '110', 'MJ-2001', '10', '20180914/bb0982c164e905d76fce78590794c5f5.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p>厚度2.0mm，耐磨层厚度0.5mm</p>', '1', '1', '0', '', '', '1536888551', '1537004130');
INSERT INTO `cms_article` VALUES ('86', '100', 'MJ-2002', '10', '20180914/21045ec5f72ffc33a9690f77c333ec4a.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p>厚度2.0mm，耐磨层厚度0.5mm</p>', '2', '1', '0', '', '', '1536888551', '1536997656');
INSERT INTO `cms_article` VALUES ('87', '90', 'MJ-2003', '10', '20180914/4c2a3294757777ff11b11deb2789238b.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p>厚度2.0mm，耐磨层厚度0.5mm</p>', '2', '1', '0', '', '', '1536888551', '1536997668');
INSERT INTO `cms_article` VALUES ('88', '70', 'MJ-2005', '10', '20180914/3db48fd20bcac9b80e253512d4e855a9.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p>厚度2.0mm，耐磨层厚度0.5mm</p>', '3', '1', '0', '', '', '1536888551', '1537404452');
INSERT INTO `cms_article` VALUES ('89', '80', 'MJ-2004', '10', '20180914/765aef6b491ef1999b4819ac9120286e.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p><br/></p><p>厚度2.0mm，耐磨层厚度0.5mm</p>', '4', '1', '0', '', '', '1536888551', '1650336491');
INSERT INTO `cms_article` VALUES ('90', '60', 'MJ-2006', '10', '20180914/7cb3e1e665affdd5e3c4684e99b95ebc.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p>厚度2.0mm，耐磨层厚度0.5mm</p>', '3', '1', '0', '', '', '1536888551', '1650336534');
INSERT INTO `cms_article` VALUES ('91', '40', 'MJ-2007', '10', '20180914/5717fac744a95e54560234e8e127067e.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p>厚度2.0mm，耐磨层厚度0.5mm</p>', '2', '1', '0', '', '', '1536888551', '1536997886');
INSERT INTO `cms_article` VALUES ('92', '30', 'MJ-2008', '10', '20180914/5a5b4617aedaf62ea930c8bdf463f2fa.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p>厚度2.0mm，耐磨层厚度0.5mm</p>', '2', '1', '0', '', '', '1536888551', '1536997892');
INSERT INTO `cms_article` VALUES ('93', '20', 'MJ-2009', '10', '20180914/434f8aa912a803e1910c716d28053a99.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p><br/></p><p>厚度2.0mm，耐磨层厚度0.5mm</p>', '3', '1', '0', '', '', '1536888552', '1537004151');
INSERT INTO `cms_article` VALUES ('94', '10', 'MJ-2010', '10', '20180914/4c953373fcc4ff4a28bf8ea4b7fd32c3.gif', '', '', '', '', '', '<p><span style=\"font-size: 14px;\">良好抗压性:密实结构,更具抗动载和静载性能。</span></p><p><span style=\"font-size: 14px;\">极佳耐污性:纳米抗菌，UV强化处理,易清洁。</span></p><p><span style=\"font-size: 14px;\">尺寸稳定性:高密度玻纤基层,增强韧性和稳定性。</span></p><p><span style=\"font-size: 14px;\">环保安全性:优质原材料。无毒无甲醛,降瞩防滑, 确保安全。</span></p><p><span style=\"font-size: 14px;\">超强耐磨性: 0.5mm厚高纯度耐磨层,适合高密度人流量的场所使用。</span></p><p><span style=\"font-size: 14px;\">厚度2.0mm，耐磨层厚度0.5mm</span></p><p><br/></p>', '<p><br/></p><p>厚度2.0mm，耐磨层厚度0.5mm</p>', '2', '1', '0', '', '', '1536888552', '1536997948');
INSERT INTO `cms_article` VALUES ('95', '10', '1601', '15', '20180914/669484ff821eab5e088cb4a3f015247f.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894854', '1536894854');
INSERT INTO `cms_article` VALUES ('96', '20', '1602', '15', '20180914/95add72e9d056883e517611ddd7444a5.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894854', '1536894854');
INSERT INTO `cms_article` VALUES ('97', '30', '1603', '15', '20180914/96d0bee48ac758926fc0085da7f8b064.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894854', '1536894854');
INSERT INTO `cms_article` VALUES ('98', '40', '1604', '15', '20180914/7f83768c29432d8c201d5a4b43df65ee.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894854', '1536894854');
INSERT INTO `cms_article` VALUES ('99', '50', '2001', '15', '20180914/9dd3fa4d6222a5af12677f320d37be16.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894854', '1536894854');
INSERT INTO `cms_article` VALUES ('100', '60', '2002', '15', '20180914/413e7fa60d9dc4dab01bed3617a9229d.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894854', '1536894854');
INSERT INTO `cms_article` VALUES ('101', '10', '1601', '16', '20180914/68977caf4757d301e9fc97262e1eed33.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894877', '1536894877');
INSERT INTO `cms_article` VALUES ('102', '20', '1602', '16', '20180914/ef0bff065481a8bf27ad01c7156e6d6c.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894877', '1536894877');
INSERT INTO `cms_article` VALUES ('103', '30', '1603', '16', '20180914/0466ce18e7ed9ba9c91ab32a04ea350e.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894877', '1536894877');
INSERT INTO `cms_article` VALUES ('104', '40', '1604', '16', '20180914/c85af21f940228358d53cf0a51737aca.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894877', '1536894877');
INSERT INTO `cms_article` VALUES ('105', '50', '2001', '16', '20180914/5b7b5132ea96a0465b654c09d11dd348.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894877', '1536894877');
INSERT INTO `cms_article` VALUES ('106', '60', '2002', '16', '20180914/b1c72c16925e0acc976dcaabed582324.gif', null, null, '', null, null, null, '', '0', '-1', '0', '', null, '1536894877', '1536894877');
INSERT INTO `cms_article` VALUES ('107', '230', '专卖店', '4', '20180915/37c6fd3a270279e395b4564cdba622b3.jpg', '', '', '', '', '', null, '<p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001514588661.jpg\" style=\"\" title=\"1537001514588661.jpg\"/></p><p><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537001514719696.jpg\" style=\"\" title=\"1537001514719696.jpg\"/></p><p><br/></p>', '0', '1', '0', '', '', '1537001476', '1537001755');
INSERT INTO `cms_article` VALUES ('108', '240', '银行', '4', '20180915/7e59cb6da66b78d928002567d933340a.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180915/1537001714288240.jpg\" title=\"1537001714288240.jpg\" alt=\"yh.jpg\"/></p>', '0', '1', '0', '', '', '1537001665', '1537001727');
INSERT INTO `cms_article` VALUES ('109', '10', '浴兰系列', '15', '', '', '', '', '', '', null, '<p style=\"text-align: center\"><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537003167183637.jpg\" style=\"\" title=\"1537003167183637.jpg\"/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537003167570787.jpg\" style=\"\" title=\"1537003167570787.jpg\"/></p><p style=\"text-align: center;\"><img src=\"http://1536977751.cfjzb.ahcfwl.com/uploads/ueditor/image/20180915/1537003167604829.jpg\" title=\"1537003167604829.jpg\" style=\"text-align: center; white-space: normal;\"/></p>', '0', '1', '0', '', '', '1537003117', '1537252025');
INSERT INTO `cms_article` VALUES ('110', '10', '蝉羽系列', '16', '', '', '', '', '', '', null, '<p style=\"text-align: center\"><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537003268593539.jpg\" style=\"\" title=\"1537003268593539.jpg\"/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537003268826512.jpg\" style=\"\" title=\"1537003268826512.jpg\"/></p><p style=\"text-align: center;\"><img src=\"http://1536977751.cfjzb.ahcfwl.com/uploads/ueditor/image/20180915/1537003268180339.jpg\" title=\"1537003268180339.jpg\" style=\"text-align: center; white-space: normal;\"/></p>', '0', '1', '0', '', '', '1537003218', '1537252050');
INSERT INTO `cms_article` VALUES ('111', '10', '凉月系列', '17', '', '', '', '', '', '', null, '<p style=\"text-align: center\"><br/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537003301449884.jpg\" style=\"\" title=\"1537003301449884.jpg\"/></p><p style=\"text-align: center\"><img src=\"/uploads/ueditor/image/20180915/1537003301831889.jpg\" style=\"\" title=\"1537003301831889.jpg\"/></p><p style=\"text-align: center;\"><img src=\"http://1536977751.cfjzb.ahcfwl.com/uploads/ueditor/image/20180915/1537003301329331.jpg\" title=\"1537003301329331.jpg\" style=\"text-align: center; white-space: normal;\"/></p>', '0', '1', '0', '', '', '1537003281', '1537252072');
INSERT INTO `cms_article` VALUES ('112', '10', '月见系列', '18', '', '', '', '', '', '', null, '<p style=\"text-align: center\"><br/></p><p style=\"text-align: center;\"><img src=\"http://1536977751.cfjzb.ahcfwl.com/uploads/ueditor/image/20180915/1537003337200743.jpg\" title=\"1537003337200743.jpg\" style=\"text-align: center; white-space: normal;\"/><img src=\"/uploads/ueditor/image/20180915/1537003337420518.jpg\" style=\"\" title=\"1537003337420518.jpg\"/></p><p style=\"text-align: center\"><br/></p><p style=\"text-align: center\"><img src=\"http://1536977751.cfjzb.ahcfwl.com/uploads/ueditor/image/20180915/1537003337512162.jpg\" title=\"1537003337512162.jpg\" style=\"text-align: center; white-space: normal;\"/></p><p><br/></p>', '0', '1', '0', '', '', '1537003314', '1537252092');
INSERT INTO `cms_article` VALUES ('113', '250', '幼儿园走廊', '4', '20180918/4727c39b542f932d63617707576c44dc.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254380628951.jpg\" title=\"1537254380628951.jpg\" alt=\"14-1.jpg\"/></p>', '3', '1', '0', '', '', '1537254309', '1537404335');
INSERT INTO `cms_article` VALUES ('114', '260', '幼儿园大厅', '4', '20180918/af155ecc58bfa377648b88bebadb1ed5.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254451734176.jpg\" title=\"1537254451734176.jpg\" alt=\"14-3.jpg\"/></p>', '1', '1', '0', '', '', '1537254415', '1537404328');
INSERT INTO `cms_article` VALUES ('115', '270', '幼儿园大厅', '4', '20180918/83f99b4dbe3991a9d37934ea36bd32e6.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254487676169.jpg\" title=\"1537254487676169.jpg\" alt=\"14-4.jpg\"/></p>', '3', '1', '0', '', '', '1537254458', '1650338568');
INSERT INTO `cms_article` VALUES ('116', '280', '幼儿园大厅', '4', '20180918/d90d5e3055d281f9914a4e57e44df7a7.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254526873793.jpg\" title=\"1537254526873793.jpg\" alt=\"14-5.jpg\"/></p>', '1', '1', '0', '', '', '1537254497', '1537404313');
INSERT INTO `cms_article` VALUES ('117', '290', '幼儿园大厅', '4', '20180918/38671d1ebcdad7104651e28c88bbfbbf.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254558580037.jpg\" title=\"1537254558580037.jpg\" alt=\"14-6.jpg\"/></p>', '1', '1', '0', '', '', '1537254533', '1537404307');
INSERT INTO `cms_article` VALUES ('118', '300', '幼儿园大厅', '4', '20180918/7cd0376856b149592f30bfe44d387fbf.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254587233122.jpg\" title=\"1537254587233122.jpg\" alt=\"14-7.jpg\"/></p>', '0', '1', '0', '', '', '1537254564', '1537254590');
INSERT INTO `cms_article` VALUES ('119', '310', '幼儿园', '4', '20180918/efee4f65f22e685557a261adab1ee0b5.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254700607549.jpg\" title=\"1537254700607549.jpg\" alt=\"14-12.jpg\"/></p>', '1', '1', '0', '', '', '1537254659', '1537404269');
INSERT INTO `cms_article` VALUES ('120', '320', '医院', '4', '20180918/c43f72ae99b21b690a6cfce88124a0a1.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254770556642.jpg\" title=\"1537254770556642.jpg\" alt=\"13-10.jpg\"/></p>', '0', '1', '0', '', '', '1537254743', '1537254778');
INSERT INTO `cms_article` VALUES ('121', '330', '医院', '4', '20180918/a5ddbc6e2b99f8be441cb0730c697882.jpg', '', '', '', '', '', null, '<p style=\"text-align: center;\"><img src=\"/uploads/ueditor/image/20180918/1537254809882074.jpg\" title=\"1537254809882074.jpg\" alt=\"13-3.jpg\"/></p>', '0', '1', '0', '', '', '1537254783', '1537254812');

-- ----------------------------
-- Table structure for `cms_article_cate`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article_cate`;
CREATE TABLE `cms_article_cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `orderby` int(10) DEFAULT '100' COMMENT '排序',
  `en_name` varchar(200) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `isTarget` tinyint(1) DEFAULT NULL,
  `isNav` tinyint(1) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `seo_title` varchar(200) DEFAULT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `description` text,
  `catedir` varchar(200) DEFAULT NULL,
  `cateStyle` int(10) DEFAULT NULL,
  `cateParam` varchar(800) DEFAULT NULL,
  `infoStyle` int(10) DEFAULT NULL,
  `infoParam` varchar(200) DEFAULT NULL,
  `isForm` tinyint(1) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_article_cate
-- ----------------------------
INSERT INTO `cms_article_cate` VALUES ('1', '了解百沐森', '10', null, '0', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '0', '1536141443', '1536141443', '1');
INSERT INTO `cms_article_cate` VALUES ('2', '产品中心', '20', null, '0', '', '0', '1', '', '', '', '', '', '2', '9|3|0|280|173|0|0|70', '0', '', '0', '1536141467', '1536141467', '1');
INSERT INTO `cms_article_cate` VALUES ('3', '地板知识', '30', null, '0', '', '0', '1', '', '', '', '', '', '1', '20|0|0|140', '0', '', '0', '1536141493', '1536994859', '1');
INSERT INTO `cms_article_cate` VALUES ('4', '案例展示', '40', null, '0', '', '0', '1', '', '', '', '', '', '2', '9|3|0|280|173|0|0|70', '0', '', '0', '1536141509', '1536829020', '1');
INSERT INTO `cms_article_cate` VALUES ('5', '资讯动态', '50', null, '0', '', '0', '1', '', '', '', '', '', '1', '10|0|0|140', '0', '', '0', '1536141524', '1536141524', '1');
INSERT INTO `cms_article_cate` VALUES ('6', '招商加盟', '60', null, '0', '', '0', '1', '', '', '', '', '', '4', '2', '0', '', '0', '1536141540', '1536831077', '1');
INSERT INTO `cms_article_cate` VALUES ('7', '在线咨询', '70', null, '0', '', '0', '1', '', '', '', '', '', '4', '0', '0', '', '0', '1536141554', '1536141554', '1');
INSERT INTO `cms_article_cate` VALUES ('8', '联系我们', '80', null, '0', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '0', '1536141564', '1536141564', '1');
INSERT INTO `cms_article_cate` VALUES ('9', '一号初见系列', '10', null, '2', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '1', '1536226306', '1537001814', '1');
INSERT INTO `cms_article_cate` VALUES ('10', '二号梅见系列', '9', null, '2', '', '0', '1', '', '', '', '', '', '2', '9|3|0|280|280|0|0|70', '1', '400|400|0', '1', '1536226333', '1650337028', '1');
INSERT INTO `cms_article_cate` VALUES ('11', '三号夜樱系列', '30', null, '2', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '1', '1536226356', '1537001823', '1');
INSERT INTO `cms_article_cate` VALUES ('12', '四号清和系列', '40', null, '2', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '1', '1536226383', '1537001838', '1');
INSERT INTO `cms_article_cate` VALUES ('13', '行业资讯', '10', null, '5', '', '0', '1', '', '', '', '', '', '3', '6|0|120|150|100|0', '0', '', '0', '1536314093', '1536831773', '1');
INSERT INTO `cms_article_cate` VALUES ('14', '知识问答', '20', null, '5', '', '0', '1', '', '', '', '', '', '1', '10|0|0|140', '0', '', '0', '1536314117', '1536314117', '1');
INSERT INTO `cms_article_cate` VALUES ('15', '五号浴兰系列', '50', null, '2', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '1', '1536743662', '1537001847', '1');
INSERT INTO `cms_article_cate` VALUES ('16', '六号蝉羽系列', '60', null, '2', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '1', '1536743680', '1537001857', '1');
INSERT INTO `cms_article_cate` VALUES ('17', '七号凉月系列', '70', null, '2', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '1', '1536743693', '1537001869', '1');
INSERT INTO `cms_article_cate` VALUES ('18', '八号月见系列', '80', null, '2', '', '0', '1', '', '', '', '', '', '0', '0', '0', '', '1', '1536743707', '1537001879', '1');

-- ----------------------------
-- Table structure for `cms_article_image`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article_image`;
CREATE TABLE `cms_article_image` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(10) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `sortnum` int(10) DEFAULT '100' COMMENT '排序',
  `url` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `small_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_article_image
-- ----------------------------
INSERT INTO `cms_article_image` VALUES ('1', '83', '1601', '1', '', '20180915/437263e035c6d2b10b7abd753a45fc95.gif', null);
INSERT INTO `cms_article_image` VALUES ('2', '82', '1602', '1', '', '20180915/e5b7e041166e97283cbaaa5598bf4bab.gif', null);
INSERT INTO `cms_article_image` VALUES ('3', '81', '1603', '1', '', '20180915/7962083abbfceb57014dff26b954f9e3.gif', null);
INSERT INTO `cms_article_image` VALUES ('4', '84', '1604', '1', '', '20180915/7d97ee5215360bdef8bdfe40415447fc.gif', null);
INSERT INTO `cms_article_image` VALUES ('5', '86', '2002', '1', '', '20180915/366a0638b7188e368aa3c6165aeed845.gif', null);
INSERT INTO `cms_article_image` VALUES ('6', '87', '2003', '1', '', '20180915/471752324177fbd7e515aa4007913b79.gif', null);
INSERT INTO `cms_article_image` VALUES ('7', '89', '2004', '1', '', '20180915/7e4017b729e2cd593fe5f317e015f37b.gif', null);
INSERT INTO `cms_article_image` VALUES ('8', '88', '2005', '1', '', '20180915/9b7a1b347a77aa1183def3e5cbb6b9fa.gif', null);
INSERT INTO `cms_article_image` VALUES ('9', '90', '2006', '1', '', '20180915/4d404302577783dca9900f3807e9cfc6.gif', null);
INSERT INTO `cms_article_image` VALUES ('10', '91', '2007', '1', '', '20180915/6048983c51730873180233028610aef4.gif', null);
INSERT INTO `cms_article_image` VALUES ('11', '92', '2008', '1', '', '20180915/3a6b27813c95187f38bb32f65671ceef.gif', null);
INSERT INTO `cms_article_image` VALUES ('12', '93', '2009', '1', '', '20180915/2020b0f6f5eea85a4e44b29a20ee0494.gif', null);
INSERT INTO `cms_article_image` VALUES ('13', '94', '2010', '1', '', '20180915/5810228b1c4083d5ed2d1bee4d0f8098.gif', null);

-- ----------------------------
-- Table structure for `cms_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `cms_auth_group`;
CREATE TABLE `cms_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_auth_group
-- ----------------------------
INSERT INTO `cms_auth_group` VALUES ('1', '系统管理员', '1', '', '1446535750', '1516068640');
INSERT INTO `cms_auth_group` VALUES ('2', '高级管理员', '1', '24,26,25,82,84,85,95,96,101,104,103,97,105,106,107,108,109,110,114,115,116,117,118,119,120,86,94,93,92,98,99,70,75,71,87,89,91,90,88,1,61,2,3,100,111,112,113', '1446535750', '1532489950');
INSERT INTO `cms_auth_group` VALUES ('3', '内容管理员', '1', '84,85,95,96,101,104,103,97,105,106,107,108,109,110', '1446535750', '1532489909');

-- ----------------------------
-- Table structure for `cms_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `cms_auth_group_access`;
CREATE TABLE `cms_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_auth_group_access
-- ----------------------------
INSERT INTO `cms_auth_group_access` VALUES ('1', '1');
INSERT INTO `cms_auth_group_access` VALUES ('9', '2');

-- ----------------------------
-- Table structure for `cms_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `cms_auth_rule`;
CREATE TABLE `cms_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `css` varchar(30) NOT NULL COMMENT '样式',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_auth_rule
-- ----------------------------
INSERT INTO `cms_auth_rule` VALUES ('1', '#', '系统管理', '1', '1', 'fa fa-gear', '', '0', '45', '1446535750', '1522046372');
INSERT INTO `cms_auth_rule` VALUES ('2', 'admin/user/index', '用户管理', '1', '1', '', '', '1', '20', '1446535750', '1477312169');
INSERT INTO `cms_auth_rule` VALUES ('3', 'admin/role/index', '角色管理', '1', '1', '', '', '1', '30', '1446535750', '1477312169');
INSERT INTO `cms_auth_rule` VALUES ('5', '#', '数据库管理', '1', '1', 'fa fa-database', '', '0', '50', '1446535750', '1477312169');
INSERT INTO `cms_auth_rule` VALUES ('6', 'admin/data/index', '数据库备份', '1', '1', '', '', '5', '50', '1446535750', '1477312169');
INSERT INTO `cms_auth_rule` VALUES ('13', '#', '日志管理', '1', '1', 'fa fa-tasks', '', '0', '60', '1477312169', '1477312169');
INSERT INTO `cms_auth_rule` VALUES ('14', 'admin/log/operate_log', '行为日志', '1', '1', '', '', '13', '50', '1477312169', '1477312169');
INSERT INTO `cms_auth_rule` VALUES ('24', '#', '栏目管理', '1', '1', 'fa fa-paste', '', '0', '10', '1477312169', '1520576681');
INSERT INTO `cms_auth_rule` VALUES ('25', 'admin/article/index_cate', '栏目分类', '1', '1', '', '', '24', '20', '1477312260', '1520576694');
INSERT INTO `cms_auth_rule` VALUES ('26', 'admin/article/index', '内容管理', '1', '1', '', '', '24', '10', '1477312333', '1528684940');
INSERT INTO `cms_auth_rule` VALUES ('27', 'admin/data/import', '数据库还原', '1', '1', '', '', '5', '50', '1477639870', '1477639870');
INSERT INTO `cms_auth_rule` VALUES ('93', 'admin/ad/index', '广告管理', '1', '1', '', '', '86', '20', '1522045418', '1522045418');
INSERT INTO `cms_auth_rule` VALUES ('94', 'admin/online/index', '在线客服', '1', '1', '', '', '86', '10', '1522110664', '1522110664');
INSERT INTO `cms_auth_rule` VALUES ('61', 'admin/config/index', '系统配置', '1', '1', '', '', '1', '10', '1479908607', '1521680616');
INSERT INTO `cms_auth_rule` VALUES ('70', '#', '会员管理', '1', '1', '', '', '86', '70', '1484103066', '1484103066');
INSERT INTO `cms_auth_rule` VALUES ('71', 'admin/member/group', '会员组', '1', '1', '', '', '70', '20', '1484103304', '1484103304');
INSERT INTO `cms_auth_rule` VALUES ('75', 'admin/member/index', '会员列表', '1', '1', '', '', '70', '10', '1484103304', '1484103304');
INSERT INTO `cms_auth_rule` VALUES ('82', 'admin/article/article_recycle', '回收站', '1', '1', '', '', '24', '30', '1515633098', '1515633098');
INSERT INTO `cms_auth_rule` VALUES ('84', '#', '电脑网站管理', '1', '1', 'fa fa-desktop', '', '0', '20', '1521679053', '1528684894');
INSERT INTO `cms_auth_rule` VALUES ('85', 'admin/website/config', '网站配置', '1', '1', '', '', '84', '10', '1521679752', '1521679870');
INSERT INTO `cms_auth_rule` VALUES ('86', '#', '功能管理', '1', '1', 'fa fa-legal ', '', '0', '40', '1521686026', '1521686026');
INSERT INTO `cms_auth_rule` VALUES ('87', '#', '内容批量处理', '1', '1', '', '', '86', '80', '1521686119', '1521706547');
INSERT INTO `cms_auth_rule` VALUES ('88', 'admin/batch/batchupload', '批量上传', '1', '1', '', '', '87', '40', '1521698405', '1521879938');
INSERT INTO `cms_auth_rule` VALUES ('89', 'admin/batch/move', '批量转移', '1', '1', '', '', '87', '10', '1521698442', '1521698442');
INSERT INTO `cms_auth_rule` VALUES ('90', 'admin/batch/watermark', '批量水印', '1', '1', '', '', '87', '30', '1521698490', '1521698553');
INSERT INTO `cms_auth_rule` VALUES ('91', 'admin/batch/replace', '批量替换', '1', '1', '', '', '87', '20', '1521698586', '1521698586');
INSERT INTO `cms_auth_rule` VALUES ('92', 'admin/apply/message', '在线留言', '1', '1', '', '', '86', '30', '1521699030', '1522463478');
INSERT INTO `cms_auth_rule` VALUES ('95', 'admin/banner/index', 'Banner管理', '1', '1', '', '', '84', '20', '1522226642', '1522290649');
INSERT INTO `cms_auth_rule` VALUES ('96', 'admin/structure/index', '首页管理', '1', '1', '', '', '84', '30', '1522304017', '1522304017');
INSERT INTO `cms_auth_rule` VALUES ('97', '#', '手机网站管理', '1', '1', 'fa fa-mobile mobile-size', '', '0', '30', '1522433246', '1528684918');
INSERT INTO `cms_auth_rule` VALUES ('98', 'admin/apply/join_index', '加盟申请', '1', '1', '', '', '86', '40', '1522464363', '1522464363');
INSERT INTO `cms_auth_rule` VALUES ('99', 'admin/apply/job_index', '人才招聘', '1', '1', '', '', '86', '50', '1522465929', '1522465929');
INSERT INTO `cms_auth_rule` VALUES ('100', 'admin/counter/index', '访问统计', '1', '1', '', '', '1', '50', '1522476204', '1522476204');
INSERT INTO `cms_auth_rule` VALUES ('101', '#', '附加管理', '1', '1', '', '', '84', '50', '1522653556', '1522653556');
INSERT INTO `cms_auth_rule` VALUES ('104', 'admin/other/hot_search', '热门搜索', '1', '1', '', '', '101', '10', '1522653727', '1522653727');
INSERT INTO `cms_auth_rule` VALUES ('103', 'admin/other/friend_link', '友情链接', '1', '1', '', '', '101', '20', '1522653666', '1522663289');
INSERT INTO `cms_auth_rule` VALUES ('105', 'admin/wap/config', '手机网站配置', '1', '1', '', '', '97', '10', '1523857763', '1523858832');
INSERT INTO `cms_auth_rule` VALUES ('106', 'admin/wap/nav_index', '导航管理', '1', '1', '', '', '97', '20', '1523859682', '1523860620');
INSERT INTO `cms_auth_rule` VALUES ('107', 'admin/banner/wap_banner', 'Banner管理', '1', '1', '', '', '97', '30', '1523866001', '1523866001');
INSERT INTO `cms_auth_rule` VALUES ('108', 'admin/wapmodule/index', '首页管理', '1', '1', '', '', '97', '40', '1523868373', '1526273888');
INSERT INTO `cms_auth_rule` VALUES ('109', '#', '附加管理', '1', '1', '', '', '97', '50', '1523936935', '1523936935');
INSERT INTO `cms_auth_rule` VALUES ('110', 'admin/other/cate_icon', '首页分类图标', '1', '1', '', '', '109', '50', '1523937150', '1523937297');
INSERT INTO `cms_auth_rule` VALUES ('111', '#', 'SEO网站优化', '1', '1', 'fa fa-support', '', '0', '50', '1523945618', '1526002805');
INSERT INTO `cms_auth_rule` VALUES ('112', 'admin/connector/seo', 'seo优化', '1', '1', '', '', '111', '10', '1523946143', '1523949839');
INSERT INTO `cms_auth_rule` VALUES ('113', 'admin/connector/sitemap', '网站地图', '1', '1', '', '', '111', '20', '1523946237', '1523949848');
INSERT INTO `cms_auth_rule` VALUES ('114', '#', '小程序管理', '1', '1', 'fa fa-weixin', '', '0', '35', '1525945170', '1525945541');
INSERT INTO `cms_auth_rule` VALUES ('115', 'admin/applet/config', '小程序配置', '1', '1', '', '', '114', '10', '1526292325', '1526292325');
INSERT INTO `cms_auth_rule` VALUES ('116', 'admin/applet/nav_index', '导航管理', '1', '1', '', '', '114', '20', '1526348201', '1526348201');
INSERT INTO `cms_auth_rule` VALUES ('117', 'admin/banner/applet_banner', 'Banner管理', '1', '1', '', '', '114', '30', '1526348469', '1526349319');
INSERT INTO `cms_auth_rule` VALUES ('118', 'admin/appletmodule/index', '首页管理', '1', '1', '', '', '114', '40', '1526350107', '1526350107');
INSERT INTO `cms_auth_rule` VALUES ('119', '#', '附加管理', '1', '1', '', '', '114', '50', '1526350303', '1526350303');
INSERT INTO `cms_auth_rule` VALUES ('120', 'admin/other/applet_icon', '首页分类图标', '1', '1', '', '', '119', '10', '1526350338', '1526350338');
INSERT INTO `cms_auth_rule` VALUES ('121', 'admin/website/inside', '内页配置', '1', '1', '', '', '84', '35', '1534985492', '1534985492');

-- ----------------------------
-- Table structure for `cms_banner_cate`
-- ----------------------------
DROP TABLE IF EXISTS `cms_banner_cate`;
CREATE TABLE `cms_banner_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `sortnum` int(10) DEFAULT NULL,
  `banner_type` tinyint(1) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `width` int(10) DEFAULT NULL COMMENT '配置值',
  `height` int(10) DEFAULT NULL,
  `switch` tinyint(1) DEFAULT NULL,
  `auto` tinyint(1) DEFAULT NULL,
  `switch_style` varchar(100) DEFAULT NULL,
  `effect_time` int(10) DEFAULT NULL,
  `interval_time` int(10) DEFAULT NULL,
  `aside_btn` tinyint(1) DEFAULT NULL,
  `circle_btn` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_banner_cate
-- ----------------------------
INSERT INTO `cms_banner_cate` VALUES ('1', '10', '0', '首页banner', '1920', '600', '1', '1', 'fade', '500', '3000', '1', '1', '1');
INSERT INTO `cms_banner_cate` VALUES ('2', '20', '0', '内页banner', '1920', '400', '0', '0', 'fade', '500', '3000', '0', '0', '1');
INSERT INTO `cms_banner_cate` VALUES ('21', '30', '1', '首页banner', '0', '0', '1', '1', 'fade', '200', '2500', '0', '1', '1');
INSERT INTO `cms_banner_cate` VALUES ('22', '40', '1', '内页banner', '0', '0', '0', '0', 'leftLoop', '200', '2500', '0', '0', '1');
INSERT INTO `cms_banner_cate` VALUES ('23', '50', '2', '首页banner', '0', '0', '1', '1', '', '500', '3000', '0', '1', '1');
INSERT INTO `cms_banner_cate` VALUES ('24', '60', '2', '内页banner', '0', '0', '0', '0', '', '500', '300', '0', '0', '1');

-- ----------------------------
-- Table structure for `cms_banner_image`
-- ----------------------------
DROP TABLE IF EXISTS `cms_banner_image`;
CREATE TABLE `cms_banner_image` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `bannerId` int(10) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `sortnum` int(10) DEFAULT '100' COMMENT '排序',
  `url` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `small_photo` varchar(200) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_banner_image
-- ----------------------------
INSERT INTO `cms_banner_image` VALUES ('5', '1', '01', '1', '/category/1.html', '20180906/c09f3ed8f2f9efaa5b31a93787e15bf9.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('7', '1', '02-1', '3', '/category/4.html', '20180906/a9b78c578d1e4e38819a647aafaefb16.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('8', '2', 'neiye', '1', '', '20180906/c495e9eea96d6a99494531ea2e4085a4.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('18', '1', '03-3', '2', '/category/2.html', '20180918/89e65972cd81c5bf9048f551578c22c7.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('19', '21', '手机banner02-1', '3', '/mobile/category/1.html', '20180918/fde7b36212116d9c7a46f49e3d01610b.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('10', '21', '手机banner01', '1', '/mobile/category/1.html', '20180907/98baf58130ed45ffdff6eeec1d539cca.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('11', '21', '手机banner03', '2', '/mobile/category/1.html', '20180907/59ae5468c79c18a18596d96ecb8ef042.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('12', '22', '手机内页', '1', '', '20180907/31a1cc85cf1ea78e8440892d15840e3a.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('13', '23', '手机banner01', '1', '', '20180914/9814b4c6ad27881e6e9585c52752df51.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('20', '23', '手机banner02-1', '2', '', '20180918/6bb54afb4dca00cfe0c5d4d15378a936.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('15', '23', '手机banner03', '3', '', '20180914/4ad6d3ca135fb7aeaa1f7a3a8ddc998d.jpg', null, '1');
INSERT INTO `cms_banner_image` VALUES ('16', '24', '手机内页', '1', '', '20180914/d611a9bbf94eda9109b919a09d23d35a.jpg', null, '1');

-- ----------------------------
-- Table structure for `cms_config`
-- ----------------------------
DROP TABLE IF EXISTS `cms_config`;
CREATE TABLE `cms_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_config
-- ----------------------------
INSERT INTO `cms_config` VALUES ('1', 'web_site_close', '1');
INSERT INTO `cms_config` VALUES ('2', 'list_rows', '10');
INSERT INTO `cms_config` VALUES ('3', 'admin_allow_ip', '');

-- ----------------------------
-- Table structure for `cms_counter`
-- ----------------------------
DROP TABLE IF EXISTS `cms_counter`;
CREATE TABLE `cms_counter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client` tinyint(1) DEFAULT NULL,
  `source` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_counter
-- ----------------------------
INSERT INTO `cms_counter` VALUES ('1', '1', '浏览器输入网址访问', '1536977567', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('2', '1', '浏览器输入网址访问', '1536978011', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('3', '1', '浏览器输入网址访问', '1536978926', '101.199.120.145', '0');
INSERT INTO `cms_counter` VALUES ('4', '1', '浏览器输入网址访问', '1536984914', '180.163.220.66', '0');
INSERT INTO `cms_counter` VALUES ('5', '1', 'http://1536977751.cfjzb.ahcfwl.com/admin/index/index.html', '1536994101', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('6', '1', 'blank', '1536994161', '101.91.60.11', '0');
INSERT INTO `cms_counter` VALUES ('7', '1', '浏览器输入网址访问', '1536995476', '101.226.114.195', '0');
INSERT INTO `cms_counter` VALUES ('8', '2', 'http://1536977751.cfjzb.ahcfwl.com/category/detail/82.html', '1536995476', '101.226.114.195', '0');
INSERT INTO `cms_counter` VALUES ('9', '1', '浏览器输入网址访问', '1536995476', '183.3.239.167', '0');
INSERT INTO `cms_counter` VALUES ('10', '1', '浏览器输入网址访问', '1536995493', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('11', '1', '浏览器输入网址访问', '1536995530', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('12', '1', '浏览器输入网址访问', '1536995536', '101.89.239.216', '0');
INSERT INTO `cms_counter` VALUES ('13', '1', '浏览器输入网址访问', '1536995652', '101.91.62.99', '0');
INSERT INTO `cms_counter` VALUES ('14', '1', 'blank', '1536995796', '61.151.178.174', '0');
INSERT INTO `cms_counter` VALUES ('15', '1', '浏览器输入网址访问', '1536995817', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('16', '1', '浏览器输入网址访问', '1536995901', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('17', '1', 'http://1536977751.cfjzb.ahcfwl.com/category/detail/82.html', '1536995966', '101.89.29.94', '0');
INSERT INTO `cms_counter` VALUES ('18', '1', 'http://1536977751.cfjzb.ahcfwl.com/category/detail/82.html', '1536996005', '101.89.239.230', '0');
INSERT INTO `cms_counter` VALUES ('19', '1', '浏览器输入网址访问', '1536997140', '42.236.10.84', '0');
INSERT INTO `cms_counter` VALUES ('20', '1', '浏览器输入网址访问', '1536997524', '180.163.220.3', '0');
INSERT INTO `cms_counter` VALUES ('21', '1', 'blank', '1536997556', '61.129.6.145', '0');
INSERT INTO `cms_counter` VALUES ('22', '1', 'blank', '1536997656', '61.129.8.179', '0');
INSERT INTO `cms_counter` VALUES ('23', '1', 'blank', '1536997668', '101.227.139.172', '0');
INSERT INTO `cms_counter` VALUES ('24', '1', 'blank', '1536997671', '101.89.239.232', '0');
INSERT INTO `cms_counter` VALUES ('25', '1', '浏览器输入网址访问', '1536997692', '42.236.10.84', '0');
INSERT INTO `cms_counter` VALUES ('26', '1', 'http://1536977751.cfjzb.ahcfwl.com/category/2.html?page=2', '1536997705', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('27', '1', '浏览器输入网址访问', '1536997739', '42.236.10.117', '0');
INSERT INTO `cms_counter` VALUES ('28', '1', 'blank', '1536997750', '101.91.60.104', '0');
INSERT INTO `cms_counter` VALUES ('29', '1', 'blank', '1536997757', '101.91.60.11', '0');
INSERT INTO `cms_counter` VALUES ('30', '1', 'blank', '1536997886', '61.129.6.251', '0');
INSERT INTO `cms_counter` VALUES ('31', '1', 'blank', '1536997892', '61.151.178.164', '0');
INSERT INTO `cms_counter` VALUES ('32', '1', 'blank', '1536997948', '101.227.139.172', '0');
INSERT INTO `cms_counter` VALUES ('33', '1', 'blank', '1536997964', '101.89.239.245', '0');
INSERT INTO `cms_counter` VALUES ('34', '1', '浏览器输入网址访问', '1537000020', '123.1.157.254', '0');
INSERT INTO `cms_counter` VALUES ('35', '1', 'http://1536977751.cfjzb.ahcfwl.com/category/17.html', '1537001524', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('36', '1', '浏览器输入网址访问', '1537003691', '117.136.101.94', '0');
INSERT INTO `cms_counter` VALUES ('37', '2', '浏览器输入网址访问', '1537003751', '101.226.226.221', '0');
INSERT INTO `cms_counter` VALUES ('38', '1', '浏览器输入网址访问', '1537003765', '101.227.139.194', '0');
INSERT INTO `cms_counter` VALUES ('39', '2', '浏览器输入网址访问', '1537003783', '101.227.139.171', '0');
INSERT INTO `cms_counter` VALUES ('40', '1', '浏览器输入网址访问', '1537003793', '101.105.67.131', '0');
INSERT INTO `cms_counter` VALUES ('41', '1', '浏览器输入网址访问', '1537003825', '61.151.178.165', '0');
INSERT INTO `cms_counter` VALUES ('42', '1', '浏览器输入网址访问', '1537003869', '101.91.62.65', '0');
INSERT INTO `cms_counter` VALUES ('43', '1', '浏览器输入网址访问', '1537004073', '61.151.179.83', '0');
INSERT INTO `cms_counter` VALUES ('44', '1', '浏览器输入网址访问', '1537004077', '61.151.207.186', '0');
INSERT INTO `cms_counter` VALUES ('45', '1', '浏览器输入网址访问', '1537004176', '61.151.178.165', '0');
INSERT INTO `cms_counter` VALUES ('46', '1', '浏览器输入网址访问', '1537004190', '61.129.6.251', '0');
INSERT INTO `cms_counter` VALUES ('47', '1', '浏览器输入网址访问', '1537004203', '223.166.222.108', '0');
INSERT INTO `cms_counter` VALUES ('48', '1', '浏览器输入网址访问', '1537004224', '61.151.179.84', '0');
INSERT INTO `cms_counter` VALUES ('49', '1', '浏览器输入网址访问', '1537004226', '101.91.60.110', '0');
INSERT INTO `cms_counter` VALUES ('50', '1', '浏览器输入网址访问', '1537004237', '61.129.6.203', '0');
INSERT INTO `cms_counter` VALUES ('51', '1', '浏览器输入网址访问', '1537004346', '61.151.179.84', '0');
INSERT INTO `cms_counter` VALUES ('52', '1', '浏览器输入网址访问', '1537005536', '101.89.19.149', '0');
INSERT INTO `cms_counter` VALUES ('53', '1', '浏览器输入网址访问', '1537005603', '101.89.29.94', '0');
INSERT INTO `cms_counter` VALUES ('54', '1', '浏览器输入网址访问', '1537005610', '61.151.178.236', '0');
INSERT INTO `cms_counter` VALUES ('55', '1', '浏览器输入网址访问', '1537005773', '101.227.139.164', '0');
INSERT INTO `cms_counter` VALUES ('56', '1', '浏览器输入网址访问', '1537005788', '101.89.19.149', '0');
INSERT INTO `cms_counter` VALUES ('57', '1', '浏览器输入网址访问', '1537005797', '101.89.29.78', '0');
INSERT INTO `cms_counter` VALUES ('58', '1', '浏览器输入网址访问', '1537005809', '101.91.60.11', '0');
INSERT INTO `cms_counter` VALUES ('59', '1', '浏览器输入网址访问', '1537005814', '61.129.6.174', '0');
INSERT INTO `cms_counter` VALUES ('60', '1', '浏览器输入网址访问', '1537005830', '101.91.60.106', '0');
INSERT INTO `cms_counter` VALUES ('61', '1', '浏览器输入网址访问', '1537005840', '61.151.178.166', '0');
INSERT INTO `cms_counter` VALUES ('62', '1', '浏览器输入网址访问', '1537016825', '223.167.152.124', '0');
INSERT INTO `cms_counter` VALUES ('63', '1', '浏览器输入网址访问', '1537016825', '117.136.100.109', '0');
INSERT INTO `cms_counter` VALUES ('64', '1', '浏览器输入网址访问', '1537016825', '58.247.212.75', '0');
INSERT INTO `cms_counter` VALUES ('65', '1', '浏览器输入网址访问', '1537016826', '183.192.164.79', '0');
INSERT INTO `cms_counter` VALUES ('66', '1', '浏览器输入网址访问', '1537016826', '120.204.17.46', '0');
INSERT INTO `cms_counter` VALUES ('67', '1', '浏览器输入网址访问', '1537016826', '183.192.201.97', '0');
INSERT INTO `cms_counter` VALUES ('68', '1', '浏览器输入网址访问', '1537016826', '223.166.151.233', '0');
INSERT INTO `cms_counter` VALUES ('69', '1', '浏览器输入网址访问', '1537016826', '183.192.201.97', '0');
INSERT INTO `cms_counter` VALUES ('70', '1', '浏览器输入网址访问', '1537016826', '58.246.221.161', '0');
INSERT INTO `cms_counter` VALUES ('71', '1', '浏览器输入网址访问', '1537016826', '223.166.151.238', '0');
INSERT INTO `cms_counter` VALUES ('72', '1', '浏览器输入网址访问', '1537016826', '223.167.152.125', '0');
INSERT INTO `cms_counter` VALUES ('73', '1', '浏览器输入网址访问', '1537016826', '183.192.201.97', '0');
INSERT INTO `cms_counter` VALUES ('74', '1', '浏览器输入网址访问', '1537016826', '58.246.221.74', '0');
INSERT INTO `cms_counter` VALUES ('75', '1', '浏览器输入网址访问', '1537016826', '183.192.164.79', '0');
INSERT INTO `cms_counter` VALUES ('76', '1', '浏览器输入网址访问', '1537016826', '120.204.17.46', '0');
INSERT INTO `cms_counter` VALUES ('77', '1', '浏览器输入网址访问', '1537016826', '120.204.17.46', '0');
INSERT INTO `cms_counter` VALUES ('78', '1', '浏览器输入网址访问', '1537016885', '61.151.179.83', '0');
INSERT INTO `cms_counter` VALUES ('79', '2', '浏览器输入网址访问', '1537017019', '61.151.178.217', '0');
INSERT INTO `cms_counter` VALUES ('80', '1', '浏览器输入网址访问', '1537049071', '58.247.212.55', '0');
INSERT INTO `cms_counter` VALUES ('81', '2', '浏览器输入网址访问', '1537049071', '117.136.100.109', '0');
INSERT INTO `cms_counter` VALUES ('82', '1', '浏览器输入网址访问', '1537049071', '120.204.17.69', '0');
INSERT INTO `cms_counter` VALUES ('83', '1', '浏览器输入网址访问', '1537055708', '183.160.60.54', '0');
INSERT INTO `cms_counter` VALUES ('84', '2', '浏览器输入网址访问', '1537055800', '61.151.178.165', '0');
INSERT INTO `cms_counter` VALUES ('85', '2', '浏览器输入网址访问', '1537055819', '101.91.60.104', '0');
INSERT INTO `cms_counter` VALUES ('86', '2', '浏览器输入网址访问', '1537055823', '101.89.239.232', '0');
INSERT INTO `cms_counter` VALUES ('87', '2', '浏览器输入网址访问', '1537055842', '61.129.6.227', '0');
INSERT INTO `cms_counter` VALUES ('88', '2', '浏览器输入网址访问', '1537055851', '61.129.6.147', '0');
INSERT INTO `cms_counter` VALUES ('89', '2', '浏览器输入网址访问', '1537055855', '61.151.179.83', '0');
INSERT INTO `cms_counter` VALUES ('90', '2', '浏览器输入网址访问', '1537055860', '61.151.207.205', '0');
INSERT INTO `cms_counter` VALUES ('91', '1', '浏览器输入网址访问', '1537064356', '101.105.67.131', '0');
INSERT INTO `cms_counter` VALUES ('92', '1', '浏览器输入网址访问', '1537066692', '183.160.24.120', '0');
INSERT INTO `cms_counter` VALUES ('93', '1', '浏览器输入网址访问', '1537070387', '180.163.220.68', '0');
INSERT INTO `cms_counter` VALUES ('94', '1', '浏览器输入网址访问', '1537075120', '47.92.103.177', '0');
INSERT INTO `cms_counter` VALUES ('95', '1', '浏览器输入网址访问', '1537087617', '47.96.12.13', '0');
INSERT INTO `cms_counter` VALUES ('96', '1', '浏览器输入网址访问', '1537106143', '112.28.182.5', '0');
INSERT INTO `cms_counter` VALUES ('97', '1', '浏览器输入网址访问', '1537106143', '223.166.151.238', '0');
INSERT INTO `cms_counter` VALUES ('98', '1', '浏览器输入网址访问', '1537106143', '120.204.17.46', '0');
INSERT INTO `cms_counter` VALUES ('99', '2', '浏览器输入网址访问', '1537106203', '101.91.60.108', '0');
INSERT INTO `cms_counter` VALUES ('100', '1', '浏览器输入网址访问', '1537106442', '112.28.182.5', '0');
INSERT INTO `cms_counter` VALUES ('101', '1', '浏览器输入网址访问', '1537106642', '183.160.60.54', '0');
INSERT INTO `cms_counter` VALUES ('102', '1', '浏览器输入网址访问', '1537106920', '36.60.44.58', '0');
INSERT INTO `cms_counter` VALUES ('103', '1', '浏览器输入网址访问', '1537148637', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('104', '1', '浏览器输入网址访问', '1537148681', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('105', '1', '浏览器输入网址访问', '1537154066', '101.132.97.53', '0');
INSERT INTO `cms_counter` VALUES ('106', '1', '浏览器输入网址访问', '1537164729', '47.92.99.247', '0');
INSERT INTO `cms_counter` VALUES ('107', '1', '浏览器输入网址访问', '1537167603', '101.105.67.131', '0');
INSERT INTO `cms_counter` VALUES ('108', '1', '浏览器输入网址访问', '1537167661', '101.89.239.245', '0');
INSERT INTO `cms_counter` VALUES ('109', '1', '浏览器输入网址访问', '1537183449', '58.243.250.218', '0');
INSERT INTO `cms_counter` VALUES ('110', '1', '浏览器输入网址访问', '1537183508', '61.129.6.251', '0');
INSERT INTO `cms_counter` VALUES ('111', '2', '浏览器输入网址访问', '1537183509', '61.151.178.177', '0');
INSERT INTO `cms_counter` VALUES ('112', '1', '浏览器输入网址访问', '1537243126', '61.129.6.147', '0');
INSERT INTO `cms_counter` VALUES ('113', '1', '浏览器输入网址访问', '1537247202', '101.105.67.131', '0');
INSERT INTO `cms_counter` VALUES ('114', '1', '浏览器输入网址访问', '1537247562', '101.89.239.216', '0');
INSERT INTO `cms_counter` VALUES ('115', '1', '浏览器输入网址访问', '1537247566', '101.89.239.238', '0');
INSERT INTO `cms_counter` VALUES ('116', '1', '浏览器输入网址访问', '1537247584', '61.129.6.203', '0');
INSERT INTO `cms_counter` VALUES ('117', '1', '浏览器输入网址访问', '1537247587', '101.91.60.11', '0');
INSERT INTO `cms_counter` VALUES ('118', '1', '浏览器输入网址访问', '1537247589', '101.91.62.99', '0');
INSERT INTO `cms_counter` VALUES ('119', '1', '浏览器输入网址访问', '1537247594', '101.227.139.164', '0');
INSERT INTO `cms_counter` VALUES ('120', '1', '浏览器输入网址访问', '1537247599', '61.151.178.177', '0');
INSERT INTO `cms_counter` VALUES ('121', '1', '浏览器输入网址访问', '1537247615', '101.91.60.11', '0');
INSERT INTO `cms_counter` VALUES ('122', '1', '浏览器输入网址访问', '1537247693', '101.91.60.106', '0');
INSERT INTO `cms_counter` VALUES ('123', '1', '浏览器输入网址访问', '1537247699', '61.129.6.225', '0');
INSERT INTO `cms_counter` VALUES ('124', '1', '浏览器输入网址访问', '1537248164', '101.89.29.78', '0');
INSERT INTO `cms_counter` VALUES ('125', '1', 'http://1536977751.cfjzb.ahcfwl.com/admin/index/index.html', '1537251987', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('126', '1', 'blank', '1537252047', '223.166.222.108', '0');
INSERT INTO `cms_counter` VALUES ('127', '1', 'blank', '1537252051', '101.89.29.92', '0');
INSERT INTO `cms_counter` VALUES ('128', '1', 'blank', '1537252161', '101.227.139.164', '0');
INSERT INTO `cms_counter` VALUES ('129', '1', 'blank', '1537252167', '61.151.178.177', '0');
INSERT INTO `cms_counter` VALUES ('130', '1', 'blank', '1537252172', '61.129.6.203', '0');
INSERT INTO `cms_counter` VALUES ('131', '1', 'blank', '1537252175', '101.91.60.108', '0');
INSERT INTO `cms_counter` VALUES ('132', '1', 'blank', '1537254463', '61.151.207.205', '0');
INSERT INTO `cms_counter` VALUES ('133', '1', 'blank', '1537254791', '101.91.60.11', '0');
INSERT INTO `cms_counter` VALUES ('134', '1', 'blank', '1537254794', '180.97.118.223', '0');
INSERT INTO `cms_counter` VALUES ('135', '1', 'blank', '1537254799', '180.97.118.223', '0');
INSERT INTO `cms_counter` VALUES ('136', '1', '浏览器输入网址访问', '1537256181', '101.105.67.131', '0');
INSERT INTO `cms_counter` VALUES ('137', '2', '浏览器输入网址访问', '1537256591', '61.129.6.145', '0');
INSERT INTO `cms_counter` VALUES ('138', '2', '浏览器输入网址访问', '1537256599', '101.89.239.238', '0');
INSERT INTO `cms_counter` VALUES ('139', '2', '浏览器输入网址访问', '1537256612', '61.151.207.186', '0');
INSERT INTO `cms_counter` VALUES ('140', '2', '浏览器输入网址访问', '1537256615', '101.89.239.216', '0');
INSERT INTO `cms_counter` VALUES ('141', '2', '浏览器输入网址访问', '1537256622', '61.129.6.225', '0');
INSERT INTO `cms_counter` VALUES ('142', '1', 'http://1536977751.cfjzb.ahcfwl.com/admin/index/index.html', '1537256645', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('143', '2', '浏览器输入网址访问', '1537256785', '101.227.139.171', '0');
INSERT INTO `cms_counter` VALUES ('144', '2', '浏览器输入网址访问', '1537256792', '101.105.67.131', '0');
INSERT INTO `cms_counter` VALUES ('145', '2', '浏览器输入网址访问', '1537256940', '61.151.178.165', '0');
INSERT INTO `cms_counter` VALUES ('146', '2', '浏览器输入网址访问', '1537257024', '101.91.60.104', '0');
INSERT INTO `cms_counter` VALUES ('147', '2', '浏览器输入网址访问', '1537257026', '61.151.178.165', '0');
INSERT INTO `cms_counter` VALUES ('148', '2', '浏览器输入网址访问', '1537257028', '101.91.60.110', '0');
INSERT INTO `cms_counter` VALUES ('149', '2', '浏览器输入网址访问', '1537257029', '61.129.6.145', '0');
INSERT INTO `cms_counter` VALUES ('150', '2', '浏览器输入网址访问', '1537257039', '61.129.8.179', '0');
INSERT INTO `cms_counter` VALUES ('151', '1', '浏览器输入网址访问', '1537258665', '47.92.35.138', '0');
INSERT INTO `cms_counter` VALUES ('152', '1', '浏览器输入网址访问', '1537261002', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('153', '1', '浏览器输入网址访问', '1537275782', '14.204.55.96', '0');
INSERT INTO `cms_counter` VALUES ('154', '1', '浏览器输入网址访问', '1537302109', '116.95.184.199', '0');
INSERT INTO `cms_counter` VALUES ('155', '1', '浏览器输入网址访问', '1537314151', '54.245.0.4', '0');
INSERT INTO `cms_counter` VALUES ('156', '1', '浏览器输入网址访问', '1537316222', '113.2.40.180', '0');
INSERT INTO `cms_counter` VALUES ('157', '1', '浏览器输入网址访问', '1537316947', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('158', '2', 'http://mytestjzb.ahcfwl.com:8080/mobile/category/2.html', '1537320997', '127.0.0.1', '0');
INSERT INTO `cms_counter` VALUES ('159', '1', 'http://182.61.35.184:8888/site', '1537347700', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('160', '1', 'http://182.61.35.184:8888/site', '1537348176', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('161', '1', 'http://182.61.35.184:8888/site', '1537348953', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('162', '1', 'http://182.61.35.184:8888/site', '1537349008', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('163', '1', '浏览器输入网址访问', '1537349926', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('164', '1', '浏览器输入网址访问', '1537350458', '180.163.220.124', '0');
INSERT INTO `cms_counter` VALUES ('165', '1', '浏览器输入网址访问', '1537352242', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('166', '1', '浏览器输入网址访问', '1537353120', '210.209.93.142', '0');
INSERT INTO `cms_counter` VALUES ('167', '1', '浏览器输入网址访问', '1537354727', '38.130.166.68', '0');
INSERT INTO `cms_counter` VALUES ('168', '1', '浏览器输入网址访问', '1537355114', '23.27.150.148', '0');
INSERT INTO `cms_counter` VALUES ('169', '1', 'https://182.61.35.184', '1537355664', '183.60.210.46', '0');
INSERT INTO `cms_counter` VALUES ('170', '1', '浏览器输入网址访问', '1537356468', '60.191.38.78', '0');
INSERT INTO `cms_counter` VALUES ('171', '1', '浏览器输入网址访问', '1537357838', '60.191.38.77', '0');
INSERT INTO `cms_counter` VALUES ('172', '1', '浏览器输入网址访问', '1537366363', '101.199.120.145', '0');
INSERT INTO `cms_counter` VALUES ('173', '1', '浏览器输入网址访问', '1537366680', '112.28.180.160', '0');
INSERT INTO `cms_counter` VALUES ('174', '1', 'https://182.61.35.184', '1537367985', '115.144.122.194', '0');
INSERT INTO `cms_counter` VALUES ('175', '1', '浏览器输入网址访问', '1537369668', '184.105.247.195', '0');
INSERT INTO `cms_counter` VALUES ('176', '1', 'http://182.61.35.184:443/', '1537374046', '218.211.168.178', '0');
INSERT INTO `cms_counter` VALUES ('177', '1', 'https://182.61.35.184', '1537380129', '183.60.210.46', '0');
INSERT INTO `cms_counter` VALUES ('178', '1', '浏览器输入网址访问', '1537384841', '111.201.145.60', '0');
INSERT INTO `cms_counter` VALUES ('179', '1', 'https://182.61.35.184', '1537392194', '183.60.210.62', '0');
INSERT INTO `cms_counter` VALUES ('180', '1', '浏览器输入网址访问', '1537403863', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('181', '1', '浏览器输入网址访问', '1537404001', '101.199.120.145', '0');
INSERT INTO `cms_counter` VALUES ('182', '1', 'https://182.61.35.184', '1537404265', '183.60.210.46', '0');
INSERT INTO `cms_counter` VALUES ('183', '1', 'https://182.61.35.184', '1537404266', '183.60.210.52', '0');
INSERT INTO `cms_counter` VALUES ('184', '1', 'https://182.61.35.184', '1537404266', '183.60.210.52', '0');
INSERT INTO `cms_counter` VALUES ('185', '1', 'https://182.61.35.184', '1537404266', '183.60.210.46', '0');
INSERT INTO `cms_counter` VALUES ('186', '1', 'https://182.61.35.184', '1537404266', '115.144.122.194', '0');
INSERT INTO `cms_counter` VALUES ('187', '1', 'https://baimusen.cn/admin/index/index.html', '1537408427', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('188', '1', '浏览器输入网址访问', '1537409053', '60.173.242.117', '0');
INSERT INTO `cms_counter` VALUES ('189', '1', 'http://a.jzb.com/category/1.html', '1650335385', '127.0.0.1', '0');

-- ----------------------------
-- Table structure for `cms_job`
-- ----------------------------
DROP TABLE IF EXISTS `cms_job`;
CREATE TABLE `cms_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateId` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `sortnum` int(10) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `graduate_time` varchar(50) DEFAULT NULL,
  `college` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `resumes` text,
  `appraise` text,
  `create_time` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_job
-- ----------------------------

-- ----------------------------
-- Table structure for `cms_join`
-- ----------------------------
DROP TABLE IF EXISTS `cms_join`;
CREATE TABLE `cms_join` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `county` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_join
-- ----------------------------

-- ----------------------------
-- Table structure for `cms_log`
-- ----------------------------
DROP TABLE IF EXISTS `cms_log`;
CREATE TABLE `cms_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `admin_name` varchar(50) DEFAULT NULL COMMENT '用户姓名',
  `description` varchar(300) DEFAULT NULL COMMENT '描述',
  `ip` char(60) DEFAULT NULL COMMENT 'IP地址',
  `status` tinyint(1) DEFAULT NULL COMMENT '1 成功 2 失败',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_log
-- ----------------------------
INSERT INTO `cms_log` VALUES ('1', '1', 'admin', '用户【admin】登录成功', '60.173.242.117', '1', '1536977586');
INSERT INTO `cms_log` VALUES ('2', '1', 'admin', '用户【admin】登录失败：密码错误', '60.173.242.117', '2', '1536995937');

-- ----------------------------
-- Table structure for `cms_member`
-- ----------------------------
DROP TABLE IF EXISTS `cms_member`;
CREATE TABLE `cms_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(32) DEFAULT NULL,
  `sex` int(10) DEFAULT NULL COMMENT '1男2女',
  `password` char(32) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `head_img` varchar(200) DEFAULT NULL,
  `realname` varchar(32) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL COMMENT '认证的手机号码',
  `create_time` int(11) DEFAULT '0' COMMENT '注册时间',
  `login_num` varchar(15) DEFAULT NULL COMMENT '登录次数',
  `status` tinyint(1) DEFAULT NULL COMMENT '1正常  0 禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_member
-- ----------------------------
INSERT INTO `cms_member` VALUES ('1', '1297282206', null, '14e1b600b1fd579f47433b88e8d85291', '3', null, '', '18255184417', '1650338438', '1', '1');

-- ----------------------------
-- Table structure for `cms_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `cms_member_group`;
CREATE TABLE `cms_member_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '留言Id',
  `group_name` varchar(32) NOT NULL COMMENT '留言评论作者',
  `group_cate` text,
  `status` tinyint(1) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '留言回复时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文章评论表';

-- ----------------------------
-- Records of cms_member_group
-- ----------------------------
INSERT INTO `cms_member_group` VALUES ('1', '普通会员', '', '1', '1523493569', '1528100340');
INSERT INTO `cms_member_group` VALUES ('2', '高级会员', '', '1', '1523493569', '1523697965');
INSERT INTO `cms_member_group` VALUES ('3', 'VIP会员', '', '1', '1523493569', '1523493588');

-- ----------------------------
-- Table structure for `cms_message`
-- ----------------------------
DROP TABLE IF EXISTS `cms_message`;
CREATE TABLE `cms_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_message
-- ----------------------------

-- ----------------------------
-- Table structure for `cms_online_config`
-- ----------------------------
DROP TABLE IF EXISTS `cms_online_config`;
CREATE TABLE `cms_online_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_online_config
-- ----------------------------
INSERT INTO `cms_online_config` VALUES ('1', 'status', '0');
INSERT INTO `cms_online_config` VALUES ('2', 'position', 'right');
INSERT INTO `cms_online_config` VALUES ('3', 'show_btn', '1');
INSERT INTO `cms_online_config` VALUES ('4', 'topSpace', '200');
INSERT INTO `cms_online_config` VALUES ('5', 'width', '160');
INSERT INTO `cms_online_config` VALUES ('6', 'bgcolor', '#FFFFFF');
INSERT INTO `cms_online_config` VALUES ('8', 'title', '在线客服');
INSERT INTO `cms_online_config` VALUES ('9', 'qrcode', null);
INSERT INTO `cms_online_config` VALUES ('10', 'content', '<p style=\"text-align: center;\">联系电话</p><h6 style=\"text-align: center;\"><strong><span style=\"font-size: 16px;\"><span style=\"font-size: 14px;font-family: 等线\">13916481905</span></span></strong></h6>');
INSERT INTO `cms_online_config` VALUES ('7', 'serviceLine', '');
INSERT INTO `cms_online_config` VALUES ('11', 'titcolor', '#FFFFFF');
INSERT INTO `cms_online_config` VALUES ('12', 'titbgcolor', '#262626');
INSERT INTO `cms_online_config` VALUES ('13', 'color', '#555555');
INSERT INTO `cms_online_config` VALUES ('14', 'is_open', '0');

-- ----------------------------
-- Table structure for `cms_online_list`
-- ----------------------------
DROP TABLE IF EXISTS `cms_online_list`;
CREATE TABLE `cms_online_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned NOT NULL,
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_icon` int(10) unsigned NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_online_list
-- ----------------------------

-- ----------------------------
-- Table structure for `cms_other_cate`
-- ----------------------------
DROP TABLE IF EXISTS `cms_other_cate`;
CREATE TABLE `cms_other_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `sortnum` int(10) DEFAULT NULL,
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '配置名称',
  `rules` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_other_cate
-- ----------------------------
INSERT INTO `cms_other_cate` VALUES ('1', '10', '热门搜索', '2', '1');
INSERT INTO `cms_other_cate` VALUES ('2', '20', '友情链接', '2', '1');
INSERT INTO `cms_other_cate` VALUES ('3', '30', '分类图标', '1,2', '1');
INSERT INTO `cms_other_cate` VALUES ('21', '40', '分类图标', '1,3', '1');

-- ----------------------------
-- Table structure for `cms_other_list`
-- ----------------------------
DROP TABLE IF EXISTS `cms_other_list`;
CREATE TABLE `cms_other_list` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `otherId` int(10) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `sortnum` int(10) DEFAULT '100' COMMENT '排序',
  `cateId` int(10) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_other_list
-- ----------------------------
INSERT INTO `cms_other_list` VALUES ('1', '1', '百沐森', '10', null, '', null, '1');
INSERT INTO `cms_other_list` VALUES ('2', '1', 'PVC复合地板', '20', null, '', null, '1');
INSERT INTO `cms_other_list` VALUES ('3', '1', 'PCV塑胶地板', '30', null, '', null, '1');
INSERT INTO `cms_other_list` VALUES ('4', '2', '晨飞网络', '10', null, 'http://www.hfcfwl.com/', null, '1');
INSERT INTO `cms_other_list` VALUES ('5', '2', '百度文库', '20', null, 'http://www.ahbaidu.cn/index.html', null, '1');

-- ----------------------------
-- Table structure for `cms_structure`
-- ----------------------------
DROP TABLE IF EXISTS `cms_structure`;
CREATE TABLE `cms_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(20) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `show_style` tinyint(1) unsigned NOT NULL,
  `bgcolor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `topSpace` int(10) DEFAULT NULL,
  `bottomSpace` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of cms_structure
-- ----------------------------
INSERT INTO `cms_structure` VALUES ('1', '4', '关于我们', '0', '#FFFFFF', '', '40', '40', '1');
INSERT INTO `cms_structure` VALUES ('2', '2', '产品中心', '0', '#FFFFFF', '', '40', '40', '1');
INSERT INTO `cms_structure` VALUES ('3', '6', '案例展示', '0', '#EBEBEB', '', '40', '40', '1');
INSERT INTO `cms_structure` VALUES ('4', '7', '新闻资讯', '0', '#EBEBEB', '', '40', '40', '1');
INSERT INTO `cms_structure` VALUES ('5', '8', '横幅01', '1', '#FFFFFF', '', '0', '0', '1');
INSERT INTO `cms_structure` VALUES ('6', '1', '热销产品', '0', '#FFFFFF', '', '40', '40', '1');
INSERT INTO `cms_structure` VALUES ('7', '5', '横幅02', '1', '#FFFFFF', '', '0', '0', '1');
INSERT INTO `cms_structure` VALUES ('8', '3', '横幅03', '1', '#FFFFFF', '', '40', '40', '1');

-- ----------------------------
-- Table structure for `cms_structure_module`
-- ----------------------------
DROP TABLE IF EXISTS `cms_structure_module`;
CREATE TABLE `cms_structure_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned NOT NULL,
  `module_class` int(10) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleStyle` tinyint(1) unsigned NOT NULL,
  `titPic` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `isMore` tinyint(1) unsigned DEFAULT NULL,
  `title_source` varchar(300) DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `cateId` int(10) DEFAULT NULL,
  `module_style` int(10) NOT NULL,
  `module_param` varchar(300) DEFAULT NULL,
  `module_content` text,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of cms_structure_module
-- ----------------------------
INSERT INTO `cms_structure_module` VALUES ('1', '1', '1', '关于我们', '', '2', '', '1', null, '0', '1', '3', '1|20|240|1|1|490|278|0|left', null, '1');
INSERT INTO `cms_structure_module` VALUES ('2', '1', '2', '产品中心', '', '1', '', '1', null, '0', '2', '5', '8|0|9|3|1|14|280|173|0|0', null, '1');
INSERT INTO `cms_structure_module` VALUES ('3', '1', '3', '案例展示', '', '1', '', '1', null, '0', '4', '1', '9|3|320|220|0|1|14|0|30|0|0|0|0', null, '1');
INSERT INTO `cms_structure_module` VALUES ('4', '2', '4', '新闻资讯', '', '2', '', '1', null, '640', '5', '2', '3|40|1|1|90|1|0|150|100|0|0|4', null, '1');
INSERT INTO `cms_structure_module` VALUES ('5', '1', '4', '地板知识', '', '2', '', '1', null, '520', '14', '7', '4|20|20|1|0|4', null, '1');
INSERT INTO `cms_structure_module` VALUES ('6', '1', '5', '横幅01', '', '0', '', '1', null, '0', '0', '4', null, '<p><img src=\"/uploads/ueditor/image/20180914/1536888169971137.jpg\" title=\"1536888169971137.jpg\" alt=\"横幅01.jpg\"/></p>', '1');
INSERT INTO `cms_structure_module` VALUES ('7', '1', '6', '热销产品', '', '1', '', '1', null, '0', '10', '1', '16|4|280|280|0|1|14|0|30|0|1|0|1', null, '1');
INSERT INTO `cms_structure_module` VALUES ('8', '1', '7', '横幅02', '', '0', '', '1', null, '0', '0', '4', null, '<p><img src=\"/uploads/ueditor/image/20180914/1536892551209916.jpg\" title=\"1536892551209916.jpg\" alt=\"横幅02.jpg\"/></p>', '1');
INSERT INTO `cms_structure_module` VALUES ('9', '1', '8', '横幅03', '', '0', '', '1', null, '0', '0', '4', null, '<p><a href=\"/category/6.html\" target=\"_self\"><img src=\"/uploads/ueditor/image/20180914/1536895681383418.jpg\" title=\"1536895681383418.jpg\" alt=\"横幅04-2.jpg\"/></a></p>', '1');

-- ----------------------------
-- Table structure for `cms_wap_config`
-- ----------------------------
DROP TABLE IF EXISTS `cms_wap_config`;
CREATE TABLE `cms_wap_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_wap_config
-- ----------------------------
INSERT INTO `cms_wap_config` VALUES ('1', 'wap_site_title', '百沐森塑胶地板');
INSERT INTO `cms_wap_config` VALUES ('2', 'wap_site_description', '百沐森塑胶地板');
INSERT INTO `cms_wap_config` VALUES ('3', 'wap_site_keyword', '百沐森塑胶地板');
INSERT INTO `cms_wap_config` VALUES ('4', 'wap_head_javascript', '');
INSERT INTO `cms_wap_config` VALUES ('5', 'wap_site_copy', '<p style=\"text-align: center;\">COPYRIGHT © 2018 百沐森塑胶地板</p><p style=\"text-align: center;\">&nbsp; 沪ICP备18034397号-1<br/></p><p style=\"text-align: center;\">POWERED BY HFCFWL.COM</p>');
INSERT INTO `cms_wap_config` VALUES ('11', 'newsParam', '10|0|1|50');
INSERT INTO `cms_wap_config` VALUES ('12', 'picParam', '8|2|0|1|0|40');
INSERT INTO `cms_wap_config` VALUES ('13', 'picTxtParam', '6|16|48|0');
INSERT INTO `cms_wap_config` VALUES ('6', 'wap_service_line', '400-888-8888');
INSERT INTO `cms_wap_config` VALUES ('7', 'wap_site_logo', '20180914/8cf765355c3efe44b7ae1eba6966c9d7.jpg');
INSERT INTO `cms_wap_config` VALUES ('8', 'wap_site_qrcode', '20180915/f70cf3cce85db4907c3638fd43a29f59.png');
INSERT INTO `cms_wap_config` VALUES ('9', 'wap_footer_javascript', '');
INSERT INTO `cms_wap_config` VALUES ('10', 'wap_service_qq', '13916481905');
INSERT INTO `cms_wap_config` VALUES ('14', 'wap_nav_style', '3');

-- ----------------------------
-- Table structure for `cms_wap_module`
-- ----------------------------
DROP TABLE IF EXISTS `cms_wap_module`;
CREATE TABLE `cms_wap_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titleStyle` tinyint(1) unsigned NOT NULL,
  `titPic` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_source` varchar(300) DEFAULT NULL,
  `bgcolor` varchar(100) DEFAULT NULL,
  `bgphoto` varchar(200) DEFAULT NULL,
  `topSpace` int(10) DEFAULT NULL,
  `bottomSpace` int(10) DEFAULT NULL,
  `cateId` int(10) DEFAULT NULL,
  `module_style` int(10) NOT NULL,
  `module_param` varchar(300) DEFAULT NULL,
  `module_content` text,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of cms_wap_module
-- ----------------------------
INSERT INTO `cms_wap_module` VALUES ('1', '1', '热销产品', '1', '', null, '#FFFFFF', '', '20', '20', '10', '1', '4|2|1|1|0|0|4|0', null, '0');
INSERT INTO `cms_wap_module` VALUES ('2', '2', '产品中心', '1', '', null, '#FFFFFF', '', '20', '20', '2', '1', '8|2|1|1|0|0|4|0', null, '1');
INSERT INTO `cms_wap_module` VALUES ('3', '3', '关于我们', '1', '', null, '#FFFFFF', '', '20', '20', '1', '3', '260|1|1|0|center', null, '1');
INSERT INTO `cms_wap_module` VALUES ('4', '5', '新闻中心', '2', '', '地板知识&3|行业资讯&13', '#FFFFFF', '', '20', '20', '3', '2', '4|14|1|1|28|0|0|0|4|0', null, '1');
INSERT INTO `cms_wap_module` VALUES ('5', '4', '案例展示', '1', '', null, '#FFFFFF', '', '20', '20', '4', '1', '6|2|1|1|0|0|4|0', null, '1');

-- ----------------------------
-- Table structure for `cms_wap_nav`
-- ----------------------------
DROP TABLE IF EXISTS `cms_wap_nav`;
CREATE TABLE `cms_wap_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cateId` int(10) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sortnum` (`sortnum`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_wap_nav
-- ----------------------------
INSERT INTO `cms_wap_nav` VALUES ('1', '10', '了解百沐森', '', '', '1', '1');
INSERT INTO `cms_wap_nav` VALUES ('2', '20', '产品中心', '', '', '2', '1');
INSERT INTO `cms_wap_nav` VALUES ('3', '30', '地板知识', '', '', '3', '1');
INSERT INTO `cms_wap_nav` VALUES ('4', '40', '案例展示', '', '', '4', '1');
INSERT INTO `cms_wap_nav` VALUES ('5', '50', '资讯动态', '', '', '5', '1');
INSERT INTO `cms_wap_nav` VALUES ('6', '60', '招商加盟', '', '', '6', '1');
INSERT INTO `cms_wap_nav` VALUES ('7', '70', '	在线咨询', '', '', '7', '1');
INSERT INTO `cms_wap_nav` VALUES ('8', '80', '联系我们', '', '', '8', '1');

-- ----------------------------
-- Table structure for `cms_watermark`
-- ----------------------------
DROP TABLE IF EXISTS `cms_watermark`;
CREATE TABLE `cms_watermark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_watermark
-- ----------------------------
INSERT INTO `cms_watermark` VALUES ('1', 'wm_type', '1');
INSERT INTO `cms_watermark` VALUES ('2', 'wm_position', '3');
INSERT INTO `cms_watermark` VALUES ('3', 'wm_text', '晨飞网络');
INSERT INTO `cms_watermark` VALUES ('4', 'wm_fontfamily', 'ARIAL.TTF');
INSERT INTO `cms_watermark` VALUES ('5', 'wm_fontsize', '18');
INSERT INTO `cms_watermark` VALUES ('6', 'wm_color', '#363636');
INSERT INTO `cms_watermark` VALUES ('7', 'wm_textquality', '75');
INSERT INTO `cms_watermark` VALUES ('8', 'wm_image', '20180517/8ec88063b0540184e7f649698cf62567.png');
INSERT INTO `cms_watermark` VALUES ('9', 'wm_alpha', '60');
INSERT INTO `cms_watermark` VALUES ('10', 'wm_imgquality', '75');

-- ----------------------------
-- Table structure for `cms_web_config`
-- ----------------------------
DROP TABLE IF EXISTS `cms_web_config`;
CREATE TABLE `cms_web_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_web_config
-- ----------------------------
INSERT INTO `cms_web_config` VALUES ('1', 'web_site_title', '百沐森塑胶地板');
INSERT INTO `cms_web_config` VALUES ('2', 'web_site_description', '百沐森塑胶地板');
INSERT INTO `cms_web_config` VALUES ('3', 'web_site_keyword', '百沐森塑胶地板');
INSERT INTO `cms_web_config` VALUES ('4', 'web_site_icp', ' 沪ICP备18034397号-1');
INSERT INTO `cms_web_config` VALUES ('5', 'web_head_javascript', '');
INSERT INTO `cms_web_config` VALUES ('6', 'web_site_copy', '<p style=\"text-align: center;\">Copyright © 2018 百沐森塑胶地板&nbsp; 沪ICP备18034397号-1&nbsp;</p><p style=\"text-align: center;\"><a href=\"http://hfcfwl.com\" target=\"_self\">技术支持：晨飞网络_一站式网络整合营销服务商！</a></p>');
INSERT INTO `cms_web_config` VALUES ('10', 'web_site_name', '百沐森塑胶地板');
INSERT INTO `cms_web_config` VALUES ('11', 'web_service_line', '13916481905');
INSERT INTO `cms_web_config` VALUES ('12', 'web_site_logo', '20180912/4cfce01e8273cc925e15ff3e069681cb.jpg');
INSERT INTO `cms_web_config` VALUES ('13', 'web_site_qrcode', null);
INSERT INTO `cms_web_config` VALUES ('14', 'web_site_ico', null);
INSERT INTO `cms_web_config` VALUES ('26', 'web_menu_style', '1');
INSERT INTO `cms_web_config` VALUES ('15', 'web_footer_javascript', '');
INSERT INTO `cms_web_config` VALUES ('16', 'web_rightbutton', '0');
INSERT INTO `cms_web_config` VALUES ('17', 'web_subnav', '1');
INSERT INTO `cms_web_config` VALUES ('19', 'web_site_contact', '<p>百沐森塑胶地板</p><p>地址：合肥市华东建材城D区107栋28号</p><p>电话：13916481905</p><p><br/></p>');
INSERT INTO `cms_web_config` VALUES ('20', 'web_site_member', '1');
INSERT INTO `cms_web_config` VALUES ('21', 'web_member_group', '1');
INSERT INTO `cms_web_config` VALUES ('22', 'web_member_reg', '1');
INSERT INTO `cms_web_config` VALUES ('23', 'web_site_style', '1');
INSERT INTO `cms_web_config` VALUES ('24', 'web_site_qq', '123456');
INSERT INTO `cms_web_config` VALUES ('25', 'web_nav_style', '1');
INSERT INTO `cms_web_config` VALUES ('27', 'web_site_search', '0');

-- ----------------------------
-- Table structure for `cms_web_inside_config`
-- ----------------------------
DROP TABLE IF EXISTS `cms_web_inside_config`;
CREATE TABLE `cms_web_inside_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_web_inside_config
-- ----------------------------
INSERT INTO `cms_web_inside_config` VALUES ('1', 'web_menu_style', '1');
INSERT INTO `cms_web_inside_config` VALUES ('4', 'detail_sidebar_style', '1');
INSERT INTO `cms_web_inside_config` VALUES ('2', 'web_site_qq', '123456');
INSERT INTO `cms_web_inside_config` VALUES ('3', 'cate_sidebar_style', '1');

-- ----------------------------
-- Table structure for `cms_web_sidebar`
-- ----------------------------
DROP TABLE IF EXISTS `cms_web_sidebar`;
CREATE TABLE `cms_web_sidebar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isMore` tinyint(1) DEFAULT NULL,
  `cateId` int(10) DEFAULT NULL,
  `module_style` int(10) NOT NULL,
  `module_param` varchar(300) DEFAULT NULL,
  `module_content` text,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of cms_web_sidebar
-- ----------------------------
INSERT INTO `cms_web_sidebar` VALUES ('1', '1', '地板知识', null, '3', '2', '6|20|0|30|0|0', null, '1');
INSERT INTO `cms_web_sidebar` VALUES ('2', '2', '产品展示', null, '2', '1', '3|230|180|1|1', null, '1');
