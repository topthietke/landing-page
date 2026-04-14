// class User {
//   // Khai báo thuộc tính của đối tượng
//   // Cách 1: Khởi tạo giá trị đầu tiên thuộc tính
//     // int id = 5;
//     // String name = "Trần Ngọc Tú";

//   // // Cách 2: Cách khai báo chấp nhận null
//   //   int? id2;
//   //   String? name2;
//   //
//   // // Cách 3: Sử dụng  late để khai báo
//   // late int id3;
//   // late String name3;
//   late int id;
//   late String name;

//   User (int id, String name) {
//     this.id = id;
//     this.name = name;
//   }

//   @override
//   String toString() {
//     return '$id - $name';
//   }
// }

class User {
  // Khai bao thuoc tinh cua doi tuong
  // late int id;
  // late String name;
  int id = 1;
  String name = "Trần Ngọc Tú";
  //c1 - khởi tạo
  // User({this.id = 1, this.name="Hoa"});
  // C2 sử dụng require để buộc
  // User({required this.id, required this.name});

  // C3: Optional một biên snaofđó
  User(this.id, [this.name = 'cccc']);

  // cách gọi 1
  // User (int id, String name) {
  //   this.id = id;
  //   this.name = name;
  // }

  // Cách 2 - Ngăn gọn hơn
  // User (this.id, this.name);

  // Alt + Insert =>  Name Contructor
  // User.name(this.id, this.name);

  @override
  String toString() {
    return '$id - $name';
  }


}