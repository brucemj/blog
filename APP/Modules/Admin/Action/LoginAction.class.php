<?php
Class LoginAction extends Action {
    Public function index(){
        $this->display();
    }

    Public function login(){
        //p($_POST); 
        //p(session('verify'));
        //die;
        if ( !IS_POST ) halt('请先登录');
        if (md5(I('code')) != session('verify')) $this->error('验证码错误');
        $user = M('user')->where(array('username' => I('username')))->find();
        if ( !$user['username'] || $user['password'] != md5(I('password')) ){
            $this->error('用户名或密码错误');
        }
        echo '123';
    }

    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
}
?>
