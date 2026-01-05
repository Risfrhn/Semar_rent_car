@include('header')

<div class="container mx-auto px-3 md:px-5 mt-5">
    <h3 class="text-yellow-400 font-bold text-4xl">DATA CATALOG</h3>
    @if($status == true)
        <div class="autoScroll snap-scroll overflow-x-auto flex gap-4 snap-x snap-mandatory px-4 py-6">
            @foreach($dataAll as $data)
                <div class="snap-item flex-shrink-0 w-full sm:w-full md:w-1/2 lg:w-1/4 bg-gradient-to-b from-gray-700 to-gray-900 rounded-lg p-4" x-data="{ showMore: false }">
                    <div class="text-center p-2">
                        <img src="{{ asset('storage/' . $data->gambar) }}" class="w-full h-40 md:h-44 object-contain" alt="">
                    </div>
                    <p class="text-yellow-400 font-bold mb-1 text-lg md:text-xl leading-tight">{{$data->nama}}</p>
                    <p class="text-white text-sm mb-0">Mulai dari</p>
                    <p class="text-yellow-400 font-bold mb-2 text-xl md:text-2xl leading-tight"> 
                    @if($data->harga == 0)
                        By Phone
                    @else
                        {{ $data->harga }}K/hari
                    @endif</p>
                    
                    <div x-show="showMore" x-transition class="my-3 text-white text-sm space-y-2">
                        @foreach($data->fasilitas as $item)
                            <p>{{$item}}</p>
                            <hr>
                        @endforeach
                    </div>

                    <button @click="showMore = !showMore" class="w-full mt-3 py-2 rounded-full font-semibold border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black transition-all duration-300 text-sm md:text-base">
                        <span x-text="showMore ? 'Show less' : 'Show more'"></span>
                    </button>
                    <button class="w-full mt-3 py-2 rounded-full font-semibold border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black transition-all duration-300 text-sm md:text-base">
                        Pesan sekarang
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>

