import 'package:flutter/material.dart';
import 'package:widget_object/my_text.dart';

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
  MyText text = MyText();
  @override
  Widget build(BuildContext context) {
    return Center(
      child: RichText(
        text: TextSpan(
          style: DefaultTextStyle.of(context).style,
          children: <TextSpan>[
            TextSpan(text: text.d),
            TextSpan(text: text.e, style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold)),
            TextSpan(text: text.f)
          ]
        )),
    );
  }
}