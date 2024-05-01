<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\HocVien; // Sửa đường dẫn đến model HocVien

class HocVienCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hocVien;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\HocVien $hocVien
     * @return void
     */
    public function __construct(HocVien $hocVien)
    {
        $this->hocVien = $hocVien;
    }
}
