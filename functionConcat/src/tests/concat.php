<?php
$dataTests = [
    ['wesh', ' alors', 'wesh alors'],
    ['', '', ''],
    ['', 'a', 'a'],
    [1, 'blabla', null],
    ['ouiouioui', true, null]
];

foreach ($dataTests as $currentTest) {
    echo implode(', ', $currentTest);
    if ($currentTest[2] === $return = concatStrings($currentTest[0], $currentTest[1])) {
        echo ' OK';
    } else {
        echo " ERROR (Actual : " . $return . ")";
    }
    echo PHP_EOL;
}