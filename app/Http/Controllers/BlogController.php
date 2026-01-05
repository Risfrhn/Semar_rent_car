<?php

namespace App\Http\Controllers;

use App\Service\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function addBlog(Request $request){
        $data = $request->validate([
            'judul' => 'required|string|max:255',

            'gambar_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_pendukung' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'subjudul1' => 'nullable|string|max:255',
            'deskripsi1' => 'nullable|string',

            'subjudul2' => 'nullable|string|max:255',
            'deskripsi2' => 'nullable|string',

            'subjudul3' => 'nullable|string|max:255',
            'deskripsi3' => 'nullable|string',
        ]);

        $data = $this->blogService->addBlog($data);
        return redirect()->route('blog-admin')->with([
            'message' => $data['message']
        ]);
    }

    public function blogPageAdmin(){
        $data = $this->blogService->getAll();
        return view('Admin.blogAdminPage', [
            'status'=> $data['status'],
            'message' => $data['message'],
            'data' => $data['data'] ?? null,
            'dataPaginate' => $data['dataPaginate']?? null
        ]);
    }

    public function blogPageUser(){
        $data = $this->blogService->getAll();
        return view('User.blogPage', [
            'status'=> $data['status'],
            'message' => $data['message'],
            'data' => $data['data'] ?? null,
            'dataPaginate' => $data['dataPaginate']?? null
        ]);
    }

    public function detailByIdAdmin($id){
        $data = $this->blogService->detailById($id);
        $allData = $this->blogService->getAll();
        return view('Admin.detailBlogPageAdmin', [
            'status'=> $data['status'],
            'message' => $data['message'],
            'data' => $data['data'] ?? null,
            'allData'=> $allData['data'] ?? null
        ]);
    }

    public function detailByIdUser($id){
        $data = $this->blogService->detailById($id);
        $allData = $this->blogService->getAll();
        return view('detailBlogPage', [
            'status'=> $data['status'],
            'message' => $data['message'],
            'data' => $data['data'] ?? null,
            'allData'=> $allData['data'] ?? null
        ]);
    }

    public function deleteBlog($id){
        $data = $this->blogService->deleteBlog($id);
        return redirect()->route('blog-admin')->with([
            'status'=> $data['status'],
            'message' => $data['message'],
        ]);
    }

    public function editBlog(Request $request, $id){
        $data = $request->validate([
            'judul' => 'required|string|max:255',

            'gambar_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_pendukung' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'subjudul1' => 'nullable|string|max:255',
            'deskripsi1' => 'nullable|string',

            'subjudul2' => 'nullable|string|max:255',
            'deskripsi2' => 'nullable|string',

            'subjudul3' => 'nullable|string|max:255',
            'deskripsi3' => 'nullable|string',
        ]);

        $result = $this->blogService->editBlog($data, $id);
        return redirect()->route('blog-admin-detail', ['id'=>$id] )->with([
            'status'=> $result['status'],
            'message' => $result['message'],
        ]);
    }
}
