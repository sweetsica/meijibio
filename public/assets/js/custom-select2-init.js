// Custom Select2 initialization for searchable dropdowns
// This file contains project-specific select2 initializations

$(document).ready(function() {
    // Initialize default selectors and custom field selectors with search functionality
    $("[data-select2-selector='default'], [data-select2-selector='account_relation_detail'], [data-select2-selector='data-in'], [data-select2-selector='source'], [data-select2-selector='business'], [data-select2-selector='group'], [data-select2-selector='gender'], [data-select2-selector='benh_ly'], [data-select2-selector='tai_chinh'], [data-select2-selector='booking'], [data-select2-selector='dich_vu_thuc_hien'], [data-select2-selector='bac_si_tu_van'], [data-select2-selector='chuyen_vien_tu_van'], [data-select2-selector='phan_loai_show'], [data-select2-selector='dich_vu'], [data-select2-selector='phan_loai'], [data-select2-selector='dich_vu_booking'], [data-select2-selector='dia_diem_su_dung'], [data-select2-selector='ward_id'], [data-select2-selector='province_id'], [data-select2-selector='district_id']").select2({
        theme: "bootstrap-5",
        allowClear: true,
        placeholder: "Chọn...",
        language: {
            noResults: function() {
                return "Không tìm thấy kết quả";
            },
            searching: function() {
                return "Đang tìm kiếm...";
            }
        }
    });
});
