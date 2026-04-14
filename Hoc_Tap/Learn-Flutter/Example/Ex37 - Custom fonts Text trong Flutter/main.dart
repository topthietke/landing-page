import 'package:flutter/material.dart';
import 'package:widget_object/my_widget.dart';

void main() {
  runApp(
    MaterialApp(
      theme: ThemeData(
        fontFamily: 'Time New Romans',
      ),
      home: SafeArea(
        child: Scaffold(body: MyWidget()), // Scaffold
      ), // SafeArea
      debugShowCheckedModeBanner: false,
    ),
  ); // MaterialApp
}


