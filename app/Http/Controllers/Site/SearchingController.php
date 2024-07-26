<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Relationship\TypesProperty;

class SearchingController extends Controller
{
    public function search(Request $request)
    {
        try {

        /*
         * Validate the incoming request data
        */

        $request->validate([
            'location' => 'required|integer',
            'type' => 'required|integer',
            'budget' => 'required|string',
        ]);

        /*
         * Retrieve property IDs from the related table for the selected property type.
         * Obtain an array of these property IDs.
         * Once we have these IDs, we can query the properties table.
        */

        $properties_types = TypesProperty::where('types_id', $request->type)->pluck('property_id');

        /*
         * Check if any properties were found
        */


        if ($properties_types->isEmpty()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'No properties found',
            ], 404);
        }

        /*
         * Search for properties in the Property model using the IDs obtained from the previous query.
         * Filter by location, budget, and ensure the property is available (i.e., 'available' is 1).
         * Return properties that meet these criteria.
        */


        $properties_search = Property::whereIn('id', $properties_types)
        ->where('available', 1)
        ->where('municipality_id', $request->location)
        ->where('price', '<=', $request->budget)
        ->get();


        if ($properties_search->isEmpty()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'No properties found',
            ], 404);
        }

        return $properties_search;

        } catch (\Exception $e) {
        /*
         * Return a JSON response with an error message if an exception occurs
        */
            return response()->json([
                'status'  => 'error',
                'message' => 'Error: ' . $e->getMessage(),
            ], 400);
            // return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);

        }

    }
}
