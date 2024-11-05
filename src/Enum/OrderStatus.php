<?php
declare(strict_types=1);

namespace App\Enum;

enum OrderStatus: string {
    case InProgress = "In Progress";
    case Completed = "Completed";
    case Cancelled = "Cancelled";
    case Pending = "Pending";
    case Shipped = "Shipped";
    case Delivered = "Delivered";
    case Failed = "Failed";
}