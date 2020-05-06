<?php
ini_set("memory_limit", "-1");
// ini_set('display_errors', 1);
ini_set('max_execution_time', 300);


// Factorise the given string
function factoriseAlphabates($word)
{
  // alphabates are set ordering by based on frequency from anagram phrase
  

  $factors = array(
    'i' => 2, 'l' => 3, 'o' => 5, 'n' => 7, 'e' => 11,
    'a' => 13, 'v' => 17, 'd' => 19, 'w' => 23, 't' => 29,
    's' => 31, 'y' => 37, 'u' => 41, 'm' => 43, 'r' => 47,
    'f' => 53, 'g' => 59, 'c' => 61, 'p' => 67, 'b' => 71,
    'h' => 73, 'k' => 79, 'j' => 83, 'x' => 89, 'q' => 97,
    'z' => 101, '\'' => 103
  );

  $total = 1;

  $letters = str_split($word);

  foreach ($letters as $thisLetter) {
    if (isset($factors[$thisLetter])) {
      $total *= $factors[$thisLetter];
    }
  }

  return  $total;
}

$searchWord = 'wild inovation suly';

$file_lines = file('dict');
foreach ($file_lines as $line) {
  $dict[] = $line;
}

$searchWordFactor = factoriseAlphabates($searchWord);

foreach ($dict as $thisWord) {


  $dictWordFactor = factoriseAlphabates($thisWord);
   if (($searchWordFactor % $dictWordFactor) == 0) { 
     $array[] = $thisWord;
   }
}


function checkHash($string)
{
    return (md5($string) ==  "87bb2bda651995d346c05b5049b4d78b");
}


// mainly uses combinationUtil() 
function printCombination($arr, 
                        $n, $r) 
{ 
    // A temporary array to 
    // store all combination 
    // one by one 
    $data = array(); 

    // Print all combination 
    // using temprary array 'data[]' 
    combinationUtil($arr, $data, 0, 
                    $n - 1, 0, $r); 
} 

/*
r ---> Size of a combination 
    to be printed */
function combinationUtil($arr, $data, $start, 
                        $end, $index, $r) 
                
{ 
    // Current combination is ready 
    // to be printed, print it 
    if ($index == $r) 
    { 
        for ($j = 0; $j < $r; $j++) 
             $data[$j]; 
        sort($data);
        if(checkHash(trim(implode(" ",$data)))){
            echo 'Your phrase: '.trim(implode(" ",$data));
            exit;
        }
         
        return; 
    } 

    // replace index with all 
    // possible elements. The 
    // condition "end-i+1 >= 
    // r-index" makes sure that 
    // including one element at 
    // index will make a combination 
    // with remaining elements at 
    // remaining positions 
    for ($i = $start; 
        $i <= $end && 
        $end - $i + 1 >= $r - $index; $i++) 
    { 
        $data[$index] = $arr[$i]; 
        combinationUtil($arr, $data, $i + 1, 
                        $end, $index + 1, $r); 
    } 
} 

$arr = $array;
$r = 3; 
$n = sizeof($arr); 
printCombination($arr, $n, $r); 