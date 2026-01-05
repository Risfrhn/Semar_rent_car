<?php

namespace App\Service;

use App\Repository\PromoRepository;

class PromoService
{
    private PromoRepository $promoRepository;
    public function __construct(PromoRepository $promoRepository)
    {
        $this->promoRepository = $promoRepository;
    }

    public function getAll(){
        $data = $this->promoRepository->getAll();
        $dataNew = $this->promoRepository->getNewest();
        if($data->isEmpty()){
            return[
                'status' => false,
                'message' => "Tidak ada data yang tersedia"
            ];
        }else{
            return[
                'status' => true,
                'message' => "Data tersedia",
                'data'=> $data,
                'dataNew'=>$dataNew
            ];
        }
    }

    public function addPromo($input){
        if(isset($input['flyer'])){
            $namaFile = 'flyer - ' . time() . $input['flyer']->getClientOriginalName();
            $path = $input['flyer']->storeAs('promo', $namaFile, 'public');
        }else{
            return[
                'status' => false,
                'message' => "data gambar tidak tersedia"
            ];
        }
        $input['flyer'] = $path;
        $this->promoRepository->add($input);
        return [
            'status' => true,
            'message' => "berhasil menambahkan promo"
        ];
    }

    public function deletePromo($input){
        $data = $this->promoRepository->getById($input);
        if(isset($data)){
            $fullPath = storage_path('app/public/' . $data->flyer);
            if(file_exists($fullPath)){
                unlink($fullPath);
            }
            $data->delete();
            return[
                'status' => true,
                'message' => "berhasil menghapus data"
            ];
        }
        return[
            'status' => false,
            'message' => "data tidak ditemukan"
        ];
    }


    public function editPromo($input, $id){
        $data = $this->promoRepository->getById($id);
        if(isset($data)){
            if(isset($input['flyer'])){
                $fullPath = storage_path('app/public/' . $data->flyer);
                if(file_exists($fullPath)){
                    unlink($fullPath);
                }
                $namaFile = 'flyer - ' . time() . $input['flyer']->getClientOriginalName();
                $path = $input['flyer']->storeAs('promo', $namaFile, 'public');
            }
            $data->nama = $input['nama'] ?? $data->nama;
            $data->deskripsi = $input['deskripsi'] ?? $data->deskripsi;
            $data->berlaku_hingga = $input['berlaku_hingga'] ?? $data->berlaku_hingga;
            $data->flyer = $path ?? $data->flyer;
            $data->syarat = $input['syarat'] ?? $data->syarat;
            $data->save();
            return[
                'status' => true,
                'message' => "data berhasil diubah"
            ];
        }
        return[
            'status' => false,
            'message' => "data tidak ditemukan"
        ];
    }
}
