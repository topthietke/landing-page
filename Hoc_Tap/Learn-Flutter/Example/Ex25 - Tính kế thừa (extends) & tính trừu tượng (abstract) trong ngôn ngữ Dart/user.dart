// import 'person.dart';
//
// class User extends Person {
//   int id = 1;
//   String name = "Trần Ngọc Tú";
//
//   // Do Class cha khởi tạo   // Khởi tạo Person(this.age);
//   // Nên User(this.id, this.name); sẽ báo đỏ --> Khởi tạo Person trước
//
//   User(this.id, this.name) : super(18);
//
//   void logInfo(){
//     print('$id - $name - $age');
//   }
//
// }

import 'people.dart';

class User extends People {
  int id = 1;
  String name = "Trần Ngọc Tú";

  // Do Class cha khởi tạo   // Khởi tạo Person(this.age);
  // Nên User(this.id, this.name); sẽ báo đỏ --> Khởi tạo Person trước

  User(this.id, this.name);

  @override
  void function1() {
    print('override function 1');
  }
  // @override
  // void function2() {
  //   // TODO: implement function2
  //   super.function2();
  //   // print('override function 1');
  // }


}
