<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Routes:
 * - Service creation (requires authenticated admin)
 * - Guardian registration (Always create a corresponding user when registering a guardian from this route)
 * - Add guardian (No need to create a corresponding user)
 * - Child registration (needs a guardian)
 */

/**
 * Filament management:
 * - Admin panel
 *  > Manage Service
 *  > Manage Attendance (This is where QR codes are scanned, create ID printouts of ID after scanning)
 *  > Activity Logs (Spatie)
 *
 * - Guardian panel
 *  > Manage additional guardians
 *  > Manage children
 *  > Register for services (This is where QR codes are generated)
 */
