<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Cuenta;
use App\Credito;

/**
* 
*/
class AdminComposer
{
	
	public function compose(View $view)
	{
		$creditos = Credito::orderBy("id","ASC")->get();
		$cuentas = Cuenta::orderBy("id","ASC")->get();		
		//$tipo_credito = count($cuentas)+1;
		$view->with('creditos',$creditos)->with('cuentas',$cuentas);
	}
}


