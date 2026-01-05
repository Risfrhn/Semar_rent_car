@include('header')

<div class="container mx-auto mt-10">
    <h3 class="text-yellow-400 font-bold text-4xl mb-0">DATA PROMO</h3>
    <div class="autoScroll snap-scroll flex gap-4 overflow-x-auto snap-x snap-mandatory py-6 mx-md-0 mx-4"> 
        @if($status == true)
            @foreach($data as $datas)
                <div class="snap-item group bg-gray-900 relative flex-shrink-0 w-72 sm:w-80 md:w-64 lg:w-72 h-100 rounded-lg overflow-hidden cursor-pointer shadow-lg transition-transform duration-300 hover:scale-105 snap-start">
                    <div class="absolute bg-yellow-400 text-black text-xs md:text-sm font-bold px-2 py-1 rounded z-10">
                        {{ \Carbon\Carbon::parse($datas->berlaku_hingga)->locale('id')->isoFormat('D MMMM YYYY') }}
                    </div>
                    <div class="relative">
                        <img src="{{ asset('storage/' . $datas->flyer) }}" alt="Promo Innova" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="text-white font-bold text-xl">{{ $datas->nama }}</h3>
                        <p class="text-white/70 text-sm">{{ $datas->deskripsi }}</p>
                        <button onclick="openModal('detailPromo{{$datas->id}}')" class="w-full mt-3 py-2 rounded-full font-semibold border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black transition-all duration-300 text-sm md:text-base">
                            Details
                        </button>
                    </div>
                </div>

                <div id="detailPromo{{$datas->id}}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-gray-800 rounded-xl w-full max-w-lg max-h-[90vh] p-6 relative overflow-y-auto">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-yellow-400 font-bold text-xl">Edit Promo</h3>
                            <button onclick="closeModal('detailPromo{{$datas->id}}')" class="text-white text-2xl font-bold">&times;</button>
                        </div>

                        <div class="whitespace-pre-line text-sm text-gray-300">
                            {!! nl2br(e($datas->syarat)) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="container mx-auto">
    <div class="bg-gray-800 rounded-xl shadow-lg p-4 overflow-x-auto">
        <div class="flex justify-between items-center mb-4">
            <button onclick="openModal('promoModal')" class="px-4 py-2 bg-yellow-500 text-black font-semibold rounded hover:bg-yellow-400 transition">
                Add Promo
            </button>
        </div>
        <table class="min-w-full table-fixed bg-gray-900 rounded-xl overflow-hidden">
            <thead class="bg-gray-700 text-gray-200 text-sm uppercase">
                <tr>
                    <th class="px-4 py-2 w-12 text-left">ID</th>
                    <th class="px-4 py-2 w-64 text-left">Nama Promo</th>
                    <th class="px-4 py-2 w-32 text-left">Berlaku Hingga</th>
                    <th class="px-4 py-2 w-40 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300 divide-y divide-gray-700">
                @if($status == true)
                    @foreach($data as $datas)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 truncate">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 truncate max-w-[16rem]">{{$datas->nama}}</td>
                            <td class="px-4 py-2 truncate">{{ \Carbon\Carbon::parse($datas->berlaku_hingga)->locale('id')->isoFormat('D MMMM YYYY') }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <button onclick="openModal('editModal{{$datas->id}}')" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-400">Edit</button>
                                <form action="{{ route('promo-admin-delete', $datas->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal dengan ID unik per data -->
                        <div id="editModal{{$datas->id}}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                            <div class="bg-gray-800 rounded-xl w-full max-w-lg max-h-[90vh] p-6 relative overflow-y-auto">
                                <!-- Header -->
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-yellow-400 font-bold text-xl">Edit Promo</h3>
                                    <button onclick="closeModal('editModal{{$datas->id}}')" class="text-white text-2xl font-bold">&times;</button>
                                </div>

                                <!-- Form -->
                                <form action="{{ route('promo-admin-edit', $datas->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <!-- Nama Promo -->
                                    <div>
                                        <label class="block text-white font-semibold mb-1">Nama Promo</label>
                                        <input type="text" value="{{$datas->nama}}" name="nama" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    </div>

                                    <!-- Berlaku Hingga -->
                                    <div>
                                        <label class="block text-white font-semibold mb-1">Berlaku Hingga</label>
                                        <input type="date" value="{{$datas->berlaku_hingga}}" name="berlaku_hingga" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    </div>

                                    <!-- Flyer Image -->
                                    <div>
                                        <label class="block text-white font-semibold my-3">Flyer Promo</label>
                                        
                                        @if($datas->flyer)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $datas->flyer) }}" alt="Current Flyer" class="w-32 h-32 object-cover rounded-lg border-2 border-yellow-400">
                                                <p class="text-gray-400 text-sm mt-1">Gambar saat ini</p>
                                            </div>
                                        @endif
                                        
                                        <input type="file" name="flyer" class="w-full text-white bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                        <p class="text-gray-400 text-xs mt-1">Kosongkan jika tidak ingin mengubah gambar</p>
                                    </div>

                                    <!-- Syarat & Ketentuan -->
                                    <div>
                                        <label class="block text-white font-semibold mb-1">Syarat & Ketentuan</label>
                                        <textarea name="syarat" rows="2" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">{{$datas->syarat}}</textarea>
                                    </div>

                                    <!-- Deskripsi Promo -->
                                    <div>
                                        <label class="block text-white font-semibold mb-1">Deskripsi Promo</label>
                                        <textarea name="deskripsi" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">{{$datas->deskripsi}}</textarea>
                                    </div>

                                    <!-- Button Submit -->
                                    <div class="flex justify-end gap-2 my-3">
                                        <button type="button" onclick="closeModal('editModal{{$datas->id}}')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500 transition">Batal</button>
                                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400 transition">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                   <tr class="hover:bg-gray-700">
                        <td colspan="4" class="px-4 py-2 text-center">Data Kosong</td>
                    </tr> 
                @endif
            </tbody>
        </table>
    </div>
    
    @if($status == true)
        <div class="flex justify-center gap-2 w-full my-10">
            <a href="{{ $data->previousPageUrl() }}" 
            class="px-4 py-2 rounded-full bg-gray-700 text-white text-sm {{ !$data->onFirstPage() ? '' : 'opacity-40 cursor-not-allowed' }}">
                Prev
            </a>

            <a href="{{ $data->nextPageUrl() }}" 
            class="px-4 py-2 rounded-full bg-yellow-500 text-black text-sm font-semibold {{ $data->hasMorePages() ? '' : 'opacity-40 cursor-not-allowed' }}">
                Next
            </a>
        </div>
    @endif    
