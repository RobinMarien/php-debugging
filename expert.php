<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo "Exercise 1 starts here:";

//put $x as a parameter to the function
function new_exercise($x) {
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;
}


new_exercise(2);
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

// FIX = changed $week[1] to $week[0]
$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];

echo $monday;


new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

// FIX = put quotation marks around the string, changed start to 3

$str = "“Debugged ! Also very fun”";
echo substr($str, 3, 10);


new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

// FIX = put '&' in front of $day ->
//      In order to be able to directly modify array elements within the loop precede $value with &.
//      In that case the value will be assigned by reference. (https://www.php.net/manual/en/language.references.php)

foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}

print_r($week);


new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

// FIX = changed " $letter <= 'z' "  to " $letter !== 'aa' "

$arr = [];
for ($letter = 'a'; $letter <= 'z' && $letter !== 'aa'; $letter++) {
    array_push($arr, $letter);
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array

new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!

// FIX =    -put & in the foreach again (see exercise 4)
//          -put ; behind $hero_lastnames array (line 98)
//          -changed 'echo' in the functions to 'return'
//          -added '-1' to the count(line 102)
//          -removed unused function


$arr = [];

function combineNames($str1 = "", $str2 = "") {
    $params = [$str1, $str2];
    foreach($params as &$param) {
        if ($param == "") {
            $param = randomHeroName();
        }
    }
    return implode($params, " - ");
}

function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    $randname = $heroes[rand(0,(count($heroes)-1))][rand(0, 10)];
    return $randname;
}

echo "Here is the name: " . combineNames();

new_exercise(7);
// FIX =    -alt shift enter (thanks PHPstorm)
//          -put 'echo' on line 111

function copyright(int $year) {
    return "&copy; $year BeCode";
}
//print the copyright
echo copyright((int)date('Y'));

new_exercise(8);
// FIX =    -changed || to && (line 117)
//          -put 'Smith' in the same return instead of using a separate one
//          -removed '.be' from john@example in the if statement (line 122)
//          -put echo $login on line 127, 130 and 133

function login(string $email, string $password) {
    if($email == 'john@example' && $password == 'pocahontas') {
        return 'Welcome John Smith';
    }
    else return 'No access';
}
//should great the user with his full name (John Smith)
$login = login('john@example', 'pocahontas');
echo $login . "<br>";
//no access
$login = login('john@example', 'dfgidfgdfg');
echo $login . "<br>";
//no access
$login = login('wrong@example', 'wrong');
echo $login;


new_exercise(9);
// FIX =    -echo in front (153 - 152 - 157 - 159)
//          -changed '==true' to '!==false'

function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
echo isLinkValid('http://www.google.com/hack.pdf');
//invalid link
echo isLinkValid('https://google.com');
//VALID link
echo isLinkValid('http://google.com');
//VALID link
echo isLinkValid('http://google.com/test.txt');


new_exercise(10);

//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
// FIX = Created new variable, length of the are these fruits array, to use that length in the for loop..
//          -because the "are these fruits" array is being modified as we go, it doesn't loop through the whole thing

$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
$areTheseFruits_length = count($areTheseFruits);
//from here on you can change the code
for($i=0; $i < $areTheseFruits_length; $i++) {
    if(!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
}
var_dump($areTheseFruits);//do not change this