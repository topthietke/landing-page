class User1 {
  // instance variables: chỉ có thể là final không thể là const
  // const: chỉ có thể là static variables
  final int id;
  static const String name = 'aaaa';
  // User(this.id); // Không thể truyê tham số name ở đây nữa

  // Nếu khai báo thì có ý nghĩa: Tạo User(1) được khai báo const thì nó sẽ trỏ đung ô nhớ đã được định nghĩa.
  // Performent không tồn quá nhiều bộ nhớ
  const User1(this.id);
}

