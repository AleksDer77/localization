<form action="{{ $action }}" method="POST">
    @csrf @method($method)
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label class="form-label">ID языка</label>
                <input type="text" name="id" class="form-control" value="{{ old('id', $language->id) }}" autofocus>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label class="form-label">Название языка</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $language->name) }}">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" name="active" type="checkbox" value="1" id="active" @checked(old('active', $language->active))>
            <label class="form-check-label" for="active">
                {{ __('Показывать на сайте') }}
            </label>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" name="default" type="checkbox" value="1"
                   id="default" @checked(old('default', $language->default))>
            <label class="form-check-label" for="default">
                {{ __('По-умолчанию') }}
            </label>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" name="fallback" type="checkbox" value="1"
                   id="fallback" @checked(old('fallback', $language->fallback))>
            <label class="form-check-label" for="fallback">
                {{ __('Резервный') }}
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ __('Сохранить') }}
    </button>
</form>
