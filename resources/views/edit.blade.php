{{-- @extends('layouts.app') --}}
@extends('layout')
@section('title')
    Edit Page
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
                    <div class="card-header text-center text-nowrap">แก้ไขข้อมูล</div>

                    <div class="card-body">
                        <form action="{{ url('update/' . $userId->id) }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <div class="row mb-3">

                                {{-- Fill firstname --}}
                                <label for="firstname"
                                    class="col-lg-1 col-form-label text-lg-start text-nowrap">{{ __('ชื่อ') }}</label>

                                <div class="col-lg-5 ">
                                    <input id="firstname" type="text"
                                        class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                        value="{{ $userId->firstname }}" required autocomplete="firstname" autofocus>
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
                                        value="{{ $userId->lastname }}" required autocomplete="lastname" />
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
                                        value="{{ $userId->address }}" required autocomplete="address">
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

                                    <select name="province" id="province" type="text"
                                        class="form-select form-control @error('provinces') is-invalid @enderror" required
                                        autofocus value="{{ $userId->province }}">

                                        <option value="{{ $userId->name }}">{{ $userId->province }}</option>

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

                                    <select name="amphoe" id="amphoe" autofocus value="{{ $userId->amphoe }}"
                                        class="form-select form-control @error('amphoe') is-invalid @enderror" required>

                                        <option value="{{ $userId->amphoe }}">{{ $userId->amphoe }}</option>

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
                                    <select name="tambon" id="tambon" autofocus value="{{ $userId->tambon }}"
                                        class="form-select form-control @error('tambon') is-invalid @enderror" required>

                                        <option value="{{ $userId->tambon }}">{{ $userId->tambon }}</option>

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
                                        class="form-select form-control @error('zipcode') is-invalid @enderror"
                                        value="{{ $userId->zipcode }}">

                                    @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <div class="valid-feedback"></div>
                                    @enderror
                                </div>

                                <label for="tel"
                                    class="col-lg-2 col-form-label text-lg-start text-nowrap">{{ __('เบอร์โทรศัพท์') }}</label>

                                <div class="col-lg-4">
                                    <input id="tel" type="tel" class="form-control" name="tel" required
                                        autocomplete="tel" maxlength="10" value="{{ $userId->tel }}">
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
                                        autocomplete="email" value="{{ $userId->email }}">
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
                                        autocomplete="new-password" value="{{ $userId->password }}">
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
                                        {{ __('อัปเดทข้อมูล') }}
                                    </button>
                                    <a href="/member" class="btn btn-danger">
                                        {{ __('ยกเลิก') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="{{ URL::asset('/js/LocationFilter.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", async () => {

            let userZipcode = "{{ $userId->zipcode }}";
            let userTambon = "{{ $userId->tambon }}";
            let userAmphoe = "{{ $userId->amphoe }}";
            let userProvince = "{{ $userId->province }}";

            // โหลดรายการจังหวัดก่อน ตั้งค่า value ของจังหวัดหลังจากที่ข้อมูลโหลดเสร็จ

            // แสดงรหัสไปรษณีย์
            await showZipcode();
            document.querySelector("#zipcode").value = userZipcode;

            // โหลดรายการตำบล หลังจากตั้งค่า amphoe
            await showTambons();
            document.querySelector("#tambon").value = userTambon;

            // โหลดรายการอำเภอ หลังจากตั้งค่า province
            await showAmphoes();
            document.querySelector("#amphoe").value = userAmphoe;

            await showProvinces();
            document.querySelector("#province").value = userProvince;

        });

        async function showProvinces() {
            let input_province = document.querySelector("#province");
            let url = "https://ckartisan.com/api/provinces";
            try {
                let response = await fetch(url);
                let result = await response.json();

                input_province.innerHTML = '<option value=""></option>';
                result.forEach((item) => {
                    let option = document.createElement("option");
                    option.text = item.province;
                    option.value = item.province;
                    input_province.appendChild(option);
                });
            } catch (error) {
                console.error("Error loading provinces:", error);
            }
        }

        async function showAmphoes() {
            let input_province = document.querySelector("#province");
            let url = "https://ckartisan.com/api/amphoes?province=" + input_province.value;
            try {
                let response = await fetch(url);
                let result = await response.json();

                let input_amphoe = document.querySelector("#amphoe");
                input_amphoe.innerHTML = '<option value=""></option>';
                result.forEach((item) => {
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    input_amphoe.appendChild(option);
                });

                // ตั้งค่า value ของอำเภอหลังจากข้อมูลโหลดเสร็จ
                let userAmphoe = "{{ $userId->amphoe }}";
                input_amphoe.value = userAmphoe;
            } catch (error) {
                console.error("Error loading amphoes:", error);
            }
        }

        async function showTambons() {
            let input_province = document.querySelector("#province");
            let input_amphoe = document.querySelector("#amphoe");
            let url = "https://ckartisan.com/api/tambons?province=" + input_province.value + "&amphoe=" + input_amphoe
                .value;
            try {
                let response = await fetch(url);
                let result = await response.json();

                let input_tambon = document.querySelector("#tambon");
                input_tambon.innerHTML = '<option value=""></option>';
                result.forEach((item) => {
                    let option = document.createElement("option");
                    option.text = item.tambon;
                    option.value = item.tambon;
                    input_tambon.appendChild(option);
                });

                // ตั้งค่า value ของตำบลหลังจากข้อมูลโหลดเสร็จ
                let userTambon = "{{ $userId->tambon }}";
                input_tambon.value = userTambon;
            } catch (error) {
                console.error("Error loading tambons:", error);
            }
        }

        async function showZipcode() {
            let input_province = document.querySelector("#province");
            let input_amphoe = document.querySelector("#amphoe");
            let input_tambon = document.querySelector("#tambon");
            let url = "https://ckartisan.com/api/zipcodes?province=" + input_province.value + "&amphoe=" + input_amphoe
                .value + "&tambon=" + input_tambon.value;
            try {
                let response = await fetch(url);
                let result = await response.json();

                let input_zipcode = document.querySelector("#zipcode");
                input_zipcode.value = result.length > 0 ? result[0].zipcode : "";
            } catch (error) {
                console.error("Error loading zipcode:", error);
            }
        }
    </script>
@endsection
