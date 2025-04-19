@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Modifier l'Article</h1>

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" class="form-control">{{ $post->content }}</textarea>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        tinymce.init({
                            selector: '#content', // Sélecteur de ton textarea
                            plugins: 'advlist autolink lists link image charmap preview anchor',
                            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image',
                            menubar: true,
                            images_upload_url: '{{ route('admin.upload.image') }}', // Route Laravel pour gérer l'upload
                            automatic_uploads: true,
                            file_picker_types: 'image',
                            file_picker_callback: function(callback, value, meta) {
                                var input = document.createElement('input');
                                input.setAttribute('type', 'file');
                                input.setAttribute('accept', 'image/*');

                                input.onchange = function() {
                                    var file = this.files[0];
                                    var formData = new FormData();
                                    formData.append('file', file);

                                    fetch('{{ route('admin.upload.image') }}', {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector(
                                                    'meta[name="csrf-token"]').getAttribute('content')
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(data => callback(data.location)) // Callback avec l'URL de l'image
                                        .catch(error => console.error('Erreur d\'upload:', error));
                                };

                                input.click();
                            }
                        });
                    });
                </script>

            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="100">
                @endif
            </div>

            <div class="form-group">
                <label for="tags">Tags (séparés par des virgules)</label>
                <input type="text" name="tags" id="tags" class="form-control"
                    value="{{ old('tags', $post->tags->pluck('name')->implode(',')) }}">
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
@endsection
