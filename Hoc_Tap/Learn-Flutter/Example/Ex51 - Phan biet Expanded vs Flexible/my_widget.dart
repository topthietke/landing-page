import 'package:flutter/material.dart';
import 'package:hello_world/my_text.dart';

class MyWidget extends StatelessWidget {
  MyTitle title = MyTitle();
  MyContent content = MyContent();
  MyButton button = MyButton();

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        // Lấp đầy các khoảng trống
        Flexible( 
          flex: 1,
          fit: FlexFit.tight, // Bố cục lỏng lẻo không theo tỷ lệ 1:2:1
          child: Container(
            height: 100,
            color: Colors.green
          )        
        ),
         Flexible(
          flex: 2, 
          fit: FlexFit.tight, // Bố cục chặc chẽ --> giống Expanded
          child: Container(
            height: 100,
            color: Colors.brown
          )        
        ),
         Flexible( 
          flex: 1,
          fit: FlexFit.loose,
          child: Container(
            color: Colors.blue
          )        
        ),
      ],
    );
  }
}
