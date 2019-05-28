<?php
namespace Cannon\Comparison;

class Comparison
{
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
    	print_r($data);
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

    	printf("%'-{$len}s\n",'-');
    	printf("|");
    	foreach ($keys as $key => $value) {
    		printf("%-{$length}.{$length}s|",$value);
    	}
    	printf("\n");
    	printf("%'-{$len}s\n",'-');
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
