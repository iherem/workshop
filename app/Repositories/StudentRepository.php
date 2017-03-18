<?php
namespace App\Repositories;
use App\Student;
use Exception;
class StudentRepository implements StudentRepositoryInterface{
    public function getAllStudent(){
      $students = Student::orderBy('created_at')->get();
        return $students;
    }

    public function findById($student_id){
      $student = Student::where('student_id',$student_id);
      if($student->exists()){
          return $student->first();
      }else{
        return null;
      }
    }

    public function editStudent($student_id,$data){
        $result = Student::where('student_id',$student_id)->update($data);
        return $result;
    }

    public function deleteStudent($student_id){
      $result = Student::where('student_id',$student_id)->delete();
      return $result;
    }

    public function addStudent($data){
      try{
        $result = Student::create($data);
        return true;
      }catch(Exception $e){
        return false;
      }
    }
}
