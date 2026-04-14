// for
// for in
// for each
// while
// do while

// break; continue;

List<int> numbers = [1, 2, 3, 4, 5, 6];

void main() {
//  for (int i = 0; i < numbers.length; i++) {
//    print(numbers[i]);
//  }

  for (int number in numbers) {
    if (number == 5) {
      continue;
    }
    print(number);
  }

//  numbers.forEach((number) => print(number)); 
}