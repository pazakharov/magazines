<form action="{{ route('authors.store') }}" method="POST">
@csrf
    <div class="form-group">

        <div class="form-group">
            <label class="col-form-label" for="input3">Фамилия</label>
            <input  name="second_name" 
                    value="{{ old('second_name') }}" 
                    type="text" 
                    class="form-control @error('second_name') is-invalid @enderror" 
                    id="input3">
        </div>

        <label class="col-form-label" for="input1">Имя</label>
        <input  name="first_name" 
                value="{{ old('first_name') }}" 
                type="text" 
                class="form-control @error('first_name') is-invalid @enderror" 
                id="input1">
      </div>
      <div class="form-group">
        <label class="col-form-label" for="input2">Отчество</label>
        <input  name="middle_name" 
                value="{{ old('middle_name') }}" 
                type="text" 
                class="form-control @error('middle_name') is-invalid @enderror" 
                id="input2">
      </div>
      
     
      <div class="col-xs-12 col-sm-12 col-md-12 text-center d-flex flex-row justify-content-between">
        <a type="button" class="btn btn-secondary" href="{{ route('authors') }}">Отменить</a>
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>
</form>