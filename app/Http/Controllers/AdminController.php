<?php

namespace App\Http\Controllers;
use App\Models\Quote;
use App\Models\ContactMessage;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pendingQuotesCount = Quote::where('quote', 'Pending')->count();
        $pendingEnquiriesCount = ContactMessage::where('status', 'Pending')->count();
        $completedUnpaidCount = Quote::where('status', 'Completed (unpaid)')->count();
        $completedProjectsCount = Quote::whereIn('status', ['Completed (unpaid)', 'Completed (paid)'])->count();
        $totalQuotesCount = Quote::count();
        $totalBookingsCount = Quote::whereIn('status', ['Booked', 'Completed (unpaid)', 'Completed (paid)'])->count();
        $totalEnquiriesCount = ContactMessage::count();
        $totalUsersCount = User::where('user_type', 'user')->count();

        return view('admin.index', compact('pendingQuotesCount', 'pendingEnquiriesCount', 'completedUnpaidCount', 'completedProjectsCount', 'totalQuotesCount', 'totalBookingsCount', 'totalEnquiriesCount', 'totalUsersCount'));
    }
}
