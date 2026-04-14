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
      // child: TextButton.icon(
        child: TextButton.icon(
          // onPressed: null,
          onPressed: (){
            print(text.d);
          },
          style: TextButton.styleFrom(
            foregroundColor: Colors.white, // Màu chữu
            backgroundColor: Colors.blue, // Màu  nền
            // minimumSize: Size(120,60), // Kich thuoc button
            padding: EdgeInsets.all(20.0),
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(30) // Độ cong của button
            ),
            elevation: 20,
            shadowColor: Colors.black.withOpacity(0.5), // Độ mở của bóng
            side: BorderSide(width:1, color: Colors.red),

          ),
          icon: Icon(
            Icons.add,
            size: 35,
          ),
          label: Text(
          text.b,
          style: TextStyle(fontSize: fSize.h1),
        )
      ),
    );
  }
}