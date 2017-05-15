<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Cuenta;
use App\MovimientoTipo;
use App\MovimientoCuenta;
use App\CuentaTipo;
/**
* 
*/
class MovimientosCreditoComposer
{
	
	public function compose(View $view)
	{
		$tipos_movimiento = MovimientoTipo::where('categoria','=','credito')->pluck('name','id');
		
		$view->with('tipos_movimiento',$tipos_movimiento);
	}
}


