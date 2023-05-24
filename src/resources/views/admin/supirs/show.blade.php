@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.supir.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supirs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.supir.fields.id') }}
                        </th>
                        <td>
                            {{ $supir->supirname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supir.fields.Id_pegawai') }}
                        </th>
                        <td>
                            {{ $supir->Id_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supir.fields.umur') }}
                        </th>
                        <td>
                            {{ $supir->umur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supir.fields.jenis_kelamin') }}
                        </th>
                        <td>
                            {{ $supir->jenis_kelamin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supirs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection