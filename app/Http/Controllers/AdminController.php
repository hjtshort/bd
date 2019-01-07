<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImage;
use App\Http\Requests\CreateProduct;
use App\models\direction;
use App\models\roles;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\CreateUserRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\models\city;
use App\models\district;
use App\models\property;
use App\models\type;
use App\models\product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Stmt\TryCatch;

class AdminController extends Controller
{
    public function getLogin()
    {

        return view('admin.login');
    }

    public function postLogin(AdminRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],false)) {
            return redirect()->route('index');
        } else
            return redirect()->back()->with(['mess_error' => 'Email hoặc mật khẩu không đúng!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

    public function index()
    {

        $data['user'] = User::where('isAdmin', 0)->get();
        return view('admin.component.dashboard', $data);
    }

    public function city()
    {

        return view('admin.component.city');
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
                return Response()->json(['message' => "Đã thêm {$request->city_name}", 'status' => true]);
            } catch (\Illuminate\Database\QueryException $e) {
                return Response()->json(['message' => "Thêm thất bại vui lòng thử lại sau", 'status' => false]);
            }

        }
    }

    public function updateCity(Request $request)
    {
        $info = city::find($request->id);

        $valid = Validator::make($request->all(), [
            'city_name' => 'required|unique:city,city.city_name,' . $request->id,
            'city_alias' => 'required'
        ]);
        if ($valid->fails()) {
            return response()->json(['message' => $valid->errors()->first(), 'valid' => false, 'status' => false]);
        } else {
            try {
                $info->update([
                    'city_name' => $request->city_name,
                    'city_alias' => $request->city_alias
                ]);
                return response()->json(['message' => 'Đã cập nhật', 'valid' => true, 'status' => true]);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['message' => 'Cập nhật thất bại. Vui lòng thử vậy sau', 'valid' => true, 'status' => false]);
            }
        }

    }

    public function deleteCity(Request $request)
    {
        try {
            city::find($request->id)->delete();
            return Response()->json(['message' => 'Đã xóa!', 'status' => true]);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response()->json(['message' => 'Xóa thất bại vui lòng thử lại', 'status' => false]);
        }
    }

    public function getInfoCity(Request $request)
    {
        return City::findOrFail($request->id);
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
            return response()->json(['message' => $valid->errors()->first(), 'status' => false]);
        }
        try {
            district::find($request->id)->update([
                'city_id' => $request->city_id,
                'district_name' => $request->district_name
            ]);
            return response()->json(['message' => 'Đã chỉnh sửa', 'valid' => true, 'status' => true]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['message' => 'Chỉnh sửa thất bại vui lòng thử lại sau', 'valid' => true, 'status' => false]);
        }
    }

    public function deleteDistrict(Request $request)
    {

        try {
            district::findOrFail($request->id)->delete();
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

        $product = product::create([
            'product_title' => $request->product_title,
            'district_id' => $request->district_id,
            'type_id' => $request->type_id,
            'property_id' => $request->property_id,
            'product_info' => $request->product_info,
            'product_acreage' => $request->product_acreage,
            'product_price' => $request->product_price,
            'product_fast' => $request->product_fast,
            'direction_id' => $request->direction_id,
            'product_address' => $request->product_address,
            'user_id' => Auth::user()->id,
        ]);
        if ($product) {
            return redirect()->route('product')->with(['message' => 'Đã thêm']);
        } else {
            return back()->with(['error' => 'Thêm thất bại']);
        }
    }

    public function product(Request $request)
    {
        $data['city'] = city::all();
        $data['req_district'] = $request->district;
        $data['req_property'] = $request->property;
        $data['property'] = property::all();
        $product = new product();
        $url = '';
        if ($request->district && $request->district != '') {

            $product = $product->where('district_id', '=', $request->district);
            $url = '&district=' . $request->district;
        }
        if ($request->property && $request->property != '') {
            $product = $product->where('property_id', '=', $request->property);
            $url = '&property=' . $request->property;
        }
        if ($request->search && $request->search != '') {
            $product = $product->where('product_title', 'like', '%' . $request->search . '%');
            $url = '&search=' . $request->search;
        }

        $data['product'] = $product->paginate(20)->withPath($url);
        return view('admin.component.product', $data);
    }

    public function image($id)
    {
        $value = product::findOrFail($id)->product_img;
        $data['image'] = array();
        $data['id'] = $id;
        if ($value != '') {
            $data['image'] = json_decode($value);

        }

        return view('admin.component.product-image', $data);
    }

    public function postCreateImage(CreateImage $request, $id)
    {
        if (!is_dir('upload')) {
            mkdir('upload', 0777);
        }
        $file = $request->file('image');
        $name = rand(11111, 99999) . '.' . $file->getClientOriginalName();
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

    public function editProduct($id)
    {
        $data['info'] = product::findOrFail($id);
        $data['city'] = city::all();
        $data['property'] = property::all();
        $data['type'] = type::all();
        $data['direction'] = direction::all();
        $data['district'] = district::where('city_id', $data['info']->getDistrict->city_id)->get();
//        return $data['district'];
        return view('admin.component.edit-product', $data);
    }

    public function postEditProduct(CreateProduct $request, $id)
    {
        $check = product::findOrFail($id)->update([
            'product_title' => $request->product_title,

            'product_slug' => null,
            'district_id' => $request->district_id,
            'type_id' => $request->type_id,
            'property_id' => $request->property_id,
            'product_info' => $request->product_info,
            'product_acreage' => $request->product_acreage,
            'product_price' => $request->product_price,
            'product_fast' => $request->product_fast,
            'direction_id' => $request->direction_id,
            'product_address' => $request->product_address,
            'user_id' => Auth::user()->id,
        ]);
        if ($check) {
            return redirect()->route('product')->with(['message' => 'Đã chỉnh sửa!']);
        } else {
            // return back()->with([])
        }


    }

    public function deleteProduct(Request $request)
    {
        if ($request->action == 1) {
            $check = product::withTrashed()->findOrFail($request->id)->restore();
        } else {
            $check = product::withTrashed()->findOrFail($request->id)->delete();
        }
        if ($check) {
            return Response()->json(['message' => 'Đã cập nhật', 'status' => true]);
        } else {
            return Response()->json(['message' => 'Cập nhật thất bại', 'status' => true]);
        }
    }

    public function getCreateUser()
    {
        return view('admin.component.create-user');
    }

    public function postCreateUser(CreateUserRequest $request)
    {
        $name = $request->file('image')->store('avatar', ['disk' => 'public']);
        $check = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'sex' => $request->sex,
            'password' => bcrypt($request->password),
            'avatar' => $name,
        ]);
        if ($check) {
            return redirect()->route('index')->with(['message' => 'Đã thêm']);
        } else {
            return back()->with(['error' => 'Thêm thất bại vui lòng thử lại sau', 'status' => true]);
        }
    }

    public function getInfoDistrict(Request $request)
    {
        return district::findOrFail($request->id);
    }

    public function getUser(Request $request)
    {
        $data['role'] = roles::all();
        return view('admin.component.user',$data);
    }

    public function deleteUser(Request $request)
    {
        if ($request->action == 1) {
            $check = User::withTrashed()->findOrFail($request->id)->restore();
        } else {
            $check = User::withTrashed()->findOrFail($request->id)->delete();
        }

        if ($check) {
            return Response()->json(['message' => 'Đã xóa', 'status' => true]);
        } else {
            return Response()->json(['message' => 'Xóa thất bại vui lòng thử lại sau', 'status' => false]);
        }
    }
    public function postSetRole(Request $request)
    {
        User::findOrFail($request->id)->update([
            'permission'=>json_encode($request->role_alias)
        ]);
        return Response::json(['message'=>'Đã cập nhật','status'=>true]);
    }
}
