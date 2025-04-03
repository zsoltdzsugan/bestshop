<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($brand) {
                return view('admin.brand.partials.actions', compact('brand'));
            })
            ->addColumn('logo', function ($brand) {
                return '<img src="'.asset('storage/'.$brand->logo).'" width="100">';
            })
            ->addColumn('featured', function ($query) {
                $statusIcon = $query->featured == 1
                    ? '<i class="fa-solid fa-star text-warning"></i>'
                    : '<i class="fa-solid fa-star text-surface-dark"></i>';

                return $statusIcon;
            })
            ->addColumn('status', function ($query) {
                $statusIcon = $query->status == 1
                    ? '<i class="fa-solid fa-circle text-success"></i>'
                    : '<i class="fa-solid fa-circle text-surface-dark"></i>';

                return $statusIcon;
            })
            ->rawColumns(['logo', 'featured', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('brand-table')
            ->columns($this->getColumns())
            ->addTableClass('bg-surface-alt dark:bg-surface-dark-alt text-on-surface dark:text-on-surface-dark rounded-radius')
            ->minifiedAjax()
            ->orderBy(0)
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
            Column::make('logo')
                ->width(150)
                ->orderable(false)
                ->searchable(false),
            Column::make('slug'),
            Column::make('name'),
            Column::make('type'),
            Column::make('brand_url')
                ->width(150)
                ->orderable(false)
                ->searchable(false),
            Column::make('featured')->addClass('dt-type-status'),
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
        return 'Brand_'.date('YmdHis');
    }
}
