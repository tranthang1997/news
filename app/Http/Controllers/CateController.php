<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;
class CateController extends Controller
{
    public function getList() {
        $list = Cate::select('id', 'name', 'parent_id') -> orderBy('id', 'DESC') -> get() -> toArray();
        return view('admin.cate.cate_list', compact('list'));
    }

    public function getAdd() {
        $parent = Cate::select('id', 'name', 'parent_id') -> get() -> toArray();
        return view('admin.cate.cate_add', compact("parent"));
    }

    public function postAdd(CateRequest $request) {
        $cate = new Cate;
        $cate -> name = $request -> txtCateName;
        $cate -> alias = changeTitle($request -> txtCateName);
        $cate -> order = $request -> txtOrder;
        $cate -> parent_id = $request -> sltParent;
        $cate -> keywords = $request -> txtKeywords;
        $cate -> description = $request -> txtDescription;
        $cate -> save();
        return redirect() -> route('admin.cate.getList') -> with(['flash_level' => 'success', 'flash_messages' => 'Add Category Success!']);
    }
    
    public function getEdit($id) {
        $data = Cate::findOrFail($id) -> toArray();
        $parent = Cate::select('id', 'name', 'parent_id') -> get() -> toArray();
        return view ('admin.cate.cate_edit', compact("parent", "data", "id"));
    }

    public function postEdit(Request $request, $id) {
        $this -> validate($request, 
            ['txtCateName' => 'required'],
            [
                'txtCateName.required' => 'Please enter Cate Name!',
            ]
        );
        $cate = Cate::find($id);
        $cate -> name = $request -> txtCateName;
        $cate -> alias = changeTitle($request -> txtCateName);
        $cate -> order = $request -> txtOrder;
        $cate -> parent_id = $request -> sltParent;
        $cate -> keywords = $request -> txtKeywords;
        $cate -> description = $request -> txtDescription;
        $cate -> save();
        return redirect() -> route('admin.cate.getList') -> with(['flash_level' => 'success', 'flash_messages' => 'Update! Success']);
    }

    public function getDelete($id) {
        $parent = Cate::where('parent_id', $id) -> count();
        if($parent == 0) {
            $cate = Cate::find($id);
            $cate -> delete();
            return redirect() -> route('admin.cate.getList') -> with(['flash_level' => 'success', 'flash_messages' => 'Delete! Success']);
        } else {
            echo "<script type = 'text/javascript'>
                alert('Bạn không thể xóa sản phẩm này');
                window.location = '";
                    echo route('admin.cate.getList');
                echo "'
            </script>";
        }
    }
}
