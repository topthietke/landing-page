
void main() {
  print("-----------------------------");
  dynamic a;  
  print(a.runtimeType);
  print(a);
  a = "Hello, Dart!";
  print(a.runtimeType);
  print(a);
  print("-----------------------------");
  a = 5;
  print(a.runtimeType);
  print(a);
  print("-----------------------------");

  var b;
  print(b.runtimeType);
  print(b);
  b = "Hello, Dart!";
  print(b.runtimeType);
  print(b);
  print("-----------------------------");
  b = 5;
  print(b.runtimeType);
  print(b);

}


