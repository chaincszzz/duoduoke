<?php

namespace duoduoke;

/**
 * Class Dk
 *
 * @package duoduoke
 *
 *  多客api
 *
 *  tips: 参数ext为非必填参数数组
 */
class Dk {
    use Base;
    use Type;
    
    /**
     * @param int $parent_cat_id 比填 值=0时为顶点cat_id,通过树顶级节点获取cat树
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 获取拼多多标准商品类目信息
     */
    public function goods_cats_get($parent_cat_id = 0) {
        $param = [
            'parent_cat_id' => $parent_cat_id,
        ];
        
        return $this->request($this->type['goods.cats.get'], $param);
    }
    
    /**
     * @param int $parent_opt_id 必填 值=0时为顶点opt_id,通过树顶级节点获取opt树
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 获得拼多多商品标签列表（非商品类目cat，当前仅开放给多多客使用）
     */
    public function goods_opt_get($parent_opt_id = 0) {
        $param = [
            'parent_opt_id' => $parent_opt_id,
        ];
        
        return $this->request($this->type['goods.opt.get'], $param);
    }
    
    /**
     * @param $goods_id
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 删除单品计划功能
     */
    public function goods_cps_unit_delete($goods_id) {
        $param = [
            'goods_id' => $goods_id,
        ];
        
        return $this->request($this->type['goods.cps.unit.delete'], $param);
    }
    
