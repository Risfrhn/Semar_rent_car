<?php

namespace App\Repository;

use App\Models\PromoModel;

class PromoRepository
{
    private PromoModel $path;
    public function __construct(PromoModel $path)
    {
        $this->path = $path;
    }

    public function add($input){
        return PromoModel::create($input);
    }
    
    public function getAll(){
        return PromoModel::paginate(10);
    }

    public function getById($id){
        return PromoModel::where('id', $id)->first();   
    }

    public function getNewest(){
        return PromoModel::orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();
    }
}
