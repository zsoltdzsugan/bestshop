<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($user) {
                return view('admin.user.partials.actions', compact('user'));
            })
            ->addColumn('image', function ($user) {
                return '<img src="'.asset('storage/'.$user->image).'" width="100">';
            })
            ->addColumn('status', function ($user) {
                $statusIcon = $user->status == 1
                    ? '<i class="fa-solid fa-circle text-success"></i>'
                    : '<i class="fa-solid fa-circle text-surface-dark"></i>';

                return $statusIcon;
            })
            ->rawColumns(['image', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->addTableClass('bg-surface-alt dark:bg-surface-dark-alt text-on-surface dark:text-on-surface-dark rounded-radius')
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('image')
                ->width(150)
                ->orderable(false)
                ->searchable(false),
            Column::make('name'),
            Column::make('username'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('role'),
            Column::make('status')->addClass('dt-type-status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_'.date('YmdHis');
    }
}
