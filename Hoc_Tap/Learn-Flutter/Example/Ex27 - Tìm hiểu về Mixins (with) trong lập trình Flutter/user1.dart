import 'Person.dart';
import 'Example2.dart';

class User1 extends Person {
  @override
  void ex3() {
    print('example 3');
  }

  @override
  void ex4() {
    print('example 4');
  }

}

extension myEx on User1  {
  void logMyEx() {
    print('Tôi tạo ra myEx');
  }
}