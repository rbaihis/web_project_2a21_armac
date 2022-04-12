<!DOCTYPE html>
<html>
<body>

<?php


class a {
	static function z(){
    	
    	var_dump("\nZ\n");
    }
    function ha(){ echo"\n whatever \n";}

    static function foo(){ 

        self::z();
    }
}

class b extends a{

	static function y(){
    	echo ("\n Y \n");
    }

    
}

class c extends b{
	static function x(){
    	echo ("\nX\n");
    }

    
}

$b = new b();

$c= new c();

$b->z();
echo ("\n <br>  b called a's z <br>");
$b->ha();
echo ("\n <br> -2- <br>");
$b->foo();

echo ("\n <br> -- <br>");
echo ("\n <br> -- <br>");
echo ("\n <br> -- <br>");


$c->z();
echo ("\n <br> c called a's z <br>");
$c->ha();
echo ("\n <br> -2- <br>");
$c->foo();



  

?>

</body>
</html>