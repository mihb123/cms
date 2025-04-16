<?php

namespace App\Common;


class Response
{

    const CODE_SUCCESS = 200;
    const CODE_ERROR = 500;

    const CODE_SUCCESS_API = true;
    const CODE_ERROR_API = false;

    /**
     * @param $code
     * @param string $message
     * @param array $data
     * @return string
     */
    public static function response($code, $message = '', $data = null, $dataPage = null)
    {
        return [
            'error' => $code,
            'message' => $message,
            'data' => $data,
            'dataPage' => $dataPage
        ];
    }

    public static function responseApi($code, $message = '')
    {
        return [
            'Success' => $code,
            'Message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array $data
     * @return string
     */
    public static function error($message = '', $errorCode = self::CODE_ERROR, $data = null)
    {
        return self::response($errorCode, $message, $data);
    }

    public static function errorApi($message = '', $errorCode = self::CODE_ERROR_API)
    {
        return self::responseApi($errorCode, $message);
    }

    /**
     * @param string $message
     * @param array $data
     * @return string
     */
    public static function success($message = '', $data = null, $dataPage = null)
    {
        return self::response(self::CODE_SUCCESS, $message, $data, $dataPage);
    }
}