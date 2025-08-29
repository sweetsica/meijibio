<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // --- Thông tin tài khoản chính ---
            $table->integer('getfly_id')->nullable()->comment('ID khách hàng');
            $table->string('danh_muc_data_dau_vao')->nullable()->comment('Danh mục data đầu vào');
            $table->string('nguon')->nullable()->comment('Nguồn');
            $table->string('mang_kinh_doanh')->nullable()->comment('Mảng kinh doanh');
            $table->string('nhom_nguon')->nullable()->comment('Nhóm nguồn');
            $table->string('camp')->nullable()->comment('Camp');
            $table->string('thong_tin_chung')->nullable()->comment('Thông tin chung');
            $table->tinyInteger('gender')->nullable()->comment('0 = unknown, 1 = male, 2 = female');
            $table->string('account_name')->nullable()->comment('Tên khách hàng');
            $table->string('account_code')->nullable()->index()->comment('Mã khách hàng (VD: KH/2025/000007)');
            $table->string('phone_office')->nullable()->comment('Điện thoại');
            $table->string('email')->nullable()->comment('Email');
            $table->string('phan_loai_bo_sung')->nullable()->comment('Phân loại bổ sung');
            $table->date('birthday')->nullable()->comment('Sinh nhật');
            $table->unsignedSmallInteger('tuoi')->nullable()->comment('Tuổi');
            $table->string('billing_address_street')->nullable()->comment('Địa chỉ');
            $table->unsignedBigInteger('country_id')->nullable()->comment('Quốc gia');
            $table->string('province_name')->nullable()->comment('Tỉnh/thành phố');
            $table->string('district_name')->nullable()->comment('Quận/huyện');
            $table->string('ward_name')->nullable()->comment('Phường/Xã');
            $table->string('industry')->nullable()->comment('Nghề nghiệp');
            $table->string('lieu_phap')->nullable()->comment('Liệu pháp');
            $table->text('insight')->nullable()->comment('Insight');
            $table->string('link_mxh')->nullable()->comment('Link MXH');
            $table->unsignedBigInteger('relation_id')->nullable()->comment('Mối quan hệ');

            // --- Tele ---
            $table->string('benh_ly')->nullable()->comment('Bệnh lý');
            $table->string('dich_vu_quan_tam')->nullable()->comment('Dịch vụ quan tâm');
            $table->string('tai_chinh')->nullable()->comment('Tài chính');
            $table->date('ngay_booking_du_kien')->nullable()->comment('Ngày booking dự kiến');
            $table->string('booking')->nullable()->comment('Booking');

            // --- BO ---
            $table->integer('cham_diem')->nullable()->comment('Chấm điểm');

            // --- Show ---
            $table->string('dich_vu_thuc_hien')->nullable()->comment('Dịch vụ thực hiện');
            $table->string('bac_si_tu_van')->nullable()->comment('Bác sĩ tư vấn');
            $table->string('chuyen_vien_tu_van')->nullable()->comment('Chuyên viên tư vấn');
            $table->string('phan_loai_show')->nullable()->comment('Phân loại show');
            $table->text('lich_su_tu_van')->nullable()->comment('Lịch sử tư vấn');

            // --- DD ---
            $table->string('hop_dong')->nullable()->comment('Hợp đồng');
            $table->string('dich_vu')->nullable()->comment('Dịch vụ');
            $table->decimal('tong_gia_tri', 15, 2)->nullable()->comment('Tổng giá trị');
            $table->decimal('cong_no', 15, 2)->nullable()->comment('Công nợ');
            $table->date('ngay_thu_du_kien')->nullable()->comment('Ngày thu dự kiến');
            $table->decimal('tien_thu_du_kien', 15, 2)->nullable()->comment('Tiền thu dự kiến');
            $table->date('ngay_thu_thuc_te')->nullable()->comment('Ngày thu thực tế');
            $table->decimal('tien_thu_thuc_te', 15, 2)->nullable()->comment('Tiền thu thực tế');

            // --- Custom Fields ---
            $table->json('custom_fields')->nullable()->comment('Custom fields');
            $table->json('contacts')->nullable()->comment('Contacts');
            $table->json('accessible_user_ids')->nullable()->comment('Accessible user IDs');

            // --- AF ---
            $table->string('phan_loai')->nullable()->comment('Phân loại');
            $table->string('dich_vu_af')->nullable()->comment('Dịch vụ (AF)');
            $table->text('lich_su_tu_van_af')->nullable()->comment('Lịch sử tư vấn (AF)');

            // --- Booking ---
            $table->string('dich_vu_booking')->nullable()->comment('Booking thăm khám');
            $table->integer('so_luong_booking')->nullable()->comment('Số lượng booking');
            $table->date('ngay_du_kien_su_dung')->nullable()->comment('Ngày dự kiến sử dụng');
            $table->date('ngay_thuc_te_su_dung')->nullable()->comment('Ngày thực tế sử dụng');
            $table->string('dia_diem_su_dung')->nullable()->comment('Địa điểm sử dụng');
            $table->string('nguoi_thuc_hien')->nullable()->comment('Người thực hiện');
            $table->text('feedback_booking')->nullable()->comment('Feedback booking');

            // --- Ref ---
            $table->unsignedBigInteger('referrer_id')->nullable()->comment('Người giới thiệu');
            $table->string('chinh_sach_ref')->nullable()->comment('Chính sách người giới thiệu');
            $table->string('dich_vu_ref')->nullable()->comment('Dịch vụ (Ref)');
            $table->decimal('gia_tri_ref', 15, 2)->nullable()->comment('Giá trị Ref');

            // --- Thông tin khác ---
            $table->text('description')->nullable()->comment('Feedback chung');
            $table->unsignedBigInteger('creator_id')->nullable()->comment('Người tạo');
            $table->string('account_manager')->nullable()->comment('Người phụ trách');
            $table->string('last_contact_name')->nullable()->comment('Người liên hệ chính');
            $table->string('last_contact_phone')->nullable()->comment('Điện thoại người liên hệ chính');
            $table->string('last_contact_email')->nullable()->comment('Email người liên hệ chính');
            $table->string('last_contact_title')->nullable()->comment('Chức vụ liên hệ chính');
            $table->date('last_contact_birthdate')->nullable()->comment('Sinh nhật liên hệ chính');
            $table->string('sic_code')->nullable()->comment('Mã số thuế');
            $table->tinyInteger('last_contact_gender')->nullable()->comment('Giới tính người liên hệ');
            $table->string('publisher_code')->nullable()->comment('Mã tiếp thị liên kết');
            $table->timestamp('last_active')->nullable()->comment('Liên hệ lần cuối');
            $table->text('last_comment')->nullable()->comment('Trao đổi gần nhất');
            $table->integer('total_activity')->nullable()->comment('Tổng số tương tác');
            $table->decimal('total_f_amount', 15, 2)->nullable()->comment('Giá trị');
            $table->string('last_contact_honorific')->nullable()->comment('Danh xưng người liên hệ chính');
            $table->integer('total_point_bonus')->nullable()->comment('Điểm thưởng');
            $table->string('website')->nullable()->comment('Website');
            $table->decimal('total_revenue', 15, 2)->nullable()->comment('Tổng doanh thu');
            $table->integer('count_order')->nullable()->comment('Số đơn hàng');
            $table->string('thumbnail_logo')->nullable()->comment('Logo');
            
            // $table->decimal('latitude', 10, 7)->nullable()->comment('Vĩ độ');
            // $table->decimal('longitude', 10, 7)->nullable()->comment('Kinh độ');
            // $table->string('phone_fax')->nullable()->comment('Fax');
            // $table->string('data_dau_vao')->nullable()->comment('Data đầu vào');
            // $table->string('account_type')->nullable()->comment('Nhóm khách hàng');
            // $table->string('account_source')->nullable()->comment('Phân loại khách hàng');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
