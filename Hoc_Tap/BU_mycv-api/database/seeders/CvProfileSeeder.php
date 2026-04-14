<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CvProfileSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. PROFILE ────────────────────────────────────────────────────────
        $profileId = DB::table('cv_profiles')->insertGetId([
            'name'       => 'Trần Ngọc Tú',
            'title'      => 'Lập trình viên PHP Laravel',
            'dob'        => '23/04/1986',
            'phone'      => '0765132999',
            'email'      => 'tranngoctu.it@gmail.com',
            'address'    => 'Tây Mỗ - Nam Từ Liêm - Hà Nội',
            'avatar'     => '/avatar.jpg',
            'objective'  => 'Với 5 năm trong nghề lập trình, triển khai trực tiếp nhiều dự án lớn nhỏ, tôi mong muốn ứng tuyển vào vị trí Lập trình PHP của Công ty để có thể áp dụng những kiến thức, kinh nghiệm lập trình của bản thân để nâng cấp sản phẩm và mang lại những giá trị hữu ích cho doanh nghiệp. Đồng thời, mục tiêu phát triển trong vòng 2 năm tới của tôi sẽ trở thành một Trưởng nhóm hoặc Quản lý dự án giỏi.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ── 2. EDUCATION ──────────────────────────────────────────────────────
        $educations = [
            ['school' => 'Trường Đại học Thái Nguyên',    'major' => 'Công nghệ thông tin', 'grade' => 'Khá', 'period' => '09/2017 - 05/2019', 'sort_order' => 1],
            ['school' => 'Trường Cao Đăng Sư phạm',        'major' => 'Công nghệ thông tin', 'grade' => 'Khá', 'period' => '09/2006 - 05/2008', 'sort_order' => 2],
            ['school' => 'Trường Điện tử Điện lạnh',       'major' => 'Công nghệ thông tin', 'grade' => 'Khá', 'period' => '09/2004 - 05/2006', 'sort_order' => 3],
        ];

        foreach ($educations as $edu) {
            DB::table('cv_educations')->insert(array_merge(
                ['cv_profile_id' => $profileId, 'created_at' => now(), 'updated_at' => now()],
                $edu
            ));
        }

        // ── 3. SKILLS ─────────────────────────────────────────────────────────
        $skills = [
            ['tech' => 'PHP: Laravel, Lumen, Thuần, MVC, Wordpress, OOP, Design Pattern',                    'level' => 'Thành thạo',       'sort_order' => 1],
            ['tech' => 'Resful API, VueJS, HTML, CSS, JS, Bootstrap, Docker',                                 'level' => 'Thành thạo',       'sort_order' => 2],
            ['tech' => 'Linux, Windows, Nginx, Apache, XAMPP, WinSCP, Putty, Gitlab, GitHub',                 'level' => 'Thành thạo',       'sort_order' => 3],
            ['tech' => 'CI/CD, NextJS, NuxtJS, ReactJS, NodeJS, Flutter Dart, Liferay (CMS - Java)',          'level' => 'Cơ bản, Tìm hiểu', 'sort_order' => 4],
            ['tech' => 'MySQL, MariaDB, MongoDB, SQL Server',                                                  'level' => 'Hiểu biết',        'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            DB::table('cv_skills')->insert(array_merge(
                ['cv_profile_id' => $profileId, 'created_at' => now(), 'updated_at' => now()],
                $skill
            ));
        }

        // ── 4. WORK EXPERIENCE ────────────────────────────────────────────────
        $workExperiences = [
            [
                'company'  => 'Công ty Cổ phần Công nghệ HTECOM',
                'position' => 'Chuyên viên lập trình',
                'period'   => '07/2024 - nay',
                'tech'     => 'PHP (Laravel), MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker',
                'sort_order' => 1,
                'projects' => [
                    ['name' => 'Dự án tuyển sinh du học Vangunu',                   'url' => 'https://vangunu.com',              'label' => 'vangunu.com'],
                    ['name' => 'Dự án Booking Spa cho khách hàng Châu Âu',          'url' => 'https://cicireluxe.com.au',        'label' => 'cicireluxe.com.au'],
                    ['name' => 'Dự án Hệ thống CRM tuyển sinh của ĐH Mở HCM',      'url' => 'https://crm.elolms.edu.vn',       'label' => 'crm.elolms.edu.vn'],
                    ['name' => 'Dự án mạng xã hội thanh thiếu niên',               'url' => 'https://vlingai.com',             'label' => 'vlingai.com'],
                    ['name' => 'Dự án Liferay (CMS Java) Đường cao tốc Việt Nam',  'url' => 'http://portal.tctvec.vn/web/guest','label' => 'portal.tctvec.vn'],
                ],
                'tasks' => [
                    'Phân tích yêu cầu, thiết kế giải pháp và kiến trúc phần mềm cho dự án.',
                    'Triển khai các chức năng chính của dự án (Backend, Frontend).',
                    'Review code và đảm bảo chất lượng.',
                    'Deploy ứng dụng lên server.',
                    'Debug và khắc phục lỗi.',
                ],
            ],
            [
                'company'  => 'Tập đoàn Omigroup',
                'position' => 'Chuyên viên lập trình',
                'period'   => '06/2022 đến 06/2024',
                'tech'     => 'PHP (Laravel), MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker',
                'sort_order' => 2,
                'projects' => [
                    ['name' => 'Hệ thống bán hàng dược phẩm trực tuyến',       'url' => 'http://vangunu.com',                  'label' => 'Bán hàng Omipharma'],
                    ['name' => 'Hệ thống Quản lý bán hàng nội bộ (Ominext)',    'url' => 'https://omi-pos.ominext.dev/xadmin/login', 'label' => 'Omi-pos Ominext'],
                ],
                'tasks' => [
                    'Phối hợp các thành viên trong nhóm, tham gia phát triển và nâng cấp hệ thống API từ phiên bản PHP thuần sang PHP Lumen.',
                    'Tham gia nghiên cứu, thiết kế và tối ưu database: MySQL, MongoDB.',
                    'Tham gia nghiên cứu, phát triển, tích hợp các sàn TMĐT: Shopee, Lazada về hệ thống Omipos.',
                    'Phối hợp với nhóm Kiểm thử kiểm tra và sửa lỗi.',
                ],
            ],
            [
                'company'  => 'Công ty trực tuyến Hoàng Kim',
                'position' => 'Chuyên viên lập trình PHP Laravel',
                'period'   => '03/2020 đến 04/2022',
                'tech'     => 'PHP Laravel, MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker, Gitlab, GitHub',
                'sort_order' => 3,
                'projects' => [
                    ['name' => 'Phần mềm quản lý bán hàng POD nội bộ',    'url' => null, 'label' => null],
                    ['name' => 'Website bán hàng POD trên shopify',        'url' => null, 'label' => null],
                    ['name' => 'Website bán hàng POD trên wordpress',      'url' => null, 'label' => null],
                ],
                'tasks' => [
                    'Phát triển, tối ưu code, maintain và xây dựng các module hệ thống quản trị bán hàng của Công ty.',
                    'Cắt chuyển giao diện HTML sang PHP Laravel, tối ưu hiệu suất và khả năng tái sử dụng code.',
                    'Phát triển và nâng cấp các tính năng trên web bán hàng trên nền tảng Shopify, Wordpress, đảm bảo trải nghiệm người dùng tốt.',
                    'Thiết kế và tích hợp API, kết nối hệ thống với bên thứ ba (cổng thanh toán, vận chuyển...).',
                    'Quản lý cơ sở dữ liệu MySQL, tối ưu câu lệnh SQL và cải thiện hiệu năng hệ thống.',
                    'Sử dụng GitLab để quản lý source code và làm việc nhóm hiệu quả.',
                ],
            ],
            [
                'company'  => 'Dự án cá nhân',
                'position' => 'Freelance',
                'period'   => '05/2018 đến 01/2022',
                'tech'     => 'PHP Laravel, Wordpress, MySQL, HTML5, CSS3, Bootstrap 5, Js, Gitlab',
                'sort_order' => 4,
                'projects' => [
                    ['name' => 'Dự án quản lý bán hàng TMAS', 'url' => 'http://tmas.vn',          'label' => 'tmas.vn'],
                    ['name' => 'Dự án xây dựng HVHome',        'url' => 'https://hvhomevn.com/',   'label' => 'hvhomevn.com'],
                    ['name' => 'Dự án thực phẩm sạch',         'url' => null,                      'label' => 'halofoods.vn'],
                    ['name' => 'Dự án năng lượng mặt trời',    'url' => null,                      'label' => 'tctsolar.com'],
                ],
                'tasks' => [
                    'Phối hợp các thành viên trong nhóm, tham gia phát triển và nâng cấp hệ thống API từ phiên bản PHP thuần sang PHP Lumen.',
                    'Tham gia nghiên cứu, thiết kế và tối ưu database: MySQL, MongoDB.',
                    'Tham gia nghiên cứu, phát triển, tích hợp các sàn TMĐT: Shopee, Lazada về hệ thống Omipos.',
                    'Phối hợp với nhóm Kiểm thử kiểm tra và sửa lỗi.',
                ],
            ],
        ];

        foreach ($workExperiences as $work) {
            $workId = DB::table('cv_work_experiences')->insertGetId([
                'cv_profile_id' => $profileId,
                'company'       => $work['company'],
                'position'      => $work['position'],
                'period'        => $work['period'],
                'tech'          => $work['tech'],
                'sort_order'    => $work['sort_order'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            foreach ($work['projects'] as $i => $project) {
                DB::table('cv_work_projects')->insert([
                    'work_experience_id' => $workId,
                    'name'               => $project['name'],
                    'url'                => $project['url'],
                    'label'              => $project['label'],
                    'sort_order'         => $i + 1,
                    'created_at'         => now(),
                    'updated_at'         => now(),
                ]);
            }

            foreach ($work['tasks'] as $i => $task) {
                DB::table('cv_work_tasks')->insert([
                    'work_experience_id' => $workId,
                    'description'        => $task,
                    'sort_order'         => $i + 1,
                    'created_at'         => now(),
                    'updated_at'         => now(),
                ]);
            }
        }

        // ── 5. ACTIVITIES ─────────────────────────────────────────────────────
        $activities = [
            [
                'org'    => 'Tại Tập đoàn Omigroup',
                'detail' => 'Tham gia giải bóng đá thường niên của Omigroup, nâng cao tinh thần và gắn kết đồng đội.',
                'sort_order' => 1,
                'items'  => [],
            ],
            [
                'org'    => 'Tổng công ty sản xuất thiết bị Viettel (Tên cũ: Công ty Thông tin M1)',
                'detail' => null,
                'sort_order' => 2,
                'items'  => [
                    'Tham gia Ngày hội sáng kiến ý tưởng để tạo ra những cách làm mới nâng cao hiệu quả trong trong việc.',
                    'Tham gia huấn luyện quân sự và đội phòng cháy chữa cháy (PCCC), rèn luyện tinh thần kỷ luật, tác phong sẵn sàng ứng phó tình huống.',
                ],
            ],
        ];

        foreach ($activities as $activity) {
            $actId = DB::table('cv_activities')->insertGetId([
                'cv_profile_id' => $profileId,
                'org'           => $activity['org'],
                'detail'        => $activity['detail'],
                'sort_order'    => $activity['sort_order'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            foreach ($activity['items'] as $i => $item) {
                DB::table('cv_activity_items')->insert([
                    'activity_id' => $actId,
                    'description' => $item,
                    'sort_order'  => $i + 1,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        // ── 6. LANGUAGES ──────────────────────────────────────────────────────
        $languages = [
            [
                'lang'       => 'Tiếng Việt',
                'desc'       => 'Thành thạo ngôn ngữ mẹ đẻ, có khả năng giao tiếp và viết lách tốt, sử dụng thành thạo trong công việc và cuộc sống hàng ngày.',
                'sort_order' => 1,
            ],
            [
                'lang'       => 'Tiếng Anh',
                'desc'       => 'Đọc hiểu tài liệu chuyên ngành, Có thể giao tiếp qua Chat Messenger, Email, Zalo với đồng nghiệp và khách hàng nước ngoài. Đang trong quá trình học tập để nâng cao kỹ năng giao tiếp và viết lách tiếng Anh.',
                'sort_order' => 2,
            ],
        ];

        foreach ($languages as $lang) {
            DB::table('cv_languages')->insert(array_merge(
                ['cv_profile_id' => $profileId, 'created_at' => now(), 'updated_at' => now()],
                $lang
            ));
        }

        $this->command->info('✅ CV data seeded successfully!');
    }
}
