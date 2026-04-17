<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa CV - Trần Ngọc Tú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="edit.css">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li><a class="nav-link active" href="#sec-header"><span class="dot"></span> Thông tin cá nhân</a></li>
                        <li><a class="nav-link" href="#sec-objective"><span class="dot"></span> Mục tiêu nghề nghiệp</a></li>
                        <li><a class="nav-link" href="#sec-education"><span class="dot"></span> Quá trình đào tạo</a></li>
                        <li><a class="nav-link" href="#sec-skills"><span class="dot"></span> Kỹ năng</a></li>
                        <li><a class="nav-link" href="#sec-experience"><span class="dot"></span> Kinh nghiệm làm việc</a></li>
                        <li><a class="nav-link" href="#sec-activities"><span class="dot"></span> Hoạt động</a></li>
                        <li><a class="nav-link" href="#sec-languages"><span class="dot"></span> Ngoại ngữ</a></li>
                    </ul>

                    <div class="d-flex">
                        <button class="btn-save" onclick="saveForm()">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="white" style="margin-right:6px;vertical-align:-2px">
                                <path d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zm-5 16a3 3 0 110-6 3 3 0 010 6zm3-10H5V5h10v4z" />
                            </svg>
                            Lưu thay đổi
                        </button>
                        <a href="index.php" class="btn btn-preview" target="_blank">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Xem trước
                        </a>

                        <span class="save-status" id="save-status">✓ Đã lưu thành công!</span>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <br>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <!-- ── 1. THÔNG TIN CÁ NHÂN ── -->
                <div class="form-section" id="sec-header">
                    <div class="section-header">
                        <h5>Thông tin cá nhân</h5>
                        <span class="sec-badge">Header</span>
                    </div>
                    <div class="section-body">
                        <div class="row g-3">
                            <!-- Avatar -->
                            <div class="col-12">
                                <label class="form-label">Ảnh đại diện</label>
                                <div class="photo-upload-wrap">
                                    <div class="photo-preview" id="photoPreview">
                                        <img src="avatar.png" alt="Trần Ngọc Tú" width="100%" height="100%" />
                                    </div>
                                    <div>
                                        <input type="file" class="form-control" id="photoInput" accept="image/*" style="font-size:13px;">
                                        <small class="text-muted d-block mt-1">Ảnh tỉ lệ dọc. JPG, PNG. Tối đa 2MB.</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Name & Title -->
                            <div class="col-md-6">
                                <label class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Trần Ngọc Tú" placeholder="Họ và tên đầy đủ">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Vị trí / Chức danh <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Lập trình viên PHP Laravel" placeholder="Ví dụ: Kỹ sư phần mềm">
                            </div>
                            <!-- Contacts -->
                            <div class="col-md-6">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control" value="23/04/1986" placeholder="DD/MM/YYYY">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" value="0765132999" placeholder="0xxx xxx xxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="ttn@gmail.com" placeholder="email@example.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" value="Tây Mỗ - Nam Từ Liêm - Hà Nội" placeholder="Địa chỉ cư trú">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">GitHub / Website (tuỳ chọn)</label>
                                <input type="url" class="form-control" value="" placeholder="https://github.com/username">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">LinkedIn (tuỳ chọn)</label>
                                <input type="url" class="form-control" value="" placeholder="https://linkedin.com/in/...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── 2. MỤC TIÊU NGHỀ NGHIỆP ── -->
                <div class="form-section" id="sec-objective">
                    <div class="section-header">
                        <h5>Mục tiêu nghề nghiệp</h5>
                        <span class="sec-badge">Trang 1</span>
                    </div>
                    <div class="section-body">
                        <label class="form-label">Nội dung mục tiêu</label>
                        <textarea class="form-control" rows="5" style="min-height:120px;">Với 5 năm trong nghề lập trình, triển khai trực tiếp nhiều dự án lớn nhỏ, tôi mong muốn ứng tuyển vào vị trí Lập trình PHP của Công ty để có thể áp dụng những kiến thức, kinh nghiệm lập trình của bản thân để nâng cấp sản phẩm và mang lại những giá trị hữu ích cho doanh nghiệp. Đồng thời, mục tiêu phát triển trong vòng 2 năm tới của tôi sẽ trở thành một Trưởng nhóm hoặc Quản lý dự án giỏi.</textarea>
                        <small class="text-muted">Gợi ý: 3–5 câu, nêu kinh nghiệm, mục tiêu ngắn/dài hạn.</small>
                    </div>
                </div>

                <!-- ── 3. QUÁ TRÌNH ĐÀO TẠO ── -->
                <div class="form-section" id="sec-education">
                    <div class="section-header">
                        <h5>Quá trình đào tạo</h5>
                        <span class="sec-badge">Trang 1</span>
                    </div>
                    <div class="section-body">
                        <div id="edu-list">

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label">Tên trường</label>
                                        <input type="text" class="form-control" value="Trường Đại học Thái Nguyên">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Chuyên ngành</label>
                                        <input type="text" class="form-control" value="Công nghệ thông tin">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Loại tốt nghiệp</label>
                                        <select class="form-select">
                                            <option>Xuất sắc</option>
                                            <option>Giỏi</option>
                                            <option selected>Khá</option>
                                            <option>Trung bình</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Thời gian</label>
                                        <input type="text" class="form-control" value="09/2017 - 05/2019" placeholder="MM/YYYY - MM/YYYY">
                                    </div>
                                </div>
                            </div>

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label">Tên trường</label>
                                        <input type="text" class="form-control" value="Trường Cao Đẳng Sư phạm">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Chuyên ngành</label>
                                        <input type="text" class="form-control" value="Công nghệ thông tin">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Loại tốt nghiệp</label>
                                        <select class="form-select">
                                            <option>Xuất sắc</option>
                                            <option>Giỏi</option>
                                            <option selected>Khá</option>
                                            <option>Trung bình</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Thời gian</label>
                                        <input type="text" class="form-control" value="09/2006 - 05/2008">
                                    </div>
                                </div>
                            </div>

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label">Tên trường</label>
                                        <input type="text" class="form-control" value="Trường Điện tử Điện lạnh">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Chuyên ngành</label>
                                        <input type="text" class="form-control" value="Công nghệ thông tin">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Loại tốt nghiệp</label>
                                        <select class="form-select">
                                            <option>Xuất sắc</option>
                                            <option>Giỏi</option>
                                            <option selected>Khá</option>
                                            <option>Trung bình</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Thời gian</label>
                                        <input type="text" class="form-control" value="09/2004 - 05/2006">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn-add-row" onclick="addEduRow()">+ Thêm trường học</button>
                    </div>
                </div>

                <!-- ── 4. KỸ NĂNG ── -->
                <div class="form-section" id="sec-skills">
                    <div class="section-header">
                        <h5>Kỹ năng</h5>
                        <span class="sec-badge">Trang 1</span>
                    </div>
                    <div class="section-body">
                        <div id="skill-list">

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2 align-items-end">
                                    <div class="col">
                                        <label class="form-label">Công nghệ / Kỹ năng</label>
                                        <input type="text" class="form-control" value="PHP: Laravel, Lumen, Thuần, MVC, Wordpress, OOP, Design Pattern">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mức độ</label>
                                        <select class="form-select">
                                            <option selected>Thành thạo</option>
                                            <option>Hiểu biết</option>
                                            <option>Cơ bản, Tìm hiểu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2 align-items-end">
                                    <div class="col">
                                        <label class="form-label">Công nghệ / Kỹ năng</label>
                                        <input type="text" class="form-control" value="Restful API, VueJS, HTML, CSS, JS, Bootstrap, Docker">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mức độ</label>
                                        <select class="form-select">
                                            <option selected>Thành thạo</option>
                                            <option>Hiểu biết</option>
                                            <option>Cơ bản, Tìm hiểu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2 align-items-end">
                                    <div class="col">
                                        <label class="form-label">Công nghệ / Kỹ năng</label>
                                        <input type="text" class="form-control" value="Linux, Windows, Nginx, Apache, XAMPP, WinSCP, Putty, Gitlab, GitHub">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mức độ</label>
                                        <select class="form-select">
                                            <option selected>Thành thạo</option>
                                            <option>Hiểu biết</option>
                                            <option>Cơ bản, Tìm hiểu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2 align-items-end">
                                    <div class="col">
                                        <label class="form-label">Công nghệ / Kỹ năng</label>
                                        <input type="text" class="form-control" value="CI/CD, NextJS, NuxtJS, ReactJS, NodeJS, Flutter Dart, Liferay (CMS - Java)">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mức độ</label>
                                        <select class="form-select">
                                            <option>Thành thạo</option>
                                            <option>Hiểu biết</option>
                                            <option selected>Cơ bản, Tìm hiểu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2 align-items-end">
                                    <div class="col">
                                        <label class="form-label">Công nghệ / Kỹ năng</label>
                                        <input type="text" class="form-control" value="MySQL, MariaDB, MongoDB, SQL Server">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mức độ</label>
                                        <select class="form-select">
                                            <option>Thành thạo</option>
                                            <option selected>Hiểu biết</option>
                                            <option>Cơ bản, Tìm hiểu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn-add-row" onclick="addSkillRow()">+ Thêm kỹ năng</button>
                    </div>
                </div>

                <!-- ── 5. KINH NGHIỆM LÀM VIỆC ── -->
                <div class="form-section" id="sec-experience">
                    <div class="section-header">
                        <h5>Kinh nghiệm làm việc &amp; Dự án</h5>
                        <span class="sec-badge">Trang 2 – 3</span>
                    </div>
                    <div class="section-body">
                        <div id="exp-list">

                            <!-- Entry 1 -->
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label">Tên công ty</label>
                                        <input type="text" class="form-control" value="Công ty Cổ phần Công nghệ HTECOM">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" class="form-control" value="Chuyên viên lập trình">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Thời gian</label>
                                        <input type="text" class="form-control" value="07/2024 - nay">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Công nghệ sử dụng</label>
                                        <input type="text" class="form-control" value="PHP (Laravel), MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker">
                                    </div>
                                    <div class="col-12">
                                        <div class="sub-section-title">Dự án phụ trách</div>
                                        <div class="bullet-list" id="proj-0">
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án tuyển sinh du học Vangunu: https://vangunu.com"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án Booking Spa: https://cicireluxe.com.au"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án CRM tuyển sinh ĐH Mở HCM: https://crm.elolms.edu.vn"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án mạng xã hội thanh thiếu niên: https://vlingai.com"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án Liferay CMS Đường cao tốc Việt Nam: http://portal.tctvec.vn"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                        </div>
                                        <button class="btn-add-bullet mt-1" onclick="addBullet('proj-0')">+ Thêm dự án</button>
                                    </div>
                                    <div class="col-12">
                                        <div class="sub-section-title">Nội dung công việc</div>
                                        <div class="bullet-list" id="work-0">
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Phân tích yêu cầu, thiết kế giải pháp và kiến trúc phần mềm cho dự án."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Triển khai các chức năng chính của dự án (Backend, Frontend)."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Review code và đảm bảo chất lượng."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Deploy ứng dụng lên server."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Debug và khắc phục lỗi."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                        </div>
                                        <button class="btn-add-bullet mt-1" onclick="addBullet('work-0')">+ Thêm nội dung</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Entry 2 -->
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label">Tên công ty</label>
                                        <input type="text" class="form-control" value="Tập đoàn Omigroup">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" class="form-control" value="Chuyên viên lập trình">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Thời gian</label>
                                        <input type="text" class="form-control" value="06/2022 - 06/2024">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Công nghệ sử dụng</label>
                                        <input type="text" class="form-control" value="PHP (Laravel), MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker">
                                    </div>
                                    <div class="col-12">
                                        <div class="sub-section-title">Dự án phụ trách</div>
                                        <div class="bullet-list" id="proj-1">
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Hệ thống bán hàng dược phẩm Omipharma"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Hệ thống Quản lý bán hàng nội bộ Omi-pos"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                        </div>
                                        <button class="btn-add-bullet mt-1" onclick="addBullet('proj-1')">+ Thêm dự án</button>
                                    </div>
                                    <div class="col-12">
                                        <div class="sub-section-title">Nội dung công việc</div>
                                        <div class="bullet-list" id="work-1">
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Phát triển và nâng cấp hệ thống API từ PHP thuần sang PHP Lumen."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Nghiên cứu, thiết kế và tối ưu database: MySQL, MongoDB."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Phát triển, tích hợp các sàn TMĐT: Shopee, Lazada."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Phối hợp với nhóm Kiểm thử kiểm tra và sửa lỗi."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                        </div>
                                        <button class="btn-add-bullet mt-1" onclick="addBullet('work-1')">+ Thêm nội dung</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Entry 3 -->
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label">Tên công ty</label>
                                        <input type="text" class="form-control" value="Công ty trực tuyến Hoàng Kim">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" class="form-control" value="Chuyên viên lập trình PHP Laravel">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Thời gian</label>
                                        <input type="text" class="form-control" value="03/2020 - 04/2022">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Công nghệ sử dụng</label>
                                        <input type="text" class="form-control" value="PHP Laravel, MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker, Gitlab, GitHub">
                                    </div>
                                    <div class="col-12">
                                        <div class="sub-section-title">Dự án phụ trách</div>
                                        <div class="bullet-list" id="proj-2">
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Phần mềm quản lý bán hàng POD nội bộ"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Website bán hàng POD trên Shopify"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Website bán hàng POD trên Wordpress"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                        </div>
                                        <button class="btn-add-bullet mt-1" onclick="addBullet('proj-2')">+ Thêm dự án</button>
                                    </div>
                                    <div class="col-12">
                                        <div class="sub-section-title">Nội dung công việc</div>
                                        <div class="bullet-list" id="work-2">
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Phát triển, tối ưu code, maintain và xây dựng các module hệ thống quản trị bán hàng."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Cắt chuyển giao diện HTML sang PHP Laravel, tối ưu hiệu suất."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Phát triển tính năng trên nền tảng Shopify, Wordpress."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Thiết kế và tích hợp API, kết nối với bên thứ ba."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Quản lý cơ sở dữ liệu MySQL, tối ưu câu lệnh SQL."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Sử dụng GitLab để quản lý source code."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                        </div>
                                        <button class="btn-add-bullet mt-1" onclick="addBullet('work-2')">+ Thêm nội dung</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Entry 4: Freelance -->
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label">Tên công ty</label>
                                        <input type="text" class="form-control" value="Dự án cá nhân">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" class="form-control" value="Freelance">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Thời gian</label>
                                        <input type="text" class="form-control" value="05/2018 - 01/2022">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Công nghệ sử dụng</label>
                                        <input type="text" class="form-control" value="PHP Laravel, Wordpress, MySQL, HTML5, CSS3, Bootstrap 5, JS, Gitlab">
                                    </div>
                                    <div class="col-12">
                                        <div class="sub-section-title">Dự án phụ trách</div>
                                        <div class="bullet-list" id="proj-3">
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án quản lý bán hàng TMAS: http://tmas.vn"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án xây dựng HVHome: https://hvhomevn.com/"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án thực phẩm sạch: halofoods.vn"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                            <div class="bullet-list-item"><input type="text" class="form-control" value="Dự án năng lượng mặt trời: tctsolar.com"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                                        </div>
                                        <button class="btn-add-bullet mt-1" onclick="addBullet('proj-3')">+ Thêm dự án</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn-add-row" onclick="addExpRow()">+ Thêm công ty / kinh nghiệm</button>
                    </div>
                </div>

                <!-- ── 6. HOẠT ĐỘNG ── -->
                <div class="form-section" id="sec-activities">
                    <div class="section-header">
                        <h5>Hoạt động</h5>
                        <span class="sec-badge">Trang 4</span>
                    </div>
                    <div class="section-body">
                        <div id="activity-list">
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Tổ chức / Công ty</label>
                                        <input type="text" class="form-control" value="Tập đoàn Omigroup">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Mô tả hoạt động</label>
                                        <input type="text" class="form-control" value="Tham gia giải bóng đá thường niên, nâng cao tinh thần và gắn kết đồng đội.">
                                    </div>
                                </div>
                            </div>
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Tổ chức / Công ty</label>
                                        <input type="text" class="form-control" value="Tổng công ty Viettel (M1)">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Mô tả hoạt động</label>
                                        <textarea class="form-control" rows="2">Tham gia Ngày hội sáng kiến ý tưởng, huấn luyện quân sự và đội phòng cháy chữa cháy (PCCC), rèn luyện tinh thần kỷ luật.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn-add-row" onclick="addActivityRow()">+ Thêm hoạt động</button>
                    </div>
                </div>

                <!-- ── 7. NGOẠI NGỮ ── -->
                <div class="form-section" id="sec-languages">
                    <div class="section-header">
                        <h5>Ngoại ngữ</h5>
                        <span class="sec-badge">Trang 4</span>
                    </div>
                    <div class="section-body">
                        <div id="lang-list">
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Ngôn ngữ</label>
                                        <input type="text" class="form-control" value="Tiếng Việt">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mức độ</label>
                                        <select class="form-select">
                                            <option selected>Thành thạo (bản ngữ)</option>
                                            <option>Thành thạo</option>
                                            <option>Trung cấp</option>
                                            <option>Cơ bản</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mô tả thêm</label>
                                        <input type="text" class="form-control" value="Thành thạo ngôn ngữ mẹ đẻ, giao tiếp và viết lách tốt.">
                                    </div>
                                </div>
                            </div>
                            <div class="dynamic-row">
                                <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Ngôn ngữ</label>
                                        <input type="text" class="form-control" value="Tiếng Anh">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mức độ</label>
                                        <select class="form-select">
                                            <option>Thành thạo (bản ngữ)</option>
                                            <option>Thành thạo</option>
                                            <option selected>Trung cấp</option>
                                            <option>Cơ bản</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mô tả thêm</label>
                                        <input type="text" class="form-control" value="Đọc hiểu tài liệu chuyên ngành, giao tiếp qua Chat, Email với đối tác nước ngoài.">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn-add-row" onclick="addLangRow()">+ Thêm ngôn ngữ</button>
                    </div>
                </div>

            </div><!-- /col -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Photo preview
        document.getElementById('photoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(ev) {
                const preview = document.getElementById('photoPreview');
                preview.innerHTML = '<img src="' + ev.target.result + '" alt="Avatar">';
            };
            reader.readAsDataURL(file);
        });

        // Sidebar active state on scroll
        const sections = document.querySelectorAll('.form-section[id]');
        const navLinks = document.querySelectorAll('.page-title-bar .nav-link, .mobile-sidebar .nav-link, .navbar-nav .nav-link');

        const getNavbarHeight = () => {
            const navbar = document.querySelector('.custom-navbar');
            return navbar ? navbar.getBoundingClientRect().height : 60;
        };

        const scrollHandler = () => {
            const offset = getNavbarHeight() + 16;
            let current = '';
            sections.forEach(sec => {
                const top = sec.getBoundingClientRect().top;
                if (top <= offset) current = sec.id;
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        };
        window.addEventListener('scroll', scrollHandler);
        window.addEventListener('load', scrollHandler);

        // Smooth scroll - manually offset for fixed navbar
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (!href || !href.startsWith('#')) return;
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const navbarHeight = getNavbarHeight();
                    const targetTop = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight - 16;
                    window.scrollTo({ top: targetTop, behavior: 'smooth' });
                    if (document.body.classList.contains('sidebar-open')) {
                        closeSidebar();
                    }
                }
            });
        });

        // Mobile Sidebar Toggle
        const menuToggleBtn = document.getElementById('menuToggleBtn');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        function openSidebar() {
            mobileSidebar.classList.add('show');
            sidebarOverlay.classList.add('show');
            document.body.classList.add('sidebar-open');
        }

        function closeSidebar() {
            mobileSidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
            document.body.classList.remove('sidebar-open');
        }

        menuToggleBtn.addEventListener('click', openSidebar);
        closeSidebarBtn.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        // Remove row
        function removeRow(btn) {
            const row = btn.closest('.dynamic-row');
            const list = row.parentElement;
            if (list.querySelectorAll('.dynamic-row').length <= 1) {
                alert('Cần ít nhất 1 mục.');
                return;
            }
            row.remove();
        }

        // Remove bullet
        function removeBullet(btn) {
            const item = btn.closest('.bullet-list-item');
            const list = item.parentElement;
            if (list.querySelectorAll('.bullet-list-item').length <= 1) {
                alert('Cần ít nhất 1 mục.');
                return;
            }
            item.remove();
        }

        // Add bullet
        function addBullet(listId) {
            const list = document.getElementById(listId);
            const item = document.createElement('div');
            item.className = 'bullet-list-item';
            item.innerHTML = '<input type="text" class="form-control" placeholder="Nhập nội dung..."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button>';
            list.appendChild(item);
            item.querySelector('input').focus();
        }

        // Add education row
        function addEduRow() {
            const list = document.getElementById('edu-list');
            const div = document.createElement('div');
            div.className = 'dynamic-row';
            div.innerHTML = `
            <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
            <div class="row g-2">
                <div class="col-md-5"><label class="form-label">Tên trường</label><input type="text" class="form-control" placeholder="Tên trường"></div>
                <div class="col-md-4"><label class="form-label">Chuyên ngành</label><input type="text" class="form-control" placeholder="Chuyên ngành"></div>
                <div class="col-md-3"><label class="form-label">Loại tốt nghiệp</label><select class="form-select"><option>Xuất sắc</option><option>Giỏi</option><option selected>Khá</option><option>Trung bình</option></select></div>
                <div class="col-md-4"><label class="form-label">Thời gian</label><input type="text" class="form-control" placeholder="MM/YYYY - MM/YYYY"></div>
            </div>`;
            list.appendChild(div);
            div.querySelector('input').focus();
        }

        // Add skill row
        function addSkillRow() {
            const list = document.getElementById('skill-list');
            const div = document.createElement('div');
            div.className = 'dynamic-row';
            div.innerHTML = `
            <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
            <div class="row g-2 align-items-end">
                <div class="col"><label class="form-label">Công nghệ / Kỹ năng</label><input type="text" class="form-control" placeholder="Ví dụ: PHP, Laravel, MySQL..."></div>
                <div class="col-md-3"><label class="form-label">Mức độ</label><select class="form-select"><option>Thành thạo</option><option>Hiểu biết</option><option>Cơ bản, Tìm hiểu</option></select></div>
            </div>`;
            list.appendChild(div);
            div.querySelector('input').focus();
        }

        // Add experience row
        let expCount = 4;

        function addExpRow() {
            const list = document.getElementById('exp-list');
            const idx = expCount++;
            const div = document.createElement('div');
            div.className = 'dynamic-row';
            div.innerHTML = `
            <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
            <div class="row g-2">
                <div class="col-md-5"><label class="form-label">Tên công ty</label><input type="text" class="form-control" placeholder="Tên công ty"></div>
                <div class="col-md-4"><label class="form-label">Chức vụ</label><input type="text" class="form-control" placeholder="Chức vụ / Vị trí"></div>
                <div class="col-md-3"><label class="form-label">Thời gian</label><input type="text" class="form-control" placeholder="MM/YYYY - MM/YYYY"></div>
                <div class="col-12"><label class="form-label">Công nghệ sử dụng</label><input type="text" class="form-control" placeholder="PHP, Laravel, MySQL..."></div>
                <div class="col-12">
                    <div class="sub-section-title">Dự án phụ trách</div>
                    <div class="bullet-list" id="proj-${idx}">
                        <div class="bullet-list-item"><input type="text" class="form-control" placeholder="Tên dự án / link"><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                    </div>
                    <button class="btn-add-bullet mt-1" onclick="addBullet('proj-${idx}')">+ Thêm dự án</button>
                </div>
                <div class="col-12">
                    <div class="sub-section-title">Nội dung công việc</div>
                    <div class="bullet-list" id="work-${idx}">
                        <div class="bullet-list-item"><input type="text" class="form-control" placeholder="Mô tả công việc..."><button class="btn-remove-bullet" onclick="removeBullet(this)">✕</button></div>
                    </div>
                    <button class="btn-add-bullet mt-1" onclick="addBullet('work-${idx}')">+ Thêm nội dung</button>
                </div>
            </div>`;
            list.appendChild(div);
            div.querySelector('input').focus();
        }

        // Add activity row
        function addActivityRow() {
            const list = document.getElementById('activity-list');
            const div = document.createElement('div');
            div.className = 'dynamic-row';
            div.innerHTML = `
            <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
            <div class="row g-2">
                <div class="col-md-4"><label class="form-label">Tổ chức / Công ty</label><input type="text" class="form-control" placeholder="Tên tổ chức"></div>
                <div class="col-md-8"><label class="form-label">Mô tả hoạt động</label><textarea class="form-control" rows="2" placeholder="Mô tả..."></textarea></div>
            </div>`;
            list.appendChild(div);
            div.querySelector('input').focus();
        }

        // Add language row
        function addLangRow() {
            const list = document.getElementById('lang-list');
            const div = document.createElement('div');
            div.className = 'dynamic-row';
            div.innerHTML = `
            <button class="btn-remove-row" onclick="removeRow(this)" title="Xoá">✕</button>
            <div class="row g-2">
                <div class="col-md-3"><label class="form-label">Ngôn ngữ</label><input type="text" class="form-control" placeholder="Tiếng Nhật, Tiếng Pháp..."></div>
                <div class="col-md-3"><label class="form-label">Mức độ</label><select class="form-select"><option>Thành thạo (bản ngữ)</option><option>Thành thạo</option><option>Trung cấp</option><option>Cơ bản</option></select></div>
                <div class="col-md-6"><label class="form-label">Mô tả thêm</label><input type="text" class="form-control" placeholder="Ví dụ: JLPT N2, IELTS 6.5..."></div>
            </div>`;
            list.appendChild(div);
            div.querySelector('input').focus();
        }

        // Save
        function saveForm() {
            const btn = document.querySelector('.btn-save');
            btn.textContent = 'Đang lưu...';
            btn.disabled = true;
            setTimeout(() => {
                btn.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="white" style="margin-right:6px;vertical-align:-2px"><path d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zm-5 16a3 3 0 110-6 3 3 0 010 6zm3-10H5V5h10v4z"/></svg>Lưu thay đổi';
                btn.disabled = false;
                const status = document.getElementById('save-status');
                status.style.display = 'inline';
                setTimeout(() => status.style.display = 'none', 3000);
            }, 900);
        }
    </script>
</body>

</html>