// Queue

var numbers = [1, 2, 3];
List<int> list1 = [4, 5, 6];
List<String> list2 = ['tin', 'hoa', 'phuong'];

void main() {
  // 1. Duyet tu phan tu, add tuong ung
  // Set<String> set1 = {};
  // list1.forEach((number) {
  //   set1.add('$number');
  // });

  // print(set1.length);
  // set1.forEach((number) {
  //   print(number.runtimeType);
  //   print(number);
  // });

  // 2. Add all phan tu
  Set<String> set2 = {};
  set2.addAll(list2);

  set2.forEach((name) {
    print(name);
  });

  
  // 3. .from();
  // Set<dynamic> set3 = Set.from(numbers);
  // set3.forEach((i) {
  //   print(i);
  // });

  // var q = Queue.from(numbers);
  // q.forEach((i) {
  //   print(i);
  // });

  // 4. .map()
  List<String> strNumbers = numbers.map((number) {
    return '$number';
  }).toList();

  strNumbers.forEach((i) {
    print(i.runtimeType);
    print(i);
  });

  Set<String> set4 = list1.map((number) {
    return '$number';
  }).toSet();

  set4.forEach((i) {
    print(i.runtimeType);
    print(i);
  });
}
