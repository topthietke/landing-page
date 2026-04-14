var map1 = {};
var map2 = {'id': 1, 'name': 'tin'};
var map3 = {'id': 2, 'name': 'hoa'};
var map4 = {'id2': 3, 'name2': 'phuong'};

void main() {
  // kiem tra phan tu
  print(map1.length);
  // print(map2.length);

  // Duyet map
  // map2.forEach((key, value){
  //   print('$key - $value');
  // });

  // them phan tu
  map1['number 1'] = '1';

  map1.addAll(map2);
  map1.addAll(map3);
  map1.addAll(map4);
  print('--------------------------------------------------------------------------------------------');
  print(map1.length);
  map1.forEach((key, value) {
    print('$key - $value');
  });

  //   map1.clear();

  print('--------------------------------------------------------------------------------------------');

  bool check = map1.containsKey('name2');
  bool check2 = map1.containsValue('hoa');

  print(check);
  print(check2);
}
