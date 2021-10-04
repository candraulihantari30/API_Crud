<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\jadwal_kegiatan;
use App\Models\Tb_pelaksan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validasi;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = jadwal_kegiatan::getJadwal()->paginate(2);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'rencanakerja' => 'required|max:255',
            'hari'         => 'required',
            'id_pelaksana' => 'required',
            'waktu'        => 'required',
            'foto'         => 'required|file|mimes:png,jpg'
        ]);
        
        try{
            $fileName          = time().$request->file('foto')->getClientOriginalName();
            $path              = $request->file('foto')->storeAs('uploads/jadwal_kegiatans',$fileName);
            $validasi['foto']  = $path;
            $response          = jadwal_kegiatan::create($validasi);
            return response()->json ([
                'success' => true,
                'message' =>'success',
            ]);

        }catch (\Exception $e){
            return response () -> json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }
    function tb_pelaksan(){
        $data=Tb_pelaksan::all();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=jadwal_kegiatan::where('id_kegiatan',$id)->first();
        return response()->json($data);
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
        $validasi=$request->validate([
            'rencanakerja' => 'required|max:255',
            'hari'         => 'required',
            'id_pelaksana' => 'required',
            'waktu'        => 'required',
            'foto'         => ''
        ]);
        
        try{
            if($request->file('foto')){
                $fileName          = time().$request->file('foto')->getClientOriginalName();
                $path              = $request->file('foto')->storeAs('uploads/jadwal_kegiatans',$fileName);
                $validasi['foto']  = $path;
            }

            $response          = jadwal_kegiatan::where('id_kegiatan',$id);
            $response         ->update($validasi);
            return response()->json ([
                'success' => true,
                'message' =>'success',
            ]);

        }catch (\Exception $e){
            return response () -> json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            try{
                $jadwal_kegiatan=jadwal_kegiatan::where('id_kegiatan',$id);
                $jadwal_kegiatan->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Success'
                ]);
            }catch (\Exception $e){
                return response () -> json([
                    'message' => 'Err',
                    'errors' => $e->getMessage()
                ]);
            }
    }
}
