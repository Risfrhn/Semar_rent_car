@include('header')

<div class="container mx-auto px-4 md:px-0 mt-10">
    <h3 class="text-yellow-400 font-bold text-4xl">DATA BLOG</h3>
    @if($status == true)
        <div class="snap-scroll flex overflow-x-auto gap-4 snap-x snap-mandatory py-6">
            @foreach($data as $datas)
                <a href="{{route('blog-admin-detail', $datas->id)}}" class="flex-shrink-0 w-64 bg-gray-800 rounded-xl overflow-hidden shadow-lg group hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <img src="{{asset('storage/'. $datas->gambar_utama)}}" alt="Promo Mobil" class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h4 class="text-white font-bold text-sm md:text-base">{{$datas->judul}}</h4>
                        <p class="text-white/50 text-xs mt-1">{{ \Carbon\Carbon::parse($datas->tanggal_publish)->locale('id')->isoFormat('D MMMM YYYY') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>

<div class="container mx-auto px-4 md:px-0 space-y-12 pt-3">
    <div class="bg-gray-800 rounded-xl shadow-lg p-4 overflow-x-auto">
        <div class="flex justify-between items-center mb-4">
            <button onclick="openModal('blogModal')" class="px-4 py-2 bg-yellow-500 text-black font-semibold rounded hover:bg-yellow-400 transition">
                Tambah blog
            </button>
        </div>
        <table class="min-w-full table-fixed bg-gray-900 rounded-xl overflow-hidden">
            <thead class="bg-gray-700 text-gray-200 text-sm uppercase">
                <tr>
                    <th class="px-4 py-2 w-12 text-left">ID</th>
                    <th class="px-4 py-2 w-64 text-left">Judul blog</th>
                    <th class="px-4 py-2 w-32 text-left">Tanggal publish</th>
                    <th class="px-4 py-2 w-40 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300 divide-y divide-gray-700">
                @if($status == true)
                    @foreach($dataPaginate as $datas)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 truncate">1</td>
                            <td class="px-4 py-2 truncate max-w-[16rem]" title="Gratis Antar Jemput Bandara">
                                {{ $datas->judul }}
                            </td>
                            <td class="px-4 py-2 truncate">{{ $datas->tanggal_publish }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{route('blog-admin-detail', $datas->id)}}" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-400">Show</a>
                                <form action="{{route('blog-admin-delete', $datas->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>
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
        <div class="flex justify-center gap-2 w-full">
            <a href="{{ $dataPaginate->previousPageUrl() }}" 
            class="px-4 py-2 rounded-full bg-gray-700 text-white text-sm {{ !$dataPaginate->onFirstPage() ? '' : 'opacity-40 cursor-not-allowed' }}">
                Prev
            </a>

            <a href="{{ $dataPaginate->nextPageUrl() }}" 
            class="px-4 py-2 rounded-full bg-yellow-500 text-black text-sm font-semibold {{ $dataPaginate->hasMorePages() ? '' : 'opacity-40 cursor-not-allowed' }}">
                Next
            </a>
        </div>
    @endif
</div>



<div id="blogModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-800 rounded-xl w-full max-w-2xl p-6 relative overflow-y-auto max-h-[90vh]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-yellow-400 font-bold text-xl">Tambah Blog</h3>
            <button onclick="closeModal('blogModal')" class="text-white text-2xl font-bold">&times;</button>
        </div>

        <!-- Form -->
        <form action="{{route('blog-admin-add')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Judul Blog -->
             @csrf
            <div>
                <label for="judul" class="block text-white font-semibold mb-1">Judul Blog</label>
                <input required type="text" id="judul" name="judul" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul blog">
            </div>

            <!-- Gambar Utama -->
            <div>
                <label for="gambarUtama" class="block text-white font-semibold mb-1">Gambar Utama</label>
                <input required type="file" id="gambarUtama" name="gambar_utama" class="w-full text-white bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Gambar Pendukung -->
            <div>
                <label for="gambarPendukung" class="block text-white font-semibold mb-1">Gambar Pendukung</label>
                <input type="file" id="gambarPendukung" name="gambar_pendukung" class="w-full text-white bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Subjudul dan Deskripsi -->
            <div class="space-y-3">
                <div>
                    <label class="block text-white font-semibold mb-1">Subjudul 1</label>
                    <input type="text" name="subjudul1" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <label class="block text-white font-semibold mt-1 mb-1">Deskripsi 1</label>
                    <textarea name="deskripsi1" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
                </div>

                <div>
                    <label class="block text-white font-semibold mb-1">Subjudul 2</label>
                    <input type="text" name="subjudul2" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <label class="block text-white font-semibold mt-1 mb-1">Deskripsi 2</label>
                    <textarea name="deskripsi2" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
                </div>

                <div>
                    <label class="block text-white font-semibold mb-1">Subjudul 3</label>
                    <input type="text" name="subjudul3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <label class="block text-white font-semibold mt-1 mb-1">Deskripsi 3</label>
                    <textarea name="deskripsi3" rows="3" class="w-full rounded-lg px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
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
