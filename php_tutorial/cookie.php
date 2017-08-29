<?php 

function test($number){
	if($number>2){
		throw new Exception("the number mest be less than 1");		
	}
	return true;
}


try{
	test(2);
	echo 'because number is less than 2';

}

catch(Exception $e){
    echo 'Message is ' . $e->getMessage();
}

?>
