
import 'user.dart';
void main() {
  

  User user = User(1, 'tin');
  // Truy suất public
  user.id = 2;
  user.name = 'Hoa';
  // Truy suất private
  // user.logInfo();
  print(user.toString());


  // runApp(const MyApp());
}
