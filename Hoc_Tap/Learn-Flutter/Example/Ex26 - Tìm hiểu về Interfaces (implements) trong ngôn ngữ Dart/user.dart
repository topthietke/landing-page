import 'address.dart';
import 'city.dart';

class User implements City, Address {
  int i = 10;
  String name="Trần Ngọc Tú";


  User(this.i, this.name);

  @override
  void city_name() {
    print('Thành phố Hà Nội');
  }

  @override
  void function1() {
    print('function1');
  }

  @override
  void address_name() {
    print('TDP 2 Đình - Quang Tiến');
  }

  @override
  void function2() {
    print('function 2');
  }

}