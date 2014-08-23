<?php
interface IEasemob {

    /**
     * 获取Token
     */
    public function getToken();

    /**
     * 开放注册模式
     * @param array $data
     */
    public function regUserOnOpen($data);

    /**
     * 授权注册模式
     * @param array $data
     */
    public function regUserOnAuth($data);
}