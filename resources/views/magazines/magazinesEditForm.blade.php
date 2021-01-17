<div class="d-flex flex-row">
    <div class="form-group d-flex flex-column">
        <div class="img-wrap"> <img id="cover" class="cover" src="{{ asset('images/no-image.jpg') }}"></div>
        <button type="button" id="fotoСhooser" class="btn-sm btn-success my-2">Выбрать картинку</button>
    </div>
    <div id="f2" style="display:none" class="row hidden">
        <form id="imageForm" action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input class="" type="file" id="imageFile" name="image" value="">
        </form>
    </div>
    <form class="w-100" action="{{ route('magazines.update', ['magazine' => $magazine->id ]) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" id="magazineImage" value="{{ old('image', $magazine->image->id) }}" name="image">
        <input type="hidden" id="magazineImageUrl"
            value="{{ old('image_url', $magazine->image->url)}}" name="image_url">
        <div class="form-group w-100 ml-5">
            <div class="form-group">
                <div class="form-group">
                    <label class="col-form-label" for="input">Название журнала</label>
                    <input name="title" value="{{ old('title', $magazine->title) }}" type="text"
                        class="form-control @error('title') is-invalid @enderror" id="input3">
                </div>
                <label class="col-form-label" for="date-picker">Дата</label>
                <input name="date" value="{{ old('date', $magazine->humanDate) }}" type="text"
                    class="form-control @error('date') is-invalid @enderror" id="date-picker">
            </div>
            <div class="form-group">
                <label for="desc">Короткое описание</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="desc"
                    rows="5">{{ old('description', $magazine->description) }}</textarea>
            </div>
            <div id="authorsInputs" class="">

            </div>
        </div>
</div>
<div class="w-100 m-3">
    <div class="text-center d-flex flex-row justify-content-start ">
        <h5 class="top">Авторы</h5>
        <div class="d-flex align-items-center">
            <button type="button" class="btn-sm btn-success m-1" id="plus">+</button>
            <span class="text-muted"> <i class="fa fa-arrow-left"></i>
                Выбор Автора </span>
        </div>
    </div>
    <div id="authors" class="text-center authors flex-wrap d-flex flex-row justify-content-center">
    </div>
    <div class="modal" id="dialoge">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Выбор автора</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="custom-select" id="authorList">
                            <option value="placeholder" selected>Выберете автора</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->fullName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Отменить</button>
                    <button type="button" class="btn btn-primary">Выбрать</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center d-flex flex-row justify-content-between">
    <a type="button" class="btn btn-secondary" href="{{ route('magazines.index') }}">Отменить</a>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>

</form>
