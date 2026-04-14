class User {
  // Khai báo Public
  // int id = 1;
  // String name = "Trần Ngọc Tú";
  // User(this.id, this.name);
  // @override
  // String toString() {
  //   return '$id - $name';
  // }
  // void logInfo(){
  //   print('Tran Ngoc Tu');
  // }
  // ------------------------------------------------------

  // Khai báo Private

  int _id = 1;
  String _name = "Trần Ngọc Tú";
  User(this._id, this._name);
  // ------------------------------------------------------
  // Bấm Alt + insert chọn Getter and Setter
  // Khai báo biến Id
    int get id => _id;
    set id(int value) {
      _id = value;
    }
  // ------------------------------------------------------
  // Khai báo biến Name
    String get name => _name;
    set name(String value) {
      _name = value;
    }
  // ------------------------------------------------------
  @override
  String toString() {
    return '$_id - $_name';
  }


}