{{-- @extends('layouts.app') --}}
@extends('layout')
@section('title')
    Register
@endsection

@section('content')
    <!-- HTML Form Elements -->
    <div class="container">
        <!-- ...Your form elements here... -->
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center text-nowrap">{{ __('ลงทะเบียนสมาชิก') }}</div>

                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <div class="row mb-3">

                                {{-- Fill firstname --}}
                                <label for="firstname"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('ชื่อ') }}</label>

                                <div class="col-lg-5 ">
                                    <input id="firstname" type="text"
                                        class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                        value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                        <div class="invalid-feedback">กรุณากรอกชื่อ</div>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>

                                {{-- Fill lastname --}}
                                <label for="lastname"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('นามสกุล') }}</label>

                                <div class="col-lg-5 ">
                                    <input id="lastname" type="text" autofocus
                                        class="form-control  @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required autocomplete="lastname" />
                                        <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Fill address --}}
                            <div class="row mb-3">
                                <label for="address"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('ที่อยู่') }}</label>

                                <div class="col-lg-11">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address">
                                        <div class="invalid-feedback">กรุณากรอกที่อยู่</div>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Select provinces --}}
                            <div class="row mb-3">
                                <label for="provinces"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap ">{{ __('จังหวัด') }}</label>

                                <div class="col-lg-3">

                                    <select name="province" id="province"
                                        class="form-select form-control @error('provinces') is-invalid @enderror" required
                                        autofocus>

                                        <option value="">

                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกจังหวัด</div>

                                    @error('provinces')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <div class="valid-feedback"></div>
                                    @enderror
                                </div>

                                {{-- Select districts --}}
                                <label for="amphoe"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('อำเภอ') }}</label>

                                <div class="col-lg-3">

                                    <select name="amphoe" id="amphoe" autofocus
                                        class="form-select form-control @error('amphoe') is-invalid @enderror" required>

                                        <option value=""></option>

                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกอำเภอ</div>

                                    @error('amphoe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <div class="valid-feedback"></div>
                                    @enderror
                                </div>

                                {{-- Select sub_districts --}}

                                <label for="tambon"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('ตำบล') }}</label>

                                <div class="col-lg-3">
                                    <select name="tambon" id="tambon" autofocus
                                        class="form-select form-control @error('tambon') is-invalid @enderror"
                                        required>

                                        <option value=""></option>

                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกตำบล</div>
                                    @error('tambon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <div class="valid-feedback"></div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Fill postcode --}}
                            <div class="row mb-3">
                                <label for="zipcode"
                                    class="col-lg-2 col-form-label text-lg-start text-nowrap ">{{ __('รหัสไปรษณีย์') }}</label>

                                <div class="col-lg-4">

                                    <input name="zipcode" id="zipcode" type="text" autofocus maxlength="5"
                                        class=" form-control @error('zipcode') is-invalid @enderror" >

                                    @error('zipcode')

                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                    @enderror

                                </div>

                                <label for="tel"
                                    class="col-lg-2 col-form-label text-lg-start text-nowrap">{{ __('เบอร์โทรศัพท์') }}</label>

                                <div class="col-lg-4">
                                    <input id="tel" type="tel" class="form-control" name="tel" required
                                        autocomplete="tel" maxlength="10">
                                        <div class="invalid-feedback">กรุณากรอกเบอร์โทรศัพท์</div>
                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('อีเมล์') }}</label>

                                <div class="col-lg-5">
                                    <input id="email" type="email" class="form-control" name="email" required
                                        autocomplete="email">
                                        <div class="invalid-feedback">กรุณาอีเมล์</div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="password"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('รหัสผ่าน') }}</label>

                                <div class="col-lg-5">
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="new-password">
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน ไม่ต่ำกว่า 8 ตัวอักษร</div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <div class="valid-feedback"></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-lg-12 text-end text-nowrap">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ลงทะเบียน') }}
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="{{ URL::asset('/js/LocationFilter.js') }}"></script>

@endsection
