var list1 = [];
List<int> numbers = [];
void main() {
  // Kieu tra so phan tu
  //   print(list1.length);
  //   print(numbers.length);
  // Them phan tu
  //   list1.add(1);
  //   list1.add('tin');
  // Duyet danh sach
  //   list1.forEach((i) {
  //     print(i.runtimeType);
  //     print(i);
  //   });
numbers.add(1);
  numbers.add(2);
  numbers.add(3);
  //   print(numbers.length);
  //   print(numbers.first);
//   print(numbers.last);	    //   print(numbers);
  //   print(numbers.isEmpty);
  //   print(numbers.isNotEmpty);
  list1.add(1);
  list1.add(2);
  list1.addAll(numbers);
  list1.insert(0, 0);
  list1.insert(2, 10);
  //   list1.remove(10);
  //   list1.removeAt(1);
  //   list1.removeLast();
  //   list1.removeRange(0, 2);
  //   print(list1.length);
  list1.forEach((i) {
    //     print(i.runtimeType);
    print(i);
  });
}

