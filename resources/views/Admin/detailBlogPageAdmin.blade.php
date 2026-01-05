@include('header')

<div class="container mx-auto px-4 md:px-0 my-20">
    <!-- Breadcrumb -->
    <nav class="text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex text-white/50">
            <li><a href="{{ route('blog-admin') }}" class="hover:text-yellow-400 transition">Blog</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-white">{{ $data->judul }}</li>
        </ol>
    </nav>
    <!-- Judul Blog -->
    <div class="mb-6 text-center">
        <span class="bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded">Blogs</span>
        <h1 class="text-white font-bold text-3xl md:text-4xl mt-3">{{$data->judul}}</h1>
        <p class="text-white/70 mt-2 text-sm md:text-base">Dipublikasikan pada {{ \Carbon\Carbon::parse($data->tanggal_publish)->locale('id')->isoFormat('D MMMM YYYY') }}</p>
    </div>

    <!-- Gambar Header -->
    <div class="mb-8">
        <img src="{{asset('storage/' . $data->gambar_utama)}}" alt="Tips Berkendara" class="w-full h-auto rounded-xl object-cover shadow-lg">
    </div>

    <!-- Konten Blog -->
    <div class="max-w-4xl mx-auto my-10 text-white space-y-6">
        <h2 class="text-2xl font-bold">{{$data->subjudul1}}</h2>
        <p>{{$data->deskripsi1}}</p>
    </div>

    @if($data->gambar_pendukung)
        <div class="mb-8">
            <img src="{{asset('storage/' . $data->gambar_pendukung)}}" class="w-full h-auto rounded-xl object-cover shadow-lg">
        </div>
    @endif
    

    <div class="max-w-4xl mx-auto my-10 text-white space-y-6">
        @if($data->subjudul2)
            <h2 class="text-2xl font-bold">{{$data->subjudul2}}</h2>
        @endif
        @if($data->deskripsi2)
            <p>{{$data->deskripsi2}}</p>
        @endif
    </div>

    
    <div class="max-w-4xl mx-auto my-10 text-white space-y-6">
        @if($data->subjudul3)
            <h2 class="text-2xl font-bold">{{$data->subjudul3}}</h2>
        @endif
        @if($data->deskripsi3)
            <p>{{$data->deskripsi3}}</p>
        @endif
    </div>
</div>

<button onclick="openModal('blogModal')" class="fixed bottom-6 right-24 w-16 h-16 z-[9999] rounded-full bg-yellow-500 flex items-center justify-center text-black shadow-lg focus:outline-none">
    <i class="bi bi-pencil text-2xl"></i>
</button>

<div class="container mx-auto px-4 md:px-0 my-10">
    <h3 class="text-yellow-400 font-bold text-2xl">Blog Lainnya</h3>
    <div class="snap-scroll flex overflow-x-auto gap-4 snap-x snap-mandatory py-6">
        @foreach($allData as $data)
            <a href="{{route('blog-admin-detail', $data->id)}}" class="flex-shrink-0 w-64 bg-gray-800 rounded-xl overflow-hidden shadow-lg group hover:scale-105 transition-transform duration-300 cursor-pointer">
                <img src="{{asset('storage/'. $data->gambar_utama)}}" alt="Promo Mobil" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="text-white font-bold text-sm md:text-base">{{$data->judul}}</h4>
                    <p class="text-white/50 text-xs mt-1">{{ \Carbon\Carbon::parse($data->tanggal_publish)->locale('id')->isoFormat('D MMMM YYYY') }}</p>
                </div>
            </a>
        @endforeach
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

<div id="blogModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-800 rounded-xl w-full max-w-2xl p-6 relative overflow-y-auto max-h-[90vh]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-yellow-400 font-bold text-xl">Tambah Blog</h3>
            <button onclick="closeModal('blogModal')" class="text-white text-2xl font-bold">&times;</button>
        </div>

        <!-- Form -->
        <form action="{{route('blog-admin-detail-edit', $data->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Judul Blog -->
             @csrf
             @method('PATCH')
            <div>
                <label for="judul" class="block text-white font-semibold mb-1">Judul Blog</label>
                <input type="text" value="{{$data->judul}}" id="judul" name="judul" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul blog">
            </div>

            <!-- Gambar Utama -->
            @if($data->gambar_utama)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $data->gambar_utama) }}" alt="Current Flyer" class="w-32 h-32 object-cover rounded-lg border-2 border-yellow-400">
                    <p class="text-gray-400 text-sm mt-1">Gambar saat ini</p>
                </div>
            @endif
            <div>
                <label for="gambarUtama" class="block text-white font-semibold mb-1">Gambar Utama</label>
                <input type="file" id="gambarUtama" name="gambar_utama" class="w-full text-white bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Gambar Pendukung -->
             @if($data->gambar_pendukung)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $data->gambar_pendukung) }}" alt="Current Flyer" class="w-32 h-32 object-cover rounded-lg border-2 border-yellow-400">
                    <p class="text-gray-400 text-sm mt-1">Gambar saat ini</p>
                </div>
            @endif
            <div>
                <label for="gambarPendukung" class="block text-white font-semibold mb-1">Gambar Pendukung</label>
                <input type="file" id="gambarPendukung" name="gambar_pendukung" class="w-full text-white bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Subjudul dan Deskripsi -->
            <div class="space-y-3">
                <div>
                    <label class="block text-white font-semibold mb-1">Subjudul 1</label>
                    <input type="text" value="{{$data->subjudul1}}"  name="subjudul1" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <label class="block text-white font-semibold mt-1 mb-1">Deskripsi 1</label>
                    <textarea name="deskripsi1" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">{{$data->deskripsi1}}</textarea>
                </div>

                <div>
                    <label class="block text-white font-semibold mb-1">Subjudul 2</label>
                    <input type="text" value="{{$data->subjudul2}}" name="subjudul2" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <label class="block text-white font-semibold mt-1 mb-1">Deskripsi 2</label>
                    <textarea name="deskripsi2" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">{{$data->deskripsi2}}</textarea>
                </div>

                <div>
                    <label class="block text-white font-semibold mb-1">Subjudul 3</label>
                    <input type="text" value="{{$data->subjudul3}}" name="subjudul3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <label class="block text-white font-semibold mt-1 mb-1">Deskripsi 3</label>
                    <textarea name="deskripsi3" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">{{$data->deskripsi3}}</textarea>
                </div>
            </div>

            <!-- Button Submit -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('blogModal')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500 transition">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id){
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id){
        document.getElementById(id).classList.add('hidden');
    }
</script>



@include('Admin.buttonFloatingAdmin')