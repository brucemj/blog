<?php
$leftText = '123' ;
$leftText .= 'aaa';
echo $leftText . '<br>';
$rightText = "67510d8,1ddd449," ;
$arr = split(',', $rightText);
var_dump($arr);
foreach ($arr as $key => $value) {
	echo '123' . $value . '<br>';
}
?>