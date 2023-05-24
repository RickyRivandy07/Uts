<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupirRequest;
use App\Http\Requests\StoreSupirRequest;
use App\Http\Requests\UpdateSupirRequest;
use App\Models\Supir;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SupirController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('supir_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Supir::query()->select(sprintf('%s.*', (new Supir)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'supir_show';
                $editGate      = 'supir_edit';
                $deleteGate    = 'supir_delete';
                $crudRoutePart = 'supirs';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('supirname', function ($row) {
                return $row->supirname ? $row->supirname : '';
            });
            $table->editColumn('Id_pegawai', function ($row) {
                return $row->Id_pegawai ? $row->Id_pegawai : '';
            });
            $table->editColumn('umur', function ($row) {
                return $row->umur ? $row->umur : '';
            });
            $table->editColumn('jenis_kelamin', function ($row) {
                return $row->jenis_kelamin ? $row->jenis_kelamin : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.supirs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('supir_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supirs.create');
    }

    public function store(StoreSupirRequest $request)
    {
        $supir = Supir::create($request->all());

        return redirect()->route('admin.supirs.index');
    }

    public function edit(Supir $supir)
    {
        abort_if(Gate::denies('supir_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supirs.edit', compact('uts'));
    }

    public function update(UpdateSupirRequest $request, Supir $supir)
    {
        $supir->update($request->all());

        return redirect()->route('admin.supirs.index');
    }

    public function show(Supir $supir)
    {
        abort_if(Gate::denies('supir_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supirs.show', compact('supir'));
    }

    public function destroy(Supir $supir)
    {
        abort_if(Gate::denies('supir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supir->delete();

        return back();
    }

    public function massDestroy(MassDestroySupirRequest $request)
    {
        $supirs = Supir::find(request('ids'));

        foreach ($supirs as $supir) {
            $supir->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
