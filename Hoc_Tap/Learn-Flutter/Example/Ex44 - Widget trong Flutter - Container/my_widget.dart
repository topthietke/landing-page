import 'package:flutter/material.dart';
import 'package:hello_world/my_text.dart';


class MyWidget extends StatelessWidget {
  MyText text = MyText();
  myFontFamily family = myFontFamily();
  myFontSize fSize = myFontSize();
  @override
  Widget build(BuildContext context) {
    return Container(
      // color: Colors.green,
      width: 200,
      height: 200,
      padding: EdgeInsets.all(10),
      // alignment: Alignment.center,
      margin: EdgeInsets.all(50),
      decoration: BoxDecoration(
        color: Colors.blue,
        shape: BoxShape.rectangle,
        borderRadius: const BorderRadius.all(Radius.circular(20)),
        border: Border.all(width: 2, color: Colors.red)
      ),
      alignment: Alignment.center,
      transform: Matrix4.rotationZ(0.1),
      child: Text(
        text.d,
        style: TextStyle(
            fontSize: fSize.h3
        ),
      ),
    );
  }
}