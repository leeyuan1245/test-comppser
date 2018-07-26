<?php
/**
 * Created by PhpStorm.
 * User: leeyu
 * Date: 2018/7/25
 * Time: 14:11
 */

require './vendor/autoload.php';

use App\Libraries\Student;
use App\Libraries\Staff;
use Example\Test\StudentTest;
use Jose\MyZip\MyZip;


$Student = new Student();
$Student->getStudent();

echo '<hr>';
$Staff = new Staff();
$Staff->getStaff();

echo '<hr>';
$Student_test = new StudentTest();
$Student_test->testGetStudent();

echo '<hr>';
test();

echo '<hr>';
$mysql = new mysql();
$mysql->getAll();

echo '<hr>';
$Myzpi = new MyZip();
$Myzpi->getMyZip();