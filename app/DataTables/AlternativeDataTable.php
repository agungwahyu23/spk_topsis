<?php

namespace App\DataTables;

use App\Models\Alternative;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AlternativeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->editColumn('objek_id', function ($q) {
            return $q->name;
        })
        ->addColumn('action', 'alternatives.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Alternative $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Alternative $model)
    {
        // return $model->newQuery();
        $query = Alternative::query();
        $query->leftJoin('objeks', 'alternative.objek_id', 'objeks.id');
        $query = $query->select(
            'alternative.id',
            'alternative.objek_id',
            'objeks.code',
            'objeks.name',
        );

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'objek_id' => ['title' => 'Nama']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'alternatives_datatable_' . time();
    }
}
