// Queue
import 'dart:collection';

var q = Queue();
var test = ['X', 'Y', 'Z'];

// Khai bao biến check
var q2 = Queue<dynamic>();
Queue<dynamic> check = Queue<dynamic>();

void main() {
  print(q.length);

  print('------------');
  // add them phan tu
  q.add('A');
  q.add('B');

  q.addFirst('C');
  q.addLast('D');

  q.addAll(test);

  q.remove('Y');
  q.removeFirst();
  q.removeLast();

  // Duyet cac phan tu
  print(q.length);

  print('------------');

  q.forEach((i) {
    print(i);
  });

  print('------------');

  check.addAll(test);
  check.add(1);
  check.add(1.6);

  print('----------------');

  check.forEach((i) {
    print(i.runtimeType);
    print(i);
  });
  print('----------------');
  print(check.elementAt(3));
  print(check.first);
  print(check.last);
  print(check.isEmpty);
}
