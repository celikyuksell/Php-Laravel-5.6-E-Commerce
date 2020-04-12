<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    //
    public function index()
    {
        $data = DB::select('SELECT * FROM settings');
        $menu = "uye";

        return view('front.user_panel', compact('data', 'menu'));
    }

    public function sepete_ekle(Request $request)
    {
        DB::table('sepet')->insert(
            ['kitap_id' => $request->urunid,
                'user_id' => Auth::user()->id,
                'miktar' => $request->miktar
            ]
        );
        $id = $request->urunid;
        return redirect("/urun/$id")->with('success', 'Ürünler Sepete Eklendi');
    }

    public function sepetim()
    {
        $data = DB::select('SELECT * FROM settings');
        $veriler = DB::select('select k.* , s.miktar as miktar 
                            from kitaplars k, sepet s
                            where k.Id = s.kitap_id and s.user_id=?', [Auth::user()->id]);
        $menu = "sepet";
        return view('front.sepetim', compact('veriler', 'data', 'menu'));
    }

    public function sepet_sil($id)
    {
//Silme
        DB::select("DELETE  FROM sepet WHERE Id=?",[$id]);
        return redirect('/sepetim')->with('success', ' Ürün Sepetten Silindi');
    }

    public function siparis_tamamla(Request $request)
    {
        if($request->isMethod('post')) {
            $data = DB::select('SELECT * FROM settings');
            $user = DB::select('SELECT * FROM users WHERE Id=?', [Auth::user()->id]);

            $toplam = $request->toplam;

            $menu = "sepet";
            return view('front.siparis_tamamla', compact('veriler', 'data', 'menu', 'user', 'toplam'));
        } else
        {echo "Hata: Post bilgisi yok";}
    }

    public function satinal(Request $request)
    {
        $onay=1;
        // Kredi kartı Bilgilerini al
        // Bankaya gönder onay gelirse
        if ($onay==1) {
            DB::table('siparis')->insert(

                ['adsoy' => $request->adsoy,
                    'user_id' => Auth::user()->id,
                    'tutar' => $request->toplam,
                    'adres' => $request->adres,
                    'tel' => $request->tel,
                    'sehir' => $request->sehir
                ]
            );

            $siparisid= DB::getPdo()->lastInsertId();
            $veriler = DB::select('select k.* , s.miktar as miktar 
                            from kitaplars k, sepet s
                            where k.Id = s.kitap_id and s.user_id=?', [Auth::user()->id]);
            foreach ($veriler as $rs)
            {
                DB::table('siparis_detay')->insert(
                    ['siparis_id' => $siparisid,
                        'user_id' => Auth::user()->id,
                        'kitap_id' => $rs->Id,
                        'fiyat' => $rs->sfiyat,
                        'miktar' => $rs->miktar,
                        'tutar' => $rs->miktar* $rs->sfiyat,
                        'adi' => $rs->adi
                    ]
                );
            }
            DB::select("DELETE  FROM sepet WHERE user_id=?",[Auth::user()->id]);
            return redirect('/siparis_son')->with('success', "Alışveriş İleminiz Başarıyla Tamamlanmıştır. Teşekkür Ederiz");
            // kullanıcıya sipariş ile ilgili email gönderilebilir..
        } else
        {
            echo "Bankadan onay alınamamıştır. Yetersiz bakiye yada Hatalı kart Bilgileri";
        }

        // if banka onay
    }
     public function siparis_son()
     {
         $data = DB::select('SELECT * FROM settings');
         $menu="user";
         return view('front.siparis_son', compact('data',  'menu'));
     }

    public function siparisler()
    {
        $data = DB::select('SELECT * FROM settings');
        $data2 = DB::select("SELECT * FROM siparis WHERE user_id=?",[Auth::user()->id]);
        $menu="user";
        return view('front.siparisler', compact('data', 'data2', 'menu'));
    }

    public function siparis_detay($id)
    {
        $data = DB::select('SELECT * FROM settings');
        $siparis = DB::select("SELECT * FROM siparis WHERE Id=?",[$id]);
        $urunler = DB::select("SELECT s.*, k.resim as resim FROM siparis_detay s, kitaplars k  WHERE s.kitap_id=k.ID AND s.siparis_id=?",[$id]);
        $menu="user";
        return view('front.siparis_urunler', compact('data', 'siparis','urunler', 'menu'));
    }
}
