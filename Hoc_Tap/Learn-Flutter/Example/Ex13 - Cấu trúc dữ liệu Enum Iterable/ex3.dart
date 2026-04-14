enum Person { tin, hoa, hung }
var numbers = Iterable.generate(10);

void main() {
  print(Person.tin);
  print(Person.tin.name);  
  print('-----------------------');
  print(Person.values);
  // Kiểm tra số phần tử Person
  print(Person.values.length);
  print(Person.values[0]);
  print(Person.values.first);
  print(Person.values.last);
  print(Person.values.isEmpty);
  print(Person.values.isNotEmpty);
  print('-----------------------');
  Person.values.forEach((name) {
    print(name);
  });

  var name = Person.hoa;
  switch (name) {
    case Person.tin:
      print('TinCoder');
      break;

    case Person.hoa:
      print('HoaCoder');
      break;

    case Person.hung:
      print('PhuongCoder');
      break;

    default:
      print('Default');
  }

  numbers.forEach((num) {
    print(num);
  });
}