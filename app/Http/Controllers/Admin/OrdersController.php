<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Game;
use App\Models\Gampanion;
use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Order::with(['game', 'user', 'status', 'gampanion'])->select(sprintf('%s.*', (new Order)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'order_show';
                $editGate      = 'order_edit';
                $deleteGate    = 'order_delete';
                $crudRoutePart = 'orders';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('game_game_name', function ($row) {
                return $row->game ? $row->game->game_name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('user.email', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->email) : '';
            });
            $table->addColumn('status_status', function ($row) {
                return $row->status ? $row->status->status : '';
            });

            $table->addColumn('gampanion_level', function ($row) {
                return $row->gampanion ? $row->gampanion->level : '';
            });

            $table->editColumn('gampanion.level', function ($row) {
                return $row->gampanion ? (is_string($row->gampanion) ? $row->gampanion : $row->gampanion->level) : '';
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : "";
            });

            $table->editColumn('request_note', function ($row) {
                return $row->request_note ? $row->request_note : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'game', 'user', 'status', 'gampanion']);

            return $table->make(true);
        }

        return view('admin.orders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $games = Game::all()->pluck('game_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gampanions = Gampanion::all()->pluck('level', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('games', 'users', 'statuses', 'gampanions'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $games = Game::all()->pluck('game_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gampanions = Gampanion::all()->pluck('level', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('game', 'user', 'status', 'gampanion');

        return view('admin.orders.edit', compact('games', 'users', 'statuses', 'gampanions', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('game', 'user', 'status', 'gampanion');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
