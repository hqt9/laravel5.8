<?php
// function action($v1, $v2)
// {
//     var_dump($v1, $v2);
//     return $v1 . "-" . $v2;
// }
//
// $a = array("Dog", "Cat", "Horse");
// print_r(array_reduce($a, "action", '1'));
//
//
//
// $f = (function ($a = 1, $b = 2) {
//     return $a + $b;
// })();
// var_dump($f);

// 2
// $parameters = [1, 2, 3, 4];
// var_dump($parameters);
// array_splice(
//     $parameters, 0, 0, 5
// );
// var_dump($parameters);

// $valuesToProcess = [
//     'name' => 'Anderson Lucas Silva de Oliveira',
//     'age' => 21,
//     'hobbies' => 'Play games'
// ];
//
// function processUserData($name, $age, $job = "", $hobbies = "")
// {
//     $msg = "Hello $name. You have $age years old";
//     if (!empty($job)) {
//         $msg .= ". Your job is $job";
//     }
//
//     if (!empty($hobbies)) {
//         $msg .= ". Your hobbies is $hobbies";
//     }
//
//     echo $msg . ".";
// }
//
// $refFunction = new ReflectionFunction('processUserData');
// $parameters = $refFunction->getParameters();
//
// $validParameters = [];
// foreach ($parameters as $parameter) {
//     if (!array_key_exists($parameter->getName(), $valuesToProcess) && !$parameter->isOptional()) {
//         throw new DomainException('Cannot resolve the parameter' . $parameter->getName());
//     }
//
//     if(!array_key_exists($parameter->getName(), $valuesToProcess)) {
//         continue;
//     }
//
//     $validParameters[$parameter->getName()] = $valuesToProcess[$parameter->getName()];
// }
// $name = $validParameters['name'] ?? '';
// $age = $validParameters['age'] ?? '';
// $job = $validParameters['job'] ?? '';
// $hobbies = $validParameters['hobbies'] ?? '';
// $refFunction->invoke($name, $age, $job, $hobbies);

// function makeDate($number) {
//     $date = [];
//     for ($i = 0; $i < $number; $i++) {
//         yield $date[] = time();
//     }
//     return $date;
// }
//
// $dates = makeDate(5);
//
// // var_dump($dates);
// echo PHP_EOL;
// foreach ($dates as $date) {
//     sleep(1);
//     echo $date . PHP_EOL;
// }

$a = '';
var_dump($a);
var_dump((array)$a);
