// condition ? expr1 : expr2
// ??
// (..) Cascades
// =>
Giải thích đoạn này

1. Toán tử điều kiện (Ternary Operator)condition ? expr1 : expr2Đây là cách viết tắt của câu lệnh if-else.Cách hoạt động: Nếu condition đúng, nó trả về expr1. Nếu sai, nó trả về expr2.Ví dụ:Dartvar status = isOnline ? "Đang hoạt động" : "Ngoại tuyến";
2. Toán tử Null-coalescing??Toán tử này dùng để xử lý các giá trị có thể bị null.Cách hoạt động: Trả về giá trị bên trái nếu nó không null. Nếu bên trái bị null, nó sẽ trả về giá trị bên phải.Ví dụ:DartString? name; 
print(name ?? "Người dùng ẩn danh"); // Kết quả: Người dùng ẩn danh
3. Cascades (Thác đổ).. (hoặc ?.. cho null-safe)Đây là một tính năng cực kỳ hay của Dart, cho phép bạn thực hiện một chuỗi các thao tác trên cùng một đối tượng mà không cần gọi lại tên đối tượng đó nhiều lần.Cách hoạt động: Thay vì trả về kết quả của phương thức, nó trả về chính đối tượng đó.Ví dụ:Dart// Cách thông thường
var paint = Paint();
paint.color = Colors.black;
paint.strokeCap = StrokeCap.round;

// Cách dùng Cascade (..)
var paint = Paint()
  ..color = Colors.black
  ..strokeCap = StrokeCap.round;
4. Arrow Syntax (Cú pháp mũi tên)=>Đây là cách viết tắt cho các hàm chỉ có duy nhất một dòng lệnh (single expression).Cách hoạt động: Nó thay thế cho cặp ngoặc nhọn {} và từ khóa return.Ví dụ:Dart// Thông thường
int add(int a, int b) {
  return a + b;
}

// Viết gọn với =>
int add(int a, int b) => a + b;
Tóm tắt nhanhKý tựTên gọiCông dụng chính? :TernaryViết nhanh if-else??Null-coalescingGán giá trị mặc định nếu biến bị null..CascadeThực hiện nhiều lệnh trên cùng 1 đối tượng=>ArrowViết hàm 1 dòng (tự động return)Bạn có muốn mình lấy ví dụ kết hợp cả 4 toán tử này vào trong một đoạn code Flutter thực tế không?