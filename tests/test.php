<?php

require_once "./vendor/autoload.php";

$database = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'dbname' => '123dok_spider',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];

$connection = \Doklibs\DTO\DB\Connection::make($database);
$query = new \Doklibs\DTO\DB\QueryBuilder($connection);

$users = (clone $query)->select('users')->all();
//dump($users);

$users = \Doklibs\DTO\Tests\User::query(clone $query)
        ->select()
        ->all();
dd($users);
//$users = \Doklibs\DTO\Tests\User::query(clone $query)
//    ->select(['id', 'name'])
//    ->where('age', '>', 18)
//    ->limit(10)
//    ->get();

//$users = \Doklibs\DTO\Tests\User::query(clone $query)
//    ->create([
//        'name' => "Nguyễn Gia Hào",
//        'age' => 18,
//    ]);

//$user = new \Doklibs\DTO\Tests\User([
//        'name' => "Nguyễn Gia Hào",
//        'age' => 18,
//    ]);
//$user->save();



