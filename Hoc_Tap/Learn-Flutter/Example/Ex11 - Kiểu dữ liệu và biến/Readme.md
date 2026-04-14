# Khai báo biến và các kiểu dữ liệu cơ bản: int, double, num, String, bool / - Một số lỗi khi khai báo biến, kiểu dữ liệu:
    void main() {
        int a;
        print(a);
    }
1. Yêu cầu phải khởi tạo giá trị cho biến -> báo lỗi:
    Error compiling to JavaScript:
    Info: Compiling with sound null safety.
    lib/main.dart:3:9:
    Error: Non-nullable variable 'a' must be assigned before it can be used.
    print(a);
    ^
    Error: Compilation failed.
Giải pháp: 
    C1: int a = 5;
    C2: int? a;

