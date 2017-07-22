<?php
namespace app\index\controller;

use think\Controller;

use think\Db;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function add_user(){
        sleep(2);
        $t=time();
        $data= [
            'name'=>$_POST['user'],
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],'sex'=>$_POST['sex'],
            'birthday'=>$_POST['birthday'],
            'date'=>$t,
        ];
        Db::name('user')->insert($data);

        return true;
    }
}
