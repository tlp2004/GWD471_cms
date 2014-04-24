<?php  
  


//FUNCTIONS
//print "included OK";     // uncomment  to check the page is included in the form


function verifyNum ($testString) {
	// Check for only numbers 
	return (preg_match("(^[[:digit:]]+$)", $testString));
}


function verifyAlpha ($testString) {
	// Check for letters,  dashes,and, spaces only. 
	return (preg_match("(^[[:alpha:]]|-| +$)", $testString));
}


function verifyAlphaNum ($testString) {
	// Check for letters, numbers and dash, period, space and single quote only. 
	return (preg_match("/(^[[:alnum:]]|-|\.| |'+$)/", $testString));
}	

function verifyFileName ($testString) {
	// Check for letters, numbers,underscores,dashes and periods only. 
	return (preg_match("/(^[[:alnum:]]|-|_)+(\.)([a-z]{2,4}$)/", $testString));
}	


function verifyEmail ($testString) {
	// Check for a valid email address 
	$regexp = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
	return (preg_match($regexp, $testString));
}

//The severity of your security concerns depend upon who is going to be inputting text.  
//If an administrative client is using this for page content, then allowing <a>tags is ok, 
//If community members or public folks are adding content, <a> tags could pose security and spam issues.
function verifyText ($testString) {
	$hackish = array("javascript:","Javascript:","javaScript:","JavaScript:", "(","{");
	$safeReplace = array("#","#","#","#","&#40;","&#123;");
	
	$myString = str_replace($hackish,$safeReplace,$testString);
	$myString =  strip_tags($myString, '<h3><h4><ul><li><em><strong><blockquote><q><div><span><p><a><br>');
	$myString = htmlspecialchars($myString);
	//$myString = mysql_real_escape_string($myString);
	
	return 	$myString;
}


function verifyPhone ($testString) {	// Check for only numbers, dashes and spaces in the phone number 
	return (preg_match('/(^[[:digit:]]| |-+$)/', $testString));
}

?>