@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.book.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supirs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="supirname">{{ trans('cruds.supir.fields.supirname') }}</label>
                <input class="form-control {{ $errors->has('supirname') ? 'is-invalid' : '' }}" type="text" name="supirname" id="supirname" value="{{ old('supirname', '') }}" required>
                @if($errors->has('supirname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supirname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supir.fields.supirname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="Id_pegawai">{{ trans('cruds.supir.fields.Id_pegawai') }}</label>
                <input class="form-control {{ $errors->has('Id_pegawai') ? 'is-invalid' : '' }}" type="text" name="Id_pegawai" id="Id_pegawai" value="{{ old('Id_pegawai', '') }}" required>
                @if($errors->has('Id_pegawai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('Id_pegawai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supir.fields.Id_pegawai_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="umur">{{ trans('cruds.supir.fields.umur') }}</label>
                <input class="form-control {{ $errors->has('umur') ? 'is-invalid' : '' }}" type="text" name="umur" id="umur" value="{{ old('umur', '') }}" required>
                @if($errors->has('umur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('umur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supir.fields.umur_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jenis_kelamin">{{ trans('cruds.supir.fields.jenis_kelamin') }}</label>
                <input class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" type="text" name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin', '') }}" required>
                @if($errors->has('jenis_kelamin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_kelamin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supir.fields.jenis_kelamin_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection