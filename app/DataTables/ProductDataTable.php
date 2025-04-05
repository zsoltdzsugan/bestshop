<?php

namespace App\DataTables;

use App\Models\Product;
use Carbon\Carbon;
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
                if (auth()->user()->role == 'admin') {
                    if (request()->routeIs('admin.product.*') && ! request()->routeIs('admin.product.pending.*')) {
                        return view('admin.product.partials.actions', compact('product'));
                    }

                    return view('admin.product.pending.partials.actions', compact('product'));
                }

                if (auth()->user()->role == 'vendor') {
                    return view('vendor.product.partials.actions', compact('product'));
                }
            })
            ->addColumn('thumb_image', function ($product) {
                return '<img src="'.asset('storage/'.$product->thumb_image).'" width="100">';
            })
            ->addColumn('sale_start', function ($product) {
                return Carbon::parse($product->sale_start)->format('Y M d');
            })
            ->addColumn('sale_end', function ($product) {
                return Carbon::parse($product->sale_start)->format('Y M d');
            })
            ->addColumn('brand_id', function ($product) {
                return $product->brand->name;
            })
            ->addColumn('status', function ($product) {
                $statusIcon = $product->status == 1
                    ? '<i class="fa-solid fa-circle text-success"></i>'
                    : '<i class="fa-solid fa-circle text-surface-dark"></i>';

                return $statusIcon;
            })
            ->rawColumns(['thumb_image', 'status', 'action', 'sale_start', 'sale_end'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            if (request()->routeIs('admin.product.pending.*')) {
                return $model->newQuery()->where('is_approved', 0);
            }

            return $model->newQuery();
        }

        if ($user->role === 'vendor') {
            return $model->newQuery()->where('shop_id', auth()->user()->shop->id);
        }

        abort(403, 'Unauthorized');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->addTableClass('max-w-screen w-full whitespace-nowrap bg-surface-alt dark:bg-surface-dark-alt text-on-surface dark:text-on-surface-dark rounded-radius text-xs')
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
            ])
            ->parameters([
                'dom' => 'Bfrtip',
                'responsive' => true,
                'autoWidth' => true,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All']],
                'pageLength' => 10,
                'language' => [
                    'lengthMenu' => '_MENU_',
                    'zeroRecords' => 'No records found',
                    'info' => 'Showing _START_ to _END_ of _TOTAL_ entries',
                    'infoEmpty' => 'No entries available',
                    'infoFiltered' => '(filtered from _MAX_ total entries)',
                    'search' => 'Search:',
                    'paginate' => [
                        'first' => '<i class="fa-solid fa-angles-left"></i>',
                        'last' => '<i class="fa-solid fa-angles-right"></i>',
                        'next' => '<i class="fa-solid fa-angle-right"></i>',
                        'previous' => '<i class="fa-solid fa-angle-left"></i>',
                    ],
                ],
            ])
            ->setTableAttributes([
                'class' => 'table table-striped table-bordered dt-responsive nowrap',
                'style' => 'width:100%',
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('thumb_image')->orderable(false)->title('Image'),
            Column::make('name'),
            Column::make('brand_id')->title('Brand'),
            Column::make('sku'),
            Column::make('quantity'),
            Column::make('price'),
            Column::make('sale_price'),
            Column::make('sale_start'),
            Column::make('sale_end'),
            Column::make('is_top')->title('Top'),
            Column::make('is_new')->title('New'),
            Column::make('is_best')->title('Best'),
            Column::make('is_featured')->title('Featured'),
            Column::make('status')->addClass('dt-type-status'),
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
