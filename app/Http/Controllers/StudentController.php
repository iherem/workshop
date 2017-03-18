<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class StudentController extends Controller
{
    protected $StudentRepository;
    public function __construct(StudentRepositoryInterface $StudentRepository){
        $this->StudentRepository = $StudentRepository;
    }
    public function index($err=""){
        $student = $this->StudentRepository->getAllStudent();
        if($student != null){
          $data = array(
             'student'=>$student
          );
        }else{
          $data = array(
             'student'=>null
          );
        }
        if($err!=""){
          $data['errmsg']=$err;
        }
        return view('student',$data);
    }

    public function edit($student_id=0){
        if($student_id==0){
          if(Input::get()){
            $student_id_input = Input::get('std_id');
            $data = array(
              'name'=>Input::get('name'),
              'password'=>Input::get('password')
            );
            $result = $this->StudentRepository->editStudent($student_id_input,$data);
            if($result > 0){
                return redirect('student');
            }else{
                echo "Fail To Edit";
            }
          }
        }else{
          $data = array(
            'student'=>$this->StudentRepository->findById($student_id)
          );
          return view('editStudent',$data);
        }
    }
    public function delete($student_id){
        $result = $this->StudentRepository->deleteStudent($student_id);
        if($result > 0){
          return redirect('student');
        }else{
          echo "Fail to delete";
        }
    }

    public function add(){
      if(Input::get()){
        $data = array(
          'student_id'=>Input::get('studentid'),
          'name'=>Input::get('name'),
          'password'=>Input::get('password')
        );
        $result = $this->StudentRepository->addStudent($data);
        if($result){
          return redirect('student');
        }else{
          $errmsg = "Fail to add Student.";
          return $this->index($errmsg);
        }
      }else{
        return view('addStudent');
      }
    }
}
