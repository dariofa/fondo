<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\InfoLaboUser;
use App\InfoProfUser;
class UsersController extends Controller 
{

    public function buscarUsersAjax(Request $request){

        $user = User::where('num_doc', '=',($request->cedula))->firstOrFail();
        return response()->json($user);        
      } 

      public function buscarUsersInfoLabo(Request $request){
        $user = InfoLaboUser::orderBy('id','ASC')->where('user_id','=', $request->id)->get();
        return response()->json($user);        
      } 
      public function buscarUsersInfoProf(Request $request){
        $user = InfoProfUser::orderBy('id','ASC')->where('user_id','=', $request->id)->get();
        return response()->json($user);
      }
    
    public function index(){   
        $id = Auth::id();
        $users = User::orderBy('id','ASC')->where('id','<>', $id)->paginate(4);
        return view('admin.users.index',["users"=>$users]) ;
           }

    public function create(){
       return view('admin.users.create') ;
    }

    
    public function store(Request $request){
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user -> save();       
        flash::success('Usuario '.$user->name.' registrado con exito');
       return redirect()->route('users.index');

    } 
    public function storeAjax(Request $request){
        $user = new User($request->all());
        $user -> save();
         flash::success('Usuario '.$user->name.' registrado con exito');
       return redirect('admin/cuentas/create/'.$user->id);

    }
    
    public function show($id){
        $user = User::find($id);
      return view('admin.users.show',['user'=>$user]);
    }

     public function edit($id){
        //
    }

    public function agregarinflabo(Request $request){
        $user = User::find($request->user_id);
        $newInfoLabo = new InfoLaboUser($request->all());
        $newInfoLabo->save();
       Flash::success('La Información laboral del usuario: '.$user->name.' ha sido agregada con exito');
       return redirect()->route('users.show',['user'=>$user]);
    }

    public function editarinflabo(Request $request){

        $user_info_lab = InfoLaboUser::find($request->id);
        $user_info_lab->fill($request->all());
        $user_info_lab->save();
        $user = $user_info_lab->user;
    Flash::success('La Información personal del usuario: '.$user->name.' ha sido agregada con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }
    public function eliminarinflabo(Request $request){
        $user_info_lab = InfoLaboUser::find($request->id);
        $user_info_lab -> delete();
        $user = $user_info_lab->user;
        Flash::success('La Información personal del usuario: '.$user->name.' ha sido eliminada con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }

    public function agregarinfprof(Request $request){
        $newInfoProf = new InfoProfUser($request->all());
        $newInfoProf->save();
        $user = $newInfoProf->user;
       Flash::success('La Información profesional del usuario: '.$user->name.' ha sido agregada con exito');
       return redirect()->route('users.show',['user'=>$user]);
    }
    public function editarinfprof(Request $request){
        $user_info_prof = InfoProfUser::find($request->id);
        $user_info_prof->fill($request->all());

        $user_info_prof->save();
        $user = $user_info_prof->user;
    Flash::success('La Información profesional del usuario: '.$user->name.' ha sido agregada con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }
    public function eliminarinfprof(Request $request){
        $user_info_prof = InfoProfUser::find($request->id);
        $user_info_prof -> delete();
        $user = $user_info_prof->user;
        Flash::success('La Información personal del usuario: '.$user->name.' ha sido eliminada con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }
   
    public function updateInfPersonal(Request $request, $id){
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
//dd($request->all());
       Flash::success('La Información personal del usuario: '.$user->name.' ha sido actualizada con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->fill($request->all());
        $user->save();

        Flash::success('El perfil del usuario: '.$user->name.' ha sido actualizada con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
        $user -> delete();
       Flash::success('El usuario: '.$user->name.' ha sido eliminado con exito');
        return redirect()->route('users.index');
    }
}
