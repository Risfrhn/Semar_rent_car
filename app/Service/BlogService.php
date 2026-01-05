<?php

namespace App\Service;

use App\Repository\BlogRepository;
use Laravel\Pail\File;

class BlogService
{
    private BlogRepository $blogRepository;
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getAll(){
        $dataPaginate =  $this->blogRepository->getAllPaginate();
        $data =  $this->blogRepository->getAll();
        $dataNew = $this->blogRepository->getNewest();
        if($data->isEmpty()){
            return[
                'message'=>"tidak ada data blog",
                'status'=> false,
            ];
        }
        return[
                'message'=>"berhasil mendapatkan data",
                'status'=> true,
                'data'=>$data,
                'dataPaginate'=>$dataPaginate,
                'dataNew'=>$dataNew
            ];
    }

    public function detailById($id){
        $data = $this->blogRepository->getById($id);
        if(isset($data)){
            return[
                'message'=>"berhasil mendapatkan data",
                'status'=> true,
                'data'=>$data,
            ];
        }
        return[
            'message'=>"tidak ada data blog",
            'status'=> false,
        ];
    }

    public function addBlog($input){
        if(isset($input['gambar_utama'])){
            $namaFile1 = 'gambar_utama - ' . time() . $input['gambar_utama']->getClientOriginalName();
            $path1 = $input['gambar_utama']->storeAs('blog/'. $input['judul'], $namaFile1, 'public');
        }else{
            return[
                'status' => false,
                'message' => "data gambar tidak tersedia"
            ];
        }

        if(isset($input['gambar_pendukung'])){
            $namaFile2 = 'gambar_pendukung - ' . time() . $input['gambar_pendukung']->getClientOriginalName();
            $path2 = $input['gambar_pendukung']->storeAs('blog/'. $input['judul'], $namaFile2, 'public');
        }

        $input['gambar_utama'] = $path1;
        $input['gambar_pendukung'] = $path2 ?? null;
        $input['tanggal_publish'] = now();

        $this->blogRepository->add($input);

        return[
            'message' => "data blog berhasil ditambahkan",
        ];
    }

    public function deleteBlog($id){
        $data = $this->blogRepository->getById($id);
        if(isset($data)){
            $fullpath1 = $data->gambar_utama ? storage_path('app/public/'. $data->gambar_utama) : null;
            $fullpath2 = $data->gambar_pendukung ? storage_path('app/public/'. $data->gambar_pendukung) : null;
            if($fullpath1 && file_exists($fullpath1)){
                unlink($fullpath1);
            }
            if($fullpath2 && file_exists($fullpath2)){
                unlink($fullpath2);
            }

            $folder = storage_path('app/public/blog/'. $data->judul);
            if (is_dir($folder)) {
                rmdir($folder); 
            }

            $data->delete();
            return [
                'message'=>"data berhasil dihapus",
                'status' =>true
            ];
        }

        return [
            'message'=>"data tidak ditemukan",
            'status' =>false
        ];
    }

    public function editBlog($input, $id){
        $data = $this->blogRepository->getById($id);
        if($data){
            if(isset($input['gambar_pendukung'])){
                $fullPath1 = $data->gambar_pendukung ? storage_path('app/public/' . $data->gambar_pendukung) : null;
                if($fullPath1 && file_exists($fullPath1)){
                    unlink($fullPath1);
                }
                $namaFile = 'gambar_pendukung - ' . time() . $input['gambar_pendukung']->getClientOriginalName();
                $path2 = $input['gambar_pendukung']->storeAs('blog/'. $data->judul , $namaFile, 'public');
            }

            if(isset($input['gambar_utama'])){
                $fullPath2 = $data->gambar_utama ? storage_path('app/public/' . $data->gambar_utama) : null;
                if($fullPath2 && file_exists($fullPath2)){
                    unlink($fullPath2);
                }
                $namaFile = 'gambar_utama - ' . time() . $input['gambar_utama']->getClientOriginalName();
                $path1 = $input['gambar_utama']->storeAs('blog/'.$data->judul, $namaFile, 'public');
            }

            $data->judul = $input['judul'] ?? $data->judul;
            $data->subjudul1 = $input['subjudul1'] ?? $data->subjudul1;
            $data->subjudul2 = $input['subjudul2'] ?? $data->subjudul2;
            $data->subjudul3 = $input['subjudul3'] ?? $data->subjudul3;
            $data->deskripsi1 = $input['deskripsi1'] ?? $data->deskripsi1;
            $data->deskripsi2 = $input['deskripsi2'] ?? $data->deskripsi2;
            $data->deskripsi3 = $input['deskripsi3'] ?? $data->deskripsi3;
            $data->gambar_utama = $path1 ?? $data->gambar_utama;
            $data->gambar_pendukung = $path2 ?? $data->gambar_pendukung;
            
            $data->save();

            return[
                'message' => "data berhasil diubah",
                'status' => true,
                'data' => $data
            ];
        }

        return[
            'message' => "data tidak ditemukan",
            'status' => false,
            'data' => null
        ];
    }
}
