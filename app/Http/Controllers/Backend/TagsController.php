<?php

namespace App\Http\Controllers\Backend;

use Validator;
use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::with('articles')->latest()->get();
        return view('backend.tags.list', compact('tags'));
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store()
    {
        return $this->saveItem(null);
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('backend.tags.edit', compact('tag'));
    }

    public function update($id)
    {
        return $this->saveItem($id);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return json_encode(['message' => 'Запись не найдена']);
        } else {
            $tag->delete();
        }

        return json_encode(['success' => 'ok']);
    }

    private function setIsPublished($input)
    {
        if (!isset($input['is_published'])) {
            $input['is_published'] = 0;
        }

        return $input;
    }

    private function saveItem($id)
    {
        if (!$id) {
            $id = $this->request->get('id');
        }

        $validation = $this->validateData($this->request, $id);

        if ($validation['success']) {
            $validation['message'] = '<i class="ui green check icon"></i>Сохранено';
            if ($this->request->get('do_redirect')) {
                $validation['redirect'] = Session::pull('url.intended', url(config('app.admin_segment_name') . '/tags'));
            }

            if ($id) {
                $tag = Tag::findOrFail($id);
            } else {
                $tag = new Tag;
                $tag->save();
            }

            $validation['id'] = $tag->id;

            $tag->update($this->setIsPublished(array_map('trim', $request->all())));
        }

        return $validation;
    }

    private function validateData($request, $id = null)
    {
        $v = Validator::make($request->all(), [
            'slug' => 'required|unique:Tag,slug,' . $id . ',id',
            'title' => 'required'
        ]);

        $data = [];

        if ($v->fails()) {
            $data['success'] = 0;
            $data['message'] = '<ul>';
            $messages = $v->errors()->all();
            foreach ($messages as $m) {
                $data['message'] .= '<li>' . $m . '</li>';
            }
            $data['message'] .= '</ul>';
        } else {
            $data['success'] = 1;
        }

        return $data;
    }
}
