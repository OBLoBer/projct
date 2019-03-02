/*
Navicat MySQL Data Transfer

Source Server         : project
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-02 16:52:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for prj_classtion
-- ----------------------------
DROP TABLE IF EXISTS `prj_classtion`;
CREATE TABLE `prj_classtion` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) NOT NULL COMMENT '分类',
  `class` varchar(255) NOT NULL COMMENT '分类详情',
  `time` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_classtion
-- ----------------------------
INSERT INTO `prj_classtion` VALUES ('1', '搜索单', '指定买家通过关键词，淘口令，二维码入店', '10');
INSERT INTO `prj_classtion` VALUES ('2', '追评单', '针对已产生评价的任务，对商品进行追评，用来优化评价', '11');
INSERT INTO `prj_classtion` VALUES ('3', '会访单', '买家第一天收藏加购，第二天下单', '12');

-- ----------------------------
-- Table structure for prj_details
-- ----------------------------
DROP TABLE IF EXISTS `prj_details`;
CREATE TABLE `prj_details` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `wwpicture` varchar(120) NOT NULL COMMENT '旺旺图片',
  `bank` varchar(20) NOT NULL COMMENT '银行卡用户名/卡号/开户银行',
  `Recommend` varchar(30) NOT NULL COMMENT '推荐人微信/推荐码',
  `state` int(2) NOT NULL COMMENT '客服验证',
  `ding` varchar(60) NOT NULL COMMENT '绑定店铺',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_details
-- ----------------------------

-- ----------------------------
-- Table structure for prj_online
-- ----------------------------
DROP TABLE IF EXISTS `prj_online`;
CREATE TABLE `prj_online` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `waiter` varchar(100) NOT NULL COMMENT '包裹kg',
  `speed` varchar(60) NOT NULL COMMENT '快速任务（速度）  1/2/3',
  `commission` varchar(60) NOT NULL COMMENT '快速任务（佣金）',
  `first` varchar(30) NOT NULL COMMENT '快速任务（优先）',
  `over` varchar(60) NOT NULL COMMENT '安全优化（自动结束）',
  `interval` varchar(60) NOT NULL COMMENT '安全优化（发布间隔） 时间  /  数量',
  `cycle` varchar(30) NOT NULL COMMENT '安全优化（购物周期）1/2/3',
  `spcart` int(3) NOT NULL COMMENT '加入购物车',
  `browse` int(3) NOT NULL COMMENT '浏览商品',
  `store` int(3) NOT NULL COMMENT '收藏商品',
  `shop` int(2) NOT NULL COMMENT '收藏店铺',
  `coupons` int(3) NOT NULL COMMENT '申请优惠券',
  `baby` int(3) NOT NULL COMMENT '进入宝贝评价页',
  `chat` varchar(30) NOT NULL COMMENT '聊天服务 1/2/3',
  `label` varchar(40) NOT NULL COMMENT '优化标签 1/2',
  `praise_id` int(6) NOT NULL COMMENT '好评优化',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_online
-- ----------------------------
INSERT INTO `prj_online` VALUES ('1', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '1551344378');
INSERT INTO `prj_online` VALUES ('2', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '1551344397');

-- ----------------------------
-- Table structure for prj_order
-- ----------------------------
DROP TABLE IF EXISTS `prj_order`;
CREATE TABLE `prj_order` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL COMMENT '商品链接',
  `shop` int(6) NOT NULL COMMENT '店铺',
  `name` varchar(60) NOT NULL COMMENT '商品名称',
  `pictures` varchar(200) NOT NULL COMMENT '商品图片',
  `price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `number` int(12) NOT NULL COMMENT '数量',
  `prices` decimal(10,2) NOT NULL COMMENT '展示价格',
  `postage` int(2) NOT NULL COMMENT '包邮/0|1',
  `ordernb` varchar(30) NOT NULL COMMENT '订单号',
  `state` int(2) NOT NULL COMMENT '支付状态/0/1/2 ',
  `coupon` varchar(255) NOT NULL COMMENT '优惠方式',
  `names` varchar(120) NOT NULL COMMENT '下单规格',
  `user_id` varchar(255) NOT NULL COMMENT '用户ID',
  `plan_id` varchar(255) NOT NULL COMMENT '方案ID',
  `time` varchar(15) NOT NULL COMMENT '下单时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_order
-- ----------------------------
INSERT INTO `prj_order` VALUES ('1', '55', '55', '55', '55', '15.00', '455', '15.00', '15', 'PRECOOD5484083', '0', '566', '15', '', '2', '1551093001');
INSERT INTO `prj_order` VALUES ('4', 'www.baidu.com', '1', '', ' ', '10.00', '5', '5.00', '0', 'PRECOOD9440700', '0', '', '', '', '7', '1550893821');
INSERT INTO `prj_order` VALUES ('5', 'www.baidu.com', '1', '', ' ', '10.00', '5', '5.00', '0', 'PRECOOD8692477', '0', '', '', '', '0', '1550893831');
INSERT INTO `prj_order` VALUES ('6', 'www.baidu.com', '1', '', ' ', '10.00', '5', '5.00', '0', 'PRECOOD500936', '0', '', '', '', '10,11', '1550893880');
INSERT INTO `prj_order` VALUES ('7', 'www.baidu.com', '1', '', ' ', '10.00', '5', '5.00', '0', 'PRECOOD2727697', '0', '', '', '', '0', '1550893939');
INSERT INTO `prj_order` VALUES ('8', 'www.baidu.com', '1', '', ' ', '10.00', '5', '5.00', '0', 'PRECOOD2604817', '0', '', 'pnK', '', '0', '1550893995');
INSERT INTO `prj_order` VALUES ('9', 'www.baidu.com', '1', '', ' ', '10.00', '5', '5.00', '0', 'PRECOOD3132385', '0', '', '12346\ZZ', '1', '0', '1550894024');
INSERT INTO `prj_order` VALUES ('10', '123', '1', '123', '123.00', '123.00', '123', '123.00', '123', 'PRECOOD7150914', '0', '', '啥阿萨德', '1', '0,1', '1550894176');

-- ----------------------------
-- Table structure for prj_plan
-- ----------------------------
DROP TABLE IF EXISTS `prj_plan`;
CREATE TABLE `prj_plan` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `prog` varchar(100) NOT NULL COMMENT '方案名称',
  `app_crux` varchar(255) NOT NULL COMMENT 'app关键词',
  `app_command` text COMMENT 'app口令',
  `app_rwm` varchar(255) NOT NULL COMMENT 'app二维码',
  `app_service` varchar(100) NOT NULL COMMENT '折扣服务',
  `app_screen` varchar(100) NOT NULL COMMENT '筛选分类',
  `app_sort` varchar(100) NOT NULL COMMENT '排序方式',
  `app_price` varchar(255) NOT NULL COMMENT '价格',
  `app_delivery` varchar(255) NOT NULL COMMENT '发货地',
  `pc_crux` varchar(255) NOT NULL COMMENT 'pc关键词',
  `pc_service` varchar(100) NOT NULL COMMENT 'pc服务',
  `pc_sort` varchar(100) NOT NULL COMMENT 'pc排序方式',
  `pc_screen` varchar(100) NOT NULL COMMENT 'pc筛选分类',
  `pc_price` varchar(100) NOT NULL COMMENT 'pc价格',
  `order_id` varchar(12) NOT NULL COMMENT '关联订单id',
  `pc_delivery` varchar(100) NOT NULL COMMENT 'pc发货地',
  `time` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_plan
-- ----------------------------
INSERT INTO `prj_plan` VALUES ('21', '菜鸟教程', '菜鸟', 'www.runoob.com1111', '', '', '', '', '', '', '', '', '', '', '', '10', '', '');

-- ----------------------------
-- Table structure for prj_platform
-- ----------------------------
DROP TABLE IF EXISTS `prj_platform`;
CREATE TABLE `prj_platform` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL COMMENT '平台名称',
  `set_id` int(12) DEFAULT NULL COMMENT '关联id',
  `class_id` varchar(32) NOT NULL COMMENT '分类id',
  `class_tow` varchar(30) NOT NULL,
  `class_frow` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_platform
-- ----------------------------
INSERT INTO `prj_platform` VALUES ('1', '淘宝', '1', '1,2,3', '2', '3', '0');
INSERT INTO `prj_platform` VALUES ('2', 'ds', '1', '1,3,4', '0', '0', '0');

-- ----------------------------
-- Table structure for prj_praise
-- ----------------------------
DROP TABLE IF EXISTS `prj_praise`;
CREATE TABLE `prj_praise` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `hp_default` int(12) NOT NULL COMMENT '默认好评',
  `hp_quality` int(12) NOT NULL COMMENT '优质好评 单数',
  `hp_quality_content` varchar(255) NOT NULL COMMENT '优质好评 内容',
  `hp_define` int(12) NOT NULL COMMENT '自定义好评 单',
  `hp_define_content` varchar(255) NOT NULL COMMENT '自定义好评内容',
  `hp_picture` int(12) NOT NULL COMMENT '图文 单',
  `hp_picture_class` varchar(60) NOT NULL COMMENT '图文好评 分类',
  `hp_picture_spec` varchar(60) NOT NULL COMMENT '图文  商品规格',
  `hp_picture_keyword` varchar(150) NOT NULL COMMENT '图文  关键词',
  `he_picture_picture` varchar(255) NOT NULL COMMENT '图片',
  `zp_default` int(12) NOT NULL COMMENT '默认追评',
  `zp_quality` int(12) NOT NULL COMMENT '优质追评 单',
  `zp_quality_content` varchar(255) NOT NULL COMMENT '优质追评 内容',
  `zp_define` int(12) NOT NULL COMMENT '自定义追评  单',
  `zp_define_content` varchar(255) NOT NULL COMMENT '自定义追评内容',
  `set_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_praise
-- ----------------------------

-- ----------------------------
-- Table structure for prj_shop
-- ----------------------------
DROP TABLE IF EXISTS `prj_shop`;
CREATE TABLE `prj_shop` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `category_one` varchar(255) NOT NULL COMMENT '店铺类目1',
  `category_tow` varchar(255) NOT NULL COMMENT '店铺类目2',
  `name` varchar(60) NOT NULL COMMENT '店铺名称',
  `link` varchar(255) NOT NULL COMMENT '店铺链接',
  `parts` varchar(30) NOT NULL COMMENT '发件人',
  `phone` int(11) NOT NULL COMMENT '发件人电话',
  `address_province` varchar(255) NOT NULL COMMENT '省',
  `address_city` varchar(100) NOT NULL COMMENT '城市',
  `address` varchar(255) NOT NULL COMMENT '地区',
  `address_detailed` varchar(255) NOT NULL COMMENT '详细发货地址',
  `state` int(1) NOT NULL COMMENT '审核状态 0/1/2',
  `uset` varchar(30) NOT NULL COMMENT '对应平台',
  `shopclass` varchar(255) NOT NULL COMMENT '店铺验证码',
  `wangwang` varchar(120) NOT NULL COMMENT '旺旺',
  `user_id` int(12) NOT NULL COMMENT '绑定用户',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_shop
-- ----------------------------
INSERT INTO `prj_shop` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '淘宝', '1', '1', '1', '1');
INSERT INTO `prj_shop` VALUES ('2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '淘宝', '1', '1', '1', '1');
INSERT INTO `prj_shop` VALUES ('3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '淘宝', '1', '1', '12', '1');
INSERT INTO `prj_shop` VALUES ('4', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '天猫', '2', '2', '22', '2');
INSERT INTO `prj_shop` VALUES ('5', '2', '2', '2', '2', '2', '2', '2', '2', '2', '22', '2', '天猫', '2', '2', '1', '2');
INSERT INTO `prj_shop` VALUES ('6', '6', '6', '6', '6', '66', '6', '6', '6', '6', '66', '6', '京东', '6', '6', '13', '');

-- ----------------------------
-- Table structure for prj_sunday
-- ----------------------------
DROP TABLE IF EXISTS `prj_sunday`;
CREATE TABLE `prj_sunday` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `day_time` varchar(255) NOT NULL COMMENT '上线时间',
  `app_number` int(12) NOT NULL COMMENT '当天任务数量',
  `pc_number` int(12) NOT NULL COMMENT 'pc数量',
  `tips` varchar(255) NOT NULL COMMENT '下单提示',
  `plans_id` int(12) NOT NULL COMMENT '关联方案表ID',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_sunday
-- ----------------------------
INSERT INTO `prj_sunday` VALUES ('1', '10', '0', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('2', '10', '0', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('3', '10', '0', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('4', '10', '0', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('5', '10', '0', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('6', '10', '11', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('7', '10', '11', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('8', '10', '11', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('9', '10', '11', '0', '', '1', '');
INSERT INTO `prj_sunday` VALUES ('10', '10', '11', '0', '', '1', '');

-- ----------------------------
-- Table structure for prj_task
-- ----------------------------
DROP TABLE IF EXISTS `prj_task`;
CREATE TABLE `prj_task` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `plant_id` varchar(60) NOT NULL COMMENT '任务平台',
  `classtask_id` varchar(60) NOT NULL COMMENT '下单类型',
  `order_id` int(12) NOT NULL COMMENT '对应订单id',
  `task_id` varchar(12) NOT NULL COMMENT '方案订单ID',
  `user_id` varchar(50) NOT NULL COMMENT '用户ID',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_task
-- ----------------------------
INSERT INTO `prj_task` VALUES ('1', '1', '1', '1', '2', '', '');
INSERT INTO `prj_task` VALUES ('2', '2', '1', '1', '2', '', '1551064137');
INSERT INTO `prj_task` VALUES ('3', '1', '', '2', '', '', '1551170779');
INSERT INTO `prj_task` VALUES ('4', '1', '1', '2', '', '', '1551170820');
INSERT INTO `prj_task` VALUES ('5', '1', '1', '2', '', '', '1551170951');
INSERT INTO `prj_task` VALUES ('6', '1', '1', '2', '', '', '1551171015');
INSERT INTO `prj_task` VALUES ('7', '1', '1', '4', '', '', '1551171039');
INSERT INTO `prj_task` VALUES ('8', '1', '1', '4', '', '', '1551171081');
INSERT INTO `prj_task` VALUES ('9', '1', '1', '4', '', '', '1551171086');
INSERT INTO `prj_task` VALUES ('10', '1', '1', '6', '', '', '1551171104');
INSERT INTO `prj_task` VALUES ('11', '1', '1', '6', '', '', '1551171109');

-- ----------------------------
-- Table structure for prj_user
-- ----------------------------
DROP TABLE IF EXISTS `prj_user`;
CREATE TABLE `prj_user` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '用户名',
  `phone` varchar(11) NOT NULL COMMENT '手机号码',
  `wangwang` varchar(32) NOT NULL COMMENT '旺旺号',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `qq` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL COMMENT '注册码',
  `set_id` int(12) NOT NULL,
  `time` varchar(16) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user
-- ----------------------------
INSERT INTO `prj_user` VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2');
INSERT INTO `prj_user` VALUES ('3', '3', '3', '3', '3', '3', '3', '3', '3');
INSERT INTO `prj_user` VALUES ('4', '4', '4', '4', '4', '4', '4', '4', '4');
INSERT INTO `prj_user` VALUES ('1', '123456', '18323436980', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', '123456', '0', '1550833923');

-- ----------------------------
-- Table structure for prj_user_binding
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_binding`;
CREATE TABLE `prj_user_binding` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '会员名',
  `max` varchar(255) NOT NULL COMMENT '性别/图片',
  `address` varchar(255) NOT NULL COMMENT '常用登录地  值1  /  值2',
  `address_ip` varchar(255) NOT NULL COMMENT 'IP所在地截图',
  `naughty` varchar(255) NOT NULL COMMENT '淘气值截图',
  `huab` varchar(255) NOT NULL COMMENT '花呗截图',
  `shop` varchar(255) NOT NULL COMMENT '购物记录截图',
  `username` varchar(30) NOT NULL COMMENT '收货人姓名',
  `addre_dq` varchar(40) NOT NULL COMMENT '所在地区',
  `addre_dz` varchar(30) NOT NULL COMMENT '街道地址',
  `phone` varchar(12) NOT NULL COMMENT '收货人手机',
  `name_zfb` varchar(40) NOT NULL COMMENT '支付宝认证姓名',
  `picture_zfb` varchar(255) NOT NULL COMMENT '支付宝实名认证截图',
  `user_id` int(12) NOT NULL COMMENT '绑定用户',
  `lpatform_id` int(12) NOT NULL COMMENT '平台',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_binding
-- ----------------------------
INSERT INTO `prj_user_binding` VALUES ('1', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '1', '');

-- ----------------------------
-- Table structure for prj_user_card
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_card`;
CREATE TABLE `prj_user_card` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '持卡人姓名',
  `card` varchar(40) NOT NULL COMMENT '银行卡号',
  `cardid` varchar(30) NOT NULL COMMENT '身份证号码',
  `phone` varchar(12) NOT NULL COMMENT '开户手机',
  `bank` varchar(40) NOT NULL COMMENT '银行',
  `city` varchar(50) NOT NULL COMMENT '开户地址',
  `branch` varchar(100) NOT NULL COMMENT '开户支行名称',
  `user_id` varchar(30) NOT NULL COMMENT '绑定银行卡用户',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_card
-- ----------------------------
INSERT INTO `prj_user_card` VALUES ('1', '1', '1', '1', '1', '11', '1', '1', '1', '11');
INSERT INTO `prj_user_card` VALUES ('2', '黄杰', '12312345678912318945', '555555555555555555', '11111111111', '11', '528456165/12364156', '25852585', '2', '1551437062');
INSERT INTO `prj_user_card` VALUES ('4', '黄杰', '12312345678912318945', '555555555555555555', '11111111111', '11', '528456165/12364156', '25852585', '3', '1551437117');

-- ----------------------------
-- Table structure for prj_user_cash
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_cash`;
CREATE TABLE `prj_user_cash` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `mony` varchar(30) NOT NULL COMMENT '提现金额/浮点',
  `user_id` int(6) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_cash
-- ----------------------------

-- ----------------------------
-- Table structure for prj_user_grade
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_grade`;
CREATE TABLE `prj_user_grade` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(30) NOT NULL COMMENT '等级名称',
  `grade_nuber` varchar(30) NOT NULL COMMENT '等级评分',
  `grade_price` decimal(10,2) NOT NULL COMMENT '接单金额',
  `set_id` int(6) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_grade
-- ----------------------------

-- ----------------------------
-- Table structure for prj_user_mony
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_mony`;
CREATE TABLE `prj_user_mony` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL COMMENT '绑定用户',
  `mony` int(12) NOT NULL COMMENT '用户垫付金额',
  `order_id` int(12) NOT NULL COMMENT '垫付任务',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_mony
-- ----------------------------

-- ----------------------------
-- Table structure for prj_user_plan
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_plan`;
CREATE TABLE `prj_user_plan` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(20) NOT NULL COMMENT '任务平台',
  `port` varchar(40) NOT NULL COMMENT '任务终端',
  `account` varchar(30) NOT NULL COMMENT '账号',
  `class` varchar(30) NOT NULL COMMENT '任务分类',
  `orderset_id` int(12) NOT NULL COMMENT '任务ID',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_plan
-- ----------------------------

-- ----------------------------
-- Table structure for prj_user_point
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_point`;
CREATE TABLE `prj_user_point` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL COMMENT '用户ID',
  `nuber` int(30) NOT NULL COMMENT '浮点总量',
  `business` varchar(30) NOT NULL COMMENT '商家返还浮点',
  `return` varchar(30) NOT NULL COMMENT '待返还浮点',
  `frozen` varchar(30) NOT NULL COMMENT '冻结浮点',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_point
-- ----------------------------

-- ----------------------------
-- Table structure for prj_user_user
-- ----------------------------
DROP TABLE IF EXISTS `prj_user_user`;
CREATE TABLE `prj_user_user` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(32) NOT NULL COMMENT '用户手机',
  `password` varchar(64) NOT NULL COMMENT '用户密码',
  `qq` varchar(30) NOT NULL,
  `cash` varchar(60) NOT NULL COMMENT '提现密码',
  ` grade_id` int(12) NOT NULL COMMENT '用户等级',
  `point` int(12) NOT NULL COMMENT '用户浮点',
  `money_id` varchar(30) NOT NULL COMMENT '用户垫付金额',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prj_user_user
-- ----------------------------
INSERT INTO `prj_user_user` VALUES ('1', '1', '1', '', '', '0', '0', '', '1');
INSERT INTO `prj_user_user` VALUES ('2', '18323436980', 'e10adc3949ba59abbe56e057f20f883e', '1605805630', '315dc40c9211adc3cef8dbe72633841c', '0', '0', '', '1551432738');
