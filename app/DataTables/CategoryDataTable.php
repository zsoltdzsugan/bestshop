<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($category) {
                return view('admin.category.partials.actions', compact('category'));
            })
            ->addColumn('icon', function ($category) {
                return '<span class="material-symbols-outlined">' . $category->icon . '</span>';
            })
            ->addColumn('status', function ($category) {
                $statusIcon = $category->status == 1
                    ? '<i class="fa-solid fa-circle" style="color: #48bb78;"></i>'
                    : '<i class="fa-solid fa-circle"></i>';

                return $statusIcon;
            })
            ->addColumn('created_at', function ($category) {
                return Carbon::parse($category->created_at)->format('Y/m/d H:i');
            })
            ->addColumn('updated_at', function ($category) {
                return Carbon::parse($category->updated_at)->format('Y/m/d H:i');
            })
            ->rawColumns(['icon', 'status', 'created_at', 'updated_at', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('category-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
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
            Column::make('icon')->orderable(false),
            Column::make('slug'),
            Column::make('name'),
            Column::make('status')->addClass('dt-type-status'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'Category_' . date('YmdHis');
    }
}
