<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MstSelect extends Component
{
    public $table;
    public $displayColumn;
    // Nhận dữ liệu từ thẻ mở của component vào file này để xử lý
    
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
        $sql = "select id, $this->displayColumn from $this->table where deleted_at is null";
        $data = DB::select($sql);
        return view('components.mst-select')->with('data', $data);
    }
}
