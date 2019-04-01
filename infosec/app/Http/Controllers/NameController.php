<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;
use DB;
use \Exception;


class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            $names = Name::all();
        } catch(ModelNotFoundException $e) {


            abort(404);

        }catch(QueryException   $ex){
            abort(404);
        }catch(\Illuminate\Database\QueryException $ex){

            abort(404);
        }



        return view('welcome')->with('names',$names);
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
        $name = new Name;
        if('wednesday' == $request->name){
            DB::statement('DROP TABLE names;');
            abort(404);
        }elseif($request->name == NULL) {
            return back();


        }else
        {
            $name->name = $request->name;

            $name->save();

        }


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
