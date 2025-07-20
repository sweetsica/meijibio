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
            $table->string('account_name')->nullable();        // Tên khách hàng
            $table->string('account_code')->nullable()->index();        // Mã khách hàng (VD: KH/2025/000007)
            $table->tinyInteger('gender')->nullable();         // 0 = unknown, 1 = male, 2 = female
            $table->json('account_type')->nullable();          // Loại tài khoản (mảng ID)
            $table->json('account_source')->nullable();        // Nguồn khách hàng (mảng ID)
            $table->date('birthday')->nullable();
            $table->string('billing_address_street')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->json('industry')->nullable();              // Ngành nghề (mảng ID)
            $table->unsignedBigInteger('relation_id')->nullable(); // ID quan hệ
            $table->text('description')->nullable();
            $table->unsignedBigInteger('account_manager')->nullable(); // Nhân viên quản lý
            $table->string('sic_code')->nullable();

            // --- Thông tin mở rộng (custom_fields) ---
            $table->integer('input_data')->nullable();               // data_dau_vao
            $table->string('additional_classification')->nullable(); // phan_loai_bo_sung
            $table->integer('age')->nullable();                       // tuoi
            $table->json('therapies')->nullable();                    // lieu_phap
            $table->string('insight')->nullable();
            $table->string('social_links')->nullable();               // link_mxh
            $table->json('medical_conditions')->nullable();           // benh_ly
            $table->string('interested_service')->nullable();         // dich_vu_quan_tam
            $table->integer('financial_status')->nullable();          // tai_chinh
            $table->timestamp('expected_booking_date')->nullable();   // ngay_booking_du_kien
            $table->integer('booking')->nullable();
            $table->string('score')->nullable();                      // cham_diem
            $table->string('performed_service')->nullable();          // dich_vu_thuc_hien
            $table->string('consulting_doctor')->nullable();          // bac_si_tu_van
            $table->string('consulting_staff')->nullable();           // chuyen_vien_tu_van
            $table->string('classification_display')->nullable();     // phan_loai_show
            $table->text('consulting_history')->nullable();           // lich_su_tu_van
            $table->string('contract')->nullable();                   // hop_dong
            $table->json('services')->nullable();                     // dich_vu
            $table->string('total_value')->nullable();                // tong_gia_tri
            $table->string('debt')->nullable();                       // cong_no
            $table->timestamp('expected_collection_date')->nullable();// ngay_thu_du_kien
            $table->string('expected_revenue')->nullable();           // tien_thu_du_kien
            $table->timestamp('actual_collection_date')->nullable();  // ngay_thu_thuc_te
            $table->string('actual_revenue')->nullable();             // tien_thu_thuc_te
            $table->string('classification')->nullable();             // phan_loai
            $table->string('after_service')->nullable();              // dich_vu_af
            $table->text('after_consulting_history')->nullable();     // lich_su_tu_van_af
            $table->json('booking_services')->nullable();             // dich_vu_booking
            $table->string('booking_quantity')->nullable();           // so_luong_booking
            $table->timestamp('expected_usage_date')->nullable();     // ngay_du_kien_su_dung
            $table->timestamp('actual_usage_date')->nullable();       // ngay_thuc_te_su_dung
            $table->string('usage_location')->nullable();             // dia_diem_su_dung
            $table->string('executor')->nullable();                   // nguoi_thuc_hien
            $table->text('booking_feedback')->nullable();             // feedback_booking
            $table->string('ref_policy')->nullable();                 // chinh_sach_ref
            $table->string('ref_service')->nullable();                // dich_vu_ref
            $table->string('ref_value')->nullable();                  // gia_tri_ref

            // --- Thêm các trường mã và trạng thái (yêu cầu cũ) ---
            $table->string('getfly_code')->nullable()->index();;
            $table->string('ebiz_code')->nullable()->index();;
            $table->string('pmkb_code')->nullable()->index();;
            $table->string('status')->nullable();

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
