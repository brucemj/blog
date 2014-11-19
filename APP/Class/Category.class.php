<?php
Class Category {
	static Public function unlimitedForLevel($cate, $html='&nbsp;&nbsp;&nbsp;--', $pid=0, $level=0 ){
		$res = array();
		foreach($cate as $v){
			if($v['pid'] == $pid){
				$v['level'] = $level + 1;
				$v['html'] = str_repeat($html, $level);
				$res[] = $v;
				$res = array_merge($res, Category::unlimitedForLevel($cate, $html,
					$v['id'], $level +1 ));
			}
		}
		return $res;
	}
}
?>