<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PostalZoneMapping;
use Illuminate\Http\Request;

class PostalZoneMappingController extends Controller
{
    /**
     * Lookup by external_id and/or postal prefix.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $ext    = $request->query('external_id');
        $prefix = substr($request->query('prefix', ''), 0, 4);

        $query = PostalZoneMapping::query();

        if (! empty($ext)) {
            $query->where('external_id', $ext);
        }

        if (strlen($prefix) === 4) {
            $query->where('prefix', $prefix);
        }

        $mapping = $query->first();

        if (! $mapping) {
            return response()->json([
                'message' => 'Mapping not found.'
            ], 404);
        }

        return response()->json([
            'external_id'        => $mapping->external_id,
            'prefix'             => $mapping->prefix,
            'zone_id'            => $mapping->zone_id,
            'comercial_zone_id'  => $mapping->comercial_zone_id,
            'vendor_id'          => $mapping->vendor_id,
        ]);
    }
}
