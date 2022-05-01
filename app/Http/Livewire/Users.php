<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Validator;


class Users extends Component
{

    public $search;

    public $name;
    public $password;
    public $email;
    public $id_user;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'password' =>'required|min:8'
    ];

    //pagina de inicio usuario
    public function render()
    {
        return view('livewire.users',["usuarios"=>
        User::where('name','LIKE','%'.$this->search.'%')->get()
        ]);
    }

    //eliminar usuario
    public function eliminar($id){
    User::find($id)->delete();
    }

    //limpar datos
    public function limpiar(){
        $this->name = "";
        $this->email = "";
        $this->id_user = "";
        $this->password = "";
    }

    //Crear usuario
    public function crear(){

        $this->validate();

        $u = new User();
        $u->name = $this->name;
        $u->email = $this->email;
        $u->password= bcrypt($this->password);
        $u->save();
    }

    //obtener usuario
    public function get_user($id){
        $u = User::find($id);
        $this->name = $u->name;
        $this->email = $u->email;
        $this->id_user = $u->id;
    }

    //actualizar usuario
    public function actualizar(){
        $this->validate();
        $u = User::find($this->id_user);
        $u->name = $this->name ;
        $u->email = $this->email;
        $u->password= bcrypt($this->password);
        $u->save();
        return redirect('/usuarios');
    }

}
