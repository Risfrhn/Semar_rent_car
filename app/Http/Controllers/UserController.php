<?php

namespace App\Http\Controllers;

use App\Service\BlogService;
use App\Service\CatalogService;
use App\Service\PromoService;
use Illuminate\Http\Request;
use App\Service\UserService;

class UserController extends Controller
{
    private UserService $service;
    private CatalogService $catalogService;
    private BlogService $blogService;
    private PromoService $promoService;
    
    public function __construct(UserService $service, CatalogService $catalogService, BlogService $blogService, PromoService $promoService)
    {
        $this->service = $service;
        $this->catalogService = $catalogService;
        $this->blogService = $blogService;
        $this->promoService = $promoService;
    }

    public function loginPage(){
        return view('loginPage');
    }

    public function landingPage(){
        $dataCatalog = $this->catalogService->getAllData();
        $reviews = [
            [
                'author_name' => 'Nasa Brahma Tantra',
                'rating' => 5,
                'text' => 'Mobilnya bagus-bagus dengan harga terbaik. Pelayanannya juga baikk. Recommended sekali buat tempat sewa mobil.
                            Pasti bakal balik lagi ke sini kalau perlu sewa mobil di semarang.',
                'time' => '2025-12-23'
            ],
            [
                'author_name' => 'Dewi Sulistio',
                'rating' => 5,
                'text' => 'Sewa mobil New brio lepas kunci di Semarang, sangat bersih dan mobilnya baru sekaliii.. Bisa diantar dan dijemput mobilnya dan sangat memuaskan pelayanannya mudah dan admin sangat respon. Kali kedua sewa disini dan nda pernah kecewa. Recommeded :)',
                'time' => '2025-05-03'
            ],
            [
                'author_name' => 'Forma Bee',
                'rating' => 5,
                'text' => 'Pelayanan sangat baik dan fast respon. Bisa lepas kunci dan mobil bisa diantar dan dijemput juga ke hotel. Kondisi mobil jg prima. Terima kasih Semar Rent Car atas Innova nya untuk liburan kami sekeluarga. Semoga sukses selalu..',
                'time' => '2025-01-10'
            ],
            [
                'author_name' => 'Sin Bin',
                'rating' => 5,
                'text' => 'Recommended bgt, sopirnya pak Radiman sangat sopan dan ramah, nyetirnya enak banget dan sangat hati2. Mobilnya sangat bersih, servisnya memuaskan sekali, admin jg juga sangat fast respon.',
                'time' => '2024-05-17'
            ],
            [
                'author_name' => 'Marini Utami',
                'rating' => 5,
                'text' => 'Pelayanan sangat ramah, mobilnya juga enak banget buat dipakai jarak jauh dan masih pada baru. Pokoknya rekomendasi kalau rental disini😍 …',
                'time' => '2023-08-25'
            ],
            [
                'author_name' => 'Gunilawati Ninin',
                'rating' => 5,
                'text' => 'Terima kasih Semar rent car atas pelayan yg diberikan kepada kami utk driver Dani terima kasih banyak telah mau melayani para ibu-ibu rempong yg banyak mau serasa dilayani oleh adik sendiri pengalaman yg sangat baik untuk rental mobil semoga Semar rent car semangkin maju lagi',
                'time' => '2024-12-25'
            ],
        ];
        return view('User.landingPageUser', [
            'dataCatalog'=>$dataCatalog['data'],
            'reviews'=>$reviews
        ]);
    }

    public function dashboardAdmin(){
        $dataCatalog = $this->catalogService->getAllData();
        $dataBlog    = $this->blogService->getAll();
        $dataPromo   = $this->promoService->getAll();

        return view('Admin.adminDashboard', [
            'countCatalog' => count($dataCatalog['data'] ?? []),
            'dataBlog'     => count($dataBlog['data'] ?? []),
            'dataPromo'    => count($dataPromo['data'] ?? []),
            'catalogNew'   => $dataCatalog['dataNew'] ?? [],
            'blogNew'      => $dataBlog['dataNew'] ?? [],
            'promoNew'     => $dataPromo['dataNew'] ?? [],
        ]);
    }


    
    public function login(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:6'
        ]);

        $result = $this->service->loginSystem($data);
        if($result['status'] == true){
            return redirect()->route('dashboard-admin');
        }else{
            return back()->withErrors([
                'message' => $result['message'],
            ]);
        }
    }

    public function logOut(){
        $this->service->logOut();
        return redirect()->route('login');
    }
}
