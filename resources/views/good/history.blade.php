<x-layout>
    <div class="space-y-5">
        <h1 class="font-bold text-3xl">Riwayat Transaksi</h1>
        {{-- <section class="space-y-2">
            <form action="/good/history" method="POST">
                <h3 class="font-bold text-lg">Barang</h3>
                <select name="good_id" id="goodId" class="form-control rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full dark:bg-gray-900  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{null}}">Semua Barang</option>
                    @foreach ($goods as $good)
                        <option value="{{$good->id}}">{{$good->name}}</option>
                    @endforeach
                </select>
                <h3 class="font-bold text-lg pt-4">Jenis Transaksi</h3>
                <select name="good_id" id="goodId" class="form-control rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full dark:bg-gray-900  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{null}}">Semua Transaksi</option>
                    <option value="buy">Beli</option>
                    <option value="sell">Jual</option>
                </select>
                <div class="mt-3">
                    <button class="btn bg-white/5 p-3 rounded-xl">Cari</button>
                </div>
            </form>
        </section> --}}
        <section>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Updated
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Barang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kode Barang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Transaksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stok
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{$transaction->updated_at}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$transaction->good->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$transaction->good->code}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$transaction->transaction}}
                                </td>
                                <td class="px-6 py-4">
                                    @switch ($transaction->transaction)
                                        @case('buy')
                                            {{$transaction->buy->quantity}}
                                        @break
                                        @case('sell')
                                            {{$transaction->sell->quantity}}
                                        @break
                                    @endswitch
                                </td>
                                <td class="px-6 py-4">
                                    {{$transaction->stock}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layout>
