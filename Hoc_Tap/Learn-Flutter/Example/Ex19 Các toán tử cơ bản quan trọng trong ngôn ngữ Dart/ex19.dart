// 1. Toán tử số học
// 2. Toán tử so sánh
// 3. Toán tử kiểm tra kiểu
// 4. Toán tử gán (a operator= b --> a = a operator b;)
// 5. Toán tử Logic
// 6. Toán tử Bitwise và Shift (ít sử dụng)
// Toán tử Bitwise và toán tử Shift là những toán tử thực hiện
// những phép toán trên những bit riêng rẻ của kiểu integer.
// & | ^ ~
// << : shift left; >> Shift Right

int a = 10;
int b = 7;
int c = -10;
int d = 10;

bool check = false;
bool check2 = false;

void main() {
  // print(a > b);  // 10 > 7  -> true
  // print(b < a);  // 7 < 10  -> true
  // print(a == d); // 10 == 10 -> true
  // print(a != b); // 10 != 7  -> true
  // print(a >= b); // 10 >= 7  -> true
  // print(b <= a); // 7 <= 10  -> true
  

  // print(a is int); // true
  // print(a is! String); // true

  // a += b; // a = a + b -> a = 10 + 7 -> a = 17
  // print(a); // 17

  // check = (a > b) && (c < d); // true && true -> true
  print(!check); // true

  // check2 = (a > b) || (c > d); // true || false -> true
  print(check && check2); // true   
  print(check || check2); // true   

}