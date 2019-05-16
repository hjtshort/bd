<?php

namespace App\Http\Controllers;

use App\models\city;
use App\models\district;
use App\models\roles;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;
use App\models\product;

class DataTableController extends Controller
{
    public function getCity()
    {
        return DataTables::of(city::query())->addColumn('action',function($user){
            return "  <span><button data-id='{$user->id}' class=\"btn btn-warning edit\">Sửa</button></span>
                     <span><button data-id='{$user->id}' class=\"btn btn-danger delete\">Xóa</button></span>";
        })->rawColumns(['action'])->make(true);
    }
    public function getDistrict()
    {
        return DataTables::of(district::join('city','district.city_id','=','city.id')
            ->select('district.id','district_name','city_name')->get())->addColumn('action',function ($district){
            return "  <span><button data-id='{$district->id}' class=\"btn btn-warning edit\">Sửa</button></span>
                     <span><button data-id='{$district->id}' class=\"btn btn-danger delete\">Xóa</button></span>";
        })->rawColumns(['action'])->make(true);
    }
    public function getDataProduct()
    {
        return DataTables::of(product::withTrashed()->get())->addColumn('action',function($user){
            return "<span><button class=\"btn btn-primary\"><i
                                                            class=\"fa fa-eye\"></i></button></span>
                        <span><a class=\"btn btn-warning\" href='". route('editProduct',$user->id)."'><i
                                        class=\"fa fa-edit\"></i></a></span>
                                        ";
        })->addColumn('image',function($user){
//            return " <a href=".route('image',$user->id)."> <img width=\"40\"
//                      src='". asset('/upload/folder_up.png')."'
//                      alt=\"\">
//                     </a>";
            return "<a href='".route('image',$user->id)."' class=\"btn btn-white btn-sm\"><i class=\"fa fa-folder\"></i> View </a>";
        })->addColumn('delete',function($user){
            $action='checked';
            if($user->deleted_at!=''){
                $action ='';
            }
            return "<div class=\"switch\">
                        <div class=\"onoffswitch\">
                            <input type=\"checkbox\"  ".$action." value='".$user->id."' class=\"onoffswitch-checkbox delete\" id=\"example1\">
                            <label class=\"onoffswitch-label\" for=\"example1\">
                                <span class=\"onoffswitch-inner\"></span>
                                <span class=\"onoffswitch-switch\"></span>
                            </label>
                        </div>
                    </div>";
        })->rawColumns(['action','image','delete'])->make(true);
    }
    public function getDataUser()
    {
        return DataTables::of(User::withTrashed()->where('isAdmin','=',0)->get())->addColumn('action',function($user){

            return "<span><button data-id='$user->id' data-role='$user->permission' class=\"btn btn-primary role\">Phân quyền</button></span>
                        <span><a class=\"btn btn-warning\" href='". route('editProduct',$user->id)."'>Sửa</a></span>
                                        ";
        })->addColumn('image',function($user){

            return "<img width='100' src='".Storage::url($user->avatar)."' >";
        })->addColumn('delete',function($user){
            $action='checked';
            if($user->deleted_at!=''){
                $action ='';
            }
            return "<div class=\"switch\">
                        <div class=\"onoffswitch\">
                            <input type=\"checkbox\" ".$action." value='".$user->id."' class=\"onoffswitch-checkbox delete\" id=\"example1\">
                            <label class=\"onoffswitch-label\" for=\"example1\">
                                <span class=\"onoffswitch-inner\"></span>
                                <span class=\"onoffswitch-switch\"></span>
                            </label>
                        </div>
                    </div>";
        })->rawColumns(['action','image','delete'])->make(true);
    }
    public function getDataRoles()
    {
        return DataTables::of(roles::query())->addColumn('action',function($user){
//            return "<span><button data-id='{$user->id}' data-name='$user->role_name' class=\"btn btn-primary edit\">Cập nhật</button></span>";
            return "<a href=\"javascript:void(0)\" data-id='{$user->id}' data-name='$user->role_name' class=\"btn btn-white btn-sm edit\"><i class='fa fa-pencil'></i> Sửa </a>";
        })->rawColumns(['action'])->make(true);
    }

}
