<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriaHotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function fotos()
    {
        return view('hotel.fotos',[
            'fotos' => GaleriaHotel::all(),
        ]);
    }
    public function fotosstore()
    {
        $this->validate(request(), [
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        $galeria = new GaleriaHotel();
        $galeria->save();
        $galeria->foto = crearimagen(request()->hasFile('foto'), request()->file('foto'), GaleriaHotel::Name(), GaleriaHotel::Ruta());
        $galeria->descripcion = request()->get('descripcion');
        $galeria->save();

        return redirect()->back()->with('message', 'Foto subida')->with('typealert', 'success');
    }
    public function fotosdelete(GaleriaHotel $galeria)
    {
        eliminarimagen($galeria->foto, GaleriaHotel::Ruta(), GaleriaHotel::Urldelete());
        $galeria->delete();
        return redirect()->back()->with('message', 'Foto eliminada')->with('typealert', 'success');
    }
}
