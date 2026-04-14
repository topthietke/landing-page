import 'package:flutter/material.dart'; 
import 'package:mobile_app/my_widget.dart';

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

