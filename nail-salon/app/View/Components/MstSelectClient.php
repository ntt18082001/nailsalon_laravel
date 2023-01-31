<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MstSelectClient extends Component
{
    public $table;
    public $displayColumn;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($table, $displayColumn)
    {
        $this->table = $table;
        $this->displayColumn = $displayColumn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->table == 'users') {
            $sql = "select id, $this->displayColumn from $this->table where role_id=2";
        } else {
            $sql = "select $this->table.id, $this->table.$this->displayColumn, $this->table.service_cate_id, service_categories.name as name_cate
                from $this->table LEFT join service_categories on $this->table.service_cate_id=service_categories.id order by $this->table.service_cate_id";
        }
        $data = DB::select($sql);
        $select_display = "";
        if($this->table == 'users') {
            $select_display = "Staff";
        } else {
            $select_display = "Service";
        }
        return view('components.mst-select-client')->with('data', $data)->with('select_display', $select_display);
    }
}
