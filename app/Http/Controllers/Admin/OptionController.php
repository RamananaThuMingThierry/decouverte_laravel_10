<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.options.index', [
            'options' => Option::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $option = new Option();
        return View('admin.options.form', [
            'option' => $option
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        $options = Option::create($request->validated());
        return Redirect()->route('admin.option.index')->with('success','L\'option a été créé');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        return View('admin.options.form', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, Option $option)
    {
        if($option->exists){
            $option->update($request->validated());
            return redirect()->route('admin.option.index')->with('success', 'L\'option a été modifié');
        }else{
            return redirect()->route('admin.option.index')->with('warning', 'L\'option n\'existe pas dans la base de données!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        if($option->exists){
            $option->delete();
            return redirect()->route('admin.option.index')->with('success', 'L\'option a été supprimé');
        }else{
            return redirect()->route('admin.option.index')->with('warning', 'L\'option n\'existe pas dans la base de données');
        }
    }
}
