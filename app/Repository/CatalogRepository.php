<?php

namespace App\Repository;

use App\Models\CatalogModel;

class CatalogRepository
{
    private CatalogModel $mobil;
    public function __construct(CatalogModel $mobil)
    {
        $this->mobil = $mobil;
    }

    public function getAll(){
        return CatalogModel::all();
    }    

    public function getAllPaginate($search, $filterData){
        if($search){
            return $this->search($search);
        }

        if($filterData){
            return $this->filter($filterData);
        } 
        return CatalogModel::paginate(10);
    }

    public function addCatalog($input){
        return CatalogModel::create($input);
    }

    public function getByName($input){
        return CatalogModel::where(strtolower('nama'), strtolower($input))->first();
    }

    public function getById($id){
        return CatalogModel::where('id', $id)->first();
    }

    public function search($keyword){
        return CatalogModel::where('nama', 'like', '%' . $keyword . '%')->paginate(2);
    }

    public function filter($keyword){
        $query = CatalogModel::query();


        if (!empty($keyword['type'])) {
            $query->where('type', $keyword)->paginate(2); ;
        }

        if (!empty($keyword['harga_min'])) {
            $query->where('harga', '>=', $keyword['harga_min']);
        }

        if (!empty($keyword['harga_max'])) {
            $query->where('harga', '<=', $keyword['harga_max']);
        }

        return $query->paginate(10);

    }

    public function getNewest(){
        return CatalogModel::orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();
    }
}
