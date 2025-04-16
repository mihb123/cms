<?php

namespace Modules\Cms\KeyWords\Controllers;

use App\Http\Requests\KeyWordsGroup\CreateRequest;
use App\Http\Requests\KeyWordsGroup\UpdateRequest;
use App\Repositories\GroupKeyWordsRepository;
use App\Repositories\KeyWordsRepository;
use App\Services\GroupService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupService;

    protected $module = '';
    protected $keyWordsRepository;
    protected $groupKeyWordsRepository;

    public function __construct(
        GroupService $groupService,
        KeyWordsRepository $keyWordsRepository,
        GroupKeyWordsRepository $groupKeyWordsRepository
    ) {
        $this->groupService = $groupService;
        $this->keyWordsRepository = $keyWordsRepository;
        $this->groupKeyWordsRepository = $groupKeyWordsRepository;
        $listKeyWords = $this->keyWordsRepository->getAll();

        View::share(compact('listKeyWords'));
    }

    public function index()
    {
        return view('key-words::group.index');
    }

    public function create()
    {
        return view('key-words::group.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'key-words';
        $result = $this->groupService->create($data);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if ($result) {
            if (!empty($data['key_words'])) {
                foreach ($data['key_words'] as $key => $item) {             
                    $dataGroup[] = [
                        'group_id' => $result->id,
                        'key_words_id' => $item,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }

                $this->groupKeyWordsRepository->insert($dataGroup);
            }
            return redirect()->back()->with('success', __('key-words::messages.success'));
        }
        return redirect()->back()->withErrors(__('key-words::messages.failed'));
    }

    public function edit($id)
    {
        $group = $this->groupService->find($id);
        $keyWordsIds = [];
        if (!empty($group->keyWord)) {
            foreach ($group->keyWord as $key => $item) {
                $keyWordsIds[] = $item->id;
            }
        }
        return view('key-words::group.edit', compact('group', 'keyWordsIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'key-words';
        $result = $this->groupService->update($data, $id);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if ($result) {
            if (!empty($data['key_words'])) {
                foreach ($data['key_words'] as $key => $item) {             
                    $dataGroup[] = [
                        'group_id' => $id,
                        'key_words_id' => $item,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
                $this->groupKeyWordsRepository->deleteGroup($id);
                $this->groupKeyWordsRepository->insert($dataGroup);
            } else {
                $this->groupKeyWordsRepository->deleteGroup($id);
            }
            return redirect()->back()->with('success', __('key-words::messages.success'));
        }
        return redirect()->back()->withErrors(__('key-words::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->groupService->destroy($id);
    }

    public function ajax(Request $request)
    {

        return $this->groupService->getAjaxKeyWords($request);
    }

    public function changeSort(Request $request)
    {
        return $this->groupService->changeSort($request);
    }
}
