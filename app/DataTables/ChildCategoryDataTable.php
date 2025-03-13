<?php

namespace App\DataTables;

use App\Models\ChildCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ChildCategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($childCategory) {
                return view('admin.child-category.partials.actions', compact('childCategory'));
            })
            ->addColumn('category', function ($query) {
                return $query->category->name;
            })
            ->addColumn('sub_category', function ($query) {
                return $query->subCategory->name;
            })
            ->addColumn('status', function ($childCategory) {
                $statusIcon = $childCategory->status == 1
                    ? '<i class="fa-solid fa-circle" style="color: #48bb78;"></i>'
                    : '<i class="fa-solid fa-circle"></i>';

                return $statusIcon;
            })
            ->addColumn('created_at', function ($childCategory) {
                return Carbon::parse($childCategory->created_at)->format('Y/m/d H:i');
            })
            ->addColumn('updated_at', function ($childCategory) {
                return Carbon::parse($childCategory->updated_at)->format('Y/m/d H:i');
            })
            ->rawColumns(['status', 'category', 'sub_category', 'created_at', 'updated_at', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ChildCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('childcategory-table')
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
            Column::make('slug'),
            Column::make('name'),
            Column::make('category'),
            Column::make('sub_category'),
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
        return 'ChildCategory_' . date('YmdHis');
    }
}
