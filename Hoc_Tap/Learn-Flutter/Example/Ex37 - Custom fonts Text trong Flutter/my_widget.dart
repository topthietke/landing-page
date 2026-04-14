import 'package:flutter/material.dart';
import 'package:widget_object/my_text.dart';
class MyWidget extends StatelessWidget {
  MyText text = MyText();

  @override
  Widget build(BuildContext context) {
    return Text(
      text.e,
      textDirection: TextDirection.ltr,
      textAlign: TextAlign.justify,
      maxLines: 3,
      overflow: TextOverflow.ellipsis,
      textScaleFactor: 1.5,
      style: const TextStyle(
        color: Colors.green,
        // backgroundColor: Colors.green,
        // fontFamily: 'New fonts', // Cài đặt cho 1 đoạn text này
        fontSize: 15,

        // fontWeight: FontWeight.w400,
        // fontStyle: FontStyle.italic,

        // wordSpacing: 20,
        // letterSpacing: 10,
        // decoration: TextDecoration.lineThrough,
      ),// TextStyle
    );
  }
}