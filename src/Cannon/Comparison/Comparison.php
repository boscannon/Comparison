<?php
namespace Cannon\Comparison;

class Comparison
{
    public function arrayLevel($arr){
        $al = array(0);
        function aL($arr,&$al,$level=0){
            if(is_array($arr)){
                $level++;
                $al[] = $level;
                foreach($arr as $v){
                    aL($v,$al,$level);
                }
            }
        }
        aL($arr,$al);
        return max($al);
    }
	public function arr_key($data)
	{
		$tmp=[];
		foreach ($data as $item) {
		    foreach ($item as $key => $value) {
    			if(!isset($tmp[$key])){
    				$tmp[$key] = $key;
    			}
    		}
    	}
    	return $tmp;
	}
    public function show($data,$control=[])
    {	
        $allow =[
            'length'=>['default'=>30,'type'=>'int'],
            'index' =>['default'=>true,'type'=>'bool'],
        ];
        foreach ($allow as $key => $value) {
            ${$key} = $control[$key] ?? $value['default'];
            settype(${$key},$value['type']);
        }
        $sort_flag=SORT_LOCALE_STRING;

        $len_cal=function() use ($length,$index,&$keys){
            if($index)array_unshift($keys,'(index)');
            $len = count($keys) * $length +count($keys)+1;
            return $len;
        };
        $header =function($keys) use (&$len,$length){
            printf("%'-{$len}s\n",'-');
            printf("|");
            foreach ($keys as $key => $value) {
                printf("%-{$length}.{$length}s|",$value);
            }
            printf("\n");
            printf("%'-{$len}s\n",'-');
        };
        $index_show = function($n) use ($length){
            if($index) printf("%-{$length}s|",$n);
        };
        $content =function($value) use ($length){
            if(is_array($value)) $value =json_encode($value);
            printf("%-{$length}.{$length}s|",$value);
        }; 

        $arrayLevel=$this->arrayLevel($data);
        if($arrayLevel ==0){
            echo $data;
        }elseif($arrayLevel ==1){
            $keys=['value'];
            $len  =$len_cal();

            $header($keys);
            foreach ($data as $n => $value) {
                printf("|");
                $index_show($n);
                $content($value);
                printf("\n");
            }
        }else{
        	$keys = array_keys($this->arr_key($data));
        	foreach ($data as $k => $item) {
        		foreach ($keys as $key) {
        			if(!isset($item[$key])){
        				$data[$k][$key]=null;
        			}
        		}
        	}        	
        	sort($keys,$sort_flag);
            $len  =$len_cal();

            $header($keys);
        	foreach ($data as $n => $item) {
        		$first =true;
        		ksort($item,$sort_flag);
        		foreach ($item as $key => $value) {
    	    		if($first){
                        printf("|");
    	    			$index_show($n);
    	    			$first=false;
    	    		}
                    $content($value);
        		}
        		printf("\n");
        	}
        	printf("%'-{$len}s\n",'-');
        }
    }
}
