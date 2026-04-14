import 'package:flutter/material.dart';
import 'package:hello_world/my_widget.dart';


void main() {
  runApp(MaterialApp(
    home: SafeArea(
        child: Scaffold(
          // Bài 53: Học những nội dung sau:
          // Column -- Bố cục theo chiều dọc
          // Row -- Bố cục theo chiều ngang
          // Stack -- Ghi đè
          // Expanded --
          // Flexible
          // Positioned
          // Align
          // Center
            body: MyWidget()
        ) // Scaffold
    ), // SafeArea
    debugShowCheckedModeBanner: false,
  )); // MaterialApp
}