<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <button onclick="openModal('catalogAddModal')" class="px-4 py-2 bg-yellow-500 text-black font-semibold rounded">Tambah Mobil</button>
    </div>
    <section aria-label="Search dan Filter Mobil" class="mb-6">
        <h2 class="sr-only">Cari dan Filter Armada</h2>
        <form method="GET" action="{{ route('catalog-admin') }}">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
                <!-- Search -->
                <div class="flex flex-1 gap-2">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari mobil..."
                        class="flex-1 px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button class="px-4 py-2 bg-yellow-500 text-black font-semibold rounded hover:bg-yellow-400 transition">
                        Search
                    </button>
                </div>

                <!-- Filter -->
                <div class="flex flex-wrap md:flex-nowrap gap-2 mt-2 md:mt-0">
                    <select name="type" class="px-4 py-2 w-full rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Filter Tipe</option>
                        <option value="Keluarga" {{ request('type') == 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                        <option value="SUV" {{ request('type') == 'SUV' ? 'selected' : '' }}>SUV</option>
                        <option value="Hiace/Elf" {{ request('type') == 'Hiace/Elf' ? 'selected' : '' }}>Hiace/Elf</option>
                        <option value="Mewah" {{ request('type') == 'Mewah' ? 'selected' : '' }}>Mewah</option>
                    </select>
                    <input type="number" name="harga_min" placeholder="Harga min" value="{{ request('harga_min') }}"
                        class="px-4 py-2 w-full rounded-lg bg-gray-700 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 w-32">
                    <input type="number" name="harga_max" placeholder="Harga max" value="{{ request('harga_max') }}"
                        class="px-4 py-2 w-full rounded-lg bg-gray-700 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 w-32">
                    <button class="px-4 py-2 w-full bg-yellow-500 text-black font-semibold rounded hover:bg-yellow-400 transition">
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </section>

    <table class="w-full text-left text-white text-sm bg-gray-800 rounded-lg overflow-hidden">
        <thead class="bg-gray-700 text-gray-200">
            <tr>
                <th class="px-6 py-3">Nama Mobil</th>
                <th class="px-6 py-3">Jumlah</th>
                <th class="px-6 py-3">Tipe</th>
                <th class="px-6 py-3">Harga / Hari</th>
                <th class="px-6 py-3">Kapasitas</th>
                <th class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
           @forelse($dataPaginate as $data)
                <tr class="bg-gray-800 hover:bg-gray-700">
                    <td class="px-6 py-4 truncate max-w-[150px]">{{$data->nama}}</td>
                    <td class="px-6 py-4">{{$data->jumlah}}</td>
                    <td class="px-6 py-4">{{$data->type}}</td>
                    <td class="px-6 py-4">{{$data->harga}}</td>
                    <td class="px-6 py-4">{{$data->seat}} Seat</td>
                    <td class="px-6 py-4 flex gap-2">
                        <button onclick="openEditModal('{{$data->id}}')" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-400">Edit</button>
                        <form action="{{ route('catalog-admin-delete', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-400">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="editModal fixed inset-0 z-50 bg-black/70 overflow-y-auto hidden" data-id="{{$data->id}}" data-fasilitas='@json($data->fasilitas)'>
                    <div class="flex justify-center px-4 py-8">
                        <div class="bg-[#0B0B0B] rounded-xl w-full max-w-lg p-6 text-white relative max-h-[90vh] overflow-y-auto">
                            <button onclick="closeModal(this.closest('.editModal'))" class="absolute top-4 right-4 text-white/60 hover:text-white text-xl">✕</button>
                            <h2 class="text-yellow-400 text-xl font-bold mb-4">Edit Mobil</h2>
                            <form method="POST" action="{{ route('catalog-admin-edit', $data->id) }}" enctype="multipart/form-data" onsubmit="arrayEdit(this)">
                                @csrf
                                @method('PATCH')
                                
                                <div class="mb-3">
                                    <label class="text-sm text-white/70">Nama Mobil</label>
                                    <input type="text" name="nama" value="{{$data->nama}}" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                                </div>

                                <div class="mb-3">
                                    <label class="text-sm text-white/70">Harga</label>
                                    <input type="text" name="harga" value="{{$data->harga}}" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                                </div>

                                <div class="mb-3">
                                    <label class="text-sm text-white/70">Jumlah Seat</label>
                                    <input type="number" name="seat" value="{{$data->seat}}" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                                </div>

                                <!-- Fasilitas -->
                                <div class="mb-3">
                                    <label class="text-sm text-white/70">Fasilitas</label>
                                    <div class="flex gap-2 mt-1">
                                        <input type="text" class="inputFasilitas flex-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                                        <button type="button" onclick="addFasilitas(this)" class="px-4 py-2 bg-yellow-500 text-black rounded">+</button>
                                    </div>
                                    <ul class="listFasilitas flex flex-wrap gap-2 mt-3"></ul>
                                    <input type="hidden" name="fasilitas" class="fasilitasInput">
                                </div>

                                <div class="mb-3">
                                    <label class="text-sm text-white/70">Jumlah Mobil</label>
                                    <input type="number" name="jumlah" value="{{$data->jumlah}}" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                                </div>

                                <div class="mb-4">
                                    <label class="text-sm text-white/70">Tipe Mobil</label>
                                    <select name="type" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700 text-white">
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="SUV" {{ $data->type=='SUV'?'selected':'' }}>SUV</option>
                                        <option value="Keluarga" {{ $data->type=='Keluarga'?'selected':'' }}>Keluarga</option>
                                        <option value="Hiace/Elf" {{ $data->type=='Hiace/Elf'?'selected':'' }}>Hiace/Elf</option>
                                        <option value="Mewah" {{ $data->type=='Mewah'?'selected':'' }}>Mewah</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="text-sm text-white/70">Gambar Mobil</label>
                                    <input type="file" name="gambar" class="w-full mt-1 text-sm text-white">
                                    <img src="{{ asset('storage/'.$data->gambar) }}" class="mt-2" alt="">
                                </div>

                                <button type="submit" class="w-full py-2 rounded-full bg-yellow-500 text-black font-semibold">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-2 text-center">Data Kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>
     @if($status == true)
        <section aria-label="Navigasi Halaman Katalog">
            <h2 class="sr-only">Pagination Katalog</h2>
            <div class="flex justify-center gap-3 flex-wrap my-10">
                <a href="{{ $dataPaginate->previousPageUrl() }}" 
                    class="px-4 py-2 rounded-full bg-gray-700 text-white text-sm {{ !$dataPaginate->onFirstPage() ? '' : 'opacity-40 cursor-not-allowed' }}">
                    Prev
                </a>
                <a href="{{ $dataPaginate->nextPageUrl() }}" 
                    class="px-4 py-2 rounded-full bg-yellow-500 text-black text-sm font-semibold {{ $dataPaginate->hasMorePages() ? '' : 'opacity-40 cursor-not-allowed' }}">
                    Next
                </a>
            </div>
        </section>
    @endif
</div>

<!-- Add Modal -->
<div id="catalogAddModal" class="fixed inset-0 z-50 bg-black/70 overflow-y-auto hidden">
    <!-- Wrapper untuk memberi padding dari tepi layar -->
    <div class="flex justify-center px-4 py-8">
        <div class="bg-[#0B0B0B] rounded-xl w-full max-w-lg p-6 text-white relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeModal('catalogAddModal')" class="absolute top-4 right-4 text-white/60 hover:text-white text-xl">✕</button>
            <h2 class="text-yellow-400 text-xl font-bold mb-4">Tambah Mobil</h2>
            <form method="POST" action="{{ route('catalog-admin-add') }}" enctype="multipart/form-data" onsubmit="arrayAdd()">
                @csrf
                <div class="mb-3">
                    <label class="text-sm text-white/70">Nama Mobil</label>
                    <input required type="text" name="nama" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                </div>
                <div class="mb-3">
                    <label class="text-sm text-white/70">Harga</label>
                    <input required type="text" name="harga" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                </div>
                <div class="mb-3">
                    <label class="text-sm text-white/70">Jumlah Seat</label>
                    <input required type="number" name="seat" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700">
                </div>

                <div class="mb-3">
                    <label class="text-sm text-white/70">Fasilitas</label>
                    <div class="flex gap-2 mt-1">
                        <input type="text" id="inputAdd" class="flex-1 px-3 py-2 rounded bg-gray-800 border border-gray-700" placeholder="Contoh: Include BBM">
                        <button type="button" onclick="tambahData()" class="px-4 py-2 bg-yellow-500 text-black rounded">+</button>
                    </div>
                    <ul id="listAdd" class="flex flex-wrap gap-2 mt-3"></ul>
                    <input type="hidden" name="fasilitas" id="itemInputAdd">
                </div>

                <div class="mb-3">
                    <label class="text-sm text-white/70">Jumlah Mobil</label>
                    <input type="number" name="jumlah" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700" value="1">
                </div>

                <div class="mb-4">
                    <label class="text-sm text-white/70">Tipe Mobil</label>
                    <select required name="type" class="w-full mt-1 px-3 py-2 rounded bg-gray-800 border border-gray-700 text-white">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="SUV">SUV</option>
                        <option value="Keluarga">Keluarga</option>
                        <option value="Hiace/Elf">Hiace/Elf</option>
                        <option value="Mewah">Mewah</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="text-sm text-white/70">Gambar Mobil</label>
                    <input required type="file" name="gambar" class="w-full mt-1 text-sm text-white">
                </div>

                <button type="submit" class="w-full py-2 rounded-full bg-yellow-500 text-black font-semibold">Simpan</button>
            </form>
        </div>
    </div>
</div>


<script>
    // ======= ADD MODAL =======
    const elAdd = document.getElementById('listAdd');
    const inputAdd = document.getElementById('inputAdd');
    const hiddenInputAdd = document.getElementById('itemInputAdd');
    let fasilitasAdd = [];

    function tambahData(){
        const val = inputAdd.value.trim();
        if(!val) return;
        fasilitasAdd.push(val);
        inputAdd.value='';
        renderAdd();
    }

    function renderAdd(){
        elAdd.innerHTML='';
        fasilitasAdd.forEach((item, idx)=>{
            const li = document.createElement('li');
            li.className='flex items-center gap-2 bg-yellow-400 text-black px-3 py-1 rounded-full text-xs';
            li.innerHTML=`<span>${item}</span> <button type="button" onclick="removeAdd(${idx})">✕</button>`;
            elAdd.appendChild(li);
        });
        hiddenInputAdd.value = JSON.stringify(fasilitasAdd);
    }

    function removeAdd(idx){
        fasilitasAdd.splice(idx,1);
        renderAdd();
    }

    function arrayAdd(){ hiddenInputAdd.value = JSON.stringify(fasilitasAdd); }

    // ======= EDIT MODAL =======
    function openEditModal(id){
        const modal = document.querySelector(`.editModal[data-id="${id}"]`);
        if(!modal) return;
        modal.classList.remove('hidden');

        let arr = [];
        try {
            arr = JSON.parse(modal.dataset.fasilitas || '[]');
        } catch(e){
            arr = [];
        }

        const listEl = modal.querySelector('.listFasilitas');
        const inputEl = modal.querySelector('.inputFasilitas');
        const hiddenEl = modal.querySelector('.fasilitasInput');

        function render(){
            listEl.innerHTML='';
            arr.forEach((item, idx)=>{
                const li = document.createElement('li');
                li.className='flex items-center gap-2 bg-yellow-400 text-black px-3 py-1 rounded-full text-xs';
                li.innerHTML=`<span>${item}</span> <button type="button" onclick="removeFasilitas(${idx},${id})">✕</button>`;
                listEl.appendChild(li);
            });
            hiddenEl.value = JSON.stringify(arr);
        }

        modal._fasilitas = {arr, render};
        render();
    }

    function addFasilitas(btn){
        const modal = btn.closest('.editModal');
        const val = modal.querySelector('.inputFasilitas').value.trim();
        if(!val) return;
        modal._fasilitas.arr.push(val);
        modal.querySelector('.inputFasilitas').value='';
        modal._fasilitas.render();
    }

    function removeFasilitas(idx,id){
        const modal = document.querySelector(`.editModal[data-id="${id}"]`);
        modal._fasilitas.arr.splice(idx,1);
        modal._fasilitas.render();
    }

    function arrayEdit(form){
        const modal = form.closest('.editModal');
        modal._fasilitas.render();
    }

    function openModal(id){ document.getElementById(id)?.classList.remove('hidden'); }
    function closeModal(el){ 
        if(typeof el==='string'){ el=document.getElementById(el); }
        el?.classList.add('hidden'); 
    }
</script>

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


@include('Admin.buttonFloatingAdmin')
