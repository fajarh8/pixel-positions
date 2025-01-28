<x-layout>
    <div class="space-y-5">
        <h1 class="font-bold text-3xl">Tambah Barang</h1>

        <section>
            <form method="POST" action="/good/add" class="mt-2 space-y-2 form-group">
                @csrf
                <h1 class="font-bold text-xl">Nama Barang</h1>
                <input name="name" type="text" placeholder="Nama Barang" class="form-control rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full max-w-xl" :value="old('name')"/>
                @error('name')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
                <h1 class="font-bold text-xl">Kode Barang</h1>
                <input name="code" type="text" placeholder="Kode Barang" class="form-control rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full max-w-xl" :value="old('code')"/>
                @error('code')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
                <div class="pt-2">
                    <button type="submit" class="btn p-3 bg-white/5 rounded-xl border border-white/10">Save</button>
                </div>
            </form>
        </section>
    </div>
  </x-layout>
