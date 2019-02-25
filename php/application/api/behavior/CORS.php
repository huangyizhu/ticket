<?php
namespace app\api\behavior;
use think\Response;
  
class CORS{
    public function appInit(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId");
        if(request()->isOptions()){
            exit();
        }
    }
 }