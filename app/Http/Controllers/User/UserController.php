<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use PHPUnit\Framework\MockObject\Builder\ParametersMatch;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Hàm để lấy và xử lý dữ liệu địa chỉ của người dùng
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    public function register()
    {
        return view('client.account.register');
    }
    public function PostRegister(Request $request)
    {
        // Kiểm tra không để trống các trường bắt buộc và kiểm tra email đã tồn tại
        $request->validate([
            'user_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^.+@.+\..+$/i', $value)) {
                        $fail('Địa chỉ email không hợp lệ.');
                    }
                },
                'unique:users,email',
            ],
            'password' => [
                'required',
                'between:8,15',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ]
        ], [
            'user_name.required' => 'Vui lòng nhập tài khoản.',
            'last_name.required' => 'Vui lòng không để trống Họ.',
            'first_name.required' => 'Vui lòng không để trống Tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.between' => 'Mật khẩu phải có từ 8 đến 15 ký tự.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết thường, một chữ cái viết hoa và một số.'
        ]);

        try {
            // Hash mật khẩu
            $request->merge(['password' => Hash::make($request->password)]);

            // Tạo mới người dùng
            User::create($request->all());

            // Chuyển hướng sau khi tạo thành công
            return redirect()->route('login');
        } catch (\Throwable $th) {
            // Xử lý ngoại lệ nếu có lỗi xảy ra
            dd($th);
        }
    }

    public function login(Request $request)
    {
        $loginAttempts = session('loginAttempts', 0);
        return view('client.account.login', ['loginAttempts' => $loginAttempts]);
    }
    // Phương thức PostLogin
    public function PostLogin(Request $request)
    {
        // Kiểm tra và xác nhận dữ liệu từ form
        $request->validate([
            'user_name' => [ 
                'required',

            ],
            'password' => [
                'required',
            ]
        ], [
            'user_name.required' => 'Vui lòng nhập tài khoản.', // Thay 'email' thành 'user_name'
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);
        // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
        $user = User::where('user_name', $request->user_name)->first(); // Thay 'email' thành 'user_name'

        if (!$user) {
            return redirect()->route('login')->withErrors(['user_name' => 'Tên người dùng không tồn tại.'])->withInput($request->only('user_name')); // Thay 'email' thành 'user_name'
        } else {
            if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) { // Thay 'email' thành 'user_name'
                if (Auth::User()->role_id == '1') {
                    // Nếu đăng nhập thành công, reset số lần nhập sai mật khẩu và session 'user_blocked'
                    $user->login_attempts = 0;
                    $user->save();
                    session()->forget('user_blocked');
                    // Redirect sau khi đăng nhập thành công
                    return redirect()->route('home');
                } else if (Auth::User()->role_id == '2') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return view("client.account.404User");
                }
            } else {
                // Nếu đăng nhập không thành công, cập nhật số lần nhập sai mật khẩu
                $user->increment('login_attempts');

                if ($user->login_attempts >= 5) {
                    // Đặt biến phiên để đánh dấu rằng người dùng đã bị chặn
                    session()->put('user_blocked', true);
                    // Lưu thời gian khóa tài khoản vào session và đặt thời gian khóa là 15 giây
                    session()->put('block_expires', now()->addSeconds(15));
                }

                // Trả về view login với số lần nhập sai mật khẩu
                if ($user->login_attempts >= 5) {
                    return redirect()->route('login')->withErrors(['password' => 'Mật khẩu không chính xác.'])->withInput($request->only('user_name'))->with('loginAttempts', $user->login_attempts); // Thay 'email' thành 'user_name'
                } else {
                    return redirect()->route('login')->withErrors(['password' => 'Mật khẩu không chính xác.'])->withInput($request->only('user_name')); // Thay 'email' thành 'user_name'
                }
            }
        }
    }


    public function resetAttempts(Request $request)
    {
        // Tìm người dùng theo user name
        $user = User::where('user_name', $request->user_name)->first(); // Thay 'email' thành 'user_name'

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.']);
        } else {
            // Cập nhật số lần thử đăng nhập sai cho người dùng và lưu vào cơ sở dữ liệu
            $user->login_attempts = 0;
            $user->save();

            // Trả về phản hồi JSON cho client
            return response()->json(['success' => true]);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('home');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function addaddress(Request $request)
    {
        $request->validate([
            'row3' => 'required',
            'inputAddress' => 'required',
            'district' => 'required',
            'city' => 'required',
            'country' => 'required',
            'inputPostal' => 'required',
        ], [
            'row3.required' => 'Bạn phải chọn một trong hai tùy chọn.',
            'inputAddress.required' => 'Trường địa chỉ không được để trống.',
            'district.required' => 'Trường quận - huyện không được để trống.',
            'city.required' => 'Trường tỉnh - thành phố không được để trống.',
            'country.required' => 'Trường quốc gia không được để trống',
            'inputPostal.required' => 'Trường mã bưu điện không được để trống.',
        ]);

        // Lấy dữ liệu từ các input
        $addressParts = [
            $request->input('inputPostal'),
            $request->input('inputAddress'),
            $request->input('district'),
            $request->input('city'),
            $request->input('country')
        ];

        // Kiểm tra nếu người dùng có nhập tên công ty
        if ($request->input('inputCompanyName')) {
            // Thêm inputCompany vào đầu mảng
            array_unshift($addressParts, $request->input('inputCompanyName'));
        }

        // Ghép các phần tử của mảng thành địa chỉ
        $address = implode('|,|', $addressParts);

        $user = User::find(auth()->id());
        $user->address = $address;
        $user->save();

        return redirect('/address')->with('success', 'Đã thêm địa chỉ mới.');
    }
    public function editAndUpdateAddress(Request $request)
    {
        // Nếu là phương thức PUT, xử lý việc cập nhật địa chỉ
        if ($request->isMethod('put')) {
            if (!$request->filled(['row3', 'inputAddress', 'district', 'city', 'country', 'inputPostal'])) {
                return redirect()->back()->withInput()->withErrors(['errors' => 'Vui lòng điền đầy đủ thông tin.']);
            }
            // Validate form data
            $request->validate([
                'row3' => 'required',
                'inputAddress' => 'required',
                'district' => 'required',
                'city' => 'required',
                'country' => 'required',
                'inputPostal' => 'required',
            ], [
                'row3.required' => 'Vui lòng chọn loại địa chỉ.',
                'inputAddress.required' => 'Vui lòng nhập địa chỉ.',
                'district.required' => 'Vui lòng nhập quận/huyện.',
                'city.required' => 'Vui lòng nhập thành phố/tỉnh.',
                'country.required' => 'Vui lòng nhập quốc gia.',
                'inputPostal.required' => 'Vui lòng nhập mã bưu điện.',
            ]);

            // Lấy thông tin người dùng
            $user = User::find(auth()->id());

            $addressParts = [
                $request->input('inputPostal'),
                $request->input('inputAddress'),
                $request->input('district'),
                $request->input('city'),
                $request->input('country')
            ];

            // Kiểm tra loại địa chỉ là Residential thì gán CompanyName về chuỗi trống
            if ($request->input('row3') !== 'Residential') {
                // Kiểm tra nếu người dùng có nhập tên công ty
                if ($request->input('inputCompanyName')) {
                    // Thêm inputCompany vào đầu mảng
                    array_unshift($addressParts, $request->input('inputCompanyName'));
                }
            }
            // Ghép các phần tử của mảng thành địa chỉ
            $address = implode('|,|', $addressParts);

            $user = User::find(auth()->id());
            $user->address = $address;
            $user->save();

            return redirect('/address')->with('success', 'Đã cập nhật địa chỉ mới.');
        }

        // Nếu là phương thức GET, hiển thị form chỉnh sửa địa chỉ
        $user = User::find(auth()->id()); // Lấy thông tin người dùng hiện tại từ CSDL

        if ($user) {
            $addressString = $user->address; // Lấy chuỗi địa chỉ từ cột address trong bảng user

            // Tách địa chỉ thành các phần tử mảng
            $addressParts = preg_split('/\|,\|/', $addressString, -1, PREG_SPLIT_NO_EMPTY);

            // Khởi tạo biến inputCompanyName
            $inputCompanyName = '';

            // Kiểm tra xem có phần tử tên công ty trong mảng không
            if (count($addressParts) > 5) {
                // Nếu có, lấy và loại bỏ phần tử đầu tiên của mảng để gán vào inputCompanyName
                $inputCompanyName = array_shift($addressParts);
            }

            // Gán các phần tử còn lại của mảng vào các biến tương ứng
            $inputPostal = array_shift($addressParts);
            $inputAddress = array_shift($addressParts);
            $district = array_shift($addressParts);
            $city = array_shift($addressParts);
            $country = implode(', ', $addressParts);

            // Truyền dữ liệu vào view để hiển thị form chỉnh sửa địa chỉ
            return view('client.account.editaddress', [
                'address' => [
                    'inputCompanyName' => $inputCompanyName,
                    'inputPostal' => old('inputPostal', $inputPostal),
                    'inputAddress' => old('inputAddress', $inputAddress),
                    'district' => old('district', $district),
                    'city' => old('city', $city),
                    'country' => old('country', $country)
                ],
                'row3' => $inputCompanyName ? 'Company' : 'Residential'
            ]);
        } else {
            // Trả về thông báo lỗi nếu không tìm thấy người dùng
            return redirect('/address')->with('error', 'Không tìm thấy người dùng.');
        }
    }


    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'phoneNumber' => 'nullable|numeric|digits:10',
        ], [
            'FirstName.required' => 'Vui lòng nhập tên.',
            'LastName.required' => 'Vui lòng nhập họ.',
            'phoneNumber.numeric' => 'Số điện thoại phải là số.',
            'phoneNumber.digits' => 'Số điện thoại phải có 10 chữ số.',
        ]);

        // Lấy thông tin người dùng đã đăng nhập
        $user = auth()->user();

        // Kiểm tra xem số điện thoại có tồn tại trong request không
        if ($request->has('phoneNumber')) {
            $user->phone_number = $request->phoneNumber;
        }

        // Cập nhật thông tin của người dùng từ dữ liệu form
        $user->update([
            'first_name' => $request->FirstName,
            'last_name' => $request->LastName,
        ]);

        // Hiển thị thông báo cập nhật thành công và chuyển hướng về trang profile
        return redirect()->route('profile')->with('success', 'Thông tin cá nhân đã được cập nhật thành công.');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'CurrentPassword' => 'required',
            'NewPassword' => [
                'required',
                'string',
                'between:8,15',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'different:CurrentPassword'
            ],
            'ConfirmNewPassword' => 'required|same:NewPassword',
        ], [
            'CurrentPassword.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'NewPassword.required' => 'Vui lòng nhập mật khẩu mới.',
            'NewPassword.between' => 'Mật khẩu mới phải có từ 8 đến 15 ký tự.',
            'NewPassword.regex' => 'Mật khẩu mới phải chứa ít nhất một số, một chữ cái viết thường và một chữ cái viết hoa.',
            'NewPassword.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại.',
            'ConfirmNewPassword.required' => 'Vui lòng xác nhận mật khẩu mới.',
            'ConfirmNewPassword.same' => 'Mật khẩu xác nhận không khớp với mật khẩu mới.',
        ]);

        // Lấy người dùng đăng nhập
        $user = auth()->user();

        // Kiểm tra tính đúng đắn của mật khẩu hiện tại
        if (!password_verify($request->CurrentPassword, $user->password)) {
            return redirect()->back()->withErrors(['CurrentPassword' => 'Mật khẩu hiện tại không đúng.'])->withInput();
        }

        // Cập nhật mật khẩu mới
        $user->update([
            'password' => Hash::make($request->NewPassword),
        ]);

        // Hiển thị thông báo thành công và chuyển hướng về trang đăng nhập
        // Chặn mã chạy tiếp sau khi chuyển hướng
        echo '<script>alert("Mật khẩu đã được cập nhật thành công.");</script>';
        echo '<script>window.location.href = "' . route('logout') . '";</script>';
        exit;
        // return redirect()->route('login')->with('success', 'Mật khẩu đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
