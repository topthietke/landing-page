import 'package:flutter/material.dart';
import 'package:widget_object/my_text.dart';

class MyWidget extends StatelessWidget {
  MyText text = MyText();
  myFontFamily family = myFontFamily();
  myFontSize fSize = myFontSize();
  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.all(50),// cách tất cả các phái
      child: TextButton(
        onPressed: (){
          print('Xin chao');
        },
        style: TextButton.styleFrom(
          foregroundColor: Colors.white, // Màu chữu
          backgroundColor: Colors.blue, // Màu  nền
          // minimumSize: Size(120,60), // Kich thuoc button
          padding: EdgeInsets.all(20.0),          
        ),
        child: Text(
          text.b,
          style: TextStyle(fontSize: fSize.h1),
        )
      ),
    );
  }
}