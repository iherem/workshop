<?php
namespace App\Repositories;
interface StudentRepositoryInterface{
  function getAllStudent();
  function findById($student_id);
  function editStudent($student_id,$data);
  function deleteStudent($student_id);
  function addStudent($data);
}
