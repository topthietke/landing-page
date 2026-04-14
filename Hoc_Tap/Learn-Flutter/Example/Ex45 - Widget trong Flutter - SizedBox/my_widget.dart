import 'package:flutter/material.dart';
import 'package:hello_world/my_text.dart';


class MyWidget extends StatelessWidget {
  MyText text = MyText();
  myFontFamily family = myFontFamily();
  myFontSize fSize = myFontSize();
  @override
  Widget build(BuildContext context) {
    // return SizedBox.expand( // Nếu dùng SizedBox.expand thì sẽ chiếm toàn bộ không gian của cha, nếu dùng SizedBox thì sẽ chiếm đúng kích thước đã định nghĩa
    return SizedBox(
      width: double.infinity,
      height: double.infinity,
      child: ElevatedButton(
        onPressed: () {
        
        },
        style: ElevatedButton.styleFrom(
          backgroundColor: Colors.green,
          foregroundColor: Colors.white,
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(12), // <-- Thêm dòng này để bo tròn góc
          ),
        ),
        child: Text(text.d, style: TextStyle(fontSize: 30)),
      ), // ElevatedButton
    ); // SizedBox
  }
}