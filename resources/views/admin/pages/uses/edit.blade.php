@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="form-group">
        <h1>USE</h1><br>
    </div>

        <div class="form-group">

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            <form id="file-upload-form" class="uploader"  action="{{ route('uses.update', $uses->id) }}"  method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <br>
                <label for="author">Author</label>
                <textarea class="form-control" id="author" name="author" rows="1"  >{{ $uses->author }}</textarea>
                <br>
                <label for="heading">Headline</label>
                <textarea class="form-control" id="heading" name="heading" rows="1"  >{{ $uses->heading }}</textarea>
                <br>
                <label for="editor">Category :</label>
                <textarea class="form-control" id="editor" name="editor"  >{{ $uses->content }}</textarea>
                <br>
                <br>
                <label for="file-input">Featured Picture</label>
                <br>
                <img src=" {{Storage::url( $uses->image)}} " height="30%" width="30%">
                <br>
                <br>
                <input type="file" id="file-input" name="image" multiple />
                <span class="text-danger">{{ $errors->first('image') }}</span>
                <div id="thumb-output"></div>
                <br>
                <button class="btn btn-success" id="getData" >Submit</button>
            </form>
        </div>
</div>

@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script>
        let theEditor;
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        theEditor = editor;
                } )
                .catch( error => {
                        console.error( error );
                } );

                // function getDataFromTheEditor() {
                // alert(theEditor.getData());
                // }
                function myFunction(x) {
                x.classList.toggle("btn-success");
                }
    </script>
@endpush
