<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">-- Pilih kategori --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $item->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nama Barang</label>
    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price ?? '') }}" class="form-control @error('price') is-invalid @enderror">
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" name="stock" value="{{ old('stock', $item->stock ?? '') }}" class="form-control @error('stock') is-invalid @enderror">
    @error('stock')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>