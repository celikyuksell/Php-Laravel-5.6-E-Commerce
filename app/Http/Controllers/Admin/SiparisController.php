<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SiparisController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $siparis = DB::select("SELECT s.*,u.name as uyeadsoy FROM siparis s, users u WHERE u.Id=s.user_id AND durum='Yeni'");
        return view('admin.siparis_yeni', compact('siparis'));

    }

    public function siparisler($durum)
    {
        $siparis = DB::select("SELECT s.*,u.name as uyeadsoy FROM siparis s, users u WHERE u.Id=s.user_id AND durum='$durum'");
        return view('admin.siparisler', compact('siparis','durum'));

    }

    public function siparis_detay($id)
    {

        $siparis = DB::select("SELECT * FROM siparis WHERE Id=?",[$id]);
        $urunler = DB::select("SELECT s.*, k.resim as resim FROM siparis_detay s, kitaplars k  WHERE s.kitap_id=k.ID AND s.siparis_id=?",[$id]);

        return view('admin.siparis_detay', compact( 'siparis','urunler'));
    }

    public function siparis_update(Request $request, $id)
    {
         DB::table('siparis')
            ->where('Id',$id)
            ->update(['aciklama' => $request->aciklama,
                'durum'=>$request->durum
         ]);
        return redirect("admin/siparis_detay/$id")->with('success', ' Sipariş Güncellendi Güncellendi');
    }
}
