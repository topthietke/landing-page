import 'package:flutter/material.dart';
import 'package:widget_object/my_text.dart';

// text - ok
// color - ok
// click - ok
// size -ok
// padding - ok
// margin - ok
// shape - ok
// shadow -ok
// border -ok
// icon - ok
// disable - ok

class MyWidget extends StatelessWidget {
  MyText text = MyText();
  myFontFamily family = myFontFamily();
  myFontSize fSize = myFontSize();
  @override
  Widget build(BuildContext context) {
    return Center(
      child: Container(
        margin: EdgeInsets.all(20),
        child: ElevatedButton.icon(
          onPressed: null,
          // onPressed: () {
          //   print(' Chào bạn !');
          // },
          style: ElevatedButton.styleFrom(
            // foregroundColor: Colors.white,
            // backgroundColor: Colors.green,
            // minimumSize: Size(50, 20),
            // padding: EdgeInsets.all(20),
            // shape: RoundedRectangleBorder(
            //   borderRadius: BorderRadius.circular(30)
            // ),
            // elevation: 10,
            // shadowColor: Colors.black.withOpacity(0.5),
            // side: BorderSide(width: 3, color: Colors.red)
            disabledBackgroundColor: Colors.brown.withOpacity(0.8),
            disabledForegroundColor: Colors.white.withOpacity(0.8)

          ),
            icon: Icon(Icons.edit, size:30),
          label: Text(
            text.d,
            style: TextStyle(
                fontSize: fSize.h1
            ),
          )
        ),
      ),
    );
  }
}