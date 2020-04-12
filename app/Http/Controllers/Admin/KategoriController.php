<?php

namespace App\Http\Controllers\Admin;


use App\Kategoriler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
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
        $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');

        return view('admin.kategori_listesi',['datas'=>$kategoriler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ekleme Formu
        $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');
        return view('admin.kategori_ekleme_formu',['kategoriler'=>$kategoriler]);
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


        DB::table('kategoriler')->insert(
            ['adi' => $request->get('adi'),
                'keywords' => $request->get('keywords'),
                'description' => $request->description,
                'ust_id'=>$request->ust_id,
                'durum'=>$request->durum,
                'resim' => $name ]
        );


        return redirect('admin/kategoriler')->with('success', 'Kategori Kaydedildi');
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
        $kategori = DB::select('SELECT * FROM kategoriler WHERE ust_id=0 ORDER BY adi');

       // $veri=Kategoriler::findOrFail($id);

        //$veri = DB::select("SELECT * FROM kitaplars WHERE Id=?",[$id]);

        $veri = DB::select('SELECT a.*, b.adi as kategori
                FROM kategoriler a LEFT JOIN kategoriler b
                ON a.ust_id = b.Id
                WHERE a.Id=?',[$id]);
        return view('admin.kategori_duzenleme_formu',compact('veri','kategori'));
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



        DB::table('kategoriler')
        ->where('Id',$id)
        ->update(['adi' => $request->adi,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'ust_id'=>$request->ust_id,
                'durum'=>$request->durum,
                'resim' => $name
                ]);
        return redirect('admin/kategoriler')->with('success', $request->adi.' Kategorisi Güncellendi');
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
        DB::select("DELETE  FROM kategoriler WHERE Id=?",[$id]);
        return redirect('admin/kategoriler')->with('success', ' Kategori Silindi');

    }
}
