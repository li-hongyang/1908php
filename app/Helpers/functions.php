<?php


  function cateinfo($info,$p_id=0,$level=1){
    static $res=[];
    foreach($info as $k=>$v) {
        if ($v['p_id']==$p_id){
            $v['level']=$level;
            $res[] = $v;
            cateinfo($info, $v['cate_id'],$v['level'] + 1);
        }
    }
    return $res;
}
   function upload($filename){
    if(request()->file($filename)->isValid()){
        $file=request()->file($filename);
        return   $file->store($filename);
    }
    exit('文件上传错误');
}

//多个文件上传
        function  MoreUploads($filename){
            //接受上传信息
            $files=request()->file($filename);
            //判断是否是数组
            if(!is_array($files)){
                return;
            }

            foreach($files as$k=>$v){
                if ($v->isValid()){
                    $file[]= $v->store($filename);
                }
            }
            $str = implode('|', $file);
            // 返回入库信息
            return $str;
        }


//function Moreuploads($filename){
//    $photo = request()->file($filename);
//    if(!is_array($photo)){
//        return;
//    }
//
//    foreach( $photo as $v ){
//        if ($v->isValid()){
//            $store_result[] = $v->store('uploads');
//        }
//    }

//    return $store_result;
//}
