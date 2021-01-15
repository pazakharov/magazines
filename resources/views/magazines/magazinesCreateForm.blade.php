
<div class="d-flex flex-row">
    <div class="form-group d-flex flex-column">
      <div class="img-wrap">  <img id = "cover" class="cover" src="{{ asset('images/no-image.jpg') }}"></div>
        <button type="button" id="fotoСhooser" class="btn-sm btn-success my-2">Выбрать картинку</button>
    </div>
<div id="f2" style="display:none" class="row hidden">
    <form id="imageForm" action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input class="" type="file" id="imageFile" name="image">
    </form>
</div>

<form class="w-100" action="{{ route('magazines.store') }}" method="POST">
    @csrf
    <input type="hidden" id="magazineImage" value="{{old('image')}}" name="image">
        <div class="form-group w-100 ml-5">
            <div class="form-group">

                <div class="form-group">
                    <label class="col-form-label" for="input">Название журнала</label>
                    <input name="title" value="{{ old('title') }}" type="text"
                        class="form-control @error('title') is-invalid @enderror" id="input3">
                </div>

                <label class="col-form-label" for="date-picker">Дата</label>
                <input name="date" value="{{ old('date') }}" type="text"
                    class="form-control @error('date') is-invalid @enderror" id="date-picker">
            </div>
            <div class="form-group">
                <label for="desc">Короткое описание</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="desc"
                    rows="5">{{ old('description') }}</textarea>
            </div>
            <div id="authorsInputs" class="">

            </div>
        </div>
    </div>
    <div class="w-100 m-3" x-data="{ ShowModal: false}">
        <div class="text-center d-flex flex-row justify-content-start ">
            <h5 class="top">Авторы</h5>
            <div class="d-flex align-items-center">
                <button type="button" class="btn-sm btn-success m-1" id="plus" @click="ShowModal = true">+</button>
            </div>
        </div>
        <div id="authors" class="text-center authors flex-wrap d-flex flex-row justify-content-center">

        </div>
        


        <div class="extend-modal" id="dialoge" x-show="ShowModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content" @click.away="ShowModal = false">
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
                        <button type="button" class="btn btn-secondary" @click="ShowModal = false">Отменить</button>
                        <button type="button" class="btn btn-primary" @click="addAuthor()">Выбрать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center d-flex flex-row justify-content-between">
        <a type="button" class="btn btn-secondary" href="{{ route('magazines.index') }}">Отменить</a>
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>

</form>
