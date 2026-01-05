<?php

namespace App\Service;

use App\Repository\CatalogRepository;

class CatalogService
{
    private CatalogRepository $mobilRepo;
    public function __construct(CatalogRepository $mobilRepo)
    {
        $this->mobilRepo = $mobilRepo;
    }

    public function getAllData($inputSearch = null, $filterInput = null){
        $dataPaginate = $this->mobilRepo->getAllPaginate($inputSearch, $filterInput);
        $dataNew = $this->mobilRepo->getNewest();
        $dataAll = $this->mobilRepo->getAll();
        $dataAll->transform(function($item){
            if (is_string($item->fasilitas)) {
                $item->fasilitas = json_decode($item->fasilitas, true) ?? [];
            }
            return $item;
        });

        $dataPaginate->transform(function($item){
            if (is_string($item->fasilitas)) {
                $item->fasilitas = json_decode($item->fasilitas, true) ?? [];
            }
            return $item;
        });
        if(isset($dataPaginate)){
            return[
                'message'=>"data berhasil ditemukan",
                'status'=> true,
                'dataPaginate'=>$dataPaginate,
                'data'=>$dataAll ?? [],
                'dataNew'=>$dataNew
            ];
        }
        return[
            'message'=>"data gagal ditemukan",
            'status'=> false,
        ];
    }

    public function addCatalog($input){
        $cekCatalog = $this->mobilRepo->getByName($input['nama']);
        if(isset($cekCatalog)){
            $cekCatalog->jumlah += $input['jumlah'];
            $cekCatalog->save();
            return[
                'message' => "data sudah ada",
            ];
        }
        if(isset($input['gambar'])){
            $namaFile1 = 'gambar - ' . time() . $input['gambar']->getClientOriginalName();
            $path1 = $input['gambar']->storeAs('catalog/'. $input['nama'], $namaFile1, 'public');
        }else{
            return[
                'status' => false,
                'message' => "data gambar tidak tersedia"
            ];
        }

        $input['gambar'] = $path1;
        $this->mobilRepo->addCatalog($input);
        return[
            'message' => "data berhasil ditambahkan",
        ];
    }

    public function deleteCatalog($id){
        $data = $this->mobilRepo->getById($id);
        if(isset($data)){
            $filepath = $data->gambar ? storage_path('app/public/' . $data->gambar):null;
            if(file_exists($filepath)){
                unlink($filepath);
            }

            $folder = storage_path('app/public/catalog/' . $data->nama);
            if(is_dir($folder)){
                rmdir($folder);
            }

            $data->delete();
            return[
                'message'=>"data berhasil dihapus",
                'status'=>true
            ];
        }

        return[
            'message'=>"data tidak ditemukan",
            'status'=>false
        ];
    }

    public function editBlog($input, $id){
        $data = $this->mobilRepo->getById($id);
        if($data){
            if(isset($input['gambar'])){                
                $fullPath1 = $data->gambar ? storage_path('app/public/' . $data->gambar) : null;
                if($fullPath1 && file_exists($fullPath1)){
                    unlink($fullPath1);
                }
                $namaFile1 = 'gambar - ' . time() . $input['gambar']->getClientOriginalName();
                $path1 = $input['gambar']->storeAs('catalog/'. $input['nama'], $namaFile1, 'public');
            }
        }
        $data->nama = $input['nama'] ?? $data->nama;
        $data->harga = $input['harga'] ?? $data->harga;
        $data->seat = $input['seat'] ?? $data->seat;
        $data->jumlah = $input['jumlah'] ?? $data->jumlah;
        $data->type = $input['type'] ?? $data->type;
        $data->fasilitas = $input['fasilitas'] ?? $data->fasilitas;
        $data->gambar = $path1 ?? $data->gambar;
        $data->save();
        return[
            'message' => "data berhasil ditambahkan",
            'status'=>true
        ];

        return[
            'message' => "data tidak ditemukan",
            'status' => false,
            'data' => null
        ];
    }
}
