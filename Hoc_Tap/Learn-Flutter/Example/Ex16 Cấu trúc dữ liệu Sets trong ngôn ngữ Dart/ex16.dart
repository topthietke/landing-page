// Sets
var number = <int>{};
var number2 = <int>{1, 2, 3};

Set<int> number3 = {4, 5, 6};
Set<String> name = {'tin', 'hoa', 'phuong'};
Set<dynamic> test = {1, 'tin', 1.5};

void main() {
  // kiem tra kich thuoc
  print(number.length);
  print(number2.length);
  print('--------------------');
  // Duyet cac phan tu
  number2.forEach((number) {
    print(number);
  });

  print('--------------------');

  test.forEach((i) {
    print(i.runtimeType);
    print(i);
  });

  // them phan tu
  // number.add(0);
  // number.add(1);

  // number.addAll(number2);

  test.addAll(number2);
  test.addAll(number3);
  test.addAll(name);

  test.remove(1.5);
  test.removeAll(number3);

  print(test.length);
  print('--------------------');
  test.forEach((number) {
    print(number);
  });

  print('--------------------');
  print(test.first);
  print(test.last);
  print(test.elementAt(1));
  print(test.isEmpty);
  print(test.isNotEmpty);
  print('--------------------');
  bool check2 = test.contains('hoa');
  print(check2);
}
