import 'package:flutter/material.dart';
import '../Ex45 - Widget trong Flutter - SizedBox/my_widget.dart';


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