</div>

<div id="promoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-800 rounded-xl w-full max-w-lg p-6 relative">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-yellow-400 font-bold text-xl">Tambah Promo</h3>
            <button onclick="closeModal('promoModal')" class="text-white text-2xl font-bold">&times;</button>
        </div>

        <!-- Form -->
        <form action="{{route('promo-admin-add')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Nama Promo -->
             @csrf
            <div>
                <label for="namaPromo" class="block text-white font-semibold mb-1">Nama Promo</label>
                <input required type="text" id="namaPromo" name="nama" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan nama promo">
            </div>

            <!-- Berlaku Hingga -->
            <div>
                <label for="berlakuHingga" class="block text-white font-semibold mb-1">Berlaku Hingga</label>
                <input required type="date" id="berlakuHingga" name="berlaku_hingga" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Flyer Image -->
            <div>
                <label for="flyer" class="block text-white font-semibold mb-1">Flyer Promo</label>
                <input required type="file" id="flyer" name="flyer" class="w-full text-white bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Syarat & Ketentuan -->
            <div>
                <label for="syarat" class="block text-white font-semibold mb-1">Syarat & Ketentuan</label>
                <textarea required id="syarat" name="syarat" rows="2" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Tuliskan syarat dan ketentuan..."></textarea>
            </div>

            <!-- Deskripsi Promo -->
            <div>
                <label for="deskripsi" class="block text-white font-semibold mb-1">Deskripsi Promo</label>
                <textarea required id="deskripsi" name="deskripsi" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Deskripsi promo..."></textarea>
            </div>

            <!-- Button Submit -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('promoModal')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500 transition">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

@if(session('message'))
    <div id="alertMessage" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        {{ session('message') }}
    </div>
    <script>
        setTimeout(() => {
            const alertBox = document.getElementById('alertMessage');
            if(alertBox) alertBox.remove();
        }, 4000);
    </script>
@endif


<script>
    function openModal(id){
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id){
        document.getElementById(id).classList.add('hidden');
    }
</script>



@include('Admin.buttonFloatingAdmin')