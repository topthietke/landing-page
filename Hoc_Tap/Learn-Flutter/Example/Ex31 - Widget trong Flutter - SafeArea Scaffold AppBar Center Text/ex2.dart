import 'package:flutter/material.dart';

class Ex2 {
  void run() {
    runApp(const MaterialApp(
      home: SafeArea(
        child: Scaffold(
            body: Center(child: Text('Hello World'),)
        ), // Scaffold
      ), // SafeArea
    )); // MaterialAppterialApp
  }
}
