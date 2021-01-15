<form class="w-100" action="{{ route('magazines.store') }}" method="POST">
    @csrf
    <div class="d-flex flex-row">
        <div class="form-group">
            <img class="cover" src="{{ asset('images/no-image.jpg') }}">
        </div>
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
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="desc" rows="5">{{ old('description') }}</textarea>
          </div>
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center d-flex flex-row justify-content-between">
        <a type="button" class="btn btn-secondary" href="{{ route('authors') }}">Отменить</a>
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>

</form>
