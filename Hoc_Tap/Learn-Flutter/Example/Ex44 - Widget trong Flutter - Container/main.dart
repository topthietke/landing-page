import 'package:flutter/material.dart';
import 'package:hello_world/my_widget.dart';


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

