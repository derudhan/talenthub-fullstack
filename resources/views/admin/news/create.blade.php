@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Berita Baru</h1>
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Judul:</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="body" class="block text-gray-700">Isi Berita:</label>
            <textarea oninput="auto_grow(this)" id="body" name="body" class="mt-1 block w-full resize-none overflow-hidden min-h-[100px]" required></textarea>
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Kategori:</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="region_id" class="block text-gray-700">Wilayah:</label>
            <select id="region_id" name="region_id" class="mt-1 block w-full" required>
                <option value="" disabled selected>Pilih Wilayah</option>
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-gray-700">Tanggal:</label>
            <input type="date" id="date" name="date" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Gambar Thumbnail:</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full" required>
            <img src="#" id="preview" alt="Preview" class="h-96" style="display: none; max-width: 100%; margin-top: 10px;">
        </div>
        <div class="mb-4">
            <label for="image_caption" class="block text-gray-700">Keterangan Gambar:</label>
            <input type="text" id="image_caption" name="image_caption" class="mt-1 block w-full" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                previewImage(this);
            });
        });

        function previewImage(input) {
            var preview = $('#preview')[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        const uploadField = document.getElementById("image");

        uploadField.onchange = function() {
            if (this.files[0].size > 2097152) {
                alert("Maks size file adalah 2 mb!");
                this.value = "";
            }
        };

        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
@endsection

@section('scripts')
    @vite('resources/js/app.js')
@endsection
