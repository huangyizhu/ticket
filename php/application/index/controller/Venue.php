<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Entry as EntryModel;
use app\index\model\Venue as VenueModel;

class Venue extends Controller{
    public function add(){
        if($this->request->isPost()){
            $venue = new VenueModel;
            $param = input('post.');
            $venueCode = uniqid();
            $venue->venue_code = $venueCode;
            $venue->address = $param['address'];
            $venue->venue_name = $param['veuenName'];
            $venue->venue_describe = $param['describe'];
            $venue->outsideimage = $param['outsideimage'];
            $venue->insideimage = $param['insideimage'];
            if($venue->save()){
                return '添加成功';
            }else{
                return '添加失败';
            }
        }
    }
    private function addEntry($veuenName,$describe){
        $entry = new EntryModel;
        $code = uniqid();
        $entry->entry_code = $code;
        $entry->entry_name = $veuenName;
        $entry->entry_describe = $describe;
        if($entry->save()){
            return $code;
        }else{
            return false;
        }
    }

    public function get_list(){
        $venue = new VenueModel;
        $data['data'] = $venue->all();
        return json($data);
    }
}

