<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::select('SELECT * FROM settings');
        $turler = DB::select('SELECT * FROM turler ORDER BY adi');
        $kategori = DB::select('SELECT * FROM kategoriler WHERE ust_id=0 ORDER BY adi');
        $yeniler = DB::select('SELECT * FROM kitaplars ORDER BY adi');
        $popular = DB::select('SELECT * FROM kitaplars ORDER BY Id');
        $menu="home";
        return view("front.home",compact('turler','kategori','popular','yeniler','data','menu'));
    }

    public function urun($id)
    {
        /*echo "Ürün sayfası";
        die(); */
        $data = DB::select('SELECT * FROM settings');
        $turler = DB::select('SELECT * FROM turler ORDER BY adi');
        $kategori = DB::select('SELECT * FROM kategoriler WHERE ust_id=0 ORDER BY adi');
        $urun = DB::select('SELECT * FROM kitaplars WHERE Id=?',[$id]);
        $resimler= DB::select('SELECT * FROM images WHERE urun_id=?',[$id]);
        $menu="urun";
        return view("front.urun_detay",compact('turler','kategori','urun','resimler','menu','data'));

    }

    public function hakkimizda()
    {
        $data = DB::select('SELECT * FROM settings');
        $kategori = DB::select('SELECT * FROM kategoriler WHERE ust_id=0 ORDER BY adi');
        $menu="hakkimizda";
        return view ("front.hakkimizda",compact('kategori','data','menu'));
    }
    public function iletisim()
    {
        $data = DB::select('SELECT * FROM settings');
        $kategori = DB::select('SELECT * FROM kategoriler WHERE ust_id=0 ORDER BY adi');
        $menu="iletisim";

        return view("front.iletisim",compact('kategori','data','menu'));
    }

    public function bize_yazin_formu()
    {
        $data = DB::select('SELECT * FROM settings');
        $kategori = DB::select('SELECT * FROM kategoriler WHERE ust_id=0 ORDER BY adi');
        $menu="bizeyazin";

        return view("front.bizeyazin",compact('kategori','data','menu'));
    }

    public function bize_yazin_kaydet(Request $request)
    {
        DB::table('messages')->insert(
            ['name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->subject,
                'message' => $request->message,
                'ip' => request()->ip()]
        );

        return redirect('/bize_yazin')->with('success', 'Mesajınız Başrıyla Alınmıştır.');
    }
}
