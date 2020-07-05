<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ArticlesModel;

class ArticlesController extends Controller
{
    public function index()
    {
        $data = ArticlesModel::getAll();
        return view('views.articles_view', compact('data'));
    }

    public function create()
    {
        return view('views.articles_form');
    }

    public function save(Request $request)
    {
        $data['title'] = $request['_title'];
        $data['content'] = $request['_content'];
        $data['tag'] = $request['_tag'];
        $slug = str_replace(" ", "-", $request['_title']);
        $data['slug'] = $slug;
        $data['created_at'] = date('Y-m-d H:i:s');
        ArticlesModel::save($data);
        return redirect('/articles');
    }

    public function show($id)
    {
        $data = ArticlesModel::getAll();
        return view('views.articles_detail', compact(['data', 'id']));
    }

    public function edit($id)
    {
        $data = ArticlesModel::getAll();
        return view('views.articles_edit', compact(['data', 'id']));
    }

    public function update($id, Request $request)
    {
        $data['title'] = $request['_title'];
        $data['content'] = $request['_content'];
        $data['tag'] = $request['_tag'];
        $slug = str_replace(" ", "-", $request['_title']);
        $data['slug'] = $slug;
        $data['updated_at'] = date('Y-m-d H:i:s');
        ArticlesModel::update($data, $id);
        return redirect('/articles');
    }

    public function delete($id)
    {
        ArticlesModel::delete($id);
        return redirect('/articles');
    }


}
