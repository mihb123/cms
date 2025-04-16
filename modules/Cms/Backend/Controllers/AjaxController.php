<?php
namespace Modules\Cms\Backend\Controllers;

use DB;
use Illuminate\Http\Request;

/**
 * Handle ajax search
 * @package Modules\Backend
 */
class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $request->validate([
            'term' => ['nullable', 'string', 'max:255'],
            'field' => ['nullable', 'string', 'max:255'],
            'table' => ['required', 'string', 'max:50'],
        ]);

        $term  = $request->input('term');
        $limit = $request->input('limit', 20);
        $table = $request->input('table');
        $field = $request->input('field', 'name');
        $filter = $request->input('filter', '');

        $query = DB::collection($table)
            ->where('deleted_at', null)
            ->where('deleted_at','!=', '');

        $filter = explode(',', $filter);

        if ($limit > 100) {
            $limit = 100;
        }

        foreach($filter as $item) {
            if (strpos($item, '=')) {
                $explode = explode('=', $item);
                $key = $explode[0] ?? '';
                $value = $explode[1] ?? '';
                $value = isset($explode[2]) ? $explode[2]($value) : $value;
                $query->where($key, $value);
            }
        }

        if ($term) {
            $query->where($field, 'like', "%{$term}%");
        }

        $bucket = [];
        $results = $query->take($limit)->get([$field]);

        foreach($results as $item) {
            $bucket[] = [
                'id' => $item['id'] ?? $item[$field],
                'text' => $item[$field],
            ];
        }

        return $bucket;
    }

    public function searchOption(Request $request)
    {
        $request->validate([
            'term' => ['nullable', 'string', 'max:255'],
            'field' => ['nullable', 'string', 'max:255'],
            'table' => ['required', 'string', 'max:50'],
        ]);

        $html = self::processSearch($request);

        return [
            'html' => $html,
        ];
    }

    public function processSearch($request) {
        $term  = $request->input('term');
        $limit = $request->input('limit', 20);
        $table = $request->input('table');
        $field = $request->input('field', 'name');
        $filter = $request->input('filter', '');

        $query = DB::collection($table)
            ->where('deleted_at', null)
            ->where('deleted_at','!=', '');

        // Check {field} value
        $filter = explode(',', $filter);

        // Check {limit} value
        if ($limit > 100) {
            $limit = 100;
        }

        foreach($filter as $item) {
            if (strpos($item, '=')) {
                $explode = explode('=', $item);
                $key = $explode[0] ?? '';
                $value = $explode[1] ?? '';
                $value = isset($explode[2]) ? $explode[2]($value) : $value;
            }
        }

        if ($term) {
            $query->where($field, 'like', "%{$term}%");
        }

        $results = $query->take($limit)->get([$field]);
        $html = view('backend::ajax.option_view', compact('results'))->render();

        return $html;
    }
}

