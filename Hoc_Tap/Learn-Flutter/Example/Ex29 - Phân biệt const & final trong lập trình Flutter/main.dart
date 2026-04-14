import 'user.dart';
import 'user1.dart';

const double pi=3.14; // giá trị pi không thay đổi
const String myTag = 'MyTab';
final int a = 10;
// final ít nghiêm ngặt hơn - có thể không xác định dduowncj trong 1 thời gian
// -> sau đó đợc xác định rồi sẽ không thay đổi được
void main() {
  // ví du call api
  // final a1 = 'call api';

  //Trường hợp 1: Nếu khai báo const thì sẽ tạo ra 1 ô nhớ duy nhất cho tất cả các biến được khởi tạo đến constructor giống nhau
  User user = const User(1);
  User user2 = const User(1);

 // Khai báo cùng một class nhưng 2 ô nhớ khac nhau

  if(user == user2) {
    print("u1 và u2 Cùng 1 ô nhớ");
  } else {
    print("u1 và u2 Không cùng 1 ô nhớ");
  }
  // Trường hợp 2: Nếu không khai báo const thì sẽ tạo ra 2 ô nhớ khác nhau
  User1 user3 = User1(1);
  User1 user4 = User1(1);

  if(user3 == user4) {
    print("u3 và u4 Cùng 1 ô nhớ");
  } else {
    print("u3 và u4 Không cùng 1 ô nhớ");
  }

  // ==> 3 Cái user đều khởi tạo đên contructorr giống nhau

  
}