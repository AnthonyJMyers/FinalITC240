<?php


define('THIS_PAGE', basename($_SERVER['PHP_SELF']));


switch(THIS_PAGE)
{
	case "template.php":
		$title = "T-Shirts Galore";
		$org = "Look at all these T-Shirts!";
		$slogan = "T-Shirts, the Wave of the Future...";
		

	break;
	
	case "purchase.php":
		$title = "Yea! Buy It!!!";
		$org = "Actually, buy two...";
		$slogan = "We work hard to make your T-Shirts!";
		
	
	default:
		$title = "Yea! Buy It!!!";
		$org = "Actually, buy two...";
		$slogan = "We work hard to make your T-Shirts!";
		
		
	break;
	
}

$nav1["template.php"] = "Home Page";
$nav1["purchase.php"] = "Buy!";


function makeLinks($linkArray)
{
    $myReturn = '';
    foreach($linkArray as $url => $text)
    {
		if(THIS_PAGE==$url){
			$myReturn .= '<li class = "current"><a href="' . $url . '">' . $text . '</a></li>';    
		}
		
		else{
			$myReturn .= '<li><a href="' . $url . '">' . $text . '</a></li>';    
		}
    }    
    return $myReturn;    
}

function process_post()
{
    $myReturn = '';

    foreach($_POST as $varName=> $value)
    {
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}

function myerror($myFile, $myLine, $errorMsg)
{
    print "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
    print "Error Message: <b>" . $errorMsg . "</b><br />";
    die();
}


function dbOut($str){
if($str!=""){
$str = stripslashes(trim($str));}
return $str;
}




?>