<?php

namespace App\Http\Controllers;

use App\User;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        
    }

    public function index()
    {
        $courses = Courses::all();
        $courses = Courses::paginate(2);
            return view('courses/index', ['courses' => $courses]);

       
    }

    public function create() 
    {
        
        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('courses/new');
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }
    }



    public function update(Request $request, $id) {
        $c = Courses::findOrFail($id);
        $c->nameCourse = $request->input('nameCourse');
        $c->Ementa = $request->input('ementa');
        $c->qtnStudents = $request->input('qtnStudents');

        
        if ($c->save()) {
            \Session::flash('status', 'Curso atualizado com sucesso.');
            return redirect('/courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Curso.');
            return view('courses.edit', ['courses' => $c]);
        }
    }

    public function destroy($id) {
        $c = Courses::findOrFail($id);
        $c->delete();

        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('/courses');
    }
}
