<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV - Trần Ngọc Tú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600;700&family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/4.1.1/inter.min.css" integrity="sha512-sKm1yZUWI/+DDMju+xd5GBXqNF2pnI9F3obEZP9boHbobmxCvaByoyeyvjc+lhiH5KtInOvxUJazjaS1WFnAsg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- PDF libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- <link rel="stylesheet" href="main.css"> -->

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --black: #111111;
            --white: #ffffff;
            --light-gray: #f5f5f5;
            --mid-gray: #888;
            --text: #222;
            --accent: #111;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #e8e8e8;
            color: var(--text);
            font-size: 13.5px;
            line-height: 1.6;
        }

        /* ── DOWNLOAD BAR ── */
        #dl-bar {
            position: fixed;
            top: 18px;
            right: 24px;
            z-index: 9999;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        #dl-pdf-btn {
            background: #111;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 22px;
            font-family: 'Inter', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.32);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.18s, transform 0.12s;
            min-width: 170px;
            justify-content: center;
        }

        #dl-pdf-btn:hover:not(:disabled) {
            background: #333;
            transform: translateY(-1px);
        }

        #dl-pdf-btn:disabled {
            opacity: 0.6;
            cursor: wait;
        }

        /* Progress bar inside button */
        #dl-progress {
            display: none;
            height: 3px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 0 0 6px 6px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            overflow: hidden;
        }

        #dl-progress-fill {
            height: 100%;
            background: #fff;
            width: 0%;
            transition: width 0.3s ease;
        }

        .cv-page {
            width: 720px;
            margin: 30px auto;
            background: #fff;
            box-shadow: 0 4px 32px rgba(0, 0, 0, 0.18);
            padding: 0 0 40px 0;
            position: relative;
        }

        /* ─── HEADER ─── */
        .cv-header {
            display: flex;
            align-items: stretch;
            min-height: 140px;
        }

        .cv-header__photo {
            width: 150px;
            min-width: 150px;
            overflow: hidden;
            background: #ccc;
        }

        .cv-header__photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
            display: block;
        }

        .cv-header__info {
            flex: 1;
            padding: 20px 28px 16px 28px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-bottom: 1px solid #ddd;
        }

        .cv-header__name {
            font-family: 'Inter', sans-serif;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--black);
            line-height: 1.15;
        }

        .cv-header__title {
            font-size: 13px;
            color: var(--mid-gray);
            letter-spacing: 1px;
            margin-top: 2px;
            margin-bottom: 10px;
            font-weight: 400;
        }

        .cv-header__divider {
            width: 100%;
            height: 1px;
            background: #ccc;
            margin-bottom: 10px;
        }

        .cv-header__contacts {
            display: flex;
            flex-wrap: wrap;
            gap: 4px 18px;
            font-size: 12px;
            color: #444;
        }

        .cv-header__contacts span {
            display: flex;
            align-items: center;
            gap: 5px;

            line-height: 2.2;

        }

        .cv-header__contacts svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
            fill: #555;
        }

        /* ─── BODY ─── */
        .cv-body {
            padding: 22px 36px 0 36px;
        }

        /* ─── INTRO ─── */
        .cv-intro {
            margin-bottom: 22px;
            text-align: justify;
            line-height: 2.2;

        }

        .cv-intro__title {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 6px;
        }

        .cv-intro__text {
            font-size: 13px;
            color: #333;
            line-height: 2.2;

        }

        /* ─── SECTION HEADER ─── */
        .cv-section {
            margin-bottom: 20px;
        }

        .cv-section__header {
            display: flex;
            align-items: center;
            margin-bottom: 14px;
        }

        .cv-section__label {
            background: var(--black);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            padding: 5px 18px 5px 12px;
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 50%, calc(100% - 10px) 100%, 0 100%);
            white-space: nowrap;
            letter-spacing: 0.5px;

            /* border-top-left-radius: 5px;
            border-bottom-left-radius: 5px; */
            border-radius: 5px;
        }

        .cv-section__line {
            flex: 1;
            height: 1px;
            background: #000;
            margin-left: 0;
        }

        /* ─── ENTRY ─── */
        .cv-entry {
            margin-bottom: 16px;
        }

        .cv-entry__row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 8px;
        }

        .cv-entry__school {
            font-weight: 700;
            font-size: 13.5px;
            color: #111;
        }

        .cv-entry__degree {
            font-weight: normal;
            font-size: 13.5px;
            color: #111;
            text-align: right;
        }

        .cv-entry__date {
            font-size: 12px;
            color: #666;
            white-space: nowrap;
            text-align: right;
            min-width: 110px;
        }

        .cv-entry__subtitle {
            font-size: 12.5px;
            color: #444;
            margin-top: 2px;
            /* font-style: italic; */
            line-height: 2.2;
        }

        .cv-entry__bullets {
            margin-top: 5px;
            padding-left: 18px;
            line-height: 2;
            font-size: 13.5px;
            text-align: justify;
        }

        .cv-entry__bullets li {
            font-size: 13.5px;
            color: #000;
            margin-bottom: 2px;
            line-height: 2.2;
            /* list-style-type: "- "; */
        }

        /* ─── SKILLS ─── */
        .cv-skills-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px 20px;
            font-size: 13px;
            color: #333;
        }

        /* ─── REFERENCE ─── */
        .cv-reference {
            font-size: 13px;
            line-height: 1.7;
            color: #333;
        }

        .cv-reference a {
            color: #1a5fad;
            text-decoration: underline;
        }

        /* ─── CERT ENTRY ─── */
        .cv-cert__row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .cv-cert__name {
            font-weight: 700;
            font-size: 13.5px;
            color: #111;
        }

        .cv-cert__date {
            font-size: 12px;
            color: #666;
        }

        .cv-cert__desc {
            font-size: 12.5px;
            color: #444;
            margin-top: 2px;
        }

        /* ─── PAGE FOOTER ─── */
        .cv-page-num {
            text-align: right;
            font-size: 11.5px;
            color: #aaa;
            padding: 18px 36px 0 36px;
        }

        .cv-li_text {
            text-align: justify;
        }

        .cv-entry__title {
            font-size: 13px;
            font-weight: normal;
        }

        .lnk_project {
            /* color: #000 !important; */
            text-decoration: none;
        }

        /* ─── PRINT ─── */
        @media print {
            body {
                background: white;
            }

            .cv-page {
                box-shadow: none;
                margin: 0;
            }

            #dl-bar {
                display: none !important;
            }
        }

        @media (max-width: 760px) {
            .cv-page {
                width: 100%;
                margin: 0;
            }
        }
    </style>

