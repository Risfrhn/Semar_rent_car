@include('header')

<div class="min-h-screen px-4 md:px-8 py-8">

    <!-- Dashboard Header -->
    <h1 class="text-3xl text-yellow-400 md:text-4xl font-bold mb-8">Dashboard Admin</h1>

    <!-- Cards Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <div class="bg-gray-800 rounded-lg p-6 shadow">
            <p class="text-yellow-400 font-semibold text-sm">Total Mobil</p>
            <p class="text-white font-bold text-3xl mt-2">{{$countCatalog}}</p>
        </div>
        <div class="bg-gray-800 rounded-lg p-6 shadow">
            <p class="text-yellow-400 font-semibold text-sm">Total Blog</p>
            <p class="text-white font-bold text-3xl mt-2">{{$dataBlog}}</p>
        </div>
        <div class="bg-gray-800 rounded-lg p-6 shadow">
            <p class="text-yellow-400 font-semibold text-sm">Total Promo</p>
            <p class="text-white font-bold text-3xl mt-2">{{$dataPromo}}</p>
        </div>
    </div>

    <!-- Tabel Terbaru -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

        <!-- Mobil Terbaru -->
        <div class="bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
            <h2 class="text-yellow-400 font-bold text-xl mb-4">Mobil Terbaru</h2>
            <table class="min-w-full table-fixed bg-gray-900 rounded-xl overflow-hidden text-sm text-left">
                <thead class="bg-gray-700 text-gray-200 text-xs uppercase">
                    <tr>
                        <th class="px-4 py-2">Nama Mobil</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 divide-y divide-gray-700">
                    @foreach($catalogNew as $data)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 truncate max-w-xs" title="{{$data->nama}}">{{$data->nama}}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Blog Terbaru -->
        <div class="bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
            <h2 class="text-yellow-400 font-bold text-xl mb-4">Blog Terbaru</h2>
            <table class="min-w-full table-fixed bg-gray-900 rounded-xl overflow-hidden text-sm text-left">
                <thead class="bg-gray-700 text-gray-200 text-xs uppercase">
                    <tr>
                        <th class="px-4 py-2">Nama Blog</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 divide-y divide-gray-700">
                    @foreach($blogNew as $data)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 truncate max-w-xs" title="{{$data->judul}}">{{$data->judul}}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Promo Terbaru -->
        <div class="bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
            <h2 class="text-yellow-400 font-bold text-xl mb-4">Promo Terbaru</h2>
            <table class="min-w-full table-fixed bg-gray-900 rounded-xl overflow-hidden text-sm text-left">
                <thead class="bg-gray-700 text-gray-200 text-xs uppercase">
                    <tr>
                        <th class="px-4 py-2">Promo</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 divide-y divide-gray-700">
                    @foreach($promoNew as $data)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 truncate max-w-xs" title="{{$data->nama}}">{{$data->nama}}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>

@include('Admin.buttonFloatingAdmin')
