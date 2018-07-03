<?php

namespace App\Http\Controllers;

use App\User;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class RegistrationsController extends Controller
{
    public function allcourses(){
        $users = User::with('courses')->get();

        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('courses/registration/allcourses', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }

    }

    public function deleteregistration(){
        $users = User::with('courses')->get();

        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('users/admin/deleteregistration', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('/home');
        }

    }

    public function authtorizeStudent(Request $request,$idCourse,$idUser){
        $op=1;
        $courses = Courses::find($idCourse);


        $user = User::find($idUser)->courses()->updateExistingPivot($idCourse,['authorized' => 1]);
        

        
        if (Gate::allows('admin-only', auth()->user())) {
            \Session::flash('status', 'O Estudante foi autorizado!');
            $users = User::with('courses')->get();
            return view('courses/registration/allcourses', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }
    }

    public function deleteStudent(Request $request,$idCourse,$idUser){
        $student = User::find($idUser);
        $course = Courses::find($idCourse);
        if($student->courses->contains($course)){
            \Session::flash('status', 'Matricula excluida');
            $student->courses()->detach($idCourse);
            $users = User::with('courses')->get();
            return view('courses/registration/allcourses', ['users' => $users]);
        }else{
            \Session::flash('error', 'Algo de errado aconteceu, entre em contato com a TI');
            return redirect('/home');
        }
    }
    
    public function index()
    {
        $courses = Courses::all();
        $courses = Courses::paginate(2);
        $users = User::with('courses')->get();
            return view('/courses/user/list', ['courses1' => $courses,'users' => $users]);
       
    }

    public function adminregisterlist()
    {
        $courses = Courses::all();
        $users = User::all();;

            return view('/users/admin/register', ['courses' => $courses,'users' => $users]);
       
    }


    public function adminre(Request $request){
        $student = User::find($request->input('user'));
        $course = Courses::find($request->input('curso'));
        $c=$request->input('curso');
        if($student->courses->contains($course)){
            \Session::flash('error', 'O aluno ja esta matriculado nessa curso!');
            return redirect('/home');
        }else{
            \Session::flash('status', 'Matricula efetuada com sucesso!!!');
            $student->courses()->attach($c);
            $user = User::find($request->input('user'))->courses()->updateExistingPivot($c,['authorized' => 1]);
            return redirect('/home');
        }
        
    } 

    public function userre($id){
        $student = User::find(Auth::id());
        $course = Courses::find($id);
        if($student->courses->contains($course)){
            \Session::flash('error', 'Voce ja esta matriculado nessa curso!');
            return redirect('/courses/user/list');
        }else{
            \Session::flash('status', 'Matricula feita, aguarde um administrador confirma-la');
            $student->courses()->attach($id);
            return redirect('/courses/user/list');
        }

        
    } 


    public function userde($id){
        $student = User::find(Auth::id());
        $course = Courses::find($id);
        if($student->courses->contains($course)){
            \Session::flash('status', 'Matricula excluida');
            $student->courses()->detach($id);
            $users = User::find(Auth::id())->courses;
            return redirect('courses/user/mycourses');
        }else{
            \Session::flash('error', 'Algo de errado aconteceu, entre em contato com a TI');
            return redirect('/home');
        }
        
    } 

    public function mycourses(){
        $courses = User::find(Auth::id())->courses;
        return view('courses/user/mycourses', ['courses' => $courses]);
        
    }  
}
