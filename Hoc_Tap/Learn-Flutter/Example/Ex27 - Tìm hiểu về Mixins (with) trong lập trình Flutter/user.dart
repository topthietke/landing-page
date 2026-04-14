import 'example.dart';
import 'football.dart';
import 'readbook.dart';

class User with Football, Readbook, Example  {
  int id = 1234;
  String name = "Trần Ngọc Tú";

  User(this.id, this.name);

  void logFootball() {
    f_name();
  }
  void logDevelop() {
    develop();
  }

  @override
  void action() {
    print('Play, Run');
  }

  @override
  void develop() {
    print('Đá bóng');
  }

  @override
  void f_name() {
    print("Môn đá bóng");
  }

  @override
  void ex1() {
    print('Example 1');
  }

  @override
  void ex2() {
    print('Example 2');
  }
}