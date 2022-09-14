<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rule;
use Illuminate\Support\Facades\Session;
class RuleController extends Controller
{
    private $rules;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->rules = new Rule();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Quản lý vai trò';

        $keyword = null;
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        $ruleList = $this->rules->getAllRule($keyword, self::_PER_PAGE);
        return view('manage.system.rule.main', compact('title', 'ruleList'));
    }

    public function add(){
        $title = 'Thêm vai trò';
        return view('manage.system.rule.addRule', compact('title'));
    }
    public function postAdd(Request $request){
        $request->validate(
            [
                'nameRule' => 'required',
                'desRule' => 'required',
            ],
            [
                'nameRule.required' =>  'Nhập tên vai trò',
                'desRule.required' => 'Nhập mô tả vai trò',
            ]);
        // $this->ruleservice->create($request);
        $dataInsert = [
            'nameRule' =>  $request->nameRule,
            'desRule' => $request->desRule,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->rules->addRule($dataInsert);
        return redirect()->route('rule')->with('success', 'Thêm thiết bị thành công');
    }

    public function update(Request $request, $id){
        $title = 'Cập nhật vai trò';
        if (!empty($id)){
            $ruleDetail = $this->rules->getDetail($id);
            if(!empty($ruleDetail[0])){
                $request->session()->put('id', $id);
                $ruleDetail = $ruleDetail[0];
            }
            else{
                return redirect()->route('rule')->with('success', 'Liên kết không tồn tại');
            }
        } 
        else {
            return redirect()->route('rule')->with('success', 'Liên kết không tồn tại');
        }
        return view('manage.system.rule.updateRule', compact('title', 'ruleDetail'));
    }
    public function postUpdate(Request $request){
        $request->validate(
            [
                'nameRule' => 'required',
                'desRule' => 'required',
            ],
            [
                'nameRule.required' =>  'Nhập tên vai trò',
                'desRule.required' => 'Nhập mô tả vai trò',
            ]);
        $id = session('id');
        if(empty($id)){
            return back()->with('error', 'Liên kết không tồn tại');
        }
        $dataUpdate = [
            $request -> nameRule,
            $request -> desRule,
            date('Y-m-d H:i:s')
        ];
        //dd(session('id'));
        $this->rules->updateRule($dataUpdate, $id);
        return redirect()->route('rule')->with('success', 'Cập nhật vai trò thành công');
    }

}
