<?php

namespace App\Repository;

use App\Models\BlogModel;

class BlogRepository
{
    private BlogModel $data;
    public function __construct(BlogModel $data)
    {
        $this->data = $data;
    }

    public function getAll(){
        return BlogModel::all();
    }

    public function getAllPaginate(){
        return BlogModel::paginate(10);
    }

    public function add($input){
        return BlogModel::create($input);
    }

    public function getById($id){
        return BlogModel::where('id', $id)->first();
    }
    public function getNewest(){
        return BlogModel::orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();
    }
}
