<?php

namespace App\Http\Controllers;

use App\Service\CatalogService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private CatalogService $mobilService;
    public function __construct(CatalogService $mobilService)
    {
        $this->mobilService = $mobilService;
    }

    public function catalogPageAdmin(Request $request){
        $keyword = $request->filled('q') ? $request->q : null;
        $filters = [
            'type'      => $request->filled('type') ? $request->type : null,
            'harga_min' => $request->filled('harga_min') ? $request->harga_min : null,
            'harga_max' => $request->filled('harga_max') ? $request->harga_max : null,
        ];

        $data = $this->mobilService->getAllData($keyword, $filters);
        return view('Admin.catalogAdminPage', [
            'message' => $data['message'],
            'status' => $data['status'],
            'dataPaginate' => $data['dataPaginate'] ?? null,
            'dataAll' => $data['data'] ?? null,
            'keyword'=>$keyword,
            'type' => $filters
        ]);
    }

    public function catalogPageUser(Request $request){
        $keyword = $request->filled('q') ? $request->q : null;
        $filters = [
            'type'      => $request->filled('type') ? $request->type : null,
            'harga_min' => $request->filled('harga_min') ? $request->harga_min : null,
            'harga_max' => $request->filled('harga_max') ? $request->harga_max : null,
        ];
        $dataCatalog = $this->mobilService->getAllData($keyword, $filters);
        return view('User.katalogPage', [
            'message' => $dataCatalog['message'],
            'status' => $dataCatalog['status'],
            'dataCatalog' => $dataCatalog['dataPaginate'] ?? null,
            'dataAll' => $data['data'] ?? null,
            'keyword'=>$keyword,
            'type' => $filters
        ]);
    }

    public function addCatalog(Request $request){
        $data = $request->validate([
            'nama' => ['nullable', 'string', 'max:255'],
            'harga' => ['nullable', 'numeric', 'min:0'],
            'jumlah' => ['nullable', 'numeric', 'min:0'],
            'seat' => ['nullable', 'integer', 'min:0'],
            'fasilitas' => ['nullable', 'json'],
            'type' => ['nullable', 'in:SUV,Keluarga,Hiace/Elf,Mewah'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = $this->mobilService->addCatalog($data);
        return redirect()->route('catalog-admin')->with([
            'message' => $data['message']
        ]);
    }

    public function deleteCatalog($id){
        $data = $this->mobilService->deleteCatalog($id);
        return redirect()->route('catalog-admin')->with([
            'message' => $data['message']
        ]);
    }

    public function editCatalog(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric',
            'seat' => 'nullable|integer',
            'jumlah' => 'nullable|integer',
            'type' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'gambar' => 'nullable|file|image|max:2048',
        ]);
        $result = $this->mobilService->editBlog($validated, $id);

        return redirect()->route('catalog-admin')->with([
            'message' => $result['message'],
            'status' =>$result['status']
        ]);
    }
}
