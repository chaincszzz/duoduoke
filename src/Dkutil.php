<?php

namespace duoduoke;

class Dkutil {
    /**
     * 获取店铺类型
     *
     * @param $merchant_type
     *
     * @return string
     */
    public static function mall_type($merchant_type) {
        //$temp = ['个人','企业','旗舰店','专卖店','专营店','普通店'];
        switch ($merchant_type) {
            case 1:
                $str = '个人';
                break;
            case 2:
                $str = '企业';
                break;
            case 3:
                $str = '旗舰店';
                break;
            case 4:
                $str = '专卖店';
                break;
            case 5:
                $str = '专营店';
                break;
            case 6:
                $str = '普通店';
                break;
            default:
                $str = '普通店';
        }
        
        return $str;
    }
}