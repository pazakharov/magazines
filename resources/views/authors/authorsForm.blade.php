<form action="{{ route('authors.store') }}" method="POST">
@csrf
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Имя автора</label>
        <input type="text" class="form-control" id="inputDefault">
      </div>
      <div class="form-group">
        <label class="col-form-label" for="inputDefault">Отчество автора</label>
        <input type="text" class="form-control" id="inputDefault">
      </div>
      
      <div class="form-group">
        <label class="col-form-label" for="inputDefault">Фамилия автора</label>
        <input type="text" class="form-control" id="inputDefault">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center d-flex flex-row justify-content-between">
        <a type="button" class="btn btn-secondary" href="{{ route('authors') }}">Отменить</a>
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>
</form>