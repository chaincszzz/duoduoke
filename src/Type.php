<?php

namespace duoduoke;

trait Type {
    private $type = [
        // 商品
        'goods.cats.get'                  => 'pdd.goods.cats.get', // 获取拼多多标准商品类目信息
        'goods.opt.get'                   => 'pdd.goods.opt.get',//获得拼多多商品标签列表
        'goods.cps.unit.delete'           => 'pdd.goods.cps.unit.delete',//删除单品计划功能
        'goods.detail'                    => 'pdd.ddk.goods.detail', // 商品详情
        'goods.basic.info.get'            => 'pdd.ddk.goods.basic.info.get',//获取商品基本信息
        'goods.promotion.url.generate'    => 'pdd.ddk.goods.promotion.url.generate', // 生成普通商品推广链接
        'direct.goods.query'              => 'pdd.ddk.direct.goods.query', // 查询定向推广商品（仅查询关于自己的）
        'goods.recommend.get'             => 'pdd.ddk.goods.recommend.get', // 运营频道商品查询
        'top.goods.list.query'            => 'pdd.ddk.top.goods.list.query', //获取热销商品列表 多多客获取爆款排行商品接口
        'goods.search'                    => "pdd.ddk.goods.search",//多多进宝商品查询
        'goods.game.virtual.url.generate' => 'pdd.ddk.goods.game.virtual.url.generate',//多多进宝游戏推广链接生成
        'goods.guess.like'                => 'pdd.ddk.goods.guess.like',//多多进宝个性化推荐
        
        // 推广位
        'goods.pid.query'                 => 'pdd.ddk.goods.pid.query',//查询已经生成的推广位信息
        'goods.pid.generate'              => 'pdd.ddk.goods.pid.generate',//创建多多进宝推广位
        
        // 订单
        'order.detail.get'                => 'pdd.ddk.order.detail.get',//查询订单详情
        'app.new.bill.list.get'           => 'pdd.ddk.app.new.bill.list.get',//多多客拉新账单
        'order.list.range.get'            => 'pdd.ddk.order.list.range.get',//用时间段查询推广订单接口
        'order.list.increment.get'        => 'pdd.ddk.order.list.increment.get',//按照时间段获取授权多多客下面所有多多客的推广订单信息
        
        // 店铺
        'mall.goods.list.get'             => 'pdd.ddk.mall.goods.list.get', //查询店铺商品列表
        'mall.url.gen'                    => 'pdd.ddk.mall.url.gen', // 生成店铺推广链接
        'merchant.list.get'               => 'pdd.ddk.merchant.list.get',// 店铺列表查询,多多客查店铺列表接口
        'mall.coupon.url.gen'             => 'pdd.ddk.mall.coupon.url.gen',//多多客生成店铺优惠券推广链接API
        
        // 二维码
        'weapp.qrcode.url.gen'            => 'pdd.ddk.weapp.qrcode.url.gen', //多多客生成单品推广小程序二维码url
        'oauth.weapp.qrcode.url.gen'      => 'pdd.ddk.oauth.weapp.qrcode.url.gen', //多多客工具生成单品推广小程序二维码url 需要授权
        
        // 招商
        'goods.zs.unit.url.gen'           => 'pdd.ddk.goods.zs.unit.url.gen', //本功能适用于采集群等场景。将其他推广者的推广链接转换成自己的；通过此api，可以将他人的招商推广链接，转换成自己的招商推广链接。
        'zs.unit.goods.query'             => 'pdd.ddk.zs.unit.goods.query',//查询多多客招商推广计划商品
        'oauth.zs.unit.goods.query'       => 'pdd.ddk.oauth.zs.unit.goods.query',//查询招商推广计划商品 需要授权
        // 频道
        'resource.url.gen'                => 'pdd.ddk.resource.url.gen', //生成拼多多主站频道推广
        
        // 主题
        'theme.list.get'                  => 'pdd.ddk.theme.list.get',//查询多多进宝主题列表
        'theme.goods.search'              => 'pdd.ddk.theme.goods.search',//多多进宝主题商品查询
        'theme.prom.url.generate'         => 'pdd.ddk.theme.prom.url.generate', //多多进宝主题活动推广链接生成
        
        // 工具
        'cms.prom.url.generate'           => 'pdd.ddk.cms.prom.url.generate',//生成商城推广链接接口
        'rp.prom.url.generate'            => 'pdd.ddk.rp.prom.url.generate',// 生成红包推广链接接口
        'act.prom.url.generate'           => 'pdd.ddk.act.prom.url.generate',//生成活动推广链接（分享红包赚佣金）
        'check.in.prom.url.generate'      => 'pdd.ddk.check.in.prom.url.generate',//生成签到分享推广链接
        
        // 转盘
        'lottery.url.gen'                 => 'pdd.ddk.lottery.url.gen',//多多客工具生成转盘抽免单url
        'lottery.new.list.get'            => 'pdd.ddk.lottery.new.list.get',//多多客工具查询转盘拉新订单列表
        
        // 口令
        'phrase.generate'                 => 'pdd.ddk.phrase.generate',// 生成多多口令接口
    ];
}