<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index()
    {
        $users = User::all();
        $users = User::paginate(2);

        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('users/admin/index', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }
        
    }


    public function perfil($id) {
        $users = User::findOrFail($id);

        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('users/perfil', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }
        
    }



    public function create() 
    {
        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('users/new');
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }
        
    }

    public function all($name)
    {
        $users = User::where('name', 'like', "$name%")->get();

        return new JsonResponse($users);
    }

    public function store(Request $request) 
    {
        $this->validate($request,$this->courses->rules);

        $u = new User;
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->CPF = $request->input('CPF');
        $u->RG = $request->input('RG');
        $u->state = $request->input('state');
        $u->city = $request->input('city');
        $u->street = $request->input('street');
        $u->numberHouse = $request->input('numberHouse');
        $u->numberTel = $request->input('numberTel');
        if ($u->save()) {
            \Session::flash('status', 'Aluno cadastrado com sucesso.');
            return redirect('/users');
        } else {
            \Session::flash('error', 'Ocorreu um erro ao cadastrado o Aluno.');
            return view('users.admin.new');
        }
    }

    public function edit($id) {
        $users = User::findOrFail($id);

        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('users.admin.edit', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }
        
    }

    public function delete($id) {
        $users = User::findOrFail($id);

        if($users->id==Auth::id()){
            \Session::flash('error', 'Voce não pode se excluir, entre em contato com a TI');
            return redirect('/home');
        }else{

            if (Gate::allows('admin-only', auth()->user())) {
                
                return view('users.admin.delete', ['users' => $users]);
            }else {
                \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
                return view('home');
            }
        }
    }

    public function updateAdmin(Request $request, $id) {
        $u = User::findOrFail($id);

        if($u->id==Auth::id()){
            \Session::flash('error', 'Voce não pode se retirar dos Admin, entre em contato com a TI');
            return redirect('/users/'.$u->id.'/perfil');
        }else{
            if($u->isAdmin==1){
                $u->isAdmin = 0;
            }else{
                $u->isAdmin = 1;
            }
    
            if ($u->save()) {
                \Session::flash('status', 'Usuario atualizado com sucesso.');
                return redirect('/users/'.$u->id.'/perfil');
            } else {
                \Session::flash('error', 'Ocorreu um erro ao atualizar o Usuario.');
                return redirect('/users/'.$u->id.'/perfil');
            }
        }

    }

    public function update(Request $request, $id) {
        $u = User::findOrFail($id);
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->CPF = $request->input('CPF');
        $u->RG = $request->input('RG');
        $u->state = $request->input('state');
        $u->city = $request->input('city');
        $u->street = $request->input('street');
        $u->numberHouse = $request->input('numberHouse');
        $u->numberTel = $request->input('numberTel');
        
        if ($u->save()) {
            \Session::flash('status', 'Usuario atualizado com sucesso.');
            if($u->isAdmin==1){
                return redirect('/users');
            }else{
                return view('home', ['users' => $u]);
            }

        } else {
            \Session::flash('error', 'Ocorreu um erro ao atualizar o Usuario.');
            return view('users.admin.edit', ['users' => $u]);
        }
    }

    public function destroy($id) {
        $u = User::findOrFail($id);
        $u->delete();

        \Session::flash('error', 'Usuario excluído com sucesso.');
        return redirect('/users');
    }
}
