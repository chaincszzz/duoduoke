<?php

namespace duoduoke;

trait Base {
    private $remote = "https://gw-api.pinduoduo.com/api/router";
    
    private $client_id = "";
    private $client_secret = "";
    
    public function __construct($client_id, $client_secret) {
        $this->client_id     = $client_id;
        $this->client_secret = $client_secret;
    }
    
    /**
     * @param        $type
     * @param array  $data
     * @param string $token
     *
     * @return bool|mixed|string
     * @throws DkException
     */
    public function request($type, array $data, $token = '') {
        $common = [
            'type'         => $type,
            'client_id'    => $this->client_id,
            'access_token' => $token,
            "timestamp"    => time(),
        ];
        
        $data         = array_merge($common, $data);
        $data['sign'] = $this->signData($data);
        
        $url = $this->remote . "?" . http_build_query($data);
        $res = $this->https_request($url, []);
        if (!$res) {
            throw new DkException('miss return');
        }
        $res = json_decode($res, TRUE);
        try {
            $this->verifyReturn($res);
        } catch (DkException $e) {
            throw new DkException('request failed! pinduoduo ' . $res['error_response']['error_msg']);
        }
        
        return $res;
    }
    
    /**
     * @param $res
     *
     * @return bool
     * @throws DkException
     */
    private function verifyReturn($res) {
        if (!is_array($res)) {
            throw new DkException('pdd error return:' . json_encode($res, JSON_UNESCAPED_UNICODE));
        }
        
        if (array_key_exists("error_response", $res)) {
            throw new DkException("pdd request failed" . json_encode($res, JSON_UNESCAPED_UNICODE));
        }
        
        return TRUE;
    }
    
    /**
     * @param $data
     *
     * @return string
     *
     * 签名
     */
    private function signData($data) {
        // 排序
        ksort($data);
        
        // 连接
        $dataString = $this->client_secret;
        foreach ($data as $k => $v) {
            $dataString .= $k . $v;
        }
        $dataString .= $this->client_secret;
        
        // md5
        return strtoupper(md5($dataString));
    }
    
    /**
     * @param       $url
     * @param array $data
     * @param int   $timeout
     *
     * @return bool|string
     * @throws \duoduoke\DkException
     */
    private function https_request($url, $data = [], $timeout = 3000) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        if ($timeout) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        }
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        if ($output === FALSE) {
            throw new DkException('Curl error: ' . curl_error($curl) . ". url:" . $url);
        }
        
        curl_close($curl);
        
        return $output;
    }
}