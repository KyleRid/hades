<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;
use Illuminate\Support\Facades\DB;

// add delete update get
class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Options::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option = Options::create($request->all());
        return response()->json($option, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Options $option)
    {
        return $option;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Options $option)
    {
        // VALIDATE
        return var_dump($option);
        // \DB::table('options')->whereIn('id', $option)->update(['code' => 'AD']);
        // $update = [['column' => 'value'],['column' => 'value']];
        // DB::table('my_table')->whereIn('page_id', [1, 2, 3])->update($update);
        // $input = $request->all();
        // $option->fill($input)->save();
        // $option->update($request->all());
        // return response()->json($option, 200);
        // back()->with('message', 'Record Successfully Updated!');
        $option->update($request->all());

        return response()->json($option, 200);
    }

    public function updateMultiple(Options $option) {
        //VALIDATE
        $ids = $option;
        // var_dump(json_encode(123));
        // return $request;
    //     DB::table('options')->whereIn('option_id', [1, 2])->update([
    //         'option_value' => 'newSiteUrl'
    //     ],
    // [
    //     'option_value' => 'newHOme'
    // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Options $option)
    {
        $option->delete();
        return response()->json(null, 204);
    }
}
