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
class CuentasComposer
{
	
	public function compose(View $view)
	{
		$tipo_cuenta = CuentaTipo::orderBy("id","ASC")->get();
		$cuentas = Cuenta::orderBy("id","ASC")->get();
		$tipos_ingresos = MovimientoTipo::where('categoria','=','credito');
		$num_cuenta = Cuenta::all();
        $cuentas ->each(function($cuentas){
            $cuentas->user;
            $cuentas->ingresos_tipo;   

             //   
    });
		//$cuentas = Cuenta::all();
		

		
		$num_cuenta = count($cuentas)+1;
		$view->with('num_cuenta',$num_cuenta)->with('cuentas',$cuentas)->with('tipos_ingresos',$tipos_ingresos)->with('tipo_cuenta',$tipo_cuenta);
	}
}


