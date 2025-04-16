<?php

namespace Modules\Cms\DestinationGuide\Controllers;

use Auth;
use Datatables;
use View;
use App\Http\Requests\DestinationGuide\UpdateRequest;
use App\Http\Requests\DestinationGuide\CreateRequest;

use App\Repositories\DestinationGuideRepository;
use Illuminate\Http\Request;

class DestinationGuideController extends Controller
{
    protected $destinationGuideRepository;

    public function __construct(
        DestinationGuideRepository $destinationGuideRepository
    ) {
        $this->destinationGuideRepository = $destinationGuideRepository;
    }

    public function index()
    {
        return view('destination-guide::index');
    }

    public function create()
    {
        return view('destination-guide::create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->destinationGuideRepository->create($request);
        if ($result) {
            return redirect()->route('destination-guide.edit', [$result->id]);
        }
        return redirect()->back()->withErrors(__('destination-guide::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->destinationGuideRepository->find($id);

        return view('destination-guide::edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->destinationGuideRepository->update($request, $id);
        if ($result) {
            return redirect()->back()->with('success', __('destination-guide::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('destination-guide::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->destinationGuideRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->destinationGuideRepository->getAjax($request);
    }
}
