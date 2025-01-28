<x-layout>
    <div class="space-y-5">
        <h1 class="font-bold text-3xl">Data Barang</h1>
        <section>
            <div class="space-x-2">
                <a href="/good/add" class="btn p-3 bg-white/5 rounded-xl border border-white/10">Tambah Barang</a>
                <a href="/good/transaction" class="btn p-3 bg-white/5 rounded-xl border border-white/10">Tambah Transaksi</a>
                <a href="/good/history" class="btn p-3 bg-white/5 rounded-xl border border-white/10">Riwayat Transaksi</a>
            </div>
        </section>
        <section class="pt-3">
            <ul>
                @foreach ($goods as $good)
                    <li class="text-white">{{$good['name']}} ({{$good['code']}}): {{$good['stock']}}</li>
                @endforeach
            </ul>
        </section>
    </div>
  </x-layout>
