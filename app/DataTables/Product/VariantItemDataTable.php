<?php

namespace App\DataTables\Product;

use App\Models\Product\VariantItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VariantItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item) {
                if (auth()->user()->role == 'admin') {
                    return view('admin.product.variants.items.partials.actions', compact('item'));
                }

                if (auth()->user()->role == 'vendor') {
                    return view('vendor.product.variants.items.partials.actions', compact('item'));
                }
            })
            ->addColumn('is_default', function ($query) {
                $statusIcon = $query->is_default == 1
                    ? '<span class="bg-info text-on-info rounded-radius px-1 py-0.5">default</span>'
                    : '';

                return $statusIcon;
            })
            ->addColumn('status', function ($query) {
                $statusIcon = $query->status == 1
                    ? '<i class="fa-solid fa-circle text-success"></i>'
                    : '<i class="fa-solid fa-circle text-surface-dark"></i>';

                return $statusIcon;
            })
            ->rawColumns(['is_default', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(VariantItem $model): QueryBuilder
    {
        return $model->newQuery()->where('variant_id', $this->variantId);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('variantitem-table')
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
            Column::make('name'),
            Column::make('price'),
            Column::make('is_default'),
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
        return 'VariantItem_'.date('YmdHis');
    }
}
