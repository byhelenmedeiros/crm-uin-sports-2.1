<?php

namespace App\Http\Controllers;

use App\Models\GroupSubdivision;
use Illuminate\Http\JsonResponse;

class GroupSubdivisionController extends Controller
{
    /**
     * Retorna as subdivisões de um grupo específico.
     *
     * @param int $groupId
     * @return JsonResponse
     */
    public function byGroup(int $groupId): JsonResponse
    {
        $subdivisions = GroupSubdivision::where('client_group_id', $groupId)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($subdivisions);
    }
}
