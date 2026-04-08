<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Internal\Support\ApprovalController;
use App\Http\Controllers\Internal\Support\IntakeController;
use App\Http\Controllers\Internal\Support\SupportCaseController;
use App\Http\Controllers\Internal\Support\ToolController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events/geobox', [Api\EventsController::class, 'geobox']);
Route::get('events/germany', [Api\EventsController::class, 'germany']);
Route::get('event-detail/{event}', [Api\EventsController::class, 'event']);

Route::prefix('internal/support')
    ->middleware(['support.service.token'])
    ->group(function () {
        // Intake
        Route::post('/cases/intake', [IntakeController::class, 'intake']);

        // Future-facing orchestration endpoints (for later externalization)
        Route::get('/cases/{case}/context', [SupportCaseController::class, 'context']);
        Route::post('/cases/{case}/status', [SupportCaseController::class, 'updateStatus']);
        Route::post('/cases/{case}/triage', [SupportCaseController::class, 'storeTriageResult']);
        Route::post('/cases/{case}/diagnostics', [SupportCaseController::class, 'storeDiagnosticsResult']);
        Route::post('/cases/{case}/resolution', [SupportCaseController::class, 'storeResolutionOutputs']);

        // Tool endpoints (V1 tools)
        Route::post('/tools/user-audit', [ToolController::class, 'userAudit']);
        Route::post('/tools/user-restore', [ToolController::class, 'userRestore']);
        Route::post('/tools/event-audit', [ToolController::class, 'eventAudit']);

        // Approvals
        Route::get('/approvals/pending', [ApprovalController::class, 'pending']);
        Route::post('/approvals/{approval}/approve', [ApprovalController::class, 'approve']);
        Route::post('/approvals/{approval}/reject', [ApprovalController::class, 'reject']);
    });
