<?php
function validate( $array ) {
	foreach($array as $key => $val) {
	
		// lenght
        //name
		if( $key == 0 || $key == 2 ) {
			if ( strlen($val) > 255 ) {
				echo "<h3>error: so more chars, stop and write less </h3>";
				
				//invalid
				return false;
			}
		}
		// email
		if( $key == 1) {

            if(!preg_match("/@/",$val)|| strlen($val) > 255){
				echo "<h3>error: wrong email</h3>";
				return false;
			}
		}
		// login
//		if( $key == 'login' ) {
//            if ( strlen($val) > 255 ) {
//                echo "<h3>error: so more chars, stop and write less </h3>";
//                //invalid
//                return false;
//            }
//		}
		//password
        if ($key == 4){
            if ( strlen($val) < 6 ) {
                echo "<h3>error: write more longer pass </h3>";
                //invalid
                return false;
            }
        }
	}
	
// true, welcome
	return true;
}

//save information on file
function save( $data, $path ) {
	if( !file_exists('database') ) {
		mkdir('database');
	}
	
	//read
	$messageOLD = read($path);
	
	// if empty, create
	if( !$messageOLD ) {
		$messageNEW = [$data];
	}
	else {
		// or if not empty add to last str
		$messageNEW = $messageOLD;
		array_push($messageNEW, $data);
	}

	// save and serialize
	$file = file_put_contents($path, serialize( $messageNEW ));

	return $file;
}

// read
function read( $path ) {
	if( file_exists($path) ) {
		$timeStr = file_get_contents($path);
		// unserialize
		$messages = unserialize($timeStr);
		// ternar operator if true return
		return $messages ? $messages : [] ;
	}
	else {
		// if not return array EMPTY
		return [];
	}
}


// Измененние в тексте перед выводом
function textChange( $array ) {
	
	// изменяем элементы массива как нам нужно
	foreach($array as $key => &$val) {
		if( $key == 'message' ) {
			$val = nl2br($val);
		}
	}
	return $array;
}

function view($viewname, $data = [],$arg2 = null){
    include "templates/header.php";
    include "templates/$viewname.view.php";
}