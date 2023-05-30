<?php

// Why do this strange copy-and-paste dance? Well ...
// It's frankly easier to type into a Google Drive word processing document on a phone 
// than it is to try to type type into a tiny spreadsheet. 
// At the grocery store post-checkout recombobulation shelf, this approach keeps us sane :-)

const CURRENCY_STRING = ' EUR';

$inputText = file_get_contents('input.txt');
$lines = explode("\n", $inputText);
$output = ['s' => 0, 'p' => 0];

foreach ($lines as $line) {
    $pieces = explode('-', $line);
    if (is_array($pieces) && count($pieces) === 3) {
        $output[trim($pieces[2])] += (float)trim($pieces[1]);
    }
}

print PHP_EOL . 
    'Patrick paid ' . 
    (string) $output['p'] .
    CURRENCY_STRING .
    ' and Sui paid ' . 
    (string) $output['s'] .
    CURRENCY_STRING .  
    ' during the tallying period. ' .
    'The total was ' . 
    (string) ($output['p'] + $output['s']) . 
    CURRENCY_STRING . 
    '. ' . 
    PHP_EOL
    ;

