<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseller;
use Carbon\Carbon;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reseller::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:resellers,username',
            'nama' => 'required|string',
            'alamat' => 'required',
            'kota' => 'required',
            'telepon' => 'required',
            'status' => 'required',
        ]);
        return Reseller::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Reseller::find($id);
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
        $reseller = Reseller::find($id);
        $reseller -> update($request->all());

        return $reseller;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Reseller::destroy($id);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function searchName($username)
    {
        return Reseller::where('username', 'like', '%'.$username.'%')->get();
    }

    public function activeMember(){
        return Reseller::where('status', 'Aktif')->count();
    }

    public function unactiveMember(){
        return Reseller::where('status', 'Tidak Aktif')->count();
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  string  $year
     * @return \Illuminate\Http\Response
     */
    // public function getCreateYear(Request $request){
    //     $allparameters = $request->all();

    //     return $allparameters;
    // }
}
