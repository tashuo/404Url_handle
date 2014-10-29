<?php
    require_once('handle_limitSize.class.php');
    $arr_dir = array('cc', 'cq', 'cs', 'dg', 'fs', 'fz', 'gy', 'gz', 'hrb', 'hz', 'jn', 'km', 'nc', 'nj', 'nn', 'qd', 'sh', 'sjz', 'suzhou', 'sy', 'sz', 'tj', 'wh', 'wx', 'xa' ,'xm', 'zs', 'zz');
    $arr_urls = array();

    $sites = array(
        'symama.com'=> array('memory_prefix'=>'', 'prefix'=>'@sy', 'id'=>'sy', 'hexinsiteid'=>26, 'name'=>'沈阳妈妈网', 'website'=>'http://www.symama.com','hmkey'=>'3F3179e43d2b9c101e1f3fe24511668421','weixin'=>'symamacom','xlogin_secret_key'=>'5z73XqwJUqwET6-s42_Pn4mya6tdqkiXmMd_'),
        'jnmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@jn', 'id'=>'jn', 'hexinsiteid'=>52, 'name'=>'济南妈妈网', 'website'=>'http://www.jnmama.com','hmkey'=>'3Fce947f24104d8b9d65aa3f90876890e3','weixin'=>'jnmamacom','xlogin_secret_key'=>'-efewffliv09_23f-dfeSE3fsdbvf'),
        'cdmama.cn'=> array('memory_prefix'=>'', 'prefix'=>'@cd', 'id'=>'cd', 'hexinsiteid'=>23, 'name'=>'成都妈妈网', 'website'=>'http://www.cdmama.cn','hmkey'=>'3Fafee131b17141210aa00a59010879ab1','weixin'=>'cdmamacn','xlogin_secret_key'=>'kdlfkdjj354kj6ff4665e2'),
        'qdmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@qd', 'id'=>'qd', 'hexinsiteid'=>37, 'name'=>'青岛妈妈网', 'website'=>'http://www.qdmama.net','hmkey'=>'3F36f598d2ebb33e63a2b6c41588bfa5b9','weixin'=>'qdmamanet','xlogin_secret_key'=>'_t_7Anc3432-sdfeSE3fsdbvf'),
        'gzmama.com'=> array('memory_prefix'=>'ZOUs5u_', 'prefix'=>'@gz','id'=>'gz', 'hexinsiteid'=>1, 'name'=>'广州妈妈网', 'website'=>'http://www.gzmama.com','hmkey'=>'3F541f3c481db4b0e16353b2476bb19589','weixin'=>'gzmama_com','xlogin_secret_key'=>'5C3u5R_5)-Kk(/5A8URh*G9s&x'),
        'bjmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@bj', 'id'=>'bj', 'hexinsiteid'=>10, 'name'=>'北京妈妈网', 'website'=>'http://www.bjmama.com','hmkey'=>'3F69e54565405faa53f2420c94f4e3b39c','weixin'=>'bjmamacom','xlogin_secret_key'=>'wBXZLs2cYbt9NMU-_dP5M_C3y8__UgbE9R-Y36-thez2HKfZch59zh-teG3xJoetTHXS5xSE7JaYm2UAJ-rDo95xMsP9dE4AhDHo5ikBTK624LiUuECYRp_-'),
        'tjmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@tj', 'id'=>'tj', 'hexinsiteid'=>11, 'name'=>'天津妈妈网', 'website'=>'http://www.tjmama.com','hmkey'=>'3F1289f4e0e9adb095f51b55e37e26a384','weixin'=>'tjmamacom','xlogin_secret_key'=>'A,^gMXiF=ia&o(w*wAvr'),
        'shmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@sh', 'id'=>'sh', 'hexinsiteid'=>12, 'name'=>'上海妈妈网', 'website'=>'http://www.shmama.net','hmkey'=>'3Fb1d328577fc6f999da9bef119f6c09a2','weixin'=>'shanghaimamawang','xlogin_secret_key'=>'dlkf,Ddfdfv_Dk(/5flhdd3h*3'),
        'cqmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@cq', 'id'=>'cq', 'hexinsiteid'=>13, 'name'=>'重庆妈妈网', 'website'=>'http://www.cqmama.net','hmkey'=>'3Fc8416ecfc35c34b3c700d2512cac548f','weixin'=>'cqmamanet','xlogin_secret_key'=>'AYgNCGUm_bHE5L-a-2dsfd'),
        'szmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@suz', 'id'=>'suzhou', 'hexinsiteid'=>36, 'name'=>'苏州妈妈网', 'website'=>'http://www.szmama.net','hmkey'=>'3F6040ed31e2a449922c3bc2bce179f1f2','weixin'=>'suzhoumamawang','xlogin_secret_key'=>'dlkf,Ddfddv_Dk(/5flkj3kh*3'),
        'xamama.net'=> array('memory_prefix'=>'', 'prefix'=>'@xa', 'id'=>'xa', 'hexinsiteid'=>25, 'name'=>'西安妈妈网', 'website'=>'http://www.xamama.net','hmkey'=>'3F025fcfd66db75fc074e2df56521e16de','weixin'=>'xamamanet','xlogin_secret_key'=>'_t_7Ancj--33sVSE3fsdbvf'),
        'csmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@cs', 'id'=>'cs', 'hexinsiteid'=>24, 'name'=>'长沙妈妈网', 'website'=>'http://www.csmama.net','hmkey'=>'3F037b2da2fcf481cfc688a37790b13168','weixin'=>'hncsmmw','xlogin_secret_key'=>'v-EQ6uo9BZyxtvPt_Y4aKGqp6D_JFhEVAkGiAKgM'),
        'hzmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@hz', 'id'=>'hz', 'hexinsiteid'=>48, 'name'=>'杭州妈妈网', 'website'=>'http://www.hzmama.net','hmkey'=>'3Fe218559157c64c922266e29efbebb141','weixin'=>'mama_cn','xlogin_secret_key'=>'dlkf,DGGd3v_Dk(/5flkj3kh*3'),
        'whmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@wh', 'id'=>'wh', 'hexinsiteid'=>28, 'name'=>'武汉妈妈网', 'website'=>'http://www.whmama.com','hmkey'=>'3F5658eb61aa3efd7a68172ff910cf7dbc','weixin'=>'mama_cn','xlogin_secret_key'=>'ddg3#4gfd3v_Dk(/5flkj3kh*3'),
        'nnmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@nn', 'id'=>'nn', 'hexinsiteid'=>34, 'name'=>'南宁妈妈网', 'website'=>'http://www.nnmama.com','hmkey'=>'3F7f664b607abd2fd55c530cae4aed15fe','weixin'=>'mama_cn','xlogin_secret_key'=>'dklLKkjfd3v_Dk(/5flkj3kh*3'),
        'szmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@sz', 'id'=>'shenzhen', 'hexinsiteid'=>8, 'name'=>'深圳妈妈网', 'website'=>'http://www.szmama.com','hmkey'=>'3F1d3e04d2973a613e7a080e01ac3bf03e','weixin'=>'szmamacom','xlogin_secret_key'=>'qdi_FhkdpA9hRZr-bXcEG5sJP6BN9bYR'),
        'njmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@nj', 'id'=>'nj', 'hexinsiteid'=>32, 'name'=>'南京妈妈网', 'website'=>'http://www.njmama.com','hmkey'=>'3Fab0aa48029c49fec74a08484c5253bb6','weixin'=>'mama_cn','xlogin_secret_key'=>'GdfdgD3v_Ddfjk(/5flkj3kh*3'),
        'fsmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@fs', 'id'=>'fs', 'hexinsiteid'=>46, 'name'=>'佛山妈妈网', 'website'=>'http://www.fsmama.com','hmkey'=>'3Fe20f9f5e3d6be4ae47350f5871848c6b','weixin'=>'foshanmamawang','xlogin_secret_key'=>'4kdgD3v_Ddfjk(/5fg3dgdgh*3'),
        'gymama.com'=> array('memory_prefix'=>'', 'prefix'=>'@gy', 'id'=>'gy', 'hexinsiteid'=>47, 'name'=>'贵阳妈妈网', 'website'=>'http://www.gymama.com','hmkey'=>'3F16d9e4468ae2cc72b4f6203afa8ca31c','weixin'=>'mama_cn','xlogin_secret_key'=>'4kdgD3v_52-DE(/5f34dddeh*3'),
        'hfmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@hf', 'id'=>'hf', 'hexinsiteid'=>29, 'name'=>'合肥妈妈网', 'website'=>'http://www.hfmama.com','hmkey'=>'3F1fd12f4163e062fcf00246d3b85f1395','weixin'=>'mama_cn','xlogin_secret_key'=>'Weiu3dfRteG3x6ajsUJLsuj'),
        'sjzmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@sjz', 'id'=>'sjz', 'hexinsiteid'=>30, 'name'=>'石家庄妈妈网', 'website'=>'http://www.sjzmama.com','hmkey'=>'3Fffe5fe7c58d5231352c62326a6adfa9b','weixin'=>'','xlogin_secret_key'=>'J2ZxMZ.o-P.2PWADcKLmXtFE'),
        'zzmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@zz', 'id'=>'zz', 'hexinsiteid'=>31, 'name'=>'郑州妈妈网', 'website'=>'http://www.zzmama.net','hmkey'=>'3F443881cfb9a6bffea879226f032e7f4d','weixin'=>'zzmamanet','xlogin_secret_key'=>'tmq-LpG8JxLyPaXnDTaarE7tDxSYK3_'),
        'ccmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@cc', 'id'=>'cc', 'hexinsiteid'=>23, 'name'=>'长春妈妈网', 'website'=>'http://www.ccmama.com','hmkey'=>'3F55f18c457c077cac1a82046f56245a27','weixin'=>'mama_cn','xlogin_secret_key'=>'diwk_sie9392jd_38ej'),
        'wxmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@wx', 'id'=>'wx', 'hexinsiteid'=>35, 'name'=>'无锡妈妈网', 'website'=>'http://www.wxmama.com','hmkey'=>'3Fa770fbce477b37d216ad8bbdcdbd5b32','weixin'=>'wxxingfushu','xlogin_secret_key'=>'252BT5j-iwvPOhex1jVl_8548X4cME2O'),
        'kmmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@km', 'id'=>'km', 'hexinsiteid'=>38, 'name'=>'昆明妈妈网', 'website'=>'http://www.kmmama.com','hmkey'=>'3F79680d35c0bcabfe68528de7dad1b099','weixin'=>'kmmamacom','xlogin_secret_key'=>'4kdgD3v_52-DE(/5f34dddeh*3'),
        'fzmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@fz', 'id'=>'fz', 'hexinsiteid'=>40, 'name'=>'福州妈妈网', 'website'=>'http://www.fzmama.net','hmkey'=>'3F73ce61fe127608495726169457f43711','weixin'=>'mama_cn','xlogin_secret_key'=>'4k,gkl3v_52-Dd(/5fd3ddeh*3'),
        'xmmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@xm', 'id'=>'xm', 'hexinsiteid'=>41, 'name'=>'厦门妈妈网', 'website'=>'http://www.xmmama.com','hmkey'=>'3F15d85d80d69c19154e08eae5248b1989','weixin'=>'mama_cn','xlogin_secret_key'=>'44dg3v_52-Df(/5fDGJeeh*334'),
        'ncmama.cn'=> array('memory_prefix'=>'', 'prefix'=>'@nc', 'id'=>'nc', 'hexinsiteid'=>42, 'name'=>'南昌妈妈网', 'website'=>'http://www.ncmama.cn','hmkey'=>'3F26bdfd7fe77b4b324461da650c054d9e','weixin'=>'mama_cn','xlogin_secret_key'=>'44dg3v_52-Kf(/5fddkkeh*334'),
        'zsmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@zs', 'id'=>'zs', 'hexinsiteid'=>43, 'name'=>'中山妈妈网', 'website'=>'http://www.zsmama.com','hmkey'=>'3Fc95c23bc0583f381fe5dfbb528f17073','weixin'=>'mama_cn','xlogin_secret_key'=>'44233v_52-Kf(/5ffkfkeh*j9x'),
        'dgmama.net'=> array('memory_prefix'=>'', 'prefix'=>'@dg', 'id'=>'dg', 'hexinsiteid'=>44, 'name'=>'东莞妈妈网', 'website'=>'http://www.dgmama.net','hmkey'=>'3F24777accf2d546c8a3a90de8a31ec237','weixin'=>'dongguanmamawang','xlogin_secret_key'=>'44378v_52-Kf(/5ffhfh*j9sfx'),
        'shantoumama.com'=> array('memory_prefix'=>'', 'prefix'=>'@shantou', 'hexinsiteid'=>45, 'id'=>'shantou', 'name'=>'汕头妈妈网', 'website'=>'http://www.shantoumama.com','hmkey'=>'3F97c6a3748a4929a50f1e7c51b181f0e7','weixin'=>'stmamacom','xlogin_secret_key'=>'4C375R_58-Kk(/59fUfh*G9sfx'),
        'hrbmama.com'=> array('memory_prefix'=>'', 'prefix'=>'@hrb', 'id'=>'hrb', 'hexinsiteid'=>39, 'name'=>'哈尔滨妈妈网', 'website'=>'http://www.hrbmama.com','hmkey'=>'3Fbe9af68fd4a70fe0a333ea1c3c62a12c','weixin'=>'stmamacom','xlogin_secret_key'=>'7C3u5R_58-Kk(/598URh*G9s&x')
    );

    $xmlUrlHandle = @fopen('xmlUrl.txt', 'w');

    $arr_dir =array('bj');
    $arr_file = array();
    $file_atta = '_20141017-24_404_thread_baidu';
    foreach($arr_dir as $dir){
    	$arr_file[] = $dir.$file_atta;
    	foreach($sites as $url=>$attr){
    		if($dir == $attr['id']){
    			$arr_urls[$dir] = 'http://www.'.$url;
                                    if(fwrite($xmlUrlHandle, $url.'/data/xml/'.$dir.'_20141017-24_404_thread_baidu.xml'."\n") === FALSE){
                                        echo 'xml错误';
                                        exit;
                                    }
    		}
                        
    	}
    	if($dir == 'sz'){
    		$arr_urls[$dir] = 'http://www.szmama.com';
                        if(fwrite($xmlUrlHandle, 'szmama.com/data/xml/'.$dir.'_20141017-24_404_thread_baidu.xml'."\n") === FALSE){
                            echo 'xml错误';
                            exit;
                        }
    	}
    }

    $arr_dir_file = array_combine($arr_dir, $arr_file);
    // var_dump($arr_dir);
    // var_dump($arr_urls);
    // exit;
    foreach($arr_dir_file as $dir=>$file){
    	$xmlClass = new log2xmlClass($dir, $file, $arr_urls, 1);
    	$xmlClass->buildXML();
    }
