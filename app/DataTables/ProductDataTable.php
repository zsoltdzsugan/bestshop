<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($product) {
                return view('admin.product.partials.actions', compact('product'));
            })
            ->addColumn('thumb_image', function ($product) {
                return '<img src="'.asset('storage/'.$product->thumb_image).'" width="100">';
            })
            ->addColumn('status', function ($product) {
                $statusIcon = $product->status == 1
                    ? '<i class="fa-solid fa-circle text-success"></i>'
                    : '<i class="fa-solid fa-circle text-surface-dark"></i>';

                return $statusIcon;
            })
            ->rawColumns(['thumb_image', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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
            Column::make('thumb_image')->orderable(false),
            Column::make('slug'),
            Column::make('name'),
            Column::make('vendor_id'),
            Column::make('category_id'),
            Column::make('sub_category_id'),
            Column::make('child_category_id'),
            Column::make('brand_id'),
            Column::make('sku'),
            Column::make('quantity'),
            Column::make('price'),
            Column::make('sale_price'),
            Column::make('sale_start'),
            Column::make('sale_end'),
            Column::make('short_description'),
            Column::make('long_description'),
            Column::make('video_link'),
            Column::make('is_top'),
            Column::make('is_new'),
            Column::make('is_best'),
            Column::make('is_featured'),
            Column::make('is_approved'),
            Column::make('status')->addClass('dt-type-status'),
            Column::make('seo_title'),
            Column::make('seo_description'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
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
        return 'Product_'.date('YmdHis');
    }
}
