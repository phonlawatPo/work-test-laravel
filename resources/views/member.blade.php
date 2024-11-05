@extends('layout')
@section('title')
    รายชื่อสมาชิก
@endsection
@section('content')

    @if (session('message') !== null)
        <div class="alert alert-success alert-dismissible fade show notify-animate" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-4 shadow-lg">

        {{-- Search Bar --}}
        <div style="display: flex; justify-content:space;">
            <div class="input-group mb-3">
                <form action="{{ route('users_search') }}" method="get"
                    style="display: flex; gap: 0.5em; min-width: 400px;">
                    <input type="text" name="search" class="form-control w-100" placeholder="ช่องค้นหา" aria-label=""
                        aria-describedby="basic-addon2" value="{{ old('search', $search) }}">
                    <div class="input-group-append" style="display: contents;">
                        <button class="btn btn-secondary ml-1" type="submit" onclick=""><svg
                                xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e8eaed">
                                <path
                                    d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                            </svg></button>
                    </div>
                </form>
            </div>

            <div>
                <a href="{{ route('add_user') }}" class="btn btn-primary" style="width: 150px;">
                    เพิ่มสมาชิก
                </a>
            </div>
        </div>



        {{-- Table display users --}}
        <table class="table caption-top rounded">


            @if (count($results) > 0)
                <caption>รายชื่อสมาชิกทั้งหมด</caption>

                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="">ชื่อ</th>
                        <th scope="col" class="">นามสกุล</th>
                        <th scope="col" class="">เบอร์โทร</th>
                        <th scope="col" class="">อีเมล์</th>
                        <th scope="col" class="">ที่อยู่</th>
                        <th scope="col" class=""></th>
                        <th scope="col" class=""></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td scope="row">{{ $result->firstname }}</td>
                            <td>{{ $result->lastname }}</td>
                            <td>{{ $result->tel }}</td>
                            <td>{{ $result->email }}</td>
                            <td>{{ $result->address }}</td>
                            <td><a href="{{ route('edit', $result->id) }}" class="btn btn-warning">แก้ไข</a></td>
                            <td><a href="{{ route('delete', $result->id) }}" class="btn btn-danger"
                                    onclick="return confirm('คุณต้องการลบสมาชิก {{ $result->firstname }} หรือไม่?')">ลบ</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <p class="h-2 text-danger">ไม่พบข้อมูล</p>
                <div class="center-anything">
                    <img src="https://feniuniversity.ac.bd/public/images/nodatafound.png" alt="No data found."
                        class="" style="height: auto; width:70%;">
                </div>
            @endif


        </table>
    </div>

    {{-- Pagination --}}
    {{ $results->links() }}
@endsection
