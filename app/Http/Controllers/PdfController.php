<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Knp\Snappy\Pdf;
use App\Credito;
use App\Cuenta;
use App\User;
use View;

class PdfController extends Controller
{
    public function reporteCredito($id)
    { 
        $creditos = Credito::find($id);
        $creditos ->each(function($creditos){
            $creditos->user;
            $creditos->credito_tipo; 
            $creditos->referencias;
            $creditos->movimientos;
            $creditos->cuenta;                          
        });
        return \PDF::loadView('admin/reportes/creditos/movimientos',array('creditos'=>$creditos))->inline();
        //return \PDF::loadView('admin.reportes.Plantilla.index', $creditos)->inline('github.pdf');
		//return \PDF::loadView('admin.reportes.reporte', $creditos)->download('github.pdf');
		//return view('admin.reportes.plantilla.index',['creditos'=>$creditos]);
	}
    public function reporteMoviCuenta($id)
    { 
        $cuenta = Cuenta::find($id);
        $cuenta ->each(function($cuenta){
            $cuenta->user;
                                   
        });
        return \PDF::loadView('admin/reportes/cuentas/movimientos',array('cuenta'=>$cuenta))->inline();
        //return \PDF::loadView('admin.reportes.Plantilla.index', $creditos)->inline('github.pdf');
        //return \PDF::loadView('admin.reportes.reporte', $creditos)->download('github.pdf');
        //return view('admin.reportes.plantilla.index',['creditos'=>$creditos]);
    }
}
