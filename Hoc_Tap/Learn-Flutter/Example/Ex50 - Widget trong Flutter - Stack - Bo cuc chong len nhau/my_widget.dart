import 'package:flutter/material.dart';
import 'package:hello_world/my_text.dart';

class MyWidget extends StatelessWidget {
  MyTitle title = MyTitle();
  MyContent content = MyContent();
  MyButton button = MyButton();

  @override
  Widget build(BuildContext context) {
    return Container(
      color: Colors.grey,
      width: 500,
      height: 500,
      child: Stack(
        textDirection: TextDirection.rtl, 
        // fit: StackFit.expand, // Khai bao như này màu dỏ khai báo sau bị ghi về
        fit: StackFit.loose, // quay về ban đầu
        alignment: Alignment.center, //  Căn vào giữa
        clipBehavior: Clip.none,
        children: [
          Container(
            color: Colors.blue,
            width: 300,
            height: 300,
          ),
          Positioned(
            left: 10 ,
            bottom: 10,
            child: Container(
              color: Colors.yellow,
              width: 200,
              height: 200,
            ),
          
          ),
          
          Align(
            alignment: Alignment.bottomRight,
            child: Container(
              color: Colors.red,
              width: 100,
              height: 100,
            ),
          )

        ],
      ),
    );
  }
}
