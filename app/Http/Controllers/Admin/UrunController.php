<?php

namespace App\Http\Controllers\Admin;

use App\Kitaplar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        // Ürünler sayfasının ana girişi
        /*
         * select s.name "Student", c.name "Course"
            from student s, bridge b, course c
            where b.sid = s.sid and b.cid = c.cid
         */

        $sql='select k.Id , k.adi,k.resim,k.sfiyat,k.stok,k.durum, c.adi as kategori, t.adi as turu  
              from kitaplars k, kategoriler c, turler t
              where k.kategori_id = c.Id and k.turu_id= t.Id
              ORDER by k.adi';


        $urunler = DB::select($sql);

        return view('admin.urun_listesi',['urunler'=>$urunler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ekleme Formu
        $turler = DB::select('SELECT * FROM turler ORDER BY adi');
        $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');
        return view('admin.urun_ekleme_formu',['turler'=>$turler],['kategoriler'=>$kategoriler]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Ekleme formundan gelen verileri kaydetme

        if($request->hasfile('resim'))
        {
            $file = $request->file('resim');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/userfiles/', $name);
        }


        DB::table('kitaplars')->insert(
            ['adi' => $request->get('adi'),
                'keywords' => $request->get('keywords'),
                'description' => $request->description,
                'turu_id'=>$request->turu_id,
                'kategori_id'=>$request->kategori_id,
                'yazar'=>$request->yazar,
                'stok'=>$request->stok,
                'afiyat'=>$request->afiyat,
                'sfiyat'=>$request->sfiyat,
                'aciklama'=>$request->aciklama,
                'durum'=>$request->durum,
                'resim' => $name ]
        );


        return redirect('admin/urunler')->with('success', 'Ürünler Kaydedildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Tek veri gösterme
        echo "Gösterme ". $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Düzenleme formunu gösterme
        $turler = DB::select('SELECT * FROM turler ORDER BY adi');
        $kategori = DB::select('SELECT * FROM kategoriler ORDER BY adi');
        //$veri=Kitaplar::findOrFail($id);
        //$veri = DB::select("SELECT * FROM kitaplars WHERE Id=?",[$id]);
        $veri = DB::select('select k.*, c.adi as kategori, t.adi as turu  
                            from kitaplars k, kategoriler c, turler t
                            where k.kategori_id = c.Id and k.turu_id= t.Id and k.Id=?',[$id]);
        return view('admin.urun_duzenleme_formu',compact('veri','turler','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Düzenleme formundan gelen verileri veritabanına update etme


        if($request->hasfile('resim'))
        {
            $file = $request->file('resim');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/userfiles/', $name);
        }
        else
            $name=$request->resim2;



        DB::table('kitaplars')
        ->where('Id',$id)
        ->update(['adi' => $request->adi,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'turu_id'=>$request->turu_id,
                'kategori_id'=>$request->kategori_id,
                'yazar'=>$request->yazar,
                'stok'=>$request->stok,
                'afiyat'=>$request->afiyat,
                'sfiyat'=>$request->sfiyat,
                'aciklama'=>$request->aciklama,
                'durum'=>$request->durum,
                'resim' => $name
                ]);
        return redirect('admin/urunler')->with('success', $request->adi.' Ürünü Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Silme
        DB::select("DELETE  FROM kitaplars WHERE Id=?",[$id]);
        return redirect('admin/urunler')->with('success', ' Ürün Silindi');

    }

    public function galeri_formu($id)
    {
        //Düzenleme formunu gösterme
        $resimler= DB::select('SELECT * FROM images WHERE urun_id=?',[$id]);
        $veri= DB::select('SELECT * FROM kitaplars WHERE Id=?',[$id]);
        return view('admin.urun_galeri_ekleme',compact('veri','resimler'));
    }


    public function galeri_ekle(Request $request)
    {
        //Ekleme formundan gelen verileri kaydetme

        if($request->hasfile('resim'))
        {
            $file = $request->file('resim');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/userfiles/', $name);
        }


        DB::table('images')->insert(
            [   'urun_id'=>$request->id,
                'resim' => $name ]
        );


        return redirect('admin/urun/galeri/'.$request->id)->with('success', 'Resim Kaydedildi');
    }

    public function galeri_sil($id)
    {
        //Silme
        DB::select("DELETE  FROM images WHERE Id=?",[$id]);
        return redirect('admin/urun/galeri/'.$id)->with('success', ' Galeriden Resim Silindi');

    }
}
