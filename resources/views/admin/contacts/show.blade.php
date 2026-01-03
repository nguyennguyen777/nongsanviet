@extends('admin.layout')

@section('title', 'Chi tiết liên hệ')
@section('page-title', 'Chi tiết liên hệ')

@section('content')
<div class="content-box">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: #2c3e50;">Thông tin liên hệ</h2>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                  method="POST" 
                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa liên hệ này?');"
                  style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Xóa
                </button>
            </form>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div>
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Thông tin người liên hệ
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label style="font-weight: 600; color: #2c3e50; display: block; margin-bottom: 5px;">Họ và tên:</label>
                <p style="padding: 10px; background: #f8f9fa; border-radius: 5px; margin: 0;">{{ $contact->name }}</p>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="font-weight: 600; color: #2c3e50; display: block; margin-bottom: 5px;">Email:</label>
                <p style="padding: 10px; background: #f8f9fa; border-radius: 5px; margin: 0;">
                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                </p>
            </div>

            @if($contact->phone)
            <div style="margin-bottom: 20px;">
                <label style="font-weight: 600; color: #2c3e50; display: block; margin-bottom: 5px;">Điện thoại:</label>
                <p style="padding: 10px; background: #f8f9fa; border-radius: 5px; margin: 0;">
                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                </p>
            </div>
            @endif

            @if($contact->address)
            <div style="margin-bottom: 20px;">
                <label style="font-weight: 600; color: #2c3e50; display: block; margin-bottom: 5px;">Địa chỉ:</label>
                <p style="padding: 10px; background: #f8f9fa; border-radius: 5px; margin: 0;">{{ $contact->address }}</p>
            </div>
            @endif

            @if($contact->services)
            <div style="margin-bottom: 20px;">
                <label style="font-weight: 600; color: #2c3e50; display: block; margin-bottom: 5px;">Dịch vụ quan tâm:</label>
                <p style="padding: 10px; background: #f8f9fa; border-radius: 5px; margin: 0;">{{ $contact->services }}</p>
            </div>
            @endif
        </div>

        <div>
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Thông tin bổ sung
            </h3>

            <div style="margin-bottom: 20px;">
                <label style="font-weight: 600; color: #2c3e50; display: block; margin-bottom: 5px;">Ngày gửi:</label>
                <p style="padding: 10px; background: #f8f9fa; border-radius: 5px; margin: 0;">
                    {{ $contact->created_at->format('d/m/Y H:i:s') }}
                </p>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="font-weight: 600; color: #2c3e50; display: block; margin-bottom: 5px;">Nội dung tin nhắn:</label>
                <div style="padding: 15px; background: #f8f9fa; border-radius: 5px; min-height: 200px; white-space: pre-wrap;">{{ $contact->message }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

