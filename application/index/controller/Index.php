<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Cookie;
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
        $result=Db::name('user')->insert($data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function login_user(){
        sleep(2);
        $data['name']=$_POST['user'];
        $data['password']=$_POST['password'];
        $date=Db::name('user')->where($data)->find();
        if($date){
            return true;
        }else{
            return false;
        }
    }
    public  function find_user(){
        $data['name']=$_POST['user'];
        $re=Db::name('user')->where($data)->find();
        if($re){
            return false;
        }else{
            return true;
        }
    }
    public function tiwen_user(){
        sleep(2);
        $data['biaoti']=$_POST['biaoti'];
        $data['content']=$_POST['content'];
        $data['date']=time();
        $data['user']=Cookie::get('user');
        $re=Db::name('question')->insert($data);
        if($re){
            return true;
        }else{
            return false;
        }
    }
    public function index_tb1(){
        return $this->fetch();
    }
    public function index_tb2(){
        return $this->fetch();
    }
    public function index_tb3(){
        return $this->fetch();
    }
}
