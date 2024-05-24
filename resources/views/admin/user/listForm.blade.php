@extends('admin.layout')

@section('title', 'User Form')

@section('content')
    <a href="{{ route('admin.user.list.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">{{$title}} người dùng </div>
        <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">User name</label>
                    <input class="form-control" type="text" id="username" name="username" value=""
                        placeholder="Nhập tên user">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="text" id="password" name="password" value=""
                        placeholder="Nhập mật khẩu">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="firtname" class="form-label">Firt Name</label>
                    <input class="form-control" type="text" name="firtname" id="firtname" value=""
                        placeholder="Nhập họ">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastname" id="lastname" value=""
                        placeholder="Nhập tên">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="text" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value=""
                        placeholder="Nhập email">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">VN (+84)</span>
                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                            placeholder="202 555 0111" fdprocessedid="d7miah">
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                        fdprocessedid="7keuq">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Country</label>
                    <select id="country" class="select2 form-select" fdprocessedid="0xyw5r">
                        <option value="">Select</option>
                        <option value="Australia">Australia</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Canada">Canada</option>
                        <option value="China">China</option>
                        <option value="France">France</option>
                        <option value="Germany">Germany</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Japan">Japan</option>
                        <option value="Korea">Korea, Republic of</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Russia">Russian Federation</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="status" class="form-label">status</label>
                    <select id="status" class="select2 form-select" fdprocessedid="mx0bgf">
                        <option value="">Select status</option>
                        <option value="admin">Admin</option>
                        <option value="vender">Vender</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="status" class="form-label">Role</label>
                    <select id="status" class="select2 form-select" fdprocessedid="mx0bgf">
                        <option value="">Select status</option>
                        <option value="admin">Admin</option>
                        <option value="vender">Vender</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary" fdprocessedid="wrcwi8">Cancel</button>
            </div>
        </form>
    </div>
@endsection
