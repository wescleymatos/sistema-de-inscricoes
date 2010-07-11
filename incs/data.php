<?php
function convData($data) {
			if(substr($data,2,1) == "/")
			{
				$dd = substr($data, 0,2);
				$mm = substr($data, 3,2);
				$aa = substr($data, 6,4);
				$time = substr($data, 11,8);
				if($time != "")
					$data = $aa."-".$mm."-".$dd." ".$time;
				else
					$data = $aa."-".$mm."-".$dd;
			}
			else
			{
				$dd = substr($data, 8,2);
				$mm = substr($data, 5,2);
				$aa = substr($data, 0,4);
				$time = substr($data, 11,8);
				if($time != "")
					$data = $dd."/".$mm."/".$aa." ".$time;
				else
					$data = $dd."/".$mm."/".$aa;
			}
			if($data=='//')
			{
				$data = '';
			}
			return $data;
    }
?>
