<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImage;
use App\Http\Requests\CreateProduct;
use App\models\direction;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\models\city;
use App\models\district;
use App\models\property;
use App\models\type;
use App\models\product;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(AdminRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        } else
            return redirect()->back()->with(['mess_error' => 'Đăng nhập thất bại!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

    public function index()
    {
        return Auth::user();
    }

    public function city(Request $request)
    {
        if ($request->search && $request->search != '') {
            $data['city'] = city::where('city_name', 'like', '%' . $request->search . '%')->paginate(20)
                ->withPath('?search=' . $request->search);
        } else {
            $data['city'] = city::paginate(20);
        }
        return view('admin.component.city', $data);
    }

    public function createCity(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'city_name' => 'required',
            'city_alias' => 'required'
        ]);
        if ($valid->fails()) {
            return $valid->errors()->first();
        } else {
            try {
                city::create($request->only('city_name', 'city_alias'));
                echo 'success';
            } catch (\Illuminate\Database\QueryException $e) {
                echo 'error';
            }

        }
    }

    public function updateCity(Request $request)
    {
        $info = city::find($request->id);

        $valid = Validator::make($request->all(), [
            'city_name' => 'required',
            'city_alias' => 'required'
        ]);
        if ($valid->fails()) {
            return $valid->errors()->first();
        } else {
            try {
                $info->update([
                    'city_name' => $request->city_name,
                    'city_alias' => $request->city_alias
                ]);
                echo 'success';
            } catch (\Illuminate\Database\QueryException $e) {
                echo 'error';
            }
        }

    }

    public function deleteCity(Request $request)
    {
        try {
            city::find($request->id)->delete();
            echo 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            echo 'error';
        }
    }

    public function district(Request $request)
    {
        $district = new district();
        $data['city'] = city::all();
        $data['selectValue'] = '';
        if ($request->search && $request->search != '') {
            $district = $district->where('district_name', 'like', '%' . $request->search . '%');
        }
        if ($request->city && $request->city != '') {
            $district = $district->where('city_id', $request->city);
            $data['selectValue'] = $request->city;
        }
        $data['district'] = $district->with('getCity')->paginate(20);
        return view('admin.component.district', $data);
    }

    public function createDistrict(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'city_id' => 'required',
            'district_name' => 'required'
        ]);
        if ($valid->fails()) {
            return $valid->errors()->first();
        }

        try {
            district::create($request->all());
            echo 'success';
        } catch (\Illuminate\Database\QueryException $ex) {
            echo 'error';
        }
    }

    public function updateDistrict(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'city_id' => 'required',
            'district_name' => 'required'
        ]);
        if ($valid->fails()) {
            return $valid->errors()->first();
        }
        try {
            district::find($request->id)->update([
                'city_id' => $request->city_id,
                'district_name' => $request->district_name
            ]);
            echo 'success';
        } catch (\Illuminate\Database\QueryException $ex) {
            echo 'error';
        }
    }

    public function deleteDistrict(Request $request)
    {
        try {
            district::find($request->id)->delete();
            echo 'success';
        } catch (\Illuminate\Database\QueryException $ex) {
            echo 'error';
        }
    }

    public function getDistrict(Request $request)
    {
        $data = district::where('city_id', $request->id)->get();
        return $data;
    }

    public function getCreateProduct(Request $request)
    {
        $data['city'] = city::all();
        $data['property'] = property::all();
        $data['type'] = type::all();
        $data['direction'] = direction::all();
        return view('admin.component.create-product', $data);
    }

    public function postCreateProduct(CreateProduct $request)
    {
        if (!is_dir('upload')) {
            mkdir('upload', 0777);
        }
        $file = $request->file('image');
        $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move('upload', $name);
        $img = array($name);


        try {

            product::create([
                'product_title' => $request->product_title,
                'product_alias' => $request->product_alias,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'type_id' => $request->type_id,
                'property_id' => $request->property_id,
                'product_info' => $request->product_info,
                'product_acreage' => $request->product_acreage,
                'product_price' => $request->product_price,
                'product_fast' => $request->product_fast,
                'product_status' => $request->product_status,
                'direction_id' => $request->direction_id,
                'product_address' => $request->product_address,
                'product_img' => json_encode($img),
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('product');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back();
        }
    }

    public function product(Request $request)
    {
        $data['product'] = product::paginate(10);
        return view('admin.component.product', $data);
    }

    public function image($id)
    {
        $value = product::find($id)->product_img;
        $data['image'] = json_decode($value);
        $data['id'] = $id;
        return view('admin.component.product-image', $data);
    }

    public function postCreateImage(CreateImage $request, $id)
    {
        if (!is_dir('upload')) {
            mkdir('upload', 0777);
        }
        $file = $request->file('image');
        $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move('upload', $name);
        $up = product::find($id);
        $image = json_decode($up->product_img);
        $image[] = $name;
        product::find($id)->update([
            'product_img' => json_encode($image),
        ]);
        return redirect()->back()->with(['message' => 'Thêm thành công!']);
    }

    public function deleteImage(Request $request)
    {
        $up = product::find($request->id);
        $image = json_decode($up->product_img);
        $key = array_search($request->img, $image);
        if ($key > -1) {

            if (count($image) == 1) {
                unset($image);
                product::find($request->id)->update([
                    'product_img' => ''
                ]);
            } else {
                unset($image[$key]);
                product::find($request->id)->update([
                    'product_img' => json_encode($image)
                ]);
            }

            $path = 'upload/' . $request->img;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return 'success';
    }


}
