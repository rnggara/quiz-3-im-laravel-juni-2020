<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class ArticlesModel {

    public static function getAll()
    {
        return DB::table('articles')->get();
    }

    public static function save($data)
    {
        return DB::table('articles')->insert($data);
    }

    public static function delete($id)
    {
        return DB::table('articles')->delete($id);
    }

    public static function update($data, $id)
    {
        return DB::table('articles')->where('id', $id)->update($data);
    }

}

