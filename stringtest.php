<?php

$string = '"MON":"6:00",THU":"7:00",WED":"8:00",THES":"9:00",FRI":"10:00",SAT":"11:00"';

$res=explode(',',$string);
//print_r($res);
foreach($res as $val)
{
	$rr =explode(':',$val);
	echo "<pre>";
	print_r($rr);
}

?>