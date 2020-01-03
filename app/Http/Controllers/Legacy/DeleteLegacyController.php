<?php declare(strict_types=1);

namespace App\Http\Controllers\Legacy;

use App\Legacy;
use Illuminate\Http\Request;
use App\Events\LegacyDeleted;
use Illuminate\Http\JsonResponse;

final class DeleteLegacyController
{
    public function __invoke(Request $request, Legacy $legacy): JsonResponse
    {
        $legacy->delete();

        broadcast(new LegacyDeleted($legacy->id, $legacy->history));

        return response()->json([], 204);
    }
}
