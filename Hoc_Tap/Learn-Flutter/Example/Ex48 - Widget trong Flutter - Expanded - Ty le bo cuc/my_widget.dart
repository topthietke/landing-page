import 'package:flutter/material.dart';
import 'package:widget_object/my_text.dart';


class MyWidget extends StatelessWidget {
  MyText text = MyText();
  myFontFamily family = myFontFamily();
  myFontSize fSize = myFontSize();
  @override
  Widget build(BuildContext context) {
    return Container(
      // child: Column(// chia theo chieeuf docj
      child: Column(// chia theo chieu ngang
        // mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        // crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          Expanded(
            flex: 1,
            child: Container(
              color: Colors.green,
              height: 150,
            )
          ),
          Expanded(
            flex: 2,
            child: Container(
              color: Colors.blue,
              height: 150,
            )
          ),
           Expanded(
            flex: 1,
            child: Container(
              color: Colors.brown,
              height: 150,
            )
          ),
        ],
      ),
    );
  }
}
