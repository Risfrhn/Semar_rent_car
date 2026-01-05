<?php

namespace App\Http\Controllers;


use App\Service\PromoService;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    private PromoService $promoService;
    public function __construct(PromoService $promoService)
    {
        $this->promoService = $promoService;
    }

    public function promoPageAdmin(){
        $data = $this->promoService->getAll();
        return view('Admin.promoAdminPage', [
            'status'=> $data['status'],
            'message' => $data['message'],
            'data' => $data['data'] ?? null,
        ]);
    }

    public function promoPageUser(){
        $data = $this->promoService->getAll();
        return view('promoPage', [
            'status'=> $data['status'],
            'message' => $data['message'],
            'data' => $data['data'] ?? null
        ]);
    }

    public function addPromo(Request $request){
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'flyer' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'berlaku_hingga' => 'required|date|after_or_equal:today',
            'syarat' => 'nullable|string',
        ]);

        $result = $this->promoService->addPromo($data);
        return redirect()->route('promo-admin')->with([
            'message' => $result['message']
        ]);
    }

    public function deletePromo($id){
        $data = $this->promoService->deletePromo($id);
        return redirect()->route('promo-admin')->with([
            'message' => $data['message']
        ]);
    }

    public function editPromo(Request $request, $id){
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'flyer' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'berlaku_hingga' => 'required|date|after_or_equal:today',
            'syarat' => 'nullable|string',
        ]);
        $result = $this->promoService->editPromo($data, $id);
        return redirect()->route('promo-admin')->with([
            'message' => $result['message']
        ]);
    }   
}
