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
    public function show($data,$length=30)
    {	
        $header =function($keys,$len,$length){
            printf("%'-{$len}s\n",'-');
            printf("|");
            foreach ($keys as $key => $value) {
                printf("%-{$length}.{$length}s|",$value);
            }
            printf("\n");
            printf("%'-{$len}s\n",'-');
        };
        $arrayLevel=$this->arrayLevel($data);
        if($arrayLevel ==1){
            $keys=['(index)','value'];
            $len = count($keys) * $length +count($keys)+1;
            $header($keys,$len,$length);
            foreach ($data as $n => $value) {
                if(is_array($value)) $value =json_encode($value);
                printf("|%-{$length}s|%-{$length}.{$length}s|\n",$n,$value);
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

        	$keys[]='(index)';
        	sort($keys);

        	$len = count($keys) * $length +count($keys)+1;

            $header($keys,$len,$length);
        	foreach ($data as $n => $item) {
        		$first =true;
        		ksort($item);
        		foreach ($item as $key => $value) {
    	    		if($first){
    	    			printf("|%-{$length}s|",$n);
    	    			$first=false;
    	    		}
    	    		if(is_array($value)) $value =json_encode($value);
    	    		printf("%-{$length}.{$length}s|",$value);
        		}
        		printf("\n");
        	}
        	printf("%'-{$len}s\n",'-');
        }
    }
}