    /**
     * @param       $goods_id int 商品id
     * @param array $ext      非必填参数数组
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 获取商品详情
     */
    public function goods_detail($goods_id, $ext = []) {
        $param = [
            'goods_id_list' => "[{$goods_id}]",
        ];
        
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['goods.detail'], $param);
    }
    
    /**
     * @param $p_id     推广位id
     * @param $goods_id 商品id
     * @param $ext
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 生成普通商品推广链接
     */
    public function goods_promotion_url_generate($p_id, $goods_id, $ext = []) {
        $param = [
            'pid'           => $p_id,
            'goods_id_list' => "[{$goods_id}]",
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['goods.promotion.url.generate'], $param);
    }
    
    /**
     * @param       $p_id                   推广位id
     * @param bool  $generate_weapp_webview 是否唤起微信客户端， 默认false 否，true 是
     * @param array $ext
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 生成红包推广链接接口
     */
    public function rp_prom_url_generate($p_id, $generate_weapp_webview = FALSE, $ext = []) {
        $param = [
            'pid'                    => $p_id,
            'generate_weapp_webview' => $generate_weapp_webview,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['rp.prom.url.generate'], $param);
    }
    
    /**
     * @param int $page
     * @param int $page_size
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 查询多多进宝主题列表
     */
    public function theme_list_get($page = 1, $page_size = 20) {
        $param = [
            'page'      => $page,
            'page_size' => $page_size,
        ];
        
        return $this->request($this->type['theme.list.get'], $param);
    }
    
    /**
     * @param $theme_id
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 多多进宝主题商品查询
     */
    public function theme_goods_search($theme_id) {
        $param = [
            'theme_id' => $theme_id,
        ];
        
        return $this->request($this->type['theme.goods.search'], $param);
    }
    
    /**
     * @param       $pid      推广位id
     * @param       $theme_id 主题id
     * @param array $ext
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 多多进宝主题活动推广链接生成
     */
    public function theme_prom_url_generate($pid, $theme_id, $ext = []) {
        $param = [
            'pid'      => $pid,
            'theme_id' => "[{$theme_id}]",//主题ID列表,例如[1,235]
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['theme.prom.url.generate'], $param);
    }
    
    /**
     * @param int $page
     * @param int $page_size
     *
     * 查询定向推广商品（仅查询关于自己的）
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function direct_goods_query($page = 1, $page_size = 20) {
        $param = [
            'page'      => $page,
            'page_size' => $page_size,
        ];
        
        return $this->request($this->type['direct.goods.query'], $param);
    }
    
    /**
     * @param $source_url 需转链的链接
     * @param $pid        推广id
     *                    本功能适用于采集群等场景。将其他推广者的推广链接转换成自己的；通过此api，可以将他人的招商推广链接，转换成自己的招商推广链接。
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function goods_zs_unit_url_gen($source_url, $pid) {
        $param = [
            'source_url' => $source_url,
            'pid'        => $pid,
        ];
        
        return $this->request($this->type['goods.zs.unit.url.gen'], $param);
    }
    
    /**
     * @param     $zs_duo_id 招商多多客id
     * @param int $page
     * @param int $page_size
     *
     * 查询多多客招商推广计划商品
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function zs_unit_goods_query($zs_duo_id, $page = 1, $page_size = 20) {
        $param = [
            'zs_duo_id' => $zs_duo_id,
            'page'      => $page,
            'page_size' => $page_size,
        ];
        
        return $this->request($this->type['zs.unit.goods.query'], $param);
    }
    
    /**
     * @param $p_id     推广位id
     * @param $goods_id 商品id
     * @param $ext
     *
     * 多多客生成单品推广小程序二维码url
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function weapp_qrcode_url_gen($p_id, $goods_id, $ext) {
        $param = [
            'pid'      => $p_id,
            'goods_id' => $goods_id,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['weapp.qrcode.url.gen'], $param);
    }
    
    /**
     * @param array $goods_id_list id列表 [1,2,3,4,5]
     *                             获取商品基本信息
     *
     * @throws DkException
     */
    public function goods_basic_info_get($goods_id_list = []) {
        $tmp   = implode(',', $goods_id_list);
        $param = [
            'goods_id_list' => '[' . $tmp . ']',
        ];
        $this->request($this->type['goods.basic.info.get'], $param);
    }
    
    /**
     * @param array $ext
     *
     * 运营频道商品查询API
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function goods_recommend_get($offset = 0, $limit = 20, $ext = []) {
        $param = [
            'offset' => $offset,
            'limit'  => $limit,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['goods.recommend.get'], $param);
    }
    
    /**
     * @param $order_sn 订单号
     *                  查询订单详情
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function order_detail_get($order_sn) {
        $param = [
            'order_sn' => $order_sn,
        ];
        
        return $this->request($this->type['order.detail.get'], $param);
    }
    
    /**
     * @param     $mall_id 店铺id
     * @param int $page
     * @param int $page_size
     *                     店铺商品列表查询
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function mall_goods_list_get($mall_id, $page = 1, $page_size = 20) {
        $param = [
            'mall_id'   => $mall_id,
            'page'      => $page,
            'page_size' => $page_size,
        ];
        
        return $this->request($this->type['mall.goods.list.get'], $param);
    }
    
    /**
     * @param $mall_id 店铺id
     * @param $pid     推广位id
     * @param $ext
     *                 多多客工具生成店铺推广链接API
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function mall_url_gen($mall_id, $pid, $ext) {
        $param = [
            'mall_id' => $mall_id,
            'pid'     => $pid,
        ];
        
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['mall.url.gen'], $param);
    }
    
    /**
     * @param string $pid 推广位id
     * @param array  $ext
     *                    生成转盘抽免单url
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function lottery_url_gen($pid = '', $ext = []) {
        $param = [
            'pid_list' => "['{$pid}']",
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['lottery.url.gen'], $param);
    }
    
    /**
     * @param       $pid
     * @param int   $page
     * @param int   $page_size
     * @param array $ext
     * 转盘拉新订单列表
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function lottery_new_list_get($pid, $page = 1, $page_size = 20, $ext = []) {
        $param = [
            'page'      => $page,
            'page_size' => $page_size,
            'pid'       => $pid,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['lottery.new.list.get'], $param);
    }
    
    /**
     * @param $pid           STRING 必填 推广位
     * @param $resource_type INTEGER 非必填  频道来源：4-限时秒杀,39997-充值中心, 39998-转链type，39999-电器城
     * @param $url           STRING 非必填 原链接
     *
     * 生成拼多多主站频道推广
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function resource_url_gen($pid, $resource_type = '', $url = '') {
        $param = [
            'pid'           => $pid,
            'resource_type' => $resource_type,
            'url'           => $url,
        ];
        
        return $this->request($this->type['resource.url.gen'], $param);
    }
    
    /**
     * @param array $ext
     * 店铺列表接口
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function merchant_list_get($ext = []) {
        $param = $ext;
        
        return $this->request($this->type['merchant.list.get'], $param);
    }
    
    /**
     * @param array $ext
     * 热销商品列表
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function top_goods_list_query($ext = []) {
        $param = $ext;
        
        return $this->request($this->type['top.goods.list.query'], $param);
    }
    
    /**
     * @param       $pid
     * @param       $goods_id
     * @param array $ext
     * 生成多多口令接口
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function phrase_generate($pid, $goods_id, $ext = []) {
        $param = [
            'p_id'          => $pid,
            'goods_id_list' => "[$goods_id]",
        ];
        
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['phrase.generate'], $param);
    }
    
    /**
     * @param $ext
     * 生成活动推广链接（分享红包赚佣金）
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function act_prom_url_generate($ext) {
        $param = [
            'url_type' => 1,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['act.prom.url.generate'], $param);
    }
    
    /**
     * @param       $start 开始时间
     * @param       $end
     * @param int   $page
     * @param int   $page_size
     * @param array $ext
     *                     多多客拉新账单
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function app_new_bill_list_get($start, $end, $page = 1, $page_size = 100, $ext = []) {
        $param = [
            'start_time' => $start,
            'end_time'   => $end,
            'page'       => $page,
            'page_size'  => $page_size,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['app.new.bill.list.get'], $param);
    }
    
    /**
     * @param $pid
     * @param $ext
     * 生成签到分享推广链接
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function check_in_prom_url_generate($pid, $ext) {
        $param = [
            'p_id' => $pid,
        ];
        
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['check.in.prom.url.generate'], $param);
    }
    
    /**
     * @param       $mall_id
     * @param       $pid
     * @param array $coupon_ids [1,2,3,45]
     * @param array $ext
     *                          生成店铺优惠券推广链接API
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function mall_coupon_url_gen($mall_id, $pid, $coupon_ids = [], $ext = []) {
        $coupon_id = implode(',', $coupon_ids);
        $param     = [
            'mall_id'    => $mall_id,
            'pid'        => $pid,
            'coupon_ids' => '[' . $coupon_id . ']',
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['mall.coupon.url.gen'], $param);
    }
    
    /**
     * @param     $start
     * @param     $end
     * @param int $page
     * @param int $page_size
     * 用时间段查询推广订单接口
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function order_list_range_get($start, $end, $page = 1, $page_size = 30) {
        $param = [
            'start_update_time' => $start,
            'end_update_time'   => $end,
            'page'              => $page,
            'page_size'         => $page_size,
        ];
        
        return $this->request($this->type['order.list.range.get'], $param);
    }
    
    /**
     * @param       $pid
     * @param array $ext
     * 生成商城推广链接接口
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function cms_prom_url_generate($pid, $ext = []) {
        $param = [
            'p_id_list' => "[$pid]",
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['cms.prom.url.generate'], $param);
    }
    
    /**
     * @param $page
     * @param $page_size
     * 查询已经生成的推广位信息
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function goods_pid_query($page, $page_size) {
        $param = [
            'page'      => $page,
            'page_size' => $page_size,
        ];
        
        return $this->request($this->type['goods.pid.query'], $param);
    }
    
    /**
     * @param       $number
     * @param array $ext
     *
     * @return bool|mixed|string
     * @throws DkException
     *
     * 创建多多进宝推广位
     */
    public function goods_pid_generate($number, $ext = []) {
        $param = [
            'number' => $number,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['goods.pid.generate'], $param);
    }
    
    /**
     * @param string $keyword
     * @param string $opt_id
     * @param int    $page
     * @param int    $page_size
     * @param array  $ext
     *
     * 多多进宝商品列表查询
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function goods_search($keyword = '', $opt_id = '', $page = 1, $page_size = 1, $ext = []) {
        $param = [
            'keyword'   => $keyword,
            'opt_id'    => $opt_id,
            'page'      => $page,
            'page_size' => $page_size,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['goods.search'], $param);
    }
    
    /**
     * @param $pid
     * @param $ext
     * 多多进宝游戏推广链接生成
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function goods_game_virtual_url_generate($pid, $ext) {
        $param = [
            'p_id' => $pid,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['goods.game.virtual.url.generate'], $param);
    }
    
    /**
     * @param       $start 时间戳
     * @param       $end
     * @param int   $page
     * @param int   $page_size
     * @param array $ext
     *                     按照时间段获取授权多多客下面所有多多客的推广订单信息
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function order_list_increment_get($start, $end, $page = 1, $page_size = 20, $ext = []) {
        $param = [
            'start_update_time' => $start,
            'end_update_time'   => $end,
            'page'              => $page,
            'page_size'         => $page_size,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['order.list.increment.get'], $param);
    }
    
    /**
     * @param $pid
     * @param $ext
     * 多多进宝个性化推荐
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function goods_guess_like($pid, $ext) {
        $param = [
            'pid' => $pid,
        ];
        if ($ext) {
            $param = array_merge($param, $ext);
        }
        
        return $this->request($this->type['goods.guess.like'], $param);
    }
}