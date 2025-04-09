<?php

namespace App\DataTables;

use App\Models\FlashSaleItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FlashSaleItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<FlashSaleItem> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($flashSaleItem) {
                return view('admin.flash-sale.partials.actions', compact('flashSaleItem'));
            })
            ->addColumn('product_name', function ($query) {
                return '<a href="'.route("admin.product.edit", $query->product->id).'">'.$query->product->name.'</a>';
            })
            ->addColumn('featured', function ($query) {
                $statusIcon = $query->is_featured == 1
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
            ->rawColumns(['status', 'featured', 'action', 'product_name'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<FlashSaleItem>
     */
    public function query(FlashSaleItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('flassaleitem-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('product_name'),
            Column::make('featured'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'FlasSaleItem_' . date('YmdHis');
    }
}
