# [Tự học Flutter - Bài 12] - Phân biệt kiểu dữ liệu động: var & dynamic
1. dynamic
- Kiểu dữ liệu dynamic không cần khởi tạo giá trị thì giá trị mặc định được gán là NULL
2. var:
Không cần khởi tạo giá trị đầu tiên giống như dynamic nhưng khác nhau ở điểm: Khi khởi động var b = 5 thì nếu gán b = "Khởi tạo"
=> Bị lỗi 
VD: 
  var b = 5;
  print(b.runtimeType);
  
  print(b.runtimeType);
  print(b);
  b = "Hello, Dart!";
  print(b.runtimeType);
  print(b);

  ==> Hệ thống báo lỗi:
    compileNewDDC
    main.dart:7:7: Error: A value of type 'String' can't be assigned to a variable of type 'int'.
    b = "Hello, Dart!";
      ^