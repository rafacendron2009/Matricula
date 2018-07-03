<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['nameCourse','Ementa','qtnStudents'];
    public function user(){
        return $this->belongsToMany(User::class, 'registrations','user_id','courses_id')->withPivot('authorized','id')->withTimestamps();
    }

    public $rules= [
        'nameCourse' => 'required|string|max:255',
        'Ementa' => 'required|string|max:255',
        'qtnStudents' => 'required|numeric|min:6',
    ];
}