void main() {
  //  logInfor();
  //  logInfor2();

  //   logName('Tin');
  //   print(tinhtong(4, 6));

  //   check(1, 2, 3);
  //   check2(1);
  //   check3(a: 1, b: 2, c: 3);

  check4();
}

void logInfor() {
  print('Tincoder');
}

void logInfor2() => print('Flutter');

void logName(String name) {
  print(name);
}

int tinhtong(int a, int b) {
  return a + b;
}

void check(int a, int b, int c) {
  print(a);
  print(b);
  print(c);
}

void check2(int a, [int? b, int? c]) {
  print(a);
  print(b);
  print(c);
}

void check3({int? a, int? b, int? c}) {
  print(a);
  print(b);
  print(c);
}

void check4({int? a = 4, int? b = 5, int? c = 5}) {
  print(a);
  print(b);
  print(c);
}
