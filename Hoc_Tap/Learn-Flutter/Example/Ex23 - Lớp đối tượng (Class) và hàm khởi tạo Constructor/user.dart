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