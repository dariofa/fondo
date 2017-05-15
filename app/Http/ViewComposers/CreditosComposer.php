<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\CreditoTipo;

/**
* 
*/
class CreditosComposer
{
	
	public function compose(View $view)
	{
		$tipo_credito = CreditoTipo::orderBy("id","ASC")->get();
				
		//$cuentas = Cuenta::all();
		

		
		//$tipo_credito = count($cuentas)+1;
		$view->with('tipo_credito',$tipo_credito);
	}
}


