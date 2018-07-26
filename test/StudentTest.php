<?php
/**
 * Created by PhpStorm.
 * User: leeyu
 * Date: 2018/7/25
 * Time: 11:48
 */

namespace Example\Test;

use App\Libraries\Student;

class StudentTest
{
    public function testGetStudent(){
        echo 'class:testGetStudent,';
        $sutdentObject = new Student();
        $sutdentObject->getStudent();
    }
}