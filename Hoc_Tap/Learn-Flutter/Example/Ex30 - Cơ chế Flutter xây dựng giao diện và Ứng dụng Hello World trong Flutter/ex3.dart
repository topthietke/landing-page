import 'package:flutter/material.dart';

class Ex3 {
  void run() {
    runApp(
      MaterialApp(
        home: SafeArea(
          child: Scaffold(
            appBar: AppBar(
              backgroundColor: Colors.red,
              title: const Text('Tu hoc Flutter'),
            ), // AppBar
            body: const Center(child: Text('Hello World')), // Center
          ), // Scaffold
        ), // SafeArea
        debugShowCheckedModeBanner: false,
      ),
    ); // MaterialApp
  }
}
