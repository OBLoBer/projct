<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28
 * Time: 10:52
 */

namespace app\api\controller;


class Online extends Base
{
    /**
     *  设置任务计划
     * @return mixed|string
     *
            day_time    上线时间
            app_number  app当天任务数量
            pc_number   pc数量
            tips        下单提示
            plans_id    方案id
     */
    public function GoOnline(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $data = input();
        $data['time'] = time();
        $row = Model('sunday')->insert($data);
        return InfoMsage($row);
    }

    /**
     * 增值服务
     * @return mixed
    `waiter`  '包裹kg',
    `speed`   '快速任务（速度）  1/2/3',
    `commission`   '快速任务（佣金）',
    `first`      '快速任务（优先）',
    `over`       '安全优化（自动结束）',
    `interval`   '安全优化（发布间隔） 时间  /  数量',
    `cycle`      '安全优化（购物周期）1/2/3',
    `spcart`     '加入购物车',
    `browse`     '浏览商品',
    `store`      '收藏商品',
    `shop`       '收藏店铺',
    `coupons`    '申请优惠券',
    `baby`       '进入宝贝评价页',
    `chat`       '聊天服务 1/2/3',
    `label`      '优化标签 1/2',
    plans_id     方案id
     */
    public function ValueServce(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $result['time'] = time();
        $row = Model('online')->save($result);
        return InfoMsage($row);
    }

    /**
     *  好评/追评
     * @return mixed
    `hp_default`           '默认好评',
    `hp_quality`           '优质好评 单数',
    `hp_quality_content`   '优质好评 内容',
    `hp_define`            '自定义好评 单',
    `hp_define_content`    '自定义好评内容',
    `hp_picture`           '图文 单',
    `hp_picture_class`     '图文好评 分类',
    `hp_picture_spec`      '图文  商品规格',
    `hp_picture_keyword`   '图文  关键词',
    `he_picture_picture`   '图片',
    `zp_default`           '默认追评',
    `zp_quality`           '优质追评 单',
    `zp_quality_content`   '优质追评 内容',
    `zp_define`            '自定义追评  单',
    `zp_define_content`   '自定义追评内容',
    plans_id               方案id
     */
    public function GoodPraise(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $row = Model('praise')->save($result);
        return InfoMsage($row);
    }
}