</head>

<body>
    <!-- ══ DOWNLOAD BUTTON ══ -->
    <!-- ----------------------------------------------------------------------------------------------------------------------- -->
    <div id="dl-bar">
        <button id="dl-pdf-btn" onclick="downloadPDF()">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
                <path d="M5 20h14v-2H5v2zm7-18v12.17l-3.59-3.58L7 12l5 5 5-5-1.41-1.41L13 14.17V2h-1z" />
            </svg>
            <span id="btn-text">Tải xuống PDF</span>
            <div id="dl-progress">
                <div id="dl-progress-fill"></div>
            </div>
        </button>
        <a href="edit.php" class="btn btn-primary">
            <i class="fa fa-edit"></i>
            Chỉnh sửa
        </a>

    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------- -->
    <!-- Trang 1 -->
    <div class="cv-page" id="cv-page-1">
        <!-- HEADER -->
        <div class="cv-header">
            <div class="cv-header__photo">
                <img src="avatar.jpg" alt="Trần Ngọc Tú" />
            </div>
            <div class="cv-header__info">
                <div class="cv-header__name">Trần Ngọc Tú</div>
                <div class="cv-header__title">Lập trình viên PHP Laravel</div>
                <div class="cv-header__divider"></div>
                <div class="cv-header__contacts">
                    <span>
                        <i class="fa fa-edit"></i>
                        <svg viewBox="0 0 24 24">
                            <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm0 2l-7 5-7-5h14zm0 12H5a1 1 0 01-1-1V8.5l7 5 7-5V17a1 1 0 01-1 1z" />
                        </svg>
                        23/04/1986
                    </span>
                    <span>
                        <svg viewBox="0 0 24 24">
                            <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.45 11.45 0 003.58.57 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.49 11.49 0 00.57 3.57 1 1 0 01-.25 1.02l-2.2 2.2z" />
                        </svg>
                        0765132999
                    </span>
                    <span>
                        <svg viewBox="0 0 24 24" width="40" height="40" fill="#007bff">
                            <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm0 2l-7 5-7-5h14zm0 12H5a1 1 0 01-1-1V8.5l7 5 7-5V17a1 1 0 01-1 1z" />
                        </svg>
                        ngoctusoftware@gmail.com
                    </span>
                    <span>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                        </svg>
                        Tây Mỗ - Nam Từ Liêm - Hà Nội
                    </span>

                    <!-- <span>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2A10 10 0 002 12c0 4.42 2.87 8.17 6.84 9.5.5.09.68-.22.68-.48v-1.7C6.73 19.91 6.14 18 6.14 18c-.46-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02A9.56 9.56 0 0112 6.8c.85 0 1.71.11 2.5.33 1.91-1.3 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85v2.74c0 .27.18.58.69.48A10 10 0 0022 12 10 10 0 0012 2z" />
                        </svg>
                        <a href="https://ngoctusoftware.42web.io">ngoctusoftware</a>

                    </span> -->
                </div>
            </div>
        </div>
        <!-- BODY -->
        <div class="cv-body">
            <!-- ---------------------------------------    Mục tiêu nghề nghiệp    --------------------------------------------------------- -->
            <div class="cv-section">
                <div class="cv-section__header">
                    <div class="cv-section__label">Mục tiêu nghề nghiệp</div>
                    <div class="cv-section__line"></div>
                </div>
                <div class="cv-intro">
                    <span>
                        - Với 5 năm trong nghề lập trình, triển khai trực tiếp nhiều dự án lớn nhỏ,
                        tôi mong muốn ứng tuyển vào vị trí Lập trình PHP của Công ty để có thể áp dụng những kiến thức,
                        kinh nghiệm lập trình của bản thân để nâng cấp sản phẩm và mang lại những giá trị hữu ích cho doanh nghiệp.
                        Đồng thời, mục tiêu phát triển trong vòng 2 năm tới của tôi sẽ trở thành một Trưởng nhóm hoặc Quản lý dự án giỏi.
                    </span>
                </div>
            </div>

            <!-- ---------------------------------------     Quá trình đào tạo     ---------------------------------------------------------------->
            <div class="cv-section">
                <!-- Tiêu đề Quá trình đào tạo -->
                <div class="cv-section__header">
                    <div class="cv-section__label">Quá trình đào tạo</div>
                    <div class="cv-section__line"></div>
                </div>
                <table class="table table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th class="text-center" scope="col">Tên trường</th>
                            <th class="text-center" scope="col">Chuyên ngành</th>
                            <th class="text-center" scope="col">Loại tốt nghiệp</th>
                            <th class="text-center" scope="col">Năm tốt nghiệp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Trường Đại học Thái Nguyên</td>
                            <td>Công nghệ thông tin</td>
                            <td class="text-center">Khá</td>
                            <td>09/2017 - 05/2019</td>
                        </tr>
                        <tr>
                            <td>Trường Cao Đăng Sư phạm</td>
                            <td>Công nghệ thông tin</td>
                            <td class="text-center">Khá</td>
                            <td>09/2006 - 05/2008</td>
                        </tr>
                        <tr>
                            <td>Trường Điện tử Điện lạnh</td>
                            <td>Công nghệ thông tin</td>
                            <td class="text-center">Khá</td>
                            <td>09/2024 - 05/2006</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ---------------------------------------     KỸ NĂNG    ---------------------------------------------------------------->
            <!-- KỸ NĂNG -->
            <div class="cv-section">
                <div class="cv-section__header">
                    <div class="cv-section__label">Kỹ năng</div>
                    <div class="cv-section__line"></div>
                </div>
                <table class="table table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Công nghệ</th>
                            <th scope="col">Mức độ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PHP: Laravel, Lumen, Thuần, MVC, Wordpress, OOP, Design Pattern</td>
                            <td>Thành thạo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Resful API, VueJS, HTML, CSS, JS, Bootstrap, Docker</td>
                            <td>Thành thạo</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Linux, Windows, Nginx, Apache, XAMPP, WinSCP, Putty, Gitlab, GitHub</td>
                            <td>Thành thạo</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>CI/CD, NextJS, NuxtJS,ReactJS, NodeJS, Flutter Dart, Liferay (CMS - Java)</td>
                            <td>Cơ bản, Tìm hiểu</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>MySQL, MariaDB, MongoDB, SQL Server</td>
                            <td>Hiểu biết</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div><!-- /cv-body -->
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------- -->
    <!-- ══════ PAGE 2 ═══════ -->
    <div class="cv-page" id="cv-page-2" style="margin-top: 30px;">
        <div class="cv-body" style="padding-top:30px;">
            <!-- KINH NGHIỆM LÀM VIỆC và Dự án thực tế -->
            <div class="cv-section">

                <div class="cv-section__header">
                    <div class="cv-section__label">Kinh nghiệm làm việc và Dự án thực tế</div>
                    <div class="cv-section__line"></div>
                </div>

                <div class="cv-entry">
                    <!-------------------------------  Công ty Cổ phần Công nghệ HTECOM  ---------------------------------->
                    <div class="cv-entry__row">
                        <div class="cv-entry__school">Công ty Cổ phần Công nghệ HTECOM</div>
                        <div class="cv-entry__school">Chuyên viên lập trình</div>
                        <div class="cv-entry__date">07/2024 - nay</div>
                    </div>
                    <!------------------------------------------------------------------------------------------------------->
                    <ul class="cv-entry__bullets">
                        <li><b>Công nghệ: </b> PHP (Laravel), MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker</li>
                        <li><b>Dự án phụ trách:</b>
                            <div class="cv-entry__bullets">- Dự án tuyển sinh du học Vangunu: <a class="lnk_project" href="https://vangunu.com" target="_blank">vangunu.com</a> </div>
                            <div class="cv-entry__bullets">- Dự án Booking Spa cho khách hàng Châu Âu: <a class="lnk_project" href="https://cicireluxe.com.au" target="_blank">cicireluxe.com.au</a> </div>
                            <div class="cv-entry__bullets">- Dự án Hệ thống CRM tuyển sinh của ĐH Mở HCM: <a class="lnk_project" href="https://crm.elolms.edu.vn" target="_blank">crm.elolms.edu.vn</a> </div>
                            <div class="cv-entry__bullets">- Dự án mạng xã hội thanh thiếu niên: <a class="lnk_project" href="https://vlingai.com" target="_blank">vlingai.com</a> </div>
                            <div class="cv-entry__bullets">- Dự án Liferay (CMS Java) Đường cao tốc Việt Nam: <a class="lnk_project" href="http://portal.tctvec.vn/web/guest" target="_blank">portal.tctvec.vn</a></div>
                        </li>
                        <li><b>Nội dung công việc:</b>
                            <div class="cv-entry__bullets">- Phân tích yêu cầu, thiết kế giải pháp và kiến trúc phần mềm cho dự án.</div>
                            <div class="cv-entry__bullets">- Triển khai các chức năng chính của dự án (Backend, Frontend).</div>
                            <div class="cv-entry__bullets">- Review code và đảm bảo chất lượng.</div>
                            <div class="cv-entry__bullets">- Deploy ứng dụng lên server.</div>
                            <div class="cv-entry__bullets">- Debug và khắc phục lỗi.</div>
                        </li>
                    </ul>
                    <!------------------------------  Tập đoàn Omigroup  -------------------------------------->
                    <div class="cv-entry__row">
                        <div class="cv-entry__school">Tập đoàn Omigroup</div>
                        <div class="cv-entry__school">Chuyên viên lập trình</div>
                        <div class="cv-entry__date">06/2022 đến 06/2024</div>
                    </div>
                    <!------------------------------------------------------------------------------------------------------->
                    <ul class="cv-entry__bullets">
                        <li><b>Công nghệ: </b> PHP (Laravel), MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker</li>
                        <li><b>Dự án phụ trách:</b>
                            <div>- Hệ thống bán hàng dược phẩm trực tuyến: <a href="http://vangunu.com" target="_blank">Bán hàng
                                    Omipharma</a></div>
                            <div>- Hệ thống Quản lý bán hàng nội bộ (Ominext): <a href="https://omi-pos.ominext.dev/xadmin/login">Omi-pos
                                    Ominext</a></div>
                        </li>
                        <li><b>Nội dung công việc:</b>
                            <div class="cv-entry__bullets">- Phối hợp các thành viên trong nhóm, tham gia phát triển và nâng cấp hệ thống API từ phiên bản PHP thuần sang PHP Lumen.</div>
                            <div class="cv-entry__bullets">- Tham gia nghiên cứu, thiết kế và tối ưu database: MySQL, MongoDB.</div>
                            <div class="cv-entry__bullets">- Tham gia nghiên cứu, phát triển, tích hợp các sàn TMĐT: Shopee, Lazada về hệ thống Omipos.</div>
                            <div class="cv-entry__bullets">- Phối hợp với nhóm Kiểm thử kiểm tra và sửa lỗi.</div>
                        </li>
                    </ul>
                </div>


            </div>

        </div><!-- /cv-body -->


    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------- -->
    <!-- ══════ PAGE 3 ═══════ -->
    <div class="cv-page" id="cv-page-3" style="margin-top: 30px;">
        <div class="cv-body" style="padding-top:30px;">
            <!-- KINH NGHIỆM LÀM VIỆC và Dự án thực tế -->
            <div class="cv-section">
                <div class="cv-section__header">
                    <div class="cv-section__label">Kinh nghiệm làm việc và Dự án thực tế</div>
                    <div class="cv-section__line"></div>
                </div>

                <div class="cv-entry">
                    <!-------------------------------  Công ty trực tuyến Hoàng Kim  ---------------------------------->
                    <div class="cv-entry__row">
                        <div class="cv-entry__school">Công ty trực tuyến Hoàng Kim</div>
                        <div class="cv-entry__school">Chuyên viên lập trình PHP Laravel</div>
                        <div class="cv-entry__date">03/2020 đến 04/2022</div>
                    </div>
                    <!------------------------------------------------------------------------------------------------------->
                    <ul class="cv-entry__bullets">
                        <li><b>Công nghệ: </b> PHP Laravel, MySQL, HTML5, CSS3, Bootstrap 5, JavaScript, jQuery, Queue, Docker, Gitlab, GitHub</li>
                        <li><b>Dự án phụ trách:</b>
                            <div class="cv-entry__bullets">- Phần mềm quản lý bán hàng POD nội bộ </a></div>
                            <div class="cv-entry__bullets">- Website bán hàng POD trên shopify </a></div>
                            <div class="cv-entry__bullets">- Website bán hàng POD trên wordpress </a></div>
                        </li>
                        <li><b>Nội dung công việc:</b>
                            <div class="cv-entry__bullets">- Phát triển, tối ưu code, maintain và xây dựng các module hệ thống quản trị bán hàng của Công ty.</div>
                            <div class="cv-entry__bullets">- Cắt chuyển giao diện HTML sang PHP Laravel, tối ưu hiệu suất và khả năng tái sử dụng code.</div>
                            <div class="cv-entry__bullets">- Phát triển và nâng cấp các tính năng trên web bán hàng trên nền tảng Shopify, Wordpress, đảm bảo trải nghiệm người dùng tốt.</div>
                            <div class="cv-entry__bullets">- Thiết kế và tích hợp API, kết nối hệ thống với bên thứ ba (cổng thanh toán, vận chuyển...).</div>
                            <div class="cv-entry__bullets">- Quản lý cơ sở dữ liệu MySQL, tối ưu câu lệnh SQL và cải thiện hiệu năng hệ thống.</div>
                            <div class="cv-entry__bullets">- Sử dụng GitLab để quản lý source code và làm việc nhóm hiệu quả.</div>
                        </li>
                    </ul>
                    <!------------------------------  Dự án cá nhân  -------------------------------------->
                    <div class="cv-entry__row">
                        <div class="cv-entry__school">Dự án cá nhân</div>
                        <div class="cv-entry__school">Freelance</div>
                        <div class="cv-entry__date">05/2018 đến 01/2022</div>
                    </div>
                    <!------------------------------------------------------------------------------------------------------->
                    <ul class="cv-entry__bullets">
                        <li><b>Công nghệ: </b> PHP Laravel, Wordpress, MySQL, HTML5, CSS3, Bootstrap 5, Js, Gitlab</li>
                        <li><b>Dự án phụ trách:</b>
                            <div class="cv-entry__bullets">- Dự án quản lý bán hàng TMAS: <a class="lnk_project" href="http://tmas.vn" target="_blank"> tmas.vn </a></div>
                            <div class="cv-entry__bullets">- Dự án xây dựng HVHome: <a class="lnk_project" href="https://hvhomevn.com/" target="_blank">hvhomevn.com </a></div>
                            <div class="cv-entry__bullets">- Dự án thực phẩm sạch <a class="lnk_project text-dark" href="#" target="_blank"> halofoods.vn </a></div>
                            <div class="cv-entry__bullets">- Dự án năng lượng mặt trời <a class="lnk_project text-dark" href="#" target="_blank"> tctsolar.com </a></div>
                        </li>
                        <li><b>Nội dung công việc:</b>
                            <div class="cv-entry__bullets">- Phối hợp các thành viên trong nhóm, tham gia phát triển và nâng cấp hệ thống API từ phiên bản PHP thuần sang PHP Lumen.</div>
                            <div class="cv-entry__bullets">- Tham gia nghiên cứu, thiết kế và tối ưu database: MySQL, MongoDB.</div>
                            <div class="cv-entry__bullets">- Tham gia nghiên cứu, phát triển, tích hợp các sàn TMĐT: Shopee, Lazada về hệ thống Omipos.</div>
                            <div class="cv-entry__bullets">- Phối hợp với nhóm Kiểm thử kiểm tra và sửa lỗi.</div>
                        </li>
                    </ul>
                    <!------------------------------  Tập đoàn Omigroup  -------------------------------------->


                </div>


            </div>

        </div><!-- /cv-body -->
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------- -->
    <!-- ══════ PAGE 4 ═══════ -->
    <div class="cv-page" id="cv-page-4" style="margin-top: 30px;">
        <div class="cv-body" style="padding-top:30px;">
            <!-- HOẠT ĐỘNG -->
            <div class="cv-section">
                <div class="cv-section__header">
                    <div class="cv-section__label">Hoạt động</div>
                    <div class="cv-section__line"></div>
                </div>
                <div class="cv-section__body">
                    <div class="cv-content">
                        <b>Tại Tập đoàn Omigroup</b>: Tham gia giải bóng đá thường niên của Omigroup, nâng cao tinh thần và gắn kết đồng đội.
                    </div>
                    <div class="cv-content">
                        <div><b>Tổng công ty sản xuất thiết bị Viettel (Tên cũ: Công ty Thông tin M1):</b></div>
                        <div class="mx-3">- Tham gia Ngày hội sáng kiến ý tưởng để tạo ra những cách làm mới nâng cao hiệu quả trong trong việc.</div>
                        <div class="mx-3">- Tham gia huấn luyện quân sự và đội phòng cháy chữa cháy (PCCC), rèn luyện tinh thần kỷ luật, tác phong sẵn sàng ứng phó tình huống.</div>
                    </div>
                </div>
            </div>
            <!-- NGOẠI NGỮ -->

            <div class="cv-section">
                <div class="cv-section__header">
                    <div class="cv-section__label">Ngoại ngữ</div>
                    <div class="cv-section__line"></div>
                </div>
                <div class="cv-section__body">
                    <div class="cv-content">
                        <b>Tiếng Việt:</b> Thành thạo ngôn ngữ mẹ đẻ, có khả năng giao tiếp và viết lách tốt, sử dụng thành thạo trong công việc và cuộc sống hàng ngày.
                    </div>
                    <div class="cv-content">
                        <b>Tiếng Anh:</b> Đọc hiểu tài liệu chuyên ngành, Có thể giao tiếp qua Chat Messenger, Email, Zalo với đồng nghiệp và khách hàng nước ngoài. Đang trong quá trình học tập để nâng cao kỹ năng giao tiếp và viết lách tiếng Anh.
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!------------------------------------------------------------------------------------------------------------------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="main.js"></script> -->
    <script>
        async function downloadPDF() {
            const btn = document.getElementById('dl-pdf-btn');
            const btnText = document.getElementById('btn-text');
            const progressBar = document.getElementById('dl-progress');
            const progressFill = document.getElementById('dl-progress-fill');

            btn.disabled = true;
            progressBar.style.display = 'block';

            // ── Tạm thời patch tất cả ul/li để bullet/dash không bị clip ──
            function patchLists(pages) {
                const patches = [];
                pages.forEach(page => {
                    page.querySelectorAll('ul, ol').forEach(list => {
                        const prev = list.style.overflow;
                        list.style.overflow = 'visible';
                        patches.push({
                            el: list,
                            prop: 'overflow',
                            prev
                        });
                    });
                    page.querySelectorAll('ul li, ol li').forEach(li => {
                        const prevOF = li.style.overflow;
                        const prevPL = li.style.paddingLeft;
                        li.style.overflow = 'visible';
                        const computed = window.getComputedStyle(li);
                        const pl = parseFloat(computed.paddingLeft) || 0;
                        if (pl < 16) li.style.paddingLeft = '16px';
                        patches.push({
                            el: li,
                            prop: 'overflow',
                            prev: prevOF
                        });
                        patches.push({
                            el: li,
                            prop: 'paddingLeft',
                            prev: prevPL
                        });
                    });
                });
                return patches;
            }

            function restorePatches(patches) {
                patches.forEach(({
                    el,
                    prop,
                    prev
                }) => {
                    el.style[prop] = prev;
                });
            }

            // Hide download button during capture
            const dlBar = document.getElementById('dl-bar');
            dlBar.style.display = 'none';

            try {
                btnText.textContent = 'Đang chuẩn bị…';
                progressFill.style.width = '10%';
                await new Promise(r => setTimeout(r, 200));

                const {
                    jsPDF
                } = window.jspdf;
                const A4_W = 210;
                const A4_H = 297;

                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4',
                    compress: true,
                });

                // ── Tự động lấy tất cả .cv-page có trong trang, bỏ qua null ──
                const pages = Array.from(document.querySelectorAll('.cv-page')).filter(Boolean);

                if (pages.length === 0) {
                    throw new Error('Không tìm thấy trang CV nào (.cv-page)');
                }

                for (let i = 0; i < pages.length; i++) {
                    const pct = Math.round(10 + ((i + 1) / pages.length) * 75);
                    progressFill.style.width = pct + '%';
                    btnText.textContent = `Đang render trang ${i + 1}/${pages.length}…`;
                    await new Promise(r => setTimeout(r, 50));

                    // Patch lists trước khi render
                    const patches = patchLists([pages[i]]);

                    const canvas = await html2canvas(pages[i], {
                        scale: 2,
                        useCORS: true,
                        allowTaint: true,
                        backgroundColor: '#ffffff',
                        logging: false,
                        removeContainer: true,
                        scrollX: -window.scrollX,
                        scrollY: -window.scrollY,
                        width: pages[i].offsetWidth,
                        height: pages[i].offsetHeight,
                        windowWidth: document.documentElement.scrollWidth,
                        windowHeight: document.documentElement.scrollHeight,
                    });

                    // Restore sau khi render xong
                    restorePatches(patches);

                    const imgData = canvas.toDataURL('image/jpeg', 0.95);
                    const canvasW = canvas.width;
                    const canvasH = canvas.height;
                    const imgH = (canvasH / canvasW) * A4_W;

                    if (i > 0) pdf.addPage();

                    const finalH = Math.min(imgH, A4_H);
                    pdf.addImage(imgData, 'JPEG', 0, 0, A4_W, finalH);
                }

                progressFill.style.width = '95%';
                btnText.textContent = 'Đang tạo PDF…';
                await new Promise(r => setTimeout(r, 200));

                progressFill.style.width = '100%';
                btnText.textContent = 'Hoàn tất!';
                pdf.save('CV_Tran_Ngoc_Tu.pdf');

                await new Promise(r => setTimeout(r, 800));

            } catch (err) {
                console.error('PDF error:', err);
                btnText.textContent = 'Có lỗi, thử lại';
            } finally {
                dlBar.style.display = 'flex';
                btn.disabled = false;
                progressBar.style.display = 'none';
                progressFill.style.width = '0%';
                setTimeout(() => {
                    btnText.textContent = 'Tải xuống PDF';
                }, 1500);
            }
        }
    </script>
</body>

</html>