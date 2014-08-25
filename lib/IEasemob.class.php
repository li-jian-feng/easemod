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

    /**
     * 批量创建用户 二维数组
     * @param array $data
     */
    public function regUserOnMulti($data);

    /**
     * 获取用户信息
     * @param unknown $a
     */
    public function getUserInfo($a){}

    /**
     * 重置用户密码
     */
    public function resetUserPassword(){}

    /**
     * 删除用户
     */
    public function deleteUser(){}

    /**
     * 批量删除用户
     */
    public function deleteUserOnMulti(){}

    /**
     * 给一个用户添加一个好友
     */
    public function addFriendToUser(){}

    /**
     * 删除一个用户的好友
     */
    public function deleteFriendOnUser(){}

    /**
     * 查看一个用户的所有好友
     */
    public function getFriendsOnUser(){}
}