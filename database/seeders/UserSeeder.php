<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['getfly_id'=>6,'area'=>'Hà Nội','code'=>'MJB00039','name'=>'Phạm Nam Anh','title'=>'Customer service Manager','email'=>'phamnam2211@gmail.com','username'=>'moderator','department'=>'Phòng CSKH','team'=>'Khối operation','role'=>'cskh','password'=>Hash::make('CRMmeijibio2025@#!'),'status'=>1],
            ['getfly_id'=>12,'area'=>'Hà Nội','code'=>'MJB00010','name'=>'Tạ Văn Hợi','title'=>'Team Leader (TL)','email'=>'Takashi@meijibio.com','username'=>'Takashi@meijibio.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>13,'area'=>'Hà Nội','code'=>'MJB00013','name'=>'Nguyễn Hoành Đức','title'=>'Team Leader (TL)','email'=>'AlanNguyen@meijibio.com','username'=>'AlanNguyen@meijibio.com','department'=>null,'team'=>'Đội kinh doanh HN 2','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>14,'area'=>'Hà Nội','code'=>'MJB00026','name'=>'Nguyễn Trà My','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'tramy9013@gmail.com','username'=>'tramy9013@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>15,'area'=>'Hà Nội','code'=>'MJB00016','name'=>'Nguyễn Thị Thúy','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'tamdieuhanh1706@gmail.com','username'=>'tamdieuhanh1706@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>16,'area'=>'Hà Nội','code'=>'MJB00018','name'=>'Nguyễn Hương Giang','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'zangnguyen49@gmail.com','username'=>'zangnguyen49@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>17,'area'=>'Hà Nội','code'=>'MJB00019','name'=>'Nguyễn Văn Nam','title'=>'Chuyên viên tư vấn (HC)','email'=>'nguyenvannam1993hbl@gmail.com','username'=>'nguyenvannam1993hbl@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>18,'area'=>'Hà Nội','code'=>'MJB00069','name'=>'Nguyễn Thị Nga','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'ngamc0408@gmail.com','username'=>'ngamc0408@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>19,'area'=>'Hà Nội','code'=>'MJB00023','name'=>'Cao Thị Lan Anh','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'lananh2121997@gmail.com','username'=>'lananh2121997@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>25,'area'=>'Hà Nội','code'=>'MJB00149','name'=>'Lê Minh Anh','title'=>'Chuyên viên tư vấn (HC)','email'=>'minhanhle911@gmail.com','username'=>'minhanhle911@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>26,'area'=>'Hà Nội','code'=>'MJB00154','name'=>'Phạm Thanh Trúc','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'trucpt2905@gmail.com','username'=>'trucpt2905@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>28,'area'=>'Hà Nội','code'=>'MJB00174','name'=>'Bùi Thu Trang','title'=>'Chuyên viên tư vấn (HC)','email'=>'buithutrang2312@gmail.com','username'=>'buithutrang2312@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>30,'area'=>'Hà Nội','code'=>'MJB00200','name'=>'Phạm Tú Anh','title'=>'Chuyên viên tư vấn (HC)','email'=>'Ptuanh2910@gmail.com','username'=>'Ptuanh2910@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>31,'area'=>'Hà Nội','code'=>'MJB00202','name'=>'Lê Thị Vi Bằng','title'=>'Chuyên viên tư vấn (HC)','email'=>'levibang1997@gmail.com','username'=>'levibang1997@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>32,'area'=>'Hà Nội','code'=>'MJB00203','name'=>'Tạ Quốc Nam','title'=>'Chuyên viên tư vấn (HC)','email'=>'namta7666@gmail.com','username'=>'namta7666@gmail.com','department'=>null,'team'=>'Đội kinh doanh HN 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],

            ['getfly_id'=>10,'area'=>'Hà Nội','code'=>'MJB00100','name'=>'Vũ Mạnh Quân','title'=>'Giám đốc Marketing (CMO)','email'=>'manhquanbk3@gmail.com','username'=>'marketing','department'=>null,'team'=>'Phòng MARKETING','role'=>'mkt','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>9,'area'=>'Toàn quốc','code'=>'MJB00028','name'=>'Nguyễn Thúy An','title'=>'Giám đốc tài chính (CFO)','email'=>'annguyen.namviet@gmail.com','username'=>'taichinhkt','department'=>null,'team'=>'Phòng vận hành','role'=>'ketoan','password'=>Hash::make('CRMmeijibio2025@#!'),'status'=>1],
            ['getfly_id'=>34,'area'=>'Toàn quốc','code'=>null,'name'=>'Nguyễn Thùy Trang','title'=>'Trực page','email'=>'trangthuynguyen0603@gmail.com','username'=>'trangthuynguyen0603@gmail.com','department'=>'MKT','team'=>'Phòng Maketing','role'=>'mkt','password'=>Hash::make('21Thaiphien@123'),'status'=>1],

            ['getfly_id'=>20,'area'=>'HCM','code'=>'MJB00048','name'=>'Trần Nguyễn Kim Ngân','title'=>'Giám đốc chi nhánh (DM)','email'=>'Jennytran@meijibio.com','username'=>'Jennytran@meijibio.com','department'=>'Phòng TC - KT','team'=>'Ban giám đốc','role'=>'ketoan','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>22,'area'=>'HCM','code'=>'MJB00057','name'=>'Phan Trần Khánh Quỳnh','title'=>'Team Leader (TL)','email'=>'phantrankhanhquynh1211@gmail.com','username'=>'phantrankhanhquynh1211@gmail.com','department'=>null,'team'=>'Đội kinh doanh HCM 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>23,'area'=>'HCM','code'=>'MJB00056','name'=>'Trương Thị Yến Nhi','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'nhitruongggg01@gmail.com','username'=>'nhitruongggg01@gmail.com','department'=>null,'team'=>'Đội kinh doanh HCM 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>24,'area'=>'HCM','code'=>'MJB00062','name'=>'Nguyễn Thị Hoài Như','title'=>'Chuyên viên tư vấn cấp cao (SHC)','email'=>'nguyenthihoainhu73@gmail.com','username'=>'nguyenthihoainhu73@gmail.com','department'=>null,'team'=>'Đội kinh doanh HCM 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>27,'area'=>'HCM','code'=>'MJB00164','name'=>'Huỳnh Thị My My','title'=>'Chuyên viên tư vấn (HC)','email'=>'Huynhthimymy1799@gmail.com','username'=>'huynhthimymy1799@gmail.com','department'=>null,'team'=>'Đội kinh doanh HCM 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],

            ['getfly_id'=>38,'area'=>'HCM','code'=>'MJB00094','name'=>'Lê Thị Thảo Nguyên','title'=>'Nhân viên Admin','email'=>'thaonguyen.kangenktb@gmail.com','username'=>'thaonguyen.kangenktb@gmail.com','department'=>'Check sd tk mail cty','team'=>null,'role'=>null,'password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>39,'area'=>'HCM','code'=>'MJB00086','name'=>'Nguyễn Thị Dung','title'=>'Nhân viên Admin','email'=>'Nguyenthidungg25082001@gmail.com','username'=>'Nguyenthidungg25082001@gmail.com','department'=>'Check sd tk mail cty','team'=>null,'role'=>null,'password'=>Hash::make('Meijibio2025@#!'),'status'=>1],

            ['getfly_id'=>36,'area'=>'HCM','code'=>null,'name'=>'Phan Thị Kim Dung','title'=>'Chuyên viên tư vấn (HC)','email'=>'nhungphanvtt@gmail.com','username'=>'nhungphanvtt@gmail.com','department'=>null,'team'=>'Đội kinh doanh HCM 1','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>37,'area'=>'HCM','code'=>null,'name'=>'Nguyễn Thị Kim Tuyến','title'=>'Chuyên viên tư vấn (HC)','email'=>'nguyenthikimtuyen79.nt@gmail.com','username'=>'nguyenthikimtuyen79.nt@gmail.com','department'=>null,'team'=>'Đội kinh doanh HCM 2','role'=>'sale','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],

            ['getfly_id'=>41,'area'=>'HCM','code'=>null,'name'=>'Trần Võ Anh Tuấn','title'=>'Chuyên viên Digital MKT','email'=>'Tuantrieu.mcc@gmail.com','username'=>'Tuantrieu.mcc@gmail.com','department'=>'Phòng MKT','team'=>'MKT','role'=>'mkt','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
            ['getfly_id'=>40,'area'=>'Hà Nội','code'=>null,'name'=>'Vũ Phương Nam','title'=>'Chuyên viên Digital MKT','email'=>'p.namvu2212@gmail.com','username'=>'p.namvu2212@gmail.com','department'=>'Phòng MKT','team'=>'MKT','role'=>'mkt','password'=>Hash::make('Meijibio2025@#!'),'status'=>1],

            ['getfly_id'=>42,'area'=>'HCM','code'=>null,'name'=>'Phan Thị Thanh Tú','title'=>'Trực page','email'=>'thanhtu140800@gmail.com','username'=>'thanhtu140800@gmail.com','department'=>null,'team'=>null,'role'=>null,'password'=>Hash::make('Meijibio2025@#!'),'status'=>1],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['getfly_id' => $user['getfly_id']],
                $user
            );
        }
    }
}
