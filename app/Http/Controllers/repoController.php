<?php

namespace App\Http\Controllers;

use App\Models\repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class repoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;//mendapatkan id dari user yang login
        $repository = repo::all()->where('id', $id);//mendapatkan semua kolom berdasarkan id = id dari user yg login
        return view('dashboard', [
            'title' => 'dashboard',
            'css' => 'css/body.css',
            'css2' => '',
            'js' => 'js/body.js',
            'ckeditor' => 'test',
            'repository' => $repository
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createrepo', [
            'title' => 'Add a new repository',
            'css2' => '',
            'js2' => '',
            'ckeditor' => 'descrepo'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['id'] = Auth::user()->id;
        $request['id_repo'] = mt_rand(1000000000,9999999999);
        $validatedData = $request->validate([
            'nama_repo' => 'required|max:50',
            'deskripsi' => '',
            'id' => '',
            'id_repo' => ''
        ]);

        repo::create($validatedData);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function show(repo $repo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function edit(repo $repo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, repo $repo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function destroy(repo $repo)
    {
        //
    }
}