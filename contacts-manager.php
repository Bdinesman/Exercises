<?php
$menu = <<<MENU
1. View contacts.
2. Add a new contact.
3. Search a contact by name.
4. Delete an existing contact.
5. Exit.
Enter an option (1, 2, 3, 4 or 5):
MENU;
fwrite(STDOUT,$menu);
//Make any input not case sensitive
$command=strtoupper(trim(fgets(STDIN)));
while(runProgram($command)){
	fwrite(STDOUT,$menu);
	$command=strtoupper(trim(fgets(STDIN)));
}
//Exit out of the program;
function runProgram($command){
	if(strcmp($command,"5")===0){
		echo 'Goodbye ;)';
		return false;
	}else if(strcmp($command,"EXIT")===0){
		return false;
	}elseif((strcmp($command,"1")===0) or (strcmp($command,"VIEW")===0)){
		viewContacts();
	}elseif((strcmp($command,"2")===0) or (strcmp($command,"ADD")===0)){
		add();
	}elseif((strcmp($command,"3")===0) or (strcmp($command,"SEARCH")===0)){
		$contacts = 'txt/contacts.txt';
		$handle=fopen($contacts,'r');
		$contents=trim(fread($handle,filesize($contacts)));
		$contactArray=toArray($contents);
		fwrite(STDOUT,"Enter search term:");
		$name=trim(fgets(STDIN));
		$search = search($name, $contactArray);
		print_r($search);
		printContacts($search);
		fclose($handle);
	}elseif((strcmp($command,"4")===0) or (strcmp($command,"REMOVE")===0)){
		fwrite(STDOUT, "Enter contact to remove:");
		$name=trim(fgets(STDIN));
		//remove($name);
		remove($name);
	}
	return true;
}
//Add contacts to contact list
function add(){
	$contacts = 'txt/contacts.txt';
	$handle=fopen($contacts,'a');
	fwrite(STDOUT,'Enter name:');
	$newEntry=trim(fgets(STDIN));
	while(checkName($newEntry)!==true){
		fwrite(STDOUT,'Enter name:');
		$newEntry=trim(fgets(STDIN));
	}
	fwrite(STDOUT,'Enter phone number:');
	$newNumber=trim(fgets(STDIN));
	//Make sure number is the proper length
	while(checkPhoneNumber($newNumber)===false){
		fwrite(STDOUT,"Please enter a valid number:");
		$newNumber=trim(fgets(STDIN));
	}
	$numberFormatted = formatNumber($newNumber);
	//Seperate numbers and names with ~
	$newEntry.="~" . $numberFormatted . "\n";
	fwrite($handle,$newEntry);
	fclose($handle);
}
//Ensures name contains only valid characters
function checkName($contactName){
	$writeToFile="";
	$contacts="txt/contacts.txt";
	$handle=fopen($contacts,'r');
	$content=fread($handle,filesize($contacts));
	$array=toArray($content);
	fclose($handle);
	array_pop($array);
	print_r($array);
	foreach($array as $key=>$value){
		if(strcmp($contactName,$key)===0){
			echo "$contactName is already in contact list" . PHP_EOL;
			return false;
		}
	}
	if(stripos($contactName,"\n")!==false){
		echo 'ERROR: Name cannot contain linebreaks' . PHP_EOL;
		return false;
	}elseif(strlen(trim($contactName))===0){
		echo 'ERROR: Name cannot be empty' . PHP_EOL;
		return false;
	}elseif(stripos($contactName,"~")!==false){
		echo 'ERROR: Name cannot contain ~' . PHP_EOL;
		return false;
	}else{
		return true;
	}
}
//Validates that phone number only has proper int values
function checkPhoneNumber($phoneNumber){
	for($i=0;$i<strlen($phoneNumber);$i++){
		$check=substr($phoneNumber,$i);
		if(is_numeric($check)==false){
			return false;
		}
	}
	if(strlen($phoneNumber)==7){
		return true;
	}
	if(strlen($phoneNumber)==10){
		return true;
	}else{
		return false;
	}
}
//Adds commas and dashes to phone number
function formatNumber($number){
	$newNumberHolder="";
	for($i=0;$i<strlen($number);$i++){
		if(strlen($number)==10){
			if($i===0){
				$newNumberHolder.="(" . substr($number, $i,1);
			}elseif($i===3){
				$newNumberHolder.=')-' . substr($number, $i,1);
			}elseif($i==5){
				$newNumberHolder.=substr($number,$i,1)."-";
			}else{
				$newNumberHolder.=substr($number,$i,1);
			}
		}
		else{
			if($i===2){
				$newNumberHolder.=substr($number,$i,1)."-";
			}else{
				$newNumberHolder.=substr($number,$i,1);
			}
		}
	}
	return $newNumberHolder;
}
function viewContacts(){
	$contacts = 'txt/contacts.txt';
	$handle=fopen($contacts,'r');
	$contents=trim(fread($handle,filesize($contacts)));
	$contactArray=toArray($contents);
	printContacts($contactArray);
	fclose($handle);
}
//Converts .txt to an array
function toArray($string){
	//$array=[];
	$key="";
	$value="";
	$keyTime=true;
	for($i=0;$i<=strlen($string);$i++){
			if((strcmp(substr($string, $i,1), "\n")===0)){
				$array[$key]=$value;
				$keyTime=true;
				$key='';
				$value='';
			}elseif((strcmp(substr($string, $i,1), "~")===0)){
				$keyTime=false;
			}elseif($keyTime==true){
				$key.=substr($string, $i,1);
			}elseif($keyTime==false){
				$value.=substr($string, $i,1);
			}
		}
	$array[$key]=$value;
	return $array;
}
function printContacts($array){
	$longestName=0;
	$header='Name';
	foreach($array as $key=>$value){
		if(strlen($key)>$longestName){
			$longestName=strlen($key);
			$numberSpaces=addSpaces(strlen($value)-12);
		}
	}
	$headerSpace = addSpaces($longestName-4);
	$header.= $headerSpace . '|Phone Number' . $numberSpaces. "|\n";
	echo $header;
	for($i=0;$i<(strlen($header)-1);$i++){
		echo("_");
	}
	echo PHP_EOL;
	foreach($array as $key=>$value){
		$nameSpace=addSpaces($longestName-strlen($key));
		echo $key . $nameSpace ."|" . $value .  "|\n";
	}
}
//Format table to have spaces for visual appeal
function addSpaces($numberOfSpaces){
	$extraSpaces = "";
	for($i=0;$i<$numberOfSpaces;$i++){
		$extraSpaces .= " ";
	}
	return $extraSpaces;
}
//Creates an array for the searched value
function search($name, $array){
	$searchedArray=[];
	foreach($array as $key => $value){
		$keyCheck=strtoupper($key);
		if(stripos($key,$name)!==false){
			$searchedArray[$key]=$value;
		}
	}
	if(sizeof(searchedArray)===0){
		echo 'No contacts with that information found';
	}
	return $searchedArray;
}
function remove($name){
		$name=strtoupper($name);
		$writeToFile="";
		$contacts="txt/contacts.txt";
		$handle=fopen($contacts,'r');
		$content=fread($handle,filesize($contacts));
		$array=toArray($content);
		array_pop($array);
		foreach ($array as $key => $value) {
			if(stripos($name,strtoupper($key))!==false){
				echo "Are you sure you want to delete $name? Y/N" . PHP_EOL;
				$deleteContact=strtoupper(trim(fgets(STDIN)));
				if(strcmp($deleteContact,"Y")===0){
					foreach($array as $key=>$value){
						if(stripos($name,strtoupper($key))===false){
						$writeToFile.="$key~$value\n";
						}
					}
				fclose($handle);
				$handle=fopen($contacts,"w");
				fwrite($handle,$writeToFile);
				}
			}
		}
		fclose($handle);
}