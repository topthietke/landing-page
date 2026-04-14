import 'package:flutter/material.dart';

void main() {
  runApp(MaterialApp(
    home: SafeArea(
      child: Scaffold(
        body: MyWidget()
      ) // Scaffold
    ), // SafeArea
    debugShowCheckedModeBanner: false,
  )); // MaterialApp
}

class MyWidget extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return const Text(
      'Bằng những kinh nghiệm thực tế khi đi làm, đã từng tham gia '
      'nhiều dự án Outsourcing cho cả khách hàng trong nước và ngoài nước, '
      'mình rất muốn chia sẻ và giới thiệu những kiến thức của mình về lập '
      'trình đến tất cả mọi người.',
      textDirection: TextDirection.ltr,
      textAlign: TextAlign.justify,
      maxLines: 3,
      overflow: TextOverflow.ellipsis,
      textScaleFactor: 1.5
    );
  }
}