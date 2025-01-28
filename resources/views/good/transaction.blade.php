<x-layout>
    <div class="space-y-5">
        <h1 class="font-bold text-3xl">Tambah Transaksi</h1>
        <section>
            <form method="POST" action="/good/transaction" class="form-group mt-2 space-y-2">
                @csrf
                {{-- <h1 class="font-bold text-xl">Kode Barang</h1>
                <input type="text" name="id" placeholder="Silakan pilih barang" class="rounded-xl bg-gray-900 border-white/10 px-5 py-4 w-full disabled" value="" disabled/> --}}
                <h1 class="font-bold text-xl">Nama Barang</h1>
                {{-- <input type="text" placeholder="Nama Barang" class="rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full max-w-xl"/> --}}
                <select name="good_id" id="goodName" class=" form-control rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full dark:bg-gray-900  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{null}}" selected>Pilih Barang</option>
                    @foreach ($goods as $good)
                    <option value="{{$good['id']}}">{{$good['name']}}</option>
                    @endforeach
                </select>
                @error('code')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
                <h1 class="font-bold text-xl">Jumlah Barang</h1>
                <input type="number" name="quantity" placeholder="Jumlah Barang" class="form-control rounded-xl bg-gray-900 border-white/10 px-5 py-4 w-full"/>
                @error('quantity')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
                <h1 class="font-bold text-xl">Jenis Transaksi</h1>
                <select name="transaction" id="goodName" class="form-control rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full dark:bg-gray-900  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{null}}" selected>Jenis Transaksi</option>
                    <option value="buy">Beli</option>
                    <option value="sell">Jual</option>
                </select>
                @error('transaction')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
                <div class="pt-3">
                    <button type="submit" class="btn p-3 bg-white/5 rounded-xl">Save</button>
                </div>
            </form>
        </section>
    </div>
  </x-layout>